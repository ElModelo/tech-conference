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
if (isset($_POST['login-admin'])) {
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	try {
		$stmt = $dbc->prepare("SELECT * FROM admins WHERE usuario = ?");
		$stmt->bind_param('s', $usuario);
		$stmt->execute();
		$stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);
		if ($stmt->affected_rows) {
			$existe = $stmt->fetch();
			

			if ($existe) {
				if (password_verify($password, $password_admin)) {
					session_start();
					$_SESSION['usuario'] = $usuario_admin;
					$_SESSION['nombre'] = $nombre_admin;
					$_SESSION['password'] = $password_admin;
					$respuesta = array(
					'respuesta' => 'exitoso',
					'usuario' => $nombre_admin
					);
				} else {
					$respuesta = array(
					'respuesta' => 'error'
					);
				}
			} else {
				$respuesta = array(
					'respuesta' => 'error'
				);
			}
		$stmt->close();
		$dbc->close();	
		}
	} catch (Exception $e) {
		echo 'Error' . $e->getMessage();
	}

	die(json_encode($respuesta));
}


