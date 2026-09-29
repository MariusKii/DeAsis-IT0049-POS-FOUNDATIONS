<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TasksSeeder extends Seeder
{
    public function run()
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $createdAt = date('Y-m-d H:i:s');

        $this->db->table('tasks')->insertBatch([
            ['title' => 'Finish project documentation', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Review database schema', 'status' => 'completed', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Attend team meeting', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Submit weekly report', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Update project repository', 'status' => 'pending', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Prepare presentation slides', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
            ['title' => 'Check application routes', 'status' => 'completed', 'task_date' => $tomorrow, 'created_at' => $createdAt],
            ['title' => 'Test the profile page', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insert([
            'username' => 'student01',
            'full_name' => 'Demo Student',
            'email' => 'student01@example.com',
            'created_at' => $createdAt,
        ]);
    }
}
