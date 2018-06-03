<?php // environment configuration/setup

/**
 * Website Settings
 */
define('HOME_PAGE', 'home');
define('TPL_EXT', 'tpl');

// mode
define('ENV', 'dev');
define('DEBUG_MODE', false);
define('MAINTENANCE_MODE', false);

// system
define('BASE_URL', ('//' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/') . '/'));
define('SYS_DIR', strtolower(str_replace('\\', '/', __DIR__ . '/')));
define('BASE_DIR', SYS_DIR . 'public_html');


/**
 * App Directories
 */
define('APP_DIR', SYS_DIR . 'app/');

// components
define('PLUGIN_DIR', APP_DIR . 'vendor/');
define('CONFIG_DIR', APP_DIR . 'config/');

// routes
define('ROUTES_DIR', APP_DIR . 'routes/');
define('TPL_DIR', APP_DIR . 'tpl/');


/**
 * App settings
 */
// include third party classes
require_once PLUGIN_DIR . 'autoload.php';


// debugging and security stuff
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE);