<?php

namespace SMTH\Modules\HooksDisplay;

use SMTH\Modules\HooksDisplay\Hooks\Controllers\RenderHooksHandler;
use UnderScorer\Core\Module;

/**
 * Class HooksDisplayModule
 * @package SMTH\Modules\HooksDisplay
 */
class HooksDisplayModule extends Module
{

    /**
     * @var array
     */
    protected $controllers = [
        RenderHooksHandler::class,
    ];

    /**
     * Performs module bootstrap
     *
     * @return void
     */
    protected function bootstrap(): void
    {
        $this->menu->setRegister( false );
    }
}
