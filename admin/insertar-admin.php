<?php
include 'funciones/funciones.php';
if (isset($_POST['agregar-admin'])) {

	// die(json_encode($_POST));

	$usuario = $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$password = $_POST['password'];

	$opciones = array(
		'cost' => 12
	);

	$password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

	try {
		$stmt = $dbc->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
		$stmt->execute();
		$id_registro = $stmt->insert_id;
		if ($id_registro > 0) {
			$respuesta = array(
				'respuesta' => 'exito',
				'id_admin' => $id_registro
			);
			
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'id_admin' => $id_registro
			);
		}
		$stmt->close();
		$dbc->close();
	} catch (Exception $e) {
		echo 'Error' . $e->getMessage();
	}

	die(json_encode($respuesta));
}