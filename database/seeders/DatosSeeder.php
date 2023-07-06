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
            'RazonSocial' => "Legion Tech Cusco",
            'Ruc' => 1073061514,
            'Direccion' => "Av. la cultura 1006",
        ]);

        // almacen principal 

        DB::table('almacenes')->insert([
            'name' => "Almacen Principal",
            'ubicacion' => "Cusco",
            'Direccion' => "Calle Cruz Verde",
            'active' => true,
        ]);
        DB::table('almacenes')->insert([
            'name' => "Almacen Puerto",
            'ubicacion' => "Puerto Maldonado",
            'Direccion' => "Av Circunvalacion 350",
            'active' => true,
        ]);
        // DB::table('almacenes')->insert([
        //     'name' => "test Almacen",
        //     'ubicacion' => "test Almacen",
        //     'Direccion' => "test Almacen",
        //     'active' => false,
        // ]);

        // permisos de administrador y almacenero
        DB::table('permisos')->insert([
            'Descripcion' => "administrador",
            'Salidas' => true,
            'Entradas' => true,
            'Productos' => true,
            'Empleados' => true,
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
            'Empleados' => false,
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

        // test
        DB::table('users')->insert([
            'FullName' => "test",
            'Email' => "test@test.com",
            'Usuario' => "test",
            "Password" => Hash::make("123456"),
            "IdPermisos" => 2,
            "IdAlmacenes" => 2
        ]);
        DB::table('users')->insert([
            'FullName' => "laOchoa",
            'Email' => "ochoa@ochoa.com",
            'Usuario' => "ochoa",
            "Password" => Hash::make("123456"),
            "IdPermisos" => 1,
            "IdAlmacenes" => 2
        ]);
        DB::table('empleados')->insert([
            'FullName' => "Luis Ochoa",
            "Cargo" => "Vendedor",
            "active" => 1
        ]);
        DB::table('empleados')->insert([
            'FullName' => "Paul Cruz",
            "Cargo" => "Vendedor",
            "active" => 1
        ]);



        // productos de prueba
        DB::table('productos')->insert([
            'Codigo' => "PRO001",
            'Descripcion' => "Procesador Ryzen 3600X",
            'active' => true,
            "Categoria" => "Procesador",
            // "IdAlmacenes" => 2,
            "Stock" => 11
        ]);
        DB::table('productos')->insert([
            'Codigo' => "MOU001",
            'Descripcion' => "Mouse logitech G502",
            'active' => true,
            "Categoria" => "Mouse",
            // "IdAlmacenes" => 2,
            "Stock" => 11
        ]);
        DB::table('productos')->insert([
            'Codigo' => "TEC001",
            'Descripcion' => "Teclado Halion HA-K990",
            'active' => true,
            "Categoria" => "Teclado",
            // "IdAlmacenes" => 1,
            "Stock" => 22
        ]);
        DB::table('productos')->insert([
            'Codigo' => "TEC002",
            'Descripcion' => "Teclado logitech S301",
            'active' => false,
            "Categoria" => "Teclado",
            // "IdAlmacenes" => 1,
            "Stock" => 6,
        ]);


        //// ENTRADAS
        /// 1
        DB::table('entradas')->insert([

            'NumeroDocumento' => "MIE002",
            'IdUsuario' => 1,
            'active' => true,
            "razonEntrada" => "Ingreso Nuevo",
            "CantidadProductos" => 18,
            "IdEmpleados" => 1,
            "IdAlmacenes" => 1,
        ]);

        // Detalle Entradas
        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 1,
            'IdProducto' => 1,
            'cantidad' => 3,
        ]);
        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 1,
            'IdProducto' => 2,
            'cantidad' => 5,
        ]);
        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 1,
            'IdProducto' => 3,
            'cantidad' => 10,
        ]);

        /// 2 
        DB::table('entradas')->insert([

            'NumeroDocumento' => "MIE003",
            'IdUsuario' => 1,
            'active' => true,
            "IdEmpleados" => 1,
            "razonEntrada" => "Ingreso Nuevo",
            "CantidadProductos" => 12,
            "IdAlmacenes" => 1,
        ]);

        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 2,
            'IdProducto' => 1,
            'cantidad' => 2,
        ]);

        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 2,
            'IdProducto' => 2,
            'cantidad' => 3,
        ]);

        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 2,
            'IdProducto' => 3,
            'cantidad' => 1,
        ]);

        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 2,
            'IdProducto' => 4,
            'cantidad' => 6,
        ]);


        // ENTRADA 3
        DB::table('entradas')->insert([
            'NumeroDocumento' => "MIE004",
            'IdUsuario' => 1,
            "IdEmpleados" => 2,
            'active' => true,
            "razonEntrada" => "Ingreso de stock",
            "CantidadProductos" => 8,
            "IdAlmacenes" => 2,
        ]);

        // Detalle Entrada 3
        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 3,
            'IdProducto' => 2,
            'cantidad' => 3,
        ]);

        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 3,
            'IdProducto' => 3,
            'cantidad' => 5,
        ]);


        // ENTRADA 4
        DB::table('entradas')->insert([
            'NumeroDocumento' => "MIE005",
            'IdUsuario' => 2,
            'active' => true,
            "IdEmpleados" => 2,
            "razonEntrada" => "Compra de productos",
            "CantidadProductos" => 12,
            "IdAlmacenes" => 1,
        ]);

        // Detalle Entrada 4
        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 4,
            'IdProducto' => 1,
            'cantidad' => 6,
        ]);

        DB::table('detalle_entradas')->insert([
            'IdEntrada' => 4,
            'IdProducto' => 3,
            'cantidad' => 6,
        ]);
    }
}
