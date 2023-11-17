# Lista de Tareas con Livewire

Este documento describe cómo implementar una lista de tareas simple utilizando Livewire en Laravel.

## Init: Proyecto Laravel 

```bash
composer create-project laravel/laravel ejemplo-practico-tareas
cd ejemplo-practico-tareas 
composer require livewire/livewire
npm install
```
Una vez añadidas las dependencias y installarlas  creamos el componente principal, y la base de datos con el modelo 

```bash
php artisan make:model Tarea -m
```

 Nuestro modelo
```bash
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tareas';
    public $fillable = [ 'tarea', 'estatus' ];
}
```

 Nuestra migración
```bash
public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('tarea');
            $table->boolean('estatus')->default(0);
            $table->timestamps();
        });
    }
```

## Componente Livewire ListaTareas
```bash
php artisan make:livewire ListaTareas
```
que crearia el Controllador y la vista 
app/Livewire/
└── ListaTareas.php

resources/views/
├── components
│   └── icon-livewire.blade.php <------- icon-livewire
├── livewire
│   └── lista-tareas.blade.php  <------- livewire
└── welcome.blade.php

Por ultimo hacemos la migracion en nuestra Base de datos( recuerda configurar tu .env)
```bash
php artisan migrate
```

Ahora corremos nuestros servidores locales 
terminal 1
```bash
php artisan serve
```

terminal 2
```bash
npm run dev
```

## Clonando el repo
```bash
git clone https://github.com/Isc-mntl-snchz/ejemplo-practico-tareas.git
cd ejemplo-practico-tareas 
composer install
npm install
php artisan migrate
```
terminal 1
```bash
php artisan serve
```

terminal 2
```bash
npm run dev
```

