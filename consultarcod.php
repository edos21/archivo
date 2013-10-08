<!DOCTYPE html>
<html>
	<head>
		<title>Archivos - P.O.A.</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/kickstart.js"></script>
		<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />
		<link rel="stylesheet" type="text/css" href="style.css" media="all" />  
	</head>
	<body>
		<header>
			<img src="img/cintillo.png">
			<nav>
				<ul class="menu">
					<li><a href="index.php">Inicio</a></li>
					<li><a>Proyecto</a>
						<ul>
							<li><a href="archivo.php">Cargar</a></li>
						</ul>
					</li>
					<li><a>Consulta</a>
						<ul>
							<li><a href="consultar.php">Consultar Nombre</a></li>
							<li><a href="#">Consultar Codigo</a></li>
						</ul>
					</li>
					<li><a href="reporte.php">Reporte</a></li>
				</ul>
			</nav>
		</header>
		<div id="main">
			<div class="col_12" id="cpersonal">
				<h3>Consultar Archivos</h3>
				<form method="post" action="consultar_3.php">
					<label for="anno">A&ntilde;o</label>
					<input type="text" name="anno" id="anno" pLaceholder="A&ntilde;o a Buscar">
					<label for="codigo">Codigo</label>
					<input type="text" name="codigo" id="codigo" pLaceholder="Codigo a Buscar">
					<br><br>
					<input type="submit" class="green" value="Buscar">
				</form>
			</div>
		</div>
	</body>
</html>