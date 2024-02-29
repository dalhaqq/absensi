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

        RoleModel::create([
            'name' => 'Supervisor',
            'code' => 'SPV',
        ]);
        RoleModel::create([
            'name' => 'Staff',
            'code' => 'STF',
        ]);
        DepartmentModel::create([
            'name' => 'IT Department',
            'code' => 'IT',
            'type' => 'head',
            'created_by' => 1,
        ]);
        DepartmentModel::create([
            'name' => 'Branch A',
            'code' => 'BA',
            'type' => 'branch',
            'created_by' => 1,
        ]);
        EmployeeModel::create([
            'code' => 'EMP001',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'name' => 'John Doe',
            'position' => 'Programmer',
            'date_joined' => '2024-02-28',
            'department_id' => 1,
            'role_id' => 1,
            'created_by' => 1,
        ]);
        AdminModel::create([
            'employee_id' => 1,
            'is_super' => 1,
        ]);
    }
}
