USE ROLE ACCOUNTADMIN;
USE WAREHOUSE WH_CURSO_DATA_ENGINEERING;
USE DB29_BRONZE_DB;
use

-- Crear la tabla
CREATE OR REPLACE TABLE users (
    Nombre VARCHAR,
    DNI VARCHAR,
    email VARCHAR,
    fecha_alta_sistema TIMESTAMP
);

delete from users where DNI = '23456789B';

-- Insertar los valores
INSERT INTO users (Nombre, DNI, email, fecha_alta_sistema) VALUES
('Juan Perez', '12345678A', 'juan.perez@example.com', '2024-11-16 16:21:48'),
('Maria Lopez', '23456789B', 'maria.lopez@example.com', '2024-11-15 12:00:12'),
('Carlos Sanchez', '34567890C', 'carlos.sanchez@example.com', '2024-11-14 15:54:32'),
('Ana Garcia', '45678901D', 'ana.garcia@example.com', '2024-11-13 09:41:59'),
('Luis Martinez', '56789012E', 'luis.martinez@example.com', '2024-11-12 10:20:45'),
('Elena Torres', '67890123F', 'elena.torres@example.com', '2024-11-11 13:15:42'),
('Roberto Diaz', '78901234G', 'roberto.diaz@example.com', '2024-11-10 11:44:45'),
('Sofia Ramirez', '89012345H', 'sofia.ramirez@example.com', '2024-11-09 07:22:21'),
('Miguel Fernandez', '90123456I', 'miguel.fernandez@example.com', '2024-11-08 18:30:41'),
('Lucia Morales', '01234567J', 'lucia.morales@example.com', '2024-11-07 11:47:56');

UPDATE users
SET fecha_alta_sistema = CURRENT_TIMESTAMP()
WHERE DNI = '34567890C';

INSERT INTO USERS VALUES (
    'Nuevo Usuario Chachi', '99999999Z', 'nuevo.usuario@example.com', current_timestamp()
);

select * from DB29_SILVER_DB.snapshots.users_check_snp;

select * from DB29_SILVER_DB.google_sheet.users_timestamp_snp;