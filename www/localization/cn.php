<?php
       /* Mini-GateHouse CHINESE (Simplified) Localization strings (MACHINE TRANSLATION) */
  /* Variables with strings for localization; 用字符串进行定位的精算; */

  $loc_rand_pass_gen_random_passwords = '随机密码由';
  $loc_rand_pass_gen_symbols_length = '长的字符';

  $loc_main_menu_visitors = '访问者';
  $loc_main_menu_visitors_list = '访客监测';

  $loc_main_menu_cars = '汽车';
  $loc_main_menu_cars_list = '汽车';

  $loc_main_menu_about = '关于该系统';
  $loc_main_menu_options = '设置';
  $loc_main_menu_logins = '登录';
  $loc_main_menu_workrules = '与系统一起工作的规则。';

  $loc_main_menu_logout_hint = '退出（结束会议）。';
  $loc_main_error = '误差';
  $loc_error_bad_user_agent = '该客户<Br/>%s<Br/>不得使用.<Br/>使用不同的浏览器/应用程序.';
  
  $loc_visitors_surname = '姓氏和名字';
  $loc_search_surname_short = '名称';
  $loc_visitors_document = '证件（护照、身份证）';
  $loc_visitors_document_short = '文件';
  $loc_visitors_come = '在这里，它是';
  $loc_visitors_gone = '消失了';
  $loc_visitors_ticket = '通过';
  $loc_visitors_target = '给谁';
  $loc_visitors_comment = '备注';
  $loc_visitors_last_change = '最后修改';
  $loc_visitors_creator = '创建';
  
  $loc_visitors_adding_visitor = '增加一个访问者';
  $loc_visitors_already_exists = '已经有了这样的访问';
  
  $loc_without_option = '不指定一个选项';
  $loc_add_impossible = '添加是不可能的';
  
  
  $loc_cars_carnumber = '机器（编号）';
  $loc_cars_arrived = '已抵达';
  $loc_cars_gone = '消失了';
  $loc_cars_adding_car = '增加一辆车';
  $loc_cars_already_exists = '已经有这种车了';
  
  $loc_search_filters = '过滤器:';
  $loc_print_text = '印刷品';
  $loc_print_checkbox_hint = '如果选择了这个选项，文件将被准备用于打印';
  $loc_processing_text = '相关的';
  $loc_success_text = '准备就绪';
  $loc_failure_text = '突发事件';

  $loc_filterdates_since = '因为';
  $loc_filterdates_to = '于';

  $loc_filtes_hint_date_out = '是否按离职日期进行过滤';
  $loc_filtes_hint_date_last_change = '是否按最后更改的日期应用过滤器';

  $loc_link_edit = '编辑';

  $loc_edit_editing_title = '编辑工作';
  $loc_edit_editing_title_hint = '代码输入';
  $loc_edit_editing_visitor_header1= '您正在编辑该访客的条目';
  $loc_edit_editing_cars_header1= '您编辑该车辆的条目';

  $loc_edit_accessible_actions = '以下是允许的行动';
  $loc_edit_action1_assign_visitor_gone_time = '指定的护理时间等于';
  $loc_edit_action1_assign_car_gone_time = '设置出发时间等于';
  $loc_edit_action2_change_record_or_unlock = '对数据进行修改，解除访问限制.';
  $loc_edit_action3_do_nothing = '什么都不做就走人';

  $loc_options_parameter = '参数';
  $loc_options_value = '价值';
  $loc_options_description = '描述';
  $loc_options_checkbox_hint = '打勾以启用该选项';
  $loc_options_numberinput_hint = '输入一个数值';
  $loc_options_saved_ok = '更改成功保存.';

  $loc_password_generator = '密码生成器';

  $loc_logins_title = '系统运营商';
  $loc_logins_login = '登录';
  $loc_logins_enable = '启用';
  $loc_logins_username = '姓名或职位';
  $loc_logins_role_root = 'root';
  $loc_logins_role_admin = '管理员';
  $loc_logins_role_guard = '保安人员';
  $loc_logins_role_password = '密码';
  $loc_logins_role_password2 = '密码确认';
  $loc_logins_delete = '删除';
  $loc_logins_adduser_title_hint = '要添加一个新的操作员，一定要输入一个新的登录名和匹配的不匹配的密码 :';
  $loc_logins_new_login_hint = '<新操作员>';

  $loc_login_current_user_text = '当前用户';
  $loc_login_current_change_password_link = '改变你的密码';

  $loc_login_change_password_header = '改变你的密码';
  $loc_login_change_password_you_login = '您的用户名 :';
  $loc_login_change_password_you_current_password = '旧密码';
  $loc_login_change_password_you_new_password = '新密码';
  $loc_login_change_password_you_new_password2 = '确认';
  $loc_login_change_password_submit_button = '更改密码';
  $loc_login_change_password_exit_button = '输出';

  $loc_logins_detailed_help = '参考资料 :<br>
