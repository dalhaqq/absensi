<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code', 'name', 'type'
    ];

    const TYPES = [
        'head' => 'Head Office',
        'branch' => 'Branch'
    ];

    public function creator()
    {
        return $this->belongsTo(EmployeeModel::class, 'created_by');
    }

    public function employees()
    {
        return $this->hasMany(EmployeeModel::class, 'department_id');
    }
}