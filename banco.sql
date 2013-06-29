
CREATE DATABASE radiosenai;

USE radiosenai;

CREATE TABLE integrantes(
    id int not null auto_increment primary key,
    imagem varchar(500),
    nome varchar(40),
    descricao varchar(500)
);

CREATE TABLE pedidos(
    id int not null auto_increment primary key,
    nome varchar(40) not null,
    musica varchar(40) not null,
    artista varchar(40),
    recado varchar(400) not null
);

CREATE TABLE paginas(
    id int not null auto_increment primary key,
    nome varchar(20) not null,
    conteudo varchar(10000) not null
);