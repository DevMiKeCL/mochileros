/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     15-12-2016 9:26:55                           */
/*==============================================================*/


drop table if exists ADMINISTRADOR;

drop table if exists BUSQUEDA;

drop table if exists CALIFICACION;

drop table if exists COMENTARIOS;

drop table if exists CONTADO;

drop table if exists CONTRATO;

drop table if exists CREDITO;

drop table if exists LISTA_SERVICIO;

drop table if exists LUGAR;

drop table if exists SERVICIO;

drop table if exists TIPO_LUGAR;

drop table if exists TIPO_USUARIO;

drop table if exists UBICACION_ACTUAL;

drop table if exists USUARIO;

drop table if exists VISITAS;

/*==============================================================*/
/* Table: ADMINISTRADOR                                         */
/*==============================================================*/
create table ADMINISTRADOR
(
   A_RUT                varchar(10) not null,
   A_PASS               varchar(20),
   A_NOMBRE             varchar(20),
   A_APATERNO           varchar(20),
   A_AMATERNO           varchar(20),
   A_EMAIL              varchar(50),
   primary key (A_RUT)
);

/*==============================================================*/
/* Table: BUSQUEDA                                              */
/*==============================================================*/
create table BUSQUEDA
(
   ID_BUSQUEDA          int not null auto_increment,
   ID_USUARIO           int,
   ID_LUGAR             int,
   B_FECHA              datetime,
   B_IP                 varchar(20),
   primary key (ID_BUSQUEDA)
);

/*==============================================================*/
/* Table: CALIFICACION                                          */
/*==============================================================*/
create table CALIFICACION
(
   ID_CALIFICACION      int not null auto_increment,
   ID_USUARIO           int,
   ID_LUGAR             int,
   C_VALOR              decimal,
   C_FECHA              date,
   primary key (ID_CALIFICACION)
);

/*==============================================================*/
/* Table: COMENTARIOS                                           */
/*==============================================================*/
create table COMENTARIOS
(
   ID_COMENTARIO        int not null auto_increment,
   ID_LUGAR             int,
   ID_USUARIO           int,
   COM_CONTENIDO        longtext,
   COM_FECHA            date,
   primary key (ID_COMENTARIO)
);

/*==============================================================*/
/* Table: CONTADO                                               */
/*==============================================================*/
create table CONTADO
(
   ID_CONTADO           int not null auto_increment,
   ID_CONTRATO          int,
   CON_ESTADO           bool,
   primary key (ID_CONTADO)
);

/*==============================================================*/
/* Table: CONTRATO                                              */
/*==============================================================*/
create table CONTRATO
(
   ID_CONTRATO          int not null auto_increment,
   FEC_INICIO           date,
   FEC_TERMINO          date,
   MODO_PAGO            varchar(20),
   VALOR                int,
   primary key (ID_CONTRATO)
);

/*==============================================================*/
/* Table: CREDITO                                               */
/*==============================================================*/
create table CREDITO
(
   ID_CREDITO           int not null auto_increment,
   ID_CONTRATO          int,
   C_MES                int,
   C_FPAGO              date,
   C_MONTO              int,
   C_ESTADO             bool,
   primary key (ID_CREDITO)
);

/*==============================================================*/
/* Table: LISTA_SERVICIO                                        */
/*==============================================================*/
create table LISTA_SERVICIO
(
   ID_LSERVICIO         int not null auto_increment,
   LS_NOMBRE            varchar(50),
   NOM_COLUMNA          varchar(50),
   primary key (ID_LSERVICIO)
);

/*==============================================================*/
/* Table: LUGAR                                                 */
/*==============================================================*/
create table LUGAR
(
   ID_LUGAR             int not null auto_increment,
   A_RUT                varchar(10),
   ID_TIPO              int,
   ID_USUARIO           int,
   L_NOMBRE             varchar(50),
   L_DIRECCION          varchar(50),
   L_LOCALIDAD          varchar(50),
   L_COMUNA             varchar(50),
   L_TELEFONO           varchar(20),
   L_FACEBOOK           varchar(50),
   L_TWITTER            varchar(50),
   L_WHATSAPP           varchar(20),
   L_LATITUD            varchar(50),
   L_LONGITUD           varchar(50),
   L_SERVICIOS          longtext,
   L_DESCRIPCION        longtext,
   L_COMOLLEGAR         longtext,
   primary key (ID_LUGAR)
);

