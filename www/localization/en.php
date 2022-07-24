<?php
       /* Mini-GateHouse ENGLISH Localization strings */
  /* Variables for replacing; Set $localization = 'en'; in config for apply */

  $loc_rand_pass_gen_random_passwords = 'Random password at';
  $loc_rand_pass_gen_symbols_length = 'symbols length';

  $loc_main_menu_visitors = 'Visitors';
  $loc_main_menu_visitors_list = 'Visitors List';

  $loc_main_menu_cars = 'Cars';
  $loc_main_menu_cars_list = 'Cars List';

  $loc_main_menu_about = 'About';
  $loc_main_menu_options = 'OPTIONS';
  $loc_main_menu_logins = 'Logins';
  $loc_main_menu_workrules = 'Rules';

  $loc_main_menu_logout_hint = 'Exit (End session)';
  $loc_main_error = 'Error';
  $loc_error_bad_user_agent = 'This client<Br/>%s<Br/>can\'t be used.<Br/>Try another browser/application.';
  
  $loc_visitors_surname = 'Surname N.';
  $loc_search_surname_short = 'Surn.';
  $loc_visitors_document = 'Document (iD card, passport)';
  $loc_visitors_document_short = 'Document';
  $loc_visitors_come = 'Arrive';
  $loc_visitors_gone = 'Gone';
  $loc_visitors_ticket = 'Ticket';
  $loc_visitors_target = 'Whom';
  $loc_visitors_comment = 'comment';
  $loc_visitors_last_change = 'Last changed';
  $loc_visitors_creator = 'Created by';
  
  $loc_visitors_adding_visitor = 'ADD VISITOR';
  $loc_visitors_already_exists = 'THIS VISIT ALREADY EXISTS';
  
  $loc_without_option = 'Without this option';
  $loc_add_impossible = 'can\'t be added';
  
  
  $loc_cars_carnumber = 'Car (№)';
  $loc_cars_arrived = 'Arrive';
  $loc_cars_gone = 'Gone';
  $loc_cars_adding_car = 'ADD CAR';
  $loc_cars_already_exists = 'THIS CAR ALREADY EXISTS';
  
  $loc_search_filters = 'Filters:';
  $loc_print_text = 'print';
  $loc_print_checkbox_hint = 'Check this for prepare to print';
  $loc_processing_text = 'EXECUTING';
  $loc_success_text = 'READY';
  $loc_failure_text = 'FAIL';

  $loc_filterdates_since = 'Since';
  $loc_filterdates_to = 'to';

  $loc_filtes_hint_date_out = 'Apply filter to gone date';
  $loc_filtes_hint_date_last_change = 'Apply filter to last changes date';

  $loc_link_edit = 'Edit';

  $loc_edit_editing_title = 'Editing';
  $loc_edit_editing_title_hint = 'row with id';
  $loc_edit_editing_visitor_header1= 'Your edit record fot this visitor';
  $loc_edit_editing_cars_header1= 'Your edit record fot this car';

  $loc_edit_accessible_actions = 'Next action allowed';
  $loc_edit_action1_assign_visitor_gone_time = 'Set gone time';
  $loc_edit_action1_assign_car_gone_time = 'Set gone time';
  $loc_edit_action2_change_record_or_unlock = 'Change data and unlock visit.';
  $loc_edit_action3_do_nothing = 'Do nothing and exit';

  $loc_options_parameter = 'Option';
  $loc_options_value = 'Value';
  $loc_options_description = 'Description';
  $loc_options_checkbox_hint = 'Set checkbox for enable option';
  $loc_options_numberinput_hint = 'Input number value';
  $loc_options_saved_ok = 'Changes saves successfully.';

  $loc_password_generator = 'Password generator';

  $loc_logins_title = 'Operators';
  $loc_logins_login = 'Login';
  $loc_logins_enable = 'ON';
  $loc_logins_username = 'Name and/or position';
  $loc_logins_role_root = 'root';
  $loc_logins_role_admin = 'Guard Chef';
  $loc_logins_role_guard = 'Guard';
  $loc_logins_role_password = 'Password';
  $loc_logins_role_password2 = 'Password confirmation';
  $loc_logins_delete = 'Delete';
  $loc_logins_adduser_title_hint = 'For add new operator input new login and equal passwords :';
  $loc_logins_new_login_hint = '<New Operator>';

  $loc_login_current_user_text = 'Current operator';  
  $loc_login_current_change_password_link = 'Change my password';  

  $loc_login_change_password_header = 'Changing my password';
  $loc_login_change_password_you_login = 'Your login :';
  $loc_login_change_password_you_current_password = 'Old password';
  $loc_login_change_password_you_new_password = 'New password';
  $loc_login_change_password_you_new_password2 = 'Confirmation';
  $loc_login_change_password_submit_button = 'Change password';
  $loc_login_change_password_exit_button = 'Exit';

  $loc_logins_detailed_help = 'Help :<br>
