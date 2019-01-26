CREATE TABLE professor(

	nome VARCHAR (100),
	dataNasc VARCHAR(15),
	naturalidade VARCHAR(20),
	nacionalidade VARCHAR(20),
	formacao VARCHAR(250),
	email VARCHAR(120),
	telefone VARCHAR(25),
	celular VARCHAR(25),
	materia1 VARCHAR(40),
	materia2 VARCHAR(40),
	materia3 VARCHAR(40),
	sexo VARCHAR(15),
	estadoCivil VARCHAR(35),
	rg VARCHAR(50),
	orgExped VARCHAR(65),
	dataExped VARCHAR(15),
	cpf VARCHAR(20),
	rua VARCHAR(100),
	bairro VARCHAR(50),
	cidade VARCHAR(50),
	cep VARCHAR(30),
	numero VARCHAR(15),
	estado VARCHAR(15),
	observacoes VARCHAR(300),
	MATRICULA VARCHAR(80),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE alunoFundamentalManha (

	nome VARCHAR (100),
	dataNasc VARCHAR(15),
	naturalidade VARCHAR(20),
	nacionalidade VARCHAR(20),
	nomeMae VARCHAR(100),
	nomePai VARCHAR(100),
	email VARCHAR(120),
	telefone VARCHAR(25),
	celular VARCHAR(25),
	celular2 VARCHAR(25),
	sexo VARCHAR(15),
	nivel VARCHAR(15),
	turno VARCHAR(15),
	rg VARCHAR(50),
	orgExped VARCHAR(65),
	dataExped VARCHAR(15),
	cpf VARCHAR(20),
	rua VARCHAR(100),
	bairro VARCHAR(50),
	cidade VARCHAR(50),
	cep VARCHAR(30),
	numero VARCHAR(15),
	estado VARCHAR(15),
	observacoes VARCHAR(300),
	Matricula VARCHAR(80),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE alunoFundamentalTarde (

	nome VARCHAR (100),
	dataNasc VARCHAR(15),
	naturalidade VARCHAR(20),
	nacionalidade VARCHAR(20),
	nomeMae VARCHAR(100),
	nomePai VARCHAR(100),
	email VARCHAR(120),
	telefone VARCHAR(25),
	celular VARCHAR(25),
	celular2 VARCHAR(25),
	sexo VARCHAR(15),
	nivel VARCHAR(15),
	turno VARCHAR(15),
	rg VARCHAR(50),
	orgExped VARCHAR(65),
	dataExped VARCHAR(15),
	cpf VARCHAR(20),
	rua VARCHAR(100),
	bairro VARCHAR(50),
	cidade VARCHAR(50),
	cep VARCHAR(30),
	numero VARCHAR(15),
	estado VARCHAR(15),
	observacoes VARCHAR(300),
	Matricula VARCHAR(80),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE alunoMedioManha (

	nome VARCHAR (100),
	dataNasc VARCHAR(15),
	naturalidade VARCHAR(20),
	nacionalidade VARCHAR(20),
	nomeMae VARCHAR(100),
	nomePai VARCHAR(100),
	email VARCHAR(120),
	telefone VARCHAR(25),
	celular VARCHAR(25),
	celular2 VARCHAR(25),
	sexo VARCHAR(15),
	nivel VARCHAR(15),
	turno VARCHAR(15),
	rg VARCHAR(50),
	orgExped VARCHAR(65),
	dataExped VARCHAR(15),
	cpf VARCHAR(20),
	rua VARCHAR(100),
	bairro VARCHAR(50),
	cidade VARCHAR(50),
	cep VARCHAR(30),
	numero VARCHAR(15),
	estado VARCHAR(15),
	observacoes VARCHAR(300),
	Matricula VARCHAR(80),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE alunoMedioTarde (

	nome VARCHAR (100),
	dataNasc VARCHAR(15),
	naturalidade VARCHAR(20),
	nacionalidade VARCHAR(20),
	nomeMae VARCHAR(100),
	nomePai VARCHAR(100),
	email VARCHAR(120),
	telefone VARCHAR(25),
	celular VARCHAR(25),
	celular2 VARCHAR(25),
	sexo VARCHAR(15),
	nivel VARCHAR(15),
	turno VARCHAR(15),
	rg VARCHAR(50),
	orgExped VARCHAR(65),
	dataExped VARCHAR(15),
	cpf VARCHAR(20),
	rua VARCHAR(100),
	bairro VARCHAR(50),
	cidade VARCHAR(50),
	cep VARCHAR(30),
	numero VARCHAR(15),
	estado VARCHAR(15),
	observacoes VARCHAR(300),
	Matricula VARCHAR(80),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE turmaFundamentalManha(

	nome VARCHAR(20),
	turno VARCHAR(15),
	codigo VARCHAR(50),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE turmaFundamentalTarde(

	nome VARCHAR(20),
	turno VARCHAR(15),
	codigo VARCHAR(50),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE turmaMedioManha(

	nome VARCHAR(20),
	turno VARCHAR(15),
	codigo VARCHAR(50),
	ID INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE turmaMedioTarde(

	nome VARCHAR(20),
	turno VARCHAR(15),
	codigo VARCHAR(50),
	ID INT PRIMARY KEY AUTO_INCREMENT
);
