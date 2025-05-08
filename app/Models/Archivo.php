<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = [
        'user_id',
        'tarea_id',
        'nombre_original',
        'nombre_hash',
        'tamanio',
        'mime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }
}
