<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
*         ben.edmunds@gmail.com
*         @benedmunds
*
* Location: https://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/

// Vytvoření účtu
$lang['account_creation_successful'] = 'Účet úspěšně vytvořen';
$lang['account_creation_unsuccessful'] = 'Nepodařilo se vytvořit účet';
$lang['account_creation_duplicate_email'] = 'Email již použit nebo neplatný';
$lang['account_creation_duplicate_identity'] = 'Identita již použita nebo neplatná';
$lang['account_creation_missing_default_group'] = 'Výchozí skupina není nastavena';
$lang['account_creation_invalid_default_group'] = 'Nastavené neplatné jméno výchozí skupiny';

// Heslo
$lang['password_change_successful'] = 'Heslo úspěšně změněno';
$lang['password_change_unsuccessful'] = 'Nepodařilo se změnit heslo';
$lang['forgot_password_successful'] = 'Email pro obnovení hesla odeslán';
$lang['forgot_password_unsuccessful'] = 'Nepodařilo se odeslat odkaz pro obnovení hesla';

// Aktivace
$lang['activate_successful'] = 'Účet aktivován';
$lang['activate_unsuccessful'] = 'Nepodařilo se aktivovat účet';
$lang['deactivate_successful'] = 'Účet deaktivován';
$lang['deactivate_unsuccessful'] = 'Nepodařilo se deaktivovat účet';
$lang['activation_email_successful'] = 'Aktivační email odeslán. Zkontrolujte svou doručenou poštu nebo složku spam';
$lang['activation_email_unsuccessful'] = 'Nepodařilo se odeslat aktivační email';
$lang['deactivate_current_user_unsuccessful'] = 'Nemůžete deaktivovat sám sebe.';

// Přihlášení / Odhlášení
$lang['login_successful'] = 'Přihlášení úspěšné';
$lang['login_unsuccessful'] = 'Nesprávné přihlášení';
$lang['login_unsuccessful_not_active'] = 'Účet není aktivní';
$lang['login_timeout'] = 'Dočasně uzamčeno. Zkuste to později.';
$lang['logout_successful'] = 'Odhlášení úspěšné';

// Změny v účtu
$lang['update_successful'] = 'Informace o účtu úspěšně aktualizovány';
$lang['update_unsuccessful'] = 'Nepodařilo se aktualizovat informace o účtu';
$lang['delete_successful'] = 'Uživatel odstraněn';
$lang['delete_unsuccessful'] = 'Nepodařilo se odstranit uživatele';

// Skupiny
$lang['group_creation_successful'] = 'Skupina úspěšně vytvořena';
$lang['group_already_exists'] = 'Název skupiny již existuje';
$lang['group_update_successful'] = 'Detaily skupiny aktualizovány';
$lang['group_delete_successful'] = 'Skupina odstraněna';
$lang['group_delete_unsuccessful'] = 'Nepodařilo se odstranit skupinu';
$lang['group_delete_notallowed'] = 'Nelze odstranit skupinu administrátorů';
$lang['group_name_required'] = 'Název skupiny je povinné pole';
$lang['group_name_admin_not_alter'] = 'Název skupiny administrátorů nelze změnit';

// Aktivační email
$lang['email_activation_subject'] = 'Aktivace účtu';
$lang['email_activate_heading'] = 'Aktivace účtu pro %s';
$lang['email_activate_subheading'] = 'Prosím klikněte na tento odkaz pro %s.';
$lang['email_activate_link'] = 'Aktivovat váš účet';

// Email pro obnovení hesla
$lang['email_forgotten_password_subject'] = 'Ověření zapomenutého hesla';
$lang['email_forgot_password_heading'] = 'Obnovení hesla pro %s';
$lang['email_forgot_password_subheading'] = 'Prosím klikněte na tento odkaz pro %s.';
$lang['email_forgot_password_link'] = 'Obnovit vaše heslo';

