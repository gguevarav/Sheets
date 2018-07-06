<!--
	Módulo para visualizar todos los usuarios registrados
	Lunes, 5 de julio del 2018
	9:24 PM
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
		<?php
			// Incluimos el archivo que valida si hay una sesión activa
			include_once "Seguridad/seguro.php";
			// Primero hacemos la consulta en la tabla de persona
			include_once "Seguridad/conexion.php";
			// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
			if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
			   $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
				// Guardamos el nombre del usuario en una variable
				$NombreUsuario =$_SESSION["NombreUsuario"];
				$idUsuario2 =$_SESSION["idUsuario"];
		?>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid"> 
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					<a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="defaultNavbar1">
					<ul class="nav navbar-nav">
						<?php
						if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
						   $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
							?>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de usuarios<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="CrearUsuario.php">Crear usuario</li>
									<li><a href="Usuario.php">Ver usuarios</a></li>
								</ul>
							</li>
							<?php
						}
						?>
						<?php
						if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
						   $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
							?>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de equipos<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="RegistroEquipo.php">Registro equipo</li>
									<li><a href="Equipo.php">Ver equipos</a></li>
								</ul>
							</li>
							<?php
						}
						?>
						<?php
						if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
						   $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
							?>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hojas de Reponsabilidad<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="CrearHojaResponsabilidad.php">Crear hoja de responsabilidad</a></li>
									<li><a href="HojaResponsabilidad.php">Lista hojas de responsabilidad</a></li>
								</ul>
							</li>
							<?php
						}
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<!-- Acá mostramos el nombre del usuario -->
							<a href="#" class="dropdown-toggle negrita" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><?php echo $NombreUsuario; ?></a></li>
								<?php
									if($_SESSION["PrivilegioUsuario"] == 'Administrador' || $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
									?>
										<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo administrador</a></li>
								<?php
									}
									?>
								<li><a href="AcercaDe.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Acerca de...</a></li>
								<li><a href="Seguridad/logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Cerrar Sesión</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse --> 
			</div>
			<!-- /.container-fluid --> 
		</nav>
		<br>
		<br>
		<br>
		<div class="form-group">
			<div class="container">
				<div class="row text-center">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6 ">
							<h1 class="text-center">Equipos registrados</h1>
							</div>
							<!-- Contenedor del ícono del Usuario -->
							<div class="col-xs-6 Icon">
								<!-- Icono de usuario -->
								<span class="glyphicon glyphicon-saved"></span>
							</div>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon">Buscar</span>
							<input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
						</div>									
						<br>
						<div class="panel panel-primary">
							<div class="table-responsive">          
								<table class="table table-hover table-striped">
									<!-- Título -->
									<thead>
										<!-- Contenido -->
										<tr>
											<th>#</th>
											<th>Service TAG</th>
											<th>Sede</th>
											<th>Marca</th>
											<th>Modelo</th>
											<th>Nombre de equipo</th>
											<th>Color</th>
											<th>Procesador</th>
											<th>RAM</th>
											<th>Disco Duro</th>
											<th>Cargador</th>
											<th>Sistema Operativo</th>
											<th>Office</th>
											<th>Numero activo Fijo</th>
											<th>Departamento</th>
											<th>EstadoEquipo</th>
										</tr>
									</thead>
									<!-- Cuerpo de la tabla -->
									<tbody class="buscar">
										<!-- Contenido de la tabla -->
										<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
										<?php
											// Primero hacemos la consulta en la tabla de persona
											// Si somos el superadministrador podremos editar nuestro usuario mientras no
											$VerEquipos = "SELECT * FROM Equipo";
											// Hacemos la consulta
											$resultado = $mysqli->query(VerEquipos);
											$Numero = 1;
											while ($row = mysqli_fetch_array($resulstado)){
												// Obtenemos el nombre de usuario y privilegio de cada persona
												// Primero haremos la consulta
												$VerUsuario = "SELECT * FROM Persona WHERE idPersona='".$row['idPersona']."'";
												$VerPuesto = "SELECT NombrePuesto FROM Puesto WHERE idPuesto='".$row['idPuesto']."'";
												$VerSede = "SELECT NombreSede FROM Sede WHERE idSede='".$row['idSede']."'";
												// Ejecutamos la consulta para ver info usuario
												$ResultadoConsultaUsuario = $mysqli->query($VerUsuario);
												// Guardamos la consulta de la info de la persona en un array
												$ResultadoConsultaUsr = $ResultadoConsultaUsuario->fetch_assoc();
												// Ejecutamos la consulta para ver info puesto
												$ResultadoConsultaPuesto = $mysqli->query($VerPuesto);
												// Guardamos la consulta de la info del puesto en un array
												$ResultadoConsultaP = $ResultadoConsultaPuesto->fetch_assoc();
												// Ejecutamos la consulta para ver info puesto
												$ResultadoConsultaSede = $mysqli->query($VerSede);
												// Guardamos la consulta de la info del puesto en un array
												$ResultadoConsultaS = $ResultadoConsultaSede->fetch_assoc();
												?>
												<tr>
													<td><span id="idUsuario<?php echo $row['idUsuario'];?>"><?php echo $$Numero ?></span></td>
													<td><span id="NombreUsuario<?php echo $row['idUsuario'];?>"><?php echo $ResultadoConsultaUsr['NombrePersona'] ?></span></td>
													<td><span id="ApellidoUsuario<?php echo $row['idUsuario'];?>"><?php echo $ResultadoConsultaUsr['ApellidoPersona'] ?></span></td>
													<td><span id="DireccionUsuario<?php echo $row['idUsuario'];?>"><?php echo $ResultadoConsultaUsr['DireccionPersona'] ?></span></td>
													<td><span id="TelefonoUsuario<?php echo $row['idUsuario'];?>"><?php echo $ResultadoConsultaUsr['TelefonoPersona'] ?></span></td>
													<td><span id="PuestoUsuario<?php echo $row['idUsuario'];?>"><?php echo $ResultadoConsultaP['NombrePuesto'] ?></span></td>
													<td><span id="CorreoUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['CorreoUsuario'] ?></span></td>
													<td><span id="OficinaUsuario<?php echo $row['idUsuario'];?>"><?php echo $ResultadoConsultaS['NombreSede'] ?></span></td>
													<td><span id="EstadoUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['EstadoUsuario'] ?></span></td>
													<td>
														<?php
														if($row['EstadoUsuario'] == 'Activo'){
														?>
															<!-- Edición activada-->
															<div>
																<div class="input-group input-group-lg">
																	<button type="button" class="btn btn-success EditarUsuario" value="<?php echo $row['idUsuario']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
																</div>
															</div>
														<?php
														}
														else if($row['EstadoUsuario'] == 'Inactivo'){
														?>
															<!-- Edición desactivada-->
															<div>
																<div class="input-group input-group-lg">
																	<button type="button" class="btn btn-success EditarUsuarioDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
																</div>
															</div>
														<?php
														}
														?>
													</td>
													<td>
														<?php
														if($row['EstadoUsuario'] == 'Activo'){
														?>
															<!-- Deshabilitación -->
															<div>
																<div class="input-group input-group-lg">
																	<button type="button" class="btn btn-warning DeshabilitarUsuario"  value="<?php echo $row['idUsuario']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
																</div>
															</div>
														<?php
														}
														else if($row['EstadoUsuario'] == 'Inactivo'){
														?>
															<!-- Habilitación -->
															<div>
																<div class="input-group input-group-lg">
																	<button type="button" class="btn btn-success HabilitarUsuario"  value="<?php echo $row['idUsuario']; ?>"><span class="glyphicon glyphicon-check"></span></button>
																</div>
															</div>
														<?php
														}
														?>
													</td>
												</tr>
												<?php
												$Numero++;
											}
										?>
									</tbody>
								</table>
							</div>
						</div>								
					</div>
				</div>
			</div>
		</div>
		<!-- Edit Modal-->
		<div class="modal fade" id="ModalDeshabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center><h1 class="modal-title" id="myModalLabel">Deshabilitar Usuario</h1></center>
					</div>
					<form method="post" action="Usuario.php" id="myForm">
					<div class="modal-body text-center">
						<p class="lead">¿Está seguro que desea deshabilitar al siguiente Usuario?</p>
						<div class="form-group input-group">
							<input type="text" name="idUsuarioDeshabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idUsuarioDeshabilitar">
							<br>
							<label id="NombreUsuarioDeshabilitar"></label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="DeshabilitarUsuario" class="btn btn-warning" value="Deshabilitar Usuario">
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.modal -->
		<!-- Edit Modal-->
		<div class="modal fade" id="ModalHabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center><h1 class="modal-title" id="myModalLabel">Habilitar Usuario</h1></center>
					</div>
					<form method="post" action="Usuario.php" id="myForm">
					<div class="modal-body text-center">
						<p class="lead">¿Está seguro que desea habilitar al siguiente Usuario?</p>
						<div class="form-group input-group">
							<input type="text" name="idUsuarioHabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idUsuarioHabilitar">
							<br>
							<label id="NombreUsuarioHabilitar"></label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="HabilitarUsuario" class="btn btn-success" value="Habilitar Usuario">
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.modal -->
		<!-- Edit Modal-->
		<div class="modal fade" id="frmEditar" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center><h4 class="modal-title" id="myModalLabel">Editar usuario</h4></center>
					</div>
					<form method="post" action="Usuario.php" id="frmEdit">
						<div class="modal-body">
						<div class="container-fluid">
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">ID</span>
									<input type="text" style="width:350px;" class="form-control" name="idEditar" id="idEditar">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">Nombre</span>
									<input type="text" style="width:350px;" class="form-control" name="NombreEditar" id="NombreEditar">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">Apellido</span>
									<input type="text" style="width:350px;" class="form-control" name="ApellidoEditar" id="ApellidoEditar">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">Dirección</span>
									<input type="text" style="width:350px;" class="form-control" name="DireccionEditar" id="DireccionEditar">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">No. de telefono</span>
									<input type="tel" style="width:350px;" class="form-control" name="TelefonoEditar" id="TelefonoEditar">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">Puesto</span>
										<select class="form-control" name="PuestoUsuario" id="PuestoUsuario">
										<option value="" disabled selected>Nombre del puesto</option>
											<!-- Acá mostraremos los puestos que existen en la base de datos -->
											<?php							
												$VerPuestos = "SELECT * FROM puesto;";
												// Hacemos la consulta
												$resultado = $mysqli->query($VerPuestos);			
												while ($row = mysqli_fetch_array($resultado)){
													?>
													<option value="<?php echo $row['idPuesto'];?>"><?php echo $row['NombrePuesto'] ?></option>
											<?php
												}
											?>
										</select>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">Correo</span>
									<input type="email" style="width:350px;" class="form-control" name="CorreoEditar" id="CorreoEditar">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">Oficina</span>
									<select class="form-control" name="OficinaUsuario" id="OficinaUsuario">
											<option value="" disabled selected>Oficina</option>
											<!-- Acá mostraremos los puestos que existen en la base de datos -->
											<?php							
												$VerPuestos = "SELECT * FROM Sede;";
												// Hacemos la consulta
												$resultado = $mysqli->query($VerPuestos);			
												while ($row = mysqli_fetch_array($resultado)){
													?>
													<option value="<?php echo $row['idSede'];?>"><?php echo $row['NombreSede'] ?></option>
											<?php
												}
											?>
										</select>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
							<input type="submit" name="EditarUsuario" class="btn btn-warning" value="Editar Usuario">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.modal -->
		<?php
			// Código que recibe la información para deshabilitar un usuario
			if (isset($_POST['DeshabilitarUsuario'])) {
				// Guardamos el id en una variable
				$idUsuario = $_POST['idUsuarioDeshabilitar'];
				// Preparamos la consulta
				$query = "UPDATE Usuario
							  SET EstadoUsuario = 'Inactivo'
							  WHERE idUsuario=".$idUsuario.";";
				// Ejecutamos la consulta
				if(!$resultado = $mysqli->query($query)){
				echo "Error: La ejecución de la consulta falló debido a: \n";
				echo "Query: " . $query . "\n";
				echo "Errno: " . $mysqli->errno . "\n";
				echo "Error: " . $mysqli->error . "\n";
				exit;
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
												<div class="alert alert-warning">Usuario desactivado</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
					// Recargamos la página
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=Usuario.php\">"; 
				}
			}
			// Termina código para deshabilitar un usuario
			// Código que recibe la información para habilitar un usuario
			if (isset($_POST['HabilitarUsuario'])) {
				// Guardamos el id en una variable
				$idUsuario = $_POST['idUsuarioHabilitar'];
				// Preparamos la consulta
				$query2 = "UPDATE Usuario
							  SET EstadoUsuario = 'Activo'
							  WHERE idUsuario=".$idUsuario.";";
				// Ejecutamos la consulta
				if(!$resultado = $mysqli->query($query2)){
				echo "Error: La ejecución de la consulta falló debido a: \n";
				echo "Query: " . $query2 . "\n";
				echo "Errno: " . $mysqli->errno . "\n";
				echo "Error: " . $mysqli->error . "\n";
				exit;
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
												<div class="alert alert-warning">Usuario activado</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
					// Recargamos la página
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=Usuario.php\">"; 
				}
			}
			// Termina código para deshabilitar un usuario
			// Código para editar un usuario
			if (isset($_POST['EditarUsuario'])) {
				// Guardamos La información proveniente del formulario
				$idUsuario = $_POST['idEditar'];
				$NombreEditar = $_POST['NombreEditar'];
				$ApellidoEditar = $_POST['ApellidoEditar'];
				$DireccionEditar = $_POST['DireccionEditar'];
				$TelefonoEditar = $_POST['TelefonoEditar'];
				$PuestoUsuario = $_POST['PuestoUsuario'];
				$CorreoEditar = $_POST['CorreoEditar'];
				$idSede = $_POST['OficinaUsuario'];
				
				// Consultar persona
				$VerPersona = "SELECT idPersona FROM Usuario WHERE idUsuario=".$idUsuario.";";
				// Ejecutamos la consulta para ver el id del usuario que se encuentra en la tabla persona
				$ResultadoPersona = $mysqli->query($VerPersona);
				// Guardamos la consulta de la info del puesto en un array
				$ResultadoConsultaPersona = $ResultadoPersona->fetch_assoc();
				
				// Preparamos las consultas
				$EditarTablaPersona = "UPDATE persona
						  SET NombrePersona = '" .$NombreEditar."',
							  ApellidoPersona = '" .$ApellidoEditar."',
							  DireccionPersona = '".$DireccionEditar."',
							  TelefonoPersona = '".$TelefonoEditar."'
						  WHERE idPersona=".$ResultadoConsultaPersona['idPersona'].";";
				
				$EditarTablaUsuario = "UPDATE Usuario
						  SET idPuesto = ".$PuestoUsuario.",
							  CorreoUsuario = '".$CorreoEditar."',
							  OficinaUsuario = '".$idSede."'
						  WHERE idUsuario=".$idUsuario.";";
				
				// Ejecutamos la consulta para la tabla de persona
				if(!$resultado = $mysqli->query($EditarTablaPersona)){
					echo "Error: La ejecución de la consulta falló debido a: \n";
					echo "Query: " . $EditarTablaPersona . "\n";
					echo "Errno: " . $mysqli->errno . "\n";
					echo "Error: " . $mysqli->error . "\n";
					exit;
				}
				
					// Ejecutamos la consulta para la tabla de usuario
					if(!$resultado2 = $mysqli->query($EditarTablaUsuario)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $EditarTablaUsuario . "\n";
						echo "Errno: " . $mysqli->errno . "\n";
						echo "Error: " . $mysqli->error . "\n";
						exit;
					}
					else{
						// Recargamos la página
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Usuario.php\">"; 
						?>
						<div class="form-group">
							<form name="Alerta">
								<div class="container">
									<div class="row text-center">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-10 col-xs-offset-1">
													<div class="alert alert-success">Usuario actualizado</div>
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
		?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
		<script src="js/jquery-1.11.3.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="js/bootstrap.js"></script>
		<!-- Incluimos el script que nos dará el nombre de la persona para mostrarlo en el modal -->
		<script src="js/Modal.js"></script>
		<!-- Pie de página, se utilizará el mismo para todos. -->
		<footer>
			<hr>
			<div class="row">
				<div class="text-center col-md-6 col-md-offset-3">
					<h4>Gestor de hojas de responsabilidad</h4>
					<p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="" >TIC -  Infraestructura</a></p>
				</div>
			</div>
			<hr>
		</footer> 
	</body>
	<?php
	// De lo contrario lo redirigimos al inicio de sesión
		} 
		else{
			echo "usuario no valido";
			header("location:login.php");
		}
	?>
</html>
