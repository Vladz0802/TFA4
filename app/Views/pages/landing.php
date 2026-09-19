<?php $active = 'home'; ?>
<?= $this->include('layouts/header') ?>

<section class="hero">
    <div>
        <p class="hero-tag">Now serving Barangay San Isidro</p>
        <h1>The counter runs on paper. This is what comes next.</h1>
        <p class="hero-lede">
            Corner Shop POS is the digital ledger for our sari-sari store —
            one screen for the people who shop here and the people who work
            the counter. This first build wires up the pages; the register
            and the real database come next.
        </p>
        <div class="hero-actions">
            <a class="btn btn-primary" href="<?= site_url('customers') ?>">View customer accounts</a>
            <a class="btn btn-secondary" href="<?= site_url('about') ?>">About this project</a>
        </div>
    </div>
    <div class="hero-counter">
        <div class="row">
            <span class="label">Customer accounts on file</span>
            <span class="num">6</span>
        </div>
        <div class="row">
            <span class="label">Staff accounts on file</span>
            <span class="num">6</span>
        </div>
        <div class="row">
            <span class="label">Pages wired up</span>
            <span class="num">4 / 4</span>
        </div>
    </div>
</section>

<section>
    <h2>Get around the store</h2>
    <div class="quick-links">
        <a class="quick-link" href="<?= site_url('about') ?>">
            <h3>About</h3>
            <p>Why this project exists and what it's built with.</p>
        </a>
        <a class="quick-link" href="<?= site_url('customers') ?>">
            <h3>Customer Accounts</h3>
            <p>Names, emails, and phone numbers on file for the store.</p>
        </a>
        <a class="quick-link" href="<?= site_url('users') ?>">
            <h3>Staff Accounts</h3>
            <p>Who's working the counter, and what they're allowed to do.</p>
        </a>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
