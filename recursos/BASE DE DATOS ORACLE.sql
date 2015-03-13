/*
Navicat Oracle Data Transfer
Oracle Client Version : 10.2.0.5.0

Source Server         : EdgardoOra
Source Server Version : 100200
Source Host           : 192.168.56.101:1521
Source Schema         : EDGARDO

Target Server Type    : ORACLE
Target Server Version : 100200
File Encoding         : 65001

Date: 2015-03-13 09:53:34
*/


-- ----------------------------
-- Table structure for "EDGARDO"."CATEGORIAS"
-- ----------------------------
DROP TABLE "EDGARDO"."CATEGORIAS";
CREATE TABLE "EDGARDO"."CATEGORIAS" (
"IDCATEGORIA" NUMBER NOT NULL ,
"CATEGORIA" VARCHAR2(20 BYTE) NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of CATEGORIAS
-- ----------------------------
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('1', 'SALUD');
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('2', 'EDUCACION');
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('3', 'TECNOLOGIA');
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('4', 'SERVICIOS PUBLICOS');
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('5', 'TRANSITO');
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('6', 'IIMPUESTOS');
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('7', 'CEDULA DE CIUDADANIA');
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('8', 'COMERCIO');
INSERT INTO "EDGARDO"."CATEGORIAS" VALUES ('9', 'INTERNET');

-- ----------------------------
-- Table structure for "EDGARDO"."CATEGORIASEMPLEADOS"
-- ----------------------------
DROP TABLE "EDGARDO"."CATEGORIASEMPLEADOS";
CREATE TABLE "EDGARDO"."CATEGORIASEMPLEADOS" (
"IDCATEGORIA" NUMBER NOT NULL ,
"IDUSUARIO" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of CATEGORIASEMPLEADOS
-- ----------------------------

-- ----------------------------
-- Table structure for "EDGARDO"."ESTADOTICKETS"
-- ----------------------------
DROP TABLE "EDGARDO"."ESTADOTICKETS";
CREATE TABLE "EDGARDO"."ESTADOTICKETS" (
"IDESTADO" NUMBER NOT NULL ,
"ESTADO" VARCHAR2(20 BYTE) NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of ESTADOTICKETS
-- ----------------------------
INSERT INTO "EDGARDO"."ESTADOTICKETS" VALUES ('1', 'RESPONDIDO');
INSERT INTO "EDGARDO"."ESTADOTICKETS" VALUES ('2', 'SIN RESPONDER');
INSERT INTO "EDGARDO"."ESTADOTICKETS" VALUES ('3', 'CERRADO');

-- ----------------------------
-- Table structure for "EDGARDO"."RESPUESTAS"
-- ----------------------------
DROP TABLE "EDGARDO"."RESPUESTAS";
CREATE TABLE "EDGARDO"."RESPUESTAS" (
"IDRESPUESTA" NUMBER NOT NULL ,
"RESPUESTA" CLOB NOT NULL ,
"IDUSUARIO" NUMBER NOT NULL ,
"FECHA" DATE NOT NULL ,
"IDTICKET" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of RESPUESTAS
-- ----------------------------
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('1', 'el presente mensaje es para mostrar porque la conexion no se puede realizar no se que pasa con todo esto', '1', TO_DATE('2015-03-10 14:21:44', 'YYYY-MM-DD HH24:MI:SS'), '1');
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('2', 'el presente mensaje es para mostrar porque la conexion no se puede realizar no se que pasa con todo esto', '1', TO_DATE('2015-03-10 14:22:51', 'YYYY-MM-DD HH24:MI:SS'), '2');
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('3', 'el presente mensaje es para mostrar porque la conexion no se puede realizar no se que pasa con todo esto', '1', TO_DATE('2015-03-10 16:46:21', 'YYYY-MM-DD HH24:MI:SS'), '3');
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('4', 'el presente mensaje es para mostrar porque la conexion no se puede realizar no se que pasa con todo esto', '1', TO_DATE('2015-03-10 16:48:47', 'YYYY-MM-DD HH24:MI:SS'), '4');
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('5', 'el presente mensaje es para mostrar porque la conexion no se puede realizar no se que pasa con todo esto', '1', TO_DATE('2015-03-10 16:52:01', 'YYYY-MM-DD HH24:MI:SS'), '5');
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('6', 'el presente mensaje es para mostrar porque la conexion no se puede realizar no se que pasa con todo esto', '1', TO_DATE('2015-03-10 16:52:57', 'YYYY-MM-DD HH24:MI:SS'), '6');
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('7', 'el presente mensaje es para mostrar porque la conexion no se puede realizar no se que pasa con todo esto', '1', TO_DATE('2015-03-10 16:55:18', 'YYYY-MM-DD HH24:MI:SS'), '7');
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('8', 'el presente mensaje es para mostrar porque la conexion no se puede realizar no se que pasa con todo esto', '1', TO_DATE('2015-03-10 16:57:40', 'YYYY-MM-DD HH24:MI:SS'), '8');
INSERT INTO "EDGARDO"."RESPUESTAS" VALUES ('9', 'Nuevo mensaje para la comunidad', '1', TO_DATE('2015-03-10 17:51:49', 'YYYY-MM-DD HH24:MI:SS'), '1');

-- ----------------------------
-- Table structure for "EDGARDO"."TICKETS"
-- ----------------------------
DROP TABLE "EDGARDO"."TICKETS";
CREATE TABLE "EDGARDO"."TICKETS" (
"IDTICKET" NUMBER NOT NULL ,
"IDUSUARIO" NUMBER NOT NULL ,
"IDCATEGORIA" NUMBER NOT NULL ,
"FECHA" DATE NOT NULL ,
"IDESTADO" NUMBER NULL ,
"ASUNTO" CLOB NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of TICKETS
-- ----------------------------
INSERT INTO "EDGARDO"."TICKETS" VALUES ('1', '1', '1', TO_DATE('2015-03-10 14:21:44', 'YYYY-MM-DD HH24:MI:SS'), '3', 'Conexion con la categoria');
INSERT INTO "EDGARDO"."TICKETS" VALUES ('2', '1', '1', TO_DATE('2015-03-10 14:22:51', 'YYYY-MM-DD HH24:MI:SS'), '3', 'Conexion con la categoria');
INSERT INTO "EDGARDO"."TICKETS" VALUES ('3', '1', '1', TO_DATE('2015-03-10 16:46:21', 'YYYY-MM-DD HH24:MI:SS'), '2', 'Conexion con la categoria');
INSERT INTO "EDGARDO"."TICKETS" VALUES ('4', '1', '1', TO_DATE('2015-03-10 16:48:47', 'YYYY-MM-DD HH24:MI:SS'), '2', 'Conexion con la categoria');
INSERT INTO "EDGARDO"."TICKETS" VALUES ('5', '1', '1', TO_DATE('2015-03-10 16:52:01', 'YYYY-MM-DD HH24:MI:SS'), '2', 'Conexion con la categoria');
INSERT INTO "EDGARDO"."TICKETS" VALUES ('6', '1', '1', TO_DATE('2015-03-10 16:52:57', 'YYYY-MM-DD HH24:MI:SS'), '2', 'Conexion con la categoria');
INSERT INTO "EDGARDO"."TICKETS" VALUES ('7', '1', '1', TO_DATE('2015-03-10 16:55:18', 'YYYY-MM-DD HH24:MI:SS'), '2', 'Conexion con la categoria');
INSERT INTO "EDGARDO"."TICKETS" VALUES ('8', '1', '1', TO_DATE('2015-03-10 16:57:40', 'YYYY-MM-DD HH24:MI:SS'), '2', 'Conexion con la categoria');

-- ----------------------------
-- Table structure for "EDGARDO"."TIPOUSUARIO"
-- ----------------------------
DROP TABLE "EDGARDO"."TIPOUSUARIO";
CREATE TABLE "EDGARDO"."TIPOUSUARIO" (
"IDTIPO" NUMBER NOT NULL ,
"TIPOUSUARIO" VARCHAR2(20 BYTE) NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of TIPOUSUARIO
-- ----------------------------
INSERT INTO "EDGARDO"."TIPOUSUARIO" VALUES ('1', 'administrador');
INSERT INTO "EDGARDO"."TIPOUSUARIO" VALUES ('2', 'empleado');
INSERT INTO "EDGARDO"."TIPOUSUARIO" VALUES ('3', 'cliente');

-- ----------------------------
-- Table structure for "EDGARDO"."USUARIOS"
-- ----------------------------
DROP TABLE "EDGARDO"."USUARIOS";
CREATE TABLE "EDGARDO"."USUARIOS" (
"IDUSUARIO" NUMBER NOT NULL ,
"NOMBRE" VARCHAR2(20 BYTE) NOT NULL ,
"APELLIDOS" VARCHAR2(60 BYTE) NOT NULL ,
"CORREO" VARCHAR2(70 BYTE) NOT NULL ,
"PASSWORD" VARCHAR2(60 BYTE) NOT NULL ,
"DIRECCION" VARCHAR2(30 BYTE) NOT NULL ,
"TELEFONO" VARCHAR2(20 BYTE) NOT NULL ,
"IDTIPO" NUMBER NOT NULL ,
"CIUDAD" VARCHAR2(20 BYTE) NOT NULL ,
"ACTIVO" NUMBER NOT NULL ,
"CEDULA" VARCHAR2(20 BYTE) NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of USUARIOS
-- ----------------------------
INSERT INTO "EDGARDO"."USUARIOS" VALUES ('9', 'Nabila', 'Lafaurie', 'cliente10@algo.com', 'e10adc3949ba59abbe56e057f20f883e', '3325', '325622', '3', 'soledad', '1', '1143116295');
INSERT INTO "EDGARDO"."USUARIOS" VALUES ('7', 'Empleado', 'Anonimo', 'empleado@algo.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cl 45-5682', '3728672', '2', 'Soledad', '1', '1143116230');
INSERT INTO "EDGARDO"."USUARIOS" VALUES ('8', '?', '?', '?', '?', '?', '?', '3', '?', '1', '?');
INSERT INTO "EDGARDO"."USUARIOS" VALUES ('1', 'EDGARDO JOSE', 'ALVAREZ BERDUGO', 'edgardoalvarez100@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'CL 45A 24-56', '3012151887', '1', 'BARRANQUILLA', '1', '1143116274');
INSERT INTO "EDGARDO"."USUARIOS" VALUES ('2', 'Santiago', 'Alvarez Rodriguez', 'alvarez@alvarz.com', 'e10adc3949ba59abbe56e057f20f883e', 'cl 45a 24-*56', '3265100', '2', 'SOLEDAD', '1', '72040167');
INSERT INTO "EDGARDO"."USUARIOS" VALUES ('3', 'ETICOS', 'andradre', 'clienteetico@algo.com', 'e10adc3949ba59abbe56e057f20f883e', 'CALLE 46 76-522', '123456', '3', 'BARRANQUILLA', '1', '22637490');
INSERT INTO "EDGARDO"."USUARIOS" VALUES ('4', 'Daniel', 'Barros', 'daniel@daniel.com', '200911216675', 'kra 36 81d', '3520198', '3', 'Barranquilla', '1', '1140846781');

-- ----------------------------
-- Procedure structure for "EDGARDO"."CERRARTICKET"
-- ----------------------------
CREATE OR REPLACE PROCEDURE "EDGARDO"."CERRARTICKET" (idTicke IN NUMBER, retorna OUT NUMBER)
AS
BEGIN
	RETORNA :=  0; 	
  UPDATE TICKETS SET IDESTADO=3 where idticket=IDTICKE;
  RETORNA :=  1; 
END CERRARTICKET;
/

-- ----------------------------
-- Procedure structure for "EDGARDO"."CREARTICKET"
-- ----------------------------
CREATE OR REPLACE PROCEDURE "EDGARDO"."CREARTICKET" (
IDUSUARIO NUMBER, 
IDCATEGORIA NUMBER,
ASUNTO VARCHAR2,
MENSAJE CLOB, 
 RETORNA OUT NUMBER)
AS
	BEGIN
		RETORNA :=  0; 
      INSERT INTO TICKETS VALUES( INC_TICKET_PK.NEXTVAL,  IDUSUARIO, IDCATEGORIA,  SYSDATE, 2,  asunto);
      INSERT INTO RESPUESTAS VALUES(INC_RESPUESTA_PK.NEXTVAL, mensaje, IDUSUARIO,SYSDATE, INC_TICKET_PK.CURRVAL);
			RETORNA :=  1; 
  	END CREARTICKET;
/

-- ----------------------------
-- Procedure structure for "EDGARDO"."RESPONDERTICKET"
-- ----------------------------
CREATE OR REPLACE PROCEDURE "EDGARDO"."RESPONDERTICKET" (
MENSAJE CLOB,
IDUSUARIO NUMBER,
IDTICKE NUMBER,
RETORNA OUT NUMBER
)
AS
tipo number;
BEGIN
	RETORNA :=  0; 
	INSERT INTO RESPUESTAS VALUES(INC_RESPUESTA_PK.NEXTVAL, MENSAJE, IDUSUARIO, SYSDATE,IDTICKE);
  SELECT t.IDTIPO INTO tipo FROM USUARIOS u INNER JOIN TIPOUSUARIO t ON u.IDTIPO=t.IDTIPO WHERE u.IDUSUARIO=IDUSUARIO;
  --Si responde un cliente se cambia el estado a NO respondido
  IF TIPO=3 THEN
  UPDATE TICKETS SET IDESTADO=2 where idticket=IDTICKE;
  END IF;
	--Si responde un empleado se cambia el estado a respondido
  IF TIPO=2 THEN
  UPDATE TICKETS SET IDESTADO=1 where idticket=IDTICKE;
  END IF;
  --Si responde un administrador se cambia el estado a respondido
  IF TIPO=1 THEN
  UPDATE TICKETS SET IDESTADO=1 where idticket=IDTICKE;
  END IF;
  
	RETORNA :=  1; 
END RESPONDERTICKET;
/

-- ----------------------------
-- Sequence structure for "EDGARDO"."INC_RESPUESTA_PK"
-- ----------------------------
DROP SEQUENCE "EDGARDO"."INC_RESPUESTA_PK";
CREATE SEQUENCE "EDGARDO"."INC_RESPUESTA_PK"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 10
 NOCACHE ;

-- ----------------------------
-- Sequence structure for "EDGARDO"."INC_TICKET_PK"
-- ----------------------------
DROP SEQUENCE "EDGARDO"."INC_TICKET_PK";
CREATE SEQUENCE "EDGARDO"."INC_TICKET_PK"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 9
 NOCACHE ;

-- ----------------------------
-- Sequence structure for "EDGARDO"."INC_USUARIO_PK"
-- ----------------------------
DROP SEQUENCE "EDGARDO"."INC_USUARIO_PK";
CREATE SEQUENCE "EDGARDO"."INC_USUARIO_PK"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 10
 NOCACHE ;

-- ----------------------------
-- Indexes structure for table CATEGORIAS
-- ----------------------------

-- ----------------------------
-- Checks structure for table "EDGARDO"."CATEGORIAS"
-- ----------------------------
ALTER TABLE "EDGARDO"."CATEGORIAS" ADD CHECK ("IDCATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."CATEGORIAS" ADD CHECK ("CATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."CATEGORIAS" ADD CHECK ("IDCATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."CATEGORIAS" ADD CHECK ("CATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."CATEGORIAS" ADD CHECK ("IDCATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."CATEGORIAS" ADD CHECK ("CATEGORIA" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "EDGARDO"."CATEGORIAS"
-- ----------------------------
ALTER TABLE "EDGARDO"."CATEGORIAS" ADD PRIMARY KEY ("IDCATEGORIA");

-- ----------------------------
-- Indexes structure for table CATEGORIASEMPLEADOS
-- ----------------------------

-- ----------------------------
-- Checks structure for table "EDGARDO"."CATEGORIASEMPLEADOS"
-- ----------------------------
ALTER TABLE "EDGARDO"."CATEGORIASEMPLEADOS" ADD CHECK ("IDCATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."CATEGORIASEMPLEADOS" ADD CHECK ("IDUSUARIO" IS NOT NULL);
ALTER TABLE "EDGARDO"."CATEGORIASEMPLEADOS" ADD CHECK ("IDCATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."CATEGORIASEMPLEADOS" ADD CHECK ("IDUSUARIO" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "EDGARDO"."CATEGORIASEMPLEADOS"
-- ----------------------------
ALTER TABLE "EDGARDO"."CATEGORIASEMPLEADOS" ADD PRIMARY KEY ("IDCATEGORIA", "IDUSUARIO");

-- ----------------------------
-- Indexes structure for table ESTADOTICKETS
-- ----------------------------

-- ----------------------------
-- Checks structure for table "EDGARDO"."ESTADOTICKETS"
-- ----------------------------
ALTER TABLE "EDGARDO"."ESTADOTICKETS" ADD CHECK ("IDESTADO" IS NOT NULL);
ALTER TABLE "EDGARDO"."ESTADOTICKETS" ADD CHECK ("ESTADO" IS NOT NULL);
ALTER TABLE "EDGARDO"."ESTADOTICKETS" ADD CHECK ("IDESTADO" IS NOT NULL);
ALTER TABLE "EDGARDO"."ESTADOTICKETS" ADD CHECK ("ESTADO" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "EDGARDO"."ESTADOTICKETS"
-- ----------------------------
ALTER TABLE "EDGARDO"."ESTADOTICKETS" ADD PRIMARY KEY ("IDESTADO");

-- ----------------------------
-- Indexes structure for table RESPUESTAS
-- ----------------------------

-- ----------------------------
-- Checks structure for table "EDGARDO"."RESPUESTAS"
-- ----------------------------
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("IDRESPUESTA" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("RESPUESTA" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("IDUSUARIO" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("FECHA" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("IDTICKET" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("IDRESPUESTA" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("RESPUESTA" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("IDUSUARIO" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("FECHA" IS NOT NULL);
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD CHECK ("IDTICKET" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "EDGARDO"."RESPUESTAS"
-- ----------------------------
ALTER TABLE "EDGARDO"."RESPUESTAS" ADD PRIMARY KEY ("IDRESPUESTA");

-- ----------------------------
-- Indexes structure for table TICKETS
-- ----------------------------

-- ----------------------------
-- Checks structure for table "EDGARDO"."TICKETS"
-- ----------------------------
ALTER TABLE "EDGARDO"."TICKETS" ADD CHECK ("IDTICKET" IS NOT NULL);
ALTER TABLE "EDGARDO"."TICKETS" ADD CHECK ("IDUSUARIO" IS NOT NULL);
ALTER TABLE "EDGARDO"."TICKETS" ADD CHECK ("IDCATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."TICKETS" ADD CHECK ("FECHA" IS NOT NULL);
ALTER TABLE "EDGARDO"."TICKETS" ADD CHECK ("IDTICKET" IS NOT NULL);
ALTER TABLE "EDGARDO"."TICKETS" ADD CHECK ("IDUSUARIO" IS NOT NULL);
ALTER TABLE "EDGARDO"."TICKETS" ADD CHECK ("IDCATEGORIA" IS NOT NULL);
ALTER TABLE "EDGARDO"."TICKETS" ADD CHECK ("FECHA" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "EDGARDO"."TICKETS"
-- ----------------------------
ALTER TABLE "EDGARDO"."TICKETS" ADD PRIMARY KEY ("IDTICKET");

-- ----------------------------
-- Indexes structure for table TIPOUSUARIO
-- ----------------------------

-- ----------------------------
-- Checks structure for table "EDGARDO"."TIPOUSUARIO"
-- ----------------------------
ALTER TABLE "EDGARDO"."TIPOUSUARIO" ADD CHECK ("IDTIPO" IS NOT NULL);
ALTER TABLE "EDGARDO"."TIPOUSUARIO" ADD CHECK ("TIPOUSUARIO" IS NOT NULL);
ALTER TABLE "EDGARDO"."TIPOUSUARIO" ADD CHECK ("IDTIPO" IS NOT NULL);
ALTER TABLE "EDGARDO"."TIPOUSUARIO" ADD CHECK ("TIPOUSUARIO" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "EDGARDO"."TIPOUSUARIO"
-- ----------------------------
ALTER TABLE "EDGARDO"."TIPOUSUARIO" ADD PRIMARY KEY ("IDTIPO");

-- ----------------------------
-- Indexes structure for table USUARIOS
-- ----------------------------

-- ----------------------------
-- Uniques structure for table "EDGARDO"."USUARIOS"
-- ----------------------------
ALTER TABLE "EDGARDO"."USUARIOS" ADD UNIQUE ("CEDULA");

-- ----------------------------
-- Checks structure for table "EDGARDO"."USUARIOS"
-- ----------------------------
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("IDUSUARIO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("NOMBRE" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("APELLIDOS" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("CORREO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("PASSWORD" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("DIRECCION" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("TELEFONO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("IDTIPO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("CIUDAD" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("ACTIVO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("CEDULA" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("IDUSUARIO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("NOMBRE" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("APELLIDOS" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("CORREO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("PASSWORD" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("DIRECCION" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("TELEFONO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("IDTIPO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("CIUDAD" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("ACTIVO" IS NOT NULL);
ALTER TABLE "EDGARDO"."USUARIOS" ADD CHECK ("CEDULA" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "EDGARDO"."USUARIOS"
-- ----------------------------
ALTER TABLE "EDGARDO"."USUARIOS" ADD PRIMARY KEY ("IDUSUARIO");
