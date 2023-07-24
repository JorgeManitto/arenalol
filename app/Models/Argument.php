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
    'description',
    'description_esp',
    'type',
    ];
}