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
        <input type="text" name = "tarea" value = "{{old('tarea')}}"><br>
        @error('tarea')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="descripcion">Descripcion: </label><br>
        <textarea name="descripcion" id="descripcion" cols="10" rows="5">{{old('descripcion')}}</textarea><br>
        @error('descripcion')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="tipo">Categoria</label><br>
        <select name="tipo" id="tipo">
            <option value="Escuela" {{old('tipo') == 'Escuela'? 'selected' : ''}}>Escuela</option>
            <option value="Trabajo" {{old('tipo') == 'Trabajo'? 'selected' : ''}}>Trabajo</option>
            <option value="Otra.. " {{old('tipo') == 'Otra'? 'selected' : ''}}>Otra..</option>
        </select><br>
        <br>
        <label for="etiqueta_id">Etiqueta</label>
        <select name="etiqueta_id[]" multiple>
            @foreach($etiquetas as $etiqueta)
                <option value="{{$etiqueta->id}}">{{$etiqueta->etiqueta}}</option>
            @endforeach
        </select>
        <br>
        <br> <input type="submit" value="Guardar">
    </form>
</body>
</html>
