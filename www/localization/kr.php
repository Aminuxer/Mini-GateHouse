<?php
       /* Mini-GateHouse KOREAN Localization strings */
  /* Variables for replacing; Set $localization = 'kr'; in config for apply; 대체 변수; $localization = 'kr' 설정; 적용을 위한 구성에서 */

  $loc_rand_pass_gen_random_passwords = '무작위 비밀번호';
  $loc_rand_pass_gen_symbols_length = '긴 문자';

  $loc_main_menu_visitors = '방문자';
  $loc_main_menu_visitors_list = '방문자 모니터링';

  $loc_main_menu_cars = '자동차';
  $loc_main_menu_cars_list = '자동차 모니터링';

  $loc_main_menu_about = '시스템에 대하여';
  $loc_main_menu_options = '세팅';
  $loc_main_menu_logins = '로그인';
  $loc_main_menu_workrules = '시스템 작업에 대한 규칙입니다.';

  $loc_main_menu_logout_hint = '나가기(세션 끝내기)';
  $loc_main_error = '오류';
  $loc_error_bad_user_agent = '이 클라이언트<Br/>%s<Br/>사용할 수 없습니다.<Br/>다른 브라우저/응용 프로그램을 사용하십시오.';
  
  $loc_visitors_surname = '수리남';
  $loc_search_surname_short = '수리남';
  $loc_visitors_document = '서류(여권, 신분증)';
  $loc_visitors_document_short = '문서';
  $loc_visitors_come = '왔다';
  $loc_visitors_gone = '다 쓴';
  $loc_visitors_ticket = '액세스 카드';
  $loc_visitors_target = '누구에게';
  $loc_visitors_comment = '노트';
  $loc_visitors_last_change = '마지막 수정';
  $loc_visitors_creator = '생성됨';
  
  $loc_visitors_adding_visitor = '방문자 추가';
  $loc_visitors_already_exists = '그런 방문이 있습니다';
  
  $loc_without_option = '옵션을 지정하지 않고';
  $loc_add_impossible = '추가가 불가능합니다';
  
  
  $loc_cars_carnumber = '자동차 (아니오.)';
  $loc_cars_arrived = '도착했어요';
  $loc_cars_gone = '왼쪽';
  $loc_cars_adding_car = '차량 추가';
  $loc_cars_already_exists = '이 차는 이미';
  
  $loc_search_filters = '필터:';
  $loc_filters_timestamp = '시간 변경';
  $loc_print_text = '밀봉하다';
  $loc_print_checkbox_hint = '이 옵션을 설정하면 문서가 인쇄될 준비가 됩니다.';
  $loc_processing_text = '공연하다';
  $loc_success_text = '준비가 된';
  $loc_failure_text = '불합격';

  $loc_filterdates_since = '~부터';
  $loc_filterdates_to = '에게';

  $loc_filtes_hint_date_out = '출발 날짜로 필터링할지 여부';
  $loc_filtes_hint_date_last_change = '마지막 수정 날짜로 필터링할지 여부';

  $loc_link_edit = '편집하다';

  $loc_edit_editing_title = '편집';
  $loc_edit_editing_title_hint = '레코드 코드';
  $loc_edit_editing_visitor_header1= '이 방문자에 대한 게시물을 편집 중입니다.';
  $loc_edit_editing_cars_header1= '이 차량에 대한 항목을 편집 중입니다.';

  $loc_edit_accessible_actions = '다음 작업이 허용됩니다.';
  $loc_edit_action1_assign_visitor_gone_time = '출발 시간을 다음과 같이 설정하십시오.';
  $loc_edit_action1_assign_car_gone_time = '출발 시간을 다음과 같이 설정하십시오.';
  $loc_edit_action2_change_record_or_unlock = '데이터 변경, 방문 잠금 해제.';
  $loc_edit_action3_do_nothing = '아무 것도 하지 않고 나가';

  $loc_options_parameter = '매개변수';
  $loc_options_value = '의미';
  $loc_options_description = '서술';
  $loc_options_checkbox_hint = '옵션을 활성화하려면 확인란을 선택하십시오.';
  $loc_options_numberinput_hint = '숫자 값 입력';
  $loc_options_saved_ok = '변경 사항이 성공적으로 저장되었습니다.';

  $loc_password_generator = '비밀번호 생성기';

  $loc_logins_title = '시스템 운영자';
  $loc_logins_login = '로그인';
  $loc_logins_enable = '포함 된';
  $loc_logins_username = '이름 또는 직위';
  $loc_logins_role_root = 'root';
  $loc_logins_role_admin = '행정관';
  $loc_logins_role_guard = '보안 요원';
  $loc_logins_role_password = '비밀번호';
  $loc_logins_role_password2 = '비밀번호 확인';
  $loc_logins_delete = '삭제';
  $loc_logins_adduser_title_hint = '새 운영자를 추가하려면 새 로그인 및 일치하는 비밀번호를 입력해야 합니다. :';
  $loc_logins_new_login_hint = '<새 연산자>';

  $loc_login_current_user_text = '현재 사용자';  
  $loc_login_current_change_password_link = '비밀번호를 변경하세요';  

  $loc_login_change_password_header = '암호 변경하기';
  $loc_login_change_password_you_login = '귀하의 로그인:';
  $loc_login_change_password_you_current_password = '기존 비밀번호';
  $loc_login_change_password_you_new_password = '새 비밀번호';
  $loc_login_change_password_you_new_password2 = '확정';
  $loc_login_change_password_submit_button = '비밀번호 변경';
  $loc_login_change_password_exit_button = '출구';

  $loc_logins_detailed_help = '정보 :<br>
