<?php
       /* Mini-GateHouse DEUTSCH Localization strings */
  /* Variables for replacing; Set $localization = 'de'; in config for apply */

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
  $loc_visitors_come = 'Kommen';
  $loc_visitors_gone = 'Gegangen';
  $loc_visitors_ticket = 'Ausweis';
  $loc_visitors_target = 'Die';
  $loc_visitors_comment = 'Kommentar';
  $loc_visitors_last_change = 'Letzte Änderung';
  $loc_visitors_creator = 'Erstellt von';
  
  $loc_visitors_adding_visitor = 'BESUCHER HINZUFÜGEN';
  $loc_visitors_already_exists = 'DIESER BESUCH EXISTIERT BEREITS';
  
  $loc_without_option = 'Ohne diese Option';
  $loc_add_impossible = 'kann nicht hinzugefügt werden';
  
  
  $loc_cars_carnumber = 'Auto (№)';
  $loc_cars_arrived = 'Angekommen';
  $loc_cars_gone = 'Gegangen';
  $loc_cars_adding_car = 'AUTO hinzufügen';
  $loc_cars_already_exists = 'DIESES AUTO EXISTIERT BEREITS';
  
  $loc_search_filters = 'Filter:';
  $loc_filters_timestamp = 'Zeit ändern';
  $loc_print_text = 'drucken';
  $loc_print_checkbox_hint = 'Prüfen Sie dies, um sich auf den Druck vorzubereiten';
  $loc_processing_text = 'AUSFÜHREN';
  $loc_success_text = 'BEREIT';
  $loc_failure_text = 'FEHLER';

  $loc_filterdates_since = 'von';
  $loc_filterdates_to = 'unter';

  $loc_filtes_hint_date_out = 'Filter auf verschwundenes Datum anwenden';
  $loc_filtes_hint_date_last_change = 'Filter auf das Datum der letzten Änderungen anwenden';

  $loc_link_edit = 'Bearbeiten';

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
<li> Für die Eingabe eines neuen Logins (nicht mit dem bestehenden übereinstimmend),<br>&nbsp;&nbsp;&nbsp;nicht leeres Kennwort und Kennwortbestätigung.</li>
<li> Option `root` - voller Zugriff auf das System, einschließlich der Verwaltung der Operatoren.<br>&nbsp;&nbsp;&nbsp;Kann beliebige Datensätze bearbeiten und beliebige Daten eingeben.<br>&nbsp;&nbsp;&nbsp;(Überladen Sie andere Optionen)</li>
<li> Option `Sicherheitsmanager` - Daten für einen beliebigen Zeitraum anzeigen und Optionen ändern.<br>&nbsp;&nbsp;&nbsp;Kann keine Daten hinzufügen, aber geöffnete bearbeiten.<br>&nbsp;&nbsp;&nbsp;Geschlossene Datensätze in schreibgeschützt. Beliebige Daten erlaubt.</li>
<li> Option `Wachmann` - add and edit data only for last N days (from options).<br>&nbsp;&nbsp;&nbsp;Can input dates only in allowed range.</li>
<li> Die Logins müssen sich unterscheiden.<br></li>
<li> Zum Ändern des Passworts eines bestehenden Bedieners geben Sie das neue Passwort ein und bestätigen Sie es in der entsprechenden ZeileLogins müssen sich unterscheiden.</li>';

  $loc_about_detailed_help = 'Dieses System ermöglicht die Erfassung von Besuchern und Fahrzeugen, die in Ihrem Firmenbereich ein- und ausgehen, um das Passwort eines bestehenden Bedieners zu ändern.<br>
