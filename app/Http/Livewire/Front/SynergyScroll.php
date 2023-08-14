<?php

namespace App\Http\Livewire\Front;

use App\Models\Sinergy;
use GuzzleHttp\Client;
use Livewire\Component;

class SynergyScroll extends Component
{
    public $perPage = 10;
    public $version = '';
    protected $listeners = ['loadMore' => 'loadMore'];

    public function loadMore()
    {
        $this->perPage += 10;
    }
    function mount(){
        // $this->version = $this->lastVersion();
        // $this->version = '2323232';
    }
    public function render()
    {
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
            ->take($this->perPage)
            ->get();

        return view('livewire.front.synergy-scroll',compact('sinergies'));
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
