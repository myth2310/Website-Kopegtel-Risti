<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $primaryKey = 'member_id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'position',
        'image',
        'status',
    ];
}
