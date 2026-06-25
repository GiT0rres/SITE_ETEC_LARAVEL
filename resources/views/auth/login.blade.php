@extends('layouts.app')

/** Define o título da página */
@section('title', 'Autenticação — ETEC Zona Leste')

@section('content')

/** Container principal da página */
<div class="auth-page">

    /** Inclui a barra de navegação */
    @include('components.navbar')

    /** Área principal do conteúdo */
    <main class="auth-main">

        /** Card de login */
        <div class="auth-card">

            /** Título da página */
            <h2>Acesso ao Sistema</h2>

            /** Texto de orientação */
            <p>Faça login para acessar sua conta.</p>

            /** Exibe mensagem de sucesso caso exista */
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            /** Formulário de login */
            <form action="{{ route('login') }}" method="POST">

                /** Proteção contra ataques CSRF */
                @csrf

                /** Campo de e-mail */
                <div class="form-group">

                    /** Rótulo do campo */
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
                        autofocus
                    >

                    /** Mostra erro caso exista */
                    @error('email')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                /** Campo de senha */
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
                        placeholder="••••••••"
                    >

                    /** Mostra erro caso exista */
                    @error('password')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                /** Link para recuperação de senha */
                @if(Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="forgot-link"
                    >
                        Esqueceu sua senha?
                    </a>

                @endif

                /** Botão de login */
                <button
                    type="submit"
                    class="btn btn-primary"
                    style="width:100%;padding:13px;font-size:14px;"
                >
                    Entrar
                </button>

            </form>

            /** Link para cadastro */
            @if(Route::has('register'))

                <p class="auth-footer-link">
                    Não tem uma conta?
                    <a href="{{ route('register') }}">
                        Criar conta
                    </a>
                </p>

            @endif

        </div>

    </main>

    /** Inclui o rodapé */
    @include('components.footer')

</div>

@endsection