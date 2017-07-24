drop database if exists holterdb;

create database if not exists `holterdb` default character set utf8 collate utf8_general_ci;

use `holterdb`;

create table parametros(
	id_parametro int not null auto_increment,
	frecardiacamin int unsigned not null,
	frecardiacamax int unsigned not null,
	fecha_creacion datetime null,
	constraint pk_parametros_id_parametro primary key (id_parametro)
) comment='historial de datos simulados de la frecuencia mínima y máxima holter del paciente';

create table usuarios(
	id_usuario int not null auto_increment,
	nombres varchar(100) not null,
	apellidos varchar(100) not null,
	email varchar(100) not null,
	pass varchar(40) not null,
	tipo_usuario SET('ADMIN','USER') DEFAULT 'USER' NOT NULL,
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
	documento int not null,
	nombres varchar(100) not null,
	apellidos varchar(100) not null,
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
	paciente_id_usuario int not null,
	anomalia varchar(1000) not null,
	creacion_usuario datetime not null,
	modificacion_usuario datetime not null,
	constraint fk_historiapaciente_paciente_id_usuario foreign key(paciente_id_usuario) references paciente(id_paciente)
) comment='historia clínica del paciente';

create table medicionpaciente(
	id_medicionpaciente bigint not null auto_increment,
	paciente_id_usuario int not null,
	fecha_registro date not null,
	frecuencia_min int not null,
	frecuencia_max int not null,
	cantidad_cuadros int null,
	fecha_creacion datetime not null,
	constraint pk_paciente_id_medicionpaciente primary key (id_medicionpaciente),
	constraint uk_paciente_medicionpaciente unique (id_medicionpaciente),
	constraint fk_medicionpaciente_paciente_id_usuario foreign key(paciente_id_usuario) references paciente(id_paciente)
) comment='historial de mediciones de holter del paciente';

create table histomedpac(
	histomedpac_id_medicionpaciente bigint not null,
	frecardiaca int unsigned not null,
	ordenfrecuencia int not null,
	horafrecuencia time null,
	constraint uk_paciente_medicionpaciente unique (histomedpac_id_medicionpaciente)
) comment='historial de datos simulados de la frecuencia mínima y máxima holter del paciente';

INSERT INTO tipodocum (nombre, sigla, descripcion) VALUES
("CEDULA", "CC", "CEDULA"),
("TARJETA DE IDENTIDAD", "TI", "TARJETA DE IDENTIDAD"),
("TARJETA EXTRAJERA", "TE", "TARJETA EXTRAJERA");
