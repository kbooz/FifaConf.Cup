/*Confederação: "Time do País", País: "País sede"
 
- Página de pesquisa -
#1-Quantas vezes TAL confederação foi campeão da copa do mundo?
#2-Quantas vezes TAL país foi sede de uma copa do mundo?
#3-Quantas vezes TAL confederação venceu uma copa em casa?
#4-Gerar uma tabela de quais os locais em que uma confederação jogou.
#5-Gerar uma tabela de quais países sediaram uma copa
#6-Mostrar os resultados dos jogos de uma copa do mundo
#7-Quantas vezes houve a mesma partida entre duas conf. ao longo de todas as copas do mundo
#8-Gerar uma tabela da quantidade de gols de todas as confederações
#9-Gerar uma tabela da quantidade de título das confederações até um determinado ano
#10-Quantidade de partidas que uma confederação jogou durante as copas do mundo
#11-Tabela de países que jogaram finais em casa
#12-Mostrar todos os jogos de uma confederação
#13-Mostrar todos os jogos de uma copa do mundo
 
-Página de dados gerais -
#14-Mostrar na tela as confederações da primeira e da última copa mais recente
#15-Mostra qual o país com mais vitórias
#16-Mostrar a conf. que mais fizeram gols
#17-Mostrar a final que rendeu mais gols
#18-Mostrar a confederação que jogou mais partidas durante as copas do mundo
#19-Mostrar o país que mais jogou em finais
#20-Mostrar a partida que rendeu mais gols

Tabelas:
Copa {idCopa,idPaisSede,ano};
Jogos {idPaisVitoria,idPaisDerrota,resultadoVitoria,resultadoDerrota,idCopa,bitFinal}
Pais {idPais,nomePais}
*/

---Criar Tabelas---
--Pais--
create table Pais
(
	idPais int NOT NULL AUTO_INCREMENT,
	nomePais varchar(20),
	constraint pk_pais primary key (idPais)
)

--Copa--
create table Copa
(
	idCopa int NOT NULL AUTO_INCREMENT,
	idPaisSede int NOT NULL,
	ano int NOT NULL,
	constraint pk_copa primary key (idCopa),
	constraint fk_copa foreign key (idPaisSede) references pais (idPais)
)

--Jogos--
create table Jogos
(
    idJogo int NOT NULL AUTO_INCREMENT,
	idPaisVitoria int NOT NULL,
	idPaisDerrota int NOT NULL,
	resultadoVitoria int NOT NULL,
	resultadoDerrota int NOT NULL,
	idCopa int not null,
	bitFinal int default 0,
	constraint pk_jogos primary key (idJogo),
	constraint fk_jogosV foreign key (idPaisVitoria) references pais (idPais),
	constraint fk_jogosD foreign key (idPaisDerrota) references pais (idPais)
)


---Insert---
--Pais--
insert into Pais (nomePais)
values ("Brasil"), ("França"), ("Argentina"),
		("México"), ("Dinamarca"), ("Estados Unidos"), ("Austrália"),
		("Espanha"), ("Arábia Saudita"), ("Japão"), ("Camarões"),
		("República Tcheca"), ("Turquia"), ("Alemanha"), ("Itália"), ("Uruguai"),
		("Costa do Marfim"), ("Nigéria"), ("Colômbia"), ("África do Sul"),
		("Nova Zelândia"), ("Egito"), ("Bolívia"), ("Canadá"), ("Coreia do Sul"),
		("Emirados Árabes Unidos"), ("Grécia"), ("Iraque"), ("Tunísia"), ("Taiti");

--Copa--
insert into copa (idPaisSede,ano)
values (9,1992),(9,1995),(9,1997),(4,1999),(25,2001),(2,2003),(14,2005),(20,2009),(1,2013);



