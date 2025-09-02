DROP DATABASE IF EXISTS kafic;
CREATE DATABASE IF NOT EXISTS kafic;

USE kafic;

CREATE TABLE IF NOT EXISTS konobar (id INT AUTO_INCREMENT PRIMARY KEY,
									ime VARCHAR(40) NOT NULL,
									prezime VARCHAR(40) NOT NULL) ENGINE=INNODB;
										
CREATE TABLE IF NOT EXISTS sto (id INT AUTO_INCREMENT PRIMARY KEY,
								broj_mesta INT NOT NULL,
								vip_sto TINYINT NOT NULL)ENGINE=INNODB;
								

CREATE TABLE IF NOT EXISTS artikal (id INT AUTO_INCREMENT PRIMARY KEY,
									naziv VARCHAR(30) NOT NULL,
									cena INT NOT NULL)ENGINE=INNODB;
									
CREATE TABLE IF NOT EXISTS zauzet_sto (id INT AUTO_INCREMENT PRIMARY KEY,
										sto_id INT NOT NULL,
										vreme_dolaska DATETIME NOT NULL DEFAULT NOW(),
										vreme_odlaska DATETIME NOT NULL DEFAULT NOW(),
										broj_osoba INT NOT NULL,
										CONSTRAINT fk_sto_id_1
											FOREIGN KEY(sto_id) REFERENCES sto(id)
											ON DELETE CASCADE
											ON UPDATE CASCADE)ENGINE=INNODB;
									
CREATE TABLE IF NOT EXISTS narudzbina (id INT AUTO_INCREMENT PRIMARY KEY,
										zauzet_sto_id INT NOT NULL,
										artikal_id INT NOT NULL,
										kolicina INT NOT NULL,
										konobar_id INT NOT NULL,
											CONSTRAINT fk_zauzet_sto_id_1
												FOREIGN KEY(zauzet_sto_id) REFERENCES zauzet_sto(id)
												ON DELETE CASCADE
												ON UPDATE CASCADE,
											CONSTRAINT fk_artikal_id_1
												FOREIGN KEY(artikal_id) REFERENCES artikal(id)
												ON DELETE CASCADE
												ON UPDATE CASCADE,
											CONSTRAINT fk_konbar_id_1
												FOREIGN KEY(konobar_id) REFERENCES konobar(id)
												ON DELETE CASCADE
												ON UPDATE CASCADE)ENGINE=INNODB;
												
INSERT INTO konobar (ime, prezime) 
	VALUES ('Pera', 'Peric'), 
		   ('Mika', 'Mikic'),
		   ('Mica', 'Micic'),
		   ('Luka', 'Nikolic'),--novo
		   ('Aleksa', 'Djordjevic'),
		   ('David', 'Milosevic'),
		   ('Stefan', 'Antunovic'),
		   ('Marko', 'Gavrilovic');
		   
INSERT INTO sto (broj_mesta, vip_sto)
	VALUES (4, 0), (4, 0), (8, 0), (2, 0), (4, 0), (6, 0), (4, 1), (8, 1), (2, 1),(10, 0), (5, 1), (12, 1), (6, 0), (5, 1), (12, 0), (6, 1), (4, 0), (2, 0), 
	(5, 0), (6, 1);
	
INSERT INTO artikal (naziv, cena)
	VALUES ('Coca-Cola', 150),--1
		   ('Caj', 80),--2
		   ('Pepsi', 110),--3
		   ('Turska kafa', 60),--4
		   ('Vinjak', 150),--5
		   ('VodaVoda', 100),--6
		   ('Jelen', 240),--7
		   ('Badvajzer', 210),--8
		   ('Espreso', 120),--9
		   ('Nes kafa', 130),--10
		   ('Fanta', 120),--11
		   ('Knjaz Milos', 70),--12
		   ('Karlsberg', 245),--13
		   ('Crno vino', 300),--14
		   ('Belo vino', 280);--15
		   
