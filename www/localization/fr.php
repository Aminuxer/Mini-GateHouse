<?php
       /* Mini-GateHouse FRANÇAIS Chaînes de localisation - MACHINE TRANSLATION */
  /* Variable de remplacement ; Set $localization = 'fr' ; dans la configuration pour l'application. */

  $loc_rand_pass_gen_random_passwords = 'Mot de passe aléatoire à';
  $loc_rand_pass_gen_symbols_length = 'longueur des symboles';

  $loc_main_menu_visitors = 'Visiteurs';
  $loc_main_menu_visitors_list = 'Liste des visiteurs';

  $loc_main_menu_cars = 'Voitures';
  $loc_main_menu_cars_list = 'Liste des voitures';

  $loc_main_menu_about = 'À propos de';
  $loc_main_menu_options = 'OPTIONS';
  $loc_main_menu_logins = 'Logins';
  $loc_main_menu_workrules = 'Règles';

  $loc_main_menu_logout_hint = 'Exit (Fin de la session)';
  $loc_main_error = 'Erreur';
  $loc_error_bad_user_agent = 'Ce client<Br/>%s<Br/>ne peut pas être utilisé.<Br/>Essayez un autre navigateur/application.';
  
  $loc_visitors_surname = 'Nom de famille N.';
  $loc_search_surname_short = 'Nom de famille N.';
  $loc_visitors_document = 'Document (carte d\'identité, passeport)';
  $loc_visitors_document_short = 'Document';
  $loc_visitors_come = 'Arrivée';
  $loc_visitors_gone = 'disparu';
  $loc_visitors_ticket = 'Ticket';
  $loc_visitors_target = 'Qui';
  $loc_visitors_comment = 'commentaire';
  $loc_visitors_last_change = 'Dernière modification';
  $loc_visitors_creator = 'Créé par';
  
  $loc_visitors_adding_visitor = 'ADD VISITEUR';
  $loc_visitors_already_exists = 'CETTE VISITE EXISTE DÉJÀ';
  
  $loc_without_option = 'Sans cette option';
  $loc_add_impossible = 'ne peut pas être ajouté';
  
  
  $loc_cars_carnumber = 'Voiture (№)';
  $loc_cars_arrived = 'Arrivée';
  $loc_cars_gone = 'disparu';
  $loc_cars_adding_car = 'Ajouter une voiture';
  $loc_cars_already_exists = 'CETTE VOITURE EXISTE DÉJÀ';
  
  $loc_search_filters = 'Filtres:';
  $loc_print_text = 'imprimer';
  $loc_print_checkbox_hint = 'Cochez cette case pour préparer l\'impression';
  $loc_processing_text = 'EXECUTING';
  $loc_success_text = 'PRÊT';
  $loc_failure_text = 'FAIL';

  $loc_filterdates_since = 'Depuis';
  $loc_filterdates_to = 'à';

  $loc_filtes_hint_date_out = 'Appliquer le filtre à la date de départ';
  $loc_filtes_hint_date_last_change = 'Appliquer le filtre à la date des dernières ';

  $loc_link_edit = 'Modifier';

  $loc_edit_editing_title = 'Modification de';
  $loc_edit_editing_title_hint = 'rangée avec l\'id';
  $loc_edit_editing_visitor_header1= 'Votre enregistrement d\'édition pour ce visiteur';
  $loc_edit_editing_cars_header1= 'Votre record d\'édition pour cette voiture';

  $loc_edit_accessible_actions = 'Action suivante autorisée';
  $loc_edit_action1_assign_visitor_gone_time = 'Définir l\'heure de départ';
  $loc_edit_action1_assign_car_gone_time = 'Définir l\'heure de départ';
  $loc_edit_action2_change_record_or_unlock = 'Modifier les données et déverrouiller la visite.';
  $loc_edit_action3_do_nothing = 'Ne rien faire et quitter';

  $loc_options_parameter = 'Option';
  $loc_options_value = 'Valeur';
  $loc_options_description = 'Description';
  $loc_options_checkbox_hint = 'Cochez la case pour activer l\'option';
  $loc_options_numberinput_hint = 'Valeur du numéro d\'entrée';
  $loc_options_saved_ok = 'Les changements sont enregistrés avec succès.';

  $loc_password_generator = 'Générateur de mots de passe';

  $loc_logins_title = 'Opérateurs';
  $loc_logins_login = 'Connexion';
  $loc_logins_enable = 'ON';
  $loc_logins_username = 'Nom et/ou fonction';
  $loc_logins_role_root = 'root';
  $loc_logins_role_admin = 'Chef de garde';
  $loc_logins_role_guard = 'Garde';
  $loc_logins_role_password = 'Mot de passe';
  $loc_logins_role_password2 = 'Confirmation du mot de passe';
  $loc_logins_delete = 'Supprimer';
  $loc_logins_adduser_title_hint = 'Pour ajouter un nouvel opérateur, entrez un nouveau login et des mots de passe égaux:';
  $loc_logins_new_login_hint = '<Nouvel opérateur>';

  $loc_login_current_user_text = 'Opérateur actuel';  
  $loc_login_current_change_password_link = 'Changer mon mot de passe';  

  $loc_login_change_password_header = 'Changer mon mot de passe';
  $loc_login_change_password_you_login = 'Votre login :';
  $loc_login_change_password_you_current_password = 'Ancien mot de passe';
  $loc_login_change_password_you_new_password = 'Nouveau mot de passe';
  $loc_login_change_password_you_new_password2 = 'Confirmation';
  $loc_login_change_password_submit_button = 'Modifier le mot de passe';
  $loc_login_change_password_exit_button = 'Sortie';

  $loc_logins_detailed_help = 'Aide :<br>
