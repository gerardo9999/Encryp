<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncrypModel extends Model
{
    use HasFactory;

    protected $table = 'encriptations';
    protected $id = 'id';

    protected $fillable = [
        'nombre_apellido',
        'codigo',
        'numero_tarjeta',
        'vencimiento',
    ];

}
