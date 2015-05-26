USE salas;

-- Usuário
INSERT INTO usuario (login,senha) VALUES ('root','root');

-- Dias da semana
INSERT INTO dia_semana (nome_dia_semana) VALUES ('Domingo');
INSERT INTO dia_semana (nome_dia_semana) VALUES ('Segunda-feira');
INSERT INTO dia_semana (nome_dia_semana) VALUES ('Terca-feira');
INSERT INTO dia_semana (nome_dia_semana) VALUES ('Quarta-feira');
INSERT INTO dia_semana (nome_dia_semana) VALUES ('Quinta-feira');
INSERT INTO dia_semana (nome_dia_semana) VALUES ('Sexta-feira');
INSERT INTO dia_semana (nome_dia_semana) VALUES ('Sábado');

-- Pavilhão
INSERT INTO pavilhao (nome_pavilhao) VALUES ('pav1');
INSERT INTO pavilhao (nome_pavilhao) VALUES ('pav2');

-- Área
INSERT INTO area (nome_area,sigla_area) VALUES ('Sistemas Elétricos e Computacionias','SECOMP');

-- Tipo de sala
INSERT INTO categoria_sala (nome_categoria_sala) VALUES ('aula');
INSERT INTO categoria_sala (nome_categoria_sala) VALUES ('loboratório');
INSERT INTO categoria_sala (nome_categoria_sala) VALUES ('auditório');

-- Sala
INSERT INTO sala (id_pavilhao, numero_sala, capacidade_sala, id_categoria_sala) VALUES (1,103,60,1);
INSERT INTO sala (id_pavilhao, numero_sala, capacidade_sala, id_categoria_sala) VALUES (1,112,30,2);

-- Professor
INSERT INTO professor (siape_professor,id_area,tel_professor,nome_professor) VALUES ('123123',1,'36215555','Pagano');

-- Disciplina
INSERT INTO disciplina (cod_disciplina,nome_disciplina,carga_horaria_disciplina,id_area) VALUES ('cet150','PD I',68,1);
INSERT INTO disciplina (cod_disciplina,nome_disciplina,carga_horaria_disciplina,id_area) VALUES ('cet151','PD II',68,1);

-- Semestre
INSERT INTO semestre (nome_semestre) VALUES ('2014.2');
INSERT INTO semestre (nome_semestre) VALUES ('2015.1');

-- Turma
INSERT INTO turma (nome_turma,nome_semestre,siape_professor,cod_disciplina) VALUES ('T01','2014.2','123123','cet151');
INSERT INTO turma (nome_turma,nome_semestre,siape_professor,cod_disciplina) VALUES ('T03','2014.2','123123','cet150');
INSERT INTO turma (nome_turma,nome_semestre,siape_professor,cod_disciplina) VALUES ('T01','2014.2','123123','cet150');

-- Turma - Sala
INSERT INTO turma_sala (id_turma,id_sala) VALUES (1,1);
INSERT INTO turma_sala (id_turma,id_sala) VALUES (2,2);

-- Horário Turma
INSERT INTO horario_turma (id_dia_semana,horario_inicial,horario_final,id_turma_sala) VALUES (3,now(),now(),1);
INSERT INTO horario_turma (id_dia_semana,horario_inicial,horario_final,id_turma_sala) VALUES (3,now(),now(),2);

#=======================================
