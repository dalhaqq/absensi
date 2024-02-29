<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class EmployeeContractModel extends Model
{
    protected $table = 'employee_contracts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id', 'date_start', 'date_end',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class);
    }
}