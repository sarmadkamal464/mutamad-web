<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, DateFormatTrait;
    protected $fillable = ['freelancer_id', 'client_id', 'project_id', 'for', 'rating', 'comment'];
}