INSERT INTO zauzet_sto (sto_id, vreme_dolaska, vreme_odlaska, broj_osoba)
	VALUES (1, '2020-11-25 12:23:55', '2020-11-25 14:20:15', 3),--1
		   (2, '2020-02-25 11:32:12', '2020-02-25 12:23:55', 4),--2
		   (3, '2020-02-25 11:32:12', '2020-02-25 12:23:55', 7),--3
		   (7, '2020-02-25 15:23:32', '2020-02-25 16:00:55', 2),--4
		   (8, '2020-02-25 13:21:33', '2020-02-25 13:55:21', 6),--5
		   (1, '2020-11-25 14:25:55', '2020-11-25 15:20:15', 3),--6S 
		   (20, '2020-01-05 11:14:23', '2020-01-05 13:15:10', 4),--7
		   (6, '2020-01-05 11:15:14', '2020-01-05 12:05:24', 6),--8
		   (1, '2020-01-05 11:15:35', '2020-01-05 13:10:35', 4),--9
		   (15, '2020-01-05 12:00:42', '2020-01-05 15:32:04', 10),--10
		   (8, '2020-01-05 12:04:23', '2020-01-05 12:55:57', 6),--11
		   (3, '2020-01-05 12:06:10', '2020-01-05 13:45:20', 8),--12
		   (12, '2020-01-07 10:23:10', '2020-01-07 12:55:03', 11),--13
		   (10, '2020-01-07 10:26:16', '2020-01-07 16:44:32', 8),--14
		   (4, '2020-01-07 11:34:23', '2020-01-07 13:23:13', 2),--15
		   (14, '2020-01-07 11:46:32', '2020-01-07 15:10:04', 5),--16
		   (8, '2020-02-10 12:32:21', '2020-02-10 17:21:03', 6),--17
		   (12, '2020-02-10 13:55:53', '2020-02-10 16:54:32', 11),--18
		   (6, '2020-03-03 12:12:43', '2020-03-03 14:21:53', 6),--19
		   (14, '2020-03-03 13:55:21', '2020-03-03 15:20:10', 4),--20
		   (5, '2020-03-03 15:17:43', '2020-03-03 17:31:44', 4),--21
		   (20, '2020-04-15 12:43:22', '2020-04-15 14:32:22', 5),--22
		   (10, '2020-04-15 12:55:21', '2020-04-15 13:26:43', 9),--23
		   (1, '2020-04-15 13:23:41', '2020-04-15 18:21:32', 4),--24
		   (18, '2020-05-30 17:33:54', '2020-05-30 19:43:22', 2),--25
		   (13, '2020-05-30 14:11:43', '2020-05-30 15:22:42', 6),--26
		   (8, '2020-05-30 15:00:32', '2020-05-30 15:55:21', 7),--27
		   (6, '2020-06-26 11:32:29', '2020-06-26 13:19:51', 6),--28
		   (15, '2020-06-26 10:14:36', '2020-06-26 12:24:11', 11),--29
		   (12, '2020-06-26 15:32:22', '2020-06-26 16:58:58', 9),--30
		   (7, '2020-07-14 16:43:18', '2020-07-14 18:32:11', 3),--31
		   (3, '2020-07-14 17:32:21', '2020-07-14 17:59:02', 6),--32
		   (17, '2020-07-14 12:44:22', '2020-07-14 14:00:24', 4),--33
		   (11, '2020-08-20 10:00:00', '2020-08-20 12:21:11', 3),--34
		   (19, '2020-08-20 18:32:22', '2020-08-20 18:44:23', 5),--35
		   (10, '2020-08-20 13:53:28', '2020-08-20 15:21:44', 8),--36
		   (18, '2020-09-09 14:23:12', '2020-09-09 15:55:03', 2),--37
		   (7, '2020-09-09 12:48:44', '2020-09-09 15:37:13', 3),--38
		   (15,'2020-09-09 13:11:11', '2020-09-09 16:37:23', 11),--39
		   (19, '2020-10-12 10:23:49', '2020-10-12 12:00:47', 4),--40
		   (12, '2020-10-12 10:25:55', '2020-10-12 14:32:22', 10),--41
		   (5, '2020-10-12 11:11:11', '2020-10-12 14:19:22', 4),--42
		   (14, '2020-11-25 15:21:00', '2020-11-25 17:44:21', 5),--43
		   (12, '2020-12-31 10:32:33', '2020-12-31 14:32:11', 12),--44
		   (17, '2020-12-31 12:53:10', '2020-12-31 15:00:02', 3),--45
		   (8, '2020-12-31 13:00:00', '2020-12-31 14:33:32', 7);--46
		   
