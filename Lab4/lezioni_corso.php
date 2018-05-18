<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<title>Lezioni corso</title>
</head>

<body>

<?php
$CodC = $_GET["tendina"];

$conn = mysqli_connect("localhost","root","","palestra") or die("Errore connessione al db: " . mysqli_error($conn));  
mysqli_set_charset($conn, "utf8");

$query = "SELECT P.Giorno, P.OraInizio, P.Durata, P.Sala, I.nome, I.cognome
			FROM programma P, istruttore I
			WHERE P.CodFisc = I.CodFisc and P.CodC = \"" . $CodC . "\";";

$result = mysqli_query($conn, $query) or die("Errore nella query" . mysqli_error($conn));			
			
echo "<h1>Lezioni in programma per il corso " . $CodC . "</h1>";
?>

<table>
<tr>
	<th>Giorno</th>
	<th>Ora inizio</th>
	<th>Durata</th>
	<th>Sala</th>
	<th>Nome istruttore</th>
	<th>Cognome istruttore</th>
</tr>

<?php

while ($row = mysqli_fetch_row($result))
{
	echo "<tr>";
	
	foreach ($row as $campo)
		echo "<td>" . $campo . "</td>";
	
	echo "</tr>";
}


?>

</body>
</html>