<li> Pour ajouter un opérateur, il faut entrer un nouveau login (qui ne correspond pas à ce qui existe déjà),<br>&nbsp;&nbsp;&nbsp;mot de passe non vide et confirmation du mot de passe.</li>
<li> Option `root` - accès complet au système, y compris la gestion des opérateurs.<br>&nbsp;&nbsp;&nbsp;Possibilité de modifier n\'importe quel enregistrement et de saisir n\'importe quelle date.<br>&nbsp;&nbsp;&nbsp;(Surcharge d\'autres options)</li>
<li> Option `Chef de garde` - Visualiser les données pour n\'importe quelle période et modifier les options.<br>&nbsp;&nbsp;&nbsp;Peut ne pas ajouter de données, mais peut modifier les données ouvertes
.<br>&nbsp;&nbsp;&nbsp;Les enregistrements fermés sont en lecture seule. Toutes les dates sont autorisées.</li>
<li> Option `Garde` - ajouter et modifier des données uniquement pour les N derniers jours (à partir des options).<br>&nbsp;&nbsp;&nbsp;Possibilité de saisir des dates uniquement dans la plage autorisée.</li>
<li> Les logins doivent être différents.<br></li>
<li> Pour changer le mot de passe de l\'opérateur existant, entrez le nouveau mot de passe et confirmez dans la ligne correspondante.</li>';

  $loc_about_detailed_help = 'Ce système permet d\'enregistrer les visiteurs et les voitures qui arrivent et repartent de la zone de votre entreprise.<br>
