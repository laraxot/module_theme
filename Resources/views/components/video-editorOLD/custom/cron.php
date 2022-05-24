<?php

// ┌───────────── minute (0 - 59)
// │ ┌───────────── hour (0 - 23)
// │ │ ┌───────────── day of month (1 - 31)
// │ │ │ ┌───────────── month (1 - 12)
// │ │ │ │ ┌───────────── day of week (0 - 6) (Sunday to Saturday;
// │ │ │ │ │                                       7 is also Sunday)
// │ │ │ │ │
// │ │ │ │ │
// * * * * *  command to execute
//
//# once per 1 minute
//*/1 * * * * php -f /var/www/mysite.com/cron.php queue > /dev/null

/** @var array $config */
require_once __DIR__ . '/config/config.php';

if( $config['debug'] ){
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

require_once __DIR__ . '/vendor/autoload.php';
use App\Controller\QueueControllerClass as QueueController;

$arguments = PHP_SAPI == 'cli' && !empty( $argv )
    ? $argv
    : $_GET;

$output = '';
switch ( $arguments[1] ){
    case 'queue':

        $controller = new QueueController( $config );
        $output = $controller->queueProcessing();

        break;
}

if( !empty( $arguments[2] ) && $arguments[2] == 'out' ){
    var_dump( $output );
}
