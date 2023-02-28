<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    protected $primaryKey = 'activity_id';
    protected $fillable = [
        'name',
        'slug',
        'date',
        'description',
        'image',
    ];   
    
    public function getRouteKeyName(){
        return 'slug';
    }
}


