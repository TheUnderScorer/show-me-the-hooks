<?php

use SMTH\Modules\Admin\Http\Controllers\SaveSettingsController;
use SMTH\Modules\Admin\Http\Middleware\AdminAccess;
use UnderScorer\Core\Http\Router;

/**
 * @var Router $router
 */
$router
    ->route()
    ->post()
    ->match( '/smth/config' )
    ->middleware( AdminAccess::class )
    ->controller( SaveSettingsController::class );
