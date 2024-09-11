<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Empleados extends Migration
{
    public function up()
    {
        //Empelados
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'fecha_nacimiento' => [
                'type' => 'DATE', //255 caracteres maxico             
            ],
            'telefono' => [
                'type' => 'VARCHAR', //255 caracteres maxico
                'constraint' => 20,

            ],
            'email' => [
                'type' => 'VARCHAR', //255 caracteres maxico
                'constraint' => 50,
                'null' => true,
            ],
            'id_departamento' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_departamento','productos','id');
        $this->forge->createTable('Empleados');
    }

    public function down()
    {
        $this->forge->dropTable('Empleados');
    }
}
