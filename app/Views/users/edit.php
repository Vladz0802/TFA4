<?php $active = 'users'; ?>
<?= $this->include('layouts/header') ?>

<h1 class="page-heading">Edit User</h1>
<p class="page-sub">Update the details below. A profile picture must be a JPG or PNG, up to 2MB.</p>

<?php
    $current = ! empty($user['avatar'])
        ? base_url('uploads/' . $user['avatar'])
        : base_url('images/placeholder.svg');
?>

<form class="form-card" method="post" action="<?= site_url('users/' . $user['id']) ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-field">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= old('username', $user['username']) ?>">
        <?= validation_show_error('username') ?>
    </div>

    <div class="form-field">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="<?= old('full_name', $user['full_name']) ?>">
        <?= validation_show_error('full_name') ?>
    </div>

    <div class="form-field">
        <label for="avatar">Profile Picture</label>
        <img class="avatar avatar-lg" src="<?= esc($current, 'attr') ?>" width="96" height="96" alt="Current avatar">
        <input type="file" id="avatar" name="avatar" accept="image/jpeg,image/png">
        <?= validation_show_error('avatar') ?>
    </div>

    <button type="submit" class="btn btn-primary">Update User</button>
    <a class="btn btn-secondary" href="<?= site_url('users') ?>">Cancel</a>
</form>

<?= $this->include('layouts/footer') ?>
