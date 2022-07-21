<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Persona;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Jhafeth Cadima',
            'email' => 'cadima@correo.com',
            'password' => Hash::make('12345'),
            'rol' => 'admin'
        ])->assignRole('admin');
        /* Persona::create(
            [
                'ci' => '11385312',
                'direccion' => 'Av Radial 17',
                'telefono' => '71604249',
                'user_id' => $user->id
            ]
        ); */

        $user1 = User::create([
            'name' => 'Micaela Roca',
            'email' => 'mica@correo.com',
            'password' => Hash::make('12345'),
            'rol' => 'empleado'
        ])->assignRole('empleado');
        Persona::create(
            [
                'ci' => '1523654',
                'direccion' => 'Barrio Urbari',
                'telefono' => '77084852',
                'user_id' => $user1->id
            ]
        );

        $user2 = User::create([
            'name' => 'Juan Perez',
            'email' => 'juan@correo.com',
            'password' => Hash::make('12345'),
            'rol' => 'cliente'
        ])->assignRole('cliente');
        Persona::create(
            [
                'ci' => '14523678',
                'direccion' => 'Barrio Urbari',
                'telefono' => '77785422',
                'user_id' => $user2->id
            ]
        );
    }
}
