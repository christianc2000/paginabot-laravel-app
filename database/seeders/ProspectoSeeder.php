<?php

namespace Database\Seeders;

use App\Models\Prospecto;
use Illuminate\Database\Seeder;

class ProspectoSeeder extends Seeder
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
                'estado'=>1,
                'posicion'=>1
            ],
            [
                'facebookid'=>'32332833',
                'foto'=>'fotos/perfil1.png',
                'name' => 'Luisa',
                'email' => 'luisa@gmail.com',
                'celular'=>'65356221',
                'password' => bcrypt('12345678'),
                'estado'=>1,
                'posicion'=>2
            ],
            [
                'facebookid'=>'12142342',
                'foto'=>'fotos/perfil2.png',
                'name' => 'liliana',
                'email' => 'lili@gmail.com',
                'celular'=>'65562233',
                'password' => bcrypt('12345678'),
                'estado'=>2,
                'posicion'=>1
            ],
            [
                'facebookid'=>'72182812',
                'foto'=>'fotos/perfil5.jpg',
                'name' => 'felix',
                'email' => 'felix@gmail.com',
                'celular'=>'77281721',
                'password' => bcrypt('12345678'),
                'estado'=>2,
                'posicion'=>2
            ],
            [
                'facebookid'=>'65612561',
                'foto'=>'fotos/perfil4.jpg',
                'name' => 'Sara',
                'email' => 'sara@gmail.com',
                'celular'=>'76273333',
                'password' => bcrypt('12345678'),
                'estado'=>3,
                'posicion'=>1
            ],
            [
                'facebookid'=>'55321287',
                'foto'=>'fotos/perfil6.png',
                'name' => 'Luis',
                'email' => 'luis@gmail.com',
                'celular'=>'65356221',
                'password' => bcrypt('12345678'),
                'estado'=>3,
                'posicion'=>2
            ],
            [
                'facebookid'=>'1212821',
                'foto'=>'fotos/perfil7.jpg',
                'name' => 'Lorena',
                'email' => 'lorena@gmail.com',
                'celular'=>'73321333',
                'password' => bcrypt('12345678'),
                'estado'=>4,
                'posicion'=>1
            ],
            [
                'facebookid'=>'9989212',
                'foto'=>'fotos/perfil8.png',
                'name' => 'María Aguirres',
                'email' => 'marita@gmail.com',
                'celular'=>'65356221',
                'password' => bcrypt('12345678'),
                'estado'=>4,
                'posicion'=>2
            ]
        ];
        foreach ($users as $user) {
            Prospecto::create($user);
        }
    }
}
