<?php

/*
 * %m1% - Dymamic markers which are replaced at run time by the relevant index.
 */
$lang = array ();

// Account
$lang = array_merge ( $lang, array (
    "ACCOUNT_SPECIFY_USERNAME" => "Bitte geben Sie Ihren Benutzernamen ein",
    "ACCOUNT_SPECIFY_PASSWORD" => "Bitte geben Sie Ihr Passwort ein",
    "ACCOUNT_SPECIFY_EMAIL" => "Bitte geben Sie Ihre Mail-Adresse ein",
    "ACCOUNT_INVALID_EMAIL" => "Die Mail-Adresse ist ungültig",
    "ACCOUNT_USER_OR_EMAIL_INVALID" => "Benutzername oder Mail-Adresse ist ungültig",
    "ACCOUNT_USER_OR_PASS_INVALID" => "Benutzername oder Passwort ist ungültig",
    "ACCOUNT_ALREADY_ACTIVE" => "Ihr Konto wurde bereits aktiviert",
    "ACCOUNT_INACTIVE" => "Ihr Konto ist inaktiv. Überprüfen Sie Ihre Mails/Spam-Ordner, ob Sie die Aktivierungsmail erhalten haben. Ansonsten können Sie sich Ihre Aktivierungsmail über unsere Website erneut zusenden lassen.",
    "ACCOUNT_USER_CHAR_LIMIT" => "Der Benutzername muss zwischen %m1% und %m2% Zeichen lang sein",
    "ACCOUNT_FIRST_CHAR_LIMIT" => "Der Vorname muss zwischen %m1% und %m2% Zeichen lang sein",
    "ACCOUNT_LAST_CHAR_LIMIT" => "Der Nachname muss zwischen %m1% und %m2% Zeichen lang sein",
    "ACCOUNT_COMPANY_CHAR_LIMIT" => "Der Firmenname muss zwischen %m1% und %m2% Zeichen lang sein",
    "ACCOUNT_PASS_CHAR_LIMIT" => "Das Passwort muss zwischen %m1% und %m2% Zeichen lang sein",
    "ACCOUNT_TITLE_CHAR_LIMIT" => "Der Titel muss zwischen %m1% und %m2% Zeichen lang sein",
    "ACCOUNT_PASS_MISMATCH" => "Die Passwörter stimmen nicht überein",
    "ACCOUNT_COMPANY_INVALID_CHARACTERS" => "Firmenname darf nur alphanumerische Zeichen beinhalten",
    "ACCOUNT_USERNAME_IN_USE" => "Benutzername %m1% wird bereits verwendet",
    "ACCOUNT_EMAIL_IN_USE" => "E-Mail %m1% wird bereits verwendet",
    "ACCOUNT_LINK_ALREADY_SENT" => "Eine Aktivierungs-Mail wurde bereits versendet in den letzten %m1% Stunde(n)",
    "ACCOUNT_NEW_ACTIVATION_SENT" => "Der Aktivierungslink wurde an Sie versendet. Bitte überprüfen Sie Ihre Mails",
    "ACCOUNT_SPECIFY_NEW_PASSWORD" => "Bitte geben Sie Ihr neues Passwort ein",
    "ACCOUNT_SPECIFY_CONFIRM_PASSWORD" => "Bitte bestätigen Sie Ihr neues Passwort",
    "ACCOUNT_NEW_PASSWORD_LENGTH" => "Das neue Passwort muss zwischen %m1% und %m2% Zeichen lang sein",
    "ACCOUNT_PASSWORD_INVALID" => "Das aktuelle Passwort ist nicht korrekt",
    "ACCOUNT_DETAILS_UPDATED" => "Kontoinformationen sind aktualisiert",
    "ACCOUNT_ACTIVATION_MESSAGE" => "http://%m1%activate-account.php?token=%m2%",
    "ACCOUNT_ACTIVATION_COMPLETE" => "Sie haben Ihr Konto erfolgreich aktiviert. Sie können sich jetzt einloggen. ",
    "ACCOUNT_REGISTRATION_COMPLETE_TYPE1" => "Sie haben sich erfolgreich registriert. Sie können sich jetzt hier <a href='customer_login.php'>einloggen</a> . ",
    "ACCOUNT_REGISTRATION_COMPLETE_TYPE2" => "Sie haben sich erfolgreich registriert. Wir haben soeben eine Bestätigungsmail an Ihre E-Mail-Adresse gesendet. Bitte klicken Sie auf den darin enthaltenen Link, um die Registrierung abzuschliessen.",
    "ACCOUNT_PASSWORD_NOTHING_TO_UPDATE" => "Sie können nicht mit einem alten Passwort aktualisieren.",
    "ACCOUNT_PASSWORD_UPDATED" => "Kontopasswort wurde aktualisiert",
    "ACCOUNT_EMAIL_UPDATED" => "Kontomail wurde aktualisiert",
    "ACCOUNT_TOKEN_NOT_FOUND" => "Kein Token gefunden / Konto wurde bereits aktiviert",
    "ACCOUNT_USER_INVALID_CHARACTERS" => "Benutzername darf nur alphanumerische Zeichen beinhalten",
    "ACCOUNT_FIRST_INVALID_CHARACTERS" => "Vorname darf nur alphanumerische Zeichen beinhalten",
    "ACCOUNT_LAST_INVALID_CHARACTERS" => "Nachname darf nur alphanumerische Zeichen beinhalten",
    "ACCOUNT_DELETIONS_SUCCESSFUL" => "Der Benutzer %m1% wurde erfolgreich gelöscht",
    "ACCOUNT_MANUALLY_ACTIVATED" => "%m1%'s Konto wurde manuell aktiviert.",
    "ACCOUNT_COMPANYNAME_UPDATED" => "Firmenname wurde zu %m1% geändert",
    "ACCOUNT_TITLE_UPDATED" => "%m1%'s Titel wurde zu %m2% geändert",
    "ACCOUNT_PERMISSION_ADDED" => "Kontozugriff wurde entfernt für den folgenden Berechtigungslevel: %m1%",
    "ACCOUNT_PERMISSION_REMOVED" => "Kontozugriff wurde hinzugefügt für den folgenden Berechtigungslevel: %m1%",
    "ACCOUNT_INVALID_USERNAME" => "Benutzername ungültig",
    "ACCOUNT_SPECIFY_COMPANY" => "Bitte geben Sie Ihren Firmennamen ein",
    "ACCOUNT_COMPANY_INVALID" => "Der Firmenname ist ungültig",
    "EMPTY_FEEDBACK" => "Bitte schreiben Sie ein Feedback"
) );

