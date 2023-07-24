<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'name',
    'description',
    'plaintext',
    'image',
    'into',
    'stats',
    'gold',
    'name_esp',
    'description_esp',
    'plaintext_esp'
    ];
}
