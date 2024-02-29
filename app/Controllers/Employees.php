<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\DepartmentModel;
use App\Models\Eloquent\EmployeeModel;
use App\Models\Eloquent\RoleModel;
use Carbon\Carbon;
use CodeIgniter\HTTP\ResponseInterface;

class Employees extends BaseController
{
    public function index()
    {
        $title = 'Employees';
        $employees = EmployeeModel::with([
            'role', 'department',
            'contracts' => fn ($query) => $query->orderBy('date_start', 'desc')
        ])->get();
        $contractsAboutToExpire = $employees->filter(function ($employee) {
            return $employee->contracts[0]->date_end < time_now()->addWeek()->toDateString();
        });
        $activeEmployees = $employees->filter(function ($employee) {
            return $employee->contracts[0]->date_end >= time_now()->toDateString();
        });
        return view('employees/index', compact('title', 'employees', 'contractsAboutToExpire', 'activeEmployees'));
    }

    public function updateContract($id)
    {
        $employee = EmployeeModel::with(['contracts' => fn ($query) => $query->orderBy('date_start', 'desc')])->findOrFail($id);
        $contract = $employee->contracts->first();
        $date_end = Carbon::createFromFormat('Y-m-d', $contract->date_end);
        $employee->contracts()->create([
            'date_start' => $date_end->addDay()->toDateString(),
            'date_end' => $date_end->addMonths(6)->toDateString(),
        ]);
        return redirect('employees')->with('success', 'Contract has been updated');
    }

    public function create()
    {
        $title = 'Create Employee';
        $roles = RoleModel::all();
        $departments = DepartmentModel::all();
        return view('employees/create', compact('title', 'roles', 'departments'));
    }

    public function store()
    {
        $rules = [
            'code' => 'required|is_unique[employees.code]',
            'password' => 'required|min_length[6]',
            'name' => 'required',
            'position' => 'required',
            'date_joined' => 'required',
            'role_id' => 'required|is_not_unique[roles.id]',
            'department_id' => 'required|is_not_unique[departments.id]',
        ];

        $messages = [
            'code' => [
                'required' => 'Code is required',
                'is_unique' => 'Code has been taken',
            ],
            'password' => [
                'required' => 'Password is required',
                'min_length' => 'Password must be at least 6 characters',
            ],
            'name' => [
                'required' => 'Name is required',
            ],
            'position' => [
                'required' => 'Position is required',
            ],
            'date_joined' => [
                'required' => 'Date joined is required',
            ],
            'role_id' => [
                'required' => 'Role is required',
                'is_not_unique' => 'Role is not valid',
            ],
            'department_id' => [
                'required' => 'Department is required',
                'is_not_unique' => 'Department is not valid',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $employee = new EmployeeModel();
        $employee->fill($this->request->getPost());
        $employee->password = password_hash($employee->code, PASSWORD_DEFAULT);
        $employee->created_by = session('id');
        $employee->save();

        // convert date_joined to Carbon
        $date_joined = Carbon::createFromFormat('Y-m-d', $employee->date_joined);

        $contract = $employee->contracts()->create([
            'date_start' => $employee->date_joined,
            'date_end' => $date_joined->addMonths(6)->subDay()->toDateString(),
            'position' => $employee->position,
            'department_id' => $employee->department_id,
            'created_by' => session('id'),
        ]);

        return redirect('employees')->with('success', 'Employee has been created');
    }

    public function edit($id)
    {
        $title = 'Edit Employee';
        $employee = EmployeeModel::findOrFail($id);
        $roles = RoleModel::all();
        $departments = DepartmentModel::all();
        return view('employees/edit', compact('title', 'employee', 'roles', 'departments'));
    }

    public function update($id)
    {
        $rules = [
            'code' => 'required|is_unique[employees.code,id,' . $id . ']',
            'password' => 'permit_empty|min_length[6]',
            'name' => 'required',
            'position' => 'required',
            'role_id' => 'required|is_not_unique[roles.id]',
            'department_id' => 'required|is_not_unique[departments.id]',
        ];

        $messages = [
            'code' => [
                'required' => 'Code is required',
                'is_unique' => 'Code has been taken',
            ],
            'password' => [
                'min_length' => 'Password must be at least 6 characters',
            ],
            'name' => [
                'required' => 'Name is required',
            ],
            'position' => [
                'required' => 'Position is required',
            ],
            'role_id' => [
                'required' => 'Role is required',
                'is_not_unique' => 'Role is not valid',
            ],
            'department_id' => [
                'required' => 'Department is required',
                'is_not_unique' => 'Department is not valid',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $employee = EmployeeModel::findOrFail($id);
        $password = $this->request->getPost('password') ? password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT) : $employee->password;
        $employee->fill($this->request->getPost());
        $employee->password = $password;
        $employee->save();

        return redirect('employees')->with('success', 'Employee has been updated');
    }

    public function destroy($id)
    {
        $employee = EmployeeModel::findOrFail($id);
        foreach ($employee->contracts as $contract) {
            $contract->delete();
        }
        if ($employee->admin) {
            $employee->admin->delete();
        }
        $employee->delete();
        return redirect('employees')->with('success', 'Employee has been deleted');
    }
}
