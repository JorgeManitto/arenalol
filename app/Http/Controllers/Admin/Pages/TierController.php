<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Tier;
use Illuminate\Http\Request;

class TierController extends Controller
{
    function index(Request $request) {

        $tiers = Tier::when($request->champion, function ($query) use ($request) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('champion', 'like', '%' . $request->champion . '%');
            });
        }) 
        ->when($request->order,function($query)use($request){
            $query->orderBy('id',$request->order);
        })      
        ->paginate(10);

        return view('admin.pages.tiers',compact('request','tiers'));
    }
    function create(){
        return view('admin.pages.tiersPartials.create');
    }
    function store(Request $request) {
        
        $params = [
            'champion'  => $request->champion,
            'real_name'  => $request->real_name,
            'tier'      => $request->tier,
            'status'    => $request->status,
        ];
        Tier::create($params);
        return redirect('/admin/tiers')->with(['success' => 'Se ha creado el tier.']);
    }
    function edit($id){
        $tier = Tier::find($id);

        return view('admin.pages.tiersPartials.edit',compact('tier'));
    }
    function update(Request $request){
        $params = [
            'champion'  => $request->champion,
            'real_name'  => $request->real_name,
            'tier'      => $request->tier,
            'status'    => $request->status,
        ];

        $tier = Tier::find($request->id);
        $tier->update($params);

        return redirect('/admin/tiers')->with(['success' => 'Se ha actualizado el tier.']);
    }
    function destroy($id) {
        Tier::destroy($id);
        return redirect('/admin/tiers')->with(['success'=> 'Se ha eliminado el tier.']);
    }
}
