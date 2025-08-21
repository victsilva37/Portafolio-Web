<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="components/habilidades/habilidades.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div id="tecno-container">

        <h1>Habilidades</h1>
        <br>

        <!--SECCIÓN: LENGUAJES-->

            <h4>Lenguajes</h4>

            <div id="tec-leng-content">
                <?php
                $_GET['tipo'] = 'Lenguaje';
                include 'components/habilidades/server/cargar_tecnologias.php';
                ?>

                <?php if (!empty($tecnologias)): ?>
                    <?php foreach ($tecnologias as $tec): ?>
                        <div class="card-tecno-leng">
                            <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                            <h3><?= $tec['nombre_tecnologia'] ?></h3>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay tecnologías registradas.</p>
                <?php endif; ?>
            </div>

       <br><br>

        <!--SECCIÓN: FRAMEWORKS-->

            <h4>Frameworks & Tecnologías</h4>

            <div id="tec-frameworks-content">
                <?php
                $_GET['tipo'] = 'Framework/Tecnologias';
                include 'components/habilidades/server/cargar_tecnologias.php';
                ?>

                <?php if (!empty($tecnologias)): ?>
                    <?php foreach ($tecnologias as $tec): ?>
                        <div class="card-tecno-frame">
                            <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                            <h3><?= $tec['nombre_tecnologia'] ?></h3>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay tecnologías registradas.</p>
                <?php endif; ?>
             </div>
        <br><br>



        <!--SECCIÓN: BASE DE DATOS-->

            <h4>Bases de datos</h4>

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

        <br><br>



        <!--SECCIÓN: HERRAMIENTAS-->

            <h4>Herramientas</h4>

            <div id="tec-her-content">
                <?php
                $_GET['tipo'] = 'Herramienta';
                include 'components/habilidades/server/cargar_tecnologias.php';
                ?>

                <?php if (!empty($tecnologias)): ?>
                    <?php foreach ($tecnologias as $tec): ?>
                        <div class="card-tecno-her">
                            <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                            <h3><?= $tec['nombre_tecnologia'] ?></h3>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay tecnologías registradas.</p>
                <?php endif; ?>
            </div>

        <br><br>


        <!--SECCIÓN: OTRAS-->

             <h4>Otras</h4>

            <div id="tec-otr-content">
                <?php
                $_GET['tipo'] = 'Otras';
                include 'components/habilidades/server/cargar_tecnologias.php';
                ?>

                <?php if (!empty($tecnologias)): ?>
                    <?php foreach ($tecnologias as $tec): ?>
                        <div class="card-tecno-otr">
                            <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                            <h3><?= $tec['nombre_tecnologia'] ?></h3>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay tecnologías registradas.</p>
                <?php endif; ?>
            </div>
            
        <br><br>

    </div>
</body>
</html>
