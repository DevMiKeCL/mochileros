/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     19-12-2016 13:43:33                          */
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

drop table if exists MENSAJES;

drop table if exists PAISES;

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
   L_DESCRIPCION        longtext,
   L_COMOLLEGAR         longtext,
   L_ESTADO             bool default 0,
   primary key (ID_LUGAR)
);

/*==============================================================*/
/* Table: MENSAJES                                              */
/*==============================================================*/
create table MENSAJES
(
   ID_MSG               int not null auto_increment,
   MENSAJE              longtext,
   primary key (ID_MSG)
);

/*==============================================================*/
/* Table: PAISES                                                */
/*==============================================================*/
create table PAISES
(
   ID                   int not null auto_increment,
   ISO                  char(2),
   NOMBRE               varchar(50),
   primary key (ID)
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
   ID_TIPO              int not null auto_increment,
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
   U_NOMBRE             varchar(50),
   U_APATERNO           varchar(50),
   U_AMATERNO           varchar(50),
   U_DIRECCION          varchar(50),
   U_EMAIL              varchar(50) not null,
   U_CIUDAD             varchar(50),
   U_COMUNA             varchar(50),
   U_TELEFONO           varchar(20),
   U_FNAC               date,
   U_CACTIVACION        varchar(20),
   U_ESTADO             bool default 0,
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

      /*==============================================================*/
      /* LLENADO                                                      */
      /*==============================================================*/

      INSERT INTO `PAISES` VALUES(1, 'AF', 'Afganistán');
      INSERT INTO `PAISES` VALUES(2, 'AX', 'Islas Gland');
      INSERT INTO `PAISES` VALUES(3, 'AL', 'Albania');
      INSERT INTO `PAISES` VALUES(4, 'DE', 'Alemania');
      INSERT INTO `PAISES` VALUES(5, 'AD', 'Andorra');
      INSERT INTO `PAISES` VALUES(6, 'AO', 'Angola');
      INSERT INTO `PAISES` VALUES(7, 'AI', 'Anguilla');
      INSERT INTO `PAISES` VALUES(8, 'AQ', 'Antártida');
      INSERT INTO `PAISES` VALUES(9, 'AG', 'Antigua y Barbuda');
      INSERT INTO `PAISES` VALUES(10, 'AN', 'Antillas Holandesas');
      INSERT INTO `PAISES` VALUES(11, 'SA', 'Arabia Saudí');
      INSERT INTO `PAISES` VALUES(12, 'DZ', 'Argelia');
      INSERT INTO `PAISES` VALUES(13, 'AR', 'Argentina');
      INSERT INTO `PAISES` VALUES(14, 'AM', 'Armenia');
      INSERT INTO `PAISES` VALUES(15, 'AW', 'Aruba');
      INSERT INTO `PAISES` VALUES(16, 'AU', 'Australia');
      INSERT INTO `PAISES` VALUES(17, 'AT', 'Austria');
      INSERT INTO `PAISES` VALUES(18, 'AZ', 'Azerbaiyán');
      INSERT INTO `PAISES` VALUES(19, 'BS', 'Bahamas');
      INSERT INTO `PAISES` VALUES(20, 'BH', 'Bahréin');
      INSERT INTO `PAISES` VALUES(21, 'BD', 'Bangladesh');
      INSERT INTO `PAISES` VALUES(22, 'BB', 'Barbados');
      INSERT INTO `PAISES` VALUES(23, 'BY', 'Bielorrusia');
      INSERT INTO `PAISES` VALUES(24, 'BE', 'Bélgica');
      INSERT INTO `PAISES` VALUES(25, 'BZ', 'Belice');
      INSERT INTO `PAISES` VALUES(26, 'BJ', 'Benin');
      INSERT INTO `PAISES` VALUES(27, 'BM', 'Bermudas');
      INSERT INTO `PAISES` VALUES(28, 'BT', 'Bhután');
      INSERT INTO `PAISES` VALUES(29, 'BO', 'Bolivia');
      INSERT INTO `PAISES` VALUES(30, 'BA', 'Bosnia y Herzegovina');
      INSERT INTO `PAISES` VALUES(31, 'BW', 'Botsuana');
      INSERT INTO `PAISES` VALUES(32, 'BV', 'Isla Bouvet');
      INSERT INTO `PAISES` VALUES(33, 'BR', 'Brasil');
      INSERT INTO `PAISES` VALUES(34, 'BN', 'Brunéi');
      INSERT INTO `PAISES` VALUES(35, 'BG', 'Bulgaria');
      INSERT INTO `PAISES` VALUES(36, 'BF', 'Burkina Faso');
      INSERT INTO `PAISES` VALUES(37, 'BI', 'Burundi');
      INSERT INTO `PAISES` VALUES(38, 'CV', 'Cabo Verde');
      INSERT INTO `PAISES` VALUES(39, 'KY', 'Islas Caimán');
      INSERT INTO `PAISES` VALUES(40, 'KH', 'Camboya');
      INSERT INTO `PAISES` VALUES(41, 'CM', 'Camerún');
      INSERT INTO `PAISES` VALUES(42, 'CA', 'Canadá');
      INSERT INTO `PAISES` VALUES(43, 'CF', 'República Centroafricana');
      INSERT INTO `PAISES` VALUES(44, 'TD', 'Chad');
      INSERT INTO `PAISES` VALUES(45, 'CZ', 'República Checa');
      INSERT INTO `PAISES` VALUES(46, 'CL', 'Chile');
      INSERT INTO `PAISES` VALUES(47, 'CN', 'China');
      INSERT INTO `PAISES` VALUES(48, 'CY', 'Chipre');
      INSERT INTO `PAISES` VALUES(49, 'CX', 'Isla de Navidad');
      INSERT INTO `PAISES` VALUES(50, 'VA', 'Ciudad del Vaticano');
      INSERT INTO `PAISES` VALUES(51, 'CC', 'Islas Cocos');
      INSERT INTO `PAISES` VALUES(52, 'CO', 'Colombia');
      INSERT INTO `PAISES` VALUES(53, 'KM', 'Comoras');
      INSERT INTO `PAISES` VALUES(54, 'CD', 'República Democrática del Congo');
      INSERT INTO `PAISES` VALUES(55, 'CG', 'Congo');
      INSERT INTO `PAISES` VALUES(56, 'CK', 'Islas Cook');
      INSERT INTO `PAISES` VALUES(57, 'KP', 'Corea del Norte');
      INSERT INTO `PAISES` VALUES(58, 'KR', 'Corea del Sur');
      INSERT INTO `PAISES` VALUES(59, 'CI', 'Costa de Marfil');
      INSERT INTO `PAISES` VALUES(60, 'CR', 'Costa Rica');
      INSERT INTO `PAISES` VALUES(61, 'HR', 'Croacia');
      INSERT INTO `PAISES` VALUES(62, 'CU', 'Cuba');
      INSERT INTO `PAISES` VALUES(63, 'DK', 'Dinamarca');
      INSERT INTO `PAISES` VALUES(64, 'DM', 'Dominica');
      INSERT INTO `PAISES` VALUES(65, 'DO', 'República Dominicana');
      INSERT INTO `PAISES` VALUES(66, 'EC', 'Ecuador');
      INSERT INTO `PAISES` VALUES(67, 'EG', 'Egipto');
      INSERT INTO `PAISES` VALUES(68, 'SV', 'El Salvador');
      INSERT INTO `PAISES` VALUES(69, 'AE', 'Emiratos Árabes Unidos');
      INSERT INTO `PAISES` VALUES(70, 'ER', 'Eritrea');
      INSERT INTO `PAISES` VALUES(71, 'SK', 'Eslovaquia');
      INSERT INTO `PAISES` VALUES(72, 'SI', 'Eslovenia');
      INSERT INTO `PAISES` VALUES(73, 'ES', 'España');
      INSERT INTO `PAISES` VALUES(74, 'UM', 'Islas ultramarinas de Estados Unidos');
      INSERT INTO `PAISES` VALUES(75, 'US', 'Estados Unidos');
      INSERT INTO `PAISES` VALUES(76, 'EE', 'Estonia');
      INSERT INTO `PAISES` VALUES(77, 'ET', 'Etiopía');
      INSERT INTO `PAISES` VALUES(78, 'FO', 'Islas Feroe');
      INSERT INTO `PAISES` VALUES(79, 'PH', 'Filipinas');
      INSERT INTO `PAISES` VALUES(80, 'FI', 'Finlandia');
      INSERT INTO `PAISES` VALUES(81, 'FJ', 'Fiyi');
      INSERT INTO `PAISES` VALUES(82, 'FR', 'Francia');
      INSERT INTO `PAISES` VALUES(83, 'GA', 'Gabón');
      INSERT INTO `PAISES` VALUES(84, 'GM', 'Gambia');
      INSERT INTO `PAISES` VALUES(85, 'GE', 'Georgia');
      INSERT INTO `PAISES` VALUES(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur');
      INSERT INTO `PAISES` VALUES(87, 'GH', 'Ghana');
      INSERT INTO `PAISES` VALUES(88, 'GI', 'Gibraltar');
      INSERT INTO `PAISES` VALUES(89, 'GD', 'Granada');
      INSERT INTO `PAISES` VALUES(90, 'GR', 'Grecia');
      INSERT INTO `PAISES` VALUES(91, 'GL', 'Groenlandia');
      INSERT INTO `PAISES` VALUES(92, 'GP', 'Guadalupe');
      INSERT INTO `PAISES` VALUES(93, 'GU', 'Guam');
      INSERT INTO `PAISES` VALUES(94, 'GT', 'Guatemala');
      INSERT INTO `PAISES` VALUES(95, 'GF', 'Guayana Francesa');
      INSERT INTO `PAISES` VALUES(96, 'GN', 'Guinea');
      INSERT INTO `PAISES` VALUES(97, 'GQ', 'Guinea Ecuatorial');
      INSERT INTO `PAISES` VALUES(98, 'GW', 'Guinea-Bissau');
      INSERT INTO `PAISES` VALUES(99, 'GY', 'Guyana');
      INSERT INTO `PAISES` VALUES(100, 'HT', 'Haití');
      INSERT INTO `PAISES` VALUES(101, 'HM', 'Islas Heard y McDonald');
      INSERT INTO `PAISES` VALUES(102, 'HN', 'Honduras');
      INSERT INTO `PAISES` VALUES(103, 'HK', 'Hong Kong');
      INSERT INTO `PAISES` VALUES(104, 'HU', 'Hungría');
      INSERT INTO `PAISES` VALUES(105, 'IN', 'India');
      INSERT INTO `PAISES` VALUES(106, 'ID', 'Indonesia');
      INSERT INTO `PAISES` VALUES(107, 'IR', 'Irán');
      INSERT INTO `PAISES` VALUES(108, 'IQ', 'Iraq');
      INSERT INTO `PAISES` VALUES(109, 'IE', 'Irlanda');
      INSERT INTO `PAISES` VALUES(110, 'IS', 'Islandia');
      INSERT INTO `PAISES` VALUES(111, 'IL', 'Israel');
      INSERT INTO `PAISES` VALUES(112, 'IT', 'Italia');
      INSERT INTO `PAISES` VALUES(113, 'JM', 'Jamaica');
      INSERT INTO `PAISES` VALUES(114, 'JP', 'Japón');
      INSERT INTO `PAISES` VALUES(115, 'JO', 'Jordania');
      INSERT INTO `PAISES` VALUES(116, 'KZ', 'Kazajstán');
      INSERT INTO `PAISES` VALUES(117, 'KE', 'Kenia');
      INSERT INTO `PAISES` VALUES(118, 'KG', 'Kirguistán');
      INSERT INTO `PAISES` VALUES(119, 'KI', 'Kiribati');
      INSERT INTO `PAISES` VALUES(120, 'KW', 'Kuwait');
      INSERT INTO `PAISES` VALUES(121, 'LA', 'Laos');
      INSERT INTO `PAISES` VALUES(122, 'LS', 'Lesotho');
      INSERT INTO `PAISES` VALUES(123, 'LV', 'Letonia');
      INSERT INTO `PAISES` VALUES(124, 'LB', 'Líbano');
      INSERT INTO `PAISES` VALUES(125, 'LR', 'Liberia');
      INSERT INTO `PAISES` VALUES(126, 'LY', 'Libia');
      INSERT INTO `PAISES` VALUES(127, 'LI', 'Liechtenstein');
      INSERT INTO `PAISES` VALUES(128, 'LT', 'Lituania');
      INSERT INTO `PAISES` VALUES(129, 'LU', 'Luxemburgo');
      INSERT INTO `PAISES` VALUES(130, 'MO', 'Macao');
      INSERT INTO `PAISES` VALUES(131, 'MK', 'ARY Macedonia');
      INSERT INTO `PAISES` VALUES(132, 'MG', 'Madagascar');
      INSERT INTO `PAISES` VALUES(133, 'MY', 'Malasia');
      INSERT INTO `PAISES` VALUES(134, 'MW', 'Malawi');
      INSERT INTO `PAISES` VALUES(135, 'MV', 'Maldivas');
      INSERT INTO `PAISES` VALUES(136, 'ML', 'Malí');
      INSERT INTO `PAISES` VALUES(137, 'MT', 'Malta');
      INSERT INTO `PAISES` VALUES(138, 'FK', 'Islas Malvinas');
      INSERT INTO `PAISES` VALUES(139, 'MP', 'Islas Marianas del Norte');
      INSERT INTO `PAISES` VALUES(140, 'MA', 'Marruecos');
      INSERT INTO `PAISES` VALUES(141, 'MH', 'Islas Marshall');
      INSERT INTO `PAISES` VALUES(142, 'MQ', 'Martinica');
      INSERT INTO `PAISES` VALUES(143, 'MU', 'Mauricio');
      INSERT INTO `PAISES` VALUES(144, 'MR', 'Mauritania');
      INSERT INTO `PAISES` VALUES(145, 'YT', 'Mayotte');
      INSERT INTO `PAISES` VALUES(146, 'MX', 'México');
      INSERT INTO `PAISES` VALUES(147, 'FM', 'Micronesia');
      INSERT INTO `PAISES` VALUES(148, 'MD', 'Moldavia');
      INSERT INTO `PAISES` VALUES(149, 'MC', 'Mónaco');
      INSERT INTO `PAISES` VALUES(150, 'MN', 'Mongolia');
      INSERT INTO `PAISES` VALUES(151, 'MS', 'Montserrat');
      INSERT INTO `PAISES` VALUES(152, 'MZ', 'Mozambique');
      INSERT INTO `PAISES` VALUES(153, 'MM', 'Myanmar');
      INSERT INTO `PAISES` VALUES(154, 'NA', 'Namibia');
      INSERT INTO `PAISES` VALUES(155, 'NR', 'Nauru');
      INSERT INTO `PAISES` VALUES(156, 'NP', 'Nepal');
      INSERT INTO `PAISES` VALUES(157, 'NI', 'Nicaragua');
      INSERT INTO `PAISES` VALUES(158, 'NE', 'Níger');
      INSERT INTO `PAISES` VALUES(159, 'NG', 'Nigeria');
      INSERT INTO `PAISES` VALUES(160, 'NU', 'Niue');
      INSERT INTO `PAISES` VALUES(161, 'NF', 'Isla Norfolk');
      INSERT INTO `PAISES` VALUES(162, 'NO', 'Noruega');
      INSERT INTO `PAISES` VALUES(163, 'NC', 'Nueva Caledonia');
      INSERT INTO `PAISES` VALUES(164, 'NZ', 'Nueva Zelanda');
      INSERT INTO `PAISES` VALUES(165, 'OM', 'Omán');
      INSERT INTO `PAISES` VALUES(166, 'NL', 'Países Bajos');
      INSERT INTO `PAISES` VALUES(167, 'PK', 'Pakistán');
      INSERT INTO `PAISES` VALUES(168, 'PW', 'Palau');
      INSERT INTO `PAISES` VALUES(169, 'PS', 'Palestina');
      INSERT INTO `PAISES` VALUES(170, 'PA', 'Panamá');
      INSERT INTO `PAISES` VALUES(171, 'PG', 'Papúa Nueva Guinea');
      INSERT INTO `PAISES` VALUES(172, 'PY', 'Paraguay');
      INSERT INTO `PAISES` VALUES(173, 'PE', 'Perú');
      INSERT INTO `PAISES` VALUES(174, 'PN', 'Islas Pitcairn');
      INSERT INTO `PAISES` VALUES(175, 'PF', 'Polinesia Francesa');
      INSERT INTO `PAISES` VALUES(176, 'PL', 'Polonia');
      INSERT INTO `PAISES` VALUES(177, 'PT', 'Portugal');
      INSERT INTO `PAISES` VALUES(178, 'PR', 'Puerto Rico');
      INSERT INTO `PAISES` VALUES(179, 'QA', 'Qatar');
      INSERT INTO `PAISES` VALUES(180, 'GB', 'Reino Unido');
      INSERT INTO `PAISES` VALUES(181, 'RE', 'Reunión');
      INSERT INTO `PAISES` VALUES(182, 'RW', 'Ruanda');
      INSERT INTO `PAISES` VALUES(183, 'RO', 'Rumania');
      INSERT INTO `PAISES` VALUES(184, 'RU', 'Rusia');
      INSERT INTO `PAISES` VALUES(185, 'EH', 'Sahara Occidental');
      INSERT INTO `PAISES` VALUES(186, 'SB', 'Islas Salomón');
      INSERT INTO `PAISES` VALUES(187, 'WS', 'Samoa');
      INSERT INTO `PAISES` VALUES(188, 'AS', 'Samoa Americana');
      INSERT INTO `PAISES` VALUES(189, 'KN', 'San Cristóbal y Nevis');
      INSERT INTO `PAISES` VALUES(190, 'SM', 'San Marino');
      INSERT INTO `PAISES` VALUES(191, 'PM', 'San Pedro y Miquelón');
      INSERT INTO `PAISES` VALUES(192, 'VC', 'San Vicente y las Granadinas');
      INSERT INTO `PAISES` VALUES(193, 'SH', 'Santa Helena');
      INSERT INTO `PAISES` VALUES(194, 'LC', 'Santa Lucía');
      INSERT INTO `PAISES` VALUES(195, 'ST', 'Santo Tomé y Príncipe');
      INSERT INTO `PAISES` VALUES(196, 'SN', 'Senegal');
      INSERT INTO `PAISES` VALUES(197, 'CS', 'Serbia y Montenegro');
      INSERT INTO `PAISES` VALUES(198, 'SC', 'Seychelles');
      INSERT INTO `PAISES` VALUES(199, 'SL', 'Sierra Leona');
      INSERT INTO `PAISES` VALUES(200, 'SG', 'Singapur');
      INSERT INTO `PAISES` VALUES(201, 'SY', 'Siria');
      INSERT INTO `PAISES` VALUES(202, 'SO', 'Somalia');
      INSERT INTO `PAISES` VALUES(203, 'LK', 'Sri Lanka');
      INSERT INTO `PAISES` VALUES(204, 'SZ', 'Suazilandia');
      INSERT INTO `PAISES` VALUES(205, 'ZA', 'Sudáfrica');
      INSERT INTO `PAISES` VALUES(206, 'SD', 'Sudán');
      INSERT INTO `PAISES` VALUES(207, 'SE', 'Suecia');
      INSERT INTO `PAISES` VALUES(208, 'CH', 'Suiza');
      INSERT INTO `PAISES` VALUES(209, 'SR', 'Surinam');
      INSERT INTO `PAISES` VALUES(210, 'SJ', 'Svalbard y Jan Mayen');
      INSERT INTO `PAISES` VALUES(211, 'TH', 'Tailandia');
      INSERT INTO `PAISES` VALUES(212, 'TW', 'Taiwán');
      INSERT INTO `PAISES` VALUES(213, 'TZ', 'Tanzania');
      INSERT INTO `PAISES` VALUES(214, 'TJ', 'Tayikistán');
      INSERT INTO `PAISES` VALUES(215, 'IO', 'Territorio Británico del Océano Índico');
      INSERT INTO `PAISES` VALUES(216, 'TF', 'Territorios Australes Franceses');
      INSERT INTO `PAISES` VALUES(217, 'TL', 'Timor Oriental');
      INSERT INTO `PAISES` VALUES(218, 'TG', 'Togo');
      INSERT INTO `PAISES` VALUES(219, 'TK', 'Tokelau');
      INSERT INTO `PAISES` VALUES(220, 'TO', 'Tonga');
      INSERT INTO `PAISES` VALUES(221, 'TT', 'Trinidad y Tobago');
      INSERT INTO `PAISES` VALUES(222, 'TN', 'Túnez');
      INSERT INTO `PAISES` VALUES(223, 'TC', 'Islas Turcas y Caicos');
      INSERT INTO `PAISES` VALUES(224, 'TM', 'Turkmenistán');
      INSERT INTO `PAISES` VALUES(225, 'TR', 'Turquía');
      INSERT INTO `PAISES` VALUES(226, 'TV', 'Tuvalu');
      INSERT INTO `PAISES` VALUES(227, 'UA', 'Ucrania');
      INSERT INTO `PAISES` VALUES(228, 'UG', 'Uganda');
      INSERT INTO `PAISES` VALUES(229, 'UY', 'Uruguay');
      INSERT INTO `PAISES` VALUES(230, 'UZ', 'Uzbekistán');
      INSERT INTO `PAISES` VALUES(231, 'VU', 'Vanuatu');
      INSERT INTO `PAISES` VALUES(232, 'VE', 'Venezuela');
      INSERT INTO `PAISES` VALUES(233, 'VN', 'Vietnam');
      INSERT INTO `PAISES` VALUES(234, 'VG', 'Islas Vírgenes Británicas');
      INSERT INTO `PAISES` VALUES(235, 'VI', 'Islas Vírgenes de los Estados Unidos');
      INSERT INTO `PAISES` VALUES(236, 'WF', 'Wallis y Futuna');
      INSERT INTO `PAISES` VALUES(237, 'YE', 'Yemen');
      INSERT INTO `PAISES` VALUES(238, 'DJ', 'Yibuti');
      INSERT INTO `PAISES` VALUES(239, 'ZM', 'Zambia');
      INSERT INTO `PAISES` VALUES(240, 'ZW', 'Zimbabue');
