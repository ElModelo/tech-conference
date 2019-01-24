<?php include_once 'includes/templates/header.php' ?>

  
  <section class="section contenedor">
   <h2>Calendario de Eventos</h2>
   <div class="separador">
    <i class="fas fa-cog"></i>
    <i class="fas fa-cog"></i>
    <i class="fas fa-cog"></i>
   </div><!--separador-->
   
   <?php

      try {

        require_once('includes/funciones/db_conexion.php');
        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre, apellido ";
        $sql .= " FROM eventos ";
        $sql .= " INNER JOIN categoria_evento ";
        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
        $sql .= " INNER JOIN invitados ";
        $sql .= " ON eventos.id_inv = invitados.invitado_id "; 
        $sql .= " ORDER BY evento_id ";

        $resultado = $dbc->query($sql);
      } catch (Exception $e) {

        echo $e->getMessage();

      }
   ?>
   <div class="calendario">

    <?php 
        $calendario = array();
        while ($eventos = $resultado->fetch_assoc()) { 

            // obtiene la fecha  del evento
            $fecha = $eventos['fecha_evento'];
            

            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],
                'icono' => 'fa' . " " .$eventos['icono'],
                'invitado' => $eventos['nombre'] . " " . $eventos['apellido']
            );
            $calendario[$fecha][] = $evento;
        }// while de fetch_assoc()
    ?>

    <?php 
        // imprime todos los eventos
        foreach ($calendario as $dia => $lista_eventos) { ?>
            <h3>
                <i class="fa fa-calendar-alt"></i>
                <?php echo strftime("%A, %d de %B del %Y", strtotime($dia)); ?>
            </h3>
            <?php foreach ($lista_eventos as $evento) { ?>
                
            <div class="dia">
                <p class="titulo"><?php echo $evento['titulo']; ?></p>
                <p class="hora"><i class="far fa-clock" aria-hidden="true"></i> <?php echo $evento['fecha'] . " " . $evento['hora']; ?></p>
                <p class="categoria"><i class="<?php echo $evento['icono'] ?>" aria-hidden="true"></i><?php echo $evento['categoria']; ?></p>
                <p class="invitado"><i class="fas fa-user" aria-hidden="true"></i> <?php echo $evento['invitado']; ?></p>
                
            </div><!--.dia-->






    <?php   } // fin foreach eventos ?>
    <?php }// fin foreach de dias ?>

    
   </div><!--calendario-->

   <?php $dbc->close(); ?>
  </section><!--section-->
 <?php include_once 'includes/templates/footer.php'; ?>