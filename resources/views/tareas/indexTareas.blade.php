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
    <ul>
        <li> <a href="tarea/create">Crear Nueva Tarea</a> </li>
    </ul>
    <table>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Tarea</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </tr>
        @foreach ($tareas as $tarea)
            <tr>
                <td>{{$tarea->id}}</td>
                <td>{{$tarea->user->name}}</td>
                <td>{{$tarea->tarea}}</td>
                <td>{{$tarea->descripcion}}</td>
                <td>{{$tarea->tipo}}</td>
                <td>
                    <form action="/tarea/{{$tarea->id}}">
                        <button> detalle </button>
                    </form>
                    <form action="/tarea/{{$tarea->id}}/edit">
                        <button> editar </button>
                    </form>
                    <form action="/tarea/{{$tarea->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
