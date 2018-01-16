<?php

/*
* %m1% - Dymamic markers which are replaced at run time by the relevant index.
*/
$lang = array ();

// Account
$lang = array_merge ( $lang, array (
    "ACCOUNT_SPECIFY_USERNAME" => "Please enter your username",
    "ACCOUNT_SPECIFY_PASSWORD" => "Please enter your password",
    "ACCOUNT_SPECIFY_EMAIL" => "Please enter your email address",
    "ACCOUNT_INVALID_EMAIL" => "Invalid email address",
    "ACCOUNT_USER_OR_EMAIL_INVALID" => "Username or email address is invalid",
    "ACCOUNT_USER_OR_PASS_INVALID" => "Username or password is invalid",
    "ACCOUNT_ALREADY_ACTIVE" => "Your account is already activated",
    "ACCOUNT_INACTIVE" => "Your account is inactive. Check your email/spam folder for the activation email. You can always request a new activation email through our website.",
    "ACCOUNT_USER_CHAR_LIMIT" => "Your username must be between %m1% and %m2% characters in length",
    "ACCOUNT_FIRST_CHAR_LIMIT" => "Your firstname must be between %m1% and %m2% characters in length",
    "ACCOUNT_LAST_CHAR_LIMIT" => "Your lastname must be between %m1% and %m2% characters in length",
    "ACCOUNT_COMPANY_CHAR_LIMIT" => "Your company name must be between %m1% and %m2% characters in length",
    "ACCOUNT_PASS_CHAR_LIMIT" => "Your password must be between %m1% and %m2% characters in length",
    "ACCOUNT_TITLE_CHAR_LIMIT" => "Titles must be between %m1% and %m2% characters in length",
    "ACCOUNT_PASS_MISMATCH" => "Your password and confirmation password must match",
    "ACCOUNT_COMPANY_INVALID_CHARACTERS" => "Company name can only include alpha-numeric characters",
    "ACCOUNT_USERNAME_IN_USE" => "Username %m1% is already in use",
    "ACCOUNT_EMAIL_IN_USE" => "Email %m1% is already in use",
    "ACCOUNT_LINK_ALREADY_SENT" => "An activation email has already been sent to this email address in the last %m1% hour(s)",
    "ACCOUNT_NEW_ACTIVATION_SENT" => "We have emailed you a new activation link, please check your email",
    "ACCOUNT_SPECIFY_NEW_PASSWORD" => "Please enter your new password",
    "ACCOUNT_SPECIFY_CONFIRM_PASSWORD" => "Please confirm your new password",
    "ACCOUNT_NEW_PASSWORD_LENGTH" => "New password must be between %m1% and %m2% characters in length",
    "ACCOUNT_PASSWORD_INVALID" => "Current password doesn't match the one we have on record",
    "ACCOUNT_DETAILS_UPDATED" => "Account details updated",
    "ACCOUNT_ACTIVATION_MESSAGE" => "http://%m1%activate-account.php?token=%m2%",
    "ACCOUNT_ACTIVATION_COMPLETE" => "You have successfully activated your account. You can now login <a href='/customer_login.php'>here</a>.",
    "ACCOUNT_REGISTRATION_COMPLETE_TYPE1" => "You have successfully registered. You can now login <a href='/customer_login.php'>here</a>.",
    "ACCOUNT_REGISTRATION_COMPLETE_TYPE2" => "Your account has been created successfully. A confirmation email has been sent to your email address. Please follow the link within the email in order to finish registration.",
    "ACCOUNT_PASSWORD_NOTHING_TO_UPDATE" => "You cannot update with the same password",
    "ACCOUNT_PASSWORD_UPDATED" => "Account password updated",
    "ACCOUNT_EMAIL_UPDATED" => "Account email updated",
    "ACCOUNT_TOKEN_NOT_FOUND" => "Token does not exist / Account is already activated",
    "ACCOUNT_USER_INVALID_CHARACTERS" => "Username can only include alpha-numeric characters",
    "ACCOUNT_FIRST_INVALID_CHARACTERS" => "First name can only include alpha-numeric characters",
    "ACCOUNT_LAST_INVALID_CHARACTERS" => "Last name can only include alpha-numeric characters",
    "ACCOUNT_DELETIONS_SUCCESSFUL" => "You have successfully deleted %m1% users",
    "ACCOUNT_MANUALLY_ACTIVATED" => "%m1%'s account has been manually activated",
    "ACCOUNT_COMPANYNAME_UPDATED" => "Companyname changed to %m1%",
    "ACCOUNT_TITLE_UPDATED" => "%m1%'s title changed to %m2%",
    "ACCOUNT_PERMISSION_ADDED" => "Added access to %m1% permission levels",
    "ACCOUNT_PERMISSION_REMOVED" => "Removed access from %m1% permission levels",
    "ACCOUNT_INVALID_USERNAME" => "Invalid username",
    "ACCOUNT_SPECIFY_COMPANY" => "Please enter your company name",
    "ACCOUNT_COMPANY_INVALID" => "Invalid company name",
    "EMPTY_FEEDBACK" => "Please enter a feedback"
) );

