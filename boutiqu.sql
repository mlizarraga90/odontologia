/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.1.30-MariaDB : Database - boutique
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`boutique` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `boutique`;

/*Table structure for table `colores` */

DROP TABLE IF EXISTS `colores`;

CREATE TABLE `colores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creadoPor` int(11) DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=Activo,0=inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

/*Data for the table `colores` */

insert  into `colores`(`id`,`descripcion`,`fechaRegistro`,`creadoPor`,`modificadoPor`,`fechaModificacion`,`status`) values (1,'NUEVO1990','2019-06-24 16:01:14',NULL,NULL,NULL,0),(2,'papa','2019-06-24 16:15:05',NULL,NULL,NULL,0),(3,'wrwer','2019-06-24 16:19:21',NULL,NULL,NULL,0),(4,'COLOR','2019-06-24 16:50:47',NULL,NULL,NULL,1);

/*Table structure for table `grupos` */

DROP TABLE IF EXISTS `grupos`;

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creadoPor` int(11) DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=Activo,0=inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

/*Data for the table `grupos` */

insert  into `grupos`(`id`,`descripcion`,`fechaRegistro`,`creadoPor`,`modificadoPor`,`fechaModificacion`,`status`) values (1,'NUEVO1990','2019-06-24 16:01:14',NULL,NULL,NULL,1),(2,'papa','2019-06-24 16:15:05',NULL,NULL,NULL,1),(3,'wrwer','2019-06-24 16:19:21',NULL,NULL,NULL,1);

/*Table structure for table `ipsblocked` */

DROP TABLE IF EXISTS `ipsblocked`;

CREATE TABLE `ipsblocked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` char(64) DEFAULT NULL,
  `usuario` char(20) DEFAULT NULL COMMENT 'usuario que intenta acceder al sistma',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `ipsblocked` */

/*Table structure for table `lineas` */

DROP TABLE IF EXISTS `lineas`;

CREATE TABLE `lineas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creadoPor` int(11) DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=Activo,0=inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

/*Data for the table `lineas` */

insert  into `lineas`(`id`,`descripcion`,`fechaRegistro`,`creadoPor`,`modificadoPor`,`fechaModificacion`,`status`) values (1,'nuevo linea','2019-06-24 16:23:21',NULL,NULL,NULL,1),(2,'werewr','2019-06-24 16:23:45',NULL,NULL,NULL,1);

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creadoPor` int(11) DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=Activo,0=inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

/*Data for the table `marcas` */

insert  into `marcas`(`id`,`descripcion`,`fechaRegistro`,`creadoPor`,`modificadoPor`,`fechaModificacion`,`status`) values (1,'marca nueva 1990','2019-06-24 16:27:09',NULL,NULL,NULL,0),(2,'MARCAS','2019-06-24 16:32:32',NULL,NULL,NULL,1);

/*Table structure for table `modulos` */

DROP TABLE IF EXISTS `modulos`;

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `body` text,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `modulos` */

