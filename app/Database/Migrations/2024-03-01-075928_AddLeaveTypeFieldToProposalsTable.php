<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLeaveTypeFieldToProposalsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('proposals', [
            'leave_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'type'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('proposals', 'leave_type');
    }
}
