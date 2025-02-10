<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\CrearPermiso;
use App\Application\UseCases\ActualizarPermiso;
use App\Domain\Repositories\RepositorioPermisoInterface;

class PermisoController extends Controller
{
    private $crearPermiso;
    private $repositorioPermiso;

    public function __construct(RepositorioPermisoInterface $repositorioPermiso)
    {
        $this->repositorioPermiso = $repositorioPermiso;
        $this->crearPermiso = new CrearPermiso($repositorioPermiso);
    }

    public function index()
    {
        $permisos = $this->repositorioPermiso->obtenerTodos();
        return response()->json($permisos);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $permisoCreado = $this->crearPermiso->ejecutar($datos);
        return response()->json($permisoCreado, 201);
    }

    public function show($idpermiso)
    {
        $permiso = $this->repositorioPermiso->obtenerPorId($idpermiso);
        return response()->json($permiso);
    }

    public function update(Request $request, $idpermiso)
    {
        $datos = $request->all();
        $actualizarPermiso = new ActualizarPermiso($this->repositorioPermiso);
        $permisoActualizado = $actualizarPermiso->ejecutar($idpermiso, $datos);
        return response()->json($permisoActualizado);
    }

    public function destroy($idpermiso)
    {
        $this->repositorioPermiso->eliminar($idpermiso);
        return response()->json(['mensaje' => 'Permiso eliminado correctamente'], 200);
    }
}
