<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A four-page CodeIgniter point-of-sale foundation application.">
    <title><?= esc($title ?? 'POS Foundations') ?> · POS Foundations</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>">
                <span class="brand-mark">PF</span>
                <span><strong>POS Foundations</strong><small>IT0049 · CodeIgniter 4</small></span>
            </a>
            <nav class="main-nav" aria-label="Main navigation">
                <a class="<?= ($activePage ?? '') === 'home' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
                <a class="<?= ($activePage ?? '') === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
                <a class="<?= ($activePage ?? '') === 'customers' ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                <a class="<?= ($activePage ?? '') === 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
            </nav>
        </div>
    </header>
    <main>
