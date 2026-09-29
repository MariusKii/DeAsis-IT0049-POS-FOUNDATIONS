<?= view('partials/header', get_defined_vars()) ?>

<section class="page-banner"><div class="container banner-row"><div><p class="eyebrow">Daily dashboard</p><h1>Tasks for Today</h1><p><?= esc($today) ?></p></div><span class="count-badge"><?= count($tasks) ?> task<?= count($tasks) === 1 ? '' : 's' ?></span></div></section>

<section class="section container"><div class="table-card"><div class="table-heading"><div><h2>Today's tasks</h2><p>Only tasks dated today are shown on this page.</p></div><span class="table-label">TODAY</span></div><?php if ($tasks === []): ?><p class="empty-state">There are no tasks scheduled for today.</p><?php else: ?><div class="table-wrap"><table><thead><tr><th>Task title</th><th>Status</th><th>Task date</th></tr></thead><tbody><?php foreach ($tasks as $task): ?><tr><td><strong><?= esc($task['title']) ?></strong></td><td><span class="status-pill status-<?= esc($task['status']) ?>"><?= esc(ucfirst($task['status'])) ?></span></td><td><?= esc($task['task_date']) ?></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?></div></section>

<?= view('partials/footer') ?>
