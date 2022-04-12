<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        //La instnacia de esta tarea pertenece a un solo
        //usuario
        return $this->belongsTo(User::class);
    }
}
