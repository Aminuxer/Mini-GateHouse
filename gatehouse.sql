-- Adminer 4.8.1 MySQL 5.5.5-10.1.48-MariaDB-0+deb9u2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `gatehouse` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gatehouse`;

CREATE TABLE `operators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL COMMENT 'Логин',
  `passwd` char(42) DEFAULT 'da39a3ee5e6b4b0d3255bfef95601890afd80709' COMMENT 'SHA1-хэш пароля',
  `is_root` tinyint(1) DEFAULT '0' COMMENT 'Суперпользователь - может все',
  `is_administrator` tinyint(1) DEFAULT '0' COMMENT 'Право настройки и мониторинга',
  `is_guard` tinyint(1) DEFAULT '0' COMMENT 'Право ввода данных',
  `name` varchar(200) DEFAULT '' COMMENT 'Имя или ФИО',
  `enable` tinyint(1) DEFAULT '0' COMMENT 'Разрешен ли логин',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Операторы системы';

INSERT INTO `operators` (`id`, `login`, `passwd`, `is_root`, `is_administrator`, `is_guard`, `name`, `enable`) VALUES
(1,	'root',	'da39a3ee5e6b4b0d3255bfef95601890afd80709',	1,	0,	0,	'Админ СБ',	1),
(2,	'admin',	'da39a3ee5e6b4b0d3255bfef95601890afd80709',	0,	1,	0,	'Начальник охраны',	1),
(3,	'user',	'da39a3ee5e6b4b0d3255bfef95601890afd80709',	0,	0,	1,	'Охранник',	1),
(4,	'readonly',	'da39a3ee5e6b4b0d3255bfef95601890afd80709',	0,	0,	0,	'Только просмотр текущих данных',	1);

CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abbr` varchar(20) DEFAULT NULL COMMENT 'Аббревиатура опции',
  `value` varchar(50) DEFAULT NULL COMMENT 'Значение опции',
  `type` set('b','i','t') DEFAULT NULL COMMENT 'Тип параметра (b - галка, i - целое, t - текст)',
  `name` varchar(200) DEFAULT NULL COMMENT 'Описание опции (текстом)',
  PRIMARY KEY (`id`),
  KEY `abbr` (`abbr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Настройки системы';

INSERT INTO `options` (`id`, `abbr`, `value`, `type`, `name`) VALUES
(1,	'index_page_title',	'Проходная',	't',	'Заголовок главного окна, которое видят охранники'),
(2,	'admin_page_title',	'Админка',	't',	'Заголовок окна формы администрирования'),
(3,	'index_add_pos_button',	'Пришёл',	't',	'Текст для кнопки, добавляющей посетителя'),
(4,	'index_add_avt_button',	'Приехал',	't',	'Текст для кнопки, добавляющей автомобиль'),
(5,	'index_add_pos_confm',	'йа-йа',	't',	'Текст для опции подтверждения посетителя'),
(6,	'index_add_avt_confm',	'угумс',	't',	'Текст для опции подтверждения автомобиля'),
(7,	'index_num_pos_dates',	'3',	'i',	'За сколько дней показывать посетителей'),
(8,	'index_num_avt_dates',	'3',	'i',	'За сколько дней показывать автомобили'),
(9,	'index_date_edit',	'0',	'b',	'Разрешать охранникам редактировать даты'),
(10,	'index_time_edit',	'1',	'b',	'Разрешать охранникам редактировать время'),
(11,	'index_confirm_button',	'Так точно !',	't',	'Текст для кнопок подтверждения (ОК, ДА и тп)'),
(12,	'index_pos_edit_text',	'Исправить',	't',	'Текст для ссылки редактирования посетителя'),
(13,	'index_avt_edit_text',	'Исправить',	't',	'Текст для ссылки редактирования автомобиля'),
(14,	'index_tech_support',	'Aminuxer@GitHub',	't',	'Служба поддержки (строка в правилах пользования)'),
(15,	'index_cancel_button',	'Отставить !',	't',	'Текст для кнопок Cancel, Отмена и тп'),
(16,	'index_pos_ststr',	'---***---',	't',	'Дефолтная статус-строка для посетителей'),
(17,	'index_avt_ststr',	'---*---',	't',	'Дефолтная статус-строка для автомобилей'),
(18,	'admin_apply_filters',	'Поиск',	't',	'Текст для кнопки, запускающей фильтры'),
(19,	'index_cancel_delay',	'0',	'i',	'Задержка (сек) при нажатии [отмены]'),
(20,	'index_action_delay',	'0',	'i',	'Задержка (сек) при выполнении действия'),
(21,	'admin_save_changes',	'Сохранить настройки',	't',	'Текст для кнопки сохранения настроек'),
(22,	'admin_cancel_button',	'Отмена',	't',	'Текст для кнопок сброса в админке'),
(23,	'admin_no_data',	'Нет данных.',	't',	'Сообщение об отсутствии данных (для фильтров)'),
(24,	'index_print_checkbox',	'печать',	't',	'Текст у чекбокса \"для печати\"'),
(25,	'index_show_reset_pwd',	'1',	'b',	'Показывать ссылку сброса своего пароля'),
(26,	'admin_min_pswd_diff',	'0',	'i',	'Минимальная сложность  пароля (число типов символов, 0-8)');

