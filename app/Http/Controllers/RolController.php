<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\CrearRol;
use App\Application\UseCases\ActualizarRol;
use App\Domain\Repositories\RepositorioRolInterface;

class RolController extends Controller
{
    private $crearRol;
    private $actualizarRol;
    private $repositorioRol;

    public function __construct(RepositorioRolInterface $repositorioRol)
    {
        // Se inyecta el repositorio (se resolverá mediante el ServiceProvider)
        $this->repositorioRol = $repositorioRol;
        $this->crearRol = new CrearRol($repositorioRol);
        $this->actualizarRol = new ActualizarRol($repositorioRol);
    }

    public function index()
    {
        $roles = $this->repositorioRol->obtenerTodos();
        return response()->json($roles);
    }

    public function store(Request $request)
    {
        // Validar datos (se puede utilizar FormRequest para mayor claridad)
        $datos = $request->all();
        $rolCreado = $this->crearRol->ejecutar($datos);
        return response()->json($rolCreado, 201);
    }

    public function show($idrol)
    {
        $rol = $this->repositorioRol->obtenerPorId($idrol);
        return response()->json($rol);
    }

    public function update(Request $request, $idrol)
    {
        $datos = $request->all();
        $rolActualizado = $this->actualizarRol->ejecutar($idrol, $datos);
        return response()->json($rolActualizado);
    }

    public function destroy($idrol)
    {
        $this->repositorioRol->eliminar($idrol);
        return response()->json(['mensaje' => 'Rol eliminado correctamente'], 200);
    }
}
