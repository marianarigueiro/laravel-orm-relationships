# AMS Laravel DB — Mapeamento Objeto-Relacional

Projeto da disciplina de Programação Web III, demonstrando o uso de
Migrations do Laravel para criação de um banco de dados relacional
com os três tipos de cardinalidade.

## 🎥 Vídeo de apresentação
[link do vídeo]

![Home do projeto](https://github.com/marianarigueiro/laravel-orm-relationships/blob/main/img.jpeg)

## 🗂️ Tabelas e Relacionamentos

| Tabelas | Cardinalidade | Descrição |
|---|---|---|
| `users` ↔ `profiles` | 1:1 | Cada usuário possui exatamente um perfil |
| `users` ↔ `posts` | 1:N | Um usuário pode ter vários posts |
| `posts` ↔ `tags` | N:M | Um post pode ter várias tags e uma tag pode pertencer a vários posts (via tabela pivô `post_tag`) |

## 📊 Diagrama

\`\`\`
users (1) ──── (1) profiles
users (1) ──── (N) posts
posts (N) ──── (N) tags   [via post_tag]
\`\`\`

## ⚙️ Como rodar o projeto localmente

1. Clone o repositório
2. Rode `composer install`
3. Copie `.env.example` para `.env` e configure suas credenciais do MySQL
4. Crie o banco `ams_laravel_db` vazio no phpMyAdmin
5. Rode `php artisan key:generate`
6. Rode `php artisan migrate`

## 📁 Migrations do projeto

- `create_profiles_table` — cria `profiles` com FK para `users` (1:1, via `unique`)
- `create_posts_table` — cria `posts` com FK para `users` (1:N)
- `create_tags_table` — cria `tags`
- `create_post_tag_table` — tabela pivô do relacionamento N:M entre `posts` e `tags`

## 📄 Dump SQL

O arquivo `database_schema.sql`, na raiz deste repositório, contém a
estrutura completa do banco exportada do phpMyAdmin, incluindo as
constraints de chave estrangeira (`CONSTRAINT ... FOREIGN KEY`) geradas
automaticamente pelo Laravel a partir das migrations.