<font class="usop_alert">0.</font> Um mit der Arbeit zu beginnen, geben Sie die URL des Servers in den Browser ein, und geben Sie die Anmeldedaten in das Fenster ein <font class="btntd">%s</font> In Feld <font class="btntd">%s</font> geben Sie Ihr Login ein, in Feld <font class="btntd">%s</font> - Ihr Passwort,
Überprüfen Sie auch, ob der Name des Pförtners <font class="btntd">%s</font> wirklich korrekt ist.<br>
<font class="usop_alert">1.</font> Die Registerkarten oben ermöglichen die Eingabe von Daten über Besucher und Fahrzeuge.
Beachten Sie, dass das Umschalten von Registerkarten nicht gespeicherte Formulardaten löscht.<br>
<font class="usop_alert">2.</font> Bevor Sie Daten hinzufügen, drücken Sie die Taste <font class="btntd">[F5]</font>, um die Zeit vom Server zu aktualisieren und Werte in Formularfelder einzugeben. (Das Zeitformat ist <font class="btntd">24</font>-h)<br>
Dateien mit der Markierung <font class="usop_alert">*</font> erforderlich.<br>
<font class="usop_alert">3.</font> Überprüfen Sie die eingegebenen Daten und das Kontrollkästchen <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font> (oder <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font>)
und drücken Sie die Taste <INPUT type="button" class="btn" value="%s" disabled> (oder <INPUT type="button" class="btn" value="%s" disabled>) nur EIN einziges Mal.<br>
<font class="usop_alert">4.</font> Bei korrekter Aktion erscheinen die eingegebenen Daten in der Liste unten.<br>
Für Wachen zeigt diese Liste nur Daten für N Tage (<font class="btntd">%s</font> für Besucher / <font class="btntd">%s</font> für Autos) nach Datum absteigend, und für jeden Tag geöffnete Besuche werden oben angezeigt.
Innerhalb eines beliebigen Tages werden die Datensätze nach absteigendem Ankunftsdatum sortiert.<br>
<font class="usop_alert">5.</font> Alle Fragen gehen hier vorbei :<br><font class="btntd">%s</font>';

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

  $loc_opts_index_page_title = 'Die Kopfzeile des Hauptfensters, das von den Wächtern gesehen wird';
  $loc_opts_admin_page_title = 'Kopfzeile des Verwaltungsformulars';
  $loc_opts_index_add_pos_button = 'Text für die Schaltfläche zum Hinzufügen eines Besuchers';
  $loc_opts_index_add_avt_button = 'Text für die Schaltfläche zum Hinzufügen eines Fahrzeugs';
  $loc_opts_index_add_pos_confm = 'Text für Besucherbestätigungsoption';
  $loc_opts_index_add_avt_confm = 'Text für Fahrzeugbestätigungsoption';
  $loc_opts_index_num_pos_dates = 'Wie viele Tage die Besucher angezeigt werden sollen';
  $loc_opts_index_num_avt_dates = 'Wie viele Tage im Voraus Autos vorführen';
  $loc_opts_index_date_edit = 'Erlauben Sie den Wächtern, Daten zu bearbeiten';
  $loc_opts_index_time_edit = 'Erlauben Sie den Wächtern, die Zeit zu bearbeiten';
  $loc_opts_index_confirm_button = 'Text für die Bestätigungsschaltflächen (OK, YES, etc.)';
  $loc_opts_index_pos_edit_text = 'Text für Besucher bearbeiten Link';
  $loc_opts_index_avt_edit_text = 'Text für den Link zur Fahrzeugbearbeitung';
  $loc_opts_index_tech_support = 'Kundendienst (Zeile in den Nutzungsbedingungen)';
  $loc_opts_index_cancel_button = 'Text für die Schaltflächen Abbrechen usw.';
  $loc_opts_index_pos_ststr = 'Standard-Statusleiste für Besucher';
  $loc_opts_index_avt_ststr = 'Standard-Statusleiste für Fahrzeuge';
  $loc_opts_admin_apply_filters = 'Text für die Schaltfläche, die die Filter auslöst';
  $loc_opts_index_cancel_delay = 'Verzögerung (sec) beim Drücken von [Abbrechen]';
  $loc_opts_index_action_delay = 'Verzögerung (sec) bei der Durchführung der Aktion';
  $loc_opts_admin_save_changes = 'Text für die Schaltfläche "Speichern';
  $loc_opts_admin_cancel_button = 'Text für Reset-Buttons im Admin-Bereich';
  $loc_opts_admin_no_data = 'Keine Datenmeldung (für Filter)';
  $loc_opts_index_print_checkbox = 'Text beim Kontrollkästchen "zu drucken".';
  $loc_opts_index_show_reset_pwd = 'Link zum Zurücksetzen Ihres Kennworts anzeigen';
  $loc_opts_admin_min_pswd_diff = 'Mindestkomplexität des Kennworts (Anzahl der Zeichenarten, 0-8)';

?>
