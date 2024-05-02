<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EvalDataSeeder extends Seeder
{
    public function run()
    {
        //Insert data into User table
        $user_data = [
            [
                'name' => 'User1 Lastname1',
                'email' => 'user1@example.com',
                'phone' => '123-456-2232',
                'created_at' => date('Y-m-d H:i:s')

            ],
            [
                'name' => 'User2 Lastname2',
                'email' => 'user2@example.com',
                'phone' => '123-456-2311',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'User3 Lastname3',
                'email' => 'user3@example.com',
                'phone' => '123-456-0000',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        $userIds = []; 
        
        // reference: lab3 Seeder Code
        foreach ($user_data as $user) {
            $this->db->table('User')->insert($user);
            $userIds[] = $this->db->insertID();
        }       
        foreach ($userIds as $userId) {
           // Insert sample data into the Address table for each user
           $this->db->table('Surveys')->insert([
               'user_id' => $userId,
               'title' => "Survey $userId Title",
               'description' => "Description of Survey $userId.",
               'respondants_count' => 0,
               'created_at' => date('Y-m-d H:i:s')
           ]);
        
        }
    }
}
