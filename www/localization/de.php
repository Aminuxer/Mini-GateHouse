<?php
       /* Mini-GateHouse DEUTSCH Localization strings */
  /* Varialbles for replacing; Set $localization = 'de'; in config for apply */

  $loc_rand_pass_gen_random_passwords = 'Zufälliges Passwort bei';
  $loc_rand_pass_gen_symbols_length = 'Symbole Länge';

  $loc_main_menu_visitors = 'Besucher';
  $loc_main_menu_visitors_list = 'Besucherliste';

  $loc_main_menu_cars = 'Autos';
  $loc_main_menu_cars_list = 'Autos Listen';

  $loc_main_menu_about = 'Über';
  $loc_main_menu_options = 'OPTIONEN';
  $loc_main_menu_logins = 'Anmeldungen';
  $loc_main_menu_workrules = 'Regeln';

  $loc_main_menu_logout_hint = 'Beenden (Sitzung beenden)';
  $loc_main_error = 'Fehler';
  $loc_error_bad_user_agent = 'Dieser Client <Br/>%s<Br/>kann nicht verwendet werden.<Br/>Versuchen Sie einen anderen Browser/eine andere Anwendung.';
  
  $loc_visitors_surname = 'Nachname N.';
  $loc_search_surname_short = 'Nachn.';
  $loc_visitors_document = 'Dokument (iD-Karte, Reisepass)';
  $loc_visitors_document_short = 'Dokument';
  $loc_visitors_come = 'kommen';
  $loc_visitors_gone = 'gegangen';
  $loc_visitors_ticket = 'Ausweis';
  $loc_visitors_target = 'die';
  $loc_visitors_comment = 'Kommentar';
  $loc_visitors_last_change = 'Letzte Änderung';
  $loc_visitors_creator = 'Erstellt von';
  
  $loc_visitors_adding_visitor = 'BESUCHER HINZUFÜGEN';
  $loc_visitors_already_exists = 'DIESER BESUCH EXISTIERT BEREITS';
  
  $loc_without_option = 'Ohne diese Option';
  $loc_add_impossible = 'kann nicht hinzugefügt werden';
  
  
  $loc_cars_carnumber = 'Auto (№)';
  $loc_cars_arrived = 'angekommen';
  $loc_cars_gone = 'gegangen';
  $loc_cars_adding_car = 'AUTO hinzufügen';
  $loc_cars_already_exists = 'DIESES AUTO EXISTIERT BEREITS';
  
  $loc_search_filters = 'Filter:';
  $loc_print_text = 'drucken';
  $loc_print_checkbox_hint = 'Prüfen Sie dies, um sich auf den Druck vorzubereiten';
  $loc_processing_text = 'AUSFÜHREN';
  $loc_success_text = 'BEREIT';
  $loc_failure_text = 'FEHLER';

  $loc_filterdates_since = 'von';
  $loc_filterdates_to = 'unter';

  $loc_filtes_hint_date_out = 'Filter auf verschwundenes Datum anwenden';
  $loc_filtes_hint_date_last_change = 'Filter auf das Datum der letzten Änderungen anwenden';

  $loc_link_edit = 'bearbeiten';

  $loc_edit_editing_title = 'Bearbeitung von';
  $loc_edit_editing_title_hint = 'Zeile mit id';
  $loc_edit_editing_visitor_header1= 'Ihr Bearbeitungsdatensatz für diesen Besucher';
  $loc_edit_editing_cars_header1= 'Ihr Bearbeitungsprotokoll für dieses Auto';

  $loc_edit_accessible_actions = 'Nächste erlaubte Aktion';
  $loc_edit_action1_assign_visitor_gone_time = 'eine Betreuungszeit festlegen';
  $loc_edit_action1_assign_car_gone_time = 'eine Abfahrtszeit festlegen';
  $loc_edit_action2_change_record_or_unlock = 'Daten ändern und Besuch freischalten.';
  $loc_edit_action3_do_nothing = 'Nichts tun und beenden';

  $loc_options_parameter = 'Parameter';
  $loc_options_value = 'Wert';
  $loc_options_description = 'Beschreibung';
  $loc_options_checkbox_hint = 'Kontrollkästchen für die Aktivierung der Option setzen';
  $loc_options_numberinput_hint = 'eine Zahl eingeben';
  $loc_options_saved_ok = 'Die Änderungen werden erfolgreich gespeichert.';

  $loc_password_generator = 'Kennwort-Generator';

  $loc_logins_title = 'Betreiber';
  $loc_logins_login = 'Anmeldung';
  $loc_logins_enable = 'AUF';
  $loc_logins_username = 'Name oder Positionn';
  $loc_logins_role_root = 'root';
  $loc_logins_role_admin = 'Sicherheitsmanager';
  $loc_logins_role_guard = 'Wachmann';
  $loc_logins_role_password = 'Kennwort';
  $loc_logins_role_password2 = 'Passwortbestätigung';
  $loc_logins_delete = 'löschen';
  $loc_logins_adduser_title_hint = 'Für das Hinzufügen eines neuen Bedieners geben Sie ein neues Login und gleiche Passwörter ein :';
  $loc_logins_new_login_hint = '<Neuer Operator>';

  $loc_login_current_user_text = 'Aktueller Betreiber';  
  $loc_login_current_change_password_link = 'Mein Kennwort ändern';  

  $loc_login_change_password_header = 'Mein Kennwort ändern';
  $loc_login_change_password_you_login = 'Ihre Anmeldung :';
  $loc_login_change_password_you_current_password = 'Altes Kennwort';
  $loc_login_change_password_you_new_password = 'Neues Kennwort';
  $loc_login_change_password_you_new_password2 = 'Passwortbestätigung';
  $loc_login_change_password_submit_button = 'Kennwort ändern';
  $loc_login_change_password_exit_button = 'Ausfahrt';

  $loc_logins_detailed_help = 'Help :<br>
