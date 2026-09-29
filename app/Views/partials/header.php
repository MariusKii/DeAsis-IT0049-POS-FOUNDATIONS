<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tasks for Today Management System built with CodeIgniter 4 and MySQL.">
    <title><?= esc($title ?? 'Tasks for Today') ?> · Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tfa3.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>">
                <span class="brand-mark">TT</span>
                <span><strong>Tasks for Today</strong><small>IT0049 · CodeIgniter 4</small></span>
            </a>
            <nav class="main-nav" aria-label="Main navigation">
                <a class="<?= ($activePage ?? '') === 'home' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
                <a class="<?= ($activePage ?? '') === 'tasks' ? 'active' : '' ?>" href="<?= site_url('tasks') ?>">Tasks</a>
                <a class="<?= ($activePage ?? '') === 'customers' ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                <a class="<?= ($activePage ?? '') === 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
                <a class="<?= ($activePage ?? '') === 'profile' ? 'active' : '' ?>" href="<?= site_url('profile') ?>">Profile</a>
                <a class="<?= ($activePage ?? '') === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
            </nav>
        </div>
    </header>
    <main>
