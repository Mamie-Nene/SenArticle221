CREATE DATABASE IF NOT EXISTS mglsi_news;
USE mglsi_news;

DROP TABLE IF EXISTS Article, Categorie, Users, UserRole;

CREATE TABLE Article(
	id int primary key auto_increment,
	titre varchar(255),
	contenu text,
	dateCreation datetime DEFAULT NOW(),
	dateModification datetime DEFAULT NOW(),
	categorie int,
	editeur int
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
	userRole int
);

CREATE TABLE UserRole(
	id int primary key auto_increment,
	nomRole varchar(100)
);


INSERT INTO Categorie(libelle) VALUES ('Sport'), ('Santé'), ('Education'), ('Politique');

INSERT INTO UserRole(nomRole) VALUES ('éditeurs'), ('admin');

INSERT INTO Article (titre, contenu, categorie, dateCreation, dateModification, editeur) VALUES ('Première victoire du Sénégal', 'Lorem ipsum dolor sit amet,.', 1,'2021-10-10','2021-10-12',1),
	('Election en Mauritanie', 'Lorem ipsum dolor sit amet, ',4,'2021-10-10','2021-10-12',1),
	('Pétrole au Sénégal', 'Lorem ipsum dolor sit amet, .', 4,'2021-09-10','2021-09-12',2),
	("Inauguration d'un ENO à l'UVS", 'Lorem ipsum dolor sit amet, .', 3,'2021-08-10','2021-08-12',2),
	("Communiqué cas coronavirus", 'Lorem ipsum dolor sit amet, .', 2,'2021-11-06','2021-11-06',3),
	("Ligues des champions: favoris", 'Lorem ipsum dolor sit amet, .', 1,'2021-11-05','2021-11-05',3),
	("Environnement et maladies cardiovasculaires", 'Lorem ipsum dolor sit amet, .', 2,'2021-11-04','2021-11-04',2),
	("Basket Sénégalais au devant", 'Lorem ipsum dolor sit amet, .', 1,'2021-11-03','2021-11-03',2);

INSERT INTO Users (nom, username, motDePasse, mail, userRole) VALUES ('Mamie BA', 'mamie1', 'DIC2INFO', 'mamie@esp.sn', 2),
	('Docko SOW', 'docko2','DIC2INFO', 'docko@esp.sn', 1),
	('Mouhamed CISS', 'ciss3','DIC2INFO', 'ciss@esp.sn', 1);

ALTER TABLE Article ADD CONSTRAINT fk_categorie_article FOREIGN KEY(categorie) REFERENCES Categorie(id);
ALTER TABLE Users ADD CONSTRAINT fk_users_userRole FOREIGN KEY(userRole) REFERENCES UserRole(id);
ALTER TABLE Article ADD CONSTRAINT fk_users_article FOREIGN KEY(editeur) REFERENCES Users(id);

GRANT ALL PRIVILEGES ON mglsi_news.* TO mglsi_user IDENTIFIED BY 'passer';