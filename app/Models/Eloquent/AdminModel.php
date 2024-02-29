<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{    
    protected $table = 'admins';
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'employee_id', 'is_super'
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }
}