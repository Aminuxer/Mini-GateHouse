<?php
       /* Mini-GateHouse JAPAN Localization strings (MACHINE TRANSLATION) */
  /* Variables with strings for localization; ローカライズのための文字列を含む変数 ; */

  $loc_rand_pass_gen_random_passwords = 'によるランダムパスワード';
  $loc_rand_pass_gen_symbols_length = '長文字';

  $loc_main_menu_visitors = '来場者数';
  $loc_main_menu_visitors_list = '来場者モニター';

  $loc_main_menu_cars = '車';
  $loc_main_menu_cars_list = '車両モニタリング';

  $loc_main_menu_about = 'システムについて';
  $loc_main_menu_options = '設定';
  $loc_main_menu_logins = 'ログイン';
  $loc_main_menu_workrules = 'システムで作業する際のルール。';

  $loc_main_menu_logout_hint = '終了（セッションの終了）';
  $loc_main_error = 'エラー';
  $loc_error_bad_user_agent = '本客先<Br/>%s<Br/>は使用できません。<Br/>別のブラウザ/アプリケーションを使用する。';
  
  $loc_visitors_surname = '姓';
  $loc_search_surname_short = '姓';
  $loc_visitors_document = '書類（パスポート、IDカード）';
  $loc_visitors_document_short = '書類';
  $loc_visitors_come = '来た';
  $loc_visitors_gone = 'なくなった';
  $loc_visitors_ticket = '合格';
  $loc_visitors_target = '誰に';
  $loc_visitors_comment = '注意';
  $loc_visitors_last_change = '最終更新日';
  $loc_visitors_creator = '作成した';
  
  $loc_visitors_adding_visitor = '訪問者を追加する';
  $loc_visitors_already_exists = 'そのような訪問があります';
  
  $loc_without_option = 'オプションを指定せずに';
  $loc_add_impossible = '追加できません';
  
  
  $loc_cars_carnumber = '車（No.）';
  $loc_cars_arrived = '到着しました';
  $loc_cars_gone = '左';
  $loc_cars_adding_car = '車の追加';
  $loc_cars_already_exists = 'この車はすでにあります';
  
  $loc_search_filters = 'フィルタ:';
  $loc_print_text = '密閉する';
  $loc_print_checkbox_hint = 'このオプションが設定されている場合、ドキュメントは印刷用に準備されます';
  $loc_processing_text = '実行';
  $loc_success_text = '準備';
  $loc_failure_text = '不合格';

  $loc_filterdates_since = '以来';
  $loc_filterdates_to = 'に';

  $loc_filtes_hint_date_out = '出発日でフィルタリングするかどうか';
  $loc_filtes_hint_date_last_change = '最終更新日でフィルタリングするかどうか';

  $loc_link_edit = '編集';

  $loc_edit_editing_title = '編集';
  $loc_edit_editing_title_hint = 'コードを含むエントリ';
  $loc_edit_editing_visitor_header1= 'あなたはこの訪問者の投稿を編集しています';
  $loc_edit_editing_cars_header1= 'この車両のエントリーを編集しています';

  $loc_edit_accessible_actions = '次のアクションが許可されます';
  $loc_edit_action1_assign_visitor_gone_time = '出発時刻を次のように設定します';
  $loc_edit_action1_assign_car_gone_time = '出発時刻を次のように設定します';
  $loc_edit_action2_change_record_or_unlock = 'データに変更を加え、訪問のブロックを解除します。';
  $loc_edit_action3_do_nothing = '何もせずに終了します';

  $loc_options_parameter = 'パラメータ';
  $loc_options_value = '意味';
  $loc_options_description = '説明';
  $loc_options_checkbox_hint = 'チェックボックスをオンにして、オプションを有効にします';
  $loc_options_numberinput_hint = '数値を入力してください';
  $loc_options_saved_ok = '変更は正常に保存されました。';

  $loc_password_generator = 'パスワードジェネレータ';

  $loc_logins_title = 'システムオペレータ';
  $loc_logins_login = 'ログイン';
  $loc_logins_enable = '積極的に';
  $loc_logins_username = '名前または役職';
  $loc_logins_role_root = 'root';
  $loc_logins_role_admin = '管理者';
  $loc_logins_role_guard = '警備員';
  $loc_logins_role_password = 'パスワード';
  $loc_logins_role_password2 = 'パスワードの確認';
  $loc_logins_delete = '消去';
  $loc_logins_adduser_title_hint = '新しいオペレーターを追加するには、必ず新しいログインと一致するパスワードを入力してください :';
  $loc_logins_new_login_hint = '<新しい演算子>';

  $loc_login_current_user_text = '現在の使用者';  
  $loc_login_current_change_password_link = 'パスワードを変更する';  

  $loc_login_change_password_header = 'パスワードの変更';
  $loc_login_change_password_you_login = 'あなたのログイン :';
  $loc_login_change_password_you_current_password = '以前のパスワード';
  $loc_login_change_password_you_new_password = '新しいパスワード';
  $loc_login_change_password_you_new_password2 = '確認';
  $loc_login_change_password_submit_button = 'パスワードを変更する';
  $loc_login_change_password_exit_button = '出口';

  $loc_logins_detailed_help = '参照 :<br>
