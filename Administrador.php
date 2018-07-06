<!--
	Módulo de administración de la aplicación
	Lunes, 4 de julio del 2018
	12:54 PM
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
		<div class="container">
			<div class="row text-center">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-6 ">
						<h1 class="text-center">Módulo Administrador</h1>
						</div>
						<!-- Contenedor del ícono del Usuario -->
						<div class="col-xs-6 Icon">
							<!-- Icono de usuario -->
							<span class="glyphicon glyphicon-dashboard"></span>
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="panel panel-primary">
							<form name="RegistroArea" action="Administrador.php" method="post">
								<div class="row">
									<div class="col-xs-12 ">
									<h1 class="text-center">Registro de area</h1>
									</div>
								</div>
								<br>
								<!-- Nombre del area -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="text" class="form-control" name="NombreArea" placeholder="Nombre" id="NombreArea" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Resgistrar -->
								<div class="row">
									<div class="col-xs-12 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<div clss="btn-group">
												<button type="submit" class="btn btn-primary" id="RegistrarArea" name="RegistrarArea">Registrar</button>
											</div>
										</div>
									</div>
								</div>
								<br>
							</form>
						</div>
					</div>
					<div class="form-group">
						<div class="panel panel-primary">
							<<form name="RegistroDepartamento" action="Administrador.php" method="post">
								<div class="row">
									<div class="col-xs-12 ">
									<h1 class="text-center">Registro de Departamento</h1>
									</div>
								</div>
								<br>
								<!-- Nombre del departamento -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="text" class="form-control" name="NombreDepartamento" placeholder="Nombre" id="NombreDepartamento" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Nombre de area -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
											<select class="form-control" name="Area" id="Area" required>
											<option value="" disabled selected>Area</option>
												<!-- Acá mostraremos los puestos que existen en la base de datos -->
												<?php							
													$VerUsuarios = "SELECT * FROM area;";
													// Hacemos la consulta
													$resultado = $mysqli->query($VerUsuarios);			
													while ($row = mysqli_fetch_array($resultado)){
														?>
														<option value="<?php echo $row['idArea'];?>"><?php echo $row['NombreArea'] ?></option>
												<?php
													}
												?>
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
												<button type="submit" class="btn btn-primary" id="RegistrarDepartamento" name="RegistrarDepartamento">Registrar</button>
											</div>
										</div>
									</div>
								</div>
								<br>
							</form>
						</div>
					</div>
					<div class="form-group">
						<div class="panel panel-primary">
							<<form name="RegistroRol" action="Administrador.php" method="post">
								<div class="row">
									<div class="col-xs-12 ">
									<h1 class="text-center">Registro de rol</h1>
									</div>
								</div>
								<br>
								<!-- Nombre del Rol -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="text" class="form-control" name="NombreRol" placeholder="Nombre" id="NombreRol" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Resgistrar -->
								<div class="row">
									<div class="col-xs-12 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<div clss="btn-group">
												<button type="submit" class="btn btn-primary" id="RegistrarRol" name="RegistrarRol">Registrar</button>
											</div>
										</div>
									</div>
								</div>
								<br>
							</form>
						</div>
					</div>
					<div class="form-group">
						<div class="panel panel-primary">
							<<form name="RegistroSede" action="Administrador.php" method="post">
								<div class="row">
									<div class="col-xs-12 ">
									<h1 class="text-center">Registro de sede</h1>
									</div>
								</div>
								<br>
								<!-- Nombre del Rol -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="text" class="form-control" name="NombreSede" placeholder="Nombre" id="NombreSede" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Resgistrar -->
								<div class="row">
									<div class="col-xs-12 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<div clss="btn-group">
												<button type="submit" class="btn btn-primary" id="RegistrarSede" name="RegistrarSede">Registrar</button>
											</div>
										</div>
									</div>
								</div>
								<br>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			if(isset($_POST['RegistrarArea'])) {
				$NombreArea = $_POST['NombreArea'];
				// Consulta para insertar una nueva área
				$InsertarArea = "INSERT INTO Area(NombreArea)
												 VALUES('".$NombreArea."');";
				// Creamos la consulta para la consulta de los datos, si encuentra significa que ya existe el Area
				// por lo tanto no dejará registrar
				$VerificarSiExiste = "SELECT NombreArea FROM Area WHERE NombreArea='".$NombreArea."';";
				// Ejecutamos la consulta
				$ResultadoArea = $mysqli->query($VerificarSiExiste);
				// Si no es nulo significa que ya existe por lo tanto no debde dejar resgistrar
				if(($FilaResultadoArea = $ResultadoArea->fetch_assoc()) == NULL){
					// Si no existe en la base de datos debe dejar registrar  
					if(!$ResultadoInsersionArea = $mysqli->query($InsertarArea)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $InsertarArea . "\n";
						echo "Error: " . $mysqli->errno . "\n";
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
													<div class="alert alert-success">Nueva area registrada</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
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
												<div class="alert alert-success">Esta área ya existe</div>
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
			if(isset($_POST['RegistrarDepartamento'])) {
				$NombreDepartamento = $_POST['NombreDepartamento'];
				$idArea =  $_POST['Area'];
				// Consulta para insertar un nuveo departamento
				$InsertarDepartamento = "INSERT INTO Departamento(NombreDepartamento, idArea)
														   VALUES('".$NombreDepartamento."', ".$idArea.");";
				// Creamos la consulta para la consulta de los datos, si encuentra significa que ya existe el Area
				// por lo tanto no dejará registrar
				$VerificarSiExiste = "SELECT NombreDepartamento FROM Departamento WHERE NombreDepartamento='".$NombreDepartamento."';";
				// Ejecutamos la consulta
				$ResultadoDepartamento = $mysqli->query($VerificarSiExiste);
				// Si no es nulo significa que ya existe por lo tanto no debde dejar resgistrar
				if(($FilaResultadoDepartamento = $ResultadoDepartamento->fetch_assoc()) == NULL){
					// Si no existe en la base de datos debe dejar registrar  
					if(!$ResultadoInsersionDepartamento = $mysqli->query($InsertarDepartamento)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $InsertarDepartamento . "\n";
						echo "Error: " . $mysqli->errno . "\n";
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
													<div class="alert alert-success">Nuevo departamento registrado</div>
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
				else{
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-warning">Este departamento ya existe</div>
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
			if(isset($_POST['RegistrarRol'])) {
				$NombreRol = $_POST['NombreRol'];
				// Consulta para insertar un nuveo rol
				$InsertarRol = "INSERT INTO Rol(NombreRol)
												  VALUES('".$NombreRol."');";
				// Creamos la consulta para la consulta de los datos, si encuentra significa que ya existe el rol
				// por lo tanto no dejará registrar
				$VerificarSiExiste = "SELECT NombreRol FROM Rol WHERE NombreRol='".$NombreRol."';";
				// Ejecutamos la consulta
				$ResultadoRol = $mysqli->query($VerificarSiExiste);
				// Si no es nulo significa que ya existe por lo tanto no debe dejar resgistrar
				if(($FilaResultadoRol = $ResultadoRol->fetch_assoc()) == NULL){
					// Si no existe en la base de datos debe dejar registrar  
					if(!$ResultadoInsersionRol = $mysqli->query($InsertarRol)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $InsertarRol . "\n";
						echo "Error: " . $mysqli->errno . "\n";
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
													<div class="alert alert-success">Nuevo rol registrado</div>
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
				else{
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-warning">Este rol ya existe</div>
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
			if(isset($_POST['RegistrarSede'])) {
				$NombreSede = $_POST['NombreSede'];
				// Consulta para insertar un nuveo rol
				$InsertarSede = "INSERT INTO Sede(NombreSede)
										   VALUES('".$NombreSede."');";
				// Creamos la consulta para la consulta de los datos, si encuentra significa que ya existe el rol
				// por lo tanto no dejará registrar
				$VerificarSiExiste = "SELECT NombreSede FROM Sede WHERE NombreSede='".$NombreSede."';";
				// Ejecutamos la consulta
				$ResultadoSede = $mysqli->query($VerificarSiExiste);
				// Si no es nulo significa que ya existe por lo tanto no debe dejar resgistrar
				if(($FilaResultadoSede = $ResultadoSede->fetch_assoc()) == NULL){
					// Si no existe en la base de datos debe dejar registrar  
					if(!$ResultadoInsersionSede = $mysqli->query($InsertarSede)){
						echo "Error: La ejecución de la consulta falló debido a: \n";
						echo "Query: " . $InsertarSede . "\n";
						echo "Error: " . $mysqli->errno . "\n";
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
													<div class="alert alert-success">Nueva sede registrada</div>
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
				else{
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-warning">Esta sede ya existe</div>
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
			
			mysqli_close($mysqli);
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
