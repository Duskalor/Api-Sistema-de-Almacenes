<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Primer grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "TEC003",
            'Descripcion' => "Teclado mecánico Corsair K70",
            'active' => true,
            "Categoria" => 3,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MON002",
            'Descripcion' => "Monitor LG Ultrawide 34UM69G",
            'active' => true,
            "Categoria" => 4,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MOU003",
            'Descripcion' => "Mouse óptico Microsoft Basic",
            'active' => false,
            "Categoria" => 2,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "TEL004",
            'Descripcion' => "Teléfono inalámbrico Panasonic KX-TG1611",
            'active' => true,
            "Categoria" => 5,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "AUD005",
            'Descripcion' => "Audífonos inalámbricos Apple AirPods Pro",
            'active' => true,
            "Categoria" => 6,
            "Stock" => 0
        ]);

        // Segundo grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "IMP006",
            'Descripcion' => "Impresora multifunción HP LaserJet Pro MFP M227fdw",
            'active' => true,
            "Categoria" => 7,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "CAM007",
            'Descripcion' => "Cámara digital Canon EOS Rebel T7i",
            'active' => true,
            "Categoria" => 8,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "DIS008",
            'Descripcion' => "Disco duro externo Seagate Expansion 2TB",
            'active' => true,
            "Categoria" => 9,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "ALT009",
            'Descripcion' => "Altavoces Bluetooth JBL Charge 4",
            'active' => true,
            "Categoria" => 10,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "PRO010",
            'Descripcion' => "Proyector Epson PowerLite Home Cinema 2045",
            'active' => false,
            "Categoria" => 11,
            "Stock" => 0
        ]);

        // Tercer grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "TEC011",
            'Descripcion' => "Teclado inalámbrico Logitech K380",
            'active' => true,
            "Categoria" => 3,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MON012",
            'Descripcion' => "Monitor Dell Ultrasharp U2419H",
            'active' => true,
            "Categoria" => 4,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MOU013",
            'Descripcion' => "Mouse gaming Razer DeathAdder Elite",
            'active' => true,
            "Categoria" => 2,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "TEL014",
            'Descripcion' => "Teléfono móvil Samsung Galaxy S20",
            'active' => true,
            "Categoria" => 5,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "AUD015",
            'Descripcion' => "Audífonos Bluetooth Sony WH-CH510",
            'active' => false,
            "Categoria" => 6,

            "Stock" => 0
        ]);

        // Cuarto grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "IMP016",
            'Descripcion' => "Impresora láser Brother HL-L2320D",
            'active' => true,
            "Categoria" => 7,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "CAM017",
            'Descripcion' => "Cámara deportiva GoPro Hero 8 Black",
            'active' => true,
            "Categoria" => 8,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "DIS018",
            'Descripcion' => "Disco duro interno WD Blue 1TB",
            'active' => true,
            "Categoria" => 9,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "ALT019",
            'Descripcion' => "Altavoces inalámbricos Sonos One",
            'active' => true,
            "Categoria" => 10,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "PRO020",
            'Descripcion' => "Proyector BenQ TK800M",
            'active' => true,
            "Categoria" => 11,

            "Stock" => 0
        ]);

        // Quinto grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "TEC021",
            'Descripcion' => "Teclado gaming HyperX Alloy FPS Pro",
            'active' => true,
            "Categoria" => 3,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MON022",
            'Descripcion' => "Monitor Asus ROG Swift PG279QZ",
            'active' => true,
            "Categoria" => 4,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MOU023",
            'Descripcion' => "Mouse inalámbrico Logitech MX Master 3",
            'active' => true,
            "Categoria" => 2,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "TEL024",
            'Descripcion' => "Teléfono móvil Apple iPhone 12 Pro",
            'active' => true,
            "Categoria" => 5,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "AUD025",
            'Descripcion' => "Audífonos con cancelación de ruido Bose QuietComfort 35 II",
            'active' => false,
            "Categoria" => 6,

            "Stock" => 0
        ]);

        // ... (otros grupos de 5 productos)
        // Sexto grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "IMP026",
            'Descripcion' => "Impresora multifunción Epson EcoTank ET-2750",
            'active' => true,
            "Categoria" => 7,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "CAM027",
            'Descripcion' => "Cámara sin espejo Sony Alpha a6400",
            'active' => true,
            "Categoria" => 8,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "DIS028",
            'Descripcion' => "Disco duro externo Samsung T5 500GB",
            'active' => true,
            "Categoria" => 9,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "ALT029",
            'Descripcion' => "Altavoces Bluetooth Bose SoundLink Revolve+",
            'active' => true,
            "Categoria" => 10,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "PRO030",
            'Descripcion' => "Proyector LG CineBeam HU80KA",
            'active' => false,
            "Categoria" => 11,

            "Stock" => 0
        ]);

        // Séptimo grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "TEC031",
            'Descripcion' => "Teclado inalámbrico Apple Magic Keyboard",
            'active' => true,
            "Categoria" => 3,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MON032",
            'Descripcion' => "Monitor Acer Predator X27",
            'active' => true,
            "Categoria" => 4,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MOU033",
            'Descripcion' => "Mouse gaming Logitech G502 Hero",
            'active' => true,
            "Categoria" => 2,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "TEL034",
            'Descripcion' => "Teléfono móvil Google Pixel 5",
            'active' => true,
            "Categoria" => 5,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "AUD035",
            'Descripcion' => "Audífonos inalámbricos Sennheiser Momentum True Wireless 2",
            'active' => false,
            "Categoria" => 6,

            "Stock" => 0
        ]);

        // Octavo grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "IMP036",
            'Descripcion' => "Impresora láser color HP Color LaserJet Pro MFP M281fdw",
            'active' => true,
            "Categoria" => 7,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "CAM037",
            'Descripcion' => "Cámara réflex Nikon D5600",
            'active' => true,
            "Categoria" => 8,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "DIS038",
            'Descripcion' => "Disco duro interno Seagate BarraCuda 4TB",
            'active' => true,
            "Categoria" => 9,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "ALT039",
            'Descripcion' => "Altavoces inalámbricos Amazon Echo Dot",
            'active' => true,
            "Categoria" => 10,
            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "PRO040",
            'Descripcion' => "Proyector Optoma HD146X",
            'active' => true,
            "Categoria" => 11,
            "Stock" => 0
        ]);

        // Noveno grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "TEC041",
            'Descripcion' => "Teclado retroiluminado Razer BlackWidow Elite",
            'active' => true,
            "Categoria" => 3,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MON042",
            'Descripcion' => "Monitor HP Pavilion 27xw",
            'active' => true,
            "Categoria" => 4,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "MOU043",
            'Descripcion' => "Mouse ergonómico Logitech MX Vertical",
            'active' => true,
            "Categoria" => 2,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "TEL044",
            'Descripcion' => "Teléfono móvil OnePlus 9 Pro",
            'active' => true,
            "Categoria" => 5,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "AUD045",
            'Descripcion' => "Audífonos inalámbricos Jabra Elite 75t",
            'active' => false,
            "Categoria" => 6,

            "Stock" => 0
        ]);

        // Décimo grupo de 5 productos
        DB::table('productos')->insert([
            'Codigo' => "IMP046",
            'Descripcion' => "Impresora multifunción Canon PIXMA TR4520",
            'active' => true,
            "Categoria" => 7,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "CAM047",
            'Descripcion' => "Cámara de acción DJI Osmo Action",
            'active' => true,
            "Categoria" => 8,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "DIS048",
            'Descripcion' => "Disco duro externo Toshiba Canvio Advance 1TB",
            'active' => true,
            "Categoria" => 9,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "ALT049",
            'Descripcion' => "Altavoces Bluetooth JBL Flip 5",
            'active' => true,
            "Categoria" => 10,

            "Stock" => 0
        ]);

        DB::table('productos')->insert([
            'Codigo' => "PRO050",
            'Descripcion' => "Proyector Epson Home Cinema 2150",
            'active' => true,
            "Categoria" => 11,

            "Stock" => 0
        ]);

        // ... (otros grupos de 5 productos)

        // SALIDAS

        DB::table('salidas')->insert([

            'NumeroDocumento' => "SAL001",
            'IdUsuario' => 3,
            'active' => true,
            "IdEmpleados" => 1,
            "razonSalida" => "Ingreso Nuevo TEST",
            "CantidadProductos" => 7,
            "IdAlmacenes" => 2,
        ]);

        // DETALLE SALIDAS
        DB::table('detalle_salidas')->insert([
            'IdSalida' => 1,
            'IdProducto' => 3,
            'cantidad' => 5,
        ]);
        DB::table('detalle_salidas')->insert([
            'IdSalida' => 1,
            'IdProducto' => 2,
            'cantidad' => 2,
        ]);



        DB::table('salidas')->insert([

            'NumeroDocumento' => "SAL002",
            'IdUsuario' => 1,
            'active' => true,
            "IdEmpleados" => 2,
            "razonSalida" => "Ingreso Nuevo TEST2",
            "CantidadProductos" => 10,
            "IdAlmacenes" => 1,
        ]);

        // DETALLE SALIDAS
        DB::table('detalle_salidas')->insert([
            'IdSalida' => 2,
            'IdProducto' => 5,
            'cantidad' => 5,
        ]);
        DB::table('detalle_salidas')->insert([
            'IdSalida' => 2,
            'IdProducto' => 7,
            'cantidad' => 5,
        ]);
    }
}
