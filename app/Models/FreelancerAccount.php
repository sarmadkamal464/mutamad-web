<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerAccount extends Model
{
    use HasFactory;
        protected $table = 'freelancer_accounts';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'email',
        'bank_name',
        'account_number',
        'routing_number',
        'account_name',
        'user_id',
        'account_id',
    ];
}
