<html>
<head><title>Corsi</title></head>

<body>

<h1>Ricerca lezioni corso</h1>

<form method="get" action="lezioni_corso.php">
Codice corso:
<select name="tendina">

<?php

$conn = mysqli_connect("localhost","root","","palestra") or die("Errore connessione al db: " . mysqli_error($conn));  
mysqli_set_charset($conn, "utf8");

$query = "SELECT CodC, Nome FROM CORSI";
$result = mysqli_query($conn, $query) or die("Errore nella query" . mysqli_error($conn));

while ($line = mysqli_fetch_array($result))
	echo "<option value=" . $line["CodC"] . ">" . $line["CodC"] . " - " . $line["Nome"] . "</option>";

?>

</select>
<input type="submit" value="Cerca">
</form>

</body>
</html>