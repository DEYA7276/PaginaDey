<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $table = 'tables';
    protected $primaryKey = 'id_table';
    // Especificar la tabla si el nombre no sigue la convención plural
    

    // Los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'table_number',
        'capacity',
        'location',
        'id_staff',
        'id_table'
    ];

    // Relación con el modelo Staff (personal)
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff', 'id_staff');
        
    }

    // Relación con el modelo Reservation (reservas)
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_table');
    }


    
}