<li> For add operator input new login (not match with existings),<br>&nbsp;&nbsp;&nbsp;non-empty password and password confirmation.</li>
<li> Option `root` - full access to system, including operators management.<br>&nbsp;&nbsp;&nbsp;Can edit any records and input any dates.<br>&nbsp;&nbsp;&nbsp;(Overload another options)</li>
<li> Option `Guard Chef` - View data for any period and change options.<br>&nbsp;&nbsp;&nbsp;Can\'t ADD data, but can edit opened.<br>&nbsp;&nbsp;&nbsp;Closed records in read-only. Any dates allowed.</li>
<li> Option `Guard` - add and edit data only for last N days (from options).<br>&nbsp;&nbsp;&nbsp;Can input dates only in allowed range.</li>
<li> Logins must differ.<br></li>
<li> For change password of existing operator input new password and confirmation in correspond row</li>';

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

  $loc_loginform_login = 'Login';
  $loc_loginform_password  = 'Password';
  $loc_loginform_input  = 'Enter';
  
  $loc_months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
  $loc_logics_name = array ('equal', 'not equal', 'more', 'more or equal', 'less', 'less or equal');
  
  $loc_old_password_incorrect = 'Old password incorrect.';
  $loc_pass_and_confirm_not_match = 'Password and confirmation don\'t match.';
  $loc_old_password_equal_new = 'Old password equal new.';
  $loc_password_equal_login = 'Password can\'t match with login.';
  $loc_empty_password_denied = 'Emplty password not allowed.';
  $loc_password_complex_too_low = 'ПPassword too simple. Required at least %s different symbol types. Current difficulty: %s.';
  
  $loc_password_changed_ok = 'Password changed successfully.';
  $loc_password_changed_fail = 'Password not changes.<Br>Ask your sysadmin/IT Dep.';
  
  $loc_value_year_incorrect = 'Year value incorrect.';
  $loc_value_month_incorrect = 'Month value incorrect.';
  $loc_value_day_incorrect = 'Day value incorrect.';
  $loc_value_hour_incorrect = 'Hour value incorrect.';
  $loc_value_minute_incorrect = 'Minutes value incorrect.';

  $loc_date_from_future  = 'Date from future';
  $loc_date_out_less_date_in  = 'Inputed date less then arrival date.';
  $loc_date_incorrect  = 'Date incorrect';
  $loc_date_too_old  = 'Date too old - not in allowed range.';

  $loc_repeat_again = 'Try again';
  $loc_not_enough_access_rights = 'No access rights';
  $loc_not_allow_edit_closed_records = 'CANNOT EDIT CLOSED RECORD !!';
  $loc_not_exists_record = 'Record don\'t exist';

  $loc_select_edit_without_close = 'SELECTED EDITING WITHOUT FINALIZATION';
  $loc_select_edit_with_close = 'FINALIZATION SEELCTED';
  $loc_select_cancel = 'CANCEL SELECTED';

  $loc_opt_commit_changes_close_record = 'All changes will be applied, and record will be closed for editing.';

  $loc_unable_add_with_empty_surname = 'Cannot add visitor with empty surname.';
  $loc_unable_add_car_with_empty_surname = 'Cannot add car without driver\'s surname.';
  $loc_unable_add_car_with_empty_number = 'Cannot add car without number.';

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
