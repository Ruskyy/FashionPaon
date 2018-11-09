/*PROC LOGIN*/
DELIMITER ;;
CREATE PROCEDURE IF NOT EXISTS usp_login(
  IN username varchar(20),
  IN password varchar(50)
)
BEGIN
SELECT cliente_id, cliente_tipo, cliente_username, cliente_nome, cliente_apelido, cliente_datanasc, cliente_morada, cliente_codigopostal, cliente_idpais, cliente_nif, cliente_tele, cliente_email, cliente_img_path
FROM cliente WHERE cliente_username like username AND cliente_password like password;
END;;

/*PROC REGISTO CLIENTE*/
DELIMITER ;;
CREATE PROCEDURE IF NOT EXISTS usp_register_user(
  IN username varchar(20),
  IN password varchar(50),
  IN nome varchar(20),
  IN apelido varchar(20),
  IN datanasc date,
  IN morada varchar(100),
  IN codigopostal varchar(11),
  IN idpais int,
  IN nif int,
  IN tele int,
  IN email varchar(100),
  IN img varchar(10000)
)
BEGIN
INSERT INTO cliente (cliente_username,cliente_password,cliente_nome,cliente_apelido,cliente_datanasc,cliente_morada,cliente_codigopostal,cliente_idpais,cliente_nif,cliente_tele,cliente_email,cliente_tipo,cliente_img_path)
  VALUES (username,password,nome,apelido,datanasc,morada,codigopostal,idpais,nif,tele,email,0,img);
END;;

/*PROC REGISTO ADMIn*/
DELIMITER ;;
CREATE PROCEDURE IF NOT EXISTS usp_register_admin(
  IN username varchar(20),
  IN password varchar(50),
  IN nome varchar(20),
  IN apelido varchar(20),
  IN datanasc date,
  IN morada varchar(100),
  IN codigopostal varchar(11),
  IN idpais int,
  IN nif int,
  IN tele int,
  IN email varchar(100),
  IN img varchar(10000)
)
BEGIN
INSERT INTO cliente (cliente_username,cliente_password,cliente_nome,cliente_apelido,cliente_datanasc,cliente_morada,cliente_codigopostal,cliente_idpais,cliente_nif,cliente_tele,cliente_email,cliente_tipo,cliente_img_path)
  VALUES (username,password,nome,apelido,datanasc,morada,codigopostal,idpais,nif,tele,email,1,img);
END;;

/*PROC EDITAR TB Cliente*/
DELIMITER ;;
CREATE PROCEDURE IF NOT EXISTS usp_edit_cliente(
  IN id int,
  IN password varchar(50),
  IN nome varchar(20),
  IN apelido varchar(20),
  IN datanasc date,
  IN morada varchar(100),
  IN codigopostal varchar(11),
  IN idpais int,
  IN nif int,
  IN tele int,
  IN email varchar(100)
)
BEGIN
UPDATE cliente SET
  cliente_password = password,
  cliente_nome = nome,
  cliente_apelido = apelido,
  cliente_datanasc = datanasc,
  cliente_morada = morada,
  cliente_codigopostal = codigopostal,
  cliente_idpais = idpais,
  cliente_nif = nif,
  cliente_tele = tele,
  cliente_email = email
  WHERE cliente_id = id;
END;;
