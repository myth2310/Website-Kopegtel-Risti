<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;
    protected $primaryKey = 'document_id';
    protected $fillable = [
        'fileName',
        'fileType',
        'file',
    ];     
}