/*==============================================================*/
/* Table: SERVICIO                                              */
/*==============================================================*/
create table SERVICIO
(
   ID_SERVICIO          int not null auto_increment,
   ID_LUGAR             int,
   ID_LSERVICIO         int,
   primary key (ID_SERVICIO)
);

/*==============================================================*/
/* Table: TIPO_LUGAR                                            */
/*==============================================================*/
create table TIPO_LUGAR
(
   ID_TIPO              int not null,
   T_NOMBRE             varchar(50),
   primary key (ID_TIPO)
);

/*==============================================================*/
/* Table: TIPO_USUARIO                                          */
/*==============================================================*/
create table TIPO_USUARIO
(
   ID_TUSUARIO          int not null,
   T_NOMBRE             varchar(20),
   primary key (ID_TUSUARIO)
);

/*==============================================================*/
/* Table: UBICACION_ACTUAL                                      */
/*==============================================================*/
create table UBICACION_ACTUAL
(
   ID_UBICACION         int not null auto_increment,
   ID_USUARIO           int,
   UB_LATITUD           varchar(50),
   UB_LONGITUD          varchar(50),
   UB_FECHA             datetime,
   primary key (ID_UBICACION)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID_USUARIO           int not null auto_increment,
   ID_CONTRATO          int,
   ID_TUSUARIO          int,
   U_RUT                varchar(10),
   U_PASS               varchar(20),
   U_NOMBRE             varchar(20),
   U_APATERNO           varchar(20),
   U_AMATERNO           varchar(20),
   U_DIRECCION          varchar(20),
   U_EMAIL              varchar(50) not null,
   U_CIUDAD             varchar(20),
   U_COMUNA             varchar(20),
   U_TELEFONO           varchar(20),
   U_FNAC               date,
   U_CACTIVACION        varchar(20),
   U_ESTADO             bool,
   U_PAIS               varchar(50),
   primary key (ID_USUARIO)
);

/*==============================================================*/
/* Table: VISITAS                                               */
/*==============================================================*/
create table VISITAS
(
   ID_VISITAS           int not null auto_increment,
   ID_USUARIO           int,
   ID_LUGAR             int,
   V_FECHA              date,
   primary key (ID_VISITAS)
);

alter table BUSQUEDA add constraint FK_BUSCA foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table BUSQUEDA add constraint FK_BUSCA2 foreign key (ID_LUGAR)
      references LUGAR (ID_LUGAR) on delete restrict on update restrict;

alter table CALIFICACION add constraint FK_OBTIENE foreign key (ID_LUGAR)
      references LUGAR (ID_LUGAR) on delete restrict on update restrict;

alter table CALIFICACION add constraint FK_REALIZA foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table COMENTARIOS add constraint FK_ACEPTA foreign key (ID_LUGAR)
      references LUGAR (ID_LUGAR) on delete restrict on update restrict;

alter table COMENTARIOS add constraint FK_ESCRIBE foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table CONTADO add constraint FK_CONTIENE2 foreign key (ID_CONTRATO)
      references CONTRATO (ID_CONTRATO) on delete restrict on update restrict;

alter table CREDITO add constraint FK_CONTIENE foreign key (ID_CONTRATO)
      references CONTRATO (ID_CONTRATO) on delete restrict on update restrict;

alter table LUGAR add constraint FK_CREA foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table LUGAR add constraint FK_PUBLICA foreign key (A_RUT)
      references ADMINISTRADOR (A_RUT) on delete restrict on update restrict;

alter table LUGAR add constraint FK_TIENE foreign key (ID_TIPO)
      references TIPO_LUGAR (ID_TIPO) on delete restrict on update restrict;

alter table SERVICIO add constraint FK_ESTA foreign key (ID_LSERVICIO)
      references LISTA_SERVICIO (ID_LSERVICIO) on delete restrict on update restrict;

alter table SERVICIO add constraint FK_OFRECE foreign key (ID_LUGAR)
      references LUGAR (ID_LUGAR) on delete restrict on update restrict;

alter table UBICACION_ACTUAL add constraint FK_POSEE foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table USUARIO add constraint FK_ADQUIERE foreign key (ID_CONTRATO)
      references CONTRATO (ID_CONTRATO) on delete restrict on update restrict;

alter table USUARIO add constraint FK_PERTENECE foreign key (ID_TUSUARIO)
      references TIPO_USUARIO (ID_TUSUARIO) on delete restrict on update restrict;

alter table VISITAS add constraint FK_HACE foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table VISITAS add constraint FK_RECIBE foreign key (ID_LUGAR)
      references LUGAR (ID_LUGAR) on delete restrict on update restrict;