--Jogos--
insert into Jogos (idPaisVitoria, resultadoVitoria, idPaisDerrota, resultadoDerrota, idCopa, bitFinal)
    values (9,3,6,0,1,0),(3,4,17,0,1,0),(6,5,17,2,1,0),(3,3,9,1,1,1),(4,2,9,0,2,0),(5,2,9,0,2,0),(5,5,4,3,2,0),(18,3,10,0,2,0),(3,5,10,1,2,0),(3,0,18,0,2,0),(4,6,18,5,2,0),(5,2,3,0,2,1),(1,3,9,0,3,0),(7,3,4,1,3,0),(4,5,9,0,3,0),(1,0,7,0,3,0),(9,1,7,0,3,0),(1,3,4,2,3,0),(16,2,26,0,3,0),(12,2,20,2,3,0),(26,1,20,0,3,0),(16,2,12,1,3,0),(12,6,26,1,3,0),(16,4,20,3,3,0),(1,2,12,0,3,0),(7,1,16,0,3,0),(12,1,16,0,3,0),(1,6,7,0,3,1),(23,2,22,2,4,0),(4,5,9,1,4,0),(9,0,23,0,4,0),(4,2,22,2,4,0),(9,5,22,1,4,0),(4,1,23,0,4,0),(1,4,14,0,4,0),(6,2,21,1,4,0),(14,2,21,0,4,0),(1,1,6,0,4,0),(6,2,14,0,4,0),(1,2,21,0,4,0),(4,1,6,0,4,0),(1,8,9,2,4,0),(6,2,9,0,4,0),(4,4,1,3,4,1),(2,5,25,0,5,0),(7,2,4,0,5,0),(7,1,2,0,5,0),(25,2,4,1,5,0),(2,4,4,0,5,0),(25,1,7,0,5,0),(1,2,11,0,5,0),(10,3,24,0,5,0),(24,0,1,0,5,0),(10,2,11,0,5,0),(1,0,10,0,5,0),(11,2,24,0,5,0),(10,1,7,0,5,0),(2,2,1,1,5,0),(7,1,1,0,5,0),(2,1,10,0,5,1),(20,3,21,0,6,0),(2,1,19,0,6,0),(19,3,21,1,6,0),(2,2,10,1,6,0),(2,5,21,0,6,0),(19,1,10,0,6,0),(13,2,6,1,6,0),(11,1,1,0,6,0),(11,1,13,0,6,0),(1,1,6,0,6,0),(1,2,13,2,6,0),(6,0,11,0,6,0),(11,1,19,0,6,0),(2,3,13,2,6,0),(13,2,19,1,6,0),(2,1,11,0,6,1),(3,2,29,1,7,0),(14,4,7,3,7,0),(14,3,29,0,7,0),(3,4,7,2,7,0),(29,2,7,0,7,0),(14,2,3,2,7,0),(4,2,10,1,7,0),(1,3,27,0,7,0),(10,1,27,0,7,0),(4,1,1,0,7,0),(27,0,4,0,7,0),(10,2,1,2,7,0),(1,3,14,2,7,0),(3,7,4,6,7,0),(14,4,4,3,7,0),(1,4,1,3,7,1),(20,0,28,0,8,0),(8,5,21,0,8,0),(8,1,28,0,8,0),(20,2,21,0,8,0),(28,0,21,0,8,0),(8,2,20,0,8,0),(1,4,22,3,8,0),(1,3,6,0,8,0),(22,1,15,0,8,0),(1,3,15,0,8,0),(16,3,22,0,8,0),(6,2,8,0,8,0),(1,1,20,0,8,0),(8,3,20,2,8,0),(1,3,6,2,8,1),(1,3,10,0,9,0),(15,2,4,1,9,0),(1,2,4,0,9,0),(15,4,10,3,9,0),(1,4,15,2,9,0),(4,2,10,1,9,0),(8,2,16,1,9,0),(18,6,30,1,9,0),(8,10,30,0,9,0),(16,2,18,1,9,0),(8,3,18,0,9,0),(16,8,30,0,9,0),(1,2,16,1,9,0),(8,7,15,6,9,0),(15,5,16,4,9,0),(1,3,8,0,9,1)



		
		


-- 1-Quantas vezes TAL confederação foi campeão da copa do mundo?
SELECT COUNT(idPais) FROM (
 Pais INNER JOIN Jogos ON Pais.idPais = Jogos.idPaisVitoria
 ) WHERE resultadoVitoria > resultadoDerrota AND nomePais = 'PAIS'
 
-- 2-Quantas vezes TAL país foi sede de uma copa do mundo?
 
SELECT COUNT(idPais) FROM (
	Copa INNER JOIN Pais ON Pais.idPais = Copa.IdPaisSede
) WHERE nomePais = 'PAIS'
 
-- 3-Quantas vezes TAL confederação venceu uma copa em casa?
 
SELECT COUNT(idPais) FROM (
	(Copa INNER JOIN Jogos ON Copa.idCopa = Jogos.idCopa) AS A
	INNER JOIN Pais
	ON A.idPaisVitoria = Pais.idPais
) WHERE resultadoVitoria > resultadoDerrota AND nomePais = 'PAIS'
 
-- 4-Gerar uma tabela de quais os locais em que uma confederação jogou.
 
