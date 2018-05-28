<html>

	<head><title>Inserimento nuovo corso</title></head>
	
	<body>

	<?php
		
		$codC = $_GET["codC"];
		$nome = $_GET["nome"];
		$tipo = $_GET["tipo"];
		$livello = $_GET["livello"];
		
		
		// controllo dati mancanti
		if ($codC == "" || $nome == "" || $tipo == "" || $livello == "")
			die("Inserire tutti i campi!");
		
		
		// controllo valore di livello
		if ($livello < 1 || $livello > 4)
			die("Il range di livello è [1, 4]!");

		
		$conn = mysqli_connect("localhost","root","","palestra") or die("Errore connessione al db: " . mysqli_error($conn)); 
		mysqli_set_charset($conn, "utf8");
		
		// controllo codice duplicato
		if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM CORSI WHERE CodC=" . "\"$codC\"")) != 0)
			die("Il corso " . $codC . " esiste già!");
		
		
		// inserimento corso
		$sql = "INSERT INTO CORSI (CodC, Nome, Tipo, Livello)
					VALUES ('" . $codC . "', '" . $nome . "', '" . $tipo . "', " . $livello . ");";
					
		mysqli_query($conn, $sql) or die("Errore nell'inserimento");
		
		echo "<h1>Il corso " . $codC . " è stato inserito nel database.</h1>";
		
		mysqli_close($conn);
	?>

	</body>

</html>