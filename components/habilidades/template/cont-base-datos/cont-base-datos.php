<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link archivo CSS-->
    <link rel="stylesheet" href="components/habilidades/template/cont-base-datos/cont-base-datos.css">

</head>
<body>

    <!--TÍTULO-->

        <h4>Bases de datos</h4>


    <!--CONTENIDO-->

        <div id="tec-bd-content">
            <?php
            $_GET['tipo'] = 'Base de datos';
            include 'components/habilidades/server/cargar_tecnologias.php';
            ?>

            <?php if (!empty($tecnologias)): ?>
                <?php foreach ($tecnologias as $tec): ?>
                    <div class="card-tecno-bd">
                        <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                        <h3><?= $tec['nombre_tecnologia'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay tecnologías registradas.</p>
            <?php endif; ?>
        </div>


</body>
</html>