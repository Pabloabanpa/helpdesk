<?php
namespace App\Application\UseCases;

use App\Domain\Entities\Permiso;
use App\Domain\Repositories\RepositorioPermisoInterface;

class CrearPermiso
{
    private $repositorioPermiso;

    public function __construct(RepositorioPermisoInterface $repositorioPermiso)
    {
        $this->repositorioPermiso = $repositorioPermiso;
    }

    /**
     * $datosPermiso: array con claves 'nombrepermiso' y 'permisocondicion'
     */
    public function ejecutar(array $datosPermiso)
    {
        $permiso = new Permiso($datosPermiso['nombrepermiso'], $datosPermiso['permisocondicion']);
        return $this->repositorioPermiso->crear($permiso);
    }
}
