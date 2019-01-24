<?php include_once'includes/templates/header.php'; ?>
  <section class="section contenedor">
    <h2>Los mejores Topicos de ciencia y tecnologia </h2>
    <div class="separador">
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
    </div>
    <p>
      It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
    </p>
  </section><!--section-->
  <section class="programa">
    <div class="contenedor-video">
      <video autoplay loop poster="img/bg-talleres.jpg" muted>
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">
      </video>
    </div><!--.contenedor-video-->
    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del Evento</h2>
          <div class="separador">
            <i class="fas fa-cog"></i>
            <i class="fas fa-cog"></i>
            <i class="fas fa-cog"></i>
          </div><!--separador-->
          <?php

            try {

              require_once('includes/funciones/db_conexion.php');
              $sql = "SELECT * FROM `categoria_evento`";           
              $resultado = $dbc->query($sql);
            } catch (Exception $e) {

              echo $e->getMessage();

            }
          ?>

          <nav class="menu-programa">
            <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <a href="#<?php echo strtolower($cat['cat_evento']); ?>">
              <i class="fa <?php echo $cat['icono']; ?>"></i><?php echo $cat['cat_evento']; ?></a>
            <?php } ?>
          </nav>
          <?php

            try {

              require_once('includes/funciones/db_conexion.php');
              $sql1 = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre, apellido ";
              $sql1 .= " FROM eventos ";
              $sql1 .= " INNER JOIN categoria_evento ";
              $sql1 .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql1 .= " INNER JOIN invitados ";
              $sql1 .= " ON eventos.id_inv = invitados.invitado_id "; 
              $sql1 .= " AND eventos.id_cat_evento = 3";
              $sql1 .= " ORDER BY evento_id LIMIT 2";

              $sql2 = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre, apellido ";
              $sql2 .= " FROM eventos ";
              $sql2 .= " INNER JOIN categoria_evento ";
              $sql2 .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql2 .= " INNER JOIN invitados ";
              $sql2 .= " ON eventos.id_inv = invitados.invitado_id "; 
              $sql2 .= " AND eventos.id_cat_evento = 2";
              $sql2 .= " ORDER BY evento_id LIMIT 2";

              $sql3 = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre, apellido ";
              $sql3 .= " FROM eventos ";
              $sql3 .= " INNER JOIN categoria_evento ";
              $sql3 .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql3 .= " INNER JOIN invitados ";
              $sql3 .= " ON eventos.id_inv = invitados.invitado_id "; 
              $sql3 .= " AND eventos.id_cat_evento = 1";
              $sql3 .= " ORDER BY evento_id LIMIT 2";

              $resultado1 = $dbc->query($sql1);
              $resultado2 = $dbc->query($sql2);
              $resultado3 = $dbc->query($sql3);
            } catch (Exception $e) {

              echo $e->getMessage();

            }
          ?>
          
          
          <div id="talleres" class="info-curso ocultar clearfix">
            <?php while ($taller = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
            <div class="detalle-evento">

              <h3><?php echo $taller["nombre_evento"]; ?></h3>
              <p><i class="far fa-clock"></i> <?php echo $taller["hora_evento"]; ?></p>
              <p><i class="far fa-calendar-alt"></i> <?php echo $taller["fecha_evento"]; ?></p>
              <p><i class="fas fa-user"></i> <?php echo $taller["nombre"]. " ". $taller["apellido"]; ?></p>
            </div><!--.detalle-evento-->
            <?php } ?>
            <a href="calendario.php" class="button float-right">Ver todos</a>
            
          </div><!--#Talleres-->
          <div id="conferencias" class="info-curso ocultar clearfix">
            <?php while ($conferencia = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
            <div class="detalle-evento">
              <h3><?php echo $conferencia["nombre_evento"]; ?></h3>
              <p><i class="far fa-clock"></i> <?php echo $conferencia["hora_evento"]; ?></p>
              <p><i class="far fa-calendar-alt"></i> <?php echo $conferencia["fecha_evento"]; ?></p>
              <p><i class="fas fa-user"></i> <?php echo $conferencia["nombre"]. " ". $conferencia["apellido"]; ?></p>
            </div><!--.detalle-evento-->
            <?php } ?>
            <a href="calendario.php" class="button float-right">Ver todos</a>
          </div><!--#Conferencias-->
          <div id="seminarios" class="info-curso ocultar clearfix">
            <?php while ($seminario = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
            <div class="detalle-evento">
              <h3><?php echo $seminario["nombre_evento"]; ?></h3>
              <p><i class="far fa-clock"></i> <?php echo $seminario["hora_evento"]; ?></p>
              <p><i class="far fa-calendar-alt"></i> <?php echo $seminario["fecha_evento"]; ?></p>
              <p><i class="fas fa-user"></i> <?php echo $seminario["nombre"]. " ". $seminario["apellido"]; ?></p>
            </div><!--.detalle-evento-->
            <?php } ?>
            <a href="calendario.php" class="button float-right">Ver todos</a>
          </div><!--#Seminarios-->


        </div><!--.programa-evento-->
        
      </div><!--.contenedor-->
      
    </div><!--.conetido-programa-->
  </section><!--.programa-->
  <?php include_once 'includes/templates/invitados.php'; ?>
  <div class="contador parallax ">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero">0</p> Invitados</li>
        <li><p class="numero">0</p> Talleres</li>
        <li><p class="numero">0</p> Días</li>
        <li><p class="numero">0</p>Invitados</li>
      </ul>
    </div><!--contenedor-->
  </div><!--Contador-->
  <section class="precios section">
    <h2>Precios</h2>
    <div class="separador">
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
    </div><!--separador-->
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por día</h3>
            <p class="numero">$30</p>
            <ul>
              <li><i class="fas fa-check"></i>Bocadillos gratis</li>
              <li><i class="fas fa-check"></i>Todas las conferencias</li>
              <li><i class="fas fa-check"></i>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div><!--tabla-precio-->
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Todos los días</h3>
            <p class="numero">$50</p>
            <ul>
              <li><i class="fas fa-check"></i>Bocadillos gratis</li>
              <li><i class="fas fa-check"></i>Todas las conferencias</li>
              <li><i class="fas fa-check"></i>Todos los talleres</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div><!--tabla-precio-->
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 días</h3>
            <p class="numero">$45</p>
            <ul>
              <li><i class="fas fa-check"></i>Bocadillos gratis</li>
              <li><i class="fas fa-check"></i>Todas las conferencias</li>
              <li><i class="fas fa-check"></i>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div><!--tabla-precio-->
        </li>
      </ul><!--lista-precios-->
    </div><!--contenedor-->
  </section><!--precios-->
  <div id="mapa" class="mapa"></div>
  <section class="section">
    <h2>Testimoniales</h2>
    <div class="separador">
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
    </div><!--separador-->
    <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Rafael Uceta <span>Diseñador en @prisma </span></cite>
          </footer><!--info testimonial-->
        </blockquote>   
      </div><!--testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Rafael Uceta <span>Diseñador en @prisma </span></cite>
          </footer><!--info testimonial-->
        </blockquote>
      </div><!--testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Rafael Uceta <span>Diseñador en @prisma </span></cite>
          </footer><!--info testimonial-->
        </blockquote> 
      </div><!--testimonial-->
    </div><!--testimoniales contenedor-->
  </section><!--testimoniales-->
  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p><h2>Registrate al newsletter:</h2></p>
      <h3>Tech-conference</h3>
      <a href="#mc_embed_signup" class="boton_newsletter button transparente">Suscribete</a>

      
    </div><!--contenido-->
  </div><!--newsletter-->
  <section class="section">
    <h2>Faltan</h2>
    <div class="separador">
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
    </div><!--separador-->
    <div class="cuenta-regresiva">
      <ul class="clearfix contenedor">
        <li><p id="dias" class="numero"></p>días</li>
        <li><p id="horas" class="numero"></p>horas</li>
        <li><p id="minutos" class="numero"></p>minutos</li>
        <li><p id="segundos" class="numero"></p>segundos</li>
        
      </ul><!--cuenta-regresiva-->
    </div><!--contenedor-->   
  </section><!--section-->
  <?php include_once 'includes/templates/footer.php'; ?>