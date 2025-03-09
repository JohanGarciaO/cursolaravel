@extends('site.layout')
@section('title','home')
@section('conteudo')

<div class="row container">

    @foreach ($produtos as $product)
        <div class="col s12 m4">    
            <div class="card">
                <div class="card-image">
                    <img src="{{$product->imagem}}">
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">{{ Str::limit($product->nome, 20, '...') }}</span>
                    <p>{{ Str::limit($product->descricao, 20, '...') }}</p>
                </div>
            </div>    
        </div>
    @endforeach

</div>

<div class="row center">
    {{ $produtos->links('custom.pagination') }}
</div>

@endsection