// Configuration
$lang = array_merge ( $lang, array (
    "CONFIG_NAME_CHAR_LIMIT" => "Websitename muss zwischen %m1% und %m2% Zeichen lang sein",
    "CONFIG_URL_CHAR_LIMIT" => "Website-URL muss zwischen %m1% und %m2% Zeichen lang sein",
    "CONFIG_EMAIL_CHAR_LIMIT" => "Mail muss zwischen %m1% und %m2% Zeichen lang sein",
    "CONFIG_ACTIVATION_TRUE_FALSE" => "Mail-Aktivierung muss entweder `ein` oder `aus` sein",
    "CONFIG_ACTIVATION_RESEND_RANGE" => "Aktivierungs-Zeitlimite muss zwischen %m1% und %m2% Stunden sein",
    "CONFIG_LANGUAGE_CHAR_LIMIT" => "Sprach-Dateien müssen zwischen %m1% und %m2% Zeichen lang sein",
    "CONFIG_LANGUAGE_INVALID" => "Keine Datei für die Sprache `%m1%` zu finden",
    "CONFIG_TEMPLATE_CHAR_LIMIT" => "Vorlagen müssen zwischen %m1% und %m2% Zeichen lang sein",
    "CONFIG_TEMPLATE_INVALID" => "Keine Datei für den Style `%m1%` zu finden",
    "CONFIG_EMAIL_INVALID" => "Die Mailadresse ist ungültig",
    "CONFIG_INVALID_URL_END" => "Bitte fügen Sie am Schluss Ihrer URLs folgendes ein: '/' ",
    "CONFIG_UPDATE_SUCCESSFUL" => "Ihre Seiteneinstellungen wurden aktualisiert. Sie müssen die Seite ev. neu laden, um die Änderungen zu sehen"
) );



