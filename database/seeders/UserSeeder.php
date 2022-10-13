<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'Christian',
                'email' => 'christian@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Luis',
                'email' => 'luis@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
