<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EmployeeContractModel extends Model
{
    protected $table = 'employee_contracts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id', 'date_start', 'date_end',
    ];
}