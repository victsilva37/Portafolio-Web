<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    
    <?php include 'layouts/menu/menu.php'?>

    <?php include 'layouts/sidebar/sidebar.php'?>

        <section id="inicio">
            <?php include 'components/inicio/inicio.php' ?>
        </section>

        <section id="sobre_mi">
            <?php include 'components/sobre_mi/sobre_mi.php' ?>
        </section>

        <section id="habilidades">
            <?php include 'components/habilidades/habilidades.php'?>
        </section>

        <section id="experiencia">
            <?php include 'components/experiencia/experiencia.php'?>
        </section>

        <section id="formacion">
            <?php include 'components/formacion/formacion.php'?>
        </section>

        <section id="proyectos">
            <?php include 'components/proyectos/proyectos.php'?>
        </section>


    <?php include 'layouts/footer/footer.php'?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

</body>
</html>