<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('TBL_HAJJ_AGENT_MANAGEMENT','hajj_agent_management');
define('TBL_HAJJ_USERS_GROUPS','hajj_users_groups');
define('TBL_HAJJ_USERS_LUGGAGETAGS','hajj_users_luggagetags');
define('TBL_HAJJ_USERS_IDCARDS','hajj_users_idcards');
define('TBL_HAJJ_USERS','hajj_users');
define('TBL_HAJJ_MASTER_STATE','hajj_master_state');
define('TBL_HAJJ_MASTER_COUNTRY','hajj_master_country');
define('TBL_HAJJ_MASTER_CITY','hajj_master_city');
define('TBL_HAJJ_ADMIN_USERS','hajj_admin_users');
define('TBL_HAJJ_ADMIN_NOTIFICATION_SETTINGS_MANAGEMENT','hajj_admin_notification_settings_management');
define('TBL_HAJJ_ADMIN_MASTER_SUBSCRIPTION','hajj_admin_master_subscription');
define('TBL_HAJJ_ADMIN_MASTER_GROUP_PACKAGE','hajj_admin_master_group_package');
define('TBL_HAJJ_USERS_PAYMENTS_HISTORY','hajj_users_payments_history');
define('TBL_HAJJ_AGENT_SUBSCRIPTION_MANAGEMENT','hajj_agent_subscription_management');
define('TBL_HAJJ_AGENT_EMAIL_TEMPLATE_MANAGEMENT','hajj_agent_email_template_management');
define('TBL_HAJJ_AGENT_EMAIL_TEMPLATE_TRANSACTION_MANAGEMENT','hajj_agent_email_template_transaction_management');

define('TBL_HAJJ_COUNTRIES','hajj_countries');
define('TBL_HAJJ_STATES','hajj_states');
define('TBL_HAJJ_CITIES','hajj_cities');
define('TBL_HAJJ_luggage_details','luggage_details');
define('TBL_HAJJ_EMAIL_CONF','hajj_email_configurations');
define('TBL_HAJJ_PACKAGE_COUNT','hajj_package_count');

define('YOUR_CONSUMER_KEY', 'UmuoIrhenIFmbWO7cYHTxQ1I2');
define('YOUR_CONSUMER_SECRET', 'IINeTdTZPjnDMpTGYt3LnSnZWUX1LuzUhGExbAVkQAneV5thUZ');