<?php

namespace App\Database\Seeds;

use App\Models\AdminModel;
use App\Models\DepartmentModel;
use App\Models\EmployeeModel;
use App\Models\RoleModel;
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

        $role = new RoleModel();
        $role->insert([
            'name' => 'Supervisor',
            'code' => 'SPV',
        ]);
        $role->insert([
            'name' => 'Staff',
            'code' => 'STF',
        ]);
        $department = new DepartmentModel();
        $department->insert([
            'name' => 'IT Department',
            'code' => 'IT',
            'type' => DepartmentModel::TYPE_HEAD_OFFICE,
            'created_by' => 1,
        ]);
        $department->insert([
            'name' => 'Branch A',
            'code' => 'BA',
            'type' => DepartmentModel::TYPE_BRANCH,
            'created_by' => 1,
        ]);
        $employee = new EmployeeModel();
        $employee->insert([
            'code' => 'EMP001',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'name' => 'John Doe',
            'position' => 'Programmer',
            'date_joined' => '2024-02-28',
            'department_id' => 1,
            'role_id' => 1,
            'created_by' => 1,
        ]);
        $admin = new AdminModel();
        $admin->insert([
            'employee_id' => 1,
            'is_super' => 1,
        ]);
    }
}
