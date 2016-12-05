/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     03-12-2016 4:41:35                           */
/*==============================================================*/


drop table if exists ADMINISTRADOR;

drop table if exists BUSQUEDA;

drop table if exists CLIENTE;

drop table if exists LUGAR;

drop table if exists TIPO_LUGAR;

drop table if exists USUARIO;

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
   A_GMAP               varchar(50),
   primary key (A_RUT)
);

/*==============================================================*/
/* Table: BUSQUEDA                                              */
/*==============================================================*/
create table BUSQUEDA
(
   ID_BUSQUEDA          int not null auto_increment,
   U_RUT                varchar(10),
   ID_LUGAR             int,
   B_FECHA              datetime,
   B_GMAP               varchar(50),
   B_IP                 varchar(20),
   primary key (ID_BUSQUEDA)
);

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   C_RUT                varchar(10) not null,
   C_PASS               varchar(20),
   C_NOMBRE             varchar(20),
   C_APATERNO           varchar(20),
   C_AMATERNO           varchar(20),
   C_DIRECCION          varchar(20),
   C_CIUDAD             varchar(20),
   C_COMUNA             varchar(20),
   C_TELEFONO           int,
   C_FNAC               date,
   C_GMAP               varchar(50),
   C_EMAIL              varchar(50),
   primary key (C_RUT)
);

/*==============================================================*/
/* Table: LUGAR                                                 */
/*==============================================================*/
create table LUGAR
(
   ID_LUGAR             int not null auto_increment,
   A_RUT                varchar(10),
   ID_TIPO              int,
   C_RUT                varchar(10),
   L_NOMBRE             varchar(20),
   L_DIRECCION          varchar(20),
   L_CIUDAD             varchar(20),
   L_COMUNA             varchar(20),
   L_CALIFICACION       int,
   L_TVISITAS           int,
   L_HVISITAS           int,
   L_TELEFONO           int,
   L_FACEBOOK           varchar(50),
   L_TWITTER            varchar(50),
   L_WHATSAPP           int,
   L_GMAP               varchar(50),
   L_SERVICIOS          longtext,
   L_DESCRIPCION        longtext,
   L_COMOLLEGAR         longtext,
   primary key (ID_LUGAR)
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
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   U_RUT                varchar(10) not null,
   U_PASS               varchar(20),
   U_NOMBRE             varchar(20),
   U_APATERNO           varchar(20),
   U_AMATERNO           varchar(20),
   U_CIUDAD             varchar(20),
   U_COMUNA             varchar(20),
   U_TELEFONO           int,
   U_FNAC               date,
   U_GMAP               varchar(50),
   U_EMAIL              varchar(50),
   primary key (U_RUT)
);

alter table BUSQUEDA add constraint FK_BUSCA foreign key (U_RUT)
      references USUARIO (U_RUT) on delete restrict on update restrict;

alter table BUSQUEDA add constraint FK_BUSCA2 foreign key (ID_LUGAR)
      references LUGAR (ID_LUGAR) on delete restrict on update restrict;

alter table LUGAR add constraint FK_CREA foreign key (C_RUT)
      references CLIENTE (C_RUT) on delete restrict on update restrict;

alter table LUGAR add constraint FK_PUBLICA foreign key (A_RUT)
      references ADMINISTRADOR (A_RUT) on delete restrict on update restrict;

alter table LUGAR add constraint FK_TIENE foreign key (ID_TIPO)
      references TIPO_LUGAR (ID_TIPO) on delete restrict on update restrict;

