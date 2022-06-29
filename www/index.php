<?php
$ops = isset($_GET['ops']) ? $_GET['ops'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '' ;
$prnt = isset($_GET['prnt']) ? $_GET['prnt'] : '' ;
if ( preg_replace("/[0-9]/", "", $id) != '' ) {$id = 0 ;}

ob_start('ob_gzhandler');
require("options.php");   /* подключим файл настроек, из него берутся $db_hoster, $db_login, $db_pwd, $db_name */
include("disable_cache_headers.php");

   /* START LOAD OPTIONS */
$curr_date = date("Y-m-d");   /* Значение текущей даты */
$curr_time = date("H:i:s");   /* Значение текущего времени */

   /* START ЗНАЧЕНИЯ ПО УМОЛЧАНИЮ (Вдруг в БД таблица опций грохнулась) */
$index_page_title = 'УЧЕТ ПОСЕТЕТЕЛЕЙ / АВТОМОБИЛЕЙ';   # Заголовок окна браузера
$admin_page_title = 'Настройка';            # Заголовок окна браузера для админки
$index_add_pos_button = 'ДОБАВИТЬ ВИЗИТ';                 # Надпись на кнопке добавления посетителя
$index_add_avt_button = 'ДОБАВИТЬ МАШИНУ';                # Надпись на кнопке добавления автомобиля
$index_add_pos_confm = 'Все верно';                  # Подтверждение для посетителя (галка)
$index_add_avt_confm = 'Все верно';                  # Подтверждение для автомобиля (галка)
$index_num_pos_dates = '5';                            # За сколько дней показывать посетителей
$index_num_avt_dates = '5';                            # За сколько дней показывать автомобили
$index_date_edit = '1';                          # Позволять ли редактировать дату
$index_time_edit = '1';                          # Позволять ли редактировать время
$index_confirm_button = 'Так точно !';                 # Текст для кнопок [OK], [Да]
$index_cancel_button = '[ СБРОС ]';               # Текст для кнопок [Cancel], [Нет]
$index_pos_edit_text = 'Ввести время';             # Текст ссылки для ухода посетителя
$index_avt_edit_text = 'Ввести время';             # Текст ссылки для выезда автомобиля
$index_pos_ststr = '[F5] - Обновить время';       # Текст статус-строки для посетителя
$index_avt_ststr = '[F5] - Обновить время';       # Текст статус-строки для автомобиля
$index_tech_support = 'Звоните в Тех.Отдел :)';   # В "Правилах" - данные о суппорте
$admin_apply_filters = 'Применить фильтры';       # Текст для кнопки, запускающей фильтры
$admin_cancel_button = 'Сброс';             # Текст для кнопки сброса фильтров
$admin_no_data = 'Нет данных';               # Сообщение об отсутствии данных.
$admin_save_changes = 'СОХРАНИТЬ ИЗМЕНЕНИЯ' ;     # Текст для кнопки сохранения настроек
$index_cancel_delay = '0';                        # Задержка (сек) при нажатии [отмены]
$index_action_delay = '1';                        # Задержка (сек) при выполнении действия
   /* END ЗНАЧЕНИЯ ПО УМОЛЧАНИЮ (Вдруг в БД таблица опций грохнулась) */

$auth_ok = '0';
$sql = mysqli_connect($db_hoster, $db_login, $db_pwd, $db_name) or $auth_ok = 'ERROR - connection to server FAILED';
               mysqli_query($sql, "SET NAMES UTF-8;");   /* Без этого текст будет кракозяблами */
$options_res = mysqli_query ($sql, "SELECT abbr, value FROM options") or print '<font class="std">Нет таблицы настроек - применены стандартные;</font><Br><Br>';
while ($ops_row = mysqli_fetch_array($options_res)) {
   $opsrabbr = $ops_row["abbr"];
   ${$opsrabbr} = $ops_row["value"];
}

function add_stat($type, $id, $event)
{ $event .= ' ; ['.$_SERVER['REMOTE_ADDR'].'];';
   global $user_info;
   global $sql;
$datee = date("Y-m-d") ; $timee = date("H:i:s"); $event = addslashes ($event);
$stat_query = 'INSERT INTO `stat` ( `date` , `time` , `obj_type` , `obj_id` , `obj_event`, `operator_id` )
                               VALUES (\''.$datee.'\', \''.$timee.'\', \''.$type.'\', \''.$id.'\', \''.$event.'\', \''.$user_info['id'].'\')' ;
$stat_status = mysqli_query ($sql, $stat_query) ; return ; }

$null_sha1 = 'da39a3ee5e6b4b0d3255bfef95601890afd80709'; /* SHA1-хэш пустой строки */
$script_name = $_SERVER['SCRIPT_NAME']; /* Имя скрипта */
$auth_err_redirector = '<META HTTP-EQUIV="Refresh" CONTENT="2; URL='.$script_name.'">';
$session_id_base_length = 177; /* Длина сессионного ключа (базовая, без контрольной суммы) */

/* Функция проверки класса сложности пароля. */
function get_password_complex ($pass) { $pass = trim($pass);
if (strlen($pass) > 0) { $diff = 0; } ELSE { return -1; }
if (preg_match("/[a-z]{1,}/", $pass)) $diff++;
if (preg_match("/[A-Z]{1,}/", $pass)) $diff++;
if (preg_match("/[а-я]{1,}/", $pass)) $diff++;
if (preg_match("/[А-Я]{1,}/", $pass)) $diff++;
if (preg_match("/[0-9]{1,}/", $pass)) $diff++;
if (preg_match("/[-\~\`\!\"\'\|\№\#\$\&\^\%\@\;\%\:\?\*\/\+\_\=\.\,]{1,}/", $pass)) $diff++;
if (preg_match("/[\(\)\{\}]{1,}/", $pass)) $diff++;
if (preg_match("/[!:print:]{1,}/", $pass)) $diff++;
return $diff; }

/* Функция генерации случайного пароля заданной длинны. Второй параметр - набор символов */
function generate_random_password($length=15, $arr='abcdefghijkmnoprstuvxyzABCDEFGHJKLMNPQRSTUVXYZ23456789_~!@#$%^&*') {
  $length = (int)$length; $pass = ""; srand( ((int)((double)microtime()*1000003)) );   if ($length == 0) { $length = 15; }
  for($i = 0; $i < $length; $i++) { $index = rand(0, strlen($arr) - 1); $pass .= $arr[$index]; }   return $pass; }
function ClearCookie() { SetCookie('ox_login',''); SetCookie('ox_key',''); SetCookie('ox_subkey1',''); global $db_add_rnd_key, $session_id_base_length;
  $new_session_id = generate_random_password($session_id_base_length, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
  $new_session_id .= substr(base64_encode(SHA1($new_session_id.$db_add_rnd_key)), 0, -2); SetCookie('ox_session_id', $new_session_id); return; };

$cookie_session_id = isset ($_COOKIE['ox_session_id']) ? $_COOKIE['ox_session_id'] : '' ;
$cookie_login = isset ($_COOKIE['ox_login']) ? $_COOKIE['ox_login'] : '' ;
$cookie_key = isset ($_COOKIE['ox_key']) ? $_COOKIE['ox_key'] : '' ;
$post_ff_login = isset ($_POST['ff_login']) ? $_POST['ff_login'] : '' ;
$post_ff_pwd = isset ($_POST['ff_pwd']) ? $_POST['ff_pwd'] : '' ;
$cook_date = date("Y");
  if (strlen($cookie_session_id) == 0 AND $id == '' ) { ClearCookie();
print '<META HTTP-EQUIV="Refresh" CONTENT="0; URL='.$script_name.'"><a href="'.$script_name.'"> [ Entrance again ] </a>'; die; }
if (strlen($cookie_session_id) > 0) {   /* Если кукисы работают - юзаем веб-форму */
   /* Блок авторизации (по таблице sys_operators, Cookies) */
$additional_key = $db_add_rnd_key.$cook_date;
if ( isset ($_SERVER['HTTP_ACCEPT_CHARSET']) ) { $additional_key .= $_SERVER['HTTP_ACCEPT_CHARSET']; };
$additional_key .= $_SERVER['HTTP_ACCEPT_LANGUAGE']; $user_agent = $_SERVER["HTTP_USER_AGENT"];
$additional_key .= $_SERVER['REMOTE_ADDR'];

  if ( SHA1(substr($cookie_session_id, 0, $session_id_base_length).$db_add_rnd_key) == base64_decode(substr($cookie_session_id, $session_id_base_length).'==') )
          { $additional_key .= $cookie_session_id; } /* Если контрольная сумма верна - усилить сессионные ключи */
     ELSE {   add_stat(' h', 'SYSTEM', 'SESSION KEY WAS DESTROYED !!!'); print $auth_err_redirector.'<a href="?">## Bad / corrupted session keys - Press <B>[F5]</B> /* Refresh */</a>'; ClearCookie(); die; }
}; /* В противном случае - в газенваген! */

  if ($post_ff_login != '') { /* Первичная установка кукисов при непустом логине */
     SetCookie('ox_login', substr(base64_encode(SHA1($post_ff_login.$cook_date.$additional_key)), 0, -2));
     SetCookie('ox_key', substr(base64_encode(SHA1($post_ff_login.$cook_date.SHA1($post_ff_pwd).$additional_key).MD5($additional_key).SHA1(SHA1($post_ff_pwd).MD5($user_agent).$cook_date.$additional_key)), 0, -2));
	 SetCookie('ox_subkey1', substr(base64_encode(SHA1($cook_date.$additional_key.'CHECK_1st_LOGIN')), 0, -2));
     print '<META HTTP-EQUIV="Refresh" CONTENT="0; URL='.$script_name.'"><a href="'.$script_name.'">[>>>]</a>'; die; }

   /* Проверка данных в БД */
$login_hash = addslashes(base64_decode($cookie_login.'=='));   $pwd_key = addslashes(base64_decode($cookie_key.'=='));
$login_res = mysqli_query ($sql, "SELECT * FROM operators WHERE sha1(CONCAT(`login`,'$cook_date','$additional_key')) = '$login_hash' LIMIT 1");
$user_info = mysqli_fetch_array($login_res);   /* В этом массиве лежат все базовые права доступа */

if ($ops == 'logout') { /* Процедура разлогинивания - ведение лога */
   if (SHA1($cook_date.$additional_key.'CHECK_1st_LOGOUT') == base64_decode($_COOKIE['ox_subkey1'].'==')) { add_stat ('u', 'SYSTEM', 'User ['.$user_info['login'].'] logged OUT succesfully'); }
   ClearCookie(); print '<META HTTP-EQUIV="Refresh" CONTENT="0; URL='.$script_name.'"><a href="?">## Click here for logout.</a>'; die; }

if (mysqli_error($sql) != '' OR mysqli_num_rows($login_res) == 0 OR
      $pwd_key != SHA1($user_info['login'].$cook_date.$user_info['passwd'].$additional_key).MD5($additional_key).SHA1($user_info['passwd'].MD5($user_agent).$cook_date.$additional_key)
   ) { ClearCookie();
print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><title>'.$index_page_title.' | Login</title><link href="favicon.ico" rel="shortcut icon"><style type="text/css">
body { background-color: silver; align: center; } table { text-align: left; border-collapse: collapse;}
td { font-family: arial; font-size: 16pt; border: 1px solid gray; height: 50px; }
INPUT { font-size: 16pt; color: Blue; background-color: #DEEEEE; } .ttl { background-color: #EEEEEE; text-align: center; font-style: bold; }
</style><meta http-equiv="Content-Type" content="text/html; charset=cp1251"></head><body>
<div align="center"><form method="POST"><table>
<tr><td colspan="2" class="ttl">'.$index_page_title.'</td></tr>
<tr><td>Логин:</td><td><input type="text" name="ff_login" size="25"></td></tr>
<tr><td>Пароль:</td><td><input type="password" name="ff_pwd" size="25"></td></tr>
<tr><td colspan="2" class="ttl"><input type="submit" value="Войти"></td></tr><table></FORM>
<Br>'.$index_tech_support.'</div><Br><Br></body></html>';
die; }
if (SHA1($cook_date.$additional_key.'CHECK_1st_LOGIN') == base64_decode($_COOKIE['ox_subkey1'].'==')) { add_stat('u', 'SYSTEM', 'User ['.$user_info['login'].'] logged IN succesfully');
    SetCookie('ox_subkey1', substr(base64_encode(SHA1($cook_date.$additional_key.'CHECK_1st_LOGOUT')), 0, -2)); }
if ( SHA1($cook_date.$additional_key.'CHECK_1st_LOGOUT') != base64_decode($_COOKIE['ox_subkey1'].'==') AND
	 SHA1($cook_date.$additional_key.'CHECK_1st_LOGIN') != base64_decode($_COOKIE['ox_subkey1'].'==') )
   { add_stat('h', 'SYSTEM', 'SUBKEYS WAS DESTROYED !!!'); ClearCookie(); print $auth_err_redirector.'<a href="?">## SUBKEYS DESTROYED. You very bad hacker. Press <B>[F5]</B> /* Refresh */</a>'; die; }
/* Блок авторизации - END, Cookies */



   /* Блок функций */
function ip_killer($st) {print ("<div id=\"form_area\"><font id=\"alrt\"><Br>&nbsp;&nbsp;&nbsp;ERROR : THIS OPERATION NOT SUPPORTED<Br><Br></font>&nbsp;&nbsp;&nbsp;$st&nbsp;&nbsp;&nbsp;<a href=\"?ops=0&lm_item=0&prnt=0\">НАЗАД</a></div>"); die; return;}

$IE_detect = strpos($_SERVER["HTTP_USER_AGENT"], "MSIE"); if ($IE_detect !== false)
{ print '<table><tr><td bgcolor="red"><font face="Arial" size="5">Сlient software error - WEAK SECURITY.<Br>Please, use <B>BROWSER</B></font></td></tr></table>'; die;}

function int2checkbox ($i, $defaut=' disabled') { if ($i > 0) { $st = ' checked'; } ELSE { $st = ''; }; return '<INPUT type="checkbox"'.$defaut.$st.'>'; }

function chk_date ($date) {
if ($date != '') {
list ($y, $m, $d) = preg_split ('/[\/.-]/', substr($date, 0, 10));
$validity = checkdate((int)$m, (int)$d, (int)$y); } ELSE { $validity = ''; };
return $validity; }

function DateSelector ($name, $act) { $out = '';
if ($act != '') { list ($cu_year, $cu_month, $cu_day) = preg_split ('/[\/.-]/', substr($act, 0, 10)) ; }
 IF ( chk_date ($act) != 1 ) { $cu_year = date("Y"); $cu_month = date("m"); $cu_day = date("d"); }
$out .= '<NoBr><SELECT TYPE="text" SIZE="1" NAME="'.$name.'_day">'; $sel='' ;
for ($day = 1; $day <= 31; $day++) {if ($day == $cu_day) {$sel = ' SELECTED';}
ELSE {$sel = '';} ; $out .= "<OPTION VALUE=\"$day\"$sel>$day" ; }
$out .= '</SELECT><SELECT TYPE="text" SIZE="1" NAME="'.$name.'_month">' ;
$mmonth = array ('AMIN', 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря');
for ($month = 1; $month <= 12; $month++) {if ($month == $cu_month) {$sel = ' SELECTED';}
ELSE {$sel = '';} ; $out .= "<OPTION VALUE=\"$month\" $sel>$mmonth[$month]"; }
$out .= '</SELECT><INPUT TYPE="text" SIZE="4" VALUE="'.$cu_year.'" MAXLENGTH="4" NAME="'.$name.'_year"></NoBr>'; return $out; }

function TimeSelector ($name, $cu_time) { $out = ''; $cu_hour = date ("H") ; $cu_minute = date ("i") ;
if ($cu_time != '') { list ($cu_hour, $cu_minute) = preg_split ('/[:\/.-]/', substr($cu_time, 0, 8)); }
$out .= '<NoBr><INPUT TYPE="text" SIZE="2" VALUE="'.$cu_hour.'" MAXLENGTH="2" NAME="'.$name.'_hour">';
$out .= '<B>:</B><INPUT TYPE="text" SIZE="2" VALUE="'.$cu_minute.'" MAXLENGTH="2" NAME="'.$name.'_minute"></NoBr>'; return $out; }

function LogicSelector ($name, $cu_logic) { $out = '';
$logics_name = array ('равно', 'не равно', 'больше', '> или =', 'меньше', '< или =');
$logics_vals = array ('=', '!=', '>', '>=', '<', '<=');
$out .= '<SELECT TYPE="text" SIZE="1" NAME="'.$name.'">' ;
for ($i = 0; $i <= 5; $i++) {if ($logics_vals[$i] == $cu_logic) {$sel = ' SELECTED';} ELSE {$sel = '';} ;
$out .= '<OPTION VALUE="'.$logics_vals["$i"].'" '.$sel.'>'.$logics_name[$i]; }
$out .= '</SELECT>'; return $out; }

function TableSelector ($name, $cu_table) { $out = '';
$tbl_name = array ('Посетители', 'Автомобили');
$tbl_vals = array ('pos', 'avt');
$out .= '<SELECT TYPE="text" SIZE="1" NAME="'.$name.'">' ;
for ($i = 0; $i <= 1; $i++) {if ($tbl_vals[$i] == $cu_table) {$sel = ' SELECTED';} ELSE {$sel = '';} ;
$out .= '<OPTION VALUE="'.$tbl_vals["$i"].'" '.$sel.'>'.$tbl_name[$i]; }
$out .= '</SELECT>'; return $out; }

function comp2hum_date ($date) { if ($date == '') { $hdate = 0; } list ($y, $m, $d) = preg_split ('/[\/.-]/', substr($date, 0, 10)); $hdate = $d.'-'.$m.'-'.$y ; if ( (int) $hdate == 0) {$hdate='';} return $hdate; }
function comp2hum_time ($time) { if ($time == '') { $htime = 0; } list ($h, $m, $s) = preg_split ('/[:\/.-]/', substr($time, 0, 8)); $htime = $h.':'.$m; if ( (int) $htime == 0) {$htime='';} return $htime; }

$min_dates_res = mysqli_query ($sql, "SELECT
  (SELECT MIN(`vp`.`date_in`) FROM (SELECT DISTINCT `date_in` FROM `visits_pos` WHERE `date_in` <= '$curr_date' ORDER BY `date_in` DESC LIMIT $index_num_pos_dates) vp) AS min_date_pos,
  (SELECT MIN(`va`.`date_in`) FROM (SELECT DISTINCT `date_in` FROM `visits_avt` WHERE `date_in` <= '$curr_date' ORDER BY `date_in` DESC LIMIT $index_num_avt_dates) va) AS min_date_avt");
$min_dates_row = mysqli_fetch_array($min_dates_res); $min_date_pos = $min_dates_row["min_date_pos"]; $min_date_avt = $min_dates_row["min_date_avt"];
   /* END LOAD OPTIONS */

if ($ops == '' OR ($ops != 'twk' AND $ops != 'newpwd' AND $ops != 'opers' AND $ops != 'pos' AND $ops != 'avt' AND $ops != 'posm' AND $ops != 'avtm' AND $ops != 'epos' AND $ops != 'eavt' AND $ops != 'ruls')) { $ops='pos'; }
if ( $user_info["is_root"] != 1 AND $user_info["is_administrator"] != 1 AND $ops == 'posm') { $ops = 'pos'; }
if ( $user_info["is_root"] != 1 AND $user_info["is_administrator"] != 1 AND $ops == 'avtm') { $ops = 'avt'; }

$status_string = ''; $admin_cancel_button = '<a href="?ops='.$ops.'"><INPUT type="button" value="'.$admin_cancel_button.'" class="btn"></a>';

if ( isset($_POST["prnt_button"]) || ( isset($_GET["prnt"]) && $_GET["prnt"] == 1 ) ) { $prnt = 1; } else { $prnt = 0; };


if ($prnt != '1') {
     $print_link = '<INPUT type="checkbox" class="btn" name="prnt_button" title="Если эта опция установлена, документ будет подготовлен к печати">'.$index_print_checkbox.' '; }
     ELSE { $print_link = ''; };

if ($user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $title_text = $admin_page_title; } ELSE { $title_text = $index_page_title; };
print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><title>'.$user_info["login"].'@['.htmlspecialchars($title_text, ENT_QUOTES).'] :: ['.$user_info["is_root"].$user_info["is_administrator"].$user_info["is_guard"].']</title><link href="favicon.ico" rel="shortcut icon"><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta http-equiv="Expires" Content="Mon, 12 Feb 2003 00:00:01 GMT"><meta http-equiv="pragma" content="no-cache"><meta http-equiv="cache-control" content="no-cache"></head><body>';
IF ( $prnt != '1' ) {print '<LINK REL="STYLESHEET" TYPE="text/css" HREF="main.css">' ; } ELSE {print '<LINK REL="STYLESHEET" TYPE="text/css" HREF="main_prn.css">'; } ;
  if ($user_info["is_root"] == 1) { $opers_lnk = '<a href="?ops=opers">Логины</a><Br>'; } ELSE { $opers_lnk = ''; };
  if ($user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { if ($ops == 'twk') { $top_twk_lnk = '<td width="40%" class="actd"> НАСТРОЙКИ '.$opers_lnk.'</td>'; } ELSE { $top_twk_lnk = '<td width="30%" class="inactd"> <a href="?ops=twk">НАСТРОЙКИ</a> '.$opers_lnk.'</td>'; }; } ELSE { $top_twk_lnk = ''; };
  if ($user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { if ($ops == 'posm') { $top_posm_lnk = '<td width="40%" class="actd"> Мониторинг посетителей </td>'; } ELSE { $top_posm_lnk = '<td width="30%" class="inactd"> <a href="?ops=posm">Мониторинг посетителей</a> </td>'; }; } ELSE { $top_posm_lnk = ''; };
  if ($user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { if ($ops == 'avtm') { $top_avtm_lnk = '<td width="40%" class="actd"> Мониторинг автомобилей </td>'; } ELSE { $top_avtm_lnk = '<td width="30%" class="inactd"> <a href="?ops=avtm">Мониторинг автомобилей</a> </td>'; }; } ELSE { $top_avtm_lnk = ''; };
  if ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1 OR ($user_info["is_guard"] != 1 AND $user_info["is_administrator"] != 1) ) { if ($ops == 'pos') { $top_pos_lnk = '<td width="40%" class="actd"> Посетители </td>'; } ELSE { $top_pos_lnk = '<td width="30%" class="inactd"> <a href="?ops=pos">Посетители</a> </td>'; }; } ELSE { $top_pos_lnk = ''; };
  if ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1 OR ($user_info["is_guard"] != 1 AND $user_info["is_administrator"] != 1) ) { if ($ops == 'avt') { $top_avt_lnk = '<td width="40%" class="actd"> Автомобили </td>'; } ELSE { $top_avt_lnk = '<td width="30%" class="inactd"> <a href="?ops=avt">Автомобили</a> </td>'; }; } ELSE { $top_avt_lnk = ''; };
  if ($ops == 'ruls') { $top_ruls_lnk = '<td width="40%" class="actd"> О системе </td>'; } ELSE { $top_ruls_lnk = '<td width="30%" class="inactd"> <a href="?ops=ruls"><font class="help"> О системе </font></a> </td>'; };
if ($ops != 'epos' AND $ops != 'eavt') { $top_menu_out = $top_pos_lnk.$top_posm_lnk.$top_avt_lnk.$top_avtm_lnk; } ELSE {$top_menu_out = '<td width="80%" colspan="2">Редактирование&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font class="comment">( запись с кодом '.$id.' )</font></td>'; }
if ($prnt != 1) { print '<table width="99%"><tr>'.$top_menu_out.$top_ruls_lnk.$top_twk_lnk.'<td class="inactd" width="2%">&nbsp;</td><td width="1%"><a href="?ops=logout" title="Выход (Завершить сессию)" id="exitt">X</a></td></tr><tr><td colspan="8" align="center">'; }
$index_cancel_button = '<a href="?ops='.$ops.'"><INPUT type="button" value="'.$index_cancel_button.'" class="btn"></a>';

   /* Защита от пустого пароля */
if ($user_info['passwd'] == $null_sha1) { $ops = 'newpwd'; }

switch ($ops) {   /* START FUNCTIONS MEGA-WITCH */

case 'newpwd' : {   /* Сброс своего пароля */
print '<table width="70%"><tr><td class="noborder" colspan="3"><h2>Изменение своего пароля</h2></td></tr>';
if ( $user_info["is_root"] == 1 OR $user_info["passwd"] == $null_sha1 OR $index_show_reset_pwd == 1) {
$send_st = isset($_POST["send_st"]) ? $_POST["send_st"] : '';
$old_pass = isset($_POST["old_pass"]) ? sha1($_POST["old_pass"]) : $null_sha1;
$new_pass = isset($_POST["new_pass"]) ? sha1($_POST["new_pass"]) : $null_sha1;
$new_pass2 = isset($_POST["new_pass2"]) ? sha1($_POST["new_pass2"]) : $null_sha1;
$cancel_button_main = '<a href="?"><INPUT type="button" value="Выход" OnClick="location.href=\'?\';"></a>';
if ($send_st == 1) { /* Обработчик */
$pass_correct = 0;
if ($old_pass != $user_info["passwd"]) { print '<tr><td class="noborder" colspan="3"><font class="b">Старый пароль введен неверно.</font></td></tr>'; $pass_correct++; }
if ($new_pass != $new_pass2) { print '<tr><td class="noborder" colspan="3"><font class="b">Пароль и его подтверждение не совпадают.</font></td></tr>'; $pass_correct++; }
if ($new_pass == $new_pass2 AND $new_pass == $old_pass) { print '<tr><td class="noborder" colspan="3"><font class="b">Старый пароль совпадает с новым.</font></td></tr>'; $pass_correct++; }
if ($new_pass == $new_pass2 AND $new_pass == sha1($user_info["login"])) { print '<tr><td class="noborder" colspan="3"><font class="b">Пароль не должен совпадать с логином.</font></td></tr>'; $pass_correct++; }
if ($new_pass == $null_sha1 AND $new_pass2 = $null_sha1) { print '<tr><td class="noborder" colspan="3"><font class="b">Пустой пароль недопустим.</font></td></tr>'; $pass_correct++; }
print '<tr><td class="noborder" colspan="3"><Br></td></tr>';
   if ($pass_correct == 0) {
mysqli_query ($sql, "UPDATE `operators` SET `passwd` = '$new_pass' WHERE `login` = '".$user_info["login"]."' AND `id` = '".$user_info["id"]."' AND `enable` = '1' AND (`passwd` = '".$null_sha1."' OR `is_root` = '1') LIMIT 1");
if (mysqli_error($sql) != '') { print '<tr><td class="noborder" colspan="3"><fontclass="b">Не удалось изменить пароль.<Br>Обратитесь к администратору системы.</font></td></tr>';
} ELSE { print '<tr><td class="noborder" colspan="3"><font class="b1">Пароль успешно изменен.</font></td></tr>'; };
   } ELSE { print '<tr><td class="noborder" colspan="3"><a href="?ops=newpwd"><INPUT type="button" value="Попробовать еще раз" OnClick="location.href=\'?ops=newpwd\';"></a></td></tr>'; };
  print '<tr><td class="noborder" colspan="3"><Br>'.$cancel_button_main.'<Br><Br></td></tr>';
} ELSE { /* Форма */
if ($user_info["passwd"] == $null_sha1) { $old_passwd_out = '<td colspan="2" class="noborder"></td>'; } ELSE { $old_passwd_out = '<td class="noborder">Старый пароль</td><td class="noborder"><INPUT type="password" name="old_pass"></td>'; };
print '<form method="POST">
<tr><td class="noborder">Ваш логин :</td><td class="noborder"><INPUT type="text" class="b1" value="'.htmlspecialchars($user_info["login"], ENT_QUOTES).'" readonly></td><td class="noborder"></td></tr>
<tr>'.$old_passwd_out.'<td class="noborder" rowspan="2"><INPUT type="submit" value="Изменить пароль"></td></tr>
<tr><td class="noborder" colspan="2"><Br><INPUT type="hidden" name="send_st" value="1"></td></tr>
<tr><td class="noborder">Новый пароль <a href="new_passwords.php" target="_blank">?</a></td><td class="noborder"><INPUT type="password" name="new_pass"></td><td class="noborder" rowspan="2">'.$cancel_button_main.'</td></tr>
<tr><td class="noborder">Подтверждение</td><td class="noborder"><INPUT type="password" name="new_pass2"></td></tr>
<tr><td class="noborder" colspan="3"><Br></td></tr></form>';   };
} ELSE { print "<tr><td class=\"noborder\" colspan=\"3\">Не достаточно прав доступа - невозможно изменить свой пароль.<Br><Br></td></tr><tr><td class=\"noborder\" colspan=\"3\">$cancel_button_main</td></tr>"; };
print '</table>';
break; }

case 'pos' : {   /* START ПОСЕТИТЕЛИ */   $status_string = $index_pos_ststr ;
$add_permit = 'OK';
$f_hid = isset($_POST["f_hid"]) ? $_POST["f_hid"] : '';
$confirm = isset($_POST["f_confirm"]) ? $_POST["f_confirm"] : '';
$f_add_button = isset($_POST["f_add_pos"]) ? $_POST["f_add_pos"] : '';
$dd = isset($_POST["f_date_day"]) ? $_POST["f_date_day"] : '';
$dm = isset($_POST["f_date_month"]) ? $_POST["f_date_month"] : '';
$dy = isset($_POST["f_date_year"]) ? $_POST["f_date_year"] : '';
$f_date = substr ( addslashes( sprintf("%04d-%02d-%02d", $dy, $dm, $dd) ), 0, 10 ) ;
$th = isset($_POST["f_time_hour"]) ? $_POST["f_time_hour"] : '';
$tm = isset($_POST["f_time_minute"]) ? $_POST["f_time_minute"] : '';
$f_time = substr ( addslashes($th.':'.$tm.':00'), 0, 8 ) ;
$fio = isset($_POST['p_fio']) ? trim(addslashes($_POST['p_fio'])) : ''; $docum = isset($_POST['p_docum']) ? addslashes($_POST['p_docum']) : '';
$propusk = isset($_POST['p_propusk']) ? addslashes($_POST['p_propusk']) : ''; $prim = isset($_POST['p_prim']) ? addslashes($_POST['p_prim']) : '';
  if ($index_date_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $cu_date_html = DateSelector("f_date", $f_date); } ELSE { $cu_date_html = comp2hum_date($curr_date); };
  if ($index_time_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $cu_time_html = TimeSelector("f_time", $curr_time); } ELSE { $cu_time_html = comp2hum_time($curr_time); };
if ( $f_hid == 'yes' AND ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1) ) {   /* START НАЛИЧИЕ НАЖАТИЯ НА КНОПКУ */   $status_string = '';
   if ($index_date_edit == 1  OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $new_date = $f_date; } ELSE { $new_date = $curr_date; };   if ($index_time_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $new_time = $f_time; } ELSE { $new_time = $curr_time; };
   if ( preg_replace("/[0-9]{1,4}/", "", $dy) != '' ) { $status_string .= '<Br>Значение года не корректно.'; }   if ( preg_replace("/[0-9]{1,2}/", "", $th) != '' OR (int)$th > 23 ) { $status_string .= '<Br>Значение часа не корректно.'; }   if ( preg_replace("/[0-9]{1,2}/", "", $tm) != '' OR (int)$tm > 59 ) { $status_string .= '<Br>Значение минут не корректно.'; }
  if ($confirm != 'on') { $status_string .= '<Br>Без указания опции </font><font class="btntd"><INPUT type="checkbox" class="btn" checked disabled> '.htmlspecialchars($index_add_pos_confm, ENT_QUOTES).'</font><font class="usop_alert"> добавление невозможно.'; $add_permit = 'ERR'; }
  if ($fio == '') { $status_string .= '<Br>Невозможно добавление посетителя с пустой фамилией.'; $add_permit = 'ERR'; }
  if (chk_date($new_date) != 1) { $status_string .= '<Br>Указана некорректная дата'; $add_permit = 'ERR'; }
  if ($new_date > $curr_date AND $user_info["is_root"] != 1 AND $user_info["is_administrator"] != 1) { $status_string .= '<Br>Указана дата из будущего'; $add_permit = 'ERR'; }
  if ($new_date < $min_date_pos AND $user_info["is_root"] != 1 AND $user_info["is_administrator"] != 1) { $status_string .= '<Br>Указана слишком старая дата - вне области видимости.'; $add_permit = 'ERR'; }
  $status_string = substr($status_string, 4, 500);
if ($status_string == '') {   /* START ПОПЫТКА ЗАПИСИ */   $status_string = 'ДОБАВЛЯЕМ ПОСЕТИТЕЛЯ ... ';
$test_res = mysqli_query($sql, "SELECT id FROM visits_pos WHERE `fio` = '$fio' AND `docum` = '$docum' AND `date_in` = '$new_date' AND `time_in` = '$new_time'");
if ( mysqli_num_rows($test_res) != 0 ) { $add_permit = 'ERR'; $status_string .= '<font class="usop_alert">СБОЙ<Br>ТАКОЙ ВИЗИТ УЖЕ ЕСТЬ</font><Br>'.$index_cancel_button ; }
   if ( $add_permit == 'OK' ) {   /* START ВСЕ ОК, ПИШЕМ ВИЗИТ В БАЗУ */   $add_permit = 'ГОТОВО';
   $ins_query = "INSERT INTO `visits_pos` ( `fio` , `operator_id`, `docum` , `date_in` , `time_in`, `date_out` , `time_out` , `propusk` , `prim`, `change_date` )
                                   VALUES ('$fio', '".$user_info['id']."', '$docum', '$new_date', '$new_time', NULL, NULL, '$propusk', '$prim', '$curr_date $curr_time' )";
   $res_query = mysqli_query($sql, $ins_query) or $add_permit = 'СБОЙ<Br>НЕДОСТАТОЧНО ПРАВ ДОСТУПА'.mysqli_error($sql);
   $status_string .= '<font class="usop_alert">'.$add_permit.'</font>' ;   print $status_string.'<meta HTTP-EQUIV="Refresh" CONTENT="'.$index_action_delay.'; URL=?ops=pos">'; die;
   }   /* END ВСЕ ОК, ПИШЕМ ВИЗИТ В БАЗУ  */
}   /* END ПОПЫТКА ЗАПИСИ */    ELSE { $status_string .= '<Br>'.$index_cancel_button ; };
}   /* END НАЛИЧИЕ НАЖАТИЯ НА КНОПКУ */
if ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1) { print '<Br><form method="post"><table><tr><td colspan="3" class="std">Фамилия И. О. <font class="usop_alert">*</font></td><td colspan="2" class="std">Документ (паспорт, удостоверение)</td></tr>
<tr><td colspan="3"><INPUT type="text" class="req" name="p_fio" size="45" maxlength="200" value="'.htmlspecialchars(stripslashes($fio), ENT_QUOTES).'"></td><td colspan="2"><INPUT type="text" name="p_docum" size="50" maxlength="200" value="'.htmlspecialchars(stripslashes($docum), ENT_QUOTES).'"></td></tr>
<tr><td colspan="5">&nbsp;</td></tr><tr><td colspan="2" class="std">Пришел</td><td class="std">Пропуск</td><td class="std">К кому (примечание)</td><td rowspan="2" class="btntd"><INPUT type="hidden" name="f_hid" value="yes"><INPUT type="checkbox" class="btn" name="f_confirm"> '.htmlspecialchars($index_add_pos_confm, ENT_QUOTES).'<Br><INPUT type="submit" name="f_add_pos" value="'.htmlspecialchars($index_add_pos_button, ENT_QUOTES).'" onclick="this.disabled = true; submit();" class="btn"></td></tr>
<tr><td colspan="2"><NoBr>'.$cu_date_html.'&nbsp;'.$cu_time_html.'</Nobr></td><td><INPUT type="text" name="p_propusk" size="3" maxlength="20" value="'.htmlspecialchars(stripslashes($propusk), ENT_QUOTES).'"></td><td><INPUT type="text" name="p_prim" size="22" maxlength="200" value="'.htmlspecialchars(stripslashes($prim), ENT_QUOTES).'"></td></tr>';
print '</table></form><font class="usop_alert">'.$status_string.'</font><hr>'; }
if ($add_permit == 'OK') { $new_date = '--'; print '<table>';
$res = mysqli_query ($sql, "SELECT * FROM visits_pos WHERE `date_in` <= '$curr_date' AND `date_in` >= '$min_date_pos' ORDER BY `date_in` DESC, ISNULL(date_out) DESC, time_in DESC, fio") ;
if (mysqli_num_rows($res) != 0) { print '<tr><td class="std">Пришел</td><td class="std">ФИО</td><td class="std">Документ</td><td class="std">Пропуск</td><td class="std">К кому</td><td class="std">Ушел</td></tr>'; }
   while ($lvs_row = mysqli_fetch_array($res)) {
   if ($lvs_row["date_in"] != $new_date) { $new_date = $lvs_row["date_in"]; print '<tr><td colspan="6" class="usop_alert">[ '.comp2hum_date($lvs_row["date_in"]).' ]</td></tr>'; }
   if (($lvs_row["date_out"] == '' AND $lvs_row["time_out"] == '') OR ($lvs_row["date_out"] == '0000-00-00' AND $lvs_row["time_out"] == '00:00:00')) { if ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1 OR $user_info["is_administrator"] == 1) { $cu_edit_lnk = '<td><a href="?ops=epos&amp;id='.$lvs_row["id"].'"><font class="comment">'.htmlspecialchars($index_pos_edit_text, ENT_QUOTES).'</font></a></td>'; } ELSE { $cu_edit_lnk = '<td></td>'; }; } ELSE { $cu_edit_lnk = '<td class="sml"><NoBr>'.comp2hum_date($lvs_row["date_out"]).'&nbsp;'.$lvs_row["time_out"].'</NoBr></td>'; };
   print '<tr><td class="sml">'.$lvs_row["time_in"].'</td><td class="sml">'.htmlspecialchars($lvs_row["fio"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["docum"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["propusk"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["prim"], ENT_QUOTES).'</td>'.$cu_edit_lnk.'</tr>'; }
print '</table><Br>';   }
break; }   /* END ПОСЕТИТЕЛИ */

case 'avt' : {   /* START АВТОМОБИЛИ */   $status_string = $index_avt_ststr ;
$add_permit = 'OK';
$a_hid = isset($_POST["a_hid"]) ? $_POST["a_hid"] : '';
$confirm = isset($_POST["a_confirm"]) ? $_POST["a_confirm"] : '';
$f_add_button = isset($_POST["f_add_avt"]) ? $_POST["f_add_avt"] : '';
$dd = isset($_POST["f_date_day"]) ? $_POST["f_date_day"] : '';
$dm = isset($_POST["f_date_month"]) ? $_POST["f_date_month"] : '';
$dy = isset($_POST["f_date_year"]) ? $_POST["f_date_year"] : '';
$f_date = substr ( addslashes( sprintf("%04d-%02d-%02d", $dy, $dm, $dd) ), 0, 10 ) ;
$th = isset($_POST["f_time_hour"]) ? $_POST["f_time_hour"] : '';
$tm = isset($_POST["f_time_minute"]) ? $_POST["f_time_minute"] : '';
$f_time = substr ( addslashes($th.':'.$tm.':00'), 0, 8 ) ;
$fio = isset($_POST['a_fio']) ? trim(addslashes($_POST['a_fio'])) : '';
$car = isset($_POST['a_car']) ? addslashes($_POST['a_car']) : '';
$docum = isset($_POST['a_docum']) ? addslashes($_POST['a_docum']) : '';
$propusk = isset($_POST['a_propusk']) ? addslashes($_POST['a_propusk']) : '';
$prim = isset($_POST['a_prim']) ? addslashes($_POST['a_prim']) : '';
  if ($index_date_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $cu_date_html = DateSelector("f_date", $f_date); } ELSE { $cu_date_html = comp2hum_date($curr_date); };
  if ($index_time_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $cu_time_html = TimeSelector("f_time", $curr_time); } ELSE { $cu_time_html = comp2hum_time($curr_time); };
if ( $a_hid == 'yes' AND ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1) ) {   /* START НАЛИЧИЕ НАЖАТИЯ НА КНОПКУ */   $status_string = '';
   if ($index_date_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $new_date = $f_date; } ELSE { $new_date = $curr_date; };   if ($index_time_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $new_time = $f_time; } ELSE { $new_time = $curr_time; };
   if ( preg_replace("/[0-9]{1,4}/", "", $dy) != '' ) { $status_string .= '<Br>Значение года не корректно.'; }   if ( preg_replace("/[0-9]{1,2}/", "", $th) != '' OR (int)$th > 23 ) { $status_string .= '<Br>Значение часа не корректно.'; }   if ( preg_replace("/[0-9]{1,2}/", "", $tm) != '' OR (int)$tm > 59 ) { $status_string .= '<Br>Значение минут не корректно.'; }
  if ($confirm != 'on') { $status_string .= '<Br>Без указания опции </font><font class="btntd"><INPUT type="checkbox" class="btn" checked disabled> '.htmlspecialchars($index_add_avt_confm, ENT_QUOTES).'</font><font class="usop_alert"> добавление невозможно.'; $add_permit = 'ERR'; }
  if ($fio == '') { $status_string .= '<Br>Невозможно добавление автомобиля без фамилии водителя.'; $add_permit = 'ERR'; }
  if ($car == '') { $status_string .= '<Br>Невозможно добавление автомобиля без номера.'; $add_permit = 'ERR'; }
  if (chk_date($new_date) != 1) { $status_string .= '<Br>Указана некорректная дата'; $add_permit = 'ERR'; }
  if ($new_date > $curr_date AND $user_info["is_root"] != 1 AND $user_info["is_administrator"] != 1) { $status_string .= '<Br>Указана дата из будущего'; $add_permit = 'ERR'; }
  if ($new_date < $min_date_avt AND $user_info["is_root"] != 1 AND $user_info["is_administrator"] != 1) { $status_string .= '<Br>Указана слишком старая дата - вне области видимости.'; $add_permit = 'ERR'; }
$status_string = substr($status_string, 4, 500);
if ($status_string == '') {   /* START ПОПЫТКА ЗАПИСИ */   $status_string = 'ДОБАВЛЯЕМ АВТОМОБИЛЬ ... ';
$test_res = mysqli_query($sql, "SELECT id FROM visits_avt WHERE `fio` = '$fio' AND `car` = '$car' AND `docum` = '$docum' AND `date_in` = '$new_date' AND `time_in` = '$new_time'");
if ( mysqli_num_rows($test_res) != 0 ) { $add_permit = 'ERR'; $status_string .= '<font class="usop_alert">СБОЙ<Br>ТАКОЙ АВТОМОБИЛЬ УЖЕ ЕСТЬ</font><Br>'.$index_cancel_button ; }
   if ( $add_permit == 'OK' ) {   /* START ВСЕ ОК, ПИШЕМ ВИЗИТ В БАЗУ */   $add_permit = 'ГОТОВО';
   $ins_query = "INSERT INTO `visits_avt` ( `fio` , `operator_id`, `car` , `docum` , `date_in` , `time_in`, `date_out` , `time_out` , `propusk` , `prim`, `change_date` )
                                   VALUES ('$fio', '".$user_info['id']."', '$car', '$docum', '$new_date', '$new_time', NULL, NULL, '$propusk', '$prim', '$curr_date $curr_time' )";
   $res_query = mysqli_query($sql, $ins_query) or $add_permit = 'СБОЙ<Br>НЕДОСТАТОЧНО ПРАВ ДОСТУПА'.mysqli_error($sql);
   $status_string .= '<font class="usop_alert">'.$add_permit.'</font>' ;   print $status_string.'<meta HTTP-EQUIV="Refresh" CONTENT="'.$index_action_delay.'; URL=?ops=avt">'; die;
   }   /* END ВСЕ ОК, ПИШЕМ ВИЗИТ В БАЗУ  */
}   /* END ПОПЫТКА ЗАПИСИ */    ELSE { $status_string .= '<Br>'.$index_cancel_button ; };
}   /* END НАЛИЧИЕ НАЖАТИЯ НА КНОПКУ */
if ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1) { print '<Br><form method="post"><table><tr><td colspan="2" class="std">Фамилия И. О. <font class="usop_alert">*</font></td><td class="std">Машина (№) <font class="usop_alert">*</font></td><td colspan="2" class="std">Документ (паспорт, удостоверение)</td></tr>
<tr><td colspan="2"><INPUT type="text" class="req" name="a_fio" size="27" maxlength="200" value="'.htmlspecialchars(stripslashes($fio), ENT_QUOTES).'"></td><td><INPUT type="text" class="req" name="a_car" size="10" maxlength="50" value="'.htmlspecialchars(stripslashes($car), ENT_QUOTES).'"></td><td colspan="2"><INPUT type="text" name="a_docum" size="50" maxlength="200" value="'.htmlspecialchars(stripslashes($docum), ENT_QUOTES).'"></td></tr>
<tr><td colspan="5">&nbsp;</td></tr><tr><td colspan="2" class="std">Приехал</td><td class="std">Пропуск</td><td class="std">К кому (примечание)</td><td rowspan="2" class="btntd"><INPUT type="hidden" name="a_hid" value="yes"><INPUT type="checkbox" class="btn" name="a_confirm"> '.htmlspecialchars($index_add_avt_confm, ENT_QUOTES).'<Br><INPUT type="submit" name="f_add_avt" value="'.htmlspecialchars($index_add_avt_button, ENT_QUOTES).'" onclick="this.disabled = true; submit();" class="btn"></td></tr>
<tr><td colspan="2">'.$cu_date_html.'&nbsp;'.$cu_time_html.'</td><td><INPUT type="text" name="a_propusk" size="3" maxlength="20" value="'.htmlspecialchars(stripslashes($propusk), ENT_QUOTES).'"></td><td><INPUT type="text" name="a_prim" size="22" maxlength="200" value="'.htmlspecialchars(stripslashes($prim), ENT_QUOTES).'"></td></tr>';
print '</table></form><font class="usop_alert">'.$status_string.'</font><hr>'; }
if ($add_permit == 'OK') { $new_date = '--'; print '<table>';
$res = mysqli_query ($sql, "SELECT * FROM visits_avt WHERE `date_in` <= '$curr_date' AND `date_in` >= '$min_date_avt' ORDER BY `date_in` DESC, ISNULL(date_out) DESC, time_in DESC, fio") ;
if (mysqli_num_rows($res) != 0) { print '<tr><td class="std">Приехал</td><td class="std">ФИО</td><td class="std">Машина (№)</td><td class="std">Документ</td><td class="std">Пропуск</td><td class="std">К кому</td><td class="std">Выехал</td></tr>'; }
   while ($lvs_row = mysqli_fetch_array($res)) {
   if ($lvs_row["date_in"] != $new_date) { $new_date = $lvs_row["date_in"]; print '<tr><td colspan="7" class="usop_alert">[ '.comp2hum_date($lvs_row["date_in"]).' ]</td></tr>'; }
   if (($lvs_row["date_out"] == '' AND $lvs_row["time_out"] == '') OR ($lvs_row["date_out"] == '0000-00-00' AND $lvs_row["time_out"] == '00:00:00')) { if ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1 OR $user_info["is_administrator"] == 1) { $cu_edit_lnk = '<td><a href="?ops=eavt&amp;id='.$lvs_row["id"].'"><font class="comment">'.htmlspecialchars($index_avt_edit_text, ENT_QUOTES).'</font></a></td>'; } ELSE { $cu_edit_lnk = '<td></td>'; }; } ELSE { $cu_edit_lnk = '<td class="sml"><NoBr>'.comp2hum_date($lvs_row["date_out"]).'&nbsp;'.$lvs_row["time_out"].'</NoBr></td>'; };
   print '<tr><td class="sml">'.$lvs_row["time_in"].'</td><td class="sml">'.htmlspecialchars($lvs_row["fio"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["car"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["docum"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["propusk"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["prim"], ENT_QUOTES).'</td>'.$cu_edit_lnk.'</tr>'; }
print '</table><Br>';   }
break; }   /* END АВТОМОБИЛИ */

case 'epos' : {   /* START ПОСЕТИТЕЛИ - EDIT */
if ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1 OR $user_info["is_administrator"] == 1) { $edit_permit = 'OK';
$fio = isset($_POST['f_fio']) ? addslashes($_POST['f_fio']) : '';
$docum = isset($_POST['f_docum']) ? addslashes($_POST['f_docum']) : '';
$propusk = isset($_POST['f_propusk']) ? addslashes($_POST['f_propusk']) : '';
$prim = isset($_POST['f_prim']) ? addslashes($_POST['f_prim']) : '';
$act = isset($_POST["act"]) ? $_POST["act"] : '';
$dd = isset($_POST["f_date_day"]) ? $_POST["f_date_day"] : '';
$dm = isset($_POST["f_date_month"]) ? $_POST["f_date_month"] : '';
$dy = isset($_POST["f_date_year"]) ? $_POST["f_date_year"] : '';
$f_date = substr ( addslashes( sprintf("%04d-%02d-%02d", $dy, $dm, $dd) ), 0, 10 ) ;
$th = isset($_POST["f_time_hour"]) ? $_POST["f_time_hour"] : '';
$tm = isset($_POST["f_time_minute"]) ? $_POST["f_time_minute"] : '';
$f_time = substr ( addslashes($th.':'.$tm.':00'), 0, 8 ) ;
$cupos_res = mysqli_query ($sql, "SELECT * FROM visits_pos WHERE `id` = '$id' LIMIT 1") ; $cupos_num = mysqli_num_rows ($cupos_res);
  if ($cupos_num == 0) { $edit_permit = 'Недопустимо редактировать несуществующую запись о посетителе.'; } ELSE { $row = mysqli_fetch_array($cupos_res); };
  if (($row["date_out"] != '' OR $row["time_out"] != '') AND ($row["date_out"] != '0000-00-00' OR $row["time_out"] != '00:00:00') AND $user_info["is_root"] != 1) { $edit_permit = 'Этот визит посетителя завершен.<Br>Его редактирование запрещено.'; }
if ( ($index_pos_edit == 1 AND $user_info["is_guard"] == 1) OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $allow_edit_data = 1; } ELSE { $allow_edit_data = 0; };
$data_ready = ''; if ($act != '' AND $edit_permit != 'OK') { $act = 'none'; }
if (chk_date($f_date) != 1 AND $user_info["is_root"] == 1) { $f_date = $row["date_out"]; $curr_time = $row["time_out"]; }
  if ($index_date_edit == 1 OR $user_info["is_administrator"] == 1 OR $user_info["is_root"] == 1) { $cu_date_html = DateSelector("f_date", $f_date); } ELSE { $cu_date_html = comp2hum_date($curr_date); };
  if ($index_time_edit == 1 OR $user_info["is_administrator"] == 1 OR $user_info["is_root"] == 1) { $cu_time_html = TimeSelector("f_time", $curr_time); } ELSE { $cu_time_html = comp2hum_time($curr_time); };
if ($act == 'none') { print 'БЫЛА ВЫБРАНА ОТМЕНА - ВЫПОЛНЯЮ ...<meta HTTP-EQUIV="Refresh" CONTENT="'.$index_cancel_delay.'; URL=?ops=posm">'; die;}
if ($allow_edit_data == 1 AND ($act == 'set_out_time' OR $act == 'edit_data') ) {   /* START РЕДАКТИРОВАНИЕ ПОЛЕЙ */ $res_status = 'ГОТОВО';
   if ($user_info["is_root"] == 1) {
      $ddi = isset($_POST["f_date_in_day"]) ? $_POST["f_date_in_day"] : ''; $dmi = isset($_POST["f_date_in_month"]) ? $_POST["f_date_in_month"] : ''; $dyi = isset($_POST["f_date_in_year"]) ? $_POST["f_date_in_year"] : '';
      $f_date_in = substr ( addslashes( sprintf("%04d-%02d-%02d", $dyi, $dmi, $ddi) ), 0, 10 ) ;
      $thi = isset($_POST["f_time_in_hour"]) ? $_POST["f_time_in_hour"] : ''; $tmi = isset($_POST["f_time_in_minute"]) ? $_POST["f_time_in_minute"] : '';
      $f_time_in = substr ( addslashes($thi.':'.$tmi.':00'), 0, 8 ) ; $upd_time_in_sql = ", `date_in` = '$f_date_in', `time_in` = '$f_time_in' "; } ELSE { $upd_time_in_sql = ''; };
   mysqli_query ($sql, "UPDATE `visits_pos` SET `fio` = '".$fio."', `docum` = '".$docum."', `propusk` = '".$propusk."', `prim` = '".$prim."', `date_out` = NULL, `time_out` = NULL $upd_time_in_sql WHERE `id` = '$id' LIMIT 1") or $res_status = 'СБОЙ ОБНОВЛЕНИЯ ДАННЫХ !!';
   if ($act == 'edit_data') { print 'БЫЛО ВЫБРАНО РЕДАКТИРОВАНИЕ ВИЗИТА БЕЗ ЗАВЕРШЕНИЯ - ВЫПОЛНЯЮ ... <font class="usop_alert">'.$res_status.'</font><meta HTTP-EQUIV="Refresh" CONTENT="'.$index_action_delay.'; URL=?ops=posm">'; die; }
   }   /* END РЕДАКТИРОВАНИЕ ПОЛЕЙ */
if (isset($act) AND $act == 'set_out_time') {   /* START COMMIT */   $data_ready = 'OK';
   if ($index_date_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $new_date = $f_date; } ELSE { $new_date = $curr_date; };   if ($index_time_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $new_time = $f_time; } ELSE { $new_time = $curr_time; };
  if ( preg_replace("/[0-9]{1,4}/", "", $dy) != '' ) { $data_ready .= '<Br>Значение года не корректно.'; }   if ( preg_replace("/[0-9]{1,2}/", "", $th) != '' OR (int)$th > 23 ) { $data_ready .= '<Br>Значение часа не корректно.'; }   if ( preg_replace("/[0-9]{1,2}/", "", $tm) != '' OR (int)$tm > 59 ) { $data_ready .= '<Br>Значение минут не корректно.'; }
  if (chk_date($new_date) != 1) { $data_ready .= '<Br>Указана некорректная дата'; }
  if ($new_date > $curr_date AND $user_info["is_root"] != 1 AND $user_info["is_administrator"] != 1) { $data_ready .= '<Br>Указана дата из будущего'; }
  if ($new_date < $row["date_in"]) { $data_ready .= '<Br>Указанная дата меньше даты прихода.'; }
if ($data_ready != 'OK') { print '<Br><font class="usop_alert">Ошибка :'.substr($data_ready, 2, 500).'</font>'; }
ELSE {   /* START ВСЕ ВЕРНО, ПИШЕМ В БАЗУ */
      $cupos_res = mysqli_query ($sql, "SELECT * FROM visits_pos WHERE `id` = '$id' LIMIT 1") ; $cupos_num = mysqli_num_rows ($cupos_res); $row = mysqli_fetch_array($cupos_res);   if (($row["date_out"] != '' OR $row["time_out"] != '') AND ($row["date_out"] != '0000-00-00' OR $row["time_out"] != '00:00:00') AND $user_info["is_root"] != 1) { $data_ready = 'НЕДОПУСТИМО ОБНОВЛЕНИЕ ЗАКРЫТОГО ВИЗИТА !!'; }
   $upd_query = "UPDATE `visits_pos` SET `date_out` = '$new_date', `time_out` = '$new_time', `change_date` = '$curr_date $curr_time' WHERE `id` = '$id' LIMIT 1";
   if ( $data_ready == 'OK' ) { $res_status = 'ГОТОВО'; $upd_res = mysqli_query($sql, $upd_query) or $res_status = 'СБОЙ<Br>НЕДОСТАТОЧНО ПРАВ ДОСТУПА'.mysqli_error($sql); } ELSE { $res_status = 'СБОЙ ЗАПРОСА<Br>'.$data_ready; };
   print 'БЫЛО ВЫБРАНО ЗАВЕРШЕНИЕ ВИЗИТА - ВЫПОЛНЯЮ ... <font class="usop_alert">'.$res_status.'</font><meta HTTP-EQUIV="Refresh" CONTENT="'.$index_action_delay.'; URL=?ops=posm">';
   die;   }   /* END ВСЕ ВЕРНО, ПИШЕМ В БАЗУ */
};   /* END COMMIT */
print '<form method="post">';
if ($edit_permit != 'OK') { print '<Br><font class="btntd"><INPUT type="radio" name="act" value="none" checked></font> <font class="usop_alert">'.$edit_permit.'</font></label>'; } ELSE {
print  '<Br>Вы редактируете запись для этого посетителя :<Br><Br><table><tr><td class="std">Пришел</td><td class="std">ФИО</td><td class="std">Документ</td><td class="std">Пропуск</td><td class="std">К кому</td></tr>';
if ($user_info["is_root"] == 1) { $date_in_html = DateSelector("f_date_in", $row["date_in"]).'&nbsp;&nbsp;&nbsp;'.TimeSelector("f_time_in", $row["time_in"]); $disable_edit_label = ''; } ELSE { $date_in_html = comp2hum_date($row["date_in"]).'&nbsp;&nbsp;&nbsp;'.$row["time_in"]; $disable_edit_label = '<Br><font class="usop_alert"><label for="set_pos_time_id">Все изменения будут внесены, после чего запись будет закрыта для редактирования.</label></font>'; };
if ($allow_edit_data == 1) { print '<tr><td class="sml">'.$date_in_html.'</td><td class="sml"><input type="text" name="f_fio" size="20" value="'.htmlspecialchars($row["fio"], ENT_QUOTES).'"></td><td class="sml"><input type="text" name="f_docum" size="5" value="'.htmlspecialchars($row["docum"], ENT_QUOTES).'"></td><td class="sml"><input type="text" name="f_propusk" size="5" value="'.htmlspecialchars($row["propusk"], ENT_QUOTES).'"></td><td class="sml"><input type="text" name="f_prim" size="5" value="'.htmlspecialchars($row["prim"], ENT_QUOTES).'"></td></tr>'; }
   ELSE { print '<tr><td class="sml">'.$date_in_html.'</td><td class="sml">'.htmlspecialchars($row["fio"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($row["docum"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($row["propusk"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($row["prim"], ENT_QUOTES).'</td></tr>'; }
print '<tr><td colspan="5"><Br>Допустимы следующие действия :</td></tr>
<tr><td colspan="5" align="left" class="btntd"><INPUT type="radio" name="act" value="set_out_time" id="set_pos_time_id"><label for="set_pos_time_id"> Назначить время ухода равное&nbsp;&nbsp;&nbsp;</label>[ '.$cu_date_html.' ]&nbsp;&nbsp;&nbsp;( '.$cu_time_html.' ).'.$disable_edit_label.'</td></tr>';
if ($allow_edit_data == 1) { print '<tr><td colspan="5" align="left" class="btntd"><INPUT type="radio" name="act" value="edit_data" id="edit_data_id"><label for="edit_data_id"> Внести изменения в данные, разблокировать визит.</label></td></tr>'; }
print '<tr><td colspan="5" align="left" class="btntd"><INPUT type="radio" name="act" value="none" checked id="set_pos_none_id"><label for="set_pos_none_id"> Ничего не делать и выйти</label></td></tr></table>';   };
print '<Br><Br><INPUT type="submit" class="btn" value="'.htmlspecialchars($index_confirm_button, ENT_QUOTES).'" onclick="this.disabled = true; submit();"><Br><Br></form>';
}
break; }   /* END ПОСЕТИТЕЛИ - EDIT  */

case 'eavt' : {   /* START АВТОМОБИЛИ - EDIT */
if ($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1 OR $user_info["is_administrator"] == 1) { $edit_permit = 'OK';
$cupos_res = mysqli_query ($sql, "SELECT * FROM visits_avt WHERE `id` = '$id' LIMIT 1") ; $cupos_num = mysqli_num_rows ($cupos_res);
  if ($cupos_num == 0) { $edit_permit = 'Недопустимо редактировать несуществующую запись об автомобиле.'; } ELSE { $row = mysqli_fetch_array($cupos_res); };
  if (($row["date_out"] != '' OR $row["time_out"] != '') AND ($row["date_out"] != '0000-00-00' OR $row["time_out"] != '00:00:00') AND $user_info["is_root"] != 1) { $edit_permit = 'Этот приезд автомобиля завершен.<Br>Его редактирование запрещено.'; }
$fio = isset($_POST['f_fio']) ? addslashes($_POST['f_fio']) : '';
$car = isset($_POST['f_car']) ? addslashes($_POST['f_car']) : '';
$docum = isset($_POST['f_docum']) ? addslashes($_POST['f_docum']) : '';
$propusk = isset($_POST['f_propusk']) ? addslashes($_POST['f_propusk']) : '';
$prim = isset($_POST['f_prim']) ? addslashes($_POST['f_prim']) : '';
$act = isset($_POST["act"]) ? $_POST["act"] : '';
$dd = isset($_POST["f_date_day"]) ? $_POST["f_date_day"] : '';
$dm = isset($_POST["f_date_month"]) ? $_POST["f_date_month"] : '';
$dy = isset($_POST["f_date_year"]) ? $_POST["f_date_year"] : '';
$f_date = substr ( addslashes( sprintf("%04d-%02d-%02d", $dy, $dm, $dd) ), 0, 10 ) ;
$th = isset($_POST["f_time_hour"]) ? $_POST["f_time_hour"] : '';
$tm = isset($_POST["f_time_minute"]) ? $_POST["f_time_minute"] : '';
$f_time = substr ( addslashes($th.':'.$tm.':00'), 0, 8 ) ;
if ( ($index_avt_edit == 1 AND $user_info["is_guard"] == 1) OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $allow_edit_data = 1; } ELSE { $allow_edit_data = 0; };
$data_ready = ''; if (isset($act) AND $edit_permit != 'OK') { $act = 'none'; }
if (chk_date($f_date) != 1 AND $user_info["is_root"] == 1) { $f_date = $row["date_out"]; $curr_time = $row["time_out"]; }
  if ($index_date_edit == 1 OR $user_info["is_administrator"] == 1 OR $user_info["is_root"] == 1) { $cu_date_html = DateSelector("f_date", $f_date); } ELSE { $cu_date_html = comp2hum_date($curr_date); };
  if ($index_time_edit == 1 OR $user_info["is_administrator"] == 1 OR $user_info["is_root"] == 1) { $cu_time_html = TimeSelector("f_time", $curr_time); } ELSE { $cu_time_html = comp2hum_time($curr_time); };
if ($act == 'none') { print 'БЫЛА ВЫБРАНА ОТМЕНА - ВЫПОЛНЯЮ ...<meta HTTP-EQUIV="Refresh" CONTENT="'.$index_cancel_delay.'; URL=?ops=avt">'; die;}
if ($act != '' AND $allow_edit_data == 1 AND ($act == 'set_out_time' OR $act == 'edit_data') ) {   /* START РЕДАКТИРОВАНИЕ ПОЛЕЙ */  $res_status = 'ГОТОВО';
   if ($user_info["is_root"] == 1) {
      $ddi = isset ($_POST["f_date_in_day"]) ? $_POST["f_date_in_day"] : ''; $dmi = isset ($_POST["f_date_in_month"]) ? $_POST["f_date_in_month"] : ''; $dyi = isset ($_POST["f_date_in_year"]) ? $_POST["f_date_in_year"] : '';
      $f_date_in = substr ( addslashes( sprintf("%04d-%02d-%02d", $dyi, $dmi, $ddi) ), 0, 10 ) ;
      $thi = isset ($_POST["f_time_in_hour"]) ? $_POST["f_time_in_hour"] : ''; $tmi = isset ($_POST["f_time_in_minute"]) ? $_POST["f_time_in_minute"] : '';
      $f_time_in = substr ( addslashes($thi.':'.$tmi.':00'), 0, 8 ) ; $upd_time_in_sql = ", `date_in` = '$f_date_in', `time_in` = '$f_time_in' "; } ELSE { $upd_time_in_sql = ''; };
   mysqli_query ($sql, "UPDATE `visits_avt` SET `fio` = '".$fio."', `car` = '".$car."', `docum` = '".$docum."', `propusk` = '".$propusk."', `prim` = '".$prim."', `date_out` = NULL, `time_out` = NULL $upd_time_in_sql WHERE `id` = '$id' LIMIT 1") or $res_status = 'СБОЙ ОБНОВЛЕНИЯ ДАННЫХ !!';
   if ($act == 'edit_data') { print 'БЫЛО ВЫБРАНО РЕДАКТИРОВАНИЕ ВИЗИТА БЕЗ ЗАВЕРШЕНИЯ - ВЫПОЛНЯЮ ... <font class="usop_alert">'.$res_status.'</font><meta HTTP-EQUIV="Refresh" CONTENT="'.$index_action_delay.'; URL=?ops=avtm">'; die; }
   }   /* END РЕДАКТИРОВАНИЕ ПОЛЕЙ */
if (isset($act) AND $act == 'set_out_time') {   /* START COMMIT */   $data_ready = 'OK';
  if ($index_date_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $new_date = $f_date; } ELSE { $new_date = $curr_date; };   if ($index_time_edit == 1 OR $user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) { $new_time = $f_time; } ELSE { $new_time = $curr_time; };
  if ( preg_replace("/[0-9]{1,4}/", "", $dy) != '' ) { $data_ready .= '<Br>Значение года не корректно.'; }   if ( preg_replace("/[0-9]{1,2}/", "", $th) != '' OR (int)$th > 23 ) { $data_ready .= '<Br>Значение часа не корректно.'; }   if ( preg_replace("/[0-9]{1,2}/", "", $tm) != '' OR (int)$tm > 59 ) { $data_ready .= '<Br>Значение минут не корректно.'; }
  if (chk_date($new_date) != 1) { $data_ready .= '<Br>Указана некорректная дата'; }
  if ($new_date > $curr_date AND $user_info["is_root"] != 1 AND $user_info["is_administrator"] != 1) { $data_ready .= '<Br>Указана дата из будущего'; }
  if ($new_date < $row["date_in"]) { $data_ready .= '<Br>Указанная дата меньше даты прихода.'; }
if ($data_ready != 'OK') { print '<Br><font class="usop_alert">Ошибка : '.substr($data_ready, 2, 500).'</font>'; }
ELSE {   /* START ВСЕ ВЕРНО, ПИШЕМ В БАЗУ */
      $cupos_res = mysqli_query ($sql, "SELECT * FROM visits_avt WHERE `id` = '$id' LIMIT 1") ; $cupos_num = mysqli_num_rows ($cupos_res); $row = mysqli_fetch_array($cupos_res);   if (($row["date_out"] != '' OR $row["time_out"] != '') AND ($row["date_out"] != '0000-00-00' OR $row["time_out"] != '00:00:00') AND $user_info["is_root"] != 1) { $data_ready = 'НЕДОПУСТИМО ОБНОВЛЕНИЕ ЗАКРЫТОГО ВИЗИТА'; }
   $upd_query = "UPDATE `visits_avt` SET `date_out` = '$new_date', `time_out` = '$new_time', `change_date` = '$curr_date $curr_time' WHERE `id` = '$id' LIMIT 1";
   if ( $data_ready == 'OK' ) { $res_status = 'ГОТОВО'; $upd_res = mysqli_query($sql, $upd_query) or $res_status = 'СБОЙ<Br>НЕДОСТАТОЧНО ПРАВ ДОСТУПА'.mysqli_error($sql); } ELSE { $res_status = 'СБОЙ ЗАПРОСА<Br>'.$data_ready; };
   print 'БЫЛО ВЫБРАНО ЗАВЕРШЕНИЕ ВИЗИТА - ВЫПОЛНЯЮ ... <font class="usop_alert">'.$res_status.'</font><meta HTTP-EQUIV="Refresh" CONTENT="'.$index_action_delay.'; URL=?ops=avt">';
   die;   }   /* END ВСЕ ВЕРНО, ПИШЕМ В БАЗУ */
};   /* END COMMIT */
print '<form method="post">';
if ($edit_permit != 'OK') { print '<Br><font class="btntd"><INPUT type="radio" name="act" value="none" checked></font> <font class="usop_alert">'.$edit_permit.'</font>'; } ELSE {
print  '<Br>Вы редактируете запись для этого автомобиля :<Br><Br><table><tr><td class="std">Приехал</td><td class="std">ФИО</td><td class="std">Машина №</td><td class="std">Документ</td><td class="std">Пропуск</td><td class="std">К кому</td></tr>';
if ($user_info["is_root"] == 1) { $date_in_html = DateSelector("f_date_in", $row["date_in"]).'&nbsp;&nbsp;&nbsp;'.TimeSelector("f_time_in", $row["time_in"]); $disable_edit_label = ''; } ELSE { $date_in_html = comp2hum_date($row["date_in"]).'&nbsp;&nbsp;&nbsp;'.$row["time_in"]; $disable_edit_label = '<Br><font class="usop_alert"><label for="set_avt_time_id">Все изменения будут внесены, после чего запись будет закрыта для редактирования.</label></font>'; };
if ($allow_edit_data == 1) { print '<tr><td class="sml">'.$date_in_html.'</td><td class="sml"><input type="text" name="f_fio" size="20" value="'.htmlspecialchars($row["fio"], ENT_QUOTES).'"></td><td class="sml"><input type="text" name="f_car" size="15" value="'.htmlspecialchars($row["car"], ENT_QUOTES).'"></td><td class="sml"><input type="text" name="f_docum" size="5" value="'.htmlspecialchars($row["docum"], ENT_QUOTES).'"></td><td class="sml"><input type="text" name="f_propusk" size="5" value="'.htmlspecialchars($row["propusk"], ENT_QUOTES).'"></td><td class="sml"><input type="text" name="f_prim" size="5" value="'.htmlspecialchars($row["prim"], ENT_QUOTES).'"></td></tr>'; }
ELSE { print '<tr><td class="sml">'.$date_in_html.'</td><td class="sml">'.htmlspecialchars($row["fio"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($row["car"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($row["docum"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($row["propusk"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($row["prim"], ENT_QUOTES).'</td></tr>'; };
print '<tr><td colspan="6"><Br>Допустимы следующие действия :</td></tr><tr><td colspan="6" align="left" class="btntd"><INPUT type="radio" name="act" value="set_out_time" id="set_avt_time_id"><label for="set_avt_time_id"> Назначить время выезда равное&nbsp;&nbsp;&nbsp;</label>[ '.$cu_date_html.' ]&nbsp;&nbsp;&nbsp;( '.$cu_time_html.' )'.$disable_edit_label.'</td></tr>';
if ($allow_edit_data == 1) { print '<tr><td colspan="6" align="left" class="btntd"><INPUT type="radio" name="act" value="edit_data" id="edit_data_id"><label for="edit_data_id"> Внести изменения в данные, разблокировать визит.</label></td></tr>'; }
print '<tr><td colspan="6" align="left" class="btntd"><INPUT type="radio" name="act" value="none" checked id="set_avt_none_id"><label for="set_avt_none_id"> Ничего не делать и выйти</label></td></tr></table>';   };
print '<Br><Br><INPUT type="submit" class="btn" value="'.htmlspecialchars($index_confirm_button, ENT_QUOTES).'" onclick="this.disabled = true; submit();"><Br><Br></form>';
}
break; }   /* END АВТОМОБИЛИ - EDIT */

case 'ruls' : {   /* START ПРАВИЛА */
print "<h2>Правила работы с системой.</h2>";
  if ($prnt != 1) { print '<div align="right"><a href="?ops=ruls&amp;prnt=1" target="_blank">Print</a>&nbsp;&nbsp;&nbsp;</div>'; }
print "<div align=\"left\">Данная система позволяет вести учет пользователей и автомобилей, входящих и покидающих территорию предприятия.<Br>
<font class=\"usop_alert\">0.</font> Для начала работы введите адрес сервера системы в браузер, и в окне с названием
<font class=\"btntd\">Username and password</font> введите в поле <font class=\"btntd\">Username</font> свой логин, а в поле <font class=\"btntd\">Password</font> - свой пароль,
предварительно убедившись, что сервер называется <font class=\"btntd\">OXPAHA</font>.<Br>
<font class=\"usop_alert\">1.</font> Вкладки сверху позволяют переключаться между формами для ввода посететелей и автомобилей.
Помните, что такое переключение очищает поля форм.<Br>
<font class=\"usop_alert\">2.</font> Сразу перед добавлением данных нажмите на клавиатуре кнопку <font class=\"btntd\">[F5]</font>, чтобы обновить время с сервера и введите данные. (Время вводится в <font class=\"btntd\">24</font>-часовом формате)<Br>
Учтите, что поля, отмеченные знаком <font class=\"usop_alert\">*</font> , являются обязательными для заполнения.<Br>
<font class=\"usop_alert\">3.</font> Если данные введены корректно, то укажите опцию <font class=\"btntd\"><input type=\"checkbox\" class=\"btn\" checked disabled>$index_add_pos_confm</font> (или <font class=\"btntd\"><input type=\"checkbox\"  class=\"btn\" checked disabled>$index_add_avt_confm</font>)
и нажмите кнопку <INPUT type=\"button\" class=\"btn\" value=\"$index_add_pos_button\" disabled> (или <INPUT type=\"button\" class=\"btn\" value=\"$index_add_avt_button\" disabled>) ровно ОДИН раз.<Br>
<font class=\"usop_alert\">4.</font> Если все сделано правильно, то в списке снизу появится строка с вашими данными.<Br>
Система настроена таким образом, что данные выводятся за последние несколько дней (<font class=\"btntd\">$index_num_pos_dates</font> для посетителей / <font class=\"btntd\">$index_num_avt_dates</font> для автомобилей) по убыванию дат, причем для каждого дня сперва
выводятся незавершенные визиты, а потом завершенные. В каждой подгруппе записи отсортированы в обратном порядке по времени входа.<Br>
<font class=\"usop_alert\">5.</font> Со всеми вопросами обращаться сюда :<Br><font class=\"btntd\">$index_tech_support</font><hr>";
$add_st = $user_info["name"];
if ($user_info["is_root"] == 1) { $add_st .= ' , <font class="btn usop_alert">root</font>'; }
if ($user_info["is_administrator"] == 1) { $add_st .= ' , <font class="usop_alert btntd">Администратор</font>'; }
if ($user_info["is_guard"] == 1) { $add_st .= ' , <font class="btntd">Охранник</font>'; }
print 'Текущий пользователь : '.$user_info["login"].' ('.$add_st.')';
if ($index_show_reset_pwd == 1) { print ' <a href="?ops=newpwd">Изменить свой пароль</a>'; }
break; }   /* END ПРАВИЛА */

case 'twk' : {   /* START НАСТРОЙКИ */
if ($user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) {
$twk_ready = '';   $f_hid = isset($_POST["f_hid"]) ? $_POST["f_hid"] : ''; $cx = 0;
   if ( $f_hid == 'yes' ) {   /* START НАЛИЧИЕ НАЖАТИЯ НА КНОПКУ */
   $options_res = mysqli_query ($sql, "SELECT * FROM options") or $twk_ready .= 'Не удалось прочитать таблицу опций ;<Br>';
while ($row = mysqli_fetch_array($options_res)) {   /* START ПАРСИНГ ОПЦИЙ */
   $id = $row["id"]; $cu_value = isset($_POST["twk_$id"]) ? $_POST["twk_$id"] : '';
   if ( $row["type"] == 'b' ) {   if ( $cu_value == 'on' ) { $cu_value = 1 ; } ELSE { $cu_value = 0 ; };   }
   if ( $row["type"] == 'i' ) { $cu_value = (int) $cu_value ; }
if ( $cu_value != $row["value"] ) { $cx++;   $cu_value = addslashes ($cu_value);
   $upd_query = "UPDATE options SET `value` = '$cu_value' WHERE `id` = '".$row["id"]."' LIMIT 1";
   mysqli_query ( $sql, $upd_query ) or $twk_ready = 'СБОЙ - НЕДОСТАТОЧНО ПРАВ ДОСТУПА'.mysqli_error($sql);   }
}   /* END ПАРСИНГ ОПЦИЙ */
if ( $twk_ready != '' ) { print '<Br><font class="usop_alert">'.$twk_ready.'</font><Br>'; } ELSE { if ($cx != 0) { print '<Br><font class="comment">Изменения сохранены успешно.</font><Br>'; }   };
}   /* END НАЛИЧИЕ НАЖАТИЯ НА КНОПКУ */   $twk_ready = 'OK';
$options_res = mysqli_query ($sql, "SELECT * FROM options ORDER BY SUBSTRING(abbr, 1, 5) DESC, type, name") or $twk_ready = 'ERR';
if ( $twk_ready != 'OK' ) { print '<font class="std">Нет таблицы настроек - редактирование невозможно</font><Br>Используйте установочный SQL-скрипт для создания таблицы и не забудьте о правах доступа.<Br>'; }
ELSE {   /* START НАСТРОЙКИ ЕСТЬ В БД */
   if ($prnt != 1) { print '<div align="right"><a href="?ops='.$ops.'&amp;prnt=1" target="_blank">Print</a>&nbsp;&nbsp;&nbsp;</div>'; }
print '<Br><form method="post"><table><tr><td class="std">Параметр</td><td class="std">Значение (50)</td><td class="std">Описание</td></tr>';
while ($row = mysqli_fetch_array($options_res)) {   $cu_form_type = $row["type"];
switch ($cu_form_type) {
      case 'b' : { if ( $row["value"] == 1 ) { $stc = ' checked'; } ELSE { $stc = ''; };   $cu_form_element = '<INPUT type="checkbox" id="twid_'.$row["id"].'" name="twk_'.$row["id"].'" class="btn" title="Поставьте галку, чтобы включить опцию"'.$stc.'>'; $cu_form_name = '<label for="twid_'.$row["id"].'"">'.$row["name"].'</label>'; break;}
      case 'i' : { $cu_form_element = '<INPUT type="text" name="twk_'.$row["id"].'" maxlength="5"  class="req" size="5" value="'.htmlspecialchars(stripslashes($row["value"]), ENT_QUOTES).'" title="Введите числовое значение">'; $cu_form_name = $row["name"]; break;}
      case 't' : { $cu_form_element = '<INPUT type="text" name="twk_'.$row["id"].'" maxlength="50" size="30" value="'.htmlspecialchars(stripslashes($row["value"]), ENT_QUOTES).'">'; $cu_form_name = $row["name"]; break;}     };
print '<tr><td class="comment">'.$row["abbr"].'</td><td>'.$cu_form_element.'</td><td class="sml">'.$cu_form_name.'</td></tr>';   }
   if ($prnt != 1) { print '<tr><td colspan="3" class="btntd"><Br><INPUT type="hidden" name="f_hid" value="yes"><INPUT type="submit" value="'.$admin_save_changes.'" onclick="this.disabled = true; submit();" class="btn"><Br><Br></td></tr>'; }
print '</table></form><Br>';
};   /* END НАСТРОЙКИ ЕСТЬ В БД */
}
break; }   /* END НАСТРОЙКИ */

case 'opers' : {   /* START ОПЕРАТОРЫ */
if ($user_info["is_root"] == 1) { $twk_ready = '';   $f_hid = isset($_POST["f_hid"]) ? $_POST["f_hid"] : '';
$query = 'SELECT * FROM operators ORDER BY login';
$res = mysqli_query ($sql, $query) or $twk_ready .= 'Не удалось прочитать таблицу операторов ;<Br>';
   if ( $f_hid == 'yes' ) {   /* START НАЛИЧИЕ НАЖАТИЯ НА КНОПКУ */
$post_new_login = isset ($_POST["new_login"]) ? $_POST["new_login"] : '';
$post_new_pw1 = isset ($_POST["new_pw1"]) ? $_POST["new_pw1"] : '';
$post_new_pw2 = isset ($_POST["new_pw2"]) ? $_POST["new_pw2"] : '';
$post_new_enable = isset ($_POST["new_enable"]) ? $_POST["new_enable"] : '';
$post_new_root = isset ($_POST["new_root"]) ? $_POST["new_root"] : '';
$post_new_admin = isset ($_POST["new_admin"]) ? $_POST["new_admin"] : '';
$post_new_guard = isset ($_POST["new_guard"]) ? $_POST["new_guard"] : '';
/* Добавление нового оператора */
  if (trim($post_new_login) != '' AND trim($post_new_pw1) != '' AND $post_new_pw1 == $post_new_pw2) {
   $new_login = addslashes($post_new_login);   $new_passwd = sha1($post_new_pw1);   $new_name = addslashes($_POST["new_name"]);
   if ($post_new_enable == 'on') { $new_enable = '1'; } ELSE { $new_enable = '0'; } ;
   if ($post_new_root == 'on') { $new_root = '1'; } ELSE { $new_root = '0'; } ;
   if ($post_new_admin == 'on') { $new_admin = '1'; } ELSE { $new_admin = '0'; } ;
   if ($post_new_guard == 'on') { $new_guard = '1'; } ELSE { $new_guard = '0'; } ;
   $test_res = mysqli_query($sql, "SELECT id FROM operators WHERE `login` = '$new_login'");
   if (mysqli_num_rows($test_res) == 0) {
   mysqli_query ($sql, "INSERT INTO operators (`login`, `passwd`, `enable`, `is_root`, `is_administrator`, `is_guard`, `name`) VALUES ('$new_login', '$new_passwd', '$new_enable', '$new_root', '$new_admin', '$new_guard', '$new_name')") or $twk_ready .= mysqli_error($sql); } }
/* Удаление / редактирование существующих операторов */
  while ($row = mysqli_fetch_array($res)) {   /* START ПАРСИНГ */   $id = $row["id"];
   $drop_id = isset ($_POST["op_drop_$id"]) ? $_POST["op_drop_$id"] : '';
   if ($drop_id == 'on' AND $id != $user_info["id"]) { mysqli_query ($sql, "DELETE FROM operators WHERE `id` = $id LIMIT 1") or $twk_ready .= mysqli_error($sql); }
   $cu_name = addslashes($_POST["op_name_$id"]); if (trim($_POST["op_login_$id"]) != '') { $cu_login = addslashes($_POST["op_login_$id"]); } ELSE { $cu_login = $row["login"]; };
   $cu_enable = isset($_POST["op_enable_$id"]) ? 1 : 0 ;
   $cu_root = isset($_POST["op_root_$id"]) ? 1 : 0 ;
   $cu_admin = isset($_POST["op_admin_$id"]) ? 1 : 0 ;
   $cu_guard = isset($_POST["op_guard_$id"]) ? 1 : 0 ;
   if ($_POST["op_pw1_$id"] != '' AND $_POST["op_pw1_$id"] == $_POST["op_pw2_$id"]) { $passwd_sql = ', `passwd` = \''.sha1($_POST["op_pw1_$id"]).'\''; } ELSE { $passwd_sql = ''; };
   mysqli_query ($sql, "UPDATE operators SET `login` = '$cu_login', `name` = '$cu_name', `is_root` = '$cu_root', `is_administrator` = '$cu_admin', `is_guard` = '$cu_guard', `enable` = '$cu_enable' $passwd_sql WHERE `id` = '$id'") or print mysqli_error($sql);
   }   /* END ПАРСИНГ */
if ( $twk_ready != '' ) { print '<Br><font class="usop_alert">'.$twk_ready.'</font><Br>'; } ELSE { print '<Br><font class="comment">Изменения сохранены успешно.</font><meta HTTP-EQUIV="Refresh" CONTENT="0; URL=?ops=opers"><Br>'; };
$res = mysqli_query ($sql, $query) or print mysqli_error($sql);
}   /* END НАЛИЧИЕ НАЖАТИЯ НА КНОПКУ */
   /* START ВЫВОД ОПЕРАТОРОВ ИЗ БД */
   if ($prnt != 1) { print '<div align="right"><a href="?ops='.$ops.'&amp;prnt=1" target="_blank">Print</a>&nbsp;&nbsp;&nbsp;</div>'; }
print '<h2>Операторы системы</h2><form method="post"><table><tr><td class="std">Логин</td><td class="std">ON</td><td class="std">Имя</td><td class="usop_alert std">root</td><td class="std">Администратор</td><td class="std">Охранник</td><td class="std">Пароль</td><td class="std">Подтверждение пароля</td><td class="usop_alert std">Удалить</td></tr>';
while ($row = mysqli_fetch_array($res)) { $id_title = ' title="ID: '.$row["id"].'"';
       print '<tr><td><INPUT type="text" size="10" value="'.htmlspecialchars($row["login"],ENT_QUOTES).'" class="std comment" name="op_login_'.$row["id"].'"></td><td class="sml">'.int2checkbox($row["enable"]," name=\"op_enable_{$row["id"]}\"$id_title").'</td><td class="sml"><INPUT type="text" size="30" value="'.htmlspecialchars($row["name"],ENT_QUOTES).'" name="op_name_'.$row["id"].'"></td><td class="sml">'.int2checkbox($row["is_root"]," name=\"op_root_{$row["id"]}\" class=\"usop_alert\"").'</td><td class="sml">'.int2checkbox($row["is_administrator"]," name=\"op_admin_{$row["id"]}\" class=\"comment\"").'</td><td class="sml">'.int2checkbox($row["is_guard"]," name=\"op_guard_{$row["id"]}\"").'</td><td><INPUT type="password" size="10" name="op_pw1_'.$row["id"].'" class="std comment"></td><td><INPUT type="password" size="10" name="op_pw2_'.$row["id"].'" class="std comment"></td><td><INPUT type="checkbox" name="op_drop_'.$row["id"].'" class="usop_alert"'.$id_title.'></td></tr>'; }
print '<tr><td colspan="9" class="sml btntd">Для добавления нового оператора обязательно введите новый логин и совпадающие неодинаковые пароли :</td></tr> <tr><td class="btntd"><INPUT type="text" size="10" name="new_login" class="std comment"></td><td class="btntd"><INPUT type="checkbox" name="new_enable"></td><td class="btntd"><INPUT type="text" size="30" placeholder="<Новый оператор>" name="new_name"></td><td class="btntd"><INPUT type="checkbox" name="new_root" class="usop_alert"></td><td class="btntd"><INPUT type="checkbox" name="new_admin" class="comment"></td><td class="btntd"><INPUT type="checkbox" name="new_guard"></td><td class="btntd"><INPUT type="password" size="10" name="new_pw1" class="std comment"></td><td class="btntd"><INPUT type="password" size="10" name="new_pw2" class="std comment"></td><td class="btntd"></td></tr>';
if ($prnt != 1) { print '<tr><td colspan="9" class="btntd"><Br><INPUT type="hidden" name="f_hid" value="yes"><INPUT type="submit" value="'.$admin_save_changes.'" onclick="this.disabled = true; submit();" class="btn"><Br><Br></td></tr>'; }
print '</table></form><Br>
<div class="help2">Справка :<Br>
<li> Для добавления оператора необходимо указать логин (не совпадающий ни с одним из существующих),<Br>&nbsp;&nbsp;&nbsp;а также непустой пароль и его подтверждение.
<li> Опция `root` - полный доступ к системе, включая управление логинами.<Br>&nbsp;&nbsp;&nbsp;Можно редактировать записи (любые) и вводить любые даты.<Br>&nbsp;&nbsp;&nbsp;(Перекрывает действие других опций)
<li> Опция `Администратор` - просмотр данных за любой период и возможность менять настройки.<Br>&nbsp;&nbsp;&nbsp;Нельзя добавлять данные, но можно редактировать незавершенные.<Br>&nbsp;&nbsp;&nbsp;Завершенные записи редактировать нельзя. Допустим ввод любых дат.
<li> Опция `Охранник` - добавление и правка данных, но только за последние несколько дней (из настроек).<Br>&nbsp;&nbsp;&nbsp;Может вводить даты только в пределах области видимости.
<li> Одинаковые логины не допустимы.<Br>
<li> Для смены пароля уже существующего оператора введите новый пароль и его подтверждение в соответствующей строке</div>';
   /* END ВЫВОД ОПЕРАТОРОВ ИЗ БД */
}
break; }   /* END ОПЕРАТОРЫ */

case 'posm' : {   /* START ПОСЕТИТЕЛИ - МОНИТОРИНГ */
if ($user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) {
$filts1 = "`date_in` <= '$curr_date' ORDER BY date_in DESC LIMIT $index_num_pos_dates";   $filts2 = "";
$f_hid = isset($_POST["f_hid"]) ? $_POST["f_hid"] : '';
$fio = isset($_POST["fio"]) ? $_POST["fio"] : ''; $docum = isset($_POST["docum"]) ? $_POST["docum"] : ''; $propusk = isset($_POST["propusk"]) ? $_POST["propusk"] : ''; $prim = isset($_POST["prim"]) ? $_POST["prim"] : '';
$st_out = isset($_POST["st_out"]) ? $_POST["st_out"] : ''; $st_lc = isset($_POST["st_lc"]) ? $_POST["st_lc"] : '';
 $din1d = isset($_POST["din1_day"]) ? $_POST["din1_day"] : ''; $din1m = isset($_POST["din1_month"]) ? $_POST["din1_month"] : ''; $din1y = isset($_POST["din1_year"]) ? $_POST["din1_year"] : '';
          $din1 = substr ( addslashes($din1y.'-'.$din1m.'-'.$din1d), 0, 10 ) ;
 $tin1h = isset($_POST["tin1_hour"]) ? $_POST["tin1_hour"] : '00'; $tin1m = isset($_POST["tin1_minute"]) ? $_POST["tin1_minute"] : '00';
          $tin1 = substr ( addslashes($tin1h.':'.$tin1m.':00'), 0, 8 ) ;
 $din2d = isset($_POST["din2_day"]) ? $_POST["din2_day"] : ''; $din2m = isset($_POST["din2_month"]) ? $_POST["din2_month"] : ''; $din2y = isset($_POST["din2_year"]) ? $_POST["din2_year"] : '';
          $din2 = substr ( addslashes($din2y.'-'.$din2m.'-'.$din2d), 0, 10 ) ;
 $tin2h = isset($_POST["tin2_hour"]) ? $_POST["tin2_hour"] : '23'; $tin2m = isset($_POST["tin2_minute"]) ? $_POST["tin2_minute"] : '59';
          $tin2 = substr ( addslashes($tin2h.':'.$tin2m.':00'), 0, 8 ) ;
$dout1d = isset($_POST["dout1_day"]) ? $_POST["dout1_day"] : ''; $dout1m = isset($_POST["dout1_month"]) ? $_POST["dout1_month"] : ''; $dout1y = isset($_POST["dout1_year"]) ? $_POST["dout1_year"] : '';
          $dout1 = substr ( addslashes($dout1y.'-'.$dout1m.'-'.$dout1d), 0, 10 ) ;
$tout1h = isset($_POST["tout1_hour"]) ? $_POST["tout1_hour"] : '00'; $tout1m = isset($_POST["tout1_minute"]) ? $_POST["tout1_minute"] : '00';
          $tout1 = substr ( addslashes($tout1h.':'.$tout1m.':00'), 0, 8 ) ;
$dout2d = isset($_POST["dout2_day"]) ? $_POST["dout2_day"] : ''; $dout2m = isset($_POST["dout2_month"]) ? $_POST["dout2_month"] : ''; $dout2y = isset($_POST["dout2_year"]) ? $_POST["dout2_year"] : '';
          $dout2 = substr ( addslashes($dout2y.'-'.$dout2m.'-'.$dout2d), 0, 10 ) ;
$tout2h = isset($_POST["tout2_hour"]) ? $_POST["tout2_hour"] : '23'; $tout2m = isset($_POST["tout2_minute"]) ? $_POST["tout2_minute"] : '59';
          $tout2 = substr ( addslashes($tout2h.':'.$tout2m.':00'), 0, 8 ) ;
 $dlc1d = isset($_POST["dlc1_day"]) ? $_POST["dlc1_day"] : ''; $dlc1m = isset($_POST["dlc1_month"]) ? $_POST["dlc1_month"] : ''; $dlc1y = isset($_POST["dlc1_year"]) ? $_POST["dlc1_year"] : '';
          $dlc1 = substr ( addslashes($dlc1y.'-'.$dlc1m.'-'.$dlc1d), 0, 10 ) ;
 $tlc1h = isset($_POST["tlc1_hour"]) ? $_POST["tlc1_hour"] : '00'; $tlc1m = isset($_POST["tlc1_minute"]) ? $_POST["tlc1_minute"] : '00';
          $tlc1 = substr ( addslashes($tlc1h.':'.$tlc1m.':00'), 0, 8 ) ;
 $dlc2d = isset($_POST["dlc2_day"]) ? $_POST["dlc2_day"] : ''; $dlc2m = isset($_POST["dlc2_month"]) ? $_POST["dlc2_month"] : ''; $dlc2y = isset($_POST["dlc2_year"]) ? $_POST["dlc2_year"] : '';
          $dlc2 = substr ( addslashes($dlc2y.'-'.$dlc2m.'-'.$dlc2d), 0, 10 ) ;
 $tlc2h = isset($_POST["tlc2_hour"]) ? $_POST["tlc2_hour"] : '23'; $tlc2m = isset($_POST["tlc2_minute"]) ? $_POST["tlc2_minute"] : '59';
          $tlc2 = substr ( addslashes($tlc2h.':'.$tlc2m.':00'), 0, 8 ) ;
if ( $f_hid == 'yes' ) {   /* START СБОРКА ФИЛЬТРОВ */
   if (chk_date($din1) != 1) { $din1 = $curr_date; }   if (chk_date($din2) != 1) { $din2 = $curr_date; }
   if (chk_date($dout1) != 1) { $dout1 = $curr_date; }   if (chk_date($dout2) != 1) { $dout2 = $curr_date; }
   if (chk_date($dlc1) != 1) { $dlc1 = $curr_date; }   if (chk_date($dlc2) != 1) { $dlc2 = $curr_date; }
if ($din1 == $din2) { $filts1 = "`date_in` = '$din1'"; } ELSE { $filts1 = "`date_in` >= '$din1' AND `date_in` <= '$din2'"; } ;
if ($tin1 == $tin2) { $filts1 .= " AND `time_in` = '$tin1'"; } ELSE { $filts1 .= " AND `time_in` >= '$tin1' AND `time_in` <= '$tin2'"; } ;
 if ($st_out == 'on') { if ($dout1 == $dout2) { $filts2 .= " AND `date_out` = '$dout1'"; } ELSE { $filts2 .= "AND (`date_out` >= '$dout1' AND `date_out` <= '$dout2')"; } ; }
 if ($st_out == 'on') { if ($tout1 == $tout2) { $filts2 .= " AND `time_out` = '$tout1'"; } ELSE { $filts2 .= "AND (`time_out` >= '$tout1' AND `time_out` <= '$tout2')"; } ; }
if ($st_lc == 'on') { if ($dlc1 == $dlc2 AND $tlc1 == $tlc2) { $filts2 .= " AND `change_date` = '$dlc1 $tlc1'"; } ELSE { $filts2 .= "AND (`change_date` >= '$dlc1 $tlc1' AND `change_date` <= '$dlc2 $tlc2')"; } ;   }
 if ($fio != '') {$filts2 .= " AND `fio` LIKE '%".addslashes($fio)."%'";}
 if ($docum != '') {$filts2 .= " AND `docum` LIKE '%".addslashes($docum)."%'";}
 if ($propusk != '') {$filts2 .= " AND `propusk` LIKE '%".addslashes($propusk)."%'";}
 if ($prim != '') {$filts2 .= " AND `prim` LIKE '%".addslashes($prim)."%'";}
$filts1 .= " ORDER BY date_in DESC";
}   /* END СБОРКА ФИЛЬТРОВ */
  if ($st_out == 'on') {$st_out_html = ' checked';} ELSE {$st_out_html = '';};
  if ($st_lc == 'on') {$st_lc_html = ' checked';} ELSE {$st_lc_html = '';};
print 'Посетители<Br><form method="POST" action="?ops='.$ops.'&amp;prnt='.$prnt.'"><table><tr><td class="btntd">Фильтры:</td><td>ФИО : <INPUT type="text" name="fio" size="30" maxlength="200" value="'.htmlspecialchars($fio, ENT_QUOTES).'"></td><td>Документ : <INPUT type="text" name="docum" size="25" maxlength="200" value="'.htmlspecialchars($docum, ENT_QUOTES).'"></td></tr>
<tr><td>Пришел :</td><td colspan="2">'.DateSelector("din1", $din1).'-'.DateSelector("din2", $din2).'&nbsp;&nbsp;&nbsp;|&&|&nbsp;&nbsp;&nbsp;'.TimeSelector("tin1", $tin1).'-'.TimeSelector("tin2", $tin2).'</td></tr>
<tr><td><INPUT type="checkbox" name="st_out" class="btn"'.$st_out_html.' title="Применять ли фильтр по дате ухода"> Ушел :&nbsp;&nbsp;</td><td colspan="2">'.DateSelector("dout1", $dout1).'-'.DateSelector("dout2", $dlc2).'&nbsp;&nbsp;&nbsp;|&&|&nbsp;&nbsp;&nbsp;'.TimeSelector("tout1", $tout1).'-'.TimeSelector("tout2", $tout2).'</td></tr>
<tr><td><INPUT type="checkbox" name="st_lc" class="btn"'.$st_lc_html.' title="Применять ли фильтр по дате последненго изменения">timestamp:</td><td>c '.DateSelector("dlc1", $dlc1).'&nbsp;&nbsp;&nbsp;'.TimeSelector("tlc1", $tlc1).'</td><td>по '.DateSelector("dlc2", $dlc2).'&nbsp;&nbsp;&nbsp;'.TimeSelector("tlc2", $tlc2).'</td></tr>
<tr><td>Пропуск :</td><td><INPUT type="text" name="propusk" size="5" maxlength="20" value="'.htmlspecialchars($propusk, ENT_QUOTES).'"> К кому : <INPUT type="text" name="prim" size="20" maxlength="200" value="'.htmlspecialchars($prim, ENT_QUOTES).'"></td><td class="btntd"><INPUT type="hidden" name="f_hid" value="yes">'.$print_link.'<INPUT type="submit" class="btn" onclick="this.disabled = true; submit();" value="'.$admin_apply_filters.'"> '.$admin_cancel_button.'</td></tr></table></form>' ;
 if ($status_string != '') { print '<font class="usop_alert">'.$status_string.'</font><hr>'; }
print '<Br><table><tr><td class="std">Пришел</td><td class="std">ФИО</td><td class="std">Документ</td><td class="std">Пропуск</td><td class="std">К кому</td><td class="std">Ушел</td><td class="std">Последнее изменение</td> <td class="std">Создал</td></tr>';
$dates_res = mysqli_query ($sql, "SELECT DISTINCT date_in FROM visits_pos WHERE $filts1") ; $i = 0;
while ($dates_row = mysqli_fetch_array($dates_res)) { $cu_datee = $dates_row["date_in"];
   $lviss_res = mysqli_query ($sql, "SELECT vp.*, op.login FROM visits_pos vp
                               LEFT JOIN operators op ON op.id = vp.operator_id
                               WHERE vp.`date_in` = '$cu_datee' $filts2 ORDER BY ISNULL(vp.date_out) DESC, vp.time_in DESC, vp.fio") ;
   if (mysqli_num_rows($lviss_res) != 0) { print '<tr><td colspan="7" class="usop_alert">[ '.comp2hum_date($cu_datee).' ]</td></tr>'; }
   while ($lvs_row = mysqli_fetch_array($lviss_res)) { $i++;
   if (($lvs_row["date_out"] == '' AND $lvs_row["time_out"] == '') OR ($lvs_row["date_out"] == '0000-00-00' AND $lvs_row["time_out"] == '00:00:00')) { if (($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1 OR $user_info["is_administrator"] == 1) AND $prnt != 1) { $cu_edit_lnk = '<a href="?ops=epos&amp;id='.$lvs_row["id"].'"><font class="comment">'.htmlspecialchars($index_pos_edit_text, ENT_QUOTES).'</font></a>'; } ELSE { $cu_edit_lnk = ''; }; } ELSE { $cu_edit_lnk = '<NoBr>'.comp2hum_date($lvs_row["date_out"]).'&nbsp;'.$lvs_row["time_out"].'</NoBr>'; if ($user_info["is_root"] == 1 AND $prnt != 1) { $cu_edit_lnk .= ' <a href="?ops=epos&amp;id='.$lvs_row["id"].'"><font class="comment">[Редактировать]</font></a>'; } };
   print '<tr><td class="sml">'.$lvs_row["time_in"].'</td><td class="sml">'.htmlspecialchars($lvs_row["fio"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["docum"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["propusk"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["prim"], ENT_QUOTES).'</td><td class="sml">'.$cu_edit_lnk.'</td><td class="sml">'.$lvs_row["change_date"].'</td><td class="sml">'.htmlspecialchars($lvs_row["login"]).'</td></tr>'; }
}   if ($i == 0) { print '<tr><td colspan="7"><Br></td></tr><tr><td colspan="7" class="usop_alert">'.$admin_no_data.'</td></tr>'; }   print '</table><Br>';
}
break; }   /* END ПОСЕТИТЕЛИ - МОНИТОРИНГ */

case 'avtm' : {   /* START АВТОМОБИЛИ - МОНИТОРИНГ */
if ($user_info["is_root"] == 1 OR $user_info["is_administrator"] == 1) {
$filts1 = "`date_in` <= '$curr_date' ORDER BY date_in DESC LIMIT $index_num_avt_dates";   $filts2 = "";
$f_hid = isset($_POST["f_hid"]) ? $_POST["f_hid"] : '';
$fio = isset ($_POST["fio"]) ? $_POST["fio"] : ''; $car = isset ($_POST["car"]) ? $_POST["car"] : ''; $docum = isset ($_POST["docum"]) ? $_POST["docum"] : ''; $propusk = isset ($_POST["propusk"]) ? $_POST["propusk"] : ''; $prim = isset ($_POST["prim"]) ? $_POST["prim"] : '';
$st_out = isset($_POST["st_out"]) ? $_POST["st_out"] : ''; $st_lc = isset($_POST["st_lc"]) ? $_POST["st_lc"] : '';
 $din1d = isset($_POST["din1_day"]) ? $_POST["din1_day"] : ''; $din1m = isset($_POST["din1_month"]) ? $_POST["din1_month"] : ''; $din1y = isset($_POST["din1_year"]) ? $_POST["din1_year"] : '';
          $din1 = substr ( addslashes($din1y.'-'.$din1m.'-'.$din1d), 0, 10 ) ;
 $tin1h = isset($_POST["tin1_hour"]) ? $_POST["tin1_hour"] : '00'; $tin1m = isset($_POST["tin1_minute"]) ? $_POST["tin1_minute"] : '00';
          $tin1 = substr ( addslashes($tin1h.':'.$tin1m.':00'), 0, 8 ) ;
 $din2d = isset($_POST["din2_day"]) ? $_POST["din2_day"] : ''; $din2m = isset($_POST["din2_month"]) ? $_POST["din2_month"] : ''; $din2y = isset($_POST["din2_year"]) ? $_POST["din2_year"] : '';
          $din2 = substr ( addslashes($din2y.'-'.$din2m.'-'.$din2d), 0, 10 ) ;
 $tin2h = isset($_POST["tin2_hour"]) ? $_POST["tin2_hour"] : '23'; $tin2m = isset($_POST["tin2_minute"]) ? $_POST["tin2_minute"] : '59';
          $tin2 = substr ( addslashes($tin2h.':'.$tin2m.':00'), 0, 8 ) ;
$dout1d = isset($_POST["dout1_day"]) ? $_POST["dout1_day"] : ''; $dout1m = isset($_POST["dout1_month"]) ? $_POST["dout1_month"] : ''; $dout1y = isset($_POST["dout1_year"]) ? $_POST["dout1_year"] : '';
          $dout1 = substr ( addslashes($dout1y.'-'.$dout1m.'-'.$dout1d), 0, 10 ) ;
$tout1h = isset($_POST["tout1_hour"]) ? $_POST["tout1_hour"] : '00'; $tout1m = isset($_POST["tout1_minute"]) ? $_POST["tout1_minute"] : '00';
          $tout1 = substr ( addslashes($tout1h.':'.$tout1m.':00'), 0, 8 ) ;
$dout2d = isset($_POST["dout2_day"]) ? $_POST["dout2_day"] : ''; $dout2m = isset($_POST["dout2_month"]) ? $_POST["dout2_month"] : ''; $dout2y = isset($_POST["dout2_year"]) ? $_POST["dout2_year"] : '';
          $dout2 = substr ( addslashes($dout2y.'-'.$dout2m.'-'.$dout2d), 0, 10 ) ;
$tout2h = isset($_POST["tout2_hour"]) ? $_POST["tout2_hour"] : '23'; $tout2m = isset($_POST["tout2_minute"]) ? $_POST["tout2_minute"] : '59';
          $tout2 = substr ( addslashes($tout2h.':'.$tout2m.':00'), 0, 8 ) ;
 $dlc1d = isset($_POST["dlc1_day"]) ? $_POST["dlc1_day"] : ''; $dlc1m = isset($_POST["dlc1_month"]) ? $_POST["dlc1_month"] : ''; $dlc1y = isset($_POST["dlc1_year"]) ? $_POST["dlc1_year"] : '';
          $dlc1 = substr ( addslashes($dlc1y.'-'.$dlc1m.'-'.$dlc1d), 0, 10 ) ;
 $tlc1h = isset($_POST["tlc1_hour"]) ? $_POST["tlc1_hour"] : '00'; $tlc1m = isset($_POST["tlc1_minute"]) ? $_POST["tlc1_minute"] : '00';
          $tlc1 = substr ( addslashes($tlc1h.':'.$tlc1m.':00'), 0, 8 ) ;
 $dlc2d = isset($_POST["dlc2_day"]) ? $_POST["dlc2_day"] : ''; $dlc2m = isset($_POST["dlc2_month"]) ? $_POST["dlc2_month"] : ''; $dlc2y = isset($_POST["dlc2_year"]) ? $_POST["dlc2_year"] : '';
          $dlc2 = substr ( addslashes($dlc2y.'-'.$dlc2m.'-'.$dlc2d), 0, 10 ) ;
 $tlc2h = isset($_POST["tlc2_hour"]) ? $_POST["tlc2_hour"] : '23'; $tlc2m = isset($_POST["tlc2_minute"]) ? $_POST["tlc2_minute"] : '59';
          $tlc2 = substr ( addslashes($tlc2h.':'.$tlc2m.':00'), 0, 8 ) ;
if ( $f_hid == 'yes' ) {   /* START СБОРКА ФИЛЬТРОВ */
   if (chk_date($din1) != 1) { $din1 = $curr_date; }   if (chk_date($din2) != 1) { $din2 = $curr_date; }
   if (chk_date($dout1) != 1) { $dout1 = $curr_date; }   if (chk_date($dout2) != 1) { $dout2 = $curr_date; }
   if (chk_date($dlc1) != 1) { $dlc1 = $curr_date; }   if (chk_date($dlc2) != 1) { $dlc2 = $curr_date; }
if ($din1 == $din2) { $filts1 = "`date_in` = '$din1'"; } ELSE { $filts1 = "`date_in` >= '$din1' AND `date_in` <= '$din2'"; } ;
if ($tin1 == $tin2) { $filts1 .= " AND `time_in` = '$tin1'"; } ELSE { $filts1 .= " AND `time_in` >= '$tin1' AND `time_in` <= '$tin2'"; } ;
 if ($st_out == 'on') { if ($dout1 == $dout2) { $filts2 .= " AND `date_out` = '$dout1'"; } ELSE { $filts2 .= "AND (`date_out` >= '$dout1' AND `date_out` <= '$dout2')"; } ; }
 if ($st_out == 'on') { if ($tout1 == $tout2) { $filts2 .= " AND `time_out` = '$tout1'"; } ELSE { $filts2 .= "AND (`time_out` >= '$tout1' AND `time_out` <= '$tout2')"; } ; }
if ($st_lc == 'on') { if ($dlc1 == $dlc2 AND $tlc1 == $tlc2) { $filts2 .= " AND `change_date` = '$dlc1 $tlc1'"; } ELSE { $filts2 .= "AND (`change_date` >= '$dlc1 $tlc1' AND `change_date` <= '$dlc2 $tlc2')"; } ;   }
 if ($fio != '') {$filts2 .= " AND `fio` LIKE '%".addslashes($fio)."%'";}
 if ($car != '') {$filts2 .= " AND `car` LIKE '%".addslashes($car)."%'";}
 if ($docum != '') {$filts2 .= " AND `docum` LIKE '%".addslashes($docum)."%'";}
 if ($propusk != '') {$filts2 .= " AND `propusk` LIKE '%".addslashes($propusk)."%'";}
 if ($prim != '') {$filts2 .= " AND `prim` LIKE '%".addslashes($prim)."%'";}
$filts1 .= " ORDER BY date_in DESC";
}   /* END СБОРКА ФИЛЬТРОВ */
  if ($st_out == 'on') {$st_out_html = ' checked';} ELSE {$st_out_html = '';};
  if ($st_lc == 'on') {$st_lc_html = ' checked';} ELSE {$st_lc_html = '';};
print 'Автомобили<Br><form method="POST"><table><tr><td class="btntd">Фильтры:</td><td>ФИО : <INPUT type="text" name="fio" size="30" maxlength="200" value="'.htmlspecialchars($fio, ENT_QUOTES).'"></td><td>Машина : <INPUT type="text" name="car" size="10" maxlength="50" value="'.htmlspecialchars($car, ENT_QUOTES).'"> Документ : <INPUT type="text" name="docum" size="10" maxlength="200" value="'.htmlspecialchars($docum, ENT_QUOTES).'"></td></tr>
<tr><td>Приехал :</td><td colspan="2">'.DateSelector("din1", $din1).'-'.DateSelector("din2", $din2).'&nbsp;&nbsp;&nbsp;|&&|&nbsp;&nbsp;&nbsp;'.TimeSelector("tin1", $tin1).'-'.TimeSelector("tin2", $tin2).'</td></tr>
<tr><td><INPUT type="checkbox" name="st_out" class="btn"'.$st_out_html.' title="Применять ли фильтр по дате ухода"> Уехал :&nbsp;</td><td colspan="2">'.DateSelector("dout1", $dout1).'-'.DateSelector("dout2", $dout2).'&nbsp;&nbsp;&nbsp;|&&|&nbsp;&nbsp;&nbsp;'.TimeSelector("tout1", $tout1).'-'.TimeSelector("tout2", $tout2).'</td></tr>
<tr><td><INPUT type="checkbox" name="st_lc" class="btn"'.$st_lc_html.' title="Применять ли фильтр по дате последненго изменения">timestamp:</td><td>с '.DateSelector("dlc1", $dlc1).'&nbsp;&nbsp;&nbsp;'.TimeSelector("tlc1", $tlc1).'</td><td>по '.DateSelector("dlc2", $dlc2).'&nbsp;&nbsp;&nbsp;'.TimeSelector("tlc2", $tlc2).'</td></tr>
<tr><td>Пропуск :</td><td><INPUT type="text" name="propusk" size="5" maxlength="20" value="'.htmlspecialchars($propusk, ENT_QUOTES).'"> К кому : <INPUT type="text" name="prim" size="20" maxlength="200" value="'.htmlspecialchars($prim, ENT_QUOTES).'"></td><td class="btntd"><INPUT type="hidden" name="f_hid" value="yes">'.$print_link.'<INPUT type="submit" class="btn" onclick="this.disabled = true; submit();" value="'.$admin_apply_filters.'"> '.$admin_cancel_button.'</td></tr></table></form>' ;
 if ($status_string != '') { print '<font class="usop_alert">'.$status_string.'</font><hr>'; }
print '<Br><table><tr><td class="std">Приехал</td><td class="std">ФИО</td><td class="std">Машина (№)</td><td class="std">Документ</td><td class="std">Пропуск</td><td class="std">К кому</td><td class="std">Выехал</td><td class="std">Последнее изменение</td><td class="std">Создал</td></tr>';
$dates_res = mysqli_query ($sql, "SELECT DISTINCT date_in FROM visits_avt WHERE $filts1") ; $i = 0 ;
while ($dates_row = mysqli_fetch_array($dates_res)) { $cu_datee = $dates_row["date_in"];
   $lviss_res = mysqli_query ($sql, "SELECT vp.*, op.login FROM visits_avt vp
                               LEFT JOIN operators op ON op.id = vp.operator_id
                               WHERE vp.`date_in` = '$cu_datee' $filts2 ORDER BY ISNULL(vp.date_out) DESC, vp.time_in DESC, vp.fio") ;
   if (mysqli_num_rows($lviss_res) != 0) { print '<tr><td colspan="8" class="usop_alert">[ '.comp2hum_date($cu_datee).' ]</td></tr>'; }
   while ($lvs_row = mysqli_fetch_array($lviss_res)) { $i++;
   if (($lvs_row["date_out"] == '' AND $lvs_row["time_out"] == '') OR ($lvs_row["date_out"] == '0000-00-00' AND $lvs_row["time_out"] == '00:00:00')) { if (($user_info["is_root"] == 1 OR $user_info["is_guard"] == 1 OR $user_info["is_administrator"] == 1) AND $prnt != 1) { $cu_edit_lnk = '<a href="?ops=eavt&amp;id='.$lvs_row["id"].'"><font class="comment">'.htmlspecialchars($index_pos_edit_text, ENT_QUOTES).'</font></a>'; } ELSE { $cu_edit_lnk =''; }; } ELSE { $cu_edit_lnk = '<NoBr>'.comp2hum_date($lvs_row["date_out"]).'&nbsp;'.$lvs_row["time_out"].'</NoBr>'; if ($user_info["is_root"] == 1 AND $prnt != 1) { $cu_edit_lnk .= ' <a href="?ops=epos&amp;id='.$lvs_row["id"].'"><font class="comment">[Редактировать]</font></a>'; } };
   print '<tr><td class="sml">'.$lvs_row["time_in"].'</td><td class="sml">'.htmlspecialchars($lvs_row["fio"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["car"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["docum"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["propusk"], ENT_QUOTES).'</td><td class="sml">'.htmlspecialchars($lvs_row["prim"], ENT_QUOTES).'</td><td class="sml">'.$cu_edit_lnk.'</td><td class="sml">'.$lvs_row["change_date"].'</td><td class="sml">'.htmlspecialchars($lvs_row["login"]).'</td><</tr>'; }
}   if ($i == 0) { print '<tr><td colspan="8"><Br></td></tr><tr><td colspan="8" class="usop_alert">'.$admin_no_data.'</td></tr>'; }   print '</table></form><Br>';
}
break; }   /* END АВТОМОБИЛИ - МОНИТОРИНГ */


};   /* END REPORTS MEGA-SWITCH */

if ($prnt != 1) { print '</td></tr></table>'; }
if ( ($ops == 'ruls' OR $ops == 'twk' OR $ops == 'opers' OR $ops == 'newpwd') and $prnt != 1) { print '<a href="new_passwords.php" target="_blank">Генератор паролей</a>'; }
print '</body></html>'; mysqli_close($sql);
?>
