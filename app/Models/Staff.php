<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no sigue la convención plural
    protected $table = 'staff';

    protected $primaryKey = 'id_staff';
    // Los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'role',
        'phone',
        'photo'
    ];

    // Relación con el modelo Table (mesas)
    public function tables()
    {
        return $this->hasMany(Table::class, 'id_staff');
        return $this->belongsTo(Staff::class, 'id_staff');
    }
}
