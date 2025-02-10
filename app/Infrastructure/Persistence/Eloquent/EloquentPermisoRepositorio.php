<?php
namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Entities\Permiso;
use App\Domain\Repositories\RepositorioPermisoInterface;
use App\Models\Permiso as PermisoModelo;

class EloquentPermisoRepositorio implements RepositorioPermisoInterface
{
    public function crear(Permiso $permiso)
    {
        $permisoModelo = new PermisoModelo();
        $permisoModelo->nombrepermiso = $permiso->obtenerNombre();
        $permisoModelo->permisocondicion = $permiso->obtenerCondicion();
        $permisoModelo->save();
        return $permisoModelo;
    }

    public function actualizar(Permiso $permiso)
    {
        $permisoModelo = PermisoModelo::find($permiso->obtenerId());
        if (!$permisoModelo) {
            throw new \Exception("Permiso no encontrado");
        }
        $permisoModelo->nombrepermiso = $permiso->obtenerNombre();
        $permisoModelo->permisocondicion = $permiso->obtenerCondicion();
        $permisoModelo->save();
        return $permisoModelo;
    }

    public function eliminar($idpermiso)
    {
        $permisoModelo = PermisoModelo::find($idpermiso);
        if (!$permisoModelo) {
            throw new \Exception("Permiso no encontrado");
        }
        return $permisoModelo->delete();
    }

    public function obtenerPorId($idpermiso)
    {
        return PermisoModelo::find($idpermiso);
    }

    public function obtenerTodos()
    {
        return PermisoModelo::all();
    }
}
