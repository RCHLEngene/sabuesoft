<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre' => 'administrador',
            'descripcion' => 'Administrador de todo el sitio',
            'estado' => '0',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'vendedor',
            'descripcion' => 'Administrador de ventas del sitio',
            'estado' => '0',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'proveedor',
            'descripcion' => 'Proveedor de productos del sitio',
            'estado' => '0',
        ]);
        DB::table('users')->insert([
            'name' => 'administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'rol' => '1',
        ]);
    }
}
