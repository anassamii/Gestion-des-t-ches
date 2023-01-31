#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        email    Varchar (50) NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL ,
	CONSTRAINT utilisateur_PK PRIMARY KEY (email)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etudiant
#------------------------------------------------------------

CREATE TABLE tache(
        id             Int  Auto_increment  NOT NULL ,
        titre            Varchar (50) NOT NULL ,
        description         Varchar (100) NOT NULL ,
        accomplie            Boolean NOT NULL DEFAULT false ,
	CONSTRAINT tache_PK PRIMARY KEY (id)
)ENGINE=InnoDB;