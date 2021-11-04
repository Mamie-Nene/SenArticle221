CREATE DATABASE IF NOT EXISTS mglsi_news;
USE mglsi_news;

DROP TABLE IF EXISTS Article, Categorie, Users;

CREATE TABLE Article(
	id int primary key auto_increment,
	titre varchar(255),
	contenu text,
	dateCreation datetime DEFAULT NOW(),
	dateModification datetime DEFAULT NOW(),
	categorie int,
	editeur varchar(100)
);


CREATE TABLE Categorie(
	id int primary key auto_increment,
	libelle varchar(20)
);

CREATE TABLE Users(
	id int primary key auto_increment,
	nom varchar(255),
	username varchar(100),
	motDePasse varchar(100),
	mail varchar(255),
	groupe int,
);

CREATE TABLE Groupe(
	id int primary key auto_increment,
	nomGroupe varchar(100)
);


INSERT INTO Categorie(libelle) VALUES ('Sport'), ('Santé'), ('Education'), ('Politique');

INSERT INTO Groupe(nomGroupe) VALUES ('éditeurs'), ('admin');

INSERT INTO Article (titre, contenu, categorie, dateCreation, dateModification, editeur) VALUES ('Première victoire du Sénégal', 'Lorem ipsum dolor sit amet,.', 1,'2021-10-10','2021-10-12','Mamie BA'),
	('Election en Mauritanie', 'Lorem ipsum dolor sit amet, ',1,'2021-10-10','2021-10-12','Mouhamed BA'),
	('Pétrole au Sénégal', 'Lorem ipsum dolor sit amet, .', 4,'2021-09-10','2021-09-12','Mouhamed BA'),
	("Inauguration d'un ENO à l'UVS", 'Lorem ipsum dolor sit amet, .', 3,'2021-08-10','2021-08-12','Mamie BA');

INSERT INTO Users (nom, username, motDePasse, mail, groupe) VALUES ('Mamie BA', 'mamie9', 'DIC2INFO', 'mamie@esp.sn', 2),
	('Mouhamed BA', 'momo2','DIC2INFO', 'momo@esp.sn', 1);

ALTER TABLE Article ADD CONSTRAINT fk_categorie_article FOREIGN KEY(categorie) REFERENCES Categorie(id);
ALTER TABLE Users ADD CONSTRAINT fk_users_groupe FOREIGN KEY(groupe) REFERENCES Groupe(id);

GRANT ALL PRIVILEGES ON mglsi_news.* TO mglsi_user IDENTIFIED BY 'passer';