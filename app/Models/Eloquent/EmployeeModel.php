<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code', 'password', 'name', 'position', 'date_joined', 'department_id', 'role_id', 'created_by',
    ];
    protected $hidden = ['password'];

    public function admin()
    {
        return $this->hasOne(AdminModel::class, 'employee_id');
    }

    public function isAdmin()
    {
        return $this->admin != null;
    }

    public function isSuperAdmin()
    {
        return $this->admin != null && $this->admin->is_super;
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class);
    }

    public function department()
    {
        return $this->belongsTo(DepartmentModel::class);
    }

    public function contracts()
    {
        return $this->hasMany(EmployeeContractModel::class, 'employee_id');
    }

    public function creator()
    {
        return $this->belongsTo(EmployeeModel::class, 'created_by');
    }
}