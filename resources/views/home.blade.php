@extends('layouts.app')

@section('titulo')
    Muro
@endsection

@section('contenido')
    <x-listar-post :posts="$posts"/>
@endsection