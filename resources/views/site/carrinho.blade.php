@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
    
<div class="row container">

    @if ($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Já é quase seu...</span>
              <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif
    @if ($mensagem = Session::get('bad-message'))
        <div class="card red lighten-4">
            <div class="card-content">
              <span class="card-title">Poxa, ele já era quase seu...</span>
              <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if ($itens->count() == 0)
        <div class="card orange">
            <div class="card-content white-text">
            <span class="card-title">Seu carrinho está vazio...</span>
            <p>Não perca mais tempo, leve ainda hoje seu produto dos sonhos para casa!</p>
            </div>
        </div>
    @else      

    <h5>Seu carrinho possui {{ $itens->count() }} produtos:</h5>
    <table class="highlight">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($itens as $item)
            <tr>
                <td><img src="{{ $item->attributes['image']}}" alt="" width="70" class="responsive-img circle"></td>
                <td>{{ $item->name}}</td>
                <td>R$ {{ number_format($item->price,2,',','.') }}</td>

                {{-- BTN ATUALIZAR --}}
                <form action="{{route('site.atualizaCarrinho')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <td><input style="width: 40px; font-weight:900;" class="white center" type="number" name="quantity" value="{{ $item->quantity}}" min="1"></td>
                    <td>
                    <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                </form>

                    {{-- BTN REMOVER --}}
                    <form action="{{ route('site.removeCarrinho') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                    </form>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title" style="font-weight: bold">TOTAL: R$ {{ number_format(\Cart::getTotal(),2,',','.')}}</span>
          <p>Pague em até 12x sem juros!</p>
        </div>
    </div>

    @endif

    <div class="row container center">
        <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue"> Continuar comprando<i class="material-icons right">arrow_back</i></a>
        <a href="{{route('site.limparCarrinho')}}" class="btn waves-effect waves-light blue"> Limpar carrinho<i class="material-icons right">clear</i></a>
        <button class="btn waves-effect waves-light green"> Finalizar pedido<i class="material-icons right">check</i></button>
    </div>
    
</div>

@endsection