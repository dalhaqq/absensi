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

    public function location()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://geocode.maps.co/reverse?lat={$this->visit_lat}&lon={$this->visit_long}&api_key=65e03211ae503571510060jzw8ad4af",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response['display_name'];
    }
}