@extends('partials.main')

@section('title', 'Cadastro - Laravel')
    
@section('content')

    <div class="container">
        <form class="login col-xl-7 col-lg-8 col-md-8 col-sm-10 col-11" action="{{ route('register') }}" method="POST">
            @csrf
            <h3>Faça seu cadastro:</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('msg_erro'))
                <div class="alert alert-danger">{{session('msg_erro')}}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="form-group form-login">
                        <label for="nome">Nome</label>
                        <input type="nome" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group form-login">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                    </div>
                    <div class="form-group form-login">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group form-login">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                    <div class="form-group form-login">
                        <p>Já possui cadastro? <a href="/">Faça seu login</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection