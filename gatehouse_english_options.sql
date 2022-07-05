-- Adminer 4.8.1 MySQL 5.5.5-10.1.48-MariaDB-0+deb9u2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `gatehouse`;

REPLACE INTO `operators` (`id`, `login`, `passwd`, `is_root`, `is_administrator`, `is_guard`, `name`, `enable`) VALUES
(1,	'root',	'da39a3ee5e6b4b0d3255bfef95601890afd80709',	1,	0,	0,	'Root Sysadmin',	1),
(2,	'admin',	'da39a3ee5e6b4b0d3255bfef95601890afd80709',	0,	1,	0,	'Guard Chef',	1),
(3,	'user',	'da39a3ee5e6b4b0d3255bfef95601890afd80709',	0,	0,	1,	'Guard',	1),
(4,	'readonly',	'da39a3ee5e6b4b0d3255bfef95601890afd80709',	0,	0,	0,	'Only view data',	1);

REPLACE INTO `options` (`id`, `abbr`, `value`, `type`, `name`) VALUES
(1,	'index_page_title',	'Mini-GateHouse',	't',	'Main window header for guards'),
(2,	'admin_page_title',	'ADMIN',	't',	'Admin form header'),
(3,	'index_add_pos_button',	'Arrive',	't',	'Add visitor button text'),
(4,	'index_add_avt_button',	'Arrive',	't',	'Add car button text'),
(5,	'index_add_pos_confm',	'Ready',	't',	'Option text for confirm visitor'),
(6,	'index_add_avt_confm',	'Ready',	't',	'Option text for confirm car'),
(7,	'index_num_pos_dates',	'3',	'i',	'View visitors for this last days'),
(8,	'index_num_avt_dates',	'3',	'i',	'View cars for this last days'),
(9,	'index_date_edit',	'0',	'b',	'Allow guards edit date'),
(10,	'index_time_edit',	'1',	'b',	'Allow guards edit time'),
(11,	'index_confirm_button',	'Input data',	't',	'Text for confirm buttons (ОК, Yes, Ya etc)'),
(12,	'index_pos_edit_text',	'Edit',	't',	'Text for visitor editing link'),
(13,	'index_avt_edit_text',	'Edit',	't',	'Text for car editing link'),
(14,	'index_tech_support',	'Aminuxer@GitHub',	't',	'Tech support (string in Usage Rules)'),
(15,	'index_cancel_button',	'Decline',	't',	'Text for deny buttons Cancel, No, Discard, etc'),
(16,	'index_pos_ststr',	'---***---',	't',	'default status-sting in visitors form'),
(17,	'index_avt_ststr',	'---*---',	't',	'default status-sting in cars form'),
(18,	'admin_apply_filters',	'Search',	't',	'Text for filters button'),
(19,	'index_cancel_delay',	'0',	'i',	'Delay (seconds) at press [Cancel]'),
(20,	'index_action_delay',	'0',	'i',	'Delay (seconds) at action'),
(21,	'admin_save_changes',	'Save settings',	't',	'Save settings button text'),
(22,	'admin_cancel_button',	'Cancel',	't',	'Reset button Text'),
(23,	'admin_no_data',	'No data.',	't',	'Message NO-Data (for filters)'),
(24,	'index_print_checkbox',	'print',	't',	'Text for checkbiox "for print"'),
(25,	'index_show_reset_pwd',	'1',	'b',	'Show link for reset operator password'),
(26,	'admin_min_pswd_diff',	'0',	'i',	'Minimal password complexity (number of symbols types, 0-8)');

-- 2022-06-29 13:41:48
