<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    //Relacon muchos a muchos con usuarios
    public function usuarios()
    {
        return $this->belongsToMany('App\Models\User');
    }

    protected $primaryKey = 'modulo_id';
    public static $rules = [
        
    ];
}
