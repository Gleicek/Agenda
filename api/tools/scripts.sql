CREATE TABLE usuarios (
	id INTEGER NOT NULL AUTO_INCREMENT,
    nome TEXT NOT NULL,
    mail TEXT NOT NULL,
    pass TEXT NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO usuarios (nome, mail, pass) VALUES ("jose","jose@mail.com", md5("123"));
INSERT INTO usuarios (nome, mail, pass) VALUES ("ana","ana@mail.com", md5("123"));
INSERT INTO usuarios (nome, mail, pass) VALUES ("jao","jao@mail.com", md5("123"));

CREATE TABLE contatos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    contato_id INTEGER NOT NULL,
    nome TEXT NOT NULL,
    tel TEXT NOT NULL,
    mail TEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (contato_id) REFERENCES usuarios(id)
);

INSERT INTO contatos (contato_id, nome, tel, mail) VALUES (1, "fernando", "991231", "fernando@mail.com");
INSERT INTO contatos (contato_id, nome, tel, mail) VALUES (1, "jorge", "991111", "jorge@mail.com");

INSERT INTO contatos (contato_id, nome, tel, mail) VALUES (2, "jorge", "991111", "jorge@mail.com");