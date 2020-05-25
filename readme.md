# Desafio Funcional Health Tech

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Uma aplicação simples de simulação de banco digital com visualização de saldo, depósito e saque.

**Tecnologias uilizadas**

- Laravel 5.8
- Composer 1.9.1
- PHP 7.1.3
- PHPUnit 7.5
- MariaDB 10.4.8
- JQuery 3.5.0

## Instalação

- Clonar o repositório.
- Ter instaladas as tecnologias utilizadas.
- Criar o banco de dados challenge-funcional-health.
- Abrir um terminal na pasta do projeto.
- Rodar composer update no terminal.
- Rodar php artisan migrate --seed para criar as tabelas na base e popular o banco.
- O banco foi populado com duas contas de número 12345 e 54321 para teste.
- Para rodar o projeto php artisan serve no terminal.
- Para rodar os testes automatizados ./vendor/bin/phpunit no terminal.
- O coverage do teste encontra-se na pasta coverage na raiz do projeto.
