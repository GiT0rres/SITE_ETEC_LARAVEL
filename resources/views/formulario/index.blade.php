@extends('layouts.app')

@section('title', 'Formulário — ETEC Zona Leste')

@section('content')
    @include('components.navbar')

    <main class="page-section">
        <div class="container">

            <div class="page-header">
                <h1>Formulário de Contato</h1>
                <p>Preencha o formulário abaixo para entrar em contato conosco.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="formulario-grid">

                {{-- FORM --}}
                <div>
                    <form action="{{ route('formulario.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="nome">Nome Completo <span>*</span></label>
                            <input type="text" id="nome" name="nome"
                                   class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                                   value="{{ old('nome') }}" placeholder="Seu nome completo">
                            @error('nome')<p class="invalid-feedback">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">E-mail <span>*</span></label>
                            <input type="email" id="email" name="email"
                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                   value="{{ old('email') }}" placeholder="seu@email.com">
                            @error('email')<p class="invalid-feedback">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="assunto">Assunto <span>*</span></label>
                            <select id="assunto" name="assunto"
                                    class="form-control {{ $errors->has('assunto') ? 'is-invalid' : '' }}">
                                <option value="">Selecione um assunto</option>
                                <option value="informacoes" {{ old('assunto') === 'informacoes' ? 'selected' : '' }}>Informações sobre cursos</option>
                                <option value="matricula"   {{ old('assunto') === 'matricula'   ? 'selected' : '' }}>Matrícula</option>
                                <option value="eventos"     {{ old('assunto') === 'eventos'     ? 'selected' : '' }}>Eventos</option>
                                <option value="outro"       {{ old('assunto') === 'outro'       ? 'selected' : '' }}>Outro</option>
                            </select>
                            @error('assunto')<p class="invalid-feedback">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="mensagem">Mensagem <span>*</span></label>
                            <textarea id="mensagem" name="mensagem"
                                      class="form-control {{ $errors->has('mensagem') ? 'is-invalid' : '' }}"
                                      placeholder="Escreva sua mensagem...">{{ old('mensagem') }}</textarea>
                            @error('mensagem')<p class="invalid-feedback">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                    </form>
                </div>

                {{-- SIDEBAR CONTATOS --}}
                <div>
                    <div class="contatos-card">
                        <h3>Outros Contatos</h3>

                        <div class="contato-item">
                            <div class="contato-icon">&#9742;</div>
                            <div>(11) 0000-0000</div>
                        </div>

                        <div class="contato-item">
                            <div class="contato-icon">&#9993;</div>
                            <div>contato@eteczonaleste.edu.br</div>
                        </div>

                        <div class="contato-item">
                            <div class="contato-icon">&#9733;</div>
                            <div>Rua das Etecs, 123<br>São Paulo – SP</div>
                        </div>

                        <div class="contato-item">
                            <div class="contato-icon">&#9719;</div>
                            <div>Segunda a Sexta: 8h às 22h<br>Sábado: 8h às 12h</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @include('components.footer')
@endsection