<?php $active = 'customers'; ?>
<?= $this->include('layouts/header') ?>

<h1 class="page-heading">Customer Accounts</h1>
<p class="page-sub">Everyone with a running tab or a standing order at the counter.</p>

<div class="ledger">
    <table>
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['fullName']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('layouts/footer') ?>
