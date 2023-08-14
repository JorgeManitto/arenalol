<?php

namespace App\Http\Livewire\Front;

use App\Models\Champion;
use Livewire\Component;

class Champions extends Component
{
    public $perPage = 40;
    public $ids = [];
    public $championName;
    public $tier;
    public $rol;
    protected $listeners = ['loadMore' => 'loadMore'];

    public function loadMore()
    {
        $this->perPage += 40;
    }

    public function render()
    {
        $champions = Champion::
        when($this->championName,function($query){
            $query->where('name','like','%'.$this->championName.'%');
        })
        ->when($this->tier,function($query){
            $query->where('tier','like','%'.$this->tier.'%');
        })
        ->when($this->rol,function($query){
            $query->where('tags','like','%'.$this->rol.'%');
        })
        // ->whereNotIn('id', $this->ids)
        ->take($this->perPage)
        ->get();

        $tags = [
            0 => "Fighter",
            1 => "Tank",
            2 => "Mage",
            3 => "Assassin",
            5 => "Marksman",
            8 => "Support",
        ];

        return view('livewire.front.champions',compact('champions','tags'));
    }
}
