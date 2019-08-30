<?php

namespace WPK\Modules\HooksDisplay;

use UnderScorer\Core\Module;
use WPK\Modules\HooksDisplay\Hooks\Controllers\RenderHooksHandler;

/**
 * Class HooksDisplayModule
 * @package WPK\Modules\HooksDisplay
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
