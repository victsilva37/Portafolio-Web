<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="components/tecnologias/tecnologias.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div id="tecno-container">

        <h1>Tecnologías</h1>
        <br>

        <!--Template: CONT-LENGUAJES-->
        <?php include 'template/cont-lenguajes/cont-lenguajes.php'?>
        <br><br>

        <!--Template: CONT-FRAMEWORKS-->
        <?php include 'template/cont-frameworks/cont-frameworks.php'?>
        <br><br> 

        <!--Template: CONT-BASE-DATOS-->
        <?php include 'template/cont-base-datos/cont-base-datos.php'?>
        <br><br>

        <!--Template: CONT-DEVOPS-->
        <?php include 'template/cont-devops/cont-devops.php'?>
        <br><br>

        <!--Template: CONT-HERRAMIENTAS-->
        <?php include 'template/cont-herramientas/cont-herramientas.php'?>
        <br><br>

    </div>
</body>
</html>
