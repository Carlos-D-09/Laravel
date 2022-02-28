<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grabaciones</title>
</head>
<body>
    <!--
        <h1>Grabaciones de <?php echo $nombre?></h1>
    -->
    <!--
    plantilla de blade que equivale a abrir el codigo de php y
    realizar un echo
    -->
    <h1>Grabaciones de {{ $nombre }}</h1>
    {{ $otra }}
</body>
</html>