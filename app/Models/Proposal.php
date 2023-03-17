<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'freelancer_id', 'description', 'amount', 'proposal_type', 'status', 'status_change_by_user', 'status_change_by_user_id'];

    public function scopeOngoing(Builder $query)
    {
        return $query->where('status', 'ongoing');
    }

    public function scopeCompleted(Builder $query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending(Builder $query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCancelled(Builder $query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeProposal(Builder $query)
    {
        return $query->where('proposal_type', 'proposal');
    }

    public function scopeInvitation(Builder $query)
    {
        return $query->where('proposal_type', 'invitation');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }
}
