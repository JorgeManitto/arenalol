<?php

namespace App\Http\Livewire\Front;

use App\Models\Champion;
use Livewire\Component;

class Solo extends Component
{
    public $perPage = 10;
    public $version = '';
    protected $listeners = ['loadMore' => 'loadMore'];

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function render()
    {
        $tiers = Champion::whereIn('tier',['S+','S','A','B','C','D'])
        ->orderByRaw("FIELD(tier, 'S+','S', 'A', 'B', 'C', 'D')")
        ->orderBy('win','desc')
        ->take($this->perPage)
        ->get();
        // dd($tiers);
        return view('livewire.front.solo',compact('tiers'));
    }
}