// Configuration
$lang = array_merge ( $lang, array (
    "CONFIG_NAME_CHAR_LIMIT" => "Site name must be between %m1% and %m2% characters in length",
    "CONFIG_URL_CHAR_LIMIT" => "Site name must be between %m1% and %m2% characters in length",
    "CONFIG_EMAIL_CHAR_LIMIT" => "Site name must be between %m1% and %m2% characters in length",
    "CONFIG_ACTIVATION_TRUE_FALSE" => "Email activation must be either `true` or `false`",
    "CONFIG_ACTIVATION_RESEND_RANGE" => "Activation Threshold must be between %m1% and %m2% hours",
    "CONFIG_LANGUAGE_CHAR_LIMIT" => "Language path must be between %m1% and %m2% characters in length",
    "CONFIG_LANGUAGE_INVALID" => "There is no file for the language key `%m1%`",
    "CONFIG_TEMPLATE_CHAR_LIMIT" => "Template path must be between %m1% and %m2% characters in length",
    "CONFIG_TEMPLATE_INVALID" => "There is no file for the template key `%m1%`",
    "CONFIG_EMAIL_INVALID" => "The email you have entered is not valid",
    "CONFIG_INVALID_URL_END" => "Please include the ending / in your site's URL",
    "CONFIG_UPDATE_SUCCESSFUL" => "Your site's configuration has been updated. You may need to load a new page for all the settings to take effect"
) );

//Navigation
$lang = array_merge($lang, array(
    "NAV_CART" => "Cart",
    "NAV_SIGN_IN" => "Sign in",
    "NAV_SIGN_UP" => "Sign up",
    "NAV_CH_PW" => "Change password",
    "NAV_CH_MAIL" => "Change e-mail",
    "NAV_LOFOUT" => "Logout"
));


// Miscellaneous
$lang = array_merge ( $lang, array (
    "CAPTCHA_FAIL" => "Error creating the security code",
    "DENY" => "Deny",
    "CONFIRM_URL" => "Confirm",
    "SUCCESS" => "Success",
    "ERROR" => "Error",
    "NOTHING_TO_UPDATE" => "Nothing to update",
    "SQL_ERROR" => "Fatal SQL error",
    "FEATURE_DISABLED" => "This feature is currently disabled",
    "PAGE_PRIVATE_TOGGLED" => "This page is now %m1%",
    "PAGE_ACCESS_REMOVED" => "Page access removed for %m1% permission level(s)",
    "PAGE_ACCESS_ADDED" => "Page access added for %m1% permission level(s)"
) );

