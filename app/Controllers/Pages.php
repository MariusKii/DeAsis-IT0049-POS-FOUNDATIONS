<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Pages extends BaseController
{
    public function index(): string
    {
        $taskModel = new TaskModel();

        return view('pages/home', [
            'title' => 'Tasks for Today',
            'activePage' => 'home',
            'tasks' => $taskModel->where('task_date', date('Y-m-d'))->orderBy('created_at', 'ASC')->findAll(),
            'today' => date('F j, Y'),
        ]);
    }

    public function about(): string
    {
        return view('pages/about', ['title' => 'About', 'activePage' => 'about']);
    }
}
