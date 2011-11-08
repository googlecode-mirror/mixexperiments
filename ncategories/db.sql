/*
SQLyog Enterprise - MySQL GUI
MySQL - 5.0.51b-community-nt 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `n_categories` (
	`cat_id` double ,
	`cat_name` varchar (60),
	`parent_id` double 
); 
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('1','Book','0');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('2','Mobile','0');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('3','Engineering','1');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('4','Gsm','2');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('5','Computer','3');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('6','Software','5');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('7','Web Devlelopement','6');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('8','Opensource','7');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('9','PHP','8');
insert into `n_categories` (`cat_id`, `cat_name`, `parent_id`) values('10','Dual Sim','4');
