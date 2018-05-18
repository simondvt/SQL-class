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
$cognome = $_GET["cognome"];
$giorno = $_GET["giorno"];

$conn = mysqli_connect("localhost","root","","palestra") or die("Errore connessione al db: " . mysqli_error($conn));  
mysqli_set_charset($conn, "utf8");

$query = "SELECT P.Giorno, P.OraInizio, P.Durata, P.Sala, C.Nome, C.Livello, I.CodFisc, I.Nome, I.Cognome
			FROM programma P, istruttore I, corsi C
			WHERE P.CodFisc = I.CodFisc and P.CodC = C.CodC
				and P.Giorno = \"" . $giorno . "\" and I.Cognome = \"" . $cognome . "\"
			ORDER BY I.CodFisc, C.Nome;";

$result = mysqli_query($conn, $query) or die("Errore nella query" . mysqli_error($conn));	

if (mysqli_num_rows($result) == 0)
{
	echo "<h1>Nessuna lezione in programma per l’istruttore " . $cognome ." il giorno della settimana " .
		$giorno . ".</h1>";
	exit();
}	
			
echo "<h1>Lezioni in programma</h1>";
echo "<p>Le lezioni in programma per l'istruttore " . $cognome ." nel giorno
	" . $giorno . " sono le seguenti.</p>";
?>

<table>
<tr>
	<th>Giorno</th>
	<th>Ora inizio</th>
	<th>Durata</th>
	<th>Sala</th>
	<th>Nome corso</th>
	<th>Livello</th>
	<th>CodFisc Istruttore</th>
	<th>Nome Istruttore</th>
	<th>Cognome Istruttore</th>
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