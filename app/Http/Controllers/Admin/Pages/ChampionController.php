<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Argument;
use App\Models\Champion;
use App\Models\Item;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class ChampionController extends Controller
{
    function index(Request $request) {

        $champions = Champion::when($request->name, function ($query) use ($request) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', '%' . $request->name . '%')
                         ->orWhere('slug_name', 'like', '%' . $request->name . '%');
            });
        }) 
        ->when($request->order,function($query)use($request){
            $query->orderBy('id',$request->order);
        })      
        ->paginate(10);

        return view('admin.pages.champions',compact('request','champions'));
    }
    function create() {
        return view('admin.pages.championsPartials.create');
    }

    function store(Request $request){
        $params = [
          
        ];
        Champion::create($params);
        return redirect('/admin/champions')->with(['success' => 'Se ha creado el Campeón.']);
    }
    function edit($id) {
        $champion = Champion::find($id);
        $champions = Champion::where('id','!=',$id)->get();
        $items = Item::all();
        $arguments = Argument::all();

        return view('admin.pages.championsPartials.edit',compact('champion','items','arguments','champions'));
    }

    function update(Request $request) {
       
        $params = [
            'name'          => $request->name,
            'slug_name'     => $request->slug_name,
            'tier'          => $request->tier,
            'win'           => $request->win,
            'pick'          => $request->pick,
            'ban'           => $request->ban,
            'games'         => $request->games,
            'build'         => $request->build,
            'argument'      => is_array($request->arguments) ? json_encode($request->arguments) :'',
            // 'skill_order'   => $request->skill_order,
            'best_duo'      => is_array($request->best_duo) ? json_encode($request->best_duo) :'',
            'bad_duo'       => is_array($request->bad_duo) ? json_encode($request->bad_duo) :'',
            'to_counter'    => is_array($request->to_counter) ? json_encode($request->to_counter) :'',
            'best_for'      => is_array($request->best_for) ? json_encode($request->best_for) :'',
        ];
       
        $champion = Champion::find($request->id);
        $champion->update($params);

        return redirect('/admin/champions')->with(['success' => 'Se ha actualizado el Campeón.']);
    }
    function destroy($id) {
        Champion::destroy($id);
        
        return redirect('/admin/champions')->with(['success'=> 'Se ha eliminado el Campeón.']);
    }

}
