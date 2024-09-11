<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Productos extends Migration
{
    public function up()
    {
        //Creacion de tablas mediante FrameWork
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'Descripcion' => [
                'type' => 'TINYTEXT', //255 caracteres maxico
                'null' => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        



    }

    public function down()
    {
        //Eliminar Tabla
        $this->forge->dropTable('Productos');
    }
}
