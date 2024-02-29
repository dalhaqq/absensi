<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\DepartmentModel;
use CodeIgniter\HTTP\ResponseInterface;

class Departments extends BaseController
{
    public function index()
    {
        $title = 'Departments';
        $departments = DepartmentModel::with('creator')->withCount('employees')->orderBy('type')->get();
        return view('departments/index', compact('title', 'departments'));
    }

    public function create()
    {
        $title = 'Create Department';
        $types = DepartmentModel::TYPES;
        return view('departments/create', compact('title', 'types'));
    }

    public function store()
    {
        $rules = [
            'code' => 'required|is_unique[departments.code]',
            'name' => 'required',
            'type' => 'required',
        ];

        $messages = [
            'code' => [
                'required' => 'Code is required',
                'is_unique' => 'Code has been taken',
            ],
            'name' => [
                'required' => 'Name is required',
            ],
            'type' => [
                'required' => 'Type is required',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $department = new DepartmentModel();
        $department->fill($this->request->getPost());
        $department->created_by = session('id');
        $department->save();

        return redirect('departments')->with('success', 'Department has been created');
    }

    public function edit($id)
    {
        $title = 'Edit Department';
        $department = DepartmentModel::findOrFail($id);
        $types = DepartmentModel::TYPES;
        return view('departments/edit', compact('title', 'department', 'types'));
    }

    public function update($id)
    {
        $rules = [
            'code' => 'required|is_unique[departments.code,id,' . $id . ']',
            'name' => 'required',
            'type' => 'required',
        ];

        $messages = [
            'code' => [
                'required' => 'Code is required',
                'is_unique' => 'Code has been taken',
            ],
            'name' => [
                'required' => 'Name is required',
            ],
            'type' => [
                'required' => 'Type is required',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $department = DepartmentModel::findOrFail($id);
        $department->fill($this->request->getPost());
        $department->save();

        return redirect('departments')->with('success', 'Department has been updated');
    }

    public function destroy($id)
    {
        $department = DepartmentModel::findOrFail($id);
        foreach ($department->employees as $employee) {
            $employee->department_id = null;
            $employee->save();
        }
        $department->delete();
        return redirect('departments')->with('success', 'Department has been deleted');
    }
}