// Permissions
$lang = array_merge ( $lang, array (
    "PERMISSION_CHAR_LIMIT" => "Permission names must be between %m1% and %m2% characters in length",
    "PERMISSION_NAME_IN_USE" => "Permission name %m1% is already in use",
    "PERMISSION_DELETIONS_SUCCESSFUL" => "Successfully deleted %m1% permission level(s)",
    "PERMISSION_CREATION_SUCCESSFUL" => "Successfully created the permission level `%m1%`",
    "PERMISSION_NAME_UPDATE" => "Permission level name changed to `%m1%`",
    "PERMISSION_REMOVE_PAGES" => "Successfully removed access to %m1% page(s)",
    "PERMISSION_ADD_PAGES" => "Successfully added access to %m1% page(s)",
    "PERMISSION_REMOVE_USERS" => "Successfully removed %m1% user(s)",
    "PERMISSION_ADD_USERS" => "Successfully added %m1% user(s)",
    "CANNOT_DELETE_NEWUSERS" => "You cannot delete the default 'new user' group",
    "CANNOT_DELETE_ADMIN" => "You cannot delete the default 'admin' group"
) );

// Welcome
$lang = array_merge ( $lang, array (
    "WELCOME_TEXT_1" => "We are pleased to offer you the opportunity to turn your ideas into a multimedia product.
            Our offer structure allows you to get high quality support at fair prices.
            Our goal is to create a multimedia product with you, no matter whether you are a company or a person. Our aim is to design the project in such a way that you like.",
    "WELCOME_TEXT_2" => "We are looking forward to making your ideas come true in sound and vision.",
));


// Titles
$lang = array_merge ( $lang, array (
    "MAIN_TITLE" => "dropZone-Production",
    "WELCOME_LOGIN" => "WELCOME TO THE <br />EVALink<sup>&reg;</sup> DEMO CENTER'S REGISTRATION AREA",
    "WELCOME_MSG" => "WELCOME",
    "LOGIN" => "Login",
    "LOGIN_INFO" => "Please log in to start the demo",
    "REGISTER" => "Register",
    "FORGOT_PASSWORD" => "Forgot password",
    "RESEND_ACTIVATION_EMAIL" => "Resend activation email",
    "SCREENCAST_INFO" => "Screencasts \"How to\"",
    "PW_CHANGE" => "Change password",
    "EMAIL_CHANGE" => "Change email",
    "LOGOUT" => "Logout",
    "ADMIN_CONFIGURATION" => "Admin configuration",
    "ADMIN_USERS" => "Admin users",
    "ADMIN_PERMISSIONS" => "Admin permissions",
    "ADMIN_PAGES" => "Admin pages",
    "HOME" => "Home",
    "ACTIVATE_ACCOUNT" => "Activate account",
    "PAGE_INFORMATION" => "Page information",
    "PAGE_ACCESS" => "Page Access",
    "USER_INFO" => "User information",
    "PERMISSION_ACCESS" => "Permission access",
    "NOT_REGISTERED" => "Not yet registered?  &#8680; Click <a href='register.php'>here</a> to register now.",
    "FEEDBACK" => "Feedback",
    "PW_FORGOT_TXT" => "You forgot your password? Please enter your login and email address into the fields below and we will send you an email to reset your password.",
    "SC_TXT" => "Have a look at the videos below to learn the basics of the EVALink<sup>&reg;</sup>InstallerApp<sup>&trade;</sup>. The videos cover the most important features of the InstallerApp<sup>&trade;</sup>.",
    "REGISTER_MAIL_SUBJECT" => "Confirmation registration",
    "HOME_TXT" => "Welcome to dropZone-Production",
    "VIDEOS_TXT" => "So simple is commissioning of the ipTNA<sup>®</sup>series >",
    "LANGUAGE" => "Language",
    "PW_FORGOT_QST" => "Forgot your password? &#8680; <a href='forgot-password.php'> here </a>",
    "RESEND_ACTIV_MAIL_TXT" => "Here, you can retrieve a copy of your registration activation email.",
    "FEEDBACK_TXT" => "We look forward to your feedback. Please fill out the form below.",
    "PW_CHANGE_TXT" => "Please use the form below to create a new password.",
    "EMAIL_CHANGE_TXT" => "Please use the form below to update your email.",
    "REGISTER_TXT" => "Here, you can register to the EVALink<sup>&reg;</sup> Demo Center by following only a few steps.",
    "ACTIVATION_SUBJECT" => "Activation mail",
    "FEEDBACK_SUCCESSFUL_SENT" => "Your feedback has been successfully sent.",
    "CART_CHECKOUT" => "Cart checkout",
    "ORDER_DETAILS" => "Customer order details",
    "THANK_YOU" => "Thank you",
    "HELLO" => "Hello",
    "SEARCH_BUTTON" => "Search",
    "SHOPPING" => "continue shopping",
    "TITLE_PROD" => "Products",
    "TITLE_BRAND" => "Brand",
    "TITLE_CAT" => "Categories",
    "TITLE_RESET_FILTER" => "RESET FILTER"
) );

