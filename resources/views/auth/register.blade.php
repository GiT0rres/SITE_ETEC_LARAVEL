@extends('layouts.app')

@section('title', 'Criar Conta — ETEC Zona Leste')

@section('content')
<div class="auth-page">
    @include('components.navbar')

    <main class="auth-main">
        <div class="auth-card">
            <h2>Criar Conta</h2>
            <p>Preencha os dados abaixo para se registrar.</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="name">Nome Completo</label>
                    <input type="text" id="name" name="name"
                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           value="{{ old('name') }}" placeholder="Seu nome completo" autofocus>
                    @error('name')<p class="invalid-feedback">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">E-mail</label>
                    <input type="email" id="email" name="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="seu@email.com">
                    @error('email')<p class="invalid-feedback">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Senha</label>
                    <input type="password" id="password" name="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="Mínimo 8 caracteres">
                    @error('password')<p class="invalid-feedback">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirmar Senha</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="form-control" placeholder="Repita a senha">
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%;padding:13px;font-size:14px;">
                    Criar Conta
                </button>
            </form>

            <p class="auth-footer-link">
                Já tem uma conta? <a href="{{ route('login') }}">Entrar</a>
            </p>
        </div>
    </main>

    @include('components.footer')
</div>
@endsection