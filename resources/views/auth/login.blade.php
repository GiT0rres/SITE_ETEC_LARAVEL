@extends('layouts.app')

@section('title', 'Autenticação — ETEC Zona Leste')

@section('content')
<div class="auth-page">
    @include('components.navbar')

    <main class="auth-main">
        <div class="auth-card">
            <h2>Acesso ao Sistema</h2>
            <p>Faça login para acessar sua conta.</p>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">E-mail</label>
                    <input type="email" id="email" name="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="seu@email.com" autofocus>
                    @error('email')<p class="invalid-feedback">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Senha</label>
                    <input type="password" id="password" name="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="••••••••">
                    @error('password')<p class="invalid-feedback">{{ $message }}</p>@enderror
                </div>

                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Esqueceu sua senha?</a>
                @endif

                <button type="submit" class="btn btn-primary" style="width:100%;padding:13px;font-size:14px;">
                    Entrar
                </button>
            </form>

            @if(Route::has('register'))
                <p class="auth-footer-link">
                    Não tem uma conta? <a href="{{ route('register') }}">Criar conta</a>
                </p>
            @endif
        </div>
    </main>

    @include('components.footer')
</div>
@endsection