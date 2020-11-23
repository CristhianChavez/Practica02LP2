create database	idiomas ;
use idiomas;


create table estudiante (
 id int(7) NOT NULL,
 nombre varchar(120) NOT NULL,
 email varchar(120) NOT NULL,
 constraint pk_estudiante primary key(id)
);


create table profesor (
    id INT(7) NOT NULL,
    nombre VARCHAR(120) NOT NULL,
    idioma VARCHAR(60) NOT NULL,
    constraint pk_profesor primary key(id)
);

create table programacion (
  id int(7) NOT NULL,
  inicio varchar(12) NOT NULL,
  tipo varchar(7) NOT NULL,
  id_profesor int(7) NOT NULL,
  constraint pk_programacion primary key(id),
  constraint fk_programacion_profesor foreign key (id_profesor) references profesor (id)

  );
  
  
  create table leccion (
  numero int(3) NOT NULL,
  statuss varchar(20) NOT NULL,
  comntario_profesor text DEFAULT NULL,
  comentario_estudiantes text DEFAULT NULL,
  id_estudiante int(7) NOT NULL,
  id_programacion int(7) NOT NULL,
  constraint pk_leccion primary key(numero),
 constraint fk_leccion_estudiante foreign key (id_estudiante) references estudiante (id),
 constraint fk_leccion_programacion foreign key (id_programacion) references programacion (id)
);
