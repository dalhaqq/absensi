<?php

namespace App\Database\Seeds;

use App\Models\Eloquent\AdminModel;
use App\Models\Eloquent\DepartmentModel;
use App\Models\Eloquent\EmployeeModel;
use App\Models\Eloquent\RoleModel;
use CodeIgniter\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->table('roles')->truncate();
        $this->db->table('departments')->truncate();
        $this->db->table('employees')->truncate();
        $this->db->table('admins')->truncate();

        $this->db->query('INSERT INTO `roles` (`id`, `name`, `code`) VALUES
            (1, \'Dept Head\', \'SPV\'),
            (2, \'Staff\', \'STF\')');
        $this->db->query('INSERT INTO `departments` (`id`, `name`, `code`, `type`, `created_by`) VALUES
            (1, \'IT Department\', \'IT\', \'head\', 1),
            (2, \'Branch A\', \'BA\', \'branch\', 1)');
        $pass = password_hash('password', PASSWORD_DEFAULT);
        $this->db->query('INSERT INTO `employees` (`id`, `code`, `password`, `name`, `position`, `date_joined`, `department_id`, `role_id`, `created_by`) VALUES
            (1, \'EMP001\', \'' . $pass . '\', \'John Doe\', \'Programmer\', \'2024-02-28\', 1, 1, 1)');
        $this->db->query('INSERT INTO `admins` (`employee_id`, `is_super`) VALUES
            (1, 1)');
    }
}
