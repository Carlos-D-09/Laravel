<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar tarea</title>
</head>
<body>
    <h1>Editar Tarea</h1>
    <form action="/tarea/{{$tarea->id}}" method = "POST">
        @method('PATCH')
        @csrf
        <label for="tarea">Nombre de la tarea: </label><br>
        <input type="text" name = "tarea" value = "{{$tarea->tarea}}"><br>
        @error('tarea')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="descripcion">Descripcion: </label><br>
        <textarea name="descripcion" id="descripcion" cols="10" rows="5">{{$tarea->descripcion}}</textarea><br>
        @error('descripcion')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="tipo">Categoria</label><br>
        <select name="tipo" id="tipo">
            <option value="Escuela" {{$tarea->tipo == 'Esuela' ? 'selected': ''}}>Escuela</option>
            <option value="Trabajo" {{$tarea->tipo == 'Trabajo' ? 'selected': ''}}>Trabajo</option>
            <option value="Otra" {{$tarea->tipo == 'Otra' ? 'selected': ''}}>Otra...</option>
        </select><br>
        @error('descripcion')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <br>
        <br> <input type="submit" value="Guardar">
    </form>
</body>
</html>
