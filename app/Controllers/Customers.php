<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    private array $rules = [
        'full_name' => 'required|min_length[3]|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]',
        'phone'     => 'permit_empty|max_length[20]',
    ];

    public function index(): string
    {
        $model = new CustomerModel();
        $customers = $model->findAll();

        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'customers' => $customers,
        ]);
    }

    public function new(): string
    {
        return view('customers/new', ['title' => 'Add Customer']);
    }

    public function create()
    {
        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }

        (new CustomerModel())->insert([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone') ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer added.');
    }

    public function edit($id): string
    {
        $customer = (new CustomerModel())->find($id);
        if (! $customer) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('customers/edit', [
            'title'    => 'Edit Customer',
            'customer' => $customer,
        ]);
    }

    public function update($id)
    {
        $model = new CustomerModel();
        if (! $model->find($id)) {
            throw PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }

        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone') ?: null,
        ]);

        return redirect()->to('/customers')->with('success', 'Customer updated.');
    }
}
