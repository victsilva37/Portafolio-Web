<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="components/experiencia/experiencia.css">
    <title>Experiencia</title>
</head>
<body>
    <div id="exp-main-container">
        <h1>Experiencia</h1>

        <div id="exp-content">
            <?php include 'components/experiencia/server/cargar_experiencias.php'?>
            <?php if (!empty($experiencias)): ?>
                <?php foreach ($experiencias as $exp): ?>

                    <div class="exp-item">

                        <!--SECCIÓN INFO EXPERIENCIA-->

                            <h4><strong><?php echo htmlspecialchars($exp['cargo_exp']);?></strong> - <?php echo htmlspecialchars($exp['nombre_empresa']); ?></h4>
                            <small>
                                <?php echo htmlspecialchars($exp['direccion']); ?>    |       
                                <strong><?php echo htmlspecialchars($exp['fecha_inicio']); ?> - 
                                    <?php echo $exp['fecha_final'] ? htmlspecialchars($exp['fecha_final']) : 'Actual';?>
                                    </strong>
                            </small>
                            <br>

                            <p><?php echo htmlspecialchars($exp['desc_exp']); ?></p>


                        <!--SECCIÓN TECNOLOGÍAS-->

                            <div id="tec-exp">
                                
                                <ul>
                                    <?php 
                                        if (!empty($exp['tecnologias'])):
                                            $tecnologias = explode(',', $exp['tecnologias']); // Separar las tecnologías por coma
                                            foreach ($tecnologias as $tecnologia):
                                                list($nombre, $icono) = explode('|', $tecnologia); // Separar nombre y icono
                                        ?>
                                        <li>
                                            <img src="assets/<?php echo htmlspecialchars($icono); ?>" 
                                                alt="<?php echo htmlspecialchars($nombre); ?>" 
                                                style="width:20px; height:20px; margin-right:5px;">
                                            <p><?php echo htmlspecialchars($nombre); ?></p>
                                        </li>
                                        <?php 
                                            endforeach;
                                        else:
                                        ?>
                                            <li>N/A</li>
                                        <?php endif; ?>
                                </ul>
                  
                                <!--Modalidad-->
                                <li id="li-modalidad"><?php echo htmlspecialchars($exp['modalidad']); ?></li>
                            </div>
                    </div>
                    <br>                        

                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay experiencias registradas.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
