CREATE  DATABASE IF NOT EXISTS salas;

USE salas;

CREATE TABLE pavilhao (
    id_pavilhao INT NOT NULL AUTO_INCREMENT,
    nome_pavilhao VARCHAR(30),
    PRIMARY KEY (id_pavilhao)
);  

CREATE TABLE area (
    id_area INT NOT NULL AUTO_INCREMENT,
    nome_area VARCHAR(30) NOT NULL,
    sigla_area VARCHAR(10) NOT NULL,
    PRIMARY KEY (id_area)
);

CREATE TABLE categoria_sala (
    id_categoria_sala INT NOT NULL AUTO_INCREMENT, 
    nome_categoria_sala VARCHAR(30),
    PRIMARY KEY (id_categoria_sala)
);
CREATE TABLE sala (
    id_sala INT NOT NULL AUTO_INCREMENT,
    id_pavilhao INT NOT NULL,
    numero_sala INT NOT NULL,
    capacidade_sala INT NOT NULL,
    id_categoria_sala INT NOT NULL,
    PRIMARY KEY (id_sala),
    FOREIGN KEY (id_pavilhao) REFERENCES pavilhao (id_pavilhao),
    FOREIGN KEY (id_categoria_sala) REFERENCES categoria_sala (id_categoria_sala)
);



CREATE TABLE professor (
    siape_professor VARCHAR (30) NOT NULL,
    id_area INT NOT NULL,
    tel_professor VARCHAR(10),
    nome_professor VARCHAR(100) NOT NULL,
    PRIMARY KEY (siape_professor),
    FOREIGN KEY (id_area) REFERENCES area (id_area)
);


CREATE TABLE disciplina (
    cod_disciplina VARCHAR(10) NOT NULL,
    nome_disciplina VARCHAR(30) NOT NULL,
    carga_horaria_disciplina FLOAT NOT NULL,
    id_area INT NOT NULL,
    PRIMARY KEY (cod_disciplina),
    FOREIGN KEY (id_area) REFERENCES area (id_area)
);


CREATE TABLE semestre (
	nome_semestre VARCHAR(10) NOT NULL,
	primary key(nome_semestre)
);


CREATE TABLE turma(
	id_turma INT NOT NULL AUTO_INCREMENT,
	nome_turma VARCHAR(20),
	nome_semestre VARCHAR (10) NOT NULL,
	siape_professor VARCHAR (30) NOT NULL,
	cod_disciplina VARCHAR(10) NOT NULL,
	PRIMARY KEY(id_turma),
	FOREIGN KEY (nome_semestre) REFERENCES semestre (nome_semestre),
	FOREIGN KEY (siape_professor) REFERENCES professor (siape_professor),
	FOREIGN KEY (cod_disciplina) REFERENCES disciplina (cod_disciplina)
);


CREATE TABLE dia_semana(
	id_dia_semana INT NOT NULL AUTO_INCREMENT,
	nome_dia_semana VARCHAR(15) NOT NULL,
	primary key(id_dia_semana)
);

CREATE TABLE turma_sala(
	id_turma_sala int not null auto_increment,
	id_turma int not null,
	id_sala int not null,
	primary key(id_turma_sala),
	foreign key(id_turma) references turma (id_turma),
	foreign key(id_sala) references sala (id_sala)
);

CREATE TABLE horario_turma(
	id_horario_turma int not null auto_increment,
	id_dia_semana INT NOT NULL,
	horario_inicial TIME not null,
	horario_final TIME not null,
	id_turma_sala int not null,
	primary key(id_horario_turma),
	foreign key(id_dia_semana) REFERENCES dia_semana (id_dia_semana),
	foreign key(id_turma_sala) REFERENCES turma_sala (id_turma_sala)
);

CREATE TABLE `usuario` (
  `login` varchar(20) NOT NULL,
  `senha` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


source insert.sql
