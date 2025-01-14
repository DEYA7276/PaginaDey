<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no sigue la convención plural
    protected $table = 'clients';
    protected $primaryKey = 'id_client';

    // Los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'phone',
        'email',
        'registration_date',
    ];

    // Relación con el modelo Reservation (reservas)
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_client');
    }
}
