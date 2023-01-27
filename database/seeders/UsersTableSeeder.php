<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john_doe@mail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Michele Savo',
                'email' => 'michele_savo@mail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'John Smith',
                'email' => 'jhon_smith@mail.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
    }
}
