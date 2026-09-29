<?= view('partials/header', get_defined_vars()) ?>

<section class="page-banner"><div class="container"><p class="eyebrow">Demo account</p><h1>Profile</h1><p>One user record loaded from the database.</p></div></section>

<section class="section container narrow-content"><div class="content-card profile-card"><?php if ($user === null): ?><p class="empty-state">The demo user profile is not available.</p><?php else: ?><dl><div><dt>Username</dt><dd><?= esc($user['username']) ?></dd></div><div><dt>Full name</dt><dd><?= esc($user['full_name']) ?></dd></div><div><dt>Email</dt><dd><?= esc($user['email']) ?></dd></div><div><dt>Created at</dt><dd><?= esc($user['created_at']) ?></dd></div></dl><?php endif; ?></div></section>

<?= view('partials/footer') ?>
