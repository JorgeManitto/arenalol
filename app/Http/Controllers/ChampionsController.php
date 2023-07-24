<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChampionsController extends Controller
{
    function Champion(Request $request){
        $name = $request->name;
        
        return view('champion',compact('name'));
    }
}
