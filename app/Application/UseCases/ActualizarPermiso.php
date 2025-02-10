<?php
namespace App\Application\UseCases;

use App\Domain\Entities\Permiso;
use App\Domain\Repositories\RepositorioPermisoInterface;

class ActualizarPermiso
{
    private $repositorioPermiso;

    public function __construct(RepositorioPermisoInterface $repositorioPermiso)
    {
        $this->repositorioPermiso = $repositorioPermiso;
    }

    public function ejecutar($idpermiso, array $datosPermiso)
    {
        $permisoExistente = $this->repositorioPermiso->obtenerPorId($idpermiso);
        if (!$permisoExistente) {
            throw new \Exception("Permiso no encontrado");
        }
        $permisoActualizado = new Permiso($datosPermiso['nombrepermiso'], $datosPermiso['permisocondicion'], $idpermiso);
        return $this->repositorioPermiso->actualizar($permisoActualizado);
    }
}
