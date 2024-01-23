<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //modificar Resquest
        $request->request->add(['username' => Str::slug($request->username)]);
        //validacion
        $this->validate($request,[
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:8'
        ]);
        
        User::create([
            'name'=> $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //validacion de usuario
        /* auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]); */

        //otras forma de validacion

        auth()->attempt($request->only('email', 'password'));
        
        $user = auth()->user()->username;
        //redireccion
        return redirect()->route('posts.index', $user);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