SELECT nomePais FROM (
	(SELECT DISTINCT idPaisSede FROM (
		 (Copa INNER JOIN Jogos ON Copa.idCopa = Jogos.idCopa) AS A
		INNER JOIN Pais
		ON A.idPaisVitoria = Pais.idPais
	) WHERE nomePais = 'PAIS') AS Sedes
	INNER JOIN Pais ON Sedes.idPaisSede = Pais.idPais
)
 
-- 5-Gerar uma tabela de quais países sediaram uma copa
 
SELECT nomePais FROM (
	Copa INNER JOIN Pais ON Copa.idPaisSede = Pais.idPais
)
 
-- 6-Mostrar os resultados dos jogos de uma copa do mundo
 
SELECT pVitoria.nomePais, resultadoVitoria, resultadoDerrota, pDerrota.nomePais FROM (
	((Copa INNER JOIN Jogos ON Copa.idCopa = Jogos.idCopa) AS jogoCopa
	INNER JOIN (Pais) AS pVitoria ON pVitoria.idPais = jogoCopa.idPaisVitoria)
	INNER JOIN (Pais) AS pDerrota ON pDerrota.idPais = jogoCopa.idPaisDerrota
) WHERE jogoCopa.ano = "0000"
 
-- 7-Quantas vezes houve a mesma partida entre duas conf. ao longo de todas as copas do mundo
SELECT COUNT(p1.nomePais) + COUNT(p2.nomePais) FROM (
		((SELECT * FROM (
				(Jogos INNER JOIN
						(Pais) AS pVitoria1 ON pVitoria1.idPais = Jogos.idPaisVitoria)
						INNER JOIN
						(Pais) AS pDerrota1 ON pDerrota1.idPais = jogoCopa.idPaisDerrota
		) WHERE pVitoria1.nomePais = "PAIS1" AND pVitoria2.nomePais = "Pais2") AS p1
		FULL OUTER JOIN
		(SELECT * FROM (
				(Jogos INNER JOIN
						(Pais) AS pVitoria2 ON pVitoria2.idPais = Jogos.idPaisVitoria)
						INNER JOIN
						(Pais) AS pDerrota2 ON pDerrota2.idPais = jogoCopa.idPaisDerrota
		) WHERE pVitoria1.nomePais = "PAIS2" AND pVitoria2.nomePais = "Pais1") AS p2)
		ON p1.idPaisVitoria = p2.idPaisDerrota
)
 
-- 8-Gerar uma tabela da quantidade de gols de todas as confederações
SELECT nomePais, SUM(p1.resultadoVitoria) + SUM(p2.resultadoDerrota) FROM (
		(SELECT idPais, nomePais, resultadoVitoria FROM (
				Jogos INNER JOIN
				(Pais) AS pVitoria ON pVitoria.idPais = Jogos.idPaisVitoria
		) WHERE nomePais = "PAIS") AS p1
		FULL OUTER JOIN
		(SELECT idPais, nomePais, resultadoDerrota FROM (
				Jogos INNER JOIN
				(Pais) AS pDerrota ON pDerrota.idPais = Jogos.idPaisDerrota
		) WHERE nomePais = "PAIS") AS p2
		ON p1.idPais = p2.idPais
)
GROUP BY idPais, nomePais
 
-- 9-Gerar uma tabela da quantidade de título das confederações até um determinado ano
SELECT COUNT(idCopa) FROM (
		Jogos INNER JOIN Pais ON Pais.idPais = Jogos.idPaisVitoria
) WHERE ano <= "0000" AND bitFinal = TRUE
GROUP BY idPaisVitoria
 
-- 10-Quantidade de partidas que uma confederação jogou durante as copas do mundo
SELECT COUNT(*) FROM (
		(Jogos INNER JOIN Pais ON Pais.idPais = Jogos.idPaisVitoria) AS p1
		FULL OUTER JOIN
		(Jogos INNER JOIN Pais ON Pais.idPais = Jogos.idPaisDerrota) AS p2
		ON p1.idPaisVitoria = p2.idPaisDerrota
) WHERE nomePais = "PAIS"
 
-- 11-Tabela de países que jogaram finais em casa
SELECT nomePais FROM (
		(Jogos INNER JOIN Copa ON Copa.idCopa = Jogos.idCopa) AS jc
		INNER JOIN Pais ON jc.idPaisSede = Pais.idPais
) WHERE idPaisSede = idPaisVitoria OR idPaisSede = idPaisDerrota
 
-- 12-Mostrar todos os jogos de uma confederação
SELECT pVitoria.nomePais, resultadoVitoria, resultadoDerrota, pDerrota.nomePais FROM (
		(Jogos
		INNER JOIN (Pais) AS pVitoria ON pVitoria.idPais = Jogos.idPaisVitoria)
		INNER JOIN (Pais) AS pDerrota ON pDerrota.idPais = Jogos.idPaisDerrota
) WHERE pVitoria.nomePais = "PAIS" OR pDerrota.nomePais = "PAIS"
 
