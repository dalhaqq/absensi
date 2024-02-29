<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class ProposalActionModel extends Model
{
    protected $table = 'proposal_actions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'proposal_id', 'status', 'actor_id'
    ];
}