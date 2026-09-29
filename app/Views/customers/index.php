<?= view('partials/header', get_defined_vars()) ?>

<section class="page-banner"><div class="container banner-row"><div><p class="eyebrow">Account directory</p><h1>Customer Accounts</h1><p>Sample customer records prepared by the Customers controller.</p></div><span class="count-badge"><?= count($customers) ?> records</span></div></section>

<section class="section container"><div class="table-card"><div class="table-heading"><div><h2>Customer directory</h2><p>Temporary static-array data for this assessment.</p></div><span class="table-label">CUSTOMERS</span></div><div class="table-wrap"><table><thead><tr><th>Full name</th><th>Email address</th><th>Phone</th></tr></thead><tbody><?php foreach ($customers as $customer): ?><tr><td><strong><?= esc($customer['full_name']) ?></strong></td><td><?= esc($customer['email']) ?></td><td><?= esc($customer['phone']) ?></td></tr><?php endforeach; ?></tbody></table></div></div></section>

<?= view('partials/footer') ?>
