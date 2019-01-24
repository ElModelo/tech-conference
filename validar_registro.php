<?php 
    if (isset($_POST['submit'])){
    	$nombre = $_POST['nombre'];
    	$apellido = $_POST['apellido'];
    	$email = $_POST['email'];
    	$regalo = $_POST['regalo'];
    	$total = $_POST['total_pedido'];
    	$fecha = date('Y-m-d H:i:s');


   		// Pedidos
   		$boletos = $_POST['boletos'];
   		$camisas = $_POST['pedido_camisas'];
   		$etiquetas = $_POST['pedido_etiquetas'];
   		include_once'includes/funciones/funciones.php';
   		$pedido = productos_json($boletos, $camisas, $etiquetas);
   		
   		//Eventos
   		$eventos = $_POST['registro'];

   		$registro = eventos_json($eventos);

   		try {
            require_once('includes/funciones/db_conexion.php');
            $stmt = $dbc->prepare("INSERT INTO `registrados`(`nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registrado`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`) VALUES (?,?,?,?,?,?,?,?)");     
            $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);      
            $stmt->execute();
            $stmt->close();
            $dbc->close();
            header('Location: validar_registro.php?exitoso=1');
            } catch (Exception $e) {

              $error = $e->getMessage();

    		}
    }
?>
<?php include_once'includes/templates/header.php'; ?>
  <section class="section contenedor">
    <h2>Resumen Registro</h2>
    <div class="separador">
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
    </div><!--separador -->
  </section>
<?php if (isset($_GET['exitoso'])){
		if ($_GET['exitoso'] == "1") {
			echo 'Registro exitoso';
		}


		} ?>
<?php include_once 'includes/templates/footer.php'; ?>