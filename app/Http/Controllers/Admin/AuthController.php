<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function formLogin(){
        return view('admin.formLogin');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El formato de correo electrónico es inválido.',
            'password.required' => 'El campo de contraseña es obligatorio.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
        }

        $user = User::where('email',$request->email)->first();
        if(!$user){
            $validator->errors()->add('password', 'Las credenciales proporcionadas son incorrectas.');
            return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
        }

        if(Auth::attempt($request->only(['email', 'password']))) {  
            return redirect()->route('adminPanel');
        }else{
            $validator->errors()->add('password', 'Las credenciales proporcionadas son incorrectas.');
            return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
        }
    }
}
