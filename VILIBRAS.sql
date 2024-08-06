DROP DATABASE VILIBRAS;

CREATE DATABASE VILIBRAS;

USE VILIBRAS;

CREATE TABLE aulas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    resumo TEXT,
    iframe TEXT NOT NULL
);

CREATE TABLE professores(
id_prof INT PRIMARY KEY AUTO_INCREMENT,
cpf VARCHAR(13) UNIQUE NOT NULL,
idade INT NOT NULL,
sexo VARCHAR(10) NOT NULL,
e_mail VARCHAR(40) NOT NULL,
nome VARCHAR(40) NOT NULL);

CREATE TABLE usuario (
id_usuario INT PRIMARY KEY AUTO_INCREMENT,
email VARCHAR(100) UNIQUE NOT NULL,
senha VARCHAR(255) NOT NULL,
nome VARCHAR(100) NOT NULL,
path_img VARCHAR(200),
reset_token VARCHAR(255),
reset_expiration DATETIME
);

CREATE TABLE administrador(
id_adm INT PRIMARY KEY AUTO_INCREMENT,
email VARCHAR(100) UNIQUE NOT NULL,
senha VARCHAR(255) NOT NULL
);

CREATE TABLE questoes (
	id_questao INT PRIMARY KEY AUTO_INCREMENT,
	test VARCHAR(1000) NOT NULL,
	content VARCHAR(1000) NOT NULL,
	year VARCHAR(10) NOT NULL,
	title VARCHAR(1000) NOT NULL,
	answer_A VARCHAR(1000) NOT NULL,
	answer_B VARCHAR(1000) NOT NULL,
	answer_C VARCHAR(1000) NOT NULL,
	answer_D VARCHAR(1000) NOT NULL,
	answer_E VARCHAR(1000) NOT NULL,
	correct CHAR(1) NOT NULL,
	id_acertou INT
);

CREATE TABLE acertou_questao (
	id_acertou INT PRIMARY KEY AUTO_INCREMENT,
	acertou VARCHAR(20) NOT NULL,
	email_user VARCHAR(255),
	id_questao INT,
	FOREIGN KEY (id_questao) REFERENCES questoes(id_questao)
);

CREATE TABLE dicionario_sinais(
id_dicio VARCHAR(50) PRIMARY KEY);

CREATE TABLE hardware(
id_elemento VARCHAR(50) PRIMARY KEY,
titulo VARCHAR (50) NOT NULL,
descricao TEXT NOT NULL,
src TEXT NOT NULL,
width TEXT NOT NULL,
height TEXT NOT NULL,
title TEXT NOT NULL,
id_dicio VARCHAR(50),
FOREIGN KEY (id_dicio) REFERENCES dicionario_sinais(id_dicio));

CREATE TABLE software(
id_elemento VARCHAR(50) PRIMARY KEY,
titulo VARCHAR (50) NOT NULL,
descricao TEXT NOT NULL,
src TEXT NOT NULL,
width TEXT NOT NULL,
height TEXT NOT NULL,
title TEXT NOT NULL,
id_dicio VARCHAR(50),
FOREIGN KEY (id_dicio) REFERENCES dicionario_sinais(id_dicio));

CREATE TABLE conectividades(
id_elemento VARCHAR(50) PRIMARY KEY,
titulo VARCHAR (50) NOT NULL,
descricao TEXT NOT NULL,
src TEXT NOT NULL,
width TEXT NOT NULL,
height TEXT NOT NULL,
title TEXT NOT NULL,
id_dicio VARCHAR(50),
FOREIGN KEY (id_dicio) REFERENCES dicionario_sinais(id_dicio));

CREATE TABLE armazenamento_dados(
id_elemento VARCHAR(50) PRIMARY KEY,
titulo VARCHAR (50) NOT NULL,
descricao TEXT NOT NULL,
src TEXT NOT NULL,
width TEXT NOT NULL,
height TEXT NOT NULL,
title TEXT NOT NULL,
id_dicio VARCHAR(50),
FOREIGN KEY (id_dicio) REFERENCES dicionario_sinais(id_dicio));

CREATE TABLE feedback(
id_feedback INT PRIMARY KEY AUTO_INCREMENT,
titulo TEXT NOT NULL,
descricao TEXT NOT NULL,
data_dia DATE NOT NULL,
resposta TEXT,
id_usuario INT);