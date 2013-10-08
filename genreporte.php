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
		anno = :anno AND
		tipo = :tipo ORDER BY id ASC';

		$s = $pdo->prepare($sql);
		$s->bindValue(':anno',$_POST['anno']);
		$s->bindValue(':tipo',$_POST['tipo']);
		$s->execute();


	}

	catch (PDOException $e) {

		echo 'Ha ocurrido un error.';
		exit();

	}

	$numero = $s->rowCount();

	if ($numero == 0) {

		header('Location: reporte.php?no=true');
		exit();

	}	

	try {

		$sql = 'SELECT * FROM proyectos';

		$s1 = $pdo->prepare($sql);
		$s1->execute();

	}

	catch (PDOException $e) {

		echo 'Ha ocurrido un error.';
		exit();

	}

	$numero_dos = $s1->rowCount();

	$noentregados = $numero_dos - $numero;

	while ($row = $s->fetch()) {

		$unidad = $row['unidad'];

		$results[] = array('id' => $row['id'], 'anno' => $row['anno'], 'unidad' => $unidad, 'tipo' => $row['tipo'], 'nombrearchivo' => $row['nombrearchivo'], 'nombredir' => $row['nombredir']);

		$anno= $_POST['anno'];

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

			$nombreunidades[] = array('unidad' => $row['unidad']);

		}

	}

	include 'reporte1.php';
	exit();

?>