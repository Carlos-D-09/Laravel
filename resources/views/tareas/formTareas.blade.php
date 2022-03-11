<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar tarea</title>
</head>
<body>
    <h1>Agregar Tarea</h1>
    <form action="/tarea" method = "POST">
        @csrf
        <label for="tarea">Nombre de la tarea: </label><br>
        <input type="text" name = "tarea"></input><br>
        @error('tarea')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="descripcion">Descripcion: </label><br>
        <textarea name="descripcion" id="descripcion" cols="10" rows="5"></textarea><br>
        @error('descripcion')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="categoria">Categoria</label><br>
        <select name="categoria" id="categoria">
            <option value="Escuela">Escuela</option>
            <option value="Trabajo">Trabajo</option>
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
