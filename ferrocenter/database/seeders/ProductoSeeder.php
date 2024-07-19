<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = DB::table('categorias')->pluck('categoria_id')->toArray();

        $productos = [
            ['nombre_producto' => 'Martillo', 'descripcion_producto' => 'Martillo de acero inoxidable', 'precio_unitario' => 10.00, 'precio_compra' => 6.00, 'categoria_id' => $categorias[0]],
            ['nombre_producto' => 'Destornillador', 'descripcion_producto' => 'Destornillador de precisión', 'precio_unitario' => 5.00, 'precio_compra' => 3.00, 'categoria_id' => $categorias[0]],
            ['nombre_producto' => 'Taladro Eléctrico', 'descripcion_producto' => 'Taladro eléctrico de 500W', 'precio_unitario' => 50.00, 'precio_compra' => 30.00, 'categoria_id' => $categorias[1]],
            ['nombre_producto' => 'Sierra Circular', 'descripcion_producto' => 'Sierra circular de 1500W', 'precio_unitario' => 80.00, 'precio_compra' => 60.00, 'categoria_id' => $categorias[1]],
            ['nombre_producto' => 'Cemento', 'descripcion_producto' => 'Saco de cemento de 50kg', 'precio_unitario' => 10.00, 'precio_compra' => 7.00, 'categoria_id' => $categorias[2]],
            ['nombre_producto' => 'Ladrillos', 'descripcion_producto' => 'Ladrillos de arcilla', 'precio_unitario' => 0.50, 'precio_compra' => 0.30, 'categoria_id' => $categorias[2]],
            ['nombre_producto' => 'Pintura Blanca', 'descripcion_producto' => 'Galón de pintura blanca', 'precio_unitario' => 20.00, 'precio_compra' => 15.00, 'categoria_id' => $categorias[3]],
            ['nombre_producto' => 'Rodillo de Pintura', 'descripcion_producto' => 'Rodillo de pintura de 9 pulgadas', 'precio_unitario' => 5.00, 'precio_compra' => 3.00, 'categoria_id' => $categorias[3]],
            ['nombre_producto' => 'Llave Inglesa', 'descripcion_producto' => 'Llave inglesa ajustable', 'precio_unitario' => 15.00, 'precio_compra' => 10.00, 'categoria_id' => $categorias[4]],
            ['nombre_producto' => 'Tubo de PVC', 'descripcion_producto' => 'Tubo de PVC de 3 metros', 'precio_unitario' => 7.00, 'precio_compra' => 5.00, 'categoria_id' => $categorias[4]],
            ['nombre_producto' => 'Candado', 'descripcion_producto' => 'Candado de seguridad de 50mm', 'precio_unitario' => 8.00, 'precio_compra' => 5.00, 'categoria_id' => $categorias[5]],
            ['nombre_producto' => 'Cerradura', 'descripcion_producto' => 'Cerradura para puerta de entrada', 'precio_unitario' => 25.00, 'precio_compra' => 18.00, 'categoria_id' => $categorias[5]],
            ['nombre_producto' => 'Tijeras de Jardín', 'descripcion_producto' => 'Tijeras de jardín de acero inoxidable', 'precio_unitario' => 12.00, 'precio_compra' => 8.00, 'categoria_id' => $categorias[6]],
            ['nombre_producto' => 'Manguera de Jardín', 'descripcion_producto' => 'Manguera de jardín de 15 metros', 'precio_unitario' => 20.00, 'precio_compra' => 12.00, 'categoria_id' => $categorias[6]],
            ['nombre_producto' => 'Tornillos', 'descripcion_producto' => 'Caja de tornillos de 100 unidades', 'precio_unitario' => 5.00, 'precio_compra' => 3.00, 'categoria_id' => $categorias[7]],
            ['nombre_producto' => 'Clavos', 'descripcion_producto' => 'Caja de clavos de 200 unidades', 'precio_unitario' => 4.00, 'precio_compra' => 2.00, 'categoria_id' => $categorias[7]],
            ['nombre_producto' => 'Silicona', 'descripcion_producto' => 'Cartucho de silicona transparente', 'precio_unitario' => 7.00, 'precio_compra' => 5.00, 'categoria_id' => $categorias[8]],
            ['nombre_producto' => 'Pegamento Epóxico', 'descripcion_producto' => 'Pegamento epóxico de dos componentes', 'precio_unitario' => 10.00, 'precio_compra' => 7.00, 'categoria_id' => $categorias[8]],
            ['nombre_producto' => 'Llave de Cruz', 'descripcion_producto' => 'Llave de cruz para automóviles', 'precio_unitario' => 8.00, 'precio_compra' => 5.00, 'categoria_id' => $categorias[0]],
            ['nombre_producto' => 'Atornillador Eléctrico', 'descripcion_producto' => 'Atornillador eléctrico con batería recargable', 'precio_unitario' => 35.00, 'precio_compra' => 25.00, 'categoria_id' => $categorias[1]],
        ];

        foreach ($productos as $producto) {
            DB::table('productos')->insert([
                'nombre_producto' => $producto['nombre_producto'],
                'descripcion_producto' => $producto['descripcion_producto'],
                'precio_unitario' => $producto['precio_unitario'],
                'precio_compra' => $producto['precio_compra'],
                'categoria_id' => $producto['categoria_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