insert  into `modulos`(`id`,`nombre`,`descripcion`,`orden`,`icono`,`body`,`title`,`status`) values (1,'GRUPOS','GRUPOS',1,NULL,'\r\n<div class=\"col-lg-9     col-md-9  col-sm-8  col-xs-6\">&nbsp;</div>\r\n<div class=\" col-lg-3   col-md-3  col-sm-4  col-xs-6 \">\r\n	<button class=\"btn btn-primary button\" type=\"button\" id=\"openModal\">NUEVO</button>\r\n</div>\r\n<div class=\"table-responsive py-4\">\r\n	<table class=\"table table-flush\" id=\"tblGrupos\">\r\n		<thead class=\"thead-light\">\r\n			<tr>\r\n				<th>Descripcion</th>\r\n				<th>Fecha registro</th> \r\n				<th>Eliminar</th>\r\n			</tr>\r\n		</thead>\r\n		<tfoot>\r\n			<tr>\r\n				<th>descripcion</th>\r\n				<th>Fecha registro</th>\r\n				<th></th>\r\n			</tr>\r\n		</tfoot>\r\n		<tbody></tbody>\r\n	</table>\r\n</div>\r\n<!-- Modal -->\r\n<div class=\"modal fade\" id=\"dlgCrud\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\r\n	<div class=\"modal-dialog modal-lg modal-dialog-centered\" role=\"document\">\r\n		<div class=\"modal-content\">\r\n			<div class=\"modal-header\">\r\n				<h5 class=\"modal-title\" id=\"exampleModalLabel\">GRUPOS</h5>\r\n				<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\r\n			</div>\r\n			<div class=\"modal-body\">\r\n				<form id=\"frmGrupo\">\r\n					<div class=\"row\">\r\n						<div class=\"\">\r\n							<label for=\"txtId\" class=\"form-control-label\"></label>\r\n							<input type=\"hidden\" class=\"form-control form-control-sm\" placeholder=\"\" id=\"txtId\" name=\"id\">\r\n						</div>\r\n						<div class=\"col-lg-12\">\r\n							<label for=\"txtDescripcion\" class=\"form-control-label\">Descripción</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"DESCRIPCIÓN\" id=\"txtDescripcion\" name=\"descripcion\">\r\n						</div>\r\n					</div>\r\n				</form>\r\n			</div>\r\n			<div class=\"modal-footer\">\r\n				<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">CERRAR</button>\r\n				<button type=\"button\" class=\"btn btn-primary\" id=\"btnAgregar\">GUARDAR</button>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<script src=\"/boutique/assets/js/catalogos/grupos_view.js\"></script>','GRUPOS',1),(2,'MARCAS','MARCAS',2,NULL,'<div class=\"col-lg-9     col-md-9  col-sm-8  col-xs-6\">&nbsp;</div>\r\n<div class=\" col-lg-3   col-md-3  col-sm-4  col-xs-6 \">\r\n	<button class=\"btn btn-primary button\" type=\"button\" id=\"openModal\">NUEVO</button>\r\n</div>\r\n<div class=\"table-responsive py-4\">\r\n	<table class=\"table table-flush\" id=\"tblMarcas\">\r\n		<thead class=\"thead-light\">\r\n			<tr>\r\n				<th>Descripcion</th>\r\n				<th>Fecha registro</th> \r\n				<th>Eliminar</th>\r\n			</tr>\r\n		</thead>\r\n		<tfoot>\r\n			<tr>\r\n				<th>descripcion</th>\r\n				<th>Fecha registro</th>\r\n				<th></th>\r\n			</tr>\r\n		</tfoot>\r\n		<tbody></tbody>\r\n	</table>\r\n</div>\r\n<!-- Modal -->\r\n<div class=\"modal fade\" id=\"dlgCrud\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\r\n	<div class=\"modal-dialog modal-lg modal-dialog-centered\" role=\"document\">\r\n		<div class=\"modal-content\">\r\n			<div class=\"modal-header\">\r\n				<h5 class=\"modal-title\" id=\"exampleModalLabel\">MARCAS</h5>\r\n				<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\r\n			</div>\r\n			<div class=\"modal-body\">\r\n				<form id=\"frmGrupo\">\r\n					<div class=\"row\">\r\n						<div class=\"\">\r\n							<label for=\"txtId\" class=\"form-control-label\"></label>\r\n							<input type=\"hidden\" class=\"form-control form-control-sm\" placeholder=\"\" id=\"txtId\" name=\"id\">\r\n						</div>\r\n						<div class=\"col-lg-12\">\r\n							<label for=\"txtDescripcion\" class=\"form-control-label\">Descripción</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"DESCRIPCIÓN\" id=\"txtDescripcion\" name=\"descripcion\">\r\n						</div>\r\n					</div>\r\n				</form>\r\n			</div>\r\n			<div class=\"modal-footer\">\r\n				<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">CERRAR</button>\r\n				<button type=\"button\" class=\"btn btn-primary\" id=\"btnAgregar\">GUARDAR</button>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<script src=\"/boutique/assets/js/catalogos/marcas.js\"></script>','MARCAS',1),(3,'LINEAS','LINEAS',3,NULL,'\r\n<div class=\"col-lg-9     col-md-9  col-sm-8  col-xs-6\">&nbsp;</div>\r\n<div class=\" col-lg-3   col-md-3  col-sm-4  col-xs-6 \">\r\n	<button class=\"btn btn-primary button\" type=\"button\" id=\"openModal\">NUEVO</button>\r\n</div>\r\n<div class=\"table-responsive py-4\">\r\n	<table class=\"table table-flush\" id=\"tblLineas\">\r\n		<thead class=\"thead-light\">\r\n			<tr>\r\n				<th>Descripcion</th>\r\n				<th>Fecha registro</th> \r\n				<th>Eliminar</th>\r\n			</tr>\r\n		</thead>\r\n		<tfoot>\r\n			<tr>\r\n				<th>descripcion</th>\r\n				<th>Fecha registro</th>\r\n				<th></th>\r\n			</tr>\r\n		</tfoot>\r\n		<tbody></tbody>\r\n	</table>\r\n</div>\r\n<!-- Modal -->\r\n<div class=\"modal fade\" id=\"dlgCrud\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\r\n	<div class=\"modal-dialog modal-lg modal-dialog-centered\" role=\"document\">\r\n		<div class=\"modal-content\">\r\n			<div class=\"modal-header\">\r\n				<h5 class=\"modal-title\" id=\"exampleModalLabel\">LINEAS</h5>\r\n				<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\r\n			</div>\r\n			<div class=\"modal-body\">\r\n				<form id=\"frmGrupo\">\r\n					<div class=\"row\">\r\n						<div class=\"\">\r\n							<label for=\"txtId\" class=\"form-control-label\"></label>\r\n							<input type=\"hidden\" class=\"form-control form-control-sm\" placeholder=\"\" id=\"txtId\" name=\"id\">\r\n						</div>\r\n						<div class=\"col-lg-12\">\r\n							<label for=\"txtDescripcion\" class=\"form-control-label\">Descripción</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"DESCRIPCIÓN\" id=\"txtDescripcion\" name=\"descripcion\">\r\n						</div>\r\n					</div>\r\n				</form>\r\n			</div>\r\n			<div class=\"modal-footer\">\r\n				<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">CERRAR</button>\r\n				<button type=\"button\" class=\"btn btn-primary\" id=\"btnAgregar\">GUARDAR</button>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<script src=\"/boutique/assets/js/catalogos/lineas.js\"></script>','LINEAS',1),(4,'COLORES','COLORES',4,NULL,'\r\n<div class=\"col-lg-9     col-md-9  col-sm-8  col-xs-6\">&nbsp;</div>\r\n<div class=\" col-lg-3   col-md-3  col-sm-4  col-xs-6 \">\r\n	<button class=\"btn btn-primary button\" type=\"button\" id=\"openModal\">NUEVO</button>\r\n</div>\r\n<div class=\"table-responsive py-4\">\r\n	<table class=\"table table-flush\" id=\"tblColores\">\r\n		<thead class=\"thead-light\">\r\n			<tr>\r\n				<th>Descripcion</th>\r\n				<th>Fecha registro</th> \r\n				<th>Eliminar</th>\r\n			</tr>\r\n		</thead>\r\n		<tfoot>\r\n			<tr>\r\n				<th>descripcion</th>\r\n				<th>Fecha registro</th>\r\n				<th></th>\r\n			</tr>\r\n		</tfoot>\r\n		<tbody></tbody>\r\n	</table>\r\n</div>\r\n<!-- Modal -->\r\n<div class=\"modal fade\" id=\"dlgCrud\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\r\n	<div class=\"modal-dialog modal-lg modal-dialog-centered\" role=\"document\">\r\n		<div class=\"modal-content\">\r\n			<div class=\"modal-header\">\r\n				<h5 class=\"modal-title\" id=\"exampleModalLabel\">COLORES</h5>\r\n				<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\r\n			</div>\r\n			<div class=\"modal-body\">\r\n				<form id=\"frmGrupo\">\r\n					<div class=\"row\">\r\n						<div class=\"\">\r\n							<label for=\"txtId\" class=\"form-control-label\"></label>\r\n							<input type=\"hidden\" class=\"form-control form-control-sm\" placeholder=\"\" id=\"txtId\" name=\"id\">\r\n						</div>\r\n						<div class=\"col-lg-12\">\r\n							<label for=\"txtDescripcion\" class=\"form-control-label\">Descripción</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"DESCRIPCIÓN\" id=\"txtDescripcion\" name=\"descripcion\">\r\n						</div>\r\n					</div>\r\n				</form>\r\n			</div>\r\n			<div class=\"modal-footer\">\r\n				<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">CERRAR</button>\r\n				<button type=\"button\" class=\"btn btn-primary\" id=\"btnAgregar\">GUARDAR</button>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<script src=\"/boutique/assets/js/catalogos/colores.js\"></script>','COLORES',1),(5,'PROVEEDORES','PROVEEDORES',5,NULL,'\r\n<div class=\"col-lg-9     col-md-9  col-sm-8  col-xs-6\">&nbsp;</div>\r\n<div class=\" col-lg-3   col-md-3  col-sm-4  col-xs-6 \">\r\n	<button class=\"btn btn-primary button\" type=\"button\" id=\"openModal\">NUEVO</button>\r\n</div>\r\n<div class=\"table-responsive py-4\">\r\n	<table class=\"table table-flush\" id=\"tblProveedores\">\r\n		<thead class=\"thead-light\">\r\n			<tr>\r\n				<th>Nombre</th>\r\n				<th>RFC</th> \r\n				<th>Razón social</th>\r\n				<th>Contacto</th>\r\n				<th>Eliminar</th>\r\n			</tr>\r\n		</thead>\r\n		<tfoot>\r\n			<tr>\r\n				<th>Nombre</th>\r\n				<th>RFC</th> \r\n				<th>Razón social</th>\r\n				<th>Contacto</th>\r\n				<th></th>\r\n			</tr>\r\n		</tfoot>\r\n		<tbody></tbody>\r\n	</table>\r\n</div>\r\n<!-- Modal -->\r\n<div class=\"modal fade\" id=\"dlgCrud\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\r\n	<div class=\"modal-dialog modal-lg modal-dialog-centered\" role=\"document\">\r\n		<div class=\"modal-content\">\r\n			<div class=\"modal-header\">\r\n				<h5 class=\"modal-title\" id=\"exampleModalLabel\">PROVEEDORES</h5>\r\n				<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\r\n			</div>\r\n			<div class=\"modal-body\">\r\n				<form id=\"frmProveedores\">\r\n					<div class=\"row\">\r\n						<div class=\"\">\r\n							<label for=\"txtId\" class=\"form-control-label\"></label>\r\n							<input type=\"hidden\" class=\"form-control form-control-sm\" placeholder=\"\" id=\"txtId\" name=\"id\">\r\n						</div>\r\n						<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\r\n							<label for=\"txtNombreComercial\" class=\"form-control-label\">Nombre comercial</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Nombre comercial\" id=\"txtNombreComercial\" name=\"nombreComercial\">\r\n						</div>\r\n						<div class=\"col-lg-8 col-md-8 col-sm-7 col-xs-12\">\r\n							<label for=\"txtRazon\" class=\"form-control-label\">Razón social</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Razón social\" id=\"txtRazon\" name=\"razonSocial\">\r\n						</div>\r\n						<div class=\"col-lg-4 col-md-4 col-sm-5 col-xs-12\">\r\n							<label for=\"txtRfc\" class=\"form-control-label\">RFC</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"RFC\" id=\"txtRfc\" name=\"rfc\">\r\n						</div>\r\n						<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\r\n							<hr>\r\n						</div>\r\n						<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\r\n							<label for=\"txtDomicilio\" class=\"form-control-label\">Domicilio</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Domicilio\" id=\"txtDomicilio\" name=\"domicilio\">\r\n						</div>\r\n						<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">\r\n							<label for=\"txtCp\" class=\"form-control-label\">Codigo postal</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Codigo postal\" id=\"txtCp\" name=\"cp\">\r\n						</div>\r\n						<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">\r\n							<label for=\"txtCiudad\" class=\"form-control-label\">Ciudad</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Ciudad\" id=\"txtCiudad\" name=\"ciudad\">\r\n						</div>\r\n						<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">\r\n							<label for=\"txtEdo\" class=\"form-control-label\">Estado</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Estado\" id=\"txtEdo\" name=\"estado\">\r\n						</div>\r\n						<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">\r\n							<label for=\"txtTel\" class=\"form-control-label\">Teléfono</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Teléfono\" id=\"txtTel\" name=\"telefono\">\r\n						</div>\r\n						<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">\r\n							<label for=\"txtCorreo\" class=\"form-control-label\">Correo</label>\r\n							<input type=\"email\" class=\"form-control form-control-sm\" placeholder=\"Correo\" id=\"txtCorreo\" name=\"correo\">\r\n						</div>\r\n						<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">\r\n							<label for=\"txtFax\" class=\"form-control-label\">Fax</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Fax\" id=\"txtFax\" name=\"fax\">\r\n						</div>\r\n						<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\r\n							<label for=\"txtContacto\" class=\"form-control-label\">Contacto</label>\r\n							<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Contacto\" id=\"txtContacto\" name=\"contacto\">\r\n						</div>\r\n					</div>\r\n				</form>\r\n			</div>\r\n			<div class=\"modal-footer\">\r\n				<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">CERRAR</button>\r\n				<button type=\"button\" class=\"btn btn-primary\" id=\"btnAgregar\">GUARDAR</button>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<script src=\"/boutique/assets/js/catalogos/proveedores.js\"></script>','PROVEEDORES',1);

