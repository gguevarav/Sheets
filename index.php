<!--
	Módulo Principal
	Lunes, 2 de julio del 2018
	10:23 PM
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
			include_once 'Seguridad/conexion.php';
			// Incluimos el archivo que valida si hay una sesión activa
			include_once "Seguridad/seguro.php";
			// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
			if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
			   $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
				// Guardamos el nombre del usuario en una variable
				$NombreUsuario =$_SESSION["NombreUsuario"];
				$idUsuario2 =$_SESSION["idUsuario"];
				
				$sql1 = 'SELECT idProducto, SUM(CantidadSalida) AS Suma FROM registrosalida GROUP BY idProducto ORDER BY Suma DESC;';
				$sql2 = 'SELECT idProducto, SUM(CantidadEntrada) AS Suma FROM registroentrada GROUP BY idProducto ORDER BY Suma DESC;';
				$sql3 = 'SELECT idProducto, SUM(CantidadInventario) AS Suma FROM inventario GROUP BY idProducto ORDER BY Suma DESC';
				// Guardado
				/*
				$sql4 = 'SELECT producto.NombreProducto, SUM(inventario.CantidadInventario)
						 FROM producto LEFT JOIN inventario ON producto.idProducto = inventario.idProducto
						 GROUP BY producto.idProducto;';*/
				
				// Primer gráfica
				$NombreTop10_Salidas;
				$Top10_Salidas;
				// Hacemos la consulta para mostrar las cantidades de Entradas
				$resultado1 = $mysqli->query($sql1);
				$Contador = 0;
				// Llenamos la matriz para que pueda mostrar aunque no tenga información completa
				for($Contador1 = 0; $Contador1 < 5; $Contador1++){
						$NombreTop10_Salidas[$Contador1] = " ";
						$Top10_Salidas[$Contador1] = 0;
					}
				// Si el objeto no está vacio entonces guardamos la información en la matriz
					while ($row1 = mysqli_fetch_array($resultado1)){
						$VerNombreProducto = "SELECT NombreProducto FROM producto WHERE idProducto=".$row1['idProducto'].";";
						// Hacemos la consulta
						$ResultadoVerProducto = $mysqli->query($VerNombreProducto);
						$FilaResultado = $ResultadoVerProducto->fetch_assoc();
						$NombreTop10_Salidas[$Contador] = $FilaResultado['NombreProducto'];
						$Top10_Salidas[$Contador] = $row1['Suma'];
						// Aumentamos al contador
						$Contador++;
						if($Contador == 6){
							break;
						}
					}
				// Segunda Gráfica
				$NombreTop10_Entradas;
				$Top10_Entradas;
				// Hacemos la consulta para mostrar las cantidades de Entradas
				$resultado2 = $mysqli->query($sql2);
				$Contador = 0;
				// Llenamos la matriz para que pueda mostrar aunque no tenga información completa
				for($Contador2 = 0; $Contador2 < 5; $Contador2++){
					$NombreTop10_Entradas[$Contador2] = " ";
					$Top10_Entradas[$Contador2] = 0;
				}
			// Si el objeto no está vacio entonces guardamos la información en la matriz
				while ($row2 = mysqli_fetch_array($resultado2)){
					$VerNombreProducto = "SELECT NombreProducto FROM producto WHERE idProducto=".$row2['idProducto'].";";
					// Hacemos la consulta
					$ResultadoVerProducto = $mysqli->query($VerNombreProducto);
					$FilaResultado = $ResultadoVerProducto->fetch_assoc();
					$NombreTop10_Entradas[$Contador] = $FilaResultado['NombreProducto'];
					$Top10_Entradas[$Contador] = $row2['Suma'];
					// Aumentamos al contador
					$Contador++;
					if($Contador == 6){
						break;
					}
				}
				// Guardamos las cantidades en variables (5)
				$NombreTop5_1;
				$Top5_1;
				// Hacemos la consulta para mostrar las cantidades de Entradas
				$resultado3 = $mysqli->query($sql3);
				$Contador = 0;
				// Llenamos la matriz para que pueda mostrar aunque no tenga información completa
				for($Contador3 = 0; $Contador3 < 5; $Contador3++){
						$NombreTop5_1[$Contador3] = " ";
						$Top5_1[$Contador3] = 0;
					}
				// Si el objeto no está vacio entonces guardamos la información en la matriz
					while ($row3 = mysqli_fetch_array($resultado3)){
						$VerNombreProducto = "SELECT NombreProducto FROM producto WHERE idProducto=".$row3['idProducto'].";";
						// Hacemos la consulta
						$ResultadoVerProducto = $mysqli->query($VerNombreProducto);
						$FilaResultado = $ResultadoVerProducto->fetch_assoc();
						$NombreTop5_1[$Contador] = $FilaResultado['NombreProducto'];
						$Top5_1[$Contador] = $row3['Suma'];
						// Aumentamos al contador
						$Contador++;
						if($Contador == 6){
							break;
						}
					}
		?>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid"> 
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
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
		<div class="container-fluid">
			<div class="dashboard">
				<div class="row">
					<div class="text-center">
						<div class="col-xs-12 col-md-5">
							<div class="row">
								<div class="col-xs-12 col-md-12"><canvas id="ContenedorChart1"></canvas></div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-md-12"><canvas id="ContenedorChart2"></canvas></div>
							</div>
						</div>
					</div>
					<div class="text-center">
						<div class="col-md-2"><img src="imagenes/LogoPrincipal.png" class="img-responsive center-block"></div>
					</div>
					<div class="text-center">
						<div class="col-xs-12 col-md-5">
							<div class="row">
								<div class="col-xs-12 col-md-12"><canvas id="ContenedorChart3" height="40vh" width="40vw"></canvas></div>
							</div>
							<!--
							<div class="row">
								<div class="col-xs-12 col-md-12"><canvas id="" height="40vh" width="80vw"></canvas></div>
							</div>
							-->
						</div>
					</div>
				</div>
			</div>
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
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
		<script src="js/jquery-1.11.3.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="js/bootstrap.js"></script>
		<script src="jquery/jquery.js"></script>
			<!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
		<script src="Chart.js/Chart.min.js"></script>
		<script>
			// Primer gráfica
			var ctx1 = document.getElementById("ContenedorChart1").getContext('2d');
			var myChart1 = new Chart(ctx1, {
				type: 'bar',
				data: {
					labels: [<?php echo "'".$NombreTop10_Entradas[0]."'"; ?>, <?php echo "'".$NombreTop10_Entradas[1]."'"; ?>,
							 <?php echo "'".$NombreTop10_Entradas[2]."'"; ?>, <?php echo "'".$NombreTop10_Entradas[3]."'"; ?>,
							 <?php echo "'".$NombreTop10_Entradas[4]."'"; ?>],
					datasets: [{
						label: 'Entradas',
						data: [<?php echo $Top10_Entradas[0]; ?>, <?php echo $Top10_Entradas[1]; ?>,
							   <?php echo $Top10_Entradas[2]; ?>, <?php echo $Top10_Entradas[3]; ?>,
							   <?php echo $Top10_Entradas[4]; ?>],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
							}
						}]
					},
					title: {
						display: true,
						text: 'Top 5 entradas'
					}
				}
			});
			// Segunda gráfica
			var ctx2 = document.getElementById("ContenedorChart2").getContext('2d');
			var myChart2 = new Chart(ctx2, {
				type: 'line',
				data: {
					labels: [<?php echo "'".$NombreTop10_Salidas[0]."'"; ?>, <?php echo "'".$NombreTop10_Salidas[1]."'"; ?>,
							 <?php echo "'".$NombreTop10_Salidas[2]."'"; ?>, <?php echo "'".$NombreTop10_Salidas[3]."'"; ?>,
							 <?php echo "'".$NombreTop10_Salidas[4]."'"; ?>],
					datasets: [{
						label: 'Salidas',
						data: [<?php echo $Top10_Salidas[0]; ?>, <?php echo $Top10_Salidas[1]; ?>,
							   <?php echo $Top10_Salidas[2]; ?>, <?php echo $Top10_Salidas[3]; ?>,
							   <?php echo $Top10_Salidas[4]; ?>],
						backgroundColor: ['rgba(54, 162, 235, 0.2)'],
						borderColor: ['rgba(54, 162, 235, 1)'],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
							}
						}]
					},
					title: {
						display: true,
						text: 'Top 5 Salidas'
					}
				}
			});
			// Tercera gráfica
			var ctx3 = document.getElementById("ContenedorChart3").getContext('2d');
			var myChart3 = new Chart(ctx3, {
				type: 'doughnut',
				data: {
					labels: [<?php echo "'".$NombreTop5_1[0]."'"; ?>, <?php echo "'".$NombreTop5_1[1]."'"; ?>,
							 <?php echo "'".$NombreTop5_1[2]."'"; ?>, <?php echo "'".$NombreTop5_1[3]."'"; ?>,
							 <?php echo "'".$NombreTop5_1[4]."'"; ?>],
					datasets: [{
						data: [<?php echo $Top5_1[0]; ?>, <?php echo $Top5_1[1]; ?>,
							 <?php echo $Top5_1[2]; ?>, <?php echo $Top5_1[3]; ?>,
							 <?php echo $Top5_1[4]; ?>],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					title: {
						display: true,
						text: 'Top 5 de existencia de productos'
					}
				}
			});
			// Cuarta gráfica
			var ctx4 = document.getElementById("ContenedorChart4").getContext('2d');
			var myChart4 = new Chart(ctx4, {
				type: 'doughnut',
				data: {
					labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
					datasets: [{
						data: [12, 19, 3, 5, 2, 3],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					},
					title: {
						display: true,
						text: 'Otros'
					}
				}
			});
		</script>
	</body>
	<?php
	// De lo contrario lo redirigimos al inicio de sesión
		} 
		else{
			echo "usuario no valido";
			header("location:Login.php");
		}
	?>
</html>
