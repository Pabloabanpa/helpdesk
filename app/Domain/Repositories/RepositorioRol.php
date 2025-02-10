<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Rol;
use Illuminate\Support\Facades\DB;

class RepositorioRol implements RepositorioRolInterface
{
    private $db;

    public function __construct()
    {
    }

    public function crear(Rol $rol)
    {
        // Lógica para crear un rol en la base de datos
    }

    public function actualizar(Rol $rol)
    {
        // Lógica para actualizar un rol en la base de datos
    }

    public function eliminar($idrol)
    {
        // Lógica para eliminar un rol
    }

    public function obtenerPorId($idrol)
    {
        // Lógica para obtener un rol por ID
    }


    public function obtenerTodos()
    {
        try {
            $roles = DB::table('rol')->get();
    
            return $roles; 
        } catch (\Exception $e) {
            throw new \Exception("Error al obtener los roles: " . $e->getMessage());
        }
    }
    

}
