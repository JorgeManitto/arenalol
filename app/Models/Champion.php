<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'slug_name',
    'tier',
    'win',
    'pick',
    'ban',
    'games',
    'build',
    'itemsSituacional',
    'argument',
    'skill_order',
    'best_duo',
    'bad_duo',
    'to_counter',
    'best_for',
    'version',
    'title',
    'info',
    'image',
    'tags',
    'partype',
    'stats',
    'key',
    ];
    function argument($id) {
        
        return Argument::where('id',$id)->first();
    }
    function duo($id) {
        
        return Champion::where('id',$id)->first();
    }
}
