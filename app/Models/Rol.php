<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'idrol';
    public $timestamps = false; // Ajustar según tus necesidades
    protected $fillable = ['nombrerol', 'condicionrol'];

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'rol_permiso', 'idrol', 'idpermiso');
    }
}
