<?php

namespace App\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\RepositorioRolInterface;
use App\Infrastructure\Persistence\Eloquent\EloquentRolRepositorio;
use App\Domain\Repositories\RepositorioPermisoInterface;
use App\Infrastructure\Persistence\Eloquent\EloquentPermisoRepositorio;

class RepositorioServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Vincula la interfaz RepositorioRolInterface con su implementación concreta
        $this->app->bind(RepositorioRolInterface::class, EloquentRolRepositorio::class);

        // Vincula la interfaz RepositorioPermisoInterface con su implementación concreta
        $this->app->bind(RepositorioPermisoInterface::class, EloquentPermisoRepositorio::class);
    }

    public function boot()
    {
        // No hay acciones necesarias en el método boot por ahora, pero está aquí para futuras extensiones
    }
}
