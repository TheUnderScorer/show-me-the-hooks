<?php

namespace SMTH\Modules\Admin\Http\Controllers;

use UnderScorer\Core\Http\Controller;

/**
 * Class SaveSettingsController
 * @package SMTH\Modules\Admin\Http\Controllers
 */
class SaveSettingsController extends Controller
{

    /**
     * Handles request
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->request->request->get( 'tr' )[ 'smthSettings' ];

        $this->app->setSetting( 'settings', $data );

        $this->response->setContent( [
            'message' => esc_html__( 'Settings saved!', 'smth' ),
            'flash'   => true,
        ] )->json();
    }

}
