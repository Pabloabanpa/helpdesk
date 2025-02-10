<?php
namespace App\Domain\Entities;

class Permiso
{
    private $idpermiso;
    private $nombrepermiso;
    private $permisocondicion;

    public function __construct(string $nombrepermiso, string $permisocondicion, $idpermiso = null)
    {
        $this->idpermiso = $idpermiso;
        $this->nombrepermiso = $nombrepermiso;
        $this->permisocondicion = $permisocondicion;
    }

    public function obtenerId(): ?int
    {
        return $this->idpermiso;
    }

    public function obtenerNombre(): string
    {
        return $this->nombrepermiso;
    }

    public function obtenerCondicion(): string
    {
        return $this->permisocondicion;
    }
}
