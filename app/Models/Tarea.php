<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'tarea', 'descripcion', 'tipo'];

    // protected function getTareaAttribute($value)
    // {
    //     return strtoupper($value);
    // }

    protected function setTareaAttribute($value)
    {
        $this->attributes['tarea'] = strtolower($value);
    }

    public function user()
    {
        //La instnacia de esta tarea pertenece a un solo
        //usuario
        return $this->belongsTo(User::class);
    }
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }
}
