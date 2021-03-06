DROP DATABASE IF EXISTS HOLTERDB; 

CREATE DATABASE IF NOT EXISTS holterdb DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE holterdb;

create table parametros(
	id_parametro int not null auto_increment,
	frecardiacamin int unsigned not null,
	frecardiacamax int unsigned not null,
	cantidadmediciones int unsigned not null,
	fecha_creacion datetime null,
	constraint pk_parametros_id_parametro primary key (id_parametro)
) comment='historial de datos simulados de la frecuencia mínima y máxima holter del paciente';

create table usuarios(
	id_usuario int not null auto_increment,
	nombres varchar(50) not null,
	apellidos varchar(50) not null,
	email varchar(100) not null,
	pass varchar(40) not null,
	tipo_usuario set('ADMIN','USER') default 'user' not null,
	creacion_usuario datetime not null,
	modificacion_usuario datetime null,
	constraint pk_usuarios_id_usuario primary key (id_usuario),
	constraint uk_usuarios_email unique (email)
) comment='contiene los usuarios que se loguean al sistema';

create table tipodocum (
	id_tipodocum int not null auto_increment,
	nombre varchar(50) not null,
	sigla varchar(10) not null,
	descripcion varchar(250) null,
	constraint pk_tipodocum_id primary key (id_tipodocum),
	constraint uk_tipodocum_nombre unique (nombre),
	constraint uk_tipodocum_sigla unique (sigla)
) comment='contiene los diferentes tipos de documentos por personas';

create table paciente(
	id_paciente int not null auto_increment,
	tipodocum_id_tipodocum int not null,
	documento varchar(15) not null,
	nombres varchar(50) not null,
	apellidos varchar(50) not null,
	fecha_nacimiento date not null,
	genero set('', 'M','F') default '' not null,
	telefono varchar(100) not null,
	celular varchar(100) not null,
	email varchar(100) not null,
	direccion varchar(100) not null,
	constraint pk_paciente_id_paciente primary key (id_paciente),
	constraint uk_paciente_tipodocum_documento unique (tipodocum_id_tipodocum, documento),
	constraint fk_paciente_tipodocum_id foreign key(tipodocum_id_tipodocum) references tipodocum(id_tipodocum)
) comment='contiene los diferentes tipos de documentos usado entre empresas y personas';

create table historiapaciente(
	paciente_id_paciente int not null,
	anomalia varchar(1000) not null,
	creacion_usuario datetime not null,
	modificacion_usuario datetime not null,
	constraint fk_historiapaciente_paciente_id_paciente foreign key(paciente_id_paciente) references paciente(id_paciente)
) comment='historia clínica del paciente';

create table medicionpaciente(
	id_medicionpaciente bigint not null auto_increment,
	paciente_id_paciente int not null,
	parametros_id_parametro int not null,
	frecuencia_min int not null,
	frecuencia_max int not null,
	fecha_inicio datetime not null,
	fecha_registro datetime not null,
	observacion varchar(500) not null,
	constraint pk_paciente_id_medicionpaciente primary key (id_medicionpaciente),
	constraint uk_paciente_medicionpaciente unique (paciente_id_paciente, fecha_inicio),
	constraint fk_medicionpaciente_paciente_id_paciente foreign key(paciente_id_paciente) references paciente(id_paciente),
	constraint fk_medicionpaciente_paciente_id_parametro foreign key(parametros_id_parametro) references parametros(id_parametro)
) comment='historial de mediciones de holter del paciente';

create table recuperarpass(
	token varchar (60) not null,
	id_usuario int not null,
	estado_token set ('ACT','INA', 'VEN') not null,
	fecha_creacion datetime not null,
	constraint pk_recuperarpass_token primary key (token),
	constraint fk_recuperarpass_usuario_id_usuario foreign key(id_usuario) references usuarios(id_usuario)
) comment='Token password usuario';


INSERT INTO tipodocum (nombre, sigla, descripcion) VALUES
('CÉDULA', 'CC', 'CÉDULA DE CIUDADANÍA'), 
('TARJETA DE IDENTIDAD', 'TI', 'TARJETA DE IDENTIDAD');

INSERT INTO usuarios (nombres, apellidos, email, pass, tipo_usuario, creacion_usuario) VALUES 
('JUAN', 'NARANJO', 'juan.n.elisalde@gmail.com', SHA1('1234'), 'ADMIN', '2017-08-17 00:00:00'),
('ALEJANDRO', 'CASTIBLANCO', 'mc.alejo16@gmail.com', SHA1('1234'), 'ADMIN', NOW()),
('ADMIN', 'GRUPO INSIGHT', 'grupoinsight2025@yahoo.es', SHA1('GrupoInsight2017'), 'ADMIN', NOW());


INSERT INTO paciente (tipodocum_id_tipodocum, documento, nombres, apellidos, fecha_nacimiento, genero, telefono, celular, email, direccion)
VALUES (1, "123456789", "PACIENTE", "PRUEBA","1993-01-01", "M", "1234567", "3132122866", "pruebas@gmail.com", "Calle falsa 123");

INSERT INTO parametros (frecardiacamin, frecardiacamax, cantidadmediciones, fecha_creacion) VALUES 
('40', '180', '21', NOW());  