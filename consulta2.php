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
				<h3>Consultar Archivos</h3>
				<table class="striped">
					<thead>
						<th>Codigo</th>
						<th>A&ntilde;o</th>
						<th>Unidad</th>
					</thead>
					<tbody>
						<?php foreach($results as $result): ?>
						<tr>
							<td>
								<?php echo $result['id']; ?>
							</td>
							<td>
								<?php echo $result['anno']; ?>
							</td>
							<td>
								<?php echo $nombreunidad; ?>
							</td>
							<td>
								<a class="button green" href="<?php echo 'uploads/' . $result['nombredir']; ?>">Abrir <?php echo $result['tipo']; ?></a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>