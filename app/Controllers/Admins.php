<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\AdminModel;
use App\Models\Eloquent\EmployeeModel;
use CodeIgniter\HTTP\ResponseInterface;

class Admins extends BaseController
{
    public function index()
    {
        $title = 'Admins';
        $admins = AdminModel::with('employee')->get();
        $employees = EmployeeModel::doesntHave('admin')->get(); // Get employees who are not yet admins
        return view('admins/index', compact('title', 'admins', 'employees'));
    }

    public function create()
    {
        $title = 'Create Admin';
        $employees = EmployeeModel::doesntHave('admin')->get();
        return view('admins/create', compact('title', 'employees'));
    }

    public function store()
    {
        $rules = [
            'employee_id' => 'required|numeric',
            'is_super' => 'in_list[0,1]'
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $admin = new AdminModel();
        $admin->employee_id = $this->request->getPost('employee_id');
        $admin->is_super = $this->request->getPost('is_super') ? 1 : 0;
        $admin->save();
        return redirect()->route('admins')->with('success', 'Admin created.');
    }

    public function edit($id)
    {
        $title = 'Edit Admin';
        $admin = AdminModel::with('employee')->find($id);
        return view('admins/edit', compact('title', 'admin'));
    }

    public function update($id)
    {
        $rules = [
            'is_super' => 'in_list[0,1]'
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $admin = AdminModel::find($id);
        $admin->is_super = $this->request->getPost('is_super') ? 1 : 0;
        $admin->save();
        return redirect()->route('admins')->with('success', 'Admin updated.');
    }

    public function destroy($id)
    {
        $admin = AdminModel::find($id);
        $admin->delete();
        return redirect()->route('admins')->with('success', 'Admin deleted.');
    }
}
