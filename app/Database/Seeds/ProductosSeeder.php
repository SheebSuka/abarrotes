<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'nombre' => 'abarrotes',
            ],
            [
                'nombre' => 'verduras',

            ],
            [
                'nombre' => 'refrigerados',

            ],
            [
                'nombre' => 'congelados',

            ],
            [
                'nombre' => 'bebidas',

            ],

        ];
            $this->db->table('productos')->insertBatch($data);

    }
}
