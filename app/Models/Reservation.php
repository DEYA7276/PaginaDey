<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no sigue la convención plural
    protected $table = 'reservations';

    protected $primaryKey = 'id_reservation';
    // Los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'id_client',
        'id_table',
        'reservation_datetime',
        'status',
    ];

    // Relación con el modelo Client (cliente)
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    // Relación con el modelo Table (mesa)
    public function table()
    {
        return $this->belongsTo(Table::class, 'id_table');
    }
}



