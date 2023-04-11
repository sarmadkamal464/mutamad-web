<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Traits\FilterTrait;
use App\Models\Category;
use App\Traits\CountryTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use App\Traits\DateFormatTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, DateFormatTrait, Notifiable, FilterTrait, CountryTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $appends=['short_name'];
    protected $fillable = ['name', 'email', 'password', 'username', 'role', 'category_id', 'resetToken', 'country', 'bio', 'phone', 'agreed_terms_of_conditions', 'wallet', 'wallet_balance', 'profile_image', 'is_active', 'deactivate_reason', 'earning'];

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

    protected function scopeActive(Builder $query)
    {
        return $query->where('is_active', 1);
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

    public function getWalletBalanceAttribute($value)
    {
        return '$' . $value;
    }

    public function getEarningAttribute($value)
    {
        if ($value >= 1000000) {
            return '$' . number_format(round($value / 1000000, 1), 1) . 'm+';
        } elseif ($value >= 1000) {
            return '$' . number_format(round($value / 1000, 1), 1) . 'k+';
        } elseif ($value >= 100) {
            return '$' . number_format($value, 0) . '+';
        } elseif ($value >= 10) {
            return '$' . number_format($value, 0);
        } else {
            return '$' . $value;
        }
    }

    public function getShortNameAttribute()
    {
        $value = $this->name;
        $name = explode(" ",$value);
        if(count($name) >= 2)
            return $name[0] . ' ' . $name[1];
        return $value;
    }
}