// Miscellaneous
$lang = array_merge ( $lang, array (
    "CAPTCHA_FAIL" => "Fehler beim Erstellen des Securitycodes",
    "DENY" => "Abbrechen",
    "CONFIRM_URL" => "Bestätigen",
    "SUCCESS" => "Erfolgreich",
    "ERROR" => "Fehler",
    "NOTHING_TO_UPDATE" => "Nichts zum aktualisieren",
    "SQL_ERROR" => "Fehler: SQL Error",
    "FEATURE_DISABLED" => "Dieses Feature ist zurzeit nicht verfügbar",
    "PAGE_PRIVATE_TOGGLED" => "Diese Seite ist jetzt %m1%",
    "PAGE_ACCESS_REMOVED" => "Seitenzugriff wurde entfernt für den folgenden Berechtigungstyp: %m1%",
    "PAGE_ACCESS_ADDED" => "Seitenzugriff wurde hinzugefügt für den folgenden Berechtigungstyp: %m1%"
) );

// Permissions
$lang = array_merge ( $lang, array (
    "PERMISSION_CHAR_LIMIT" => "Berechtigungstyp muss zwischen %m1% und %m2% Zeichen lang sein",
    "PERMISSION_NAME_IN_USE" => "Berechtigungstyp %m1% existiert bereits",
    "PERMISSION_DELETIONS_SUCCESSFUL" => "Berechtigungstyp '%m1%' wurde erfolgreich entfernt",
    "PERMISSION_CREATION_SUCCESSFUL" => "Berechtigungstyp '%m1%' wurde erfolgreich erstellt",
    "PERMISSION_NAME_UPDATE" => "Berechtigungstyp wurde zu `%m1%` geändert",
    "PERMISSION_REMOVE_PAGES" => "Zugriff auf Seite %m1% wurde erfolgreich entfernt",
    "PERMISSION_ADD_PAGES" => "Zugriff auf Seite %m1% wurde erfolgreich hinzugefügt",
    "PERMISSION_REMOVE_USERS" => "Benutzer wurde(n) erfolgreich von %m1% entfernt",
    "PERMISSION_ADD_USERS" => "Benutzer wurde(n) erfolgreich zu %m1% hinzugefügt",
    "CANNOT_DELETE_NEWUSERS" => "Die Defaultgruppe 'new user' kann nicht entfernt werden",
    "CANNOT_DELETE_ADMIN" => "Die Defaultgruppe 'admin' kann nicht entfernt werden"
) );

// Titles
$lang = array_merge ( $lang, array (
    "MAIN_TITLE" => "dropZone-Production",
    "WELCOME_LOGIN" => "WILLKOMMEN IM LOGIN-BEREICH DES <br /> EVALink<sup>&reg;</sup> DEMO CENTER",
    "WELCOME_MSG" => "WILLKOMMEN",
    "LOGIN" => "Login",
    "LOGIN_INFO" => "Bitte melden Sie sich hier mit Benutzername und Passwort an.",
    "REGISTER" => "Registrieren",
    "FORGOT_PASSWORD" => "Passwort vergessen",
    "RESEND_ACTIVATION_EMAIL" => "Aktivierungsmail wiederholen",
    "SCREENCAST_INFO" => "Videos \"How to\"",
    "PW_CHANGE" => "Passwort ändern",
    "EMAIL_CHANGE" => "Email ändern",
    "LOGOUT" => "Logout",
    "ADMIN_CONFIGURATION" => "Admin Konfigurationen",
    "ADMIN_USERS" => "Admin Benutzer",
    "ADMIN_PERMISSIONS" => "Admin Berechtigungen",
    "ADMIN_PAGES" => "Admin Seiten",
    "HOME" => "Home",
    "ACTIVATE_ACCOUNT" => "Aktiviere Konto",
    "PAGE_INFORMATION" => "Seiteninformationen",
    "PAGE_ACCESS" => "Seitenzugriff",
    "USER_INFO" => "Benutzerinformationen",
    "PERMISSION_ACCESS" => "Zugriffsberechtigung",
    "NOT_REGISTERED" => "Noch nicht registriert? &#8680; Jetzt hier <a href='register.php'>registrieren</a>",
    "FEEDBACK" => "Feedback",
    "PW_FORGOT_TXT" => "Sie haben Ihr Passwort vergessen? Geben Sie im untenstehenden Feld Ihren Benutzernamen und Ihre E-Mail-Adresse ein und wir werden Ihnen eine E-Mail zusenden, mit welcher Sie ein neues Passwort generieren können.",
    "SC_TXT" => "Um einen ersten Einblick in unsere EVALink<sup>&reg;</sup>InstallerApp<sup>&trade;</sup> zu erhalten können Sie die folgenden Videos anschauen. In diesen Videos werden die wichtigsten Funktionen unserer InstallerApp<sup>&trade;</sup> gezeigt.",
    "REGISTER_MAIL_SUBJECT" => "Bestätigung Registrierung",
    "HOME_TXT" => "Willkommen bei dropZone-Production",
    "VIDEOS_TXT" => "So einfache ist die Inbetriebnahme der ipTNA<sup>®</sup>Serie >",
    "LANGUAGE" => "Sprache",
    "PW_FORGOT_QST" => "Passwort vergessen? &#8680; <a href='forgot-password.php'> hier </a>",
    "RESEND_ACTIV_MAIL_TXT" => "Hier können Sie sich die Aktivierungsmail von Ihrer Registrierung erneut zusenden lassen.",
    "FEEDBACK_TXT" => "Wir freuen uns auf Ihr Feedback. Bitte benutzten Sie dazu das untenstehende Formular.",
    "PW_CHANGE_TXT" => "Mit dem untenstehenden Formular können Sie sich ein neues Passwort vergeben.",
    "EMAIL_CHANGE_TXT" => "Mit dem untenstehenden Formular können Sie sich eine neue Email Adresse vergeben.",
    "REGISTER_TXT" => "Hier können Sie sich mit wenigen Schritten für unser EVALink<sup>&reg;</sup> Demo Center registrieren.",
    "ACTIVATION_SUBJECT" => "Aktivierungmail",
    "FEEDBACK_SUCCESSFUL_SENT" => "Ihr Feedback wurde erfolgreich an uns gesendet.",
) );

