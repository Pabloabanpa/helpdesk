<?php
namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Entities\Rol;
use App\Domain\Repositories\RepositorioRolInterface;
use App\Models\Rol as RolModelo;

class EloquentRolRepositorio implements RepositorioRolInterface
{
    public function crear(Rol $rol)
    {
        $rolModelo = new RolModelo();
        $rolModelo->nombrerol = $rol->obtenerNombre();
        $rolModelo->condicionrol = $rol->obtenerCondicion();
        $rolModelo->save();

        // Si se asignan permisos (se espera un array de IDs de permiso)
        if (!empty($rol->obtenerPermisos())) {
            $rolModelo->permisos()->sync($rol->obtenerPermisos());
        }
        return $rolModelo;
    }

    public function actualizar(Rol $rol)
    {
        $rolModelo = RolModelo::find($rol->obtenerId());
        if (!$rolModelo) {
            throw new \Exception("Rol no encontrado");
        }
        $rolModelo->nombrerol = $rol->obtenerNombre();
        $rolModelo->condicionrol = $rol->obtenerCondicion();
        $rolModelo->save();

        if (!empty($rol->obtenerPermisos())) {
            $rolModelo->permisos()->sync($rol->obtenerPermisos());
        }
        return $rolModelo;
    }

    public function eliminar($idrol)
    {
        $rolModelo = RolModelo::find($idrol);
        if (!$rolModelo) {
            throw new \Exception("Rol no encontrado");
        }
        // Desvincular los permisos asignados
        $rolModelo->permisos()->detach();
        return $rolModelo->delete();
    }

    public function obtenerPorId($idrol)
    {
        return RolModelo::with('permisos')->find($idrol);
    }

    public function obtenerTodos()
    {
        return RolModelo::with('permisos')->get();
    }
}
