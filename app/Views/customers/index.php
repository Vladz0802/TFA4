<?php $active = 'customers'; ?>
<?= $this->include('layouts/header') ?>

<h1 class="page-heading">Customer Accounts</h1>
<p class="page-sub">Everyone with a running tab or a standing order at the counter.</p>

<?php if (session()->getFlashdata('success')): ?>
    <p class="flash-success"><?= esc(session()->getFlashdata('success')) ?></p>
<?php endif; ?>

<p class="page-actions"><a class="btn btn-primary" href="<?= site_url('customers/new') ?>">+ Add Customer</a></p>

<div class="ledger">
    <table>
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td><a href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('layouts/footer') ?>