/*Table structure for table `perfiles` */

DROP TABLE IF EXISTS `perfiles`;

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(20) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creadoPor` int(11) DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `fechaModificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `perfiles` */

insert  into `perfiles`(`id`,`descripcion`,`fechaRegistro`,`creadoPor`,`modificadoPor`,`fechaModificacion`,`status`) values (1,'ADMINISTRADOR','2019-06-26 14:40:17',NULL,NULL,'0000-00-00 00:00:00',1);

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idModulo` int(11) DEFAULT NULL,
  `idPerfil` int(11) DEFAULT NULL,
  `escritura` tinyint(1) DEFAULT '0',
  `lectura` tinyint(1) DEFAULT '0',
  `actualizacion` tinyint(1) DEFAULT '0',
  `borrado` tinyint(1) DEFAULT '0',
  `general` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idPerfil` (`idPerfil`),
  KEY `idModulo` (`idModulo`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`id`),
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`idModulo`) REFERENCES `modulos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `permisos` */

insert  into `permisos`(`id`,`idModulo`,`idPerfil`,`escritura`,`lectura`,`actualizacion`,`borrado`,`general`) values (1,1,1,1,0,0,0,0),(2,2,1,1,0,0,0,0),(3,3,1,1,0,0,0,0),(4,4,1,1,0,0,0,0);

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreComercial` varchar(100) DEFAULT NULL,
  `razonSocial` varchar(100) DEFAULT NULL,
  `rfc` char(15) DEFAULT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `idEdo` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  `ciudad` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creadoPor` int(11) DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `ModificadoPor` int(11) DEFAULT NULL,
  `saldo` float(13,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=activo,0=inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `proveedores` */

insert  into `proveedores`(`id`,`nombreComercial`,`razonSocial`,`rfc`,`domicilio`,`cp`,`idEdo`,`estado`,`idCiudad`,`ciudad`,`telefono`,`fax`,`correo`,`contacto`,`fechaRegistro`,`creadoPor`,`fechaModificacion`,`ModificadoPor`,`saldo`,`status`) values (1,'TEKNOVATEMZT','MLH2012901990RAZON','MLH2012901990','CERRADA BUGANBILIAS #495 INF. ALARCÓN',82129,NULL,'SINALOA',NULL,'MAZATLÁN','9801010','--','mlizarraga1990@gmail.com','MANUEL LIZARRAGA HERNANDEZ','2019-06-24 17:21:19',NULL,NULL,NULL,NULL,1);

/*Table structure for table `sesiones` */

DROP TABLE IF EXISTS `sesiones`;

CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jr_recno` char(1) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUsuario` int(11) DEFAULT NULL,
  `userAgent` text,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

/*Data for the table `sesiones` */

/*Table structure for table `sucursales` */

DROP TABLE IF EXISTS `sucursales`;

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `razonSocial` varchar(100) DEFAULT NULL,
  `rfc` varchar(15) DEFAULT NULL,
  `curp` varchar(15) DEFAULT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `idEdo` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  `ciudad` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=Activo,0=inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sucursales` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` char(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `multipleCuenta` tinyint(1) DEFAULT '0' COMMENT '0=no,1=si',
  `intentos` int(11) DEFAULT '0' COMMENT '//intentos fallidos de logueo , mas de 3 se bloquea',
  `idSucursal` int(11) DEFAULT NULL,
  `idPerfil` int(11) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creadoPor` int(11) DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=ACITO,0=INACTIVO,2=BLOQUEADO',
  PRIMARY KEY (`id`),
  KEY `idSucursal` (`idSucursal`),
  KEY `idPerfil` (`idPerfil`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`id`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`usuario`,`password`,`multipleCuenta`,`intentos`,`idSucursal`,`idPerfil`,`fechaRegistro`,`creadoPor`,`fechaModificacion`,`modificadoPor`,`status`) values (1,'admin','202cb962ac59075b964b07152d234b70',0,4,NULL,1,'2019-06-25 14:51:46',NULL,NULL,NULL,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
