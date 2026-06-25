@extends('layouts.app')

/** Define o título da página */
@section('title', 'Criar Conta — ETEC Zona Leste')

@section('content')

/** Container principal da página */
<div class="auth-page">

    /** Inclui a barra de navegação */
    @include('components.navbar')

    /** Área principal do conteúdo */
    <main class="auth-main">

        /** Card de cadastro */
        <div class="auth-card">

            /** Título da página */
            <h2>Criar Conta</h2>

            /** Texto de orientação */
            <p>Preencha os dados abaixo para se registrar.</p>

            /** Formulário de cadastro */
            <form action="{{ route('register') }}" method="POST">

                /** Proteção contra ataques CSRF */
                @csrf

                /** Campo nome */
                <div class="form-group">

                    /** Rótulo do nome */
                    <label class="form-label" for="name">
                        Nome Completo
                    </label>

                    /** Campo para digitar nome */
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ old('name') }}"
                        placeholder="Seu nome completo"
                        autofocus
                    >

                    /** Exibe erro caso exista */
                    @error('name')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                /** Campo e-mail */
                <div class="form-group">

                    /** Rótulo do e-mail */
                    <label class="form-label" for="email">
                        E-mail
                    </label>

                    /** Campo para digitar e-mail */
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        value="{{ old('email') }}"
                        placeholder="seu@email.com"
                    >

                    /** Exibe erro caso exista */
                    @error('email')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                /** Campo senha */
                <div class="form-group">

                    /** Rótulo da senha */
                    <label class="form-label" for="password">
                        Senha
                    </label>

                    /** Campo para digitar senha */
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Mínimo 8 caracteres"
                    >

                    /** Exibe erro caso exista */
                    @error('password')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                /** Campo confirmar senha */
                <div class="form-group">

                    /** Rótulo da confirmação */
                    <label
                        class="form-label"
                        for="password_confirmation"
                    >
                        Confirmar Senha
                    </label>

                    /** Campo para confirmar senha */
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Repita a senha"
                    >

                </div>

                /** Botão de cadastro */
                <button
                    type="submit"
                    class="btn btn-primary"
                    style="width:100%;padding:13px;font-size:14px;"
                >
                    Criar Conta
                </button>

            </form>

            /** Link para login */
            <p class="auth-footer-link">
                Já tem uma conta?
                <a href="{{ route('login') }}">
                    Entrar
                </a>
            </p>

        </div>

    </main>

    /** Inclui o rodapé */
    @include('components.footer')

</div>

@endsection