<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLocationFieldToProposalsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('proposals', [
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'after' => 'visit_lat',
                'default' => '-'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('proposals', 'location');
    }
}
