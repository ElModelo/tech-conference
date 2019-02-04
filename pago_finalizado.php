<?php include_once'includes/templates/header.php'; ?>
  <section class="section contenedor">
    <h2>Resumen Registro</h2>
    <div class="separador">
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
      <i class="fas fa-cog"></i>
    </div><!--separador -->
  </section>
<?php
    $resultado = $_GET['exito'];
    
    if ($resultado == "true") {
        $paymentId = $_GET['paymentId'];
        $id_pago = $_GET['id_pago'];

        require_once('includes/funciones/db_conexion.php');
            $stmt = $dbc->prepare("UPDATE `registrados` SET `pagado` = ? WHERE `id_registrado` = ?");     
            $pagado = 1;
            $stmt->bind_param("ii", $pagado, $id_pago);      
            $stmt->execute();
            $stmt->close();
            $dbc->close();

        echo "el pago se realizo correctamente";
        echo '<br>';
        echo "el ID es {$paymentId}";
    } else {
        echo 'El pago no se realizo';
    }

?>
<?php include_once 'includes/templates/footer.php'; ?>