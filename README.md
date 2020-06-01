##LOADLIME 

###### Metronic 7 + Laravel 7 + VUE + WEBPACK

### Introduction

...

### Installation

Laravel has a set of requirements in order to ron smoothly in specific environment. Please see [requirements](https://laravel.com/docs/7.x#server-requirements) section in Laravel documentation.

Metronic similarly uses additional plugins and frameworks, so ensure You have [Composer](https://getcomposer.org/) and [Node](https://nodejs.org/) installed on Your machine.

Assuming your machine meets all requirements - let's process to installation of Metronic Laravel integration (skeleton).

1. Open in cmd or terminal app and navigate to this folder
2. Run following commands

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
npm install
```
For Db migration 
```bash
php artisan migrate
```
```bash
npm run dev
```
change runtime javascript, css, media in resource folder 
```bash
npm run watch-poll
```
```bash
php artisan serve
```

And navigate to generated server link (http://127.0.0.1:8000)
or you can test it in xampp http server in public folder
### Copyright
@2020 keyline Creative Service
...
