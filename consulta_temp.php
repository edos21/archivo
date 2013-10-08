<?php 
	
	try {

		$pdo = new PDO('mysql:host=localhost;dbname=archivo', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');

	}

	catch(PDOException $e) {

		echo 'Ha ocurrido un error.';
		exit();

	}

	try {

		$sql = 'SELECT * FROM files';

		$s = $pdo->prepare($sql);
		$s->execute();

	}

	catch (PDOException $e) {

		echo 'Ha ocurrido un error.';
		exit();

	}

	while ($row = $s->fetch()) {

		$files[] = array('id' => $row['id'], 'nombre' => $row['nombre'], 'tipo' => $row['tipo'], 'size' => $row['size'], 'nombredir' => $row['nombredir']);

	}

	foreach ($files as $file):
		echo '<a href="uploads/' . $file['nombredir'] . '">'. $file['nombre'] . '</a><br />';
	endforeach;	


?>