<li> 운영자를 추가하려면 로그인을 지정해야 합니다(기존 로그인과 일치하지 않음).<br>&nbsp;&nbsp;&nbsp;비어 있지 않은 암호 및 확인.</li>
<li> `root` 옵션은 로그인 관리를 포함하여 시스템에 대한 전체 액세스 권한을 제공합니다.<br>&nbsp;&nbsp;&nbsp;항목(임의)을 편집하고 날짜를 입력할 수 있습니다.<br>&nbsp;&nbsp;&nbsp;(다른 옵션 무시)</li>
<li> 옵션 `관리자` - 모든 기간에 대한 데이터 보기 및 설정 변경 기능.<br>&nbsp;&nbsp;&nbsp;데이터를 추가할 수 없지만 불완전한 데이터는 편집할 수 있습니다.<br>&nbsp;&nbsp;&nbsp;완료된 항목은 수정할 수 없습니다. 모든 날짜를 입력할 수 있습니다.</li>
<li> `가드` 옵션 - 데이터 추가 및 편집, 그러나 지난 며칠 동안만(설정에서).<br>&nbsp;&nbsp;&nbsp;범위 내에서만 날짜를 입력할 수 있습니다.</li>
<li> 동일한 로그인은 허용되지 않습니다.<br></li>
<li> 기존 운영자의 비밀번호를 변경하려면 해당 라인에 새 비밀번호와 확인을 입력하십시오.</li>';

  $loc_about_detailed_help = '이 시스템을 사용하면 기업 영역에 들어오고 나가는 사용자 및 차량의 기록을 유지할 수 있습니다.<br>
