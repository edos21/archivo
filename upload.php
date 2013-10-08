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

	$directorio = 'uploads/';
	 
	$nombre = $_FILES['archivo']['name'];
	$tipo = $_FILES['archivo']['type'];
	$tamano = $_FILES['archivo']['size'];

	function cadena_aleatoria($numero){
  		
  		$caracter = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  		srand((double)microtime()*1000000);

  		for($i=0; $i<$numero; $i++) {

    		$rand = $caracter[rand()%strlen($caracter)];

  		}
  		return $rand;

 	}
	
	$nombredir = cadena_aleatoria(10) . $nombre; 

	try {

		$sql = 'INSERT INTO files SET
		nombre = :nombre,
		tipo = :tipo,
		size = :tamano,
		nombredir = :nombredir';

		$s = $pdo->prepare($sql);
		$s->bindValue(':nombre',$nombre);
		$s->bindValue(':tipo',$tipo);
		$s->bindValue(':tamano',$tamano);
		$s->bindValue(':nombredir',$nombredir);
		$s->execute();

	}

	catch (PDOException $e) {

		echo 'Ha ocurrido un errorb.';
		exit();

	}

	move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio.$nombredir);

	try {

		$sql = 'INSERT INTO proyectos SET
		unidad = :unidad,
		anno = :anno,
		tipo = :tipo,
		nombrearchivo = :nombre,
		nombredir = :nombredir';

		$s = $pdo->prepare($sql);
		$s->bindValue(':unidad',$_POST['unidad']);
		$s->bindValue(':anno',$_POST['anno']);
		$s->bindValue(':tipo',$_POST['tipo']);
		$s->bindValue(':nombre',$nombre);
		$s->bindValue(':nombredir',$nombredir);
		$s->execute();

	}

	catch (PDOException $e) {

		echo 'Ha ocurrido un error.';
		exit();

	}

	header('Location: archivo.php?load=true');
	exit();
		
		
?>