-- 13-Mostrar todos os jogos de uma copa do mundo
-- Igual à número 6 (?)
 
-- 14-Mostrar na tela as confederações da primeira e da última copa mais recente
SELECT nomePais FROM (
		((Jogos
		INNER JOIN (Pais) AS pVitoria ON pVitoria.idPais = Jogos.idPaisVitoria)
		INNER JOIN (Pais) AS pDerrota ON pDerrota.idPais = Jogos.idPaisDerrota) AS Partida
		INNER JOIN Copa ON Partida.idCopa = Copa.idCopa
)
HAVING ano = MIN(ano)
-- Separados para substituir a 13
SELECT nomePais FROM (
		((Jogos
		INNER JOIN (Pais) AS pVitoria ON pVitoria.idPais = Jogos.idPaisVitoria)
		INNER JOIN (Pais) AS pDerrota ON pDerrota.idPais = Jogos.idPaisDerrota) AS Partida
		INNER JOIN Copa ON Partida.idCopa = Copa.idCopa
)
HAVING ano = MAX(ano)
 
-- 15-Mostra qual o país com mais vitórias
SELECT nomePais FROM (
		(Jogos INNER JOIN (Pais) AS pVitoria ON pVitoria.idPais = Jogos.idPaisVitoria)
)
GROUP BY idCopa
HAVING COUNT(idPaisVitoria) = (
		SELECT MAX(idP) FROM (
				SELECT COUNT(idPaisVitoria) AS idP FROM (
						(Jogos INNER JOIN (Pais) AS pVitoria ON pVitoria.idPais = Jogos.idPaisVitoria)
				)
				GROUP BY idCopa
		)
	   
-- 16-Mostrar a conf. que mais fizeram gols
SELECT nomePais FROM (
		(SELECT idPais, nomePais, resultadoVitoria FROM (
				Jogos INNER JOIN
				(Pais) AS pVitoria ON pVitoria.idPais = Jogos.idPaisVitoria
		) WHERE nomePais = "PAIS") AS p1
		FULL OUTER JOIN
		(SELECT idPais, nomePais, resultadoDerrota FROM (
				Jogos INNER JOIN
				(Pais) AS pDerrota ON pDerrota.idPais = Jogos.idPaisDerrota
		) WHERE nomePais = "PAIS") AS p2
		ON p1.idPais = p2.idPais
)
GROUP BY idPais, nomePais
HAVING SUM(p1.resultadoVitoria) + SUM(p2.resultadoDerrota) = (
		SELECT MAX(gols) FROM (
				SELECT nomePais, SUM(p1.resultadoVitoria) + SUM(p2.resultadoDerrota) FROM (
						(SELECT idPais, nomePais, resultadoVitoria FROM (
								Jogos INNER JOIN
								(Pais) AS pVitoria ON pVitoria.idPais = Jogos.idPaisVitoria
						) WHERE nomePais = "PAIS") AS p1
						FULL OUTER JOIN
						(SELECT idPais, nomePais, resultadoDerrota FROM (
								Jogos INNER JOIN
								(Pais) AS pDerrota ON pDerrota.idPais = Jogos.idPaisDerrota
						) WHERE nomePais = "PAIS") AS p2
						ON p1.idPais = p2.idPais
				)
				GROUP BY idPais, nomePais
		)
)
 
-- 17-Mostrar a final que rendeu mais gols
SELECT idPaisVitoria, resultadoVitoria, resultadoDerrota, idPaisDerrota FROM (
        Jogos
)
HAVING resultadoVitoria + resultadoDerrota = (
        SELECT MAX(lalala) FROM (
                SELECT (resultadoVitoria + resultadoDerrota) AS lalala FROM
                Jogos
        ) AS Y
)
-- 18-Mostrar a confederação que jogou mais partidas durante as copas do mundo
 
 
-- 19-Mostrar o país que mais jogou em finais
 
-- 20-Mostrar a partida que rendeu mais gols
SELECT idPaisVitoria, resultadoVitoria, resultadoDerrota, idPaisDerrota FROM (
        Jogos
) WHERE bitFinal = 1
HAVING resultadoVitoria + resultadoDerrota = (
        SELECT MAX(lalala) FROM (
                SELECT (resultadoVitoria + resultadoDerrota) AS lalala FROM
                Jogos
                        WHERE bitFinal = 1
        ) AS Y
)