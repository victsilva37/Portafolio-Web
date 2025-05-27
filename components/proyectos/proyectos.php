<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="components/proyectos/proyectos.css">
    <title>Proyectos</title>
</head>
<body>
    <div id="proy-main-container">
        <h1>Proyectos</h1>
        <div id="proyectos-content">
            <?php include 'components/proyectos/cargar_proyectos.php'; ?>
            <?php if (!empty($proyectos)): ?>
                <?php foreach ($proyectos as $proyecto): ?>

                    <!--TARJETAS DE PROYECTOS-->

                        <div class="proyecto-item <?php echo htmlspecialchars($proyecto['estado']); ?>">

                            <!--BANNER DEL PROYECTO-->

                                <div id="banner_img_proyecto">
                                    <img src="assets/<?php echo htmlspecialchars($proyecto['img_proyecto']); ?>" alt="<?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?>">
                                </div>
                            

                            <!--INFORMACIÓN DEL PROYECTO-->

                                <h4><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?></h4>
                                <p><?php echo htmlspecialchars($proyecto['desc_proyecto']); ?></p>

                            <div id="tec-pro">
                                <?php if (!empty($proyecto['tecnologias'])): ?>
                                    <?php foreach ($proyecto['tecnologias'] as $tec): ?>
                                      
                                        <li> 
                                            <img id="icon_tecnolo" src="assets/<?php echo htmlspecialchars($tec['icono']); ?>" alt="<?php echo htmlspecialchars($tec['nombre']); ?>" title="<?php echo htmlspecialchars($tec['nombre']); ?>">
                                        </li>
                            
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </div>
                            

                            <!--LINK DE REPOSITORIO-->
                            <div id="a-link-repo">
                                <strong><a  href="<?php echo htmlspecialchars($proyecto['link_repo']); ?>" target="_blank">Repositorio</a></strong>
                            </div>
                                
                           
                        </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay proyectos registrados.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
