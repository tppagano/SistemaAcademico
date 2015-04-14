create DATABASE salas;
use salas;

CREATE TABLE pavilhao (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30),
    CONSTRAINT pk_pavilhao PRIMARY KEY (id)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE area (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30),
    sigla VARCHAR(10),
    CONSTRAINT pk_salas PRIMARY KEY (id)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE categoria_sala (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30),
    CONSTRAINT pk_categoria_sala PRIMARY KEY (id)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE sala (
    id INTEGER NOT NULL AUTO_INCREMENT,
    id_pavilhao INT,
    numero INT,
    capacidade INT,
    id_categoria INT,
    CONSTRAINT pk_salas PRIMARY KEY (id),
    CONSTRAINT fk_pavilhao FOREIGN KEY (id_pavilhao) REFERENCES pavilhao (id),
    CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES categoria_sala (id)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;



CREATE TABLE professor (
    siape INTEGER NOT NULL AUTO_INCREMENT,
    id_area INTEGER,
    tel VARCHAR(10),
    nome VARCHAR(100),
    CONSTRAINT pk_professor PRIMARY KEY (siape),
    CONSTRAINT fk_area FOREIGN KEY (id_area) REFERENCES area (id)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE disciplina (
    cod INTEGER NOT NULL,
    nome INTEGER,
    carga_horaria FLOAT,
    semestre INT,
    CONSTRAINT pk_disciplina PRIMARY KEY (cod)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE professor (
    siape INTEGER NOT NULL AUTO_INCREMENT,
    id_area INTEGER,
    tel VARCHAR(10),
    nome VARCHAR(100),
    CONSTRAINT pk_professor PRIMARY KEY (siape),
    CONSTRAINT fk_area FOREIGN KEY (id_area) REFERENCES area (id)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE usuario (
    login VARCHAR(20) NOT NULL,
    senha VARCHAR(200),
    CONSTRAINT pk_professor PRIMARY KEY (login)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO usuario (login,senha) VALUES ('u1','senha');
select login,senha from usuario where login = "u1" and senha = "senha";

select * from sala;


INSERT INTO pavilhao (nome) VALUES ('pv')
