<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Item;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    function itemsPanel(Request $request) {
        $items = Item::
        when($request->name, function ($query) use ($request) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', '%' . $request->name . '%')
                         ->orWhere('name_esp', 'like', '%' . $request->name . '%');
            });
        }) 
        ->when($request->order,function($query)use($request){
            $query->orderBy('id',$request->order);
        })      
        ->paginate(10);
        return view('admin.pages.items',compact('items','request'));
    }
    function create(){
        return view('admin.pages.itemsPartials.create');
    }
    
    function save(Request $request){
        $params = [
            'name'              => $request->name,
            'description'       => $request->description,
            'plaintext'         => $request->plaintext,
            'into'              => $request->into,
            'stats'             => $request->stats,
            'gold'              => $request->gold,
            'name_esp'          => $request->name_esp,
            'description_esp'   => $request->description_esp,
            'plaintext_esp'     => $request->plaintext_esp,
        ];
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $params ['image'] = $path;
        }

        Item::create($params);
        return redirect('/admin/items')->with(['success' => 'Se ha creado el objeto.']);
    }

    function edit($id){
        $item = Item::find($id);
        if (!$item) {
            return redirect('/admin/items')->with(['error' => 'No se encontro el item.']);
        }

        return view('admin.pages.itemsPartials.edit',compact('item'));
    }
    function update(Request $request) {

        $params = [
            'name'              => $request->name,
            'description'       => $request->description,
            'plaintext'         => $request->plaintext,
            'into'              => $request->into,
            'stats'             => $request->stats,
            'gold'              => $request->gold,
            'name_esp'          => $request->name_esp,
            'description_esp'   => $request->description_esp,
            'plaintext_esp'     => $request->plaintext_esp,
        ];
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $params ['image'] = $path;
        }

        $item = Item::find($request->id);
        $item->update($params);

        return redirect('/admin/items')->with(['success' => 'Se ha actualizado el objeto.']); 
    }

    
    function delete($id)  {
        Item::destroy($id);
        return redirect('/admin/items')->with(['success'=> 'Se ha eliminado el item.']);
    }
}
