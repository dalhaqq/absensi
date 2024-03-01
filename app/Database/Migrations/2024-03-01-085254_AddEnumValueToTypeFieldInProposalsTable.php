<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEnumValueToTypeFieldInProposalsTable extends Migration
{
    public function up()
    {
        $this->db->simpleQuery("ALTER TABLE proposals MODIFY COLUMN type ENUM('visit', 'leave', 'late', 'sick')");
    }

    public function down()
    {
        $this->db->simpleQuery("ALTER TABLE proposals MODIFY COLUMN type ENUM('visit', 'leave', 'late')");
    }
}
