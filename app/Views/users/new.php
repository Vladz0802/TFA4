<?php $active = 'users'; ?>
<?= $this->include('layouts/header') ?>

<h1 class="page-heading">Add User</h1>
<p class="page-sub">Username (unique), full name and password are required. You can add a profile picture after saving, from the edit page.</p>

<form class="form-card" method="post" action="<?= site_url('users') ?>">
    <?= csrf_field() ?>

    <div class="form-field">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= old('username') ?>">
        <?= validation_show_error('username') ?>
    </div>

    <div class="form-field">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="<?= old('full_name') ?>">
        <?= validation_show_error('full_name') ?>
    </div>

    <div class="form-field">
        <label for="password">Password (at least 8 characters)</label>
        <input type="password" id="password" name="password" autocomplete="new-password">
        <?= validation_show_error('password') ?>
    </div>

    <div class="form-field">
        <label for="password_confirm">Confirm Password</label>
        <input type="password" id="password_confirm" name="password_confirm" autocomplete="new-password">
        <?= validation_show_error('password_confirm') ?>
    </div>

    <button type="submit" class="btn btn-primary">Save User</button>
    <a class="btn btn-secondary" href="<?= site_url('users') ?>">Cancel</a>
</form>

<?= $this->include('layouts/footer') ?>