<li> 要添加一个操作员，你必须指定一个登录名（不与任何现有的登录名匹配）。<br>&nbsp;&nbsp;&nbsp;以及一个非空的密码和其确认。</li>
<li> `root`选项--对系统的完全访问权，包括登录管理。<br>&nbsp;&nbsp;&nbsp;你可以编辑记录（任何）并输入任何日期。<br>&nbsp;&nbsp;&nbsp;(优先于其他选项)</li>
<li> 管理员 "选项--查看任何时期的数据并能够改变设置。<br>&nbsp;&nbsp;&nbsp;你不能添加数据，但你可以编辑不完整的数据。<br>&nbsp;&nbsp;&nbsp;已完成的条目不能被编辑。所有日期都可以输入。</li>
<li> 监护人 "选项是添加和编辑数据，但只是过去几天的数据（来自设置）。<br>&nbsp;&nbsp;&nbsp;只能输入范围内的日期。</li>
<li> 不允许相同的登录方式。<br></li>
<li> 要改变现有操作员的密码，请在相应的行中输入新密码及其确认。</li>';

  $loc_about_detailed_help = '这个系统允许你记录用户和车辆进入和离开你的场所。<br>
<font class="usop_alert">0.</font> 要想开始，请在浏览器中输入系统的服务器地址，并在标有""的窗口中输入
<font class="btntd">%s</font> 在此输入 <font class="btntd">%s</font> 您的登录，并在现场 <font class="btntd">%s</font> - 您的密码,
事先检查该窗口是否被调用 <font class="btntd">%s</font> 而这是你的设施。.<br>
<font class="usop_alert">1.</font> 顶部的标签允许你在访客和车辆登记表之间切换。
请记住，这样的切换会清除表单字段。<br>
<font class="usop_alert">2.</font> 在添加数据之前，立即按下键盘上的按钮 <font class="btntd">[F5]</font>, 来更新服务器上的时间并输入数据。(时间是在 <font class="btntd">24</font>-每小时格式)<br>
请注意，标有 <font class="usop_alert">*</font> 是强制性的。<br>
<font class="usop_alert">3.</font> 如果数据是正确的，选择选项 <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font> (或 <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font>)
并按下按钮 <INPUT type="button" class="btn" value="%s" disabled> (或 <INPUT type="button" class="btn" value="%s" disabled>) 只有一次。<br>
<font class="usop_alert">4.</font> 如果你所做的一切都正确，在列表的底部会出现一行写有你的详细信息。<br>
该系统的设置是为了显示过去几天的数据 (<font class="btntd">%s</font> 为游客服务 / <font class="btntd">%s</font> 用于汽车) 按日期降序排列，每一天都在前面
首先显示未完成的访问，然后是完成的访问。在每一个分组中，条目按进入时间的倒序进行排序。<br>
<font class="usop_alert">5.</font> 所有问题都应该在这里解决 :<br><font class="btntd">%s</font>';

  $loc_loginform_login = '登录';
  $loc_loginform_password  = '密码';
  $loc_loginform_input  = '登录';
  
  $loc_months = array('一月', '2月', '三月', '四月', '5月', '6月', '七月', '八月', '9月', '10月', '11月', '12月');
  $loc_logics_name = array ('等同于', '不等于', '更多', '大于或等于', '更少', '少或p');
  
  $loc_old_password_incorrect = '旧的密码没有正确输入.';
  $loc_pass_and_confirm_not_match = '密码和其确认不一致.';
  $loc_old_password_equal_new = '旧密码与新密码相同.';
  $loc_password_equal_login = '密码不能与用户名相同。.';
  $loc_empty_password_denied = '空白的密码是不允许的.';
  $loc_password_complex_too_low = '这个密码太简单了。最低要求是 %s 不同类型的人物。目前的复杂性: %s.';
  
  $loc_password_changed_ok = '密码修改成功.';
  $loc_password_changed_fail = '密码无法更改。<Br>联系您的系统管理员。';
  
  $loc_value_year_incorrect = '年的价值是不正确的。';
  $loc_value_month_incorrect = '月的数值不正确。';
  $loc_value_day_incorrect = '日的价值是不正确的。';
  $loc_value_hour_incorrect = '小时值是不正确的。';
  $loc_value_minute_incorrect = '分钟的价值是不正确的。';

  $loc_date_from_future  = '表示来自未来的一个日期';
  $loc_date_out_less_date_in  = '给出的日期小于到达日期。';
  $loc_date_incorrect  = '给出的日期是不正确的';
  $loc_date_too_old  = '指定的日期太旧--超出范围。';

  $loc_repeat_again = '再试一次';
  $loc_not_enough_access_rights = '没有足够的访问权';
  $loc_not_allow_edit_closed_records = '不允许更新已关闭的记录 !';
  $loc_not_exists_record = '该记录并不存在';

  $loc_select_edit_without_close = '已选择不完成编辑';
  $loc_select_edit_with_close = '选择了完成度';
  $loc_select_cancel = '选择了完成度';

  $loc_opt_commit_changes_close_record = '所有的修改都将被进行，然后条目将被关闭以进行编辑。';

  $loc_unable_add_with_empty_surname = '不可能添加一个空姓的访客。';
  $loc_unable_add_car_with_empty_surname = '如果没有司机的姓氏，是不可能添加车辆的。';
  $loc_unable_add_car_with_empty_number = '不可能添加一个没有号码的车辆。';

  $loc_opts_index_page_title = '警卫看到的主窗口的标题';
  $loc_opts_admin_page_title = '管理员表格窗口的标题';
  $loc_opts_index_add_pos_button = '添加访问者的按钮的文本';
  $loc_opts_index_add_avt_button = '添加车辆的按钮的文本';
  $loc_opts_index_add_pos_confm = '访客确认选项的文本';
  $loc_opts_index_add_avt_confm = '车辆确认选项的文本';
  $loc_opts_index_num_pos_dates = '向游客展示多少天';
  $loc_opts_index_num_avt_dates = '展示汽车需提前多少天通知';
  $loc_opts_index_date_edit = '允许看守人员编辑日期';
  $loc_opts_index_time_edit = '允许看守人员编辑时间';
  $loc_opts_index_confirm_button = '确认按钮的文本（OK、YES等）。';
  $loc_opts_index_pos_edit_text = '游客编辑链接的文本';
  $loc_opts_index_avt_edit_text = '汽车编辑链接的文本';
  $loc_opts_index_tech_support = '客户服务(使用条款中的一行)';
  $loc_opts_index_cancel_button = '取消、取消等按钮的文本';
  $loc_opts_index_pos_ststr = '游客的默认状态栏';
  $loc_opts_index_avt_ststr = '车辆的默认状态栏';
  $loc_opts_admin_apply_filters = '触发过滤器的按钮的文本';
  $loc_opts_index_cancel_delay = '按[取消]时的延迟（秒）。';
  $loc_opts_index_action_delay = '执行行动的延迟（秒';
  $loc_opts_admin_save_changes = '保存按钮的文本';
  $loc_opts_admin_cancel_button = '管理区的重置按钮的文本';
  $loc_opts_admin_no_data = '没有数据信息（用于过滤器）。';
  $loc_opts_index_print_checkbox = '在 "要打印 "复选框中的文本';
  $loc_opts_index_show_reset_pwd = '显示重置密码的链接';
  $loc_opts_admin_min_pswd_diff = '最小密码复杂性（字符类型的数量，0-8）。';

?>
