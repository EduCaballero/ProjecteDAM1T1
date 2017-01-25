create database proyecto

create table ciudad (
id_ciudad int not null primary key,
nombre varchar(60) not null,
provincia varchar(45)) not null;

create table genero (
id_genero int not null primary key,
nombre varchar(45) not null);

create table usuario (
id_usuario int not null primary key,
nombre varchar(60) not null,
mail varchar(80) not null unique,
password varchar(24) not null,
tipo varchar(1) not null,
ciudad int not null,
telefono varchar(9),
web varchar(80),
imagen varchar(200),
constraint fk_usu_ciudad foreign key(ciudad) references ciudad(id_ciudad));

create table local (
id_local int not null primary key,
aforo int,
direccion varchar(60),
constraint fk_local_usu foreign key(id_local) references usuario(id_usuario));

create table musico (
id_musico int not null primary key,
n_componentes int,
genero int not null,
constraint fk_musico_gen foreign key (genero) references genero(id_genero),
constraint fk_musico_usu foreign key(id_musico) references usuario(id_usuario));

create table fan (
id_fan int not null primary key,
apellidos varchar(60),
sexo varchar(1),
fecha_nac date,
constraint fk_fan_usu foreign key(id_fan) references usuario(id_usuario));

create table concierto (
id_concierto int not null primary key,
dia date not null,
hora time not null,
pago decimal(6,2) not null,
local int not null,
genero int not null,
asignado bool not null,
constraint fk_conc_local foreign key(local) references usuario(id_usuario),
constraint fk_conc_genero foreign key(genero) references genero(id_genero));

create table propuesta (
concierto int not null,
musico int not null,
aceptado bool not null,
constraint pk_prop primary key(concierto,musico),
constraint fk_prop_conc foreign key (concierto) references concierto(id_concierto),
constraint fk_prop_musico foreign key (musico) references usuario(id_usuario));

create table voto_concierto (
fan int not null,
concierto int not null,
constraint pk_votoconc primary key(fan,concierto),
constraint fk_votoconc_fan foreign key(fan) references usuario(id_usuario),
constraint fk_votoconc_conc foreign key(concierto) references concierto(id_concierto));

create table voto_musico (
fan int not null,
musico int not null,
constraint pk_votomusic_musico primary key(fan,musico),
constraint fk_votomusic_fan foreign key(fan) references usuario(id_usuario),
constraint fk_votomusic_musico foreign key(musico) references usuario(id_usuario));