<li> For add operator input new login (not match with existings),<br>&nbsp;&nbsp;&nbsp;non-empty password and password confirmation.</li>
<li> Option `root` - full access to system, including operators management.<br>&nbsp;&nbsp;&nbsp;Can edit any records and input any dates.<br>&nbsp;&nbsp;&nbsp;(Overload another options)</li>
<li> Option `Guard Chef` - View data for any period and change options.<br>&nbsp;&nbsp;&nbsp;Can\'t ADD data, but can edit opened.<br>&nbsp;&nbsp;&nbsp;Closed records in read-only. Any dates allowed.</li>
<li> Option `Guard` - add and edit data only for last N days (from options).<br>&nbsp;&nbsp;&nbsp;Can input dates only in allowed range.</li>
<li> Logins must differ.<br></li>
<li> For change password of existing operator input new password and confirmation in correspond row</li>';

  $loc_about_title = '';
  $loc_about_detailed_help = 'This system allow logging visitors and cars, arrived and gone from your company area.<br>
<font class="usop_alert">0.</font> For start working input URL of server in browser, and type credentials in window
<font class="btntd">%s</font> In field <font class="btntd">%s</font> enter your login,in field <font class="btntd">%s</font> - your password,
also checking gatehouse name <font class="btntd">%s</font> is really correct.<br>
<font class="usop_alert">1.</font> Tabs on top allow switches for input data about visitors and cars.
Notice tab switching clear unsaved forms data.<br>
<font class="usop_alert">2.</font> Before add any data press button <font class="btntd">[F5]</font> for update time from server and input values in form fields. (Time format is <font class="btntd">24</font>-h)<br>
Fileds with <font class="usop_alert">*</font> mark required.<br>
<font class="usop_alert">3.</font> Verify inputed data and check box <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font> (or <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font>)
and press button <INPUT type="button" class="btn" value="%s" disabled> (or <INPUT type="button" class="btn" value="%s" disabled>) only ONE time.<br>
<font class="usop_alert">4.</font> At correct action inputed data appear in list below.<br>
For guards this list show data only for N days (<font class="btntd">%s</font> for visitors / <font class="btntd">%s</font> for cars) by dates descend, and for any day opened visits show at top.
Inside any day records sorted by descending arrival datetime.<br>
<font class="usop_alert">5.</font> All questions pass here :<br><font class="btntd">%s</font>';

  $loc_loginform_login = 'Anmeldung';
  $loc_loginform_password  = 'Kennwort';
  $loc_loginform_input  = 'Eingabe';
  
  $loc_months = array('Jan', 'Feb', 'Mär', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez');
  $loc_logics_name = array ('equal', 'not equal', 'more', 'more or equal', 'less', 'less or equal');
  
  $loc_old_password_incorrect = 'Altes Kennwort falsch.';
  $loc_pass_and_confirm_not_match = 'Kennwort und Bestätigung stimmen nicht überein.';
  $loc_old_password_equal_new = 'Altes Kennwort gleich neues.';
  $loc_password_equal_login = 'Das Kennwort kann nicht mit dem Login übereinstimmen.';
  $loc_empty_password_denied = 'Emplty-Kennwort nicht erlaubt';
  $loc_password_complex_too_low = 'Passwort zu einfach. Mindestens %s verschiedene Symboltypen erforderlich. Aktueller Schwierigkeitsgrad: %s.';
  
  $loc_password_changed_ok = 'Kennwort erfolgreich geändert.';
  $loc_password_changed_fail = 'Passwort nicht geändert.<Br>Fragen Sie Ihren Systemadministrator/IT-Abteilung.';
  
  $loc_value_year_incorrect = 'Jahreswert falsch.';
  $loc_value_month_incorrect = 'Monatswert falsch.';
  $loc_value_day_incorrect = 'Tageswert falsch.';
  $loc_value_hour_incorrect = 'Stundenwert falsch.';
  $loc_value_minute_incorrect = 'Minutenwert falsch.';

  $loc_date_from_future  = 'Datum aus der Zukunft';
  $loc_date_out_less_date_in  = 'Das eingegebene Datum ist kleiner als das Ankunftsdatum.';
  $loc_date_incorrect  = 'Datum falsch';
  $loc_date_too_old  = 'Datum zu alt - nicht im zulässigen Bereich.';

  $loc_repeat_again = 'Erneut versuchen';
  $loc_not_enough_access_rights = 'Keine Zugangsrechte';
  $loc_not_allow_edit_closed_records = 'KANN GESCHLOSSENEN DATENSATZ NICHT BEARBEITEN!';
  $loc_not_exists_record = 'Der Datensatz existiert nicht.';

  $loc_select_edit_without_close = 'AUSGEWÄHLTE BEARBEITUNGEN OHNE FINALISIERUNG';
  $loc_select_edit_with_close = 'FERTIGSTELLUNG BESCHLAGNAHMT';
  $loc_select_cancel = 'AUSGEWÄHLTE ABBRECHEN';

  $loc_opt_commit_changes_close_record = 'Alle Änderungen werden übernommen, und der Datensatz wird zur Bearbeitung geschlossen.';

  $loc_unable_add_with_empty_surname = 'Besucher mit leerem Nachnamen kann nicht hinzugefügt werden.';
  $loc_unable_add_car_with_empty_surname = 'Kann kein Auto ohne den Nachnamen des Fahrers hinzufügen.';
  $loc_unable_add_car_with_empty_number = 'Kann kein Auto ohne den Nachnamen des Fahrers hinzufügen.';

  $loc_opts_index_page_title = 'Main window header for guards';
  $loc_opts_admin_page_title = 'Admin form header';
  $loc_opts_index_add_pos_button = 'Add visitor button text';
  $loc_opts_index_add_avt_button = 'Add car button text';
  $loc_opts_index_add_pos_confm = 'Option text for confirm visitor';
  $loc_opts_index_add_avt_confm = 'Option text for confirm car';
  $loc_opts_index_num_pos_dates = 'View visitors for this last days';
  $loc_opts_index_num_avt_dates = 'View cars for this last days';
  $loc_opts_index_date_edit = 'Allow guards edit date';
  $loc_opts_index_time_edit = 'Allow guards edit time';
  $loc_opts_index_confirm_button = 'Text for confirm buttons (ОК, Yes, Ya etc)';
  $loc_opts_index_pos_edit_text = 'Text for visitor editing link';
  $loc_opts_index_avt_edit_text = 'Text for car editing link';
  $loc_opts_index_tech_support = 'Tech support (string in Usage Rules)';
  $loc_opts_index_cancel_button = 'Text for deny buttons Cancel, No, Discard, etc';
  $loc_opts_index_pos_ststr = 'default status-sting in visitors form';
  $loc_opts_index_avt_ststr = 'default status-sting in cars form';
  $loc_opts_admin_apply_filters = 'Text for filters button';
  $loc_opts_index_cancel_delay = 'Delay (seconds) at press [Cancel]';
  $loc_opts_index_action_delay = 'Delay (seconds) at action';
  $loc_opts_admin_save_changes = 'Save settings button text';
  $loc_opts_admin_cancel_button = 'Reset button Text';
  $loc_opts_admin_no_data = 'Message NO-Data (for filters)';
  $loc_opts_index_print_checkbox = 'Text for checkbiox "for print"';
  $loc_opts_index_show_reset_pwd = 'Show link for reset operator password';
  $loc_opts_admin_min_pswd_diff = 'Minimal password complexity (number of symbols types, 0-8)';

?>
