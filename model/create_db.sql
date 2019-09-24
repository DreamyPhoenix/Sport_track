/*
Utilisateur(mail(1), nom NN, prenom NN, dateDeNaissance	NN, sexe NN, taille NN, poids NN, motDePasse NN)
Activités(ID(1), dateA NN, description NN, duree NN emailU=@Utilisateur.mail NN)
Données(ID(1), heure_debut NN, frequence_cardiaque NN, latitude NN, longitude NN, altitude NN, unAID=@Activités.ID)
*/

DROP TABLE Data; 
DROP TABLE Activities;
DROP TABLE User;

CREATE TABLE User
	(
	mail TEXT
	CONSTRAINT pk_Utilisateur PRIMARY KEY,

	nom TEXT
	CONSTRAINT nn_nom NOT NULL,

	prenom TEXT
	CONSTRAINT nn_prenom NOT NULL,

	dateDeNaissance TEXT
	CONSTRAINT nn_dateNaissance NOT NULL CHECK (dateDeNaissance <= datetime('now','localtime')),

	sexe TEXT
	CONSTRAINT nn_sexe NOT NULL,

	taille INTEGER
	CONSTRAINT nn_taille NOT NULL,

	poids INTEGER
	CONSTRAINT nn_poids NOT NULL,

	motDePasse TEXT
	CONSTRAINT nn_motDePasse NOT NULL
	);

CREATE TABLE Activities
	(
	ID INTEGER
	CONSTRAINT pk_Activites PRIMARY KEY,

	dateA TEXT
	CONSTRAINT nn_dateA NOT NULL,

	description TEXT
	CONSTRAINT nn_description NOT NULL,

	duree REAL
	CONSTRAINT nn_duree NOT NULL CHECK (duree > 0),

	emailU TEXT
	CONSTRAINT fk_emailU REFERENCES User(mail)
	CONSTRAINT nn_emailU NOT NULL
	);

CREATE TABLE Data
	(
	ID INTEGER
	CONSTRAINT pk_Donnees PRIMARY KEY,

	heure_debut TEXT
	CONSTRAINT nn_heure_debut NOT NULL,

	frequence_cardiaque INTEGER
	CONSTRAINT nn_frequence_cardiaque NOT NULL CHECK (frequence_cardiaque > 0),

	latitude REAL
	CONSTRAINT nn_latitude NOT NULL CHECK (latitude <= 90 AND latitude >= -90),

	longitude REAL
	CONSTRAINT nn_longitude NOT NULL CHECK (longitude <= 180 AND longitude >= -180),

	altitude REAL
	CONSTRAINT nn_altitude NOT NULL CHECK (altitude < 8000),

	unAID INTEGER
	CONSTRAINT fk_unAID REFERENCES Activities(ID)
	CONSTRAINT nn_unAID NOT NULL
	);



CREATE TRIGGER IF NOT EXISTS fk_Activities
BEFORE INSERT ON Activities
BEGIN
  SELECT
    CASE
      WHEN ((SELECT mail FROM User WHERE mail = NEW.emailU ) IS NULL) THEN
        RAISE (ABORT,"Erreur clé étrangère activites")
      END;
END;


CREATE TRIGGER IF NOT EXISTS fk_Data
BEFORE INSERT ON Data
BEGIN
  SELECT
    CASE
      WHEN ((SELECT ID FROM Activities WHERE ID = NEW.unAID ) IS NULL) THEN
        RAISE (ABORT,"Erreur clé étrangère donnees")
      END;
END;


