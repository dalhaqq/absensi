<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContractSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('INSERT INTO `employee_contracts` (`id`, `employee_id`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
            (1, 1, \'2024-02-28\', \'2025-02-28\', \'2024-02-28 00:00:00\', \'2024-02-28 00:00:00\')');
    }
}
