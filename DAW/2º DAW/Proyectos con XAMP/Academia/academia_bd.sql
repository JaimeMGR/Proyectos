CREATE TABLE asignaturas (
  id_asignatura int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_asignatura varchar(100) DEFAULT NULL,
  creditos int(11) DEFAULT NULL
);

INSERT INTO asignaturas (id_asignatura, nombre_asignatura, creditos) VALUES
(1, 'Bases de datos', 15),
(2, 'Redes de computadoras', 20),
(3, 'Sistemas operativos', 25),
(4, 'Matematicas', 65),
(5, 'Ingles B1', 10),
(6, 'ingles B2', 20),
(7, 'Frances B1', 10),
(8, 'Frances B2', 20),
(9, 'Programacion en Java', 20),
(10, 'Programacion en Python', 40),
(11, 'Aleman B1', 10),
(12, 'Aleman B2', 20),
(13, 'Bases de datos avanzadas', 15);