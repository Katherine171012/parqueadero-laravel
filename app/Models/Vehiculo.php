<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $fillable = [
        'placa',
        'tipo',
        'propietario',
        'observaciones'
    ];

    static public function getVehiculos()
    {
        return self::all();
    }

    static public function getVehiculosById($id)
    {
        return self::find($id);
    }

    // CORRECCIÓN 1: Quitar 'Request' y aceptar el array directamente
    static public function createVehiculo($datos)
    {
        return self::create($datos);
    }

    // CORRECCIÓN 2: Quitar 'static' y usar '$this' para que actualice SOLO este vehículo
    // (La guía original tenía un error grave aquí que podría dañar otros datos)
    public function updateVehiculo($datos)
    {
        return $this->update($datos);
    }

    // CORRECCIÓN 3: Quitar 'static' para borrar correctamente la instancia actual
    public function deleteVehiculo()
    {
        return $this->delete();
    }
}
