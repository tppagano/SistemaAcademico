SELECT t.nome_turma, t.nome_semestre 
	   ,d.cod_disciplina, d.nome_disciplina, d.carga_horaria_disciplina 
	   ,p.siape_professor,p.nome_professor, p.tel_professor
	   ,a.nome_area, a.sigla_area
	   ,s.numero_sala
	   ,pv.nome_pavilhao
     ,ht.horario, ht.data_horario_turma
					   FROM turma t  
					   JOIN disciplina d ON t.cod_disciplina = d.cod_disciplina
					   JOIN professor p ON p.siape_professor = p.siape_professor
					   JOIN area a ON a.id_area = d.id_area
					   JOIN turma_sala ts ON ts.id_turma = t.id_turma
					   JOIN sala s ON s.id_sala = ts.id_sala
					   JOIN pavilhao pv ON pv.id_pavilhao = s.id_pavilhao
					   JOIN horario_turma ht ON ht.id_horario_turma = ts.id_horario_turma