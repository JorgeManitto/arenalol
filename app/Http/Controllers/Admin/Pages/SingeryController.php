<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Argument;
use App\Models\Item;
use App\Models\Sinergy;
use Illuminate\Http\Request;

class SingeryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sinergies = Sinergy::
        when($request->name, function ($query) use ($request) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('first_champ', 'like', '%' . $request->name . '%')
                         ->orWhere('second_champ', 'like', '%' . $request->name . '%');
            });
        }) 
        ->when($request->order,function($query)use($request){
            $query->orderBy('id',$request->order);
        })      
        ->paginate(10);
        return view('admin.pages.sinergies',compact('sinergies','request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $arguments = Argument::all();

        return view('admin.pages.sinergiesPartials.create',compact('items','arguments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $params = [
            'name'          => $request->name,
            'first_champ'   => $request->first_champ,
            'second_champ'  => $request->second_champ,
            'first_item'    => $request->first_item,
            'second_item'   => $request->second_item,
            'first_argument'    => is_array($request->first_argument) ? json_encode($request->first_argument) : $request->first_argument,
            'second_argument'   => is_array($request->second_argument) ? json_encode($request->second_argument) : $request->second_argument,
            'status'        => $request->status,
            'tier'          => $request->tier,
            'dificulty'     => $request->dificulty,
            'first_name'    => $request->first_name,
            'second_name'   => $request->second_name
        ];

        Sinergy::create($params);
        return redirect('/admin/sinergies')->with(['success' => 'Se ha creado la sinergia.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = Item::all();
        $sinergy = Sinergy::find($id);
        $arguments = Argument::all();

        return view('admin.pages.sinergiesPartials.edit',compact('items','sinergy','arguments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $params = [
            'name'          => $request->name,
            'first_champ'   => $request->first_champ,
            'second_champ'  => $request->second_champ,
            'first_item'    => $request->first_item,
            'second_item'   => $request->second_item,
            'status'        => $request->status,
            'tier'          => $request->tier,
            'dificulty'     => $request->dificulty,
            'first_name'    => $request->first_name,
            'second_name'   => $request->second_name
        ];
        $item = Sinergy::find($request->id);
        $item->update($params);

        return redirect('/admin/sinergies')->with(['success' => 'Se ha actualizado la sinergia.']); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sinergy::destroy($id);
        return redirect('/admin/sinergies')->with(['success'=> 'Se ha eliminado la sinergia.']);
    }
}
