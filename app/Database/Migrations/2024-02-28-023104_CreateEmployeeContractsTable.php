<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeeContractsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'employee_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'date_start' => [
                'type' => 'DATE',
            ],
            'date_end' => [
                'type' => 'DATE',
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('employee_contracts', true);
    }

    public function down()
    {
        $this->forge->dropTable('employee_contracts');
    }
}
