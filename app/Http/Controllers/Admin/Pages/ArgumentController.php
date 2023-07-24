<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Argument;
use Illuminate\Http\Request;

class ArgumentController extends Controller
{
    function index(Request $request){
        $arguments = Argument::when($request->name, function ($query) use ($request) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', '%' . $request->name . '%')
                         ->orWhere('name_esp', 'like', '%' . $request->name . '%');
            });
        }) 
        ->when($request->order,function($query)use($request){
            $query->orderBy('id',$request->order);
        })      
        ->paginate(10);
        return view('admin.pages.arguments',compact('request','arguments'));
    }

    function create() {
        return view('admin.pages.argumentsPartials.create');
    }

    function store(Request $request){
        $params = [
            'name'              => $request->name,
            'name_esp'          => $request->name_esp,
            'description'       => $request->description,
            'description_esp'   => $request->description_esp,
            'type'              => $request->type,
        ];
        Argument::create($params);
        return redirect('/admin/arguments')->with(['success' => 'Se ha creado el argumento.']);
    }
    function edit($id) {
        $argument = Argument::find($id);

        return view('admin.pages.argumentsPartials.edit',compact('argument'));
    }

    function update(Request $request) {

        $params = [
            'name'              => $request->name,
            'name_esp'          => $request->name_esp,
            'description'       => $request->description,
            'description_esp'   => $request->description_esp,
            'type'              => $request->type,
        ];

        $argument = Argument::find($request->id);
        $argument->update($params);

        return redirect('/admin/arguments')->with(['success' => 'Se ha actualizado el argumento.']);
    }
    function destroy($id) {
        Argument::destroy($id);
        
        return redirect('/admin/arguments')->with(['success'=> 'Se ha eliminado el argumento.']);
    }
    function colectArguments() {
        $archivoJson = base_path().'/arguments.json';

        // Leer el contenido del archivo JSON
        $jsonData = file_get_contents($archivoJson);

        // Decodificar el contenido JSON en un objeto o matriz PHP
        $data = json_decode($jsonData);

        foreach ($data as $key => $value) {
            $params = [
                'name' => $value->Name,
                'name_esp' => $value->NameEsp,
                'description' => $value->Effect,
                'description_esp' => $value->EffectEsp,
                'type' => $value->Type,
            ];
            Argument::create($params);
        }
        dd('done');
    }
}
