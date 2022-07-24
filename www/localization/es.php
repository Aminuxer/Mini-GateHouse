<?php
       /* Mini-GateHouse SPANISH Localization strings (MACHINE TRANSLATION) */
  /* Variables with strings for localization; Varialbles con cadenas para la localización;; */

  $loc_rand_pass_gen_random_passwords = 'Contraseñas aleatorias por';
  $loc_rand_pass_gen_symbols_length = 'caracteres de longitud';

  $loc_main_menu_visitors = 'Los visitantes de';
  $loc_main_menu_visitors_list = 'Control de visitantes';

  $loc_main_menu_cars = 'Coches';
  $loc_main_menu_cars_list = 'Control de vehículos';

  $loc_main_menu_about = 'Sobre el sistema';
  $loc_main_menu_options = 'AJUSTES';
  $loc_main_menu_logins = 'Inicio de sesión';
  $loc_main_menu_workrules = 'Normas para trabajar con el sistema.';

  $loc_main_menu_logout_hint = 'Salir (terminar la sesión)';
  $loc_main_error = 'Error';
  $loc_error_bad_user_agent = 'Este cliente<Br/>%s<Br/>no se puede utilizar.<Br/>Utiliza un navegador/aplicación diferente.';
  
  $loc_visitors_surname = 'Apellidos y nombre';
  $loc_search_surname_short = 'NOMBRE';
  $loc_visitors_document = 'Documento (pasaporte, tarjeta de identidad)';
  $loc_visitors_document_short = 'Documento';
  $loc_visitors_come = 'Aquí está';
  $loc_visitors_gone = 'Gone';
  $loc_visitors_ticket = 'Pasar';
  $loc_visitors_target = 'A quien';
  $loc_visitors_comment = 'Nota:';
  $loc_visitors_last_change = 'Última modificación';
  $loc_visitors_creator = 'Creado';
  
  $loc_visitors_adding_visitor = 'AÑADIR UN VISITANTE';
  $loc_visitors_already_exists = 'ESTA VISITA YA ESTÁ EN MARCHA';
  
  $loc_without_option = 'Sin especificar una opción';
  $loc_add_impossible = 'no es posible añadir';
  
  
  $loc_cars_carnumber = 'Vehículo (nº)';
  $loc_cars_arrived = 'Llegada';
  $loc_cars_gone = 'Gone';
  $loc_cars_adding_car = 'AÑADIR UN COCHE';
  $loc_cars_already_exists = 'YA EXISTE UN COCHE DE ESTE TIPO';
  
  $loc_search_filters = 'Filtros:';
  $loc_print_text = 'Imprimir';
  $loc_print_checkbox_hint = 'Si se selecciona esta opción, el documento se preparará para la impresión';
  $loc_processing_text = 'RELACIONADO';
  $loc_success_text = 'LISTO';
  $loc_failure_text = 'BREAKING';

  $loc_filterdates_since = 'desde';
  $loc_filterdates_to = 'a';

  $loc_filtes_hint_date_out = 'Si se aplica un filtro por fecha de salida';
  $loc_filtes_hint_date_last_change = 'Si se aplica un filtro por fecha de última modificación';

  $loc_link_edit = 'Editar';

  $loc_edit_editing_title = 'Edición de';
  $loc_edit_editing_title_hint = 'entrada de código';
  $loc_edit_editing_visitor_header1= 'Está editando una entrada para este visitante';
  $loc_edit_editing_cars_header1= 'Se edita la entrada de este vehículo';

  $loc_edit_accessible_actions = 'Las siguientes acciones están permitidas';
  $loc_edit_action1_assign_visitor_gone_time = 'Asignar un tiempo de atención igual a';
  $loc_edit_action1_assign_car_gone_time = 'Establezca la hora de salida igual a';
  $loc_edit_action2_change_record_or_unlock = 'Hacer cambios en los datos, desbloquear la visita.';
  $loc_edit_action3_do_nothing = 'No hacer nada y salir';

  $loc_options_parameter = 'Parámetro';
  $loc_options_value = 'Valor';
  $loc_options_description = 'Descripción';
  $loc_options_checkbox_hint = 'Ponga una marca para activar la opción';
  $loc_options_numberinput_hint = 'Introduzca un valor numérico';
  $loc_options_saved_ok = 'Los cambios se han guardado correctamente.';

  $loc_password_generator = 'Generador de contraseñas';

  $loc_logins_title = 'Operadores del sistema';
  $loc_logins_login = 'Inicio de sesión';
  $loc_logins_enable = 'EN';
  $loc_logins_username = 'Nombre o cargo';
  $loc_logins_role_root = 'root';
  $loc_logins_role_admin = 'Administrador';
  $loc_logins_role_guard = 'Guardia de seguridad';
  $loc_logins_role_password = 'Contraseña';
  $loc_logins_role_password2 = 'Confirmación de la contraseña';
  $loc_logins_delete = 'Borrar';
  $loc_logins_adduser_title_hint = 'Para añadir un nuevo operador, asegúrese de introducir un nuevo nombre de usuario y contraseñas coincidentes :';
  $loc_logins_new_login_hint = '<Nuevo operador>';

  $loc_login_current_user_text = 'Usuario actual';  
  $loc_login_current_change_password_link = 'Cambiar la contraseña';  

  $loc_login_change_password_header = 'Cambiar la contraseña';
  $loc_login_change_password_you_login = 'Su nombre de usuario :';
  $loc_login_change_password_you_current_password = 'Contraseña antigua';
  $loc_login_change_password_you_new_password = 'Nueva contraseña';
  $loc_login_change_password_you_new_password2 = 'Confirmación';
  $loc_login_change_password_submit_button = 'Cambiar contraseña';
  $loc_login_change_password_exit_button = 'Salida';

  $loc_logins_detailed_help = 'Referencia :<br>
