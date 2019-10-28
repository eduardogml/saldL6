<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Eduardo Gomes de Moura Lima',
            'email'     => 'eduardogml.webmaster@gmail.com',
            'password'  => bcrypt('123456'),
        ]);

        User::create([
            'name'      => 'Outro Usuario Fulano',
            'email'     => 'outro.usuario.fulano@gmail.com',
            'password'  => bcrypt('123456'),
        ]);
    }
}
