<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
        protected $table = 'freelancer_accounts';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'bank_name',
        'account_number',
        'routing_number',
        'account_name',
        'user_id',
    ];
}
