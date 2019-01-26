CREATE TABLE arquivo(

	nome VARCHAR(100),
	proprietario VARCHAR(40),
	ID INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE arquivoFotos(

	matricula VARCHAR(50),
	fotoAluno VARCHAR(120),
	ID INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE historico(

	escola VARCHAR(100),
	nome VARCHAR(100),
	Matricula VARCHAR(40),
	serie VARCHAR(40),
	materia VARCHAR(40),
	nivel VARCHAR(40),
	mediaGlobal VARCHAR(15),
	ID INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE arquivosAluno(

	discArquivo VARCHAR(80),
	turmaArquivo VARCHAR(50),
	matProfessor VARCHAR(80),
	anexoArquivo VARCHAR(180),
	ID INT PRIMARY KEY AUTO_INCREMENT

);

