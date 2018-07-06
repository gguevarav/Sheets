<!--
	Módulo de creación de usuarios
	Lunes, 3 de julio del 2018
	10:29 PM
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
									<li><a href="#">Crear usuario</li>
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
										<li><a href="Administrador.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo administrador</a></li>
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
			<form name="CrearUsuario" action="CrearUsuario.php" method="post">
				<div class="container">
					<div class="row text-center">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 ">
								<h1 class="text-center">Registro de usuario</h1>
								</div>
								<!-- Contenedor del ícono del Usuario -->
								<div class="col-xs-6 Icon">
									<!-- Icono de usuario -->
									<span class="glyphicon glyphicon-user"></span>
								</div>
							</div>
							<br>
							<!-- Nombre del usuario -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="NombreUsuario" placeholder="Nombre" id="NombreUsuario" aria-describedby="sizing-addon1" required>
									</div>
								</div>
							</div>
							<br>
							<!-- Apellido del usuario -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="ApellidoUsuario" placeholder="Apellido" id="ApellidoUsuario" aria-describedby="sizing-addon1" required>
									</div>
								</div>
							</div>
							<br>
							<!-- Dirección del usuario -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-home"></i></span>
										<input type="text" class="form-control" name="DireccionUsuario" placeholder="Dirección" id="DireccionUsuario" aria-describedby="sizing-addon1" required>
									</div>
								</div>
							</div>
							<br>
							<!-- Teléfono del usuario -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-earphone"></i></span>
										<input type="tel" class="form-control" name="TelefonoUsuario" placeholder="Teléfono" id="TelefonoUsuario" aria-describedby="sizing-addon1" required>
									</div>
								</div>
							</div>
							<br>
							<!-- Puesto del usuario -->
							<div class="row">
								<div class="col-xs-9 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tasks"></i></span>
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
								</div>
								<!-- Button trigger modal -->
								<div class="col-xs-1">
									<div class="input-group input-group-lg">
										<button type="button" class="btn btn-success btn-lg AgregarProducto" value="" data-toggle="modal" data-target="#ModalAgregarProducto">+</button>
									</div>
								</div>
							</div>
							<br>
							<!-- Correo del usuario -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
										<input type="email" class="form-control" name="CorreoUsuario" placeholder="Correo" id="CorreoUsuario" aria-describedby="sizing-addon1" required>
									</div>
								</div>
							</div>
							<br>
							<!-- Oficina usuario -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tasks"></i></span>
										<select class="form-control" name="OficinaUsuario" id="OficinaUsuario">
										<option value="" disabled selected>Oficina usuario</option>
												<option value="Pataxte">Pataxte</option>
												<option value="Panacte">Panacté</option>
												<option value="Zolic">Zolic</option>
										</select>
									</div>
								</div>
							</div>
							<br>
							<!-- Estado de usuario -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tasks"></i></span>
										<select class="form-control" name="EstadoUsuario" id="EstadoUsuario">
										<option value="" disabled selected>Estado usuario</option>
												<option value="Activo">Activo</option>
												<option value="Inactivo">Inactivo</option>
										</select>
									</div>
								</div>
							</div>
							<br>
							<!-- Resgistrar -->
							<div class="row">
								<div class="col-xs-12 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<div clss="btn-group">
											<button type="submit" class="btn btn-primary" id="IngresoLog" name="enviar">Registrar</button>
										</div>
									</div>
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>
			</form>
		</div>
		</div>
		<!-- Modal para crear productos -->
		<div class="modal fade slide left" id="ModalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

						</button>
						<h1 class="modal-title" id="myModalLabel">Registrar nuevo puesto</h1>
					</div>
					<div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<form method="post" id="myForm">
						<div class="form-group">
							<label for="Nombre">Nombre</label>
							<input type="text" name="NombrePuesto" id="NombrePuesto" class="form-control" placeholder="Nombre" value="" required/>
						</div>
						<div class="form-group">
							<label for="Marca">Departamento</label>
							<select class="form-control" name="Departamento" id="Departamento">
								<option value="" disabled selected>Departamento</option>
								<!-- Acá mostraremos los puestos que existen en la base de datos -->
								<?php							
									$VerMarcas = "SELECT * FROM Departamento;";
									// Hacemos la consulta
									$resultado = $mysqli->query($VerMarcas);			
									while ($row = mysqli_fetch_array($resultado)){
										?>
										<option value="<?php echo $row['idDepartamento'];?>"><?php echo $row['NombreDepartamento'] ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="RegistraPuesto" class="btn btn-success" value="Registrar puesto">
					</div>
				</form>
				</div>
			</div>
		</div>
		<!-- /Modal Agregar productos -->
		<?php
			if(isset($_POST['enviar'])){
				// Obtenemos los valores de todos los campos y los almacenamos en variables
				$NombreUsuario=$_POST['NombreUsuario'];
				$ApellidoUsuario=$_POST['ApellidoUsuario'];
				$DireccionUsuario=$_POST['DireccionUsuario'];
				$TelefonoUsuario=$_POST['TelefonoUsuario'];
				$PuestoUsuario=$_POST['PuestoUsuario'];
				$CorreoUsuario=$_POST['CorreoUsuario'];
				$OficinaUsuario=$_POST['OficinaUsuario'];
				$EstadoUsuario=$_POST['EstadoUsuario'];
				
				// Creamos la consulta para la insersión de los datos
				$VerificarSiExiste = "SELECT NombrePersona, ApellidoPersona FROM Persona WHERE NombrePersona='".$NombreUsuario."';";
				
				$ResultadoPersona = $mysqli->query($VerificarSiExiste);
				$FilaResultadoPersona = $ResultadoPersona->fetch_assoc();
				if(($NombreUsuario . " " . $ApellidoUsuario) !=
				   ($FilaResultadoPersona['NombrePersona'] . " " . $FilaResultadoPersona['ApellidoPersona'])){
					// Creamos la consulta para la insersión de los datos
					$InsertarPersona = "INSERT INTO Persona(NombrePersona, ApellidoPersona, DireccionPersona,
															TelefonoPersona)
											  Values('".$NombreUsuario."', '".$ApellidoUsuario."', '".$DireccionUsuario."',
													 '".$TelefonoUsuario."');";
					
					if(!$resultado = $mysqli->query($InsertarPersona)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $InsertarPersona . "\n";
						echo "Error: " . $mysqli->errno . "\n";
						exit;
					}
					//$id = mysqli_insert_id($mysqli);
					//printf("El último registro insertado tiene el id %d\n", $id);
					$InsertarUsuario = "INSERT INTO Usuario (idPersona, idPuesto, CorreoUsuario, OficinaUsuario, EstadoUsuario)
													VALUES(".mysqli_insert_id($mysqli).", ".$PuestoUsuario.", '".$CorreoUsuario."', '".
															$OficinaUsuario."', '".$EstadoUsuario."');";
															
					if(!$resultado2 = $mysqli->query($InsertarUsuario)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $InsertarUsuario . "\n";
						echo "Error: " . $mysqli->errno . "\n";
						exit;
					}
				}else{
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-warning">Este usuario ya existe</div>
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
			if(isset($_POST['RegistraPuesto'])){
				$NombrePuesto=$_POST['NombrePuesto'];
				$Departamento=$_POST['Departamento'];
				
				// Creamos la consulta para la consulta de los datos, si encuentra significa que ya existe el puesto
				// por lo tanto no dejará registrar
				$VerificarSiExiste = "SELECT NombrePuesto FROM Puesto WHERE NombrePuesto='".$NombrePuesto."';";
				// Ejecutamos la consulta
				$ResultadoPuesto = $mysqli->query($VerificarSiExiste);
				// Si no es nulo significa que ya existe por lo tanto no debde dejar resgistrar
				if(($FilaResultadoPuesto = $ResultadoPuesto->fetch_assoc()) == NULL){
					// Si no existe en la base de datos  debe dejar registrar
					$InsertarPuesto = "INSERT INTO Puesto(NombrePuesto, idDepartamento)
											  Values('".$NombrePuesto."', ".$Departamento.");";
					
					if(!$resultado = $mysqli->query($InsertarPuesto)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $InsertarPuesto . "\n";
						echo "Error: " . $mysqli->errno . "\n";
						exit;
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
												<div class="alert alert-warning">Este puesto ya existe</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}
				mysqli_close($mysqli);
			}
		?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
		<script src="js/jquery-1.11.3.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="js/bootstrap.js"></script>
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
