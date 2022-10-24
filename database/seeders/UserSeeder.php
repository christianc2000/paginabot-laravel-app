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
                'facebookid'=>'32332833',
                'foto'=>'fotos/perfil3.png',
                'name' => 'Christian',
                'email' => 'christian@gmail.com',
                'celular'=>'73762233',
                'password' => bcrypt('12345678'),
            ],
            [
                'facebookid'=>'32332833',
                'foto'=>'fotos/perfil1.png',
                'name' => 'Luisa',
                'email' => 'luisa@gmail.com',
                'celular'=>'65356221',
                'password' => bcrypt('12345678'),
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
