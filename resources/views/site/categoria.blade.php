@extends('site.layout')
@section('title', 'Categoria')
@section('conteudo')
    
<div class="row container">

    <h3>Categoria: </h3>

    @foreach ($produtos_categoria as $product)
        <div class="col s12 m4">    
            <div class="card">
                <div class="card-image">
                    <img src="{{$product->imagem}}">
                    <a href="{{ route('site.details', $product->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
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
    {{ $produtos_categoria->links('custom.pagination') }}
</div>

@endsection