<?php

namespace SMTH\Modules\Admin;

use SMTH\Modules\Admin\Hooks\Controllers\AdminBarHandler;
use UnderScorer\Core\Module;

/**
 * Class AdminModule
 * @package SMTH\Modules\Admin
 */
class AdminModule extends Module
{

    /**
     * @var array
     */
    protected $controllers = [
        AdminBarHandler::class,
    ];

    /**
     * Performs module bootstrap
     *
     * @return void
     */
    protected function bootstrap(): void
    {
        $menu  = $this->menu;
        $title = esc_html__( 'Show Me The Hooks', 'smth' );

        $menu
            ->setSlug( 'smth_menu' )
            ->setMenuTitle( $title )
            ->setPageTitle( $title )
            ->setCallback( function () {
                $this->renderOptions();
            } );
    }

    /**
     * @return void
     */
    protected function renderOptions(): void
    {
        $form = tr_form();
        $form
            ->setGroup( 'smthSettings' )
            ->useUrl( 'POST', '/smth/config' )
            ->useAjax();

        echo $form->open();

        echo $form->row(
            $form->column(
                $form
                    ->checkbox( 'use_wp_hooks' )
                    ->setLabel( '' )
                    ->setText( 'Display hooks from WordPress core (not recommended).' ),
                )
        )->setTitle( 'General' );

        echo '<br>';

        echo $form->close( 'Save' );

    }
}