<li> Para añadir un operador, debe especificar un nombre de usuario (que no coincida con ninguno de los existentes),<br>&nbsp;&nbsp;&nbsp;así como una contraseña no vacía y su confirmación.</li>
<li> La opción `root` - acceso completo al sistema, incluyendo la gestión de los inicios de sesión.<br>&nbsp;&nbsp;&nbsp;Puede editar los registros (cualquiera) e introducir cualquier fecha.<br>&nbsp;&nbsp;&nbsp;(Anula otras opciones)</li>
<li> La opción "Administrador": permite ver los datos de cualquier período y cambiar la configuración.<br>&nbsp;&nbsp;&nbsp;No puede añadir datos, pero puede editar los datos incompletos.<br>&nbsp;&nbsp;&nbsp;Las entradas completadas no pueden ser editadas. Se pueden introducir todas las fechas.</li>
<li> La opción "Guardián" permite añadir y editar datos, pero sólo de los últimos días (desde la configuración).<br>&nbsp;&nbsp;&nbsp;Sólo se pueden introducir fechas dentro del ámbito de aplicación.</li>
<li> No se permiten inicios de sesión idénticos.<br></li>
<li> Para cambiar la contraseña de un operador existente, introduzca la nueva contraseña y su confirmación en la línea correspondiente</li>';

  $loc_about_detailed_help = 'Este sistema le permite llevar un registro de los usuarios y vehículos que entran y salen de sus instalaciones.<br>
<font class="usop_alert">0.</font> Para empezar, introduzca la dirección del servidor del sistema en su navegador, y en la ventana denominada
<font class="btntd">%s</font> entrar en el campo <font class="btntd">%s</font> su ingreso, y en el campo <font class="btntd">%s</font> - su contraseña,
comprobando previamente que la ventana se llama <font class="btntd">%s</font> y esta es su instalación.<br>
<font class="usop_alert">1.</font> Las pestañas de la parte superior le permiten cambiar entre los formularios de entrada de visitantes y de coches.
Recuerde que este interruptor borra los campos del formulario.<br>
<font class="usop_alert">2.</font> Inmediatamente antes de añadir los datos, pulse el botón del teclado <font class="btntd">[F5]</font>, para actualizar la hora desde el servidor e introducir los datos. (La hora se introduce en <font class="btntd">24</font>-formato horario)<br>
Tenga en cuenta que los campos marcados con <font class="usop_alert">*</font> son obligatorios.<br>
<font class="usop_alert">3.</font> Si los datos son correctos, seleccione la opción <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font> (o <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font>)
y pulsar el botón <INPUT type="button" class="btn" value="%s" disabled> (o <INPUT type="button" class="btn" value="%s" disabled>) exactamente una vez.<br>
<font class="usop_alert">4.</font> Si has hecho todo correctamente, aparecerá una línea con tus datos al final de la lista.<br>
El sistema está configurado para que se muestren los datos de los últimos días (<font class="btntd">%s</font> para los visitantes / <font class="btntd">%s</font> para coches) en orden descendente de fechas, con cada día primero
las visitas incompletas se muestran primero, seguidas de las visitas completadas. En cada subgrupo, las entradas se clasifican en orden inverso a la hora de entrada.<br>
<font class="usop_alert">5.</font> Todas las preguntas deben dirigirse aquí :<br><font class="btntd">%s</font>';

  $loc_loginform_login = 'Inicio de sesión';
  $loc_loginform_password  = 'Contraseña';
  $loc_loginform_input  = 'Entrar en el sistema';
  
  $loc_months = array('Enero', 'Febrero', 'Martha', 'Abril', 'Mayo', 'Junio', 'Julio', 'Augusta', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
  $loc_logics_name = array ('es igual a', 'no es igual a', 'más', 'mayor o igual que', 'menos', 'menor o igual a');
  
  $loc_old_password_incorrect = 'La antigua contraseña no fue introducida correctamente.';
  $loc_pass_and_confirm_not_match = 'La contraseña y su confirmación no coinciden.';
  $loc_old_password_equal_new = 'La antigua contraseña es la misma que la nueva.';
  $loc_password_equal_login = 'La contraseña no debe ser la misma que la del inicio de sesión.';
  $loc_empty_password_denied = 'No se acepta una contraseña en blanco.';
  $loc_password_complex_too_low = 'La contraseña es demasiado simple. Requiere un mínimo de %s tipos de caracteres diferentes. Complejidad actual: %s.';
  
  $loc_password_changed_ok = 'La contraseña ha sido cambiada con éxito.';
  $loc_password_changed_fail = 'No se ha podido cambiar la contraseña.<Br> Póngase en contacto con el administrador del sistema.';
  
  $loc_value_year_incorrect = 'El valor del año no es correcto.';
  $loc_value_month_incorrect = 'El valor del mes no es correcto.';
  $loc_value_day_incorrect = 'El valor del día no es correcto.';
  $loc_value_hour_incorrect = 'El valor de la hora no es correcto.';
  $loc_value_minute_incorrect = 'El valor del acta no es correcto.';

  $loc_date_from_future  = 'Se indica una fecha del futuro';
  $loc_date_out_less_date_in  = 'La fecha indicada es inferior a la fecha de llegada.';
  $loc_date_incorrect  = 'La fecha indicada es incorrecta';
  $loc_date_too_old  = 'La fecha especificada es demasiado antigua: está fuera de rango.';

  $loc_repeat_again = 'Inténtalo de nuevo';
  $loc_not_enough_access_rights = 'Derechos de acceso insuficientes';
  $loc_not_allow_edit_closed_records = '¡NO SE PERMITE LA ACTUALIZACIÓN DE UN REGISTRO CERRADO !';
  $loc_not_exists_record = 'El registro no existe';

  $loc_select_edit_without_close = 'SE HA SELECCIONADO LA EDICIÓN SIN FINALIZACIÓN';
  $loc_select_edit_with_close = 'LA TERMINACIÓN FUE ELEGIDA';
  $loc_select_cancel = 'SE HA SELECCIONADO LA CANCELACIÓN';

  $loc_opt_commit_changes_close_record = 'Se realizarán todos los cambios y luego se cerrará la entrada para su edición.';

  $loc_unable_add_with_empty_surname = 'No es posible añadir un visitante con un apellido vacío.';
  $loc_unable_add_car_with_empty_surname = 'No es posible añadir un vehículo sin el apellido del conductor.';
  $loc_unable_add_car_with_empty_number = 'No es posible añadir un vehículo sin número.';

  $loc_opts_index_page_title = 'La cabecera de la ventana principal vista por los vigilantes';
  $loc_opts_admin_page_title = 'Cabecera de la ventana del formulario de administración';
  $loc_opts_index_add_pos_button = 'Texto para el botón que añade un visitante';
  $loc_opts_index_add_avt_button = 'Texto del botón para añadir un vehículo';
  $loc_opts_index_add_pos_confm = 'Texto para la opción de confirmación del visitante';
  $loc_opts_index_add_avt_confm = 'Texto para la opción de confirmación del vehículo';
  $loc_opts_index_num_pos_dates = 'Cuántos días hay que mostrar a los visitantes';
  $loc_opts_index_num_avt_dates = 'Cuántos días de antelación para mostrar los coches';
  $loc_opts_index_date_edit = 'Permitir que los guardias editen las fechas';
  $loc_opts_index_time_edit = 'Permitir a los guardias editar la hora';
  $loc_opts_index_confirm_button = 'Texto para los botones de confirmación (OK, YES, etc.)';
  $loc_opts_index_pos_edit_text = 'Texto para el enlace de edición del visitante';
  $loc_opts_index_avt_edit_text = 'Texto para el enlace de edición del coche';
  $loc_opts_index_tech_support = 'Servicio de atención al cliente (línea en las condiciones de uso)';
  $loc_opts_index_cancel_button = 'Texto para los botones Cancelar, Anular, etc.';
  $loc_opts_index_pos_ststr = 'Barra de estado por defecto para los visitantes';
  $loc_opts_index_avt_ststr = 'Barra de estado por defecto para los vehículos';
  $loc_opts_admin_apply_filters = 'Texto para el botón que activa los filtros';
  $loc_opts_index_cancel_delay = 'Retraso (seg) al pulsar [cancelar]';
  $loc_opts_index_action_delay = 'Retraso (s) en la realización de la acción';
  $loc_opts_admin_save_changes = 'Texto para el botón de guardar';
  $loc_opts_admin_cancel_button = 'Texto para los botones de reinicio en el área de administración';
  $loc_opts_admin_no_data = 'No hay mensaje de datos (para los filtros)';
  $loc_opts_index_print_checkbox = 'Texto en la casilla "para imprimir"';
  $loc_opts_index_show_reset_pwd = 'Mostrar enlace para restablecer la contraseña';
  $loc_opts_admin_min_pswd_diff = 'Complejidad mínima de la contraseña (número de caracteres, 0-8)';

?>
