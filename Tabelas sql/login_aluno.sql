CREATE TABLE alunoLogin(

	nome VARCHAR(100),
	Matricula VARCHAR(80),
	nivel VARCHAR(60),
	turno VARCHAR(40),
	senha VARCHAR(250),
	ID INT PRIMARY KEY AUTO_INCREMENT
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE professorLogin(

	nome VARCHAR(100),
	email VARCHAR(100),
	MATRICULA VARCHAR(80),
	senha VARCHAR(250),
	ID INT PRIMARY KEY AUTO_INCREMENT
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
