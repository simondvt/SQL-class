SET storage_engine = InnoDB;
CREATE DATABASE IF NOT EXISTS PALESTRA;
USE PALESTRA;

CREATE TABLE ISTRUTTORE
(
	CodFisc 		CHAR(17) 		NOT NULL,
	Nome			VARCHAR(15),
	Cognome			VARCHAR(15),
	DataNascita 	DATE,
	Email			VARCHAR(50),
	Telefono        INTEGER,
	PRIMARY KEY (CodFisc)
);

CREATE TABLE CORSI
(
	CodC	 		CHAR(17) 		NOT NULL,
	Nome			VARCHAR(15),
	Tipo			VARCHAR(30),
	Livello			SMALLINT CHECK(Livello >= 1 and Livello <= 4),
	PRIMARY KEY (CodC)
);

CREATE TABLE PROGRAMMA
(
	CodFisc			CHAR(17)		NOT NULL,
	Giorno			VARCHAR(10)		NOT NULL,
	OraInizio		TIME			NOT NULL,
	Durata			SMALLINT CHECK (Durata >= 0),
	CodC	 		CHAR(17),
	Sala			CHAR(2),
	PRIMARY KEY (CodFisc, Giorno, OraInizio),
	FOREIGN KEY (CodFisc) REFERENCES ISTRUTTORE(CodFisc),
	FOREIGN KEY (CodC)	   REFERENCES CORSI(CodC)
);