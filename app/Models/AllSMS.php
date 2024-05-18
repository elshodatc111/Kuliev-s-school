<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllSMS extends Model{
    use HasFactory;
    protected $fillable = [
        'admin',
        'status',
        'text'
    ];
}
