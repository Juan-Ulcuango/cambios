<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'producto_id';
    protected $fillable = ['nombre_producto', 'descripcion_producto', 'precio_unitario', 'categoria_id'];
    public static $rules = [];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
    }

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id', 'inventario_id');
    }
}
