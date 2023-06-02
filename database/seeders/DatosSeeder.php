<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class DatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // datos de la empresa
        DB::table('datos')->insert([
            'RazonSocial' => "Legion Tech",
            'Ruc' => 23567116591,
            'Direccion' => "Calle Cruz Verde 380",
        ]);

        // almacen principal 

        DB::table('almacenes')->insert([
            'name' => "Almacen Principal",
            'ubicacion' => "Cusco",
            'Direccion' => "Calle Cruz Verde",
        ]);
        DB::table('almacenes')->insert([
            'name' => "Almacen Puerto",
            'ubicacion' => "Puerto Maldonado",
            'Direccion' => "Av Circunvalacion 350",
        ]);

        // permisos de administrador y almacenero
        DB::table('permisos')->insert([
            'Descripcion' => "administrador",
            'Salidas' => true,
            'Entradas' => true,
            'Productos' => true,
            'Clientes' => true,
            'Proveedores' => true,
            'Permisos' => true,
            'Usuarios' => true,
            'Almacenes' => true,
            'configuracion' => true,
        ]);


        DB::table('permisos')->insert([
            'Descripcion' => "almacenero",
            'Salidas' => true,
            'Entradas' => true,
            'Productos' => true,
            'Clientes' => false,
            'Proveedores' => false,
            'Permisos' => false,
            'Usuarios' => false,
            'Almacenes' => false,
            'configuracion' => false,
        ]);

        // usuario administrador 
        DB::table('users')->insert([
            'FullName' => "admin",
            'Email' => "admin@admin.com",
            'Usuario' => "admin",
            "Password" => Hash::make("123456"),
            "IdPermisos" => 1,
            "IdAlmacenes" => 1
        ]);
        // usuario almacenero 
        DB::table('users')->insert([
            'FullName' => "almacenero",
            'Email' => "almacenero@almacenero.com",
            'Usuario' => "alma",
            "Password" => Hash::make("123456"),
            "IdPermisos" => 2,
            "IdAlmacenes" => 1
        ]);

        // productos de prueba
        DB::table('productos')->insert([
            'Codigo' => "PRO001",
            'Descripcion' => "Procesador Ryzen 3600X",
            'active' => true,
            "Categoria" => "Procesador",
            "Stock" => 5
        ]);
        DB::table('productos')->insert([
            'Codigo' => "MOU001",
            'Descripcion' => "Mouse logitech G502",
            'active' => true,
            "Categoria" => "Mouse",
            "Stock" => 10
        ]);
        DB::table('productos')->insert([
            'Codigo' => "TEC001",
            'Descripcion' => "Teclado Halion HA-K990",
            'active' => true,
            "Categoria" => "Teclado",
            "Stock" => 5
        ]);
        DB::table('productos')->insert([
            'Codigo' => "TEC002",
            'Descripcion' => "Teclado logitech S301",
            'active' => false,
            "Categoria" => "Teclado",
            "Stock" => 2
        ]);
    }
}
