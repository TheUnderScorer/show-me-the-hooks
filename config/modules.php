<?php

/**
 * This file is used to store project modules.
 *
 * In order to add module you only need to add reference to it's class (that extends base Module class) to array below.
 */

use SMTH\Modules\Admin\AdminModule;
use SMTH\Modules\HooksDisplay\HooksDisplayModule;
use UnderScorer\Core\CoreModule;

return apply_filters( 'smth.modules', [
    'core'         => CoreModule::class,
    'hooksDisplay' => HooksDisplayModule::class,
    'admin'        => AdminModule::class,
] );
