@if($mensagem = Session::get('error'))
    {{ $mensagem }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form action="{{ route('login.auth') }}" method="POST" >
@csrf

    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="password"><br>

    <button type="submit">Entrar</button>

</form>