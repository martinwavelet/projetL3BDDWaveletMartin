PRAGMA foreign_keys=ON;

CREATE TABLE utilisateur (
	id_utilisateur INTEGER PRIMARY KEY,
	pseudo TEXT NOT NULL,
	mdp TEXT NOT NULL,
	mail TEXT NOT NULL,
	note_moyenne REAL NOT NULL DEFAULT 0
);
	
CREATE TABLE jeux_video (
	id_jeux_video INTEGER PRIMARY KEY,
	nom TEXT NOT NULL,
	id_possesseur INTEGER NOT NULL,
	console TEXT NOT NULL,
	prix REAL NOT NULL DEFAULT 0,
	nbr_joueur REAL NOT NULL DEFAULT 1,
	commentaire_jeu TEXT NOT NULL,
	FOREIGN KEY(id_possesseur) REFERENCES utilisateur(id_utilisateur) 
);
  
CREATE TABLE commentaires_utilisateur (
	id_commentaire INTEGER PRIMARY KEY,
	id_receveur INTEGER NOT NULL,
	id_auteur INTEGER NOT NULL,
	date_commentaire TEXT NOT NULL,
	commentaire TEXT NOT NULL,
	note REAL NOT NULL,
	FOREIGN KEY(id_receveur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY(id_auteur) REFERENCES utilisateur(id_utilisateur)
);
 
INSERT INTO utilisateur(pseudo,mdp,mail) VALUES("Florent", "Florent", "Florent@gmail.com");
INSERT INTO utilisateur(pseudo,mdp,mail) VALUES("Patrick", "Patrick", "Patrick@hotmail.Fr");
  
INSERT INTO jeux_video(nom,id_possesseur,console,prix,nbr_joueur,commentaire_jeu) VALUES('Super Mario Bros',1,'NES',4.0,1,"Un jeu d'anthologie !");
INSERT INTO jeux_video(nom,id_possesseur,console,prix,nbr_joueur,commentaire_jeu) VALUES('Sonic',2,'Megadrive',2.0,1,'Pour moi, le meilleur jeu du monde !');
-- INSERT INTO "jeux_video" VALUES('Zelda : ocarina of time','Florent','Nintendo 64',15.0,1,'Un jeu grand, beau et complet comme on en voit rarement de nos jours');
-- INSERT INTO "jeux_video" VALUES('Mario Kart 64','Florent','Nintendo 64',25.0,4,'Un excellent jeu de kart !');
-- INSERT INTO "jeux_video" VALUES('Super Smash Bros Melee','Michel','GameCube',55.0,4,'Un jeu de baston délirant !');
-- INSERT INTO "jeux_video" VALUES('Dead or Alive','Patrick','Xbox',60.0,4,'Le plus beau jeu de baston jamais créée');
-- INSERT INTO "jeux_video" VALUES('Dead or Alive Xtreme Beach Volley Ball','Patrick','Xbox',60.0,4,'Un jeu de beach volley de toute beautee o_O');
-- INSERT INTO "jeux_video" VALUES('Enter the Matrix','Michel','PC',45.0,1,'Plutot bof comme jeu, mais ca complete bien le film');
-- INSERT INTO "jeux_video" VALUES('Max Payne 2','Michel','PC',50.0,1,'Tres realiste, une sorte de film noir sur fond d''histoire d''amour. A essayer !');
-- INSERT INTO "jeux_video" VALUES('Yoshi''s Island','Florent','SuperNES',6.0,1,'Le paradis des Yoshis :o)');
-- INSERT INTO "jeux_video" VALUES('Commandos 3','Florent','PC',44.0,12,'Un bon jeu d''action ou on dirige un commando pendant la 2eme guerre mondiale !');
-- INSERT INTO "jeux_video" VALUES('Final Fantasy X','Patrick','PS2',40.0,1,'Encore un Final Fantasy mais celui la est encore plus beau !');
-- INSERT INTO "jeux_video" VALUES('Pokemon Rubis','Florent','GBA',44.0,4,'Pika-Pika-chu !!!');
-- INSERT INTO "jeux_video" VALUES('Starcraft','Michel','PC',19.0,8,'Le meilleur jeux pc de tout les temps !');
-- INSERT INTO "jeux_video" VALUES('Grand Theft Auto 3','Michel','PS2',30.0,1,'Comme dans les autres Gta on ecrase tout le monde :) .');
-- INSERT INTO "jeux_video" VALUES('Homeworld 2','Michel','PC',45.0,6,'Superbe ! o_O');
-- INSERT INTO "jeux_video" VALUES('Aladin','Patrick','SuperNES',10.0,1,'Comme le dessin Anime !');
-- INSERT INTO "jeux_video" VALUES('Super Mario Bros 3','Michel','SuperNES',10.0,2,'Le meilleur Mario selon moi.');
-- INSERT INTO "jeux_video" VALUES('SSX 3','Florent','Xbox',56.0,2,'Un tres bon jeu de snow !');
-- INSERT INTO "jeux_video" VALUES('Star Wars : Jedi outcast','Patrick','Xbox',33.0,1,'Encore un jeu sur star-wars ou on se prend pour Luke Skywalker !');
-- INSERT INTO "jeux_video" VALUES('Actua Soccer 3','Patrick','PS',30.0,2,'Un jeu de foot assez bof ...');
-- INSERT INTO "jeux_video" VALUES('Time Crisis 3','Florent','PS2',40.0,1,'Un troisieme volet efficace mais pas vraiment surprenant');
-- INSERT INTO "jeux_video" VALUES('X-FILES','Patrick','PS',25.0,1,'Un jeu censé ressembler a la série mais assez raté ...');
-- INSERT INTO "jeux_video" VALUES('Soul Calibur 2','Patrick','Xbox',54.0,1,'Un jeu bien axé sur le combat');
-- INSERT INTO "jeux_video" VALUES('Diablo','Florent','PS',20.0,1,'Comme sur PC mais la c''est sur un ecran de télé :) !');
-- INSERT INTO "jeux_video" VALUES('Street Fighter 2','Patrick','Megadrive',10.0,2,'Le célèbre jeu de combat !');
-- INSERT INTO "jeux_video" VALUES('Gundam Battle Assault 2','Florent','PS',29.0,1,'Jeu japonais dont le gameplay est un peu limité. Peu de robots malheureusement');
-- INSERT INTO "jeux_video" VALUES('Spider-Man','Florent','Megadrive',15.0,1,'Vivez l''aventure de l''homme araignée');
-- INSERT INTO "jeux_video" VALUES('Midtown Madness 3','Michel','Xbox',59.0,6,'Dans la suite des autres versions de Midtown Madness');
-- INSERT INTO "jeux_video" VALUES('Tetris','Florent','Gameboy',5.0,1,'Qui ne connait pas ? ');
-- INSERT INTO "jeux_video" VALUES('The Rocketeer','Michel','NES',2.0,1,'Un super un film et un jeu de m*rde ...');
-- INSERT INTO "jeux_video" VALUES('Pro Evolution Soccer 3','Patrick','PS2',59.0,2,'Un petit jeu de foot sur PS2');
-- INSERT INTO "jeux_video" VALUES('Ice Hockey','Michel','NES',7.0,2,'Jamais joué mais a mon avis ca parle de hockey sur glace ... =)');
-- INSERT INTO "jeux_video" VALUES('Sydney 2000','Florent','Dreamcast',15.0,2,'Les JO de Sydney dans votre salon !');
-- INSERT INTO "jeux_video" VALUES('NBA 2k','Patrick','Dreamcast',12.0,2,'A votre avis :p ?');
-- INSERT INTO "jeux_video" VALUES('Aliens Versus Predator : Extinction','Michel','PS2',20.0,2,'Un shoot''em up pour pc');
-- INSERT INTO "jeux_video" VALUES('Crazy Taxi','Florent','Dreamcast',11.0,1,'Conduite de taxi en folie !');
-- INSERT INTO "jeux_video" VALUES('Le Maillon Faible','Mathieu','PS2',10.0,1,'Le jeu de l''émission');
-- INSERT INTO "jeux_video" VALUES('FIFA 64','Michel','Nintendo 64',25.0,2,'Le premier jeu de foot sur la N64 =) !');
-- INSERT INTO "jeux_video" VALUES('Qui Veut Gagner Des Millions','Florent','PS2',10.0,1,'Le jeu de l''émission');
-- INSERT INTO "jeux_video" VALUES('Monopoly','Sebastien','Nintendo 64',21.0,4,'Bheuuu le monopoly sur N64 !');
-- INSERT INTO "jeux_video" VALUES('Taxi 3','Corentin','PS2',19.0,4,'Un jeu de voiture sur le film');
-- INSERT INTO "jeux_video" VALUES('Indiana Jones Et Le Tombeau De L''Empereur','Florent','PS2',25.0,1,'Notre aventurier préféré est de retour !!!');
-- INSERT INTO "jeux_video" VALUES('F-ZERO','Mathieu','GBA',25.0,4,'Un super jeu de course futuriste !');
-- INSERT INTO "jeux_video" VALUES('Harry Potter Et La Chambre Des Secrets','Mathieu','Xbox',30.0,1,'Abracadabra !! Le célebre magicien est de retour !');
-- INSERT INTO "jeux_video" VALUES('Half-Life','Corentin','PC',15.0,32,'L''autre meilleur jeu de tout les temps (surtout ses mods).');
-- INSERT INTO "jeux_video" VALUES('Myst III Exile','Sebastien','Xbox',49.0,1,'Un jeu de réflexion');
-- INSERT INTO "jeux_video" VALUES('Wario World','Sebastien','Gamecube',40.0,4,'Wario vs Mario ! Qui gagnera ! ?');
-- INSERT INTO "jeux_video" VALUES('Rollercoaster Tycoon','Florent','Xbox',29.0,1,'Jeu de gestion d''un parc d''attraction');
-- INSERT INTO "jeux_video" VALUES('Splinter Cell','Patrick','Xbox',53.0,1,'Jeu magnifique !');
-- COMMIT;