<?php
namespace App\Application\UseCases;

use App\Domain\Entities\Rol;
use App\Domain\Repositories\RepositorioRolInterface;

class ActualizarRol
{
    private $repositorioRol;

    public function __construct(RepositorioRolInterface $repositorioRol)
    {
        $this->repositorioRol = $repositorioRol;
    }

    /**
     * $datosRol: array con claves 'nombrerol', 'condicionrol' y opcionalmente 'permisos'
     */
    public function ejecutar($idrol, array $datosRol)
    {
        $rolExistente = $this->repositorioRol->obtenerPorId($idrol);
        if (!$rolExistente) {
            throw new \Exception("Rol no encontrado");
        }
        $rolActualizado = new Rol($datosRol['nombrerol'], $datosRol['condicionrol'], $idrol);
        if (isset($datosRol['permisos'])) {
            $rolActualizado->asignarPermisos($datosRol['permisos']);
        }
        return $this->repositorioRol->actualizar($rolActualizado);
    }
}
