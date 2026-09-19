<?php $active = 'users'; ?>
<?= $this->include('layouts/header') ?>

<h1 class="page-heading">Staff Accounts</h1>
<p class="page-sub">Who's clocked in on the system and what they're allowed to touch.</p>

<div class="ledger">
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Full Name</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['fullName']) ?></td>
                    <td><span class="role-tag"><?= esc($user['role']) ?></span></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('layouts/footer') ?>
