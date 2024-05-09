DROP DATABASE VILIBRAS;

CREATE DATABASE VILIBRAS;

USE VILIBRAS;

CREATE TABLE alunos(
id_aluno INT PRIMARY KEY AUTO_INCREMENT,
cpf VARCHAR(13) UNIQUE NOT NULL,
idade INT NOT NULL,
nome VARCHAR(40) NOT NULL,
sexo VARCHAR (10) NOT NULL,
e_mail VARCHAR(40) NOT NULL);

CREATE TABLE professores(
id_prof INT PRIMARY KEY AUTO_INCREMENT,
cpf VARCHAR(13) UNIQUE NOT NULL,
idade INT NOT NULL,
sexo VARCHAR(10) NOT NULL,
e_mail VARCHAR(40) NOT NULL,
nome VARCHAR(40) NOT NULL);

CREATE TABLE acertou_questao (
	id_acertou INT PRIMARY KEY AUTO_INCREMENT,
	acertou BOOLEAN DEFAULT false

);

CREATE TABLE IF NOT EXISTS questoes (
	id_questao INT PRIMARY KEY AUTO_INCREMENT,
	test VARCHAR(1000) NOT NULL DEFAULT 'VILIBRAS',
	content VARCHAR(1000) NOT NULL DEFAULT 'Informática',
	year VARCHAR(10) NOT NULL DEFAULT '2024',
	title VARCHAR(1000) NOT NULL,
	answer_A VARCHAR(1000) NOT NULL,
	answer_B VARCHAR(1000) NOT NULL,
	answer_C VARCHAR(1000) NOT NULL,
	answer_D VARCHAR(1000) NOT NULL,
	answer_E VARCHAR(1000) NOT NULL,
	correct CHAR(1) NOT NULL,
	id_acertou INT,
	CONSTRAINT fk_AcertouQuestao FOREIGN KEY (id_acertou) REFERENCES acertou_questao (id_acertou)
);

CREATE TABLE desafios(
id_desafio INT PRIMARY KEY NOT NULL,
tipo_desafio VARCHAR(40) NOT NULL,
conteudo VARCHAR(50) NOT NULL);

CREATE TABLE dicionario_sinais(
id_dicio INT PRIMARY KEY AUTO_INCREMENT,
titulo VARCHAR (50) NOT NULL,
iframe TEXT NOT NULL,
descricao TEXT NOT NULL);

CREATE TABLE tipo_material(
id_tipo INT PRIMARY KEY AUTO_INCREMENT,
conteudo VARCHAR(40));

CREATE TABLE feedback(
id_feedback INT PRIMARY KEY AUTO_INCREMENT,
texto VARCHAR(200) NOT NULL);

CREATE TABLE material(
id_material INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(40) NOT NULL,
id_dicio INT,
FOREIGN KEY (id_dicio) REFERENCES dicionario_sinais(id_dicio));

CREATE TABLE insere_materais(
id_material INT,
id_prof INT,
PRIMARY KEY (id_material, id_prof),
FOREIGN KEY (id_material) REFERENCES material(id_material),
FOREIGN KEY (id_prof) REFERENCES professores(id_prof));

CREATE TABLE acessa_dicio_prof(
id_prof INT,
id_dicio INT, 
PRIMARY KEY (id_prof,id_dicio),
FOREIGN KEY (id_dicio) REFERENCES dicionario_sinais(id_dicio),
FOREIGN KEY (id_prof) REFERENCES professores(id_prof));

CREATE TABLE acessa_materias(
id_material INT,
id_aluno INT,
PRIMARY KEY (id_material,id_aluno),
FOREIGN KEY (id_material) REFERENCES material (id_material),
FOREIGN KEY (id_aluno) REFERENCES alunos(id_aluno));

CREATE TABLE acessa_dicio_aluno(
id_dicio INT,
id_aluno INT,
PRIMARY KEY(id_dicio,id_aluno),
FOREIGN KEY (id_aluno) REFERENCES alunos(id_aluno),
FOREIGN KEY (id_dicio) REFERENCES dicionario_sinais (id_dicio));

CREATE TABLE acessa_desafios(
id_desafio INT,
id_aluno INT,
PRIMARY KEY (id_desafio, id_aluno),
FOREIGN KEY (id_desafio) REFERENCES desafios(id_desafio),
FOREIGN KEY (id_aluno) REFERENCES alunos (id_aluno));

CREATE TABLE insere_desafios(
id_prof INT,
id_desafio INT,
PRIMARY KEY (id_prof, id_desafio),
FOREIGN KEY (id_prof) REFERENCES professores(id_prof),
FOREIGN KEY (id_desafio) REFERENCES desafios (id_desafio));

CREATE TABLE efetua_feedback(
id_aluno INT,
id_feedback INT,
PRIMARY KEY (id_aluno,id_feedback),
FOREIGN KEY (id_aluno) REFERENCES alunos (id_aluno),
FOREIGN KEY (id_feedback) REFERENCES feedback (id_feedback));

CREATE TABLE endereco_aluno(
endereco_PK INT PRIMARY KEY AUTO_INCREMENT,
rua VARCHAR (100) NOT NULL,
bairro VARCHAR (100) NOT NULL,
cidade VARCHAR (100) NOT NULL,
id_aluno_FK INT,
FOREIGN KEY (id_aluno_FK) REFERENCES alunos (id_aluno));

CREATE TABLE telefone_aluno(
telefone_PK INT PRIMARY KEY AUTO_INCREMENT,
telefone VARCHAR (10) NOT NULL,
id_aluno_FK INT,
FOREIGN KEY (id_aluno_FK) REFERENCES alunos (id_aluno));

CREATE TABLE endereco_prof(
endereco_PK INT PRIMARY KEY AUTO_INCREMENT,
rua VARCHAR (100) NOT NULL,
bairro VARCHAR (100) NOT NULL,
cidade VARCHAR (100) NOT NULL,
id_prof_FK INT,
FOREIGN KEY (id_prof_FK) REFERENCES professores (id_prof));

CREATE TABLE telefone_prof(
telefone_PK INT PRIMARY KEY AUTO_INCREMENT,
telefone VARCHAR (10) NOT NULL,
id_prof_FK INT,
FOREIGN KEY (id_prof_FK) REFERENCES professores (id_prof));

CREATE TABLE ADM(
id_adm INT PRIMARY KEY AUTO_INCREMENT,
cpf VARCHAR(13) UNIQUE NOT NULL,
idade INT NOT NULL,
sexo VARCHAR(10) NOT NULL,
e_mail VARCHAR(40) NOT NULL,
nome VARCHAR(40) NOT NULL);

CREATE TABLE endereco_ADM(
endereco_PK INT PRIMARY KEY AUTO_INCREMENT,
rua VARCHAR (100) NOT NULL,
bairro VARCHAR (100) NOT NULL,
cidade VARCHAR (100) NOT NULL,
id_adm_FK INT,
FOREIGN KEY (id_adm_FK) REFERENCES ADM (id_adm));

CREATE TABLE telefone_ADM(
telefone_PK INT PRIMARY KEY AUTO_INCREMENT,
telefone VARCHAR (10) NOT NULL,
id_adm_FK INT,
FOREIGN KEY (id_adm_FK) REFERENCES ADM (id_adm));