<html>
<head><title>Istruttori</title></head>

<body>

<?php
$conn = mysqli_connect("localhost","root","","palestra") or die("Errore connessione al db: " . mysqli_error($conn));  
mysqli_set_charset($conn, "utf8");
?>

<h1>Ricerca lezioni istruttori</h1>

<form method="get" action="lezioni_istruttore.php">
Cognome: 
<select name="cognome">
<?php
$query = "SELECT DISTINCT cognome FROM istruttore;";
$result = mysqli_query($conn, $query) or die("Errore nella query" . mysqli_error($conn));;

while ($line = mysqli_fetch_array($result))
	echo "<option value=" . $line["cognome"] . ">" . $line["cognome"] . "</option>";
?>
</select>
<br>
Giorno: 
<select name="giorno">
<?php
$query = "SELECT DISTINCT giorno FROM programma ORDER BY giorno;";
$result = mysqli_query($conn, $query) or die("Errore nella query" . mysqli_error($conn));;

while ($line = mysqli_fetch_array($result))
	echo "<option value=" . $line["giorno"] . ">" . $line["giorno"] . "</option>";
?>

<br>
<input type="submit" value="Cerca">
</form>

</body>

</html>