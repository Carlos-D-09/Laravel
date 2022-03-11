<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/formTareas.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas</title>
</head>
<body>
    <h1>Tareas</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Tarea</th>
            <th>Descripcion</th>
            <th>Categoria</th>
        </tr>
        @foreach ($tareas as $tarea)
            <tr>
                <td>{{$tarea->id}}</td>
                <td>{{$tarea->tarea}}</td>
                <td>{{$tarea->descripcion}}</td>
                <td>{{$tarea->tipo}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
