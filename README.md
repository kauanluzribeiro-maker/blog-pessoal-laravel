# Blog Pessoal — Laravel

Aplicação web de blog pessoal desenvolvida com **PHP e Laravel** durante o curso Técnico em Desenvolvimento de Sistemas da **ETEC Doutora Ruth Cardoso**, em São Vicente (SP).

O projeto tem como objetivo aplicar conceitos de desenvolvimento web, arquitetura MVC, autenticação de usuários e operações CRUD (criação, leitura, atualização e exclusão). Cada usuário autenticado pode gerenciar suas próprias postagens.

**Status:** em desenvolvimento, com melhorias realizadas ao longo das aulas.

## Funcionalidades

- Cadastro de usuários, login e logout.
- Criação, visualização, edição e exclusão de postagens.
- Exibição das postagens associadas ao usuário autenticado.
- Verificação de autoria antes da edição e da exclusão de postagens.
- Validação dos dados enviados pelos formulários.
- Interface web desenvolvida com Blade, HTML e CSS.

## Tecnologias

| Tecnologia | Aplicação no projeto |
| --- | --- |
| PHP 8.2+ | Linguagem de programação do back-end |
| Laravel 12 | Framework e organização da aplicação em MVC |
| Blade | Renderização das páginas |
| HTML5 e CSS3 | Estrutura e apresentação da interface |
| Eloquent ORM | Acesso ao banco de dados e relacionamento entre models |
| SQLite | Banco de dados utilizado na instalação local descrita abaixo |
| MySQL | Alternativa de banco de dados configurável |
| Composer | Gerenciamento das dependências PHP |

## Estrutura do projeto

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

As migrations permitem recriar a estrutura das tabelas sem compartilhar os dados de um banco de desenvolvimento.

## Instalação e execução local

As instruções a seguir foram testadas no **Windows com PowerShell**, utilizando **SQLite**.

### Pré-requisitos

- PHP 8.2 ou superior, disponível no terminal.
- Composer instalado.
- Extensões PHP necessárias ao Laravel, incluindo `pdo_sqlite` para utilizar SQLite.
- Git, caso opte pela clonagem do repositório.

Não é necessário iniciar os serviços Apache ou MySQL do XAMPP ao executar o projeto com `php artisan serve` e SQLite.

### 1. Obter o código-fonte

Clone o repositório:

```powershell
git clone https://github.com/kauanluzribeiro-maker/blog-pessoal-laravel.git
cd blog-pessoal-laravel
```

Como alternativa, selecione **Code > Download ZIP** no GitHub, extraia os arquivos e abra a pasta extraída no terminal. Os comandos seguintes devem ser executados na pasta em que está o arquivo `artisan`.

### 2. Instalar as dependências

```powershell
composer install
```

O Composer instalará as bibliotecas necessárias na pasta `vendor/`.

### 3. Criar o arquivo de ambiente

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

O arquivo `.env` contém configurações locais e não deve ser enviado ao repositório.

### 4. Configurar o SQLite

Confira se o arquivo `.env` contém:

```dotenv
DB_CONNECTION=sqlite
```

Crie o arquivo do banco de dados, caso ainda não exista:

```powershell
New-Item -Path .\database\database.sqlite -ItemType File
```

O arquivo `database.sqlite` será utilizado somente no ambiente local e não deve ser versionado.

### 5. Criar as tabelas

```powershell
php artisan migrate
```

O Laravel executará as migrations para criar as tabelas do sistema. Não é necessário importar um banco de dados pronto.

### 6. Iniciar a aplicação

```powershell
php artisan serve
```

Acesse **http://127.0.0.1:8000** no navegador.

Para testar, cadastre um usuário, faça login e crie, edite ou exclua postagens. Como o banco é novo, não haverá usuários ou postagens cadastrados inicialmente.

### Alternativa: utilizar MySQL

Se preferir MySQL, crie um banco de dados vazio e configure a conexão no `.env` com os dados do seu ambiente:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_pessoal
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha_local
```

Depois execute `php artisan migrate`. Nesse caso, o servidor MySQL precisa estar em execução. Os valores acima são exemplos; não publique credenciais reais.

## Observações de desenvolvimento

- O código-fonte, as migrations e o arquivo `.env.example` estão disponíveis no repositório.
- Dependências (`vendor/`), configurações privadas (`.env`), bancos locais, logs e arquivos temporários não são necessários no controle de versão.
- O repositório disponibiliza o **código-fonte**, não uma instância pública hospedada do blog.
- O projeto continua recebendo melhorias durante as atividades em aula.

## Contexto acadêmico

Projeto desenvolvido como atividade prática do curso **Técnico em Desenvolvimento de Sistemas da ETEC Doutora Ruth Cardoso**, sob orientação do professor **Gilberto Vieira Branco**.

## Autor

**Kauan Luz Ribeiro**  
Estudante de Desenvolvimento de Sistemas  
[LinkedIn](https://www.linkedin.com/in/kauan-luz-ribeiro-56279436b/) | [GitHub](https://github.com/kauanluzribeiro-maker)

Projeto desenvolvido para fins educacionais.
