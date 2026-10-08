<?php $active = 'users'; ?>
<?= $this->include('layouts/header') ?>

<h1 class="page-heading">Staff Accounts</h1>
<p class="page-sub">Who's clocked in on the system and what they're allowed to touch.</p>

<?php if (session()->getFlashdata('success')): ?>
    <p class="flash-success"><?= esc(session()->getFlashdata('success')) ?></p>
<?php endif; ?>

<p class="page-actions"><a class="btn btn-primary" href="<?= site_url('users/new') ?>">+ Add User</a></p>

<div class="ledger">
    <table>
        <thead>
            <tr>
                <th scope="col">Avatar</th>
                <th scope="col">Username</th>
                <th scope="col">Full Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <?php
                    $avatar = ! empty($user['avatar'])
                        ? base_url('uploads/' . $user['avatar'])
                        : base_url('images/placeholder.svg');
                ?>
                <tr>
                    <td><img class="avatar" src="<?= esc($avatar, 'attr') ?>" width="44" height="44" alt="Avatar of <?= esc($user['username'], 'attr') ?>"></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><a href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('layouts/footer') ?>
