# 📚 Sistema Escolar — ETEC Zona Leste (Laravel)

Sistema web desenvolvido em **Laravel 13** para gerenciamento escolar, incluindo alunos, turmas, cursos, notas e eventos acadêmicos.

---

## 🚀 Funcionalidades

### 🎓 Gestão Acadêmica
- Cadastro e listagem de **Alunos**
- Cadastro de **Turmas**
- Cadastro de **Cursos**
- Relacionamento entre alunos e turmas

### 📅 Eventos
- Cadastro de eventos escolares
- Listagem pública de eventos

### 📊 Dashboard (Backend)
- Estatísticas gerais (alunos, turmas, cursos)
- Últimas notas lançadas

### 🔐 Autenticação
- Sistema de login (Laravel Breeze)
- Área administrativa protegida (`/backend`)

---

## 🛠️ Tecnologias utilizadas

- PHP 8.4+
- Laravel 13
- MySQL / SQLite
- Blade Templates
- Vite
- HTML5 / CSS3

---

## 📁 Estrutura de rotas

### Públicas
- `/` → Home
- `/cursos`
- `/eventos`
- `/formulario`

### Backend (protegido)
- `/backend/dashboard`
- `/backend/alunos`
- `/backend/turmas`
- `/backend/cursos`
- `/backend/eventos`

---

## ⚙️ Instalação do projeto

```bash
git clone https://github.com/seu-usuario/seu-repo.git

cd etec

composer install

npm install && npm run dev

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
