create database pedroselvate_atividade;
use pedroselvate_atividade;

CREATE TABLE IF NOT EXISTS usuarios(
    usuario_id INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(250) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    PRIMARY KEY(usuario_id)
);

CREATE TABLE IF NOT EXISTS tarefas(
	tarefa_id INT NOT NULL AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    nome VARCHAR(250) NOT NULL,
    PRIMARY KEY(tarefa_id),
    FOREIGN KEY(usuario_id) REFERENCES usuarios(usuario_id)
);