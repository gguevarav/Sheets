<!--
	Módulo de registro de equipos
	Lunes, 4 de julio del 2018
	5:38 PM
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
									<li><a href="#">Registro equipo</li>
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
		<div class="container">
			<div class="row text-center">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-6">
							<h1 class="text-center">Registro de equipos</h1>
						</div>
						<!-- Contenedor del ícono del Usuario -->
						<div class="col-xs-6 Icon">
							<!-- Icono de usuario -->
							<span class="glyphicon glyphicon-edit"></span>
						</div>
					</div>
					<br>
					<div class="form-group">
						<form name="RegistrarEquipo" action="RegistrarEquipo.php" method="post">
							<!-- Service TAG -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-qrcode"></i></span>
										<input type="text" class="form-control" name="ServiceTag" placeholder="Service Tag" id="ServiceTag" aria-describedby="sizing-addon1" required>
									</div>
								</div>
							</div>
							<br>
							<!-- Sede -->
							<div class="row">
								<div class="col-xs-9 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
										<select class="form-control" name="Sede" id="Sede">
										<option value="" disabled selected>Sede</option>
											<!-- Acá mostraremos los puestos que existen en la base de datos -->
											<?php							
												$VerSede = "SELECT * FROM Sede;";
												// Hacemos la consulta
												$resultado = $mysqli->query($VerSede);			
													while ($row = mysqli_fetch_array($resultado)){
														?>
														<option value="<?php echo $row['idSede'];?>"><?php echo $row['NombreSede'] ?></option>
											<?php
													}
											?>
										</select>
									</div>
								</div>
								<!-- Button trigger modal -->
								<div class="col-xs-1">
									<div class="input-group input-group-lg">
										<button type="button" class="btn btn-success btn-lg AgregarSede" value="" data-toggle="modal" data-target="#ModalAgregarSede">+</button>
									</div>
								</div>
							</div>
							<br>
							<!-- Marca -->
							<div class="row">
								<div class="col-xs-9 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
										<select class="form-control" name="Marca" id="Marca">
										<option value="" disabled selected>Marca</option>
											<!-- Acá mostraremos los puestos que existen en la base de datos -->
											<?php							
												$VerMarcas = "SELECT * FROM Marca;";
												// Hacemos la consulta
												$resultado = $mysqli->query($VerMarcas);			
													while ($row = mysqli_fetch_array($resultado)){
														?>
														<option value="<?php echo $row['idMarca'];?>"><?php echo $row['NombreMarca'] ?></option>
											<?php
													}
											?>
										</select>
									</div>
								</div>
								<!-- Button trigger modal -->
								<div class="col-xs-1">
									<div class="input-group input-group-lg">
										<button type="button" class="btn btn-success btn-lg AgregarMarca" value="" data-toggle="modal" data-target="#ModalAgregarMarca">+</button>
									</div>
								</div>
							</div>
							<br>
							<!-- Modelo -->
							<div class="row">
								<div class="col-xs-9 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
										<select class="form-control" name="Modelo" id="Modelo">
										<option value="" disabled selected>Modelo</option>
											<!-- Acá mostraremos los puestos que existen en la base de datos -->
											<?php							
												$VerModelo = "SELECT * FROM Modelo;";
												// Hacemos la consulta
												$resultado = $mysqli->query($VerModelo);			
													while ($row = mysqli_fetch_array($resultado)){
														?>
														<option value="<?php echo $row['idModelo'];?>"><?php echo $row['NombreModelo'] ?></option>
											<?php
													}
											?>
										</select>
									</div>
								</div>
								<!-- Button trigger modal -->
								<div class="col-xs-1">
									<div class="input-group input-group-lg">
										<button type="button" class="btn btn-success btn-lg AgregarModelo" value="" data-toggle="modal" data-target="#ModalAgregarModelo">+</button>
									</div>
								</div>
							</div>
							<br>
							<!-- Nombre en dominio de equipo -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-ok"></i></span>
										<input type="text" class="form-control" name="NombreEnDominio" placeholder="Nombre de equipo en dominio" id="NombreEnDominio" aria-describedby="sizing-addon1">
									</div>
								</div>
							</div>
							<br>
							<!-- Color de equipo -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-ok"></i></span>
										<input type="text" class="form-control" name="ColorEquipo" placeholder="Color de equipo" id="ColorEquipo" aria-describedby="sizing-addon1">
									</div>
								</div>
							</div>
							<br>
							<!-- Procesador equipo -->
							<div class="row">
								<div class="col-xs-9 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
										<select class="form-control" name="Procesador" id="Procesador">
										<option value="" disabled selected>Procesador</option>
											<!-- Acá mostraremos los procesadores que existen en la base de datos -->
											<?php							
												$VerProcesador = "SELECT * FROM Procesador;";
												
												// Hacemos la consulta
												$resultado = $mysqli->query($VerProcesador);			
												while ($row = mysqli_fetch_array($resultado)){
													//Primero revisamos que no exista la marca ya en la base de datos
													$NombreMarca = "SELECT NombreMarca FROM Marca WHERE idMarca='".$row['idMarca']."';";
													$NombreModelo = "SELECT NombreModelo FROM Modelo WHERE idModelo='".$row['idModelo']."';";
													$ResultadoVerMarca = $mysqli->query($NombreMarca);			
													$ResultadoVerModelo = $mysqli->query($NombreModelo);			
													$row1 = mysqli_fetch_array($ResultadoVerMarca);
													$NombreResultadoMarca = $row1['NombreMarca'];
													$row2 = mysqli_fetch_array($ResultadoVerModelo);
													$NombreResultadoModelo = $row2['NombreModelo'];
													?>
													<option value="<?php echo $row['idProcesador'];?>"><?php echo  $NombreResultadoMarca . " " . $NombreResultadoModelo . " " . $row['GeneracionProcesador'] . " " . $row['VelocidadRelojProcesador']?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
								<!-- Button trigger modal -->
								<div class="col-xs-1">
									<div class="input-group input-group-lg">
										<button type="button" class="btn btn-success btn-lg AgregarProcesador" value="" data-toggle="modal" data-target="#ModalAgregarProcesador">+</button>
									</div>
								</div>
							</div>
							<br>
							<!-- RAM Equipo -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tint"></i></span>
										<input type="text" class="form-control" name="RAMEquipo" placeholder="RAM" id="RAMEquipo" aria-describedby="sizing-addon1">
									</div>
								</div>
							</div>
							<br>
							<!-- Disco Duro equipo -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tint"></i></span>
										<input type="text" class="form-control" name="DiscoDuro" placeholder="Disco duro" id="DiscoDuro" aria-describedby="sizing-addon1">
									</div>
								</div>
							</div>
							<br>
							<!-- Cargador equipo -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tint"></i></span>
										<input type="text" class="form-control" name="CargadorEquipo" placeholder="Cargador equipo" id="CargadorEquipo" aria-describedby="sizing-addon1">
									</div>
								</div>
							</div>
							<br>
							<!-- Sistema Operativo -->
							<div class="row">
								<div class="col-xs-9 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-check"></i></span>
										<select class="form-control" name="SistemaOperativo" id="SistemaOperativo">
										<option value="" disabled selected>Sistema operativo</option>
											<!-- Acá mostraremos los puestos que existen en la base de datos -->
											<?php							
												$VerSO = "SELECT * FROM SistemaOperativo;";
												
												// Hacemos la consulta
												$resultado = $mysqli->query($VerSO);			
												while ($row = mysqli_fetch_array($resultado)){
													//Primero revisamos que no exista la marca ya en la base de datos
													$NombreVersionSO = "SELECT NombreVersionSO FROM VersionSO WHERE idVersionSO='".$row['idVersionSO']."';";
													$NombreEdicionSO = "SELECT NombreEdicionSO FROM EdicionSO WHERE idEdicionSO='".$row['idEdicionSO']."';";
													$NombreArquitectura = "SELECT NombreArquitectura FROM Arquitectura WHERE idModelo='".$row['Arquitectura']."';";
													$ResultadoVerVersionSO = $mysqli->query($NombreVersionSO);			
													$ResultadoVerEdicionSO = $mysqli->query($NombreEdicionSO);			
													$ResultadoVerArquitectura = $mysqli->query($NombreArquitectura);			
													$row1 = mysqli_fetch_array($ResultadoVerVersionSO);
													$NombreResultadoVersionSO = $row1['NombreVersionSO'];
													$row2 = mysqli_fetch_array($ResultadoVerEdicionSO);
													$NombreResultadoEdicionSO = $row2['NombreEdicionSO'];
													$row3 = mysqli_fetch_array($ResultadoVerArquitectura);
													$NombreResultadoArquitectura = $row2['NombreArquitectura'];
													?>
													<option value="<?php echo $row['idSistemaOperativo'];?>"><?php echo $NombreResultadoVersionSO . " " . $NombreResultadoEdicionSO . " " . $NombreResultadoArquitectura ?></option>
											<?php
													}
											?>
										</select>
									</div>
								</div>
								<!-- Button trigger modal -->
								<div class="col-xs-1">
									<div class="input-group input-group-lg">
										<button type="button" class="btn btn-success btn-lg AgregarSO" value="" data-toggle="modal" data-target="#ModalAgregarSO">+</button>
									</div>
								</div>
							</div>
							<br>
							<!-- Office -->
							<div class="row">
								<div class="col-xs-9 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-check"></i></span>
										<select class="form-control" name="Office" id="Office">
										<option value="" disabled selected>Office</option>
											<!-- Acá mostraremos los puestos que existen en la base de datos -->
											<?php							
												$VerOffice = "SELECT * FROM Office;";
												
												// Hacemos la consulta
												$resultado = $mysqli->query($VerOffice);			
												while ($row = mysqli_fetch_array($resultado)){
													//Primero revisamos que no exista la marca ya en la base de datos
													$NombreEdicionOffice = "SELECT NombreEdicionOffice FROM EdicionOffice WHERE idEdicionOffice='".$row['idEdicionOffice']."';";
													$NombreArquitectura = "SELECT NombreArquitectura FROM Arquitectura WHERE idModelo='".$row['Arquitectura']."';";
													$ResultadoVerEdicionOffice = $mysqli->query($NombreEdicionOffice);			
													$ResultadoVerArquitectura = $mysqli->query($NombreArquitectura);			
													$row1 = mysqli_fetch_array($ResultadoVerEdicionOffice);
													$NombreResultadoOffice = $row1['NombreEdicionOffice'];
													$row2 = mysqli_fetch_array($ResultadoVerArquitectura);
													$NombreResultadoArquitectura = $row2['NombreArquitectura'];
													?>
													<option value="<?php echo $row['idOffice'];?>"><?php echo $NombreResultadoOffice . " " . $NombreResultadoArquitectura ?></option>
											<?php
													}
											?>
										</select>
									</div>
								</div>
								<!-- Button trigger modal -->
								<div class="col-xs-1">
									<div class="input-group input-group-lg">
										<button type="button" class="btn btn-success btn-lg AgregarOffice" value="" data-toggle="modal" data-target="#ModalAgregarOffice">+</button>
									</div>
								</div>
							</div>
							<br>
							<!-- Numero Activo Fijo -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tint"></i></span>
										<input type="text" class="form-control" name="NumeroActvoFijo" placeholder="Numero activo Fijo" id="NumeroActvoFijo" aria-describedby="sizing-addon1">
									</div>
								</div>
							</div>
							<br>
							<!-- Departameto -->
							<div class="row">
								<div class="col-xs-9 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-check"></i></span>
										<select class="form-control" name="Departamento" id="Departamento">
										<option value="" disabled selected>Departamento</option>
											<!-- Acá mostraremos los puestos que existen en la base de datos -->
											<?php							
												$VerDepartamento = "SELECT * FROM Departamento;";
												
												// Hacemos la consulta
												$resultado = $mysqli->query($VerDepartamento);			
												while ($row = mysqli_fetch_array($resultado)){
													?>
													<option value="<?php echo $row['idDepartamento'];?>"><?php echo $row['NombreDepartamento']; ?></option>
											<?php
													}
											?>
										</select>
									</div>
								</div>
								<!-- Button trigger modal -->
								<div class="col-xs-1">
									<div class="input-group input-group-lg">
										<button type="button" class="btn btn-success btn-lg AgregarDepartamento" value="" data-toggle="modal" data-target="#ModalAgregarDepartamento">+</button>
									</div>
								</div>
							</div>
							<br>
							<!-- Estado Equipo -->
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tasks"></i></span>
										<select class="form-control" name="EstadoEquipo" id="EstadoEquipo">
										<option value="" disabled selected>Estado equipo</option>
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
											<input type="submit" name="RegistrarEquipo" class="btn btn-primary" value="Registrar">
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
		<!-- Modal para crear Sedes -->
		<div class="modal fade slide left" id="ModalAgregarSede" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h1 class="modal-title" id="myModalLabel">Registrar sede</h1>
				</div>
				<form method="post" id="myForm">
					<div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<div class="form-group">
							<label for="email">Nombre de la sede</label>
							<input type="text" name="NombreSede" id="NombreSede" class="form-control" placeholder="Nombre" value="" required/>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarSede" class="btn btn-success" value="Registrar Sede">
					</div>
				</form>
			</div>
		  </div>
		</div>
		<!-- /Modal Agregar sedes -->
		<!-- Modal para crear Marca -->
		<div class="modal fade slide left" id="ModalAgregarMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h1 class="modal-title" id="myModalLabel">Registrar marca</h1>
				</div>
				<form method="post" id="myForm">
					<div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<div class="form-group">
							<label for="email">Nombre de la marca</label>
							<input type="text" name="NombreMarca" id="NombreMarca" class="form-control" placeholder="Nombre" value="" required/>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarMarca" class="btn btn-success" value="Registrar marca">
					</div>
				</form>
			</div>
		  </div>
		</div>
		<!-- /Modal Agregar marcas -->
		<!-- Modal para crear Modelo -->
		<div class="modal fade slide left" id="ModalAgregarModelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h1 class="modal-title" id="myModalLabel">Registrar modelo</h1>
				</div>
				<form method="post" id="myForm">
					<div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<div class="form-group">
							<label for="email">Nombre del modelo</label>
							<input type="text" name="NombreModelo" id="NombreModelo" class="form-control" placeholder="Nombre" value="" required/>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarModelo" class="btn btn-success" value="Registrar modelo">
					</div>
				</form>
			</div>
		  </div>
		</div>
		<!-- /Modal Agregar Procesador -->
		<!-- Modal para crear procesador		-->
		<div class="modal fade slide left" id="ModalAgregarProcesador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h1 class="modal-title" id="myModalLabel">Registrar Procesador</h1>
				</div>
				<form method="post" id="myForm">
					<div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<div class="form-group">
							<label for="email">Marca del procesador</label>
							<select class="form-control" name="Marca" id="Marca">
							<option value="" disabled selected>Marca</option>
								<!-- Acá mostraremos los puestos que existen en la base de datos -->
								<?php							
									$VerMarca = "SELECT * FROM Marca;";
									
									// Hacemos la consulta
									$resultado = $mysqli->query($VerMarca);			
									while ($row = mysqli_fetch_array($resultado)){
										?>
										<option value="<?php echo $row['idMarca'];?>"><?php echo $row['NombreMarca']; ?></option>
								<?php
										}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Modelo del procesador</label>
							<select class="form-control" name="Modelo" id="Modelo">
							<option value="" disabled selected>Modelo</option>
								<!-- Acá mostraremos los puestos que existen en la base de datos -->
								<?php							
									$VerModelo = "SELECT * FROM Modelo;";
									
									// Hacemos la consulta
									$resultado = $mysqli->query($VerModelo);			
									while ($row = mysqli_fetch_array($resultado)){
										?>
										<option value="<?php echo $row['idModelo'];?>"><?php echo $row['NombreModelo']; ?></option>
								<?php
										}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Generación del procesador</label>
							<input type="text" name="NombreModelo" id="NombreModelo" class="form-control" placeholder="Generación del procesador" value="" required/>
						</div>
						<div class="form-group">
							<label for="email">Velocidad del reloj</label>
							<input type="text" name="NombreModelo" id="NombreModelo" class="form-control" placeholder="Velocidad del reloj" value="" required/>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregaProcesador" class="btn btn-success" value="Registrar procesador">
					</div>
				</form>
			</div>
		  </div>
		</div>
		<!-- /Modal Agregar Procesador -->
		<!-- Modal para crear Sistema Operativo -->
		<div class="modal fade slide left" id="ModalAgregarSO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h1 class="modal-title" id="myModalLabel">Registrar sistema operativo</h1>
				</div>
				<form method="post" id="myForm">
					<div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<div class="form-group">
							<label for="email">Version del Sistema Operativo</label>
							<select class="form-control" name="Version" id="Version">
							<option value="" disabled selected>Version</option>
								<!-- Acá mostraremos los puestos que existen en la base de datos -->
								<?php							
									$VerVersionSO = "SELECT * FROM VersionSO;";
									
									// Hacemos la consulta
									$resultado = $mysqli->query($VerVersionSOs);			
									while ($row = mysqli_fetch_array($resultado)){
										?>
										<option value="<?php echo $row['idVersionSO'];?>"><?php echo $row['NombreVersionSO']; ?></option>
								<?php
										}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Edicion del Sistema Operativo</label>
							<select class="form-control" name="Edicion" id="Edicion">
							<option value="" disabled selected>Edicion</option>
								<!-- Acá mostraremos los puestos que existen en la base de datos -->
								<?php							
									$VerEdicionSO = "SELECT * FROM EdicionSO;";
									
									// Hacemos la consulta
									$resultado = $mysqli->query($VerEdicionSO);			
									while ($row = mysqli_fetch_array($resultado)){
										?>
										<option value="<?php echo $row['idEdicionSO'];?>"><?php echo $row['NombreEdicionSO']; ?></option>
								<?php
										}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Arquitectura del Sistema Operativo</label>
							<select class="form-control" name="Arquitectura" id="Arquitectura">
							<option value="" disabled selected>Arquitectura</option>
								<!-- Acá mostraremos los puestos que existen en la base de datos -->
								<?php							
									$VerArquitectura = "SELECT * FROM Arquitectura;";
									
									// Hacemos la consulta
									$resultado = $mysqli->query($VerArquitectura);			
									while ($row = mysqli_fetch_array($resultado)){
										?>
										<option value="<?php echo $row['idArquitectura'];?>"><?php echo $row['NombreArquitectura']; ?></option>
								<?php
										}
								?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarSO" class="btn btn-success" value="Registrar sistema operativo">
					</div>
				</form>
			</div>
		  </div>
		</div>
		<!-- /Modal Agregar Sistema Operativo -->
		<!-- Modal para agregar office -->
		<div class="modal fade slide left" id="ModalAgregarOffice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h1 class="modal-title" id="myModalLabel">Registrar office</h1>
				</div>
				<form method="post" id="myForm">
					<div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<div class="form-group">
							<label for="email">Edición de office</label>
							<select class="form-control" name="Version" id="Version">
							<option value="" disabled selected>Version</option>
								<!-- Acá mostraremos los puestos que existen en la base de datos -->
								<?php							
									$VerOffice = "SELECT * FROM EdicionOffice;";
									
									// Hacemos la consulta
									$resultado = $mysqli->query($VerOffice);			
									while ($row = mysqli_fetch_array($resultado)){
										?>
										<option value="<?php echo $row['idEdicionOffice'];?>"><?php echo $row['NombreEdicionOffice']; ?></option>
								<?php
										}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Edicion del Sistema Operativo</label>
							<select class="form-control" name="Edicion" id="Edicion">
							<option value="" disabled selected>Edicion</option>
								<!-- Acá mostraremos los puestos que existen en la base de datos -->
								<?php							
									$VerArquitectura = "SELECT * FROM Arquitectura;";
									
									// Hacemos la consulta
									$resultado = $mysqli->query(VerArquitectura);			
									while ($row = mysqli_fetch_array($resultado)){
										?>
										<option value="<?php echo $row['idArquitectura'];?>"><?php echo $row['NombreArquitectura']; ?></option>
								<?php
										}
								?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarOffice" class="btn btn-success" value="Registrar versión de office">
					</div>
				</form>
			</div>
		  </div>
		</div>
		<!-- /Modal Agregar office -->
		<!-- Modal para agregar departamento -->
		<div class="modal fade slide left" id="ModalAgregarDepartamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h1 class="modal-title" id="myModalLabel">Registrar departamento</h1>
				</div>
				<form method="post" id="myForm">
					<div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<div class="form-group">
							<label for="email">Nombre del departamento</label>
							<input type="text" name="NombreDepartamento" id="NombreDepartamento" class="form-control" placeholder="Nombre del departamento" value="" required/>
						</div>
						<div class="form-group">
							<label for="email">Area</label>
							<select class="form-control" name="Area" id="Area">
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
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarOffice" class="btn btn-success" value="Registrar versión de office">
					</div>
				</form>
			</div>
		  </div>
		</div>
		<!-- /Modal Agregar departamento -->
		<?php
		// Código que recibe la información para registrar un producto
			if (isset($_POST['RegistrarProducto'])) {
				// Guardamos la información en variables
				$CodigoInventario = $_POST['CodigoInventario'];
				$NombreProducto = $_POST['NombreProducto'];
				if(isset($_POST['Marca'])){
					$Marca = $_POST['Marca'];
				}
				else{
					$Marca = 1;
				}
				if(isset($_POST['Modelo'])){
					$Modelo = $_POST['Modelo'];
				}
				else{
					$Modelo = 1;
				}
				if(isset($_POST['LineaProducto'])){
					$LineaProducto = $_POST['LineaProducto'];
				}
				else{
					$LineaProducto = 1;
				}
				if(isset($_POST['UnidadMedida'])){
					$UnidadMedida = $_POST['UnidadMedida'];
				}
				else{
					$UnidadMedida = 1;
				}
				$ColorProducto = $_POST['ColorProducto'];
				$Precio = $_POST['Precio'];
				
				//Primero revisamos que no exista la marca ya en la base de datos
				$ConsultaExisteProducto = "SELECT NumeroInvenProd FROM producto WHERE NumeroInvenProd='".$CodigoInventario."';";
				$ResultadoExisteProducto = $mysqli->query($ConsultaExisteProducto);			
				$row = mysqli_fetch_array($ResultadoExisteProducto);
				if($row['NumeroInvenProd'] != null){
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-success">Este código ya existe en el inventario</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}
				else{
					// Preparamos la consulta
					$query = "INSERT INTO producto(NombreProducto, PrecioProducto, idMarca, idUnidadMedida, NumeroInvenProd, ModeloProducto, idLinea, ColorProducto, EstadoProducto)
										  VALUES('".$NombreProducto."', '".$Precio."', ".$Marca.", ".$UnidadMedida.", '".$CodigoInventario."', '".$Modelo."', ".$LineaProducto.", '".$ColorProducto."', 'Habilitado')";
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
													<div class="alert alert-success">Producto registrado</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
						// Recargamos la página
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
					}
				}
			}
			// Código que recibe la información para agregar nueva marca
			if (isset($_POST['AgregarMarca'])) {
				// Guardamos la información en variables
				$NombreMarca = $_POST['NombreMarca'];
				//Primero revisamos que no exista la marca ya en la base de datos
				$ConsultaExisteMarca = "SELECT NombreMarca FROM marca WHERE NombreMarca='".$NombreMarca."';";
				$ResultadoExisteMarca = $mysqli->query($ConsultaExisteMarca);
				$row = mysqli_fetch_array($ResultadoExisteMarca);
				if($row['NombreMarca'] != null){
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-success">La marca ya existe</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}
				else{
					// Preparamos la consulta
					$query = "INSERT INTO marca(NombreMarca)
										  VALUES('".$NombreMarca."');";
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
													<div class="alert alert-success">Marca registrada</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
						// Recargamos la página
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
					}
				}
			}
			// Termina código para agregar una nueva marca
			// Código que recibe la información para agregar una nueva linea
			if (isset($_POST['AgregarLinea'])) {
				// Guardamos la información en variables
				$NombreLinea = $_POST['NombreLinea'];
				//Primero revisamos que no exista la marca ya en la base de datos
				$ConsultaExisteLinea = "SELECT NombreLineaProducto FROM lineaproducto WHERE NombreLineaProducto='".$NombreLinea."';";
				$ResultadoExisteLinea = $mysqli->query($ConsultaExisteLinea);
				$row = mysqli_fetch_array($ResultadoExisteLinea);
				if($row['NombreLineaProducto'] != null){
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-success">La línea ya existe</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}
				else{
					// Preparamos la consulta
					$query = "INSERT INTO lineaproducto(NombreLineaProducto)
										  VALUES('".$NombreLinea."');";
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
													<div class="alert alert-success">Línea registrada</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
						// Recargamos la página
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
					}
				}
			}
			// Termina código para agregar la línea
			// Código que recibe la información para agregar una nueva unidad
			if (isset($_POST['AgregarUnidad'])) {
				// Guardamos la información en variables
				$NombreUnidad = $_POST['NombreUnidad'];
				//Primero revisamos que no exista la marca ya en la base de datos
				$ConsultaExisteUnidad = "SELECT NombreUnidadMedida FROM unidadmedida WHERE NombreUnidadMedida='".$NombreUnidad."';";
				$ResultadoExisteUnidad = $mysqli->query($ConsultaExisteUnidad);
				$row = mysqli_fetch_array($ResultadoExisteUnidad);
				if($row['NombreUnidadMedida'] != null){
					?>
					<div class="form-group">
						<form name="Alerta">
							<div class="container">
								<div class="row text-center">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="alert alert-success">La unidad de medida ya existe</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}
				else{
					// Preparamos la consulta
					$query = "INSERT INTO unidadmedida(NombreUnidadMedida)
										  VALUES('".$NombreUnidad."');";
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
													<div class="alert alert-success">Unidad de medida registrada</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
						// Recargamos la página
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
					}
				}
			}
			// Termina código para agregar una nueva unidad
		?>
		<!-- Modal crear marca -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
		<script src="js/jquery-1.11.3.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="js/bootstrap.js"></script>
		<!-- Pie de página, se utilizará el mismo para todos. -->
		<footer>
			<hr>
			<div class="row">
				<div class="text-center col-md-6 col-md-offset-3">
					<h4>Sistema de gestión de inventario</h4>
					<p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="https://www.umg.edu.gt/" >Gemis Daniel Guevara Villeda - Gustavo Rodolfo Arriaza</a></p>
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
