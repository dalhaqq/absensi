<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProposalActionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'proposal_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'status' => [
                'type' => 'ENUM("pending", "approved", "rejected", "cancelled")',
                'default' => 'pending',
            ],
            'actor_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('proposal_actions', true);
    }

    public function down()
    {
        $this->forge->dropTable('proposal_actions');
    }
}
