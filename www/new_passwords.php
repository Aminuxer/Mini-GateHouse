<?php $length = isset ($_GET["length"]) ? $_GET["length"] : 10; $num = isset ($_GET["num"]) ? $_GET["num"] : 25; $alph = isset($_GET["alph"]) ? $_GET["alph"] : '';

require("options.php");   /* подключим файл настроек, из него берутся $db_hoster, $db_login, $db_pwd, $db_name */
include("localization/default.php");

ob_start('ob_gzhandler');
$min_lenght = 7; $max_lenght = 512; $min_num = 1; $max_num = 128; $complex = 3;
print '<html><head>
<title>Генератор паролей</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
    body {backgroung-color: silver; font-size: 12pt;}
    table {background-color: white; font-family:courier; text-align: left; border-collapse: collapse;}
    td {font-face:Arial; font-size: 14pt; border: 1px solid black;}
    </style>
</head><body>';

if ($length < $min_lenght OR $length > $max_lenght) { $length = 10; }
if ($num < $min_num OR $num > $max_num) { $num = 25; }
if ($alph == '') { $alph = 'abcdefghijkmnoprstuvxyzABCDEFGHJKLMNPQRSTUVXYZ23456789_~!@#$%^&*'; }

/* Функция генерации случайного пароля заданной длинны. Второй параметр - набор символов */
function generate_random_password($length=15, $arr='abcdefghijkmnoprstuvxyzABCDEFGHJKLMNPQRSTUVXYZ23456789_~!@#$%^&*')
    { $length = (int)$length; $pass = ""; srand( ((int)((double)microtime()*1000003)) );
    if ($length == 0) { $length = 15; }
    for($i = 0; $i < $length; $i++) { $index = rand(0, strlen($arr) - 1); $pass .= $arr[$index]; }
return $pass; }

function get_password_complex ($pass) { $pass = trim($pass);
    if (strlen($pass) > 0) { $diff = 0; } ELSE { return -1; }
    if (preg_match("/[a-z]{1,}/", $pass)) $diff++;
    if (preg_match("/[A-Z]{1,}/", $pass)) $diff++;
    if (preg_match("/[0-9]{1,}/", $pass)) $diff++;
    if (preg_match("/[-\~\`\!\"\'\|\№\#\$\&\^\%\@\;\%\:\?\*\/\+\_\=\.\,]{1,}/", $pass)) $diff++;
return $diff; }

print '<form method="GET"><input type="text" size="3" value="'.$num.'" name="num" title="от '.$min_num.' до '.$max_num.'">
   '.$loc_rand_pass_gen_random_passwords.'
   <input type="text" size="3" value="'.$length.'" name="length" title="от '.$min_lenght.' до '.$max_lenght.'">
   <input type="submit" value="'.$loc_rand_pass_gen_symbols_length.' ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;['.date("Y-m-d H:i:s").']
   <Br><INPUT type="text" name="alph" value="'.$alph.'" size="90">
</form>
<Br><Br><table>';

$i=0;
if (get_password_complex($alph) < $complex) { print 'Error - alphabet too short'; } ELSE {
while ($i < $num/2) {
$pwd = generate_random_password($length, $alph); $pwd2 = generate_random_password($length, $alph);
if (get_password_complex($pwd) >= $complex AND get_password_complex($pwd2) >= $complex) {
 $i++;
print '<tr><td width="1%">'.$i.'</td><td width="40%"></td><td>'.htmlspecialchars($pwd, ENT_QUOTES).'</td><td width="1%"></td>
           <td width="1%">'.($i+1).'</td><td width="40%"></td><td>'.htmlspecialchars($pwd2, ENT_QUOTES).'</td></tr>
<tr><td colspan="5"></td></tr>' ; }   }
};

print '</table></form></body></html>';
?>
