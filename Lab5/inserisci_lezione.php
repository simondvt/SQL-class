<html>

	<?php	// setup connection
	
	$conn = mysqli_connect("localhost","root","","palestra") or die("Errore connessione al db: " . mysqli_error($conn));  
	mysqli_set_charset($conn, "utf8");
	
	?>

	<head><title>Inserimento nuova lezione</title></head>
	
	<body>
	
	<p>Programmazione della nuova lezione settimanale</p>
	
	<form method="GET" action="lezione.php">
	
	Istruttore:
	<select name="codFisc">
	<?php	// istruttore
	
	$query = "SELECT Nome, Cognome, CodFisc FROM ISTRUTTORE";
	$result = mysqli_query($conn, $query) or die("Errore nella query" . mysqli_error($conn));

	while ($line = mysqli_fetch_array($result))
		echo "<option value=" . $line["CodFisc"] . ">" . $line["Cognome"] . " " . $line["Nome"] . " (" . $line["CodFisc"] . ")</option>";

	
	?>
	</select> <br>
	
	Giorno:		<input type="text" name="giorno"> <br>
	Ora inizio: <input type="text" name="oraInizio"> <br>
	Durata:	    <input type="text" name="durata"> <br>
	
	Corso: 
	<select name="codC">
	<?php	// corso
	
	$query = "SELECT Nome, CodC FROM CORSI";
	$result = mysqli_query($conn, $query) or die("Errore nella query" . mysqli_error($conn));

	while ($line = mysqli_fetch_array($result))
		echo "<option value=" . $line["CodC"] . ">" . $line["Nome"] . " (" . $line["CodC"] . ")</option>";
	
	?>
	</select> <br>
	
	Sala: <input type="txt" name="sala"> <br>
	
	<input type="submit" value="Inserisci">
	</form>
	</body>
	
	<?php // close connection
	mysqli_close($conn);
	?>

</html>