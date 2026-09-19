<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        return view('pages/landing', [
            'title' => 'Corner Shop POS',
        ]);
    }

    public function about(): string
    {
        return view('pages/about', [
            'title' => 'About · Corner Shop POS',
        ]);
    }
}
