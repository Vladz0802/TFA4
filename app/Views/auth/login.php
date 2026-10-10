<?php $active = 'login'; ?>
<?= $this->include('layouts/header') ?>

<h1 class="page-heading">Staff Login</h1>
<p class="page-sub">Log in to manage customer and staff accounts.</p>

<?php if (session()->getFlashdata('error')): ?>
    <p class="flash-error"><?= esc(session()->getFlashdata('error')) ?></p>
<?php endif; ?>

<?php if (service('request')->getGet('logged_out')): ?>
    <p class="flash-success">You have been logged out.</p>
<?php endif; ?>

<form class="form-card" method="post" action="<?= site_url('login') ?>">
    <?= csrf_field() ?>

    <div class="form-field">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= old('username') ?>" autocomplete="username" autofocus>
        <?= validation_show_error('username') ?>
    </div>

    <div class="form-field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="current-password">
        <?= validation_show_error('password') ?>
    </div>

    <button type="submit" class="btn btn-primary">Log in</button>
</form>

<?= $this->include('layouts/footer') ?>
