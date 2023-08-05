<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Argument extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'name_esp',
    'pick',
    'tier',
    'games',
    'description',
    'description_esp',
    'type',
    'src',
    ];
}
