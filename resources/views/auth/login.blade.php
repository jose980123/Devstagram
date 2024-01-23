@extends('layouts.app')

@section('pestaña')
    Login
@endsection

@section('titulo')
    Inicia sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
        <div class="md:w-6/12 p-5">
            <img class="rounded-lg" src="{{asset('img/login.jpg')}}" alt="Imagen login de usuario">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl ">
            <form method="POST" action="{{route('login.store')}}" novalidate>
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje')}}
                    </p>  
                @endif
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                        Email
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        placeholder="Tu correo"
                        class="border p-3 w-full rounded-lg
                        @error('email')
                            border-red-500
                        @enderror"
                        value="{{old('email')}}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                        Contraseña
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        placeholder="Tu contraseña"
                        class="border p-3 w-full rounded-lg
                        @error('password')
                            border-red-500
                        @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember"><label class="text-gray-500 text-sm" for="remember">
                        Mantener Sesión abierta
                    </label>

                </div>
                <input 
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg text-center">
            </form>
        </div>
    </div>
@endsection