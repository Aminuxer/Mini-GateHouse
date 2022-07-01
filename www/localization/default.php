<?php
       /* Mini-GateHouse Default Localization strings (RUSSIAN) */
  /* Varialbles with strings for localization; Russian by default; */
  $loc_rand_pass_gen_random_passwords = 'Случайных паролей по';
  $loc_rand_pass_gen_symbols_length = 'символов длиной';

  $loc_main_menu_visitors = 'Посетители';
  $loc_main_menu_visitors_list = 'Мониторинг посетителей';

  $loc_main_menu_cars = 'Автомобили';
  $loc_main_menu_cars_list = 'Мониторинг автомобилей';

  $loc_main_menu_about = 'О системе';
  $loc_main_menu_options = 'НАСТРОЙКИ';
  $loc_main_menu_logins = 'Логины';

  $loc_main_menu_logout_hint = 'Выход (Завершить сессию)';
  
  $loc_visitors_surname = 'Фамилия И. О.';
  $loc_search_surname_short = 'ФИО';
  $loc_visitors_document = 'Документ (паспорт, удостоверение)';
  $loc_visitors_document_short = 'Документ';
  $loc_visitors_come = 'Пришёл';
  $loc_visitors_gone = 'Ушёл';
  $loc_visitors_ticket = 'Пропуск';
  $loc_visitors_target = 'К кому';
  $loc_visitors_comment = 'примечание';
  $loc_visitors_last_change = 'Последнее изменение';
  $loc_visitors_creator = 'Создал';
  
  $loc_visitors_adding_visitor = 'ДОБАВЛЯЕМ ПОСЕТИТЕЛЯ';
  $loc_visitors_already_exists = 'ТАКОЙ ВИЗИТ УЖЕ ЕСТЬ';
  
  
  $loc_cars_carnumber = 'Машина (№)';
  $loc_cars_arrived = 'Приехал';
  $loc_cars_gone = 'Уехал';
  $loc_cars_adding_car = 'ДОБАВЛЯЕМ АВТОМОБИЛЬ';
  $loc_cars_already_exists = 'ТАКОЙ АВТОМОБИЛЬ УЖЕ ЕСТЬ';
  
  $loc_search_filters = 'Фильтры:';
  $loc_print_text = 'печать';
  $loc_print_checkbox_hint = 'Если эта опция установлена, документ будет подготовлен к печати';
  $loc_processing_text = 'ВЫПОЛНЯЮ';
  $loc_success_text = 'ГОТОВО';
  $loc_failure_text = 'СБОЙ';

  $loc_link_edit = 'Редактировать';

  $loc_edit_editing_title = 'Редактирование';
  $loc_edit_editing_title_hint = 'запись с кодом';
  $loc_edit_editing_visitor_header1= 'Вы редактируете запись для этого посетителя';
  $loc_edit_editing_cars_header1= 'Вы редактируете запись для этого автомобиля';

  $loc_edit_accessible_actions = 'Допустимы следующие действия';
  $loc_edit_action1_assign_visitor_gone_time = 'Назначить время ухода равное';
  $loc_edit_action1_assign_car_gone_time = 'Назначить время выезда равное';
  $loc_edit_action2_change_record_or_unlock = 'Внести изменения в данные, разблокировать визит.';
  $loc_edit_action3_do_nothing = 'Ничего не делать и выйти';

  $loc_options_parameter = 'Параметр';
  $loc_options_value = 'Значение';
  $loc_options_descri = 'Описание';
  $loc_options_checkbox_hint = 'Поставьте галку, чтобы включить опцию';
  $loc_options_numberinput_hint = 'Поставьте галку, чтобы включить опцию';
  $loc_options_saved_ok = 'Изменения сохранены успешно.';

  $loc_password_generator = 'Генератор паролей';

  $loc_logins_title = 'Операторы системы';
  $loc_logins_login = 'Логин';
  $loc_logins_enable = 'ON';
  $loc_logins_username = 'Имя или должность';
  $loc_logins_role_root = 'root';
  $loc_logins_role_admin = 'Администратор';
  $loc_logins_role_guard = 'Охранник';
  $loc_logins_role_password = 'Пароль';
  $loc_logins_role_password2 = 'Подтверждение пароля';
  $loc_logins_delete = 'Удалить';
  $loc_logins_adduser_title_hint = 'Для добавления нового оператора обязательно введите новый логин и совпадающие неодинаковые пароли :';
  $loc_logins_new_login_hint = '<Новый оператор>';

  $loc_login_current_user_text = 'Текущий пользователь';  
  $loc_login_current_change_password_link = 'Изменить свой пароль';  

  $loc_login_change_password_header = 'Изменение своего пароля';
  $loc_login_change_password_you_login = 'Ваш логин :';
  $loc_login_change_password_you_current_password = 'Старый пароль';
  $loc_login_change_password_you_new_password = 'Новый пароль';
  $loc_login_change_password_you_new_password2 = 'Подтверждение';
  $loc_login_change_password_submit_button = 'Изменить пароль';
  $loc_login_change_password_exit_button = 'Выход';

  $loc_logins_detailed_help = 'Справка :<br>
<li> Для добавления оператора необходимо указать логин (не совпадающий ни с одним из существующих),<br>&nbsp;&nbsp;&nbsp;а также непустой пароль и его подтверждение.</li>
<li> Опция `root` - полный доступ к системе, включая управление логинами.<br>&nbsp;&nbsp;&nbsp;Можно редактировать записи (любые) и вводить любые даты.<br>&nbsp;&nbsp;&nbsp;(Перекрывает действие других опций)</li>
<li> Опция `Администратор` - просмотр данных за любой период и возможность менять настройки.<br>&nbsp;&nbsp;&nbsp;Нельзя добавлять данные, но можно редактировать незавершенные.<br>&nbsp;&nbsp;&nbsp;Завершенные записи редактировать нельзя. Допустим ввод любых дат.</li>
<li> Опция `Охранник` - добавление и правка данных, но только за последние несколько дней (из настроек).<br>&nbsp;&nbsp;&nbsp;Может вводить даты только в пределах области видимости.</li>
<li> Одинаковые логины не допустимы.<br></li>
<li> Для смены пароля уже существующего оператора введите новый пароль и его подтверждение в соответствующей строке</li>';

  $loc_about_title = '';
  $loc_about_detailed_help = 'Данная система позволяет вести учет пользователей и автомобилей, входящих и покидающих территорию предприятия.<br>
<font class="usop_alert">0.</font> Для начала работы введите адрес сервера системы в браузер, и в окне с названием
<font class="btntd">Username and password</font> введите в поле <font class="btntd">Username</font> свой логин, а в поле <font class="btntd">Password</font> - свой пароль,
предварительно убедившись, что сервер называется <font class="btntd">OXPAHA</font>.<br>
<font class="usop_alert">1.</font> Вкладки сверху позволяют переключаться между формами для ввода посететелей и автомобилей.
Помните, что такое переключение очищает поля форм.<br>
<font class="usop_alert">2.</font> Сразу перед добавлением данных нажмите на клавиатуре кнопку <font class="btntd">[F5]</font>, чтобы обновить время с сервера и введите данные. (Время вводится в <font class="btntd">24</font>-часовом формате)<br>
Учтите, что поля, отмеченные знаком <font class="usop_alert">*</font> , являются обязательными для заполнения.<br>
<font class="usop_alert">3.</font> Если данные введены корректно, то укажите опцию <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font> (или <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font>)
и нажмите кнопку <INPUT type="button" class="btn" value="%s" disabled> (или <INPUT type="button" class="btn" value="%s" disabled>) ровно ОДИН раз.<br>
<font class="usop_alert">4.</font> Если все сделано правильно, то в списке снизу появится строка с вашими данными.<br>
Система настроена таким образом, что данные выводятся за последние несколько дней (<font class="btntd">%s</font> для посетителей / <font class="btntd">%s</font> для автомобилей) по убыванию дат, причем для каждого дня сперва
выводятся незавершенные визиты, а потом завершенные. В каждой подгруппе записи отсортированы в обратном порядке по времени входа.<br>
<font class="usop_alert">5.</font> Со всеми вопросами обращаться сюда :<br><font class="btntd">%s</font>';

  $loc_loginform_login = 'Логин:';
  $loc_loginform_password  = 'Пароль:';
  $loc_loginform_input  = 'Войти';
  
  $months = array('Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря');

  /* If localization != RU - overwrite localization variables */
  if ( $localization != '' and $localization != 'ru' ) {
      include ("$localization.php");
  }

?>
