<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\ProposalModel;
use CodeIgniter\HTTP\ResponseInterface;

class Approvals extends BaseController
{
    public function pending()
    {
        $title = 'Approvals Pending';
        $proposals = ProposalModel::doesntHave('action')->where('department_id', get_user()->department_id)->get();
        return view('approvals/pending', compact('title', 'proposals'));
    }

    public function approve($id)
    {
        $proposal = ProposalModel::find($id);
        $proposal->action()->create([
            'status' => 'approved',
            'actor_id' => get_user()->id
        ]);
        return redirect()->route('approvals.history')->with('success', 'Proposal approved.');
    }

    public function reject($id)
    {
        $proposal = ProposalModel::find($id);
        $proposal->action()->create([
            'status' => 'rejected',
            'actor_id' => get_user()->id
        ]);
        return redirect()->route('approvals.history')->with('success', 'Proposal rejected.');
    }

    public function history()
    {
        $title = 'Approvals History';
        $proposals = ProposalModel::with('employee')->whereHas('action', function ($query) {
            return $query->where('actor_id', get_user()->id);
        })->where('department_id', get_user()->department_id)->latest()->get();
        return view('approvals/history', compact('title', 'proposals'));
    }
}
