<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SetReferences1 extends Migration
{
    public function up()
    {
        // Ref: admins.employee_id > employees.id
        // Ref: employees.role_id > roles.id
        // Ref: employees.department_id > departments.id
        // Ref: employees.created_by > employees.id
        // Ref: departments.created_by > employees.id
        // Ref: employee_contracts.employee_id > employees.id
        // Ref: proposals.employee_id > employees.id
        // Ref: proposal_actions.proposal_id > proposals.id
        // Ref: proposal_actions.actor_id > employees.id
        $this->db->query('ALTER TABLE admins ADD CONSTRAINT admins_employee_id_foreign FOREIGN KEY (employee_id) REFERENCES employees (id)');
        $this->db->query('ALTER TABLE employees ADD CONSTRAINT employees_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->db->query('ALTER TABLE employees ADD CONSTRAINT employees_department_id_foreign FOREIGN KEY (department_id) REFERENCES departments (id)');
        $this->db->query('ALTER TABLE employees ADD CONSTRAINT employees_created_by_foreign FOREIGN KEY (created_by) REFERENCES employees (id)');
        $this->db->query('ALTER TABLE departments ADD CONSTRAINT departments_created_by_foreign FOREIGN KEY (created_by) REFERENCES employees (id)');
        $this->db->query('ALTER TABLE employee_contracts ADD CONSTRAINT employee_contracts_employee_id_foreign FOREIGN KEY (employee_id) REFERENCES employees (id)');
        $this->db->query('ALTER TABLE proposals ADD CONSTRAINT proposals_employee_id_foreign FOREIGN KEY (employee_id) REFERENCES employees (id)');
        $this->db->query('ALTER TABLE proposals ADD CONSTRAINT proposal_department_id_foreign FOREIGN KEY (department_id) REFERENCES departments (id)');
        $this->db->query('ALTER TABLE proposal_actions ADD CONSTRAINT proposal_actions_proposal_id_foreign FOREIGN KEY (proposal_id) REFERENCES proposals (id)');
        $this->db->query('ALTER TABLE proposal_actions ADD CONSTRAINT proposal_actions_actor_id_foreign FOREIGN KEY (actor_id) REFERENCES employees (id)');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE admins DROP FOREIGN KEY admins_employee_id_foreign');
        $this->db->query('ALTER TABLE employees DROP FOREIGN KEY employees_role_id_foreign');
        $this->db->query('ALTER TABLE employees DROP FOREIGN KEY employees_department_id_foreign');
        $this->db->query('ALTER TABLE employees DROP FOREIGN KEY employees_created_by_foreign');
        $this->db->query('ALTER TABLE departments DROP FOREIGN KEY departments_created_by_foreign');
        $this->db->query('ALTER TABLE employee_contracts DROP FOREIGN KEY employee_contracts_employee_id_foreign');
        $this->db->query('ALTER TABLE proposals DROP FOREIGN KEY proposals_employee_id_foreign');
        $this->db->query('ALTER TABLE proposals DROP FOREIGN KEY proposal_department_id_foreign');
        $this->db->query('ALTER TABLE proposal_actions DROP FOREIGN KEY proposal_actions_proposal_id_foreign');
        $this->db->query('ALTER TABLE proposal_actions DROP FOREIGN KEY proposal_actions_actor_id_foreign');
    }
}
