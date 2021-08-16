/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.20-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `encuestas` (
	`id` int (11),
	`utiliza_bicileta` varchar (15),
	`beneficios_considera` text ,
	`fub_ocio_deportiva` varchar (60),
	`fub_transporte` varchar (60),
	`fub_ir_trabajar` varchar (60),
	`idd_sacar_meter_domicilio` varchar (60),
	`idd_no_transporte_publico` varchar (60),
	`idd_robo_estacionada` varchar (60),
	`idd_dificultad_estacionada_seguro` varchar (60),
	`idd_falta_ciclovia` varchar (60),
	`idd_vias_alto_flujo` varchar (60),
	`idd_invacion_ciclovias_peatones_coches` varchar (60),
	`idd_conflictos_conductores_automoviles_motos_autobuses` varchar (60),
	`idd_conflictos_peatones_no_respetan` varchar (60),
	`idd_no_conocer_normas` varchar (60),
	`idd_conflictos_otros_ciclistas` varchar (60),
	`idd_peligro_circulacion_ciudad` varchar (60),
	`nub_no_disponer_bicicleta` varchar (60),
	`nub_no_condicion_fisica` varchar (60),
	`nub_sacar_meter_bicileta` varchar (60),
	`nub_imagen_social` varchar (60),
	`nub_no_poder_llevar_bici_transporte` varchar (60),
	`nub_conflictos_conductores_autobuses` varchar (60),
	`nub_conflictos_peatones` varchar (60),
	`nub_conflictos_otros_ciclistas` varchar (60),
	`nub_peligro_circulacion_ciudad` varchar (60),
	`ip` varchar (60),
	`created` datetime ,
	`coordenadas` varchar (765)
); 
