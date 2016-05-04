CREATE DATABASE OLIMPIADAS2016 CHARACTER SET utf8 COLLATE utf8_general_ci;
USE OLIMPIADAS2016;

CREATE TABLE Endereco (codEndereco INT NOT NULL AUTO_INCREMENT, logradouro varchar(100), numero varchar (10), bairro varchar(100), cidade varchar(100), siglaEstado varchar(2), PRIMARY KEY (codEndereco));

CREATE TABLE Usuario (codUsuario INT NOT NULL AUTO_INCREMENT, nome VARCHAR(100), codEndereco int, senha VARCHAR(8), perfil varchar(15), cpf VARCHAR(14), dataNasc date, email varchar(100),  PRIMARY KEY (codUsuario), FOREIGN KEY (codEndereco) REFERENCES Endereco(codEndereco));

CREATE TABLE Evento (codEvento INT NOT NULL AUTO_INCREMENT, nome VARCHAR(50), modalidade varchar(100), codEndereco int, dataInicio datetime, dataFim datetime, qtdIngressos int, valor decimal(10,2), PRIMARY KEY (codEvento), FOREIGN KEY (codEndereco) REFERENCES Endereco(codEndereco));

CREATE TABLE Ingresso (codIngresso INT NOT NULL AUTO_INCREMENT, codUsuario int, codEvento int, qtdIngressos int, valorTotal decimal(10,2), PRIMARY KEY (codIngresso), FOREIGN KEY (codEvento) REFERENCES Evento(codEvento), FOREIGN KEY (codUsuario) REFERENCES Usuario(codUsuario));



