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
        $employees = EmployeeModel::whereHas('contracts', function ($query) use ($now) {
            $tomorrow = (clone $now)->addDay();
            $query->where('date_end', '>=', $now)->where('date_end', '<=', $tomorrow);
        })->count();
        $today = ProposalModel::where('date_start', '<=', $now)
            ->where('date_end', '>=', $now)
            ->get();
        $leaveCount = $today->where('type', 'leave')->count();
        $visitCount = $today->where('type', 'visit')->count();
        $lateCount  = $today->where('type', 'late')->count();
        return view('home', compact('title', 'user', 'employees', 'leaveCount', 'visitCount', 'lateCount'));
    }

    public function forbidden(): string
    {
        return view('forbidden', ['title' => 'Forbidden']);
    }
}
