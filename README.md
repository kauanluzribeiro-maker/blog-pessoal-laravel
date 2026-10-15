
# 📝 Blog Pessoal — Laravel

Aplicação web de blog pessoal desenvolvida com PHP, Laravel e banco de dados relacional, como parte dos meus estudos no curso Técnico em Desenvolvimento de Sistemas.

O projeto foi criado para colocar em prática conceitos de desenvolvimento web, autenticação de usuários, operações CRUD e arquitetura MVC (Model-View-Controller).

## 🚀 Funcionalidades

- Cadastro de usuários
- Login e logout
- Criação de postagens
- Visualização das próprias postagens
- Edição de postagens
- Exclusão de postagens
- Associação das postagens aos usuários
- Verificação de autoria para edição e exclusão
- Validação de formulários
- Interface desenvolvida com HTML e CSS

## 🛠️ Tecnologias utilizadas

| Tecnologia | Utilização |
|------------|------------|
| PHP 8.2+ | Linguagem back-end |
| Laravel 12 | Framework PHP |
| Blade | Templates e interface |
| HTML5 | Estrutura das páginas |
| CSS3 | Estilização |
| SQL | Persistência de dados |
| Eloquent ORM | Manipulação dos dados |
| Composer | Gerenciamento de dependências |

O projeto pode utilizar SQLite ou MySQL, conforme a configuração do ambiente.

## 📂 Estrutura do projeto

```text
app/
├── Http/Controllers/
│   ├── PostController.php
│   └── UserController.php
└── Models/
    ├── Post.php
    └── User.php

database/
└── migrations/

resources/
└── views/
    ├── pagina1.blade.php
    └── editar.blade.php

routes/
└── web.php

public/
└── pagina1.css
```

## ⚙️ Como executar o projeto

### Pré-requisitos

- PHP 8.2 ou superior
- Composer
- Extensões PHP necessárias ao Laravel
- SQLite ou MySQL
- Git (opcional)

### 1. Clonar o repositório

```bash
git clone URL_DO_REPOSITORIO
cd blog-pessoal-laravel
```

### 2. Instalar dependências

```bash
composer install
```

### 3. Configurar o ambiente

Copie o arquivo `.env.example` para um novo arquivo chamado `.env`.

Depois execute:

```bash
php artisan key:generate
```

### 4. Configurar o banco de dados

O arquivo `.env.example` utiliza SQLite como configuração inicial.

Nesse caso, crie um arquivo vazio chamado `database.sqlite` dentro da pasta `database` antes de executar as migrations.

Para utilizar MySQL, crie um banco de dados e configure estas variáveis no `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_pessoal
DB_USERNAME=root
DB_PASSWORD=
```

Os valores acima são exemplos para ambiente local e devem ser adaptados à sua configuração.

### 5. Executar as migrations

```bash
php artisan migrate
```

### 6. Iniciar o servidor

```bash
php artisan serve
```

Acesse no navegador:

http://127.0.0.1:8000

## 📚 Aprendizados

Durante o desenvolvimento, pude praticar e aprofundar meus conhecimentos em:

- Arquitetura MVC
- Rotas e controllers do Laravel
- Models e Eloquent ORM
- Relacionamentos entre tabelas
- Autenticação de usuários
- Operações CRUD
- Validação de dados
- Integração entre front-end e back-end
- Organização de uma aplicação web

## 🎯 Objetivo

Este é um projeto acadêmico desenvolvido para consolidar conhecimentos adquiridos durante minha formação técnica e contribuir para minha evolução como desenvolvedor.

## 👨‍💻 Desenvolvedor

**Kauan Luz Ribeiro**

Estudante do curso Técnico em Desenvolvimento de Sistemas — ETEC Doutora Ruth Cardoso.

🔗 [LinkedIn](https://www.linkedin.com/in/kauan-luz-ribeiro-56279436b/)

Projeto desenvolvido para fins educacionais.
