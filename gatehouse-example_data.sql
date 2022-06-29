-- Adminer 4.8.1 MySQL 5.5.5-10.1.48-MariaDB-0+deb9u2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `gatehouse`;


INSERT INTO `visits_avt` (`id`, `operator_id`, `fio`, `car`, `docum`, `date_in`, `time_in`, `date_out`, `time_out`, `propusk`, `prim`, `change_date`) VALUES
(1,	3,	'Васильев Г. Г.',	'А777ВС 99',	'доверенность 115',	'2022-04-14',	'15:20:00',	'2022-06-14',	'15:39:00',	'16',	'цех-2',	'2022-04-14 15:39:00'),
(2,	3,	'Герман М. Д.',	'О999АО 77',	'паспорт 2222 33333',	'2022-04-12',	'15:20:00',	NULL,	NULL,	'3',	'склад-1',	'2022-04-12 15:20:00');


INSERT INTO `visits_pos` (`id`, `operator_id`, `fio`, `docum`, `date_in`, `time_in`, `date_out`, `time_out`, `propusk`, `prim`, `change_date`) VALUES
(1,	3,	'Иванов В. В.',	'удостоверение 1512',	'2022-04-14',	'15:12:00',	'2022-04-14',	'15:48:00',	'15',	'IT',	'2022-04-14 15:48:00'),
(2,	3,	'Петров А. Б.',	'паспорт 0000 000000',	'2022-04-15',	'15:10:00',	NULL,	NULL,	'7',	'кадры',	'2022-04-15 15:10:00'),
(3,	3,	'Боширов В. В.',	'паспорт 1111 222222',	'2022-04-15',	'13:14:00',	NULL,	NULL,	'12',	'цех-1',	'2022-04-15 13:14:00');