INSERT INTO narudzbina (zauzet_sto_id, artikal_id, kolicina, konobar_id)
	VALUES (1, 1, 1, 2),
		   (1, 5, 2, 2),
		   (2, 2, 3, 1),
		   (2, 4, 1, 1),
		   (3, 7, 4, 1),
		   (3, 5, 3, 1),
		   (4, 8, 2, 3),
		   (5, 2, 3, 2),
		   (5, 1, 3, 2),
		   (6, 8, 1, 3),
		   (6, 7, 2, 3),
		   (7, 9, 2, 4),
		   (7, 11, 2, 4),
			(8,4,3,2),
			(8,12,2,2),
			(8,13,1,2),
			(9,7,4,7),
			(10,14,4,6),
			(10,8,3,6),
			(10,15,3,6),
			(11,5,4,8),
			(11,2,2,8),
			(12,1,4,1),
			(12,11,2,1),
			(12,13,1,1),
			(13,14,6,5),
			(13,5,5,5),
			(14,7,3,3),
			(14,12,5,3),
			(15,10,2,1),
			(16,4,5,8),
			(17,2,4,7),
			(17,1,2,7),
			(18,15,6,4),
			(18,7,5,4),
			(19,9,3,2),
			(19,13,3,2),
			(20,1,2,1),
			(20,4,2,1),
			(21,8,3,6),
			(21,12,1,6),
			(22,11,2,8),
			(22,2,3,8),
			(23,9,5,3),
			(23,10,4,3),
			(24,10,3,5),
			(24,10,1,5),
			(25,6,2,7),
			(26,12,3,1),
			(26,14,3,1),
			(27,2,5,6),
			(27,11,2,6),
			(28,15,3,8),
			(28,4,2,8),
			(28,5,1,8),
			(29,5,5,7),
			(29,8,4,7),
			(29,7,2,7),
			(30,13,4,1),
			(30,2,3,1),
			(30,6,2,1),
			(31,10,3,8),
			(32,11,3,4),
			(32,3,3,4),
			(33,1,3,7),
			(33,3,1,7),
			(34,15,3,6),
			(35,5,3,1),
			(35,15,2,1),
			(36,10,3,4),
			(36,5,3,4),
			(36,12,2,4),
			(37,2,2,6),
			(38,3,3,2),
			(39,13,4,1),
			(39,14,4,1),
			(39,15,3,1),
			(40,4,4,6),
			(41,11,3,5),
			(41,7,5,5),
			(41,3,2,5),
			(42,12,2,8),
			(42,4,2,8),
			(43,8,5,6),
			(44,9,4,1),
			(44,6,4,1),
			(44,12,2,1),
			(44,7,1,1),
			(45,4,3,5),
			(46,15,3,3),
			(46,13,3,3),
			(46,1,1,3);
--Upiti	
SELECT 
	CONCAT(k.ime,' ',k.prezime) AS konobar
FROM konobar AS k;
	   
SELECT 
	naziv,
	cena
FROM artikal;

SELECT
z.id,
z.vreme_dolaska,
z.vreme_odlaska,
CONCAT(z.broj_osoba,'/',s.broj_mesta) AS popunjenost,
if(s.vip_sto=1,'VIP','Obican sto') as `tip stola`
FROM zauzet_sto AS z
INNER JOIN sto AS s ON z.sto_id=s.id
WHERE z.vreme_dolaska BETWEEN "2020-11-25" AND "2020-11-25 23:59:59";

SELECT
	SUM(n.kolicina*a.cena) AS trosak
FROM narudzbina AS n 
INNER JOIN artikal AS a on a.id=n.artikal_id
WHERE zauzet_sto_id=1;

SELECT 
a.naziv AS artikal,
a.cena,
n.kolicina,
 a.cena*n.kolicina AS ukupna_cena,
CONCAT (k.ime, ' ',k.prezime) AS konobar
From narudzbina  as n
INNER JOIN artikal as a on n.artikal_id=a.id
INNER JOIN konobar as k on n.konobar_id=k.id
WHERE n.zauzet_sto_id=1
;
--suma po mesecu;
SELECT
month(z.vreme_dolaska) as mesec,
year(z.vreme_dolaska) as godina,
a.naziv,
sum(n.kolicina) as kolicina,
sum((a.cena +a.cena*0.1*s.vip_sto)*kolicina) as total
FROM
zauzet_sto AS z
INNER JOIN narudzbina as n ON n.zauzet_sto_id=z.id
INNER JOIN artikal AS a ON a.id=n.artikal_id
INNER JOIN sto as s on z.sto_id=s.id
where year(z.vreme_dolaska)=2020 and month(z.vreme_dolaska)=2
GROUP BY a.naziv,month(z.vreme_dolaska),year(z.vreme_dolaska)
ORDER BY year(z.vreme_dolaska) asc,month(z.vreme_dolaska) asc,a.naziv asc

;

SELECT 
k.ime,
k.prezime,
count(distinct n.zauzet_sto_id) as stolovaUsluzeno
FROM konobar as k
INNER JOIN narudzbina as n on n.konobar_id=k.id
GROUP BY k.ime,k.prezime
;
