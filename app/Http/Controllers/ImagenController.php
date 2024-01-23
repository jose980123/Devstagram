<?php

namespace App\Http\Controllers;

use Stringable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImagenController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       $imagen = $request->file('file');

       $nombreImagen = Str::uuid() . "." . $imagen->extension();

       $imagenServidor = Image::make($imagen);
       $imagenServidor -> fit(1000,1000);

       $imagenPath = public_path('uploads') . '/' . $nombreImagen;
       $imagenServidor->save($imagenPath);

       return response()->json(['imagen' => $nombreImagen]);
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
