<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use App\Models\Sinergy;
use App\Models\Tier;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index() {
        $sinergies = Sinergy::orderByRaw("FIELD(tier, 'S', 'A', 'B', 'C')")->orderBy('id','desc')->get();
        $tiers = Tier::where('status','1')->orderByRaw("FIELD(tier, 'S', 'A', 'B', 'C')")->orderBy('id','desc')->get();

        return view('dashboard',compact('sinergies','tiers'));
    }
    function arguments(){
        $argumentsSilver    = Argument::where('type','silver')->get();
        $argumentsGold      = Argument::where('type','golden')->get();
        $argumentsPrismatic = Argument::where('type','prismatic')->get();

        return view('arguments',compact('argumentsSilver','argumentsGold','argumentsPrismatic'));
    }
}
