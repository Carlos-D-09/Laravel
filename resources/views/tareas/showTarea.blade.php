<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/formTareas.css') }}">
    <title>Document</title>
</head>
<body>
    <h1>Tarea </h1>
    <h2>Usuario: {{ $tarea->user->name}}</h2>
    <ul>
        <li> <a href="../tarea">Mostrar Tareas</a> </li>
    </ul>
    <table>
        <tr>
            <th>Id</th>
            <th>Tarea</th>
            <th>Descripcion</th>
            <th>Categoria</th>
        </tr>
        <tr>
            <td>{{$tarea->id}}</td>
            <td>{{$tarea->tarea}}</td>
            <td>{{$tarea->descripcion}}</td>
            <td>{{$tarea->tipo}}</td>
        </tr>
    </table>
</body>
</html>
