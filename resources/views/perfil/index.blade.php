@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                        Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg
                        @error('username')
                            border-red-500
                        @enderror"
                        value="{{auth()->user()->username}}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                        Email
                    </label>
                    <input 
                        type="text" 
                        name="email" 
                        id="email"
                        placeholder="Tu correo"
                        class="border p-3 w-full rounded-lg
                        @error('email')
                            border-red-500
                        @enderror"
                        value="{{auth()->user()->email}}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="imagen">
                        Imagen de Perfil
                    </label>
                    <input 
                        type="file" 
                        name="imagen" 
                        id="imagen"
                        class="border p-3 w-full rounded-lg"
                        value="{{asset('perfiles') . "/" . $user->imagen}}"
                        accept=".jpg, jpeg, .png">
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>
                <input 
                    type="submit"
                    value="Editar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg text-center">
            </form>
        </div>
    </div>
@endsection