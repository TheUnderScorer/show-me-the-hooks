<?php

namespace SMTH;

/*
Plugin Name: Show Me The Hooks!
Description: Have you ever wonder what hooks you need to use to customize your theme or plugin? Then this plugin comes to your rescue!
Author: Przemysław Żydek
Author URI: https://github.com/TheUnderScore
Version: 1.0.0
Text Domain: smth
*/

use Exception;
use UnderScorer\Core\AcfSettings;
use UnderScorer\Core\App;
use UnderScorer\Core\Settings;

if ( ! defined( 'CORE_SLUG' ) ) {
    define( 'CORE_SLUG', 'smth' );
}

$dir  = __DIR__;
$slug = CORE_SLUG;

// Require composer autoloader
require_once $dir . '/vendor/autoload.php';

if ( ! version_compare( PHP_VERSION, App::REQUIRED_PHP_VERSION, '>' ) ) {
    throw new Exception( 'Required PHP version for Show Me The Hooks is at least 7.3' );
}

try {

    $settings = function_exists( 'get_field' ) ?
        new AcfSettings( $slug ) :
        new Settings( $slug );

    $app = new App(
        $slug,
        __FILE__,
        $settings
    );

    return $app;

} catch ( Exception $e ) {
    echo $e->getMessage();
}