<li> 演算子を追加するには、ログイン（既存のログインのいずれとも一致しない）を指定する必要があります。<br>&nbsp;&nbsp;&nbsp;空でないパスワードとその確認。</li>
<li> `root`オプションは、ログインの管理を含む、システムへのフルアクセスを提供します。<br>&nbsp;&nbsp;&nbsp;すべてのエントリを編集して、任意の日付を入力できます。<br>&nbsp;&nbsp;&nbsp;(他のオプションを上書きします)</li>
<li> 管理者オプション-任意の期間のデータを表示し、設定を変更する機能。<br>&nbsp;&nbsp;&nbsp;データを追加することはできませんが、不完全なデータを編集することはできます。<br>&nbsp;&nbsp;&nbsp;完了したエントリは編集できません。 任意の日付を入力できます。</li>
<li> オプション警備員-データの追加と編集。ただし、過去数日間のみ（設定から）。<br>&nbsp;&nbsp;&nbsp;スコープ内の日付のみを入力できます。</li>
<li> 一致するログインは許可されていません。<br></li>
<li> 既存のオペレーターのパスワードを変更するには、対応する行に新しいパスワードとその確認を入力します</li>';

  $loc_about_detailed_help = 'このシステムを使用すると、企業の領域に出入りするユーザーと車両の記録を保持できます。<br>
