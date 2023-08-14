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
        $tiers = Champion::whereIn('tier',['S+','S','A','B','C','D'])->orderByRaw("FIELD(tier, 'S+','S', 'A', 'B', 'C', 'D')")->orderBy('win','desc')->paginate(10);
        $version = $this->lastVersion();
        return view('dashboard',compact('tiers','version'));
    }
    function arguments(){
        $argumentsSilver    = Argument::where('type','silver')->get();
        $argumentsGold      = Argument::where('type','gold')->get();
        $argumentsPrismatic = Argument::where('type','prismatic')->get();
        $version = $this->lastVersion();

        return view('arguments',compact('argumentsSilver','argumentsGold','argumentsPrismatic','version'));
    }
    function synergy($id,$names){
        $synergy = Sinergy::join('champions AS first_champion', 'sinergies.first_champ', '=', 'first_champion.slug_name')
            ->join('champions AS second_champion', 'sinergies.second_champ', '=', 'second_champion.slug_name')
            ->select(
                'sinergies.*', 
                'first_champion.build AS first_champ_build', 
                'first_champion.itemsSituacional AS first_champ_build_situacional', 
                'first_champion.argument AS first_champ_argument',
                'second_champion.build AS second_champ_build',
                'second_champion.itemsSituacional AS second_champ_build_situacional',
                'second_champion.argument AS second_champ_argument'
            )->where('sinergies.id',$id)->first();
        $version = $this->lastVersion();
        return view('synergy',compact('synergy','version'));
    }
    function lastVersion() {
        return '13.15.1';
        // $allVerions = "https://ddragon.leagueoflegends.com/api/versions.json";
        // $client = new Client();

        // try {
        //     $response = $client->get($allVerions);

        //     $data = json_decode($response->getBody(), true);
            
        //     return $data[0];
        // } catch (\Exception $e) {
        //     dd($e);
        //     return response()->json(['error' => 'Error al llamar a la API'], 500);
        // }
    }
    function champions() {
        $version = $this->lastVersion();
        return view('champions',compact('version'));
    }
    function champion($slug_name) {
        $champion = Champion::where('slug_name',$slug_name)->first();
        // dd($champion);
        $info_index = [];
        $info_value = [];

        $info = json_decode($champion->info);

        foreach ($info as $key => $value) {
            array_push($info_index,$key);
            array_push($info_value,$value);
        }
        $version = $this->lastVersion();
        return view('champion',compact('champion','info_index','info_value','version'));
    }
    function solo(){
        return view('solo');
    }
}
