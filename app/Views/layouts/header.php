<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Corner Shop POS') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <nav class="navigation" aria-label="Main navigation">
            <a class="brand" href="<?= site_url('/') ?>">Corner <span>Shop</span> POS</a>
            <div class="navigation-links">
                <a href="<?= site_url('/') ?>" <?= ($active ?? '') === 'home' ? 'aria-current="page"' : '' ?>>Home</a>
                <a href="<?= site_url('about') ?>" <?= ($active ?? '') === 'about' ? 'aria-current="page"' : '' ?>>About</a>
                <a href="<?= site_url('customers') ?>" <?= ($active ?? '') === 'customers' ? 'aria-current="page"' : '' ?>>Customers</a>
                <a href="<?= site_url('users') ?>" <?= ($active ?? '') === 'users' ? 'aria-current="page"' : '' ?>>Staff</a>
            </div>
        </nav>
    </header>
    <main class="content">
