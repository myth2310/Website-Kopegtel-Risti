<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;
    protected $primaryKey = 'content_id';
    protected $fillable = [
        'name',
        'image',
    ];    
}
