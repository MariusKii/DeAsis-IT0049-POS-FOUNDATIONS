<?= view('partials/header', get_defined_vars()) ?>

<section class="page-banner"><div class="container banner-row"><div><p class="eyebrow">Team directory</p><h1>User Accounts</h1><p>User records retrieved from the POS database.</p></div><span class="count-badge"><?= count($users) ?> records</span></div></section>

<section class="section container"><div class="table-card"><div class="table-heading"><div><h2>Staff directory</h2><p>Records loaded through UserModel and displayed with a foreach loop.</p></div><span class="table-label">USERS</span></div><div class="table-wrap"><table><thead><tr><th>Username</th><th>Full name</th></tr></thead><tbody><?php foreach ($users as $user): ?><tr><td><strong><?= esc($user['username']) ?></strong></td><td><?= esc($user['full_name']) ?></td></tr><?php endforeach; ?></tbody></table></div></div></section>

<?= view('partials/footer') ?>
