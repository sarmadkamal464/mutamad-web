<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeClient extends Model
{
    use HasFactory;
    protected $table = 'stripe_customers';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'customer_id',
        'user_id',
        'payment_method_id',
    ];
}
