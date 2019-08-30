<?php

namespace SMTH\Modules\Admin\Http\Middleware;

use UnderScorer\Core\Http\Middleware;

/**
 * Class AdminAccess
 * @package SMTH\Modules\Admin\Http\Middleware
 */
class AdminAccess extends Middleware
{

    /**
     * Calls middleware
     *
     * @return void
     */
    public function handle()
    {
        if ( ! current_user_can( 'administrator' ) ) {
            $this->response->setContent( [
                'message' => esc_html__( 'You cannot do this.' ),
            ] )->json();
        }
    }

}