// Buttons and form-fields
$lang = array_merge ( $lang, array (
    "SHIP_METHOD" => "Contact method",
    "SHIP_METHOD_STANDARD" => "By telephone",
    "SHIP_METHOD_EXPRESS" => "By email",
    "SHIP_METHOD_PREMIUM" => "By postal",
    "CHECKOUT" => "Checkout ",
    "RESET" => "Reset ",
    "LOGIN_BTN" => "Login",
    "REGISTER_BTN" => "Register",
    "SUBMIT_BTN" => "Submit",
    "USERNAME" => "Username",
    "PW" => "Password",
    "EMAIL" => "Email",
    "TEL" => "Tel number",
    "ADDRESS" => "Address",
    "PW_CONFIRM" => "Confirm Password",
    "SC1" => "Registration company representative",
    "SC2" => "Registration installer",
    "SC3" => "Register customer",
    "SC4" => "Configure template",
    "SC5" => "Register device",
    "SC6" => "Device replacement",
    "SC7" => "Check connection and transmission test",
    "SC_PATH" => "vid_en",
    "INSTALLERAPP" => "InstallerApp<sup>&trade;</sup>",
    "NEW_PW" => "New Password",
    "NEW_EMAIL" => "New mail",
    "UPDATE_BTN" => "Update",
    "WEBSITE_NAME" => "Webite name",
    "WEBSITE_URL" => "Website URL",
    "ACTIVATION_THRESHOLD" => "Activation threshold",
    "LANGUAGE" => "Language",
    "EMAIL_ACTIVATION" => "EMail activation",
    "STYLE_TEMPLATE" => "Style template",
    "DELETE" => "Delete",
    "TITLE" => "Groupe",
    "LAST_SIGN_IN" => "Last sign in",
    "PERMISSION_NAME" => "Permission name",
    "NEW_MEMBER" => "New member",
    "ADMINISTRATOR" => "Administrator",
    "ID" => "ID",
    "NAME" => "Name",
    "PRIVATE" => "Private",
    "PAGE" => "Page",
    "ACCESS" => "Access",
    "TRUE" => "True",
    "FALSE" => "False",
    "REMOVE_ACCESS" => "Remove Access",
    "FALSE" => "False",
    "NEVER" => "Never",
    "CODE" => "Security code",
    "ENTER_CODE" => "Enter code",
    "ACTIVE" => "Active",
    "ACTIVATE" => "Activate",
    "SIGN_UP" => "Sign up",
    "PERMISSION_MEMBER" => "Permission Membership",
    "REMOVE_PERMISSION" => "Remove permission",
    "REMOVE_MEMBER" => "Remove member",
    "ADD_PERMISSION" => "Add permission",
    "ADD_MEMBER" => "Add member",
    "PERMISSION_INFO" => "Permission information",
    "PUBLIC_ACCESS" => "Public access",
    "PRIVATE_ACCESS" => "Private access",
    "ADD_ACCESS" => "Add access",
    "TOOLTIP_SC_DEFAULT" => "ipTNA Series: Packaging, Accessories and Commissioning",
    "LAST_UPDATE_TEXT" => "Last update",
    "SEND" => "Send",
    "RETURN" => "Return",
    "EXPORT" => "Export",
    "PW_CURRENT" => "Current password",
    "FIRSTNAME" => "First name",
    "LASTNAME" => "Last name",
    "INSTALLERWEB_LANG" => "en"
) );

// Forgot Password
$lang = array_merge ( $lang, array (
    "FORGOTPASS_INVALID_TOKEN" => "Your activation token is not valid",
    "FORGOTPASS_NEW_PASS_EMAIL" => "We have emailed you a new password",
    "FORGOTPASS_REQUEST_CANNED" => "Lost password request cancelled",
    "FORGOTPASS_REQUEST_EXISTS" => "There is already a outstanding lost password request on this account",
    "FORGOTPASS_REQUEST_SUCCESS" => "We have emailed you instructions on how to regain access to your account"
) );

// Mail
$lang = array_merge ( $lang, array (
    "MAIL_ERROR" => "Fatal error attempting mail, contact your server administrator",
    "MAIL_TEMPLATE_BUILD_ERROR" => "Error building email template",
    "MAIL_TEMPLATE_DIRECTORY_ERROR" => "Unable to open mail-templates directory. Perhaps try setting the mail directory to %m1%",
    "MAIL_TEMPLATE_FILE_EMPTY" => "Template file is empty... nothing to send"
) );

//Mailtemplates, Mail attributes
$lang = array_merge ( $lang, array (
    "LOST_PW_REQ_FILE" => "lost-password-request_en.txt",
    "YOUR_LOST_PW_FILE" => "your-lost-password_en.txt",
    "ORDER_CONFIRMATION_FILE" => "order-confirmation_en.txt",
    "ORDER_REQUEST_FILE" => "order-request_en.txt",
    "LOSTPW_MAIL_SUBJECT" => "Lost password request",
    "NEWPW_MAIL_SUBJECT" => "Your new password",
    "ORDER_CONFIRM_SUBJECT" => "Order confirmation",
    "ORDER_REQUEST_SUBJECT" => "Order request",
) );

//shippingForm
$lang = array_merge ( $lang, array (
    "COUNTRY_CHOOSE" => "Choose your country: ",
    "COMMENT_WRITE" => "Write a comment to us",
    "SHIP_INFORMATION" => "Order information",

) );

//cart & shopping
$lang = array_merge ( $lang, array (
    "CART_ACTION" => "action",
    "CART_PRODUCT" => "product name",
    "CART_QUANTITY" => "quantity",
    "CART_PROD_PRICE" => "product price",
    "CART_PRICE" => "price in CHF",
    "CART_PPAYMENT" => "payment",
    "CART_WAITING_CONF" => "Waiting for confirmation",
    "CART_ID" => "Transaction Id",
    "CART_PRICE_ON_DEMAND" => "price on demand",
    "CART_PRICE_HOUR" => ".00 CHF/per hour",
    "CART_ADD" => "add to cart",
    "CART_MSG_ALREADY" => "Product is already added into the cart.",
    "CART_MSG_ADDED" => "added product",
    "CART_MSG_REMOVED" => "removed product from cart",
    "CART_MSG_UPDATED" => "updated product",

) );


//confirmation
$lang = array_merge ( $lang, array (
    "TXT_CONTROL" => "Please check your inputs. In case there is a wrong information, you can go back and edit it.",
    "EDIT" => "Edit information",
    "CONFIRM_ORDER" => "Confirm purchase",
    "CONFIRM_DATA" => "Confirm your data",
    "COUNTRY" => "Country",
    "COMMENT" => "Your comment",
    "CONFIRMATION_SUCCESS" => "We have emailed you the order confirmation.",
    "LOGIN_SUCC" => "You logged in successfully. Click <a href='shop.php'>here</a> to browse our shop."
) );
?>