<font class="usop_alert">0.</font> Pour commencer à travailler, entrez l\'URL du serveur dans le navigateur, et tapez les informations d\'identification dans la fenêtre.
<font class="btntd">%s</font> Sur le terrain <font class="btntd">%s</font> entrez votre login, dans le champ <font class="btntd">%s</font> - votre mot de passe,
vérifier également le nom de la passerelle <font class="btntd">%s</font> est vraiment correct.<br>
<font class="usop_alert">1.</font> Les onglets situés en haut permettent de saisir des données sur les visiteurs et les voitures.
La commutation de l\'onglet Avis efface les données des formulaires non sauvegardés.<br>
<font class="usop_alert">2.</font> Avant d\'ajouter des données, appuyez sur le bouton <font class="btntd">[F5]</font> pour l\'heure de mise à jour du serveur et les valeurs saisies dans les champs de formulaire. (Le format de l\'heure est <font class="btntd">24</font>-h)<br>
Dossiers avec <font class="usop_alert">*</font> note requise.<br>
<font class="usop_alert">3.</font> Vérifier les données saisies et cocher la case <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font> (ou <font class="btntd"><input type="checkbox" class="btn" checked disabled>%s</font>)
et appuyez sur le bouton <INPUT type="button" class="btn" value="%s" disabled> (ou <INPUT type="button" class="btn" value="%s" disabled>) seulement UNE fois.<br>
<font class="usop_alert">4.</font> Lorsque l\'action est correcte, les données saisies apparaissent dans la liste ci-dessous..<br>
Pour les gardes, cette liste ne montre que les données pour N jours. (<font class="btntd">%s</font> pour les visiteurs / <font class="btntd">%s</font> pour les voitures) par dates descendantes, et pour tout jour ouvert les visites s\'affichent en haut.
Dans les enregistrements de tous les jours triés par date d\'arrivée décroissante.<br>
<font class="usop_alert">5.</font> Toutes les questions passent ici :<br><font class="btntd">%s</font>';

  $loc_loginform_login = 'Connexion';
  $loc_loginform_password  = 'Mot de passe';
  $loc_loginform_input  = 'Entrez';
  
  $loc_months = array('Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc');
  $loc_logics_name = array ('égal', 'pas égal', 'plus', 'plus ou moins égal', 'moins', 'inférieur ou égal');
  
  $loc_old_password_incorrect = 'Ancien mot de passe mauvais.';
  $loc_pass_and_confirm_not_match = 'Le mot de passe et la confirmation ne correspondent pas.';
  $loc_old_password_equal_new = 'Ancien mot de passe égal à nouveau.';
  $loc_password_equal_login = 'Le mot de passe ne correspond pas au login.';
  $loc_empty_password_denied = 'Le mot de passe vide n\'est pas autorisé.';
  $loc_password_complex_too_low = 'Mot de passe trop simple. Il faut au moins %s types de symboles différents. Difficulté actuelle : %s.';
  
  $loc_password_changed_ok = 'Le mot de passe a été modifié avec succès.';
  $loc_password_changed_fail = 'Le mot de passe ne change pas. <Br>Demandez à votre administrateur système/IT Dep.';
  
  $loc_value_year_incorrect = 'Valeur de l\'année incorrecte.';
  $loc_value_month_incorrect = 'Valeur du mois incorrecte.';
  $loc_value_day_incorrect = 'Valeur du jour incorrecte.';
  $loc_value_hour_incorrect = 'Valeur horaire incorrecte.';
  $loc_value_minute_incorrect = 'Valeur des minutes incorrecte.';

  $loc_date_from_future  = 'Date du futur';
  $loc_date_out_less_date_in  = 'Date d\'entrée inférieure à la date d\'arrivée.';
  $loc_date_incorrect  = 'Date incorrecte';
  $loc_date_too_old  = 'Date trop ancienne - pas dans la fourchette autorisée.';

  $loc_repeat_again = 'Essayez à nouveau';
  $loc_not_enough_access_rights = 'Aucun droit d\'accès';
  $loc_not_allow_edit_closed_records = 'NE PEUT PAS MODIFIER UN ENREGISTREMENT FERMÉ !!';
  $loc_not_exists_record = 'L\'enregistrement n\'existe pas';

  $loc_select_edit_without_close = 'ÉDITION SÉLECTIONNÉE SANS FINALISATION';
  $loc_select_edit_with_close = 'FINALISATION SAISIE';
  $loc_select_cancel = 'ANNULER LA SÉLECTION';

  $loc_opt_commit_changes_close_record = 'Tous les changements seront appliqués, et l\'enregistrement sera fermé à l\'édition.';

  $loc_unable_add_with_empty_surname = 'Impossible d\'ajouter un visiteur avec un nom de famille vide.';
  $loc_unable_add_car_with_empty_surname = 'Impossible d\'ajouter une voiture sans le nom de famille du conducteur.';
  $loc_unable_add_car_with_empty_number = 'Impossible d\'ajouter une voiture sans numéro.';

  $loc_opts_index_page_title = 'En-tête de la fenêtre principale pour les gardes';
  $loc_opts_admin_page_title = 'En-tête du formulaire d\'administration';
  $loc_opts_index_add_pos_button = 'Ajouter le texte du bouton du visiteur';
  $loc_opts_index_add_avt_button = 'Ajouter le texte du bouton de la voiture';
  $loc_opts_index_add_pos_confm = 'Texte d\'option pour confirmer le visiteur';
  $loc_opts_index_add_avt_confm = 'Texte d\'option pour confirmer la voiture';
  $loc_opts_index_num_pos_dates = 'Voir les visiteurs pour ces derniers jours';
  $loc_opts_index_num_avt_dates = 'Voir les voitures pour ces derniers jours';
  $loc_opts_index_date_edit = 'Autoriser les gardes à modifier la date';
  $loc_opts_index_time_edit = 'Autoriser le temps d\'édition des gardes';
  $loc_opts_index_confirm_button = 'Texte pour les boutons de confirmation  (ОК, Yes, Oui etc)';
  $loc_opts_index_pos_edit_text = 'Texte pour le lien d\'édition du visiteur';
  $loc_opts_index_avt_edit_text = 'Texte pour le lien d\'édition de la voiture';
  $loc_opts_index_tech_support = 'Assistance technique (chaîne de caractères dans les règles d\'utilisation)';
  $loc_opts_index_cancel_button = 'Texte pour les boutons de refus Annuler, Non, Rejeter, etc.';
  $loc_opts_index_pos_ststr = 'statut-sting par défaut dans le formulaire des visiteurs';
  $loc_opts_index_avt_ststr = 'statut-sting par défaut en forme de voiture';
  $loc_opts_admin_apply_filters = 'Texte pour le bouton des filtres';
  $loc_opts_index_cancel_delay = 'Délai (secondes) pour appuyer sur [Annuler]';
  $loc_opts_index_action_delay = 'Délai (secondes) à l\'action';
  $loc_opts_admin_save_changes = 'Texte du bouton "Enregistrer les paramètres';
  $loc_opts_admin_cancel_button = 'Bouton de réinitialisation Texte';
  $loc_opts_admin_no_data = 'Message NO-Data (pour les filtres)';
  $loc_opts_index_print_checkbox = 'Texte pour checkbiox "for print" (pour impression)';
  $loc_opts_index_show_reset_pwd = 'Afficher le lien pour réinitialiser le mot de passe de l\'opérateur';
  $loc_opts_admin_min_pswd_diff = 'Complexité minimale du mot de passe (nombre de types de symboles, 0-8)';

?>
