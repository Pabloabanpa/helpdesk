<?php
namespace App\Domain\Entities;

class Rol
{
    private $idrol;
    private $nombrerol;
    private $condicionrol;
    private $permisos; // Array de objetos Permiso o IDs de permiso

    public function __construct(string $nombrerol, string $condicionrol, $idrol = null, array $permisos = [])
    {
        $this->idrol = $idrol;
        $this->nombrerol = $nombrerol;
        $this->condicionrol = $condicionrol;
        $this->permisos = $permisos;
    }

    public function obtenerId(): ?int
    {
        return $this->idrol;
    }

    public function obtenerNombre(): string
    {
        return $this->nombrerol;
    }

    public function obtenerCondicion(): string
    {
        return $this->condicionrol;
    }

    public function obtenerPermisos(): array
    {
        return $this->permisos;
    }

    public function asignarPermisos(array $permisos)
    {
        $this->permisos = $permisos;
    }
}