<font class="usop_alert">0.</font> 開始するには、ブラウザとウィンドウにシステムサーバーのアドレスを名前で入力します
<font class="btntd">%s</font> フィールドに入力してください <font class="btntd">%s</font> あなたのログイン、そしてフィールドで <font class="btntd">%s</font> - あなたのパスワード
ウィンドウが呼び出されていることを確認した後 <font class="btntd">%s</font> そしてこれがあなたのオブジェクトです。<br>
<font class="usop_alert">1.</font> 上部のタブを使用すると、訪問者と車を入力するためのフォームを切り替えることができます。
このスイッチはフォームフィールドをクリアすることに注意してください。<br>
<font class="usop_alert">2.</font> データを入力する直前に、キーボードのボタンを押してください <font class="btntd">[F5]</font>サーバーから時刻を更新し、詳細を入力します。 （時間はに入力されます <font class="btntd">24</font>-時間形式)<br>
でマークされたフィールドに注意してください <font class="usop_alert">*</font> 、は必須です。<br>
<font class="usop_alert">3.</font> データが正しく入力された場合は、オプションを指定してください <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font> (または <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font>)
ボタンを押します <INPUT type="button" class="btn" value="%s" disabled> (または <INPUT type="button" class="btn" value="%s" disabled>) 正確に一度。<br>
<font class="usop_alert">4.</font> すべてが正しく行われると、データを含む行が以下のリストに表示されます。<br>
システムは、過去数日間のデータが表示されるように構成されています (<font class="btntd">%s</font> 訪問者のために / <font class="btntd">%s</font> 車用) 降順の日付、および毎日最初に
不完全な訪問が表示され、次に完了した訪問が表示されます。 各サブグループでは、エントリはエントリ時間の逆順で並べ替えられます。<br>
<font class="usop_alert">5.</font> すべての質問については、こちらからお問い合わせください :<br><font class="btntd">%s</font>';

  $loc_loginform_login = 'ログイン';
  $loc_loginform_password  = 'パスワード';
  $loc_loginform_input  = '入るには';
  
  $loc_months = array('1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月');
  $loc_logics_name = array ('等しい', '等しくない', 'もっと', '以上または等しい', '以下', '<=');
  
  $loc_old_password_incorrect = '古いパスワードが間違って入力されました。';
  $loc_pass_and_confirm_not_match = 'パスワードと確認が一致しません。';
  $loc_old_password_equal_new = '古いパスワードは新しいパスワードと同じです。';
  $loc_password_equal_login = 'パスワードはユーザー名と一致してはなりません。';
  $loc_empty_password_denied = '空のパスワードは使用できません。';
  $loc_password_complex_too_low = 'パスワードが単純すぎます。 少なくとも %s 個の異なる文字タイプが必要です。 現在の難しさ: %s.';
  
  $loc_password_changed_ok = 'パスワードは正常に変更されました。';
  $loc_password_changed_fail = 'パスワードの変更に失敗しました。 <Br> システム管理者に連絡してください。';
  
  $loc_value_year_incorrect = '年の値が正しくありません。';
  $loc_value_month_incorrect = '月の値が正しくありません。';
  $loc_value_day_incorrect = '日の値が正しくありません。';
  $loc_value_hour_incorrect = '時間の値が正しくありません。';
  $loc_value_minute_incorrect = '分値が正しくありません。';

  $loc_date_from_future  = '日付は未来からです';
  $loc_date_out_less_date_in  = '指定された日付が到着日より前です。';
  $loc_date_incorrect  = '無効な日付が指定されました';
  $loc_date_too_old  = '指定された日付が古すぎます-範囲外です。';

  $loc_repeat_again = 'もう一度試してみてください';
  $loc_not_enough_access_rights = '不十分なアクセス権';
  $loc_not_allow_edit_closed_records = '閉じたレコードの更新は許可されていません!!';
  $loc_not_exists_record = 'このエントリは存在しません';

  $loc_select_edit_without_close = '完了せずに編集が選択されました';
  $loc_select_edit_with_close = '記録を閉じることを選択しました';
  $loc_select_cancel = 'キャンセルを選択しました';

  $loc_opt_commit_changes_close_record = 'すべての変更が行われ、その後、編集のために投稿が閉じられます。';

  $loc_unable_add_with_empty_surname = '姓が空の訪問者を追加することはできません。';
  $loc_unable_add_car_with_empty_surname = 'ドライバーの姓がない車両を追加することはできません。';
  $loc_unable_add_car_with_empty_number = '番号のない車を追加することはできません。';

  $loc_opts_index_page_title = '警備員が見るメインウィンドウのタイトル';
  $loc_opts_admin_page_title = '管理フォームウィンドウのタイトル';
  $loc_opts_index_add_pos_button = '訪問者を追加するボタンのテキスト';
  $loc_opts_index_add_avt_button = '車を追加するボタンのテキスト';
  $loc_opts_index_add_pos_confm = '訪問者確認オプションのテキスト';
  $loc_opts_index_add_avt_confm = '車両確認オプションのテキスト';
  $loc_opts_index_num_pos_dates = '訪問を表示する日数';
  $loc_opts_index_num_avt_dates = '車を見せるために何日';
  $loc_opts_index_date_edit = '警備員が日付を編集できるようにする';
  $loc_opts_index_time_edit = '警備員が時間を編集できるようにする';
  $loc_opts_index_confirm_button = '確認ボタンのテキスト（[OK]、[はい]など）';
  $loc_opts_index_pos_edit_text = '訪問者リンクを編集するためのテキスト';
  $loc_opts_index_avt_edit_text = '車の編集リンクのテキスト';
  $loc_opts_index_tech_support = 'ヘルプデスク（使用に関する文字列）';
  $loc_opts_index_cancel_button = '[キャンセル]ボタンなどのテキスト。';
  $loc_opts_index_pos_ststr = '訪問者のデフォルトのステータス行';
  $loc_opts_index_avt_ststr = '車のデフォルトステータスライン';
  $loc_opts_admin_apply_filters = 'フィルタを開始するボタンのテキスト';
  $loc_opts_index_cancel_delay = '[キャンセル]を押したときの遅延（秒）';
  $loc_opts_index_action_delay = 'アクション実行時の遅延（秒）';
  $loc_opts_admin_save_changes = '設定の保存ボタンのテキスト';
  $loc_opts_admin_cancel_button = '管理パネルのリセットボタンのテキスト';
  $loc_opts_admin_no_data = '欠測データメッセージ（フィルター用）';
  $loc_opts_index_print_checkbox = '「印刷可能」チェックボックスのテキスト';
  $loc_opts_index_show_reset_pwd = 'パスワードをリセットするためのリンクを表示する';
  $loc_opts_admin_min_pswd_diff = 'パスワードの最小の複雑さ（文字タイプの数、0〜8）';

?>
