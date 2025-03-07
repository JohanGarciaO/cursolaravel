@extends('site.layout')

@section('title','home')

@section('conteudo')

    @forelse ($frutas as $fruit)
        {{$fruit}}
        @empty
            O array está vazio
    @endforelse

@endsection