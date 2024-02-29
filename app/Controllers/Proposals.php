<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\ProposalModel;
use CodeIgniter\HTTP\ResponseInterface;

class Proposals extends BaseController
{
    public function create()
    {
        $title = 'Create Proposal';
        return view('proposals/create', compact('title'));
    }

    public function store()
    {
        $rules = [
            'date_start' => 'required',
            'date_end' => 'required',
            'type' => 'required',
            'visit_long' => 'permit_empty|numeric',
            'visit_lat' => 'permit_empty|numeric',
            'description' => 'permit_empty',
        ];
        $messages = [
            'date_start' => [
                'required' => 'Date start is required',
            ],
            'date_end' => [
                'required' => 'Date end is required',
            ],
            'type' => [
                'required' => 'Type is required',
            ],
            'visit_long' => [
                'numeric' => 'Visit long must be a number',
            ],
            'visit_lat' => [
                'numeric' => 'Visit lat must be a number',
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // Save the proposal
        $proposal = new ProposalModel();
        $proposal->employee_id = get_user()->id;
        $proposal->department_id = get_user()->department_id;
        $proposal->date_start = $this->request->getPost('date_start');
        $proposal->date_end = $this->request->getPost('date_end');
        $proposal->type = $this->request->getPost('type');
        $proposal->visit_long = $this->request->getPost('visit_long') ?: null;
        $proposal->visit_lat = $this->request->getPost('visit_lat') ?: null;
        $proposal->description = $this->request->getPost('description');
        $proposal->save();
        return redirect()->route('proposals.pending')->with('success', 'Proposal created.');
    }

    public function pending()
    {
        $title = 'Pending Proposals';
        $proposals = ProposalModel::doesntHave('action')->where('employee_id', get_user()->id)->get();
        return view('proposals/pending', compact('title', 'proposals'));
    }

    public function history()
    {
        $title = 'Proposal History';
        $proposals = ProposalModel::whereHas('action')->where('employee_id', get_user()->id)->get();
        return view('proposals/history', compact('title', 'proposals'));
    }

    public function cancel($id)
    {
        $proposal = ProposalModel::find($id);
        $proposal->action()->create([
            'status' => 'cancelled',
            'actor_id' => get_user()->id,
        ]);
        return redirect()->route('proposals.pending')->with('success', 'Proposal canceled.');
    }
}
