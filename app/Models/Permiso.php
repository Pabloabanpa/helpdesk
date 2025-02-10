<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permiso';
    protected $primaryKey = 'idpermiso';
    public $timestamps = false; // Ajustar según corresponda
    protected $fillable = ['nombrepermiso', 'permisocondicion'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_permiso', 'idpermiso', 'idrol');
    }
}
