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
        if ($proposal->visit_long && $proposal->visit_lat) {
            $proposal->location = $this->getLocation($proposal->visit_lat, $proposal->visit_long);
        } else {
            $proposal->location = '-';
        }
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

    private function getLocation($lat, $long)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://geocode.maps.co/reverse?lat={$lat}&lon={$long}&api_key=65e03211ae503571510060jzw8ad4af",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        $done = false;
        $result = null;
        while (!$done) {
            try {
                $response = curl_exec($curl);
                $result = json_decode($response, true);
                $done = true;
            } catch (\Exception $e) {
                sleep(1);
            }
        }
        curl_close($curl);
        return $result['display_name'];
    }
}
