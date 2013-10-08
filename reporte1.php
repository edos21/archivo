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
							<li><a href="consultarcod.php">Consultar Codigo</a></li>
						</ul>
					</li>
					<li><a href="reporte.php">Reporte</a></li>
				</ul>
			</nav>
		</header>
		<div id="main">
			<div class="col_12" id="cpersonal">
				<h3>Reporte de Entregas</h3>
				A&ntilde;o: <?php echo $anno; ?><br>
				Total: <?php echo $numero; ?>
				No entregados: <?php echo 377 - $numero; ?>
				<table class="striped">
					<thead>
						<th>Unidad</th>
					</thead>
					<tbody>
						<?php foreach($nombreunidades as $nombreunidad): ?>
						<tr>
							<td>
								<?php echo $nombreunidad['unidad']; ?>
							</td>
						</tr>
						<?php endforeach; ?>	
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>