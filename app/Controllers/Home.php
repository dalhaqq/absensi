<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\DepartmentModel;
use App\Models\Eloquent\EmployeeModel;
use App\Models\Eloquent\ProposalModel;
use App\Models\RoleModel;
use Carbon\Carbon;

class Home extends BaseController
{
    public function index(): string
    {
        $title = 'Home';
        $user = get_user();
        $employees = EmployeeModel::count();
        $now = time_now();
        $hakCuti = 17;
        $cutiApproved = ProposalModel::whereHas('action', function ($query) {
            $query->where('status', 'approved');
        })->where('type', 'leave')->where('employee_id', $user->id)->count();
        $sisaCuti = $hakCuti - $cutiApproved;
        $today = ProposalModel::where('date_start', '<=', $now)
            ->where('date_end', '>=', $now)
            ->get();
        $leaveCount = $today->where('type', 'leave')->count();
        $visitCount = $today->where('type', 'visit')->count();
        $lateCount  = $today->where('type', 'late')->count();
        return view('home', compact('title', 'user', 'leaveCount', 'visitCount', 'lateCount', 'hakCuti', 'sisaCuti', 'cutiApproved'));
    }

    public function forbidden(): string
    {
        return view('forbidden', ['title' => 'Forbidden']);
    }
}
