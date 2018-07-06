<!--
	Módulo Principal
	Lunes, 3 de julio del 2018
	11:50 AM
	Gemis Daniel Guevara Villeda
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="imagenes/icono.ico">
        <title>Hojas de Responsabilidad</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
	<body>
		<!-- Contenedor del ícono del Usuario -->
		<div id="Contenedor">
			<div class="IconoInicio">
				<div class="row TextoInicioP">
					<div class="col-xs-7 TextoInicio">
					<h2 class="text-center">Inicie sesión</h2>
					</div>
					<!-- Contenedor del ícono del Usuario -->
					<div class="col-xs-4">
					<!-- Icono de usuario -->
					<span class="glyphicon glyphicon-user"></span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<form name="FormEntrar" action="login.php" method="post">
					<div class="input-group input-group-lg">
						<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="text" class="form-control" name="usuario" placeholder="Usuario" id="Usuario" aria-describedby="sizing-addon1" required>
					</div>
					<br>
					<div class="input-group input-group-lg">
						<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" name="password" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
					</div>
					<br>
					<button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" name="enviar" type="submit">Entrar</button>
				</form>
			</div>
		</div>
		<?php
			include_once "Seguridad/conexion.php";
			if (isset($_POST['enviar'])) {
				if ($_POST['usuario'] == '' or $_POST['password'] == '') {
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-warning">Los campos no pueden ir vacíos</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
					//echo "<script languaje='javascript'>
					//	alert('Los campos no pueden ir vacios');
					//	</script>";
				}
				else {
					// Guardamos el nombre del usuario un una variable
					$Usuario= $_POST["usuario"];
					// Encriptamos la contraseña a MD5 para seguridad y lo guardamos en una variable
					$password = md5($_POST['password']);

					// Consulta SQL, seleccionamos todos los datos de la tabla y obtenemos solo
					// la fila que tiene el usario especificado
					$query = "SELECT * FROM UsuarioApp WHERE UsuarioUsuarioApp='".$Usuario."'";
					if(!$resultado = $mysqli->query($query)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $query . "\n";
						echo "Errno: " . $mysqli->errno . "\n";
						echo "Error: " . $mysqli->error . "\n";
						exit;
					}
					else{
						if ($resultado->num_rows == 0) {
						?>
						<div class="form-group">
							<form name="Alerta">
								<div class="container">
									<div class="row text-center">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-10 col-xs-offset-1">
													<div class="alert alert-danger">Usuario no registrado</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
						//echo "Usuario no registrado";
						exit;
						}
						else{
							$ResultadoConsulta = $resultado->fetch_assoc();
							if($ResultadoConsulta['UsuarioUsuarioApp'] = $Usuario){
								if($ResultadoConsulta['ContraseniaUsuarioApp'] == $password){
									$idPersona = $ResultadoConsulta['idPersona'];
									$query2 = "SELECT * FROM persona WHERE idPersona='".$idPersona."'";
									if(!$resultado2 = $mysqli->query($query2)){
										echo "Error: La ejecución de la consulta falló debido a: \n";
										echo "Query: " . $query2 . "\n";
										echo "Errno: " . $mysqli->errno . "\n";
										echo "Error: " . $mysqli->error . "\n";
										exit;
									}
									else{
										$ResultadoConsultaPersona = $resultado2->fetch_assoc();
										session_start();
										$_SESSION['NombreUsuario'] = $ResultadoConsultaPersona['NombrePersona'] . " " . $ResultadoConsultaPersona['ApellidoPersona'];
										$_SESSION['Usuario'] = $ResultadoConsulta['Usuario'];
										$_SESSION['ContrasenaUsuario'] = $password;
										$_SESSION['idUsuario'] = $ResultadoConsulta['idUsuario'];
										$_SESSION['PrivilegioUsuario'] = 'Administrador';
										header("location:index.php");
									}
								}
								else{
									?>
									<div class="form-group">
										<form name="Alerta">
											<div class="container">
												<div class="row text-center">
													<div class="container-fluid">
														<div class="row">
															<div class="col-xs-10 col-xs-offset-1">
																<div class="alert alert-warning">Contraseña erronea</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
									<?php
									//echo "Contraseña Erronea";
								}
							}
							else{
								?>
								<div class="form-group">
										<form name="Alerta">
											<div class="container">
												<div class="row text-center">
													<div class="container-fluid">
														<div class="row">
															<div class="col-xs-10 col-xs-offset-1">
																<div class="alert alert-danger">Usuario erroneo</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								<?php
							}
						}
					}
				}
				mysqli_close($mysqli);
			}
		?>
	</body>
</html>
