<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $taskModel = new TaskModel();

        return view('tasks/index', [
            'title' => 'Task List',
            'activePage' => 'tasks',
            'tasks' => $taskModel->orderBy('task_date', 'ASC')->orderBy('created_at', 'ASC')->findAll(),
        ]);
    }
}
