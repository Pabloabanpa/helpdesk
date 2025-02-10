<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Rol;

interface RepositorioRolInterface
{
    public function crear(Rol $rol);
    public function actualizar(Rol $rol);
    public function eliminar($idrol);
    public function obtenerPorId($idrol);
    public function obtenerTodos();
}
