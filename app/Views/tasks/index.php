<?= view('partials/header', get_defined_vars()) ?>

<section class="page-banner"><div class="container banner-row"><div><p class="eyebrow">Complete database listing</p><h1>Task List</h1><p>Every task stored in the tasks table, ordered by date.</p></div><span class="count-badge"><?= count($tasks) ?> task<?= count($tasks) === 1 ? '' : 's' ?></span></div></section>

<section class="section container"><div class="table-card"><div class="table-heading"><div><h2>All tasks</h2><p>This page is not filtered to today's date.</p></div><span class="table-label">TASKS</span></div><?php if ($tasks === []): ?><p class="empty-state">No tasks have been added yet.</p><?php else: ?><div class="table-wrap"><table><thead><tr><th>ID</th><th>Title</th><th>Status</th><th>Task date</th><th>Created at</th></tr></thead><tbody><?php foreach ($tasks as $task): ?><tr><td><?= esc($task['id']) ?></td><td><strong><?= esc($task['title']) ?></strong></td><td><span class="status-pill status-<?= esc($task['status']) ?>"><?= esc(ucfirst($task['status'])) ?></span></td><td><?= esc($task['task_date']) ?></td><td><?= esc($task['created_at']) ?></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?></div></section>

<?= view('partials/footer') ?>