<font class="usop_alert">0.</font> 시작하려면 브라우저에 시스템 서버의 주소를 입력하고 이름이 있는 창에
<font class="btntd">%s</font> 필드에 입력 <font class="btntd">%s</font> 귀하의 로그인 및 현장에서 <font class="btntd">%s</font> - 너의 비밀번호
윈도우가 호출되는 것을 확인한 후 <font class="btntd">%s</font> 그리고 이것은 당신의 문입니다.<br>
<font class="usop_alert">1.</font> 상단의 탭을 사용하면 방문자와 자동차를 입력하기 위한 양식 간에 전환할 수 있습니다.
이 스위치는 양식 필드를 지웁니다.<br>
<font class="usop_alert">2.</font> 데이터를 입력하기 직전에 키보드의 버튼을 누르십시오. <font class="btntd">[F5]</font>서버에서 시간을 업데이트하고 세부 정보를 입력합니다. (시간이 입력됩니다. <font class="btntd">24</font>-시간 형식)<br>
로 표시된 필드에 유의하십시오. <font class="usop_alert">*</font> 의무적이다.<br>
<font class="usop_alert">3.</font> 데이터가 올바르게 입력되면 옵션을 지정하십시오. <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font> (또는 <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font>)
그리고 버튼을 눌러 <INPUT type="button" class="btn" value="%s" disabled> (또는 <INPUT type="button" class="btn" value="%s" disabled>) 정확히 한 번.<br>
<font class="usop_alert">4.</font> 모든 것이 올바르게 완료되면 데이터가 있는 줄이 아래 목록에 나타납니다.<br>
시스템은 지난 며칠 동안의 데이터가 표시되는 방식으로 구성됩니다. (<font class="btntd">%s</font> 방문자를 위해 / <font class="btntd">%s</font> 자동차용) 내림차순 날짜 및 각 날짜에 대해 먼저
완료되지 않은 방문이 표시된 다음 완료된 방문이 표시됩니다. 각 하위 그룹에서 항목은 항목 시간을 기준으로 역순으로 정렬됩니다.<br>
<font class="usop_alert">5.</font> 모든 질문은 여기로 연락하십시오:<br><font class="btntd">%s</font>';

  $loc_loginform_login = '로그인';
  $loc_loginform_password  = '비밀번호';
  $loc_loginform_input  = '들어오다';
  
  $loc_months = array('1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월');
  $loc_logics_name = array ('동등하다', '같지 않다', '더', '더 많거나 같음', '더 적은', '작거나 같음');
  
  $loc_old_password_incorrect = '이전 비밀번호가 잘못 입력되었습니다.';
  $loc_pass_and_confirm_not_match = '비밀번호와 확인이 일치하지 않습니다.';
  $loc_old_password_equal_new = '이전 비밀번호는 새 비밀번호와 동일합니다.';
  $loc_password_equal_login = '비밀번호는 사용자 이름과 일치하지 않아야 합니다.';
  $loc_empty_password_denied = '빈 암호는 허용되지 않습니다.';
  $loc_password_complex_too_low = '비밀번호가 너무 간단합니다. 최소  %s 개의 다른 문자 유형이 필요합니다. 현재 난이도: %s.';
  
  $loc_password_changed_ok = '비밀번호가 성공적으로 변경되었습니다.';
  $loc_password_changed_fail = '비밀번호를 변경하지 못했습니다.<Br>시스템 관리자에게 문의하십시오.';
  
  $loc_value_year_incorrect = '연도 값이 올바르지 않습니다.';
  $loc_value_month_incorrect = '월 값이 올바르지 않습니다.';
  $loc_value_day_incorrect = '날짜 값이 올바르지 않습니다.';
  $loc_value_hour_incorrect = '시간 값이 올바르지 않습니다.';
  $loc_value_minute_incorrect = '분 값이 올바르지 않습니다.';

  $loc_date_from_future  = '날짜는 미래에서 왔습니다';
  $loc_date_out_less_date_in  = '지정된 날짜가 도착 날짜보다 작습니다.';
  $loc_date_incorrect  = '잘못된 날짜 지정';
  $loc_date_too_old  = '지정한 날짜가 너무 오래되어 범위를 벗어났습니다.';

  $loc_repeat_again = '한 번 더 시도하려면';
  $loc_not_enough_access_rights = '불충분한 접근 권한';
  $loc_not_allow_edit_closed_records = '폐쇄된 기록을 업데이트하는 것은 허용되지 않습니다!!';
  $loc_not_exists_record = '항목이 없습니다';

  $loc_select_edit_without_close = '닫지 않고 편집이 선택되었습니다.';
  $loc_select_edit_with_close = '닫기가 선택되었습니다';
  $loc_select_cancel = '취소가 선택되었습니다';

  $loc_opt_commit_changes_close_record = '모든 변경 사항이 적용되며 이후에는 편집을 위해 게시물이 닫힙니다.';

  $loc_unable_add_with_empty_surname = '성이 비어 있는 방문자는 추가할 수 없습니다.';
  $loc_unable_add_car_with_empty_surname = '운전자의 성이 없는 차량은 추가할 수 없습니다.';
  $loc_unable_add_car_with_empty_number = '번호가 없으면 차량을 추가할 수 없습니다.';

  $loc_opts_index_page_title = '경비원이 보는 메인 창의 제목';
  $loc_opts_admin_page_title = '관리 양식 창 제목';
  $loc_opts_index_add_pos_button = '방문자를 추가하는 버튼의 텍스트';
  $loc_opts_index_add_avt_button = '자동차를 추가하는 버튼의 텍스트';
  $loc_opts_index_add_pos_confm = '방문자 확인 옵션을 위한 텍스트';
  $loc_opts_index_add_avt_confm = '차량 확인 옵션에 대한 텍스트';
  $loc_opts_index_num_pos_dates = '방문자에게 표시할 일 수';
  $loc_opts_index_num_avt_dates = '자동차를 보여주는 데 며칠';
  $loc_opts_index_date_edit = '경비원의 날짜 수정 허용';
  $loc_opts_index_time_edit = '경비원의 시간 수정 허용';
  $loc_opts_index_confirm_button = '확인 버튼 텍스트(OK, YES 등)';
  $loc_opts_index_pos_edit_text = '방문자 링크 편집을 위한 텍스트';
  $loc_opts_index_avt_edit_text = '자동차 편집 링크 텍스트';
  $loc_opts_index_tech_support = '헬프데스크(사용 측면에서 문자열)';
  $loc_opts_index_cancel_button = '취소 버튼 등의 텍스트';
  $loc_opts_index_pos_ststr = '방문자를 위한 기본 상태 표시줄';
  $loc_opts_index_avt_ststr = '자동차에 대한 기본 상태 표시줄';
  $loc_opts_admin_apply_filters = '필터를 실행하는 버튼의 텍스트';
  $loc_opts_index_cancel_delay = '[취소] 누를 때 지연(초)';
  $loc_opts_index_action_delay = '작업 수행 시 지연(초)';
  $loc_opts_admin_save_changes = '설정 저장 버튼의 텍스트';
  $loc_opts_admin_cancel_button = '관리자 패널의 재설정 버튼에 대한 텍스트';
  $loc_opts_admin_no_data = '데이터 누락 메시지(필터용)';
  $loc_opts_index_print_checkbox = '"인쇄 가능" 확인란에 대한 텍스트';
  $loc_opts_index_show_reset_pwd = '비밀번호 재설정 링크 표시';
  $loc_opts_admin_min_pswd_diff = '최소 암호 복잡성(문자 유형 수, 0-8)';

?>
