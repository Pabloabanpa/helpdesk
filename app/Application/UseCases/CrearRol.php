<?php
namespace App\Application\UseCases;

use App\Domain\Entities\Rol;
use App\Domain\Repositories\RepositorioRolInterface;

class CrearRol
{
    private $repositorioRol;

    public function __construct(RepositorioRolInterface $repositorioRol)
    {
        $this->repositorioRol = $repositorioRol;
    }

    /**
     * $datosRol: array con claves 'nombrerol', 'condicionrol' y opcionalmente 'permisos' (array de IDs)
     */
    public function ejecutar(array $datosRol)
    {
        $rol = new Rol($datosRol['nombrerol'], $datosRol['condicionrol']);
        if (isset($datosRol['permisos'])) {
            $rol->asignarPermisos($datosRol['permisos']);
        }
        return $this->repositorioRol->crear($rol);
    }
}
