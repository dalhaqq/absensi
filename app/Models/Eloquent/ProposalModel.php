<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class ProposalModel extends Model
{
    protected $table = 'proposals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id', 'department_id', 'date_start', 'date_end', 'type', 'visit_long', 'visit_lat', 'description'
    ];
    protected $casts = [
        'date_start' => 'datetime',
        'date_end' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }

    public function department()
    {
        return $this->belongsTo(DepartmentModel::class, 'department_id');
    }

    public function action()
    {
        return $this->hasOne(ProposalActionModel::class, 'proposal_id');
    }
}