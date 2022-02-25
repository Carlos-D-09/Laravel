<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareasSeeder extends Seeder
{
    function run()
    {
        DB::table('tareas') -> insert([
            'tarea' => 'Ejemplo de tarea',
            'descripcion' => 'Ejemplo descripcion',
            'categoria' => 'Escuela',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
