<?php

/**
 * This file is used to store project modules.
 *
 * In order to add module you only need to add reference to it's class (that extends base Module class) to array below.
 */

use UnderScorer\Core\CoreModule;
use WPK\Modules\Admin\AdminModule;
use WPK\Modules\HooksDisplay\HooksDisplayModule;

return apply_filters( 'smth.modules', [
    'core'         => CoreModule::class,
    'hooksDisplay' => HooksDisplayModule::class,
    'admin'        => AdminModule::class,
] );
