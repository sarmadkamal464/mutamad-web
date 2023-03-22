<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Traits\FilterTrait;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, FilterTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'username', 'role', 'category_id', 'resetToken', 'country', 'bio', 'phone', 'agreed_terms_of_conditions', 'wallet', 'wallet_balance', 'profile_image', 'is_active', 'deactivate_reason'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token', 'wallet'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isFreelancer()
    {
        return $this->role == 'freelancer' ? true : false;
    }

    public function scopeFreelancer(Builder $query)
    {
        return $query->where('role', 'freelancer');
    }


    public function scopeClient(Builder $query)
    {
        return $query->where('role', 'client');
    }
    //relationship
    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'freelancer_id');
    }

    public function clientProjects()
    {
        return $this->belongsToMany(Project::class, 'project_client', 'client_id', 'project_id');
    }

    public function freelancerProjects()
    {
        return $this->belongsToMany(Project::class, 'project_freelancer', 'freelancer_id', 'project_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = strtolower($value);
    }

    public function getCountryAttribute($value)
    {
        return ucfirst($value);
    }
}
