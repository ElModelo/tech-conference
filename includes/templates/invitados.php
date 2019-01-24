<h2>Invitados</h2>
   <div class="separador">
    <i class="fas fa-cog"></i>
    <i class="fas fa-cog"></i>
    <i class="fas fa-cog"></i>
   </div><!--separador-->
   
   <?php

      try {

        require_once('includes/funciones/db_conexion.php');
        $sql = "SELECT * FROM `invitados`";
        
        $resultado = $dbc->query($sql);
      } catch (Exception $e) {

        echo $e->getMessage();

      }
   ?>
   
  <section class="invitados contenedor section">
    
    <ul class="lista-invitados clearfix">
    <?php while ($invitados = $resultado->fetch_assoc()) { ?>
         
      <li>
        <div class="invitado">
          <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
            <img src="img/<?php echo $invitados['url_imagen']; ?>" alt="imagen invitado">
            <p><?php echo $invitados['nombre'] . " " . $invitados['apellido']; ?></p>
          </a>
          
        </div><!--invitado-->
      </li>
      <div style="display: none;">
        <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
          <h2><?php  echo $invitados['nombre'] . " " . $invitados['apellido']; ?></h2>
          <div class="separador">
            <i class="fas fa-cog"></i>
            <i class="fas fa-cog"></i>
            <i class="fas fa-cog"></i>
          </div><!--separador-->
          <img src="img/<?php echo $invitados['url_imagen']; ?>" alt="imagen invitado">
          <p><?php echo $invitados['descripcion']; ?></p>
        </div>
        
      </div>
       <?php }// while de fetch_assoc()?>
    </ul>
  </section><!--invitados-->
   
    
   </div>

   <?php $dbc->close(); ?>
  