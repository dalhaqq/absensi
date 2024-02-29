<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProposalsTable extends Migration
{
    public function up()
    {
        // id integer [primary key]
        // employee_id integer
        // date_start datetime
        // date_end datetime
        // type proposal_type
        // visit_long float
        // visit_lat float
        // description text
        // created_at DATETIME
        // updated_at DATETIME
        // deleted_at DATETIME
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
            'department_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'date_start' => [
                'type' => 'DATETIME',
            ],
            'date_end' => [
                'type' => 'DATETIME',
            ],
            'type' => [
                'type' => 'ENUM("visit", "leave", "late")',
                'default' => 'visit',
            ],
            'visit_long' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'visit_lat' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('proposals', true);
    }

    public function down()
    {
        $this->forge->dropTable('proposals');
    }
}
