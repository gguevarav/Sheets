<!--
	Módulo de Acerca de... de la aplicación
	Lunes, 4 de julio del 2018
	4:51 PM
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
										<li><a href="Administrador.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo administrador</a></li>
								<?php
									}
									?>
								<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Acerca de...</a></li>
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
		<!-- Contenedor del ícono del Usuario -->
		<div id="ContenedorAcerca">
			<div class="IconoInicio">
				<div class="row TextoInicioP">
					<div class="col-xs-7 TextoInicio">
					<h2 class="text-center">Acerca de...</h2>
					</div>
					<!-- Contenedor del ícono del Usuario -->
					<div class="col-md-2">
					<!-- Icono de usuario -->
					<img src="imagenes/LogoPrincipal.png" class="img-responsive center-block">
					</div>
				</div>
			</div>
			<div class="form-group">
				<form name="Acercade" action="acercade.php" method="post">
					<div class="input-group input-group-lg">
						<h2 class="text-center">Tecnologías de la Información y Comunicación - TIC</h2>
						<h3 class="text-center">Gestor de hojas de Respondabilidad</h3>
						<h4 class="text-center">Infraestructura</h4>
						<h4 class="text-center">Finca El Pataxte, El estor</h4>
						<h4 class="text-center">Copyright &copy; 2018 &middot; All Rights Reserved<h4>
						<h5 class="text-center"><a href="" >Gemis Daniel Guevara Villeda &middot; TIC -  Infraestructura</a><h5>
					</div>
				</form>
			</div>
		</div>
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
