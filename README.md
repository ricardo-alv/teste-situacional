<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Teste Situacional Back End V2

## Instalação

Clone the repo locally:

```sh
https://github.com/ricardo-alv/teste-situacional.git
cd teste-situacional
```

Instalar PHP dependencias:

```sh
composer install
```
Copiar e configurar o arquivo .env:
Informações de banco de dados.

```sh
cp .env.example .env
```
```sh
php artisan key:generate
```
Executar as migrations (Tabelas banco de dados)

```sh
php artisan migrate
```

Fornecer dados a tabela

```sh
php artisan db:seed
```

Iniciar o servidor:
```sh
php artisan serve
```
Acessar a doc Swagger:
```sh
http://127.0.0.1:8000/api/doc
```
Para executar todos os test:
```sh
php artisan test
```
Para executar um test especifico:
```sh
 php artisan test --filter test_name
```