// Buttons and form-fields
$lang = array_merge ( $lang, array (
    "SHIP_METHOD" => "Versandart",
    "CHECKOUT" => "Checkout",
    "RESET" => "Reset ",
    "LOGIN_BTN" => "Anmelden",
    "REGISTER_BTN" => "Registrieren",
    "SUBMIT_BTN" => "Bestätigen",
    "USERNAME" => "Benutzername",
    "PW" => "Passwort",
    "EMAIL" => "E-Mail",
    "TEL" => "Tel Nummer",
    "ADDRESS" => "Adresse",
    "PW_CONFIRM" => "Passwort bestätigen",
    "SC1" => "Registrierung Firmenverantwortlicher",
    "SC2" => "Registrierung Installateur",
    "SC3" => "Kunde erfassen",
    "SC4" => "Template erfassen",
    "SC5" => "Gerät registrieren",
    "SC6" => "Gerätewechsel",
    "SC7" => "Gerät Inbetriebnahme und Test",
    "SC_PATH" => "vid_de",
    "INSTALLERAPP" => "InstallerApp<sup>&trade;</sup>",
    "NEW_PW" => "Neues Passwort",
    "NEW_EMAIL" => "Neue E-Mail",
    "UPDATE_BTN" => "Aktualisieren",
    "WEBSITE_NAME" => "Webseite-Name",
    "WEBSITE_URL" => "Webseite-URL",
    "ACTIVATION_THRESHOLD" => "Aktivierungszeitlimite",
    "LANGUAGE" => "Sprache",
    "EMAIL_ACTIVATION" => "E-Mail aktivierung",
    "STYLE_TEMPLATE" => "Style Vorlagen",
    "DELETE" => "Löschen",
    "TITLE" => "Gruppe",
    "LAST_SIGN_IN" => "Letzter Zugriff",
    "PERMISSION_NAME" => "Berechtigungstyp",
    "NEW_MEMBER" => "Neuer Mitglied",
    "ADMINISTRATOR" => "Administrator",
    "ID" => "ID",
    "NAME" => "Name",
    "PRIVATE" => "Privat",
    "PAGE" => "Seite",
    "ACCESS" => "Zugriff",
    "TRUE" => "wahr",
    "FALSE" => "falsch",
    "REMOVE_ACCESS" => "Zugriff entfernen",
    "FALSE" => "falsch",
    "NEVER" => "Nie",
    "CODE" => "Sicherheitscode",
    "ENTER_CODE" => "Code bestätigen",
    "ACTIVE" => "Aktiv",
    "ACTIVATE" => "Aktivieren",
    "SIGN_UP" => "Registration",
    "PERMISSION_MEMBER" => "Berechtigung Mitglieder",
    "REMOVE_PERMISSION" => "Berechtigung entfernen",
    "REMOVE_MEMBER" => "Mitglied entfernen",
    "ADD_PERMISSION" => "Berechtigung hinzufügen",
    "ADD_MEMBER" => "Mitglied hinzufügen",
    "PERMISSION_INFO" => "Berechtigungsinformationen",
    "PUBLIC_ACCESS" => "Öffentlicher Zugriff",
    "PRIVATE_ACCESS" => "Privater Zugriff",
    "ADD_ACCESS" => "Zugriff hinzufügen",
    "TOOLTIP_SC_DEFAULT" => "ipTNA Series: Verpackung, Zubehör und Inbetriebnahme",
    "LAST_UPDATE_TEXT" => "Letzte Änderung",
    "SEND" => "Senden",
    "RETURN" => "Zurück",
    "EXPORT" => "Exportieren",
    "PW_CURRENT" => "Aktuelles Passwort",
    "FIRSTNAME" => "Vorname",
    "LASTNAME" => "Nachname",
    "INSTALLERWEB_LANG" => "de"
) );

