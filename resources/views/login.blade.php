@extends('partials.main')
@section('title', 'Login - Laravel')
@section('content')

    <div class="container">
        <form class="login col-xl-7 col-lg-8 col-md-8 col-sm-10 col-11" action="{{ route('auth') }}" method="POST">
            @csrf
            <h3>Faça seu login:</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('msg'))
                <div class="alert alert-danger">{{session('msg')}}</div>
            @endif
            @if(session('msg_success'))
                <div class="alert alert-success">{{session('msg_success')}}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="form-group form-login ">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                    </div>
                    <div class="form-group form-login">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                    </div>
                    <div class="form-group form-login">
                        <button type="submit" class="btn btn-success">Entrar</button>
                    </div>
                    <div class="form-group form-login">
                        <p>Não possui cadastro? <a href="cadastro">Cadastre-se aqui</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

  