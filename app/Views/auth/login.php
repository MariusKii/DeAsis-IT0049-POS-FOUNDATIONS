<?= view('partials/header', get_defined_vars()) ?>
<section class="page-banner"><div class="container"><p class="eyebrow">Secure access</p><h1>Log in</h1><p>Sign in to manage customer and user accounts.</p></div></section>
<section class="section container narrow-content"><div class="content-card form-card login-card">
    <?php if ($message = session('error')): ?><div class="form-errors"><p><?= esc($message) ?></p></div><?php endif; ?>
    <?php if ($message = session('success')): ?><p class="flash-success flash-message"><?= esc($message) ?></p><?php endif; ?>
    <?php if (session('errors')): ?><div class="form-errors"><p>Please correct the following:</p><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
    <form method="post" action="<?= site_url('login') ?>">
        <div class="form-field"><label for="username">Username</label><input id="username" name="username" value="<?= esc(old('username')) ?>" autocomplete="username" required></div>
        <div class="form-field"><label for="password">Password</label><input id="password" type="password" name="password" autocomplete="current-password" required></div>
        <div class="form-actions"><button class="button button-primary" type="submit">Log in</button></div>
    </form>
</div></section>
<?= view('partials/footer') ?>