// Forgot Password
$lang = array_merge ( $lang, array (
    "FORGOTPASS_INVALID_TOKEN" => "Ihr Aktivierungstoken ist ungültig",
    "FORGOTPASS_NEW_PASS_EMAIL" => "Wir haben Ihnen ein neues Passwort zugeschickt",
    "FORGOTPASS_REQUEST_CANNED" => "Anfrage wegen verlorenem Passwort wurde beendet",
    "FORGOTPASS_REQUEST_EXISTS" => "Eine Anfrage wegen verlorenem Passwort existiert bereits",
    "FORGOTPASS_REQUEST_SUCCESS" => "Wir haben Ihnen ein Mail mit der Anweisung, wie Sie den Zugriff zurückerlangen können, verschickt"
) );

// Mail
$lang = array_merge ( $lang, array (
    "MAIL_ERROR" => "Ein Fehler beim Versenden der Mail. Kontaktieren Sie den Administrator.",
    "MAIL_TEMPLATE_BUILD_ERROR" => "Fehler beim Erstellen der Mailvorlagen",
    "MAIL_TEMPLATE_DIRECTORY_ERROR" => "Der Zugriff auf den Vorlagenordner wurde geblockt. Versuchen Sie den Vorlagenordner nach %m1% zu verschieben.",
    "MAIL_TEMPLATE_FILE_EMPTY" => "Vorlagenordner ist leer...Nichts zu versenden"
) );

//Mailtemplates, Mail attributes
$lang = array_merge ( $lang, array (
    "LOST_PW_REQ_FILE" => "lost-password-request_de.txt",
    "YOUR_LOST_PW_FILE" => "your-lost-password_de.txt",
    "ORDER_CONFIRMATION_FILE" => "order-confirmation_de.txt",
    "ORDER_REQUEST_FILE" => "order-request_de.txt",
    "LOSTPW_MAIL_SUBJECT" => "Passwort vergessen",
    "NEWPW_MAIL_SUBJECT" => "Ihr neues Passwort",
    "ORDER_CONFIRM_SUBJECT" => "Bestellbestätigung",
    "ORDER_REQUEST_SUBJECT" => "Bestellungsanfrage",

) );

//shippingForm
$lang = array_merge ( $lang, array (
    "COUNTRY_CHOOSE" => "Land auswählen: ",
    "COMMENT_WRITE" => "Schreib einen Kommentar an uns",
    "SHIP_INFORMATION" => "Versandsinformationen",

) );

//confirmation
$lang = array_merge ( $lang, array (
    "TXT_CONTROL" => "Bitte bestätigen sie ihre Daten. Falls die Angaben nicht stimmen, können sie zurück, um sie zu bearbeiten.",
    "EDIT" => "Angaben bearbeiten",
    "CONFIRM_ORDER" => "Bestellung bestätigen",
    "CONFIRM_DATA" => "Angaben bestätigen",
    "COUNTRY" => "Land",
    "COMMENT" => "Ihr Kommentar",
    "CONFIRMATION_SUCCESS" => "Wir haben Ihnen ein Mail mit den Bestellungsinformationen verschickt"
) );
?>
