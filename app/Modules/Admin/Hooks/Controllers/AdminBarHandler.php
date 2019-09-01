<?php

namespace SMTH\Modules\Admin\Hooks\Controllers;

use UnderScorer\Core\Hooks\Controllers\Controller;
use WP_Admin_Bar as AdminBar;

/**
 * Class AdminBarHandler
 * @package SMTH\Modules\Admin\Hooks\Controllers
 * @deprecated Not needed right now
 */
class AdminBarHandler extends Controller
{

    /**
     * @param AdminBar $adminBar
     */
    public function handle( AdminBar $adminBar ): void
    {
        if ( is_admin() ||
             ! current_user_can( 'administrator' ) ||
             $this->request->query->has( 'smth' )
        ) {
            return;
        }

        $adminBar->add_node( [
            'id'    => 'smth_activator',
            'title' => esc_html__( 'Show me the hooks.', 'smth' ),
            'href'  => add_query_arg( 'smth', '1' ),
        ] );
    }

    /**
     * Performs controller setup
     *
     * @return void
     */
    protected function setup(): void
    {
        add_action( 'admin_bar_menu', [ $this, 'handle' ], 20 );
    }
}
