<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterTrait;

class Project extends Model
{
    use SoftDeletes, FilterTrait;

    use HasFactory;
    protected $duration;
    protected $fillable = ['category_id', 'title', 'description', 'budget', 'duration_id', 'client_id', 'document', 'status'];
    // Is assign or invite able if it's open

    public function scopeInvitation(Builder $query)
    {
        return $query->where('proposal_type', 'invitation');
    }

    public function scopeOngoing(Builder $query)
    {
        return $query->where('status', 'ongoing');
    }

    public function scopeCompleted(Builder $query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeOpen(Builder $query)
    {
        return $query->where('status', 'open');
    }

    public function scopeCancelled(Builder $query)
    {
        return $query->where('status', 'cancelled');
    }

    public function clients(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function duration(): BelongsTo
    {
        return $this->belongsTo(ProjectDuration::class, 'duration_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function invitations()
    {
        return $this->hasMany(Proposal::class, 'project_id')->where('proposal_type', 'invitation');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'project_id')->where('proposal_type', 'proposal');
    }
    public function getBudgetAttribute($value)
    {
        return '$' . $value;
    }
}