CREATE TABLE `stat` (
  `stat_id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `time` time NOT NULL DEFAULT '00:00:00',
  `obj_type` set('v',' a',' h') DEFAULT NULL,
  `obj_id` mediumint(10) NOT NULL DEFAULT '0',
  `obj_event` text NOT NULL,
  `operator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stat_id`),
  KEY `date` (`date`),
  KEY `time` (`time`),
  KEY `obj_type` (`obj_type`),
  KEY `obj_id` (`obj_id`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `stat_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Statistic';


CREATE TABLE `visits_avt` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `operator_id` int(11) NOT NULL,
  `fio` varchar(200) NOT NULL DEFAULT '' COMMENT 'ФИО',
  `car` varchar(50) DEFAULT NULL COMMENT 'Номер и марка машины',
  `docum` varchar(50) DEFAULT NULL COMMENT 'Номер паспорта или иного документа',
  `date_in` date DEFAULT NULL COMMENT 'дата прихода',
  `time_in` time DEFAULT NULL COMMENT 'время прихода',
  `date_out` date DEFAULT NULL COMMENT 'дата ухода',
  `time_out` time DEFAULT NULL COMMENT 'время ухода',
  `propusk` varchar(20) DEFAULT NULL COMMENT 'номер пропуска',
  `prim` varchar(200) DEFAULT NULL COMMENT 'Цель визита (к кому) + примечание',
  `change_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата и время последнего изменения',
  PRIMARY KEY (`id`),
  KEY `date_in` (`date_in`),
  KEY `time_in` (`time_in`),
  KEY `date_out` (`date_out`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `visits_avt_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица автомобилей';


CREATE TABLE `visits_pos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operator_id` int(11) NOT NULL,
  `fio` varchar(200) NOT NULL DEFAULT '' COMMENT 'ФИО',
  `docum` varchar(50) DEFAULT NULL COMMENT 'Номер паспорта или иного документа',
  `date_in` date DEFAULT NULL COMMENT 'дата прихода',
  `time_in` time DEFAULT NULL COMMENT 'время прихода',
  `date_out` date DEFAULT NULL COMMENT 'дата ухода',
  `time_out` time DEFAULT NULL COMMENT 'время ухода',
  `propusk` varchar(20) DEFAULT NULL COMMENT 'номер пропуска',
  `prim` varchar(200) DEFAULT NULL COMMENT 'Цель визита (к кому) + примечание',
  `change_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата и время последнего изменения',
  PRIMARY KEY (`id`),
  KEY `date_in` (`date_in`),
  KEY `time_in` (`time_in`),
  KEY `date_out` (`date_out`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `visits_pos_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица посетителей';


-- 2022-06-29 13:41:48
