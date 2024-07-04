<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaccion_id';
    public static $rules = [
        
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'transaccion_producto', 'transaccion_id', 'producto_id')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
}


