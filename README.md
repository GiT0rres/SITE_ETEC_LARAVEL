# 🎓 ETEC Zona Leste — Sistema de Gestão Escolar

<div align="center">

### 📚 Plataforma Web para Gerenciamento Acadêmico

Sistema desenvolvido em **Laravel 13** com foco na administração escolar, oferecendo controle de alunos, cursos, turmas, eventos e informações acadêmicas em um ambiente moderno, intuitivo e responsivo.

![Laravel](https://img.shields.io/badge/Laravel-13-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue?style=for-the-badge&logo=mysql)
![Status](https://img.shields.io/badge/Status-Concluído-success?style=for-the-badge)

</div>

---

# ✨ Visão Geral

O **Sistema Escolar ETEC Zona Leste** foi desenvolvido para centralizar e facilitar o gerenciamento acadêmico da instituição, oferecendo recursos administrativos para controle de alunos, cursos, turmas, eventos e desempenho escolar.

A plataforma conta com uma interface moderna, autenticação segura e um painel administrativo completo para gestão das informações.

---

# 🖥️ Demonstração

## 🏠 Página Inicial

> 📸 Adicione aqui um print da Home

![Home](docs/screenshots/home.png)

---

## 🎓 Cursos

> 📸 Adicione aqui um print da tela de cursos

![Cursos](docs/screenshots/cursos.png)

---

## 📅 Eventos

> 📸 Adicione aqui um print da tela de eventos

![Eventos](docs/screenshots/eventos.png)

---

## 🔐 Login

> 📸 Adicione aqui um print da tela de login

![Login](docs/screenshots/login.png)

---

## 📊 Dashboard Administrativo

> 📸 Adicione aqui um print do dashboard

![Dashboard](docs/screenshots/dashboard.png)

---

## 👨‍🎓 Gestão de Alunos

> 📸 Adicione aqui um print da tela de alunos

![Alunos](docs/screenshots/alunos.png)

---

## 📚 Gestão de Cursos

> 📸 Adicione aqui um print da tela de cursos do backend

![Cursos Backend](docs/screenshots/backend-cursos.png)

---

## 🏫 Gestão de Turmas

> 📸 Adicione aqui um print da tela de turmas

![Turmas](docs/screenshots/turmas.png)

---

# 🚀 Funcionalidades

## 🎓 Gestão Acadêmica

✅ Cadastro de alunos

✅ Edição e exclusão de alunos

✅ Cadastro de cursos

✅ Cadastro de turmas

✅ Relacionamento entre alunos e turmas

✅ Controle de informações acadêmicas

---

## 📅 Gestão de Eventos

✅ Cadastro de eventos

✅ Listagem pública de eventos

✅ Exibição de informações detalhadas

---

## 📊 Dashboard Administrativo

✅ Estatísticas em tempo real

✅ Quantidade de alunos

✅ Quantidade de cursos

✅ Quantidade de turmas

✅ Visão geral do sistema

---

## 🔐 Autenticação e Segurança

✅ Login seguro

✅ Middleware de autenticação

✅ Área administrativa protegida

✅ Controle de acesso

---

# 🛠️ Tecnologias Utilizadas

| Tecnologia | Descrição |
|------------|------------|
| Laravel 13 | Framework principal |
| PHP 8.4+ | Backend |
| MySQL | Banco de dados |
| Blade | Templates |
| Vite | Build Front-end |
| HTML5 | Estrutura |
| CSS3 | Estilização |
| JavaScript | Interatividade |

---

# 📂 Estrutura do Sistema

```text
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
├── storage/
└── tests/
```

---

# 🌐 Rotas Principais

## Área Pública

| Rota | Descrição |
|--------|-----------|
| `/` | Página Inicial |
| `/cursos` | Cursos Disponíveis |
| `/eventos` | Eventos |
| `/formulario` | Formulário de Interesse |
| `/login` | Login |

---

## Área Administrativa

| Rota | Descrição |
|--------|-----------|
| `/backend/dashboard` | Dashboard |
| `/backend/alunos` | Gestão de Alunos |
| `/backend/turmas` | Gestão de Turmas |
| `/backend/cursos` | Gestão de Cursos |
| `/backend/eventos` | Gestão de Eventos |
| `/backend/notas` | Gestão de Notas |

---

# ⚙️ Instalação

### 1️⃣ Clonar o repositório

```bash
git clone https://github.com/GiT0rres/SITE_ETEC_LARAVEL.git
```

### 2️⃣ Entrar na pasta

```bash
cd SITE_ETEC_LARAVEL
```

### 3️⃣ Instalar dependências

```bash
composer install
```

```bash
npm install
```

### 4️⃣ Configurar ambiente

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

### 5️⃣ Configurar banco de dados

Edite o arquivo `.env` e configure:

```env
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=etec
DB_USERNAME=laravel
DB_PASSWORD=123456
```

### 6️⃣ Executar migrations

```bash
php artisan migrate
```

### 7️⃣ Iniciar o projeto

```bash
npm run dev
```

Em outro terminal:

```bash
php artisan serve
```

---

# 👨‍💻 Desenvolvido por

### Giovanna Torres

Projeto acadêmico desenvolvido para fins educacionais utilizando Laravel e boas práticas de desenvolvimento web.

---

<div align="center">

### ⭐ Se este projeto foi útil, deixe uma estrela no repositório!

</div>
