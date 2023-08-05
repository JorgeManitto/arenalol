<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinergy extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'first_name',
        'first_champ',
        'second_name',
        'second_champ',
        'first_item',
        'second_item',
        'first_argument',
        'second_argument',
        'status',
        'tier',
        'dificulty',
        'win',
        'pick',
    ];

    function items($id) {
        dd($id);
        return Item::find($id)->get();
    }
    function argument($id) {
        
        return Argument::where('id',$id)->first();
    }
}
