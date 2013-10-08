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

		$sql = 'SELECT * FROM proyectos WHERE
		unidad = :unidad AND
		anno = :anno';

		$s = $pdo->prepare($sql);
		$s->bindValue(':unidad',$_POST['codigo']);
		$s->bindValue(':anno',$_POST['anno']);
		$s->execute();

	}

	catch (PDOException $e) {

		echo 'Ha ocurrido un error.';
		exit();

	}

	while ($row = $s->fetch()) {

		$unidad = $row['unidad'];

		$results[] = array('id' => $row['id'], 'anno' => $row['anno'], 'unidad' => $unidad, 'tipo' => $row['tipo'], 'nombrearchivo' => $row['nombrearchivo'], 'nombredir' => $row['nombredir']);

	}

	try {

		$sql = 'SELECT * FROM unidades WHERE
		codigo = :codigo';

		$s2 = $pdo->prepare($sql);
		$s2->bindValue(':codigo',$unidad);
		$s2->execute();


	}

	catch (PDOException $e) {

		echo 'Ha ocurrido un error.';
		exit();
		
	}

	while ($row = $s2->fetch()) {

		$nombreunidad = $row['unidad'];

	}

	include 'consulta2.php';
	exit();
 
?>