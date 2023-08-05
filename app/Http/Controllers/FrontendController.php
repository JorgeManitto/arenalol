<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use App\Models\Champion;
use App\Models\Sinergy;
use App\Models\Tier;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index() {
        $tiers = Champion::whereIn('tier',['S+','S'])->orderByRaw("FIELD(tier, 'S+','S', 'A', 'B', 'C')")->orderBy('win','desc')->paginate(10);
        // dd($tiers);
        $sinergies = Sinergy::join('champions AS first_champion', 'sinergies.first_champ', '=', 'first_champion.slug_name')
            ->join('champions AS second_champion', 'sinergies.second_champ', '=', 'second_champion.slug_name')
            ->select(
                'sinergies.*', 
                'first_champion.build AS first_champ_build', 
                'first_champion.argument AS first_champ_argument',
                'second_champion.build AS second_champ_build',
                'second_champion.argument AS second_champ_argument'
            )
            ->orderByRaw("FIELD(sinergies.tier, 'S+','S', 'A', 'B', 'C','D')")
            ->orderBy('sinergies.id', 'asc')
            ->paginate(10);
            // dd($tiers);
            $version = $this->lastVersion();
        return view('dashboard',compact('sinergies','tiers','version'));
    }
    function arguments(){
        $argumentsSilver    = Argument::where('type','silver')->get();
        $argumentsGold      = Argument::where('type','gold')->get();
        $argumentsPrismatic = Argument::where('type','prismatic')->get();
        $version = $this->lastVersion();

        return view('arguments',compact('argumentsSilver','argumentsGold','argumentsPrismatic','version'));
    }
    function synergy($id){
        $synergy = Sinergy::join('champions AS first_champion', 'sinergies.first_champ', '=', 'first_champion.slug_name')
            ->join('champions AS second_champion', 'sinergies.second_champ', '=', 'second_champion.slug_name')
            ->select(
                'sinergies.*', 
                'first_champion.build AS first_champ_build', 
                'first_champion.argument AS first_champ_argument',
                'second_champion.build AS second_champ_build',
                'second_champion.argument AS second_champ_argument'
            )->where('sinergies.id',$id)->first();
        $version = $this->lastVersion();
        return view('synergy',compact('synergy','version'));
    }
    function lastVersion() {
        $allVerions = "https://ddragon.leagueoflegends.com/api/versions.json";
        $client = new Client();

        try {
            $response = $client->get($allVerions);

            $data = json_decode($response->getBody(), true);
            
            return $data[0];
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['error' => 'Error al llamar a la API'], 500);
        }
    }
}
