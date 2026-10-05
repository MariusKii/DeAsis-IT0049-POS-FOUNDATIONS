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

        $defaultPasswordHash = password_hash('password123', PASSWORD_DEFAULT);
        $userData = [
            'username' => 'student01',
            'full_name' => 'Demo Student',
            'email' => 'student01@example.com',
            'password' => $defaultPasswordHash,
            'created_at' => $createdAt,
        ];
        $users = $this->db->table('users');
        if ($users->where('username', $userData['username'])->countAllResults() > 0) {
            $users->where('username', $userData['username'])->update([
                'full_name' => $userData['full_name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);
        } else {
            $users->insert($userData);
        }
        $users->where('password IS NULL', null, false)->update(['password' => $defaultPasswordHash]);
    }
}
