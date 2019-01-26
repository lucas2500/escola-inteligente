
CREATE TABLE situacaoAluno(
	matricula VARCHAR(80),
	disciplina VARCHAR(40),
	situacao VARCHAR(30),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE exameFinal(
	matricula VARCHAR(80),
	disciplina VARCHAR(40),
	notaFinal VARCHAR(15),
	resultadoFinal VARCHAR(30),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


