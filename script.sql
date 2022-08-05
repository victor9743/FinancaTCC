create database financaTCC;

create table usuariosFinanca (
	id int primary key auto_increment,
    usuario varchar(50) not null,
    senha varchar(100) not null,
    email varchar(75) not null,
    ativo boolean
);

create table financas (
	id int primary key auto_increment,
    descricao varchar(100) not null,
    valor float not null,
    tipo int,
    dataFinanca date
);

ALTER TABLE financas ADD FOREIGN KEY (student_id) REFERENCES points(id);