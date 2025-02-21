<?php
define('_JEXEC', 1);
define('JPATH_BASE', dirname(__DIR__));
define('JPATH_SITE', JPATH_BASE);
define('JPATH_CONFIGURATION', JPATH_BASE . '/configuration.php');
define('JPATH_LIBRARIES', JPATH_BASE . '/libraries');

require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

use Joomla\CMS\Factory;

try {
    $container = require JPATH_BASE . '/libraries/bootstrap.php';
    $app = $container->get(\Joomla\CMS\Application\AdministratorApplication::class);
    $app->initialise();

    // Set Joomla's Factory container
    Factory::$application = $app;
    Factory::$container = $container;
} catch (\Exception $e) {
    die("Joomla failed to start: " . $e->getMessage());
}
