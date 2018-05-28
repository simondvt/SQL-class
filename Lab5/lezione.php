<?php

$codFisc = $_GET["codFisc"];
$giorno = $_GET["giorno"];
$oraInizio = $_GET["oraInizio"];
$durata = $_GET["durata"];
$codC = $_GET["codC"];
$sala = $_GET["sala"];


// controllo durata
if ($durata > 60) die("La durata non può superare i 60 minuti!");

// controllo giorno
if ($giorno[0] == 'S' || $giorno[0] == 'D') die("Sono ammessi solo giorni da Lunedì a Venerdì");


// setup connessione
$conn = mysqli_connect("localhost","root","","palestra") or die("Errore connessione al db: " . mysqli_error($conn)); 
mysqli_set_charset($conn, "utf8");

// inizio transazione
mysqli_query($conn, "SET autocommit=0; START TRANSACTION");

// verifica
$result = mysqli_query($conn, "SELECT * FROM PROGRAMMA WHERE CodC='" . $codC ."' and Giorno='" . $giorno . "';");

if (mysqli_num_rows($result) != 0)
{
	mysqli_query($conn, "ROLLBACK");
	die("Non è possibile inserire in un programma lo stesso corso nello stesso giorno");
}

$sql = "INSERT INTO Programma (CodFisc,Giorno,OraInizio,Durata,Sala,CodC)
		VALUES ('" . $codFisc . "','" . $giorno . "','" . $oraInizio . "'," . $durata . ",'" . $sala . "','" . $codC . "');";

if (!mysqli_query($conn, $sql))
{
	mysqli_query($conn, "ROLLBACK");
	die("Errore nella query");
}

mysqli_query($conn, "COMMIT");

echo "<h1>La lezione è stata inserita nel database</h1>";

mysqli_close($conn);

?>