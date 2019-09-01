<?php

namespace SMTH\Tests\Modules\Admin\Hooks\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use SMTH\Modules\Admin\Hooks\Controllers\AdminBarHandler;
use UnderScorer\Core\Tests\TestCase;
use WP_Admin_Bar as AdminBar;

/**
 * Class AdminBarHandlerTest
 * @package SMTH\Tests\Modules\Admin\Hooks\Controllers
 */
final class AdminBarHandlerTest extends TestCase
{

    /**
     * @var AdminBarHandler
     */
    protected $controller;

    /**
     * @throws BindingResolutionException
     */
    public function setUp()
    {
        parent::setUp();

        set_current_screen( 'front' );

        do_action( 'init' );
        require_once ABSPATH . '/wp-includes/class-wp-admin-bar.php';

        $this->controller = self::$app->make( AdminBarHandler::class );
    }

    /**
     * @covers AdminBarHandler::handle()
     */
    public function testHandle(): void
    {
        $this->login( 'administrator' );

        $adminBar = new AdminBar();
        $this->controller->handle( $adminBar );

        $this->assertNotEmpty( $adminBar->get_node( 'smth_activator' ) );
    }

    /**
     * @covers AdminBarHandler::handle()
     */
    public function testIsNotDisplayingInAdmin(): void
    {
        set_current_screen( 'admin' );
        $this->login( 'administrator' );

        $adminBar = new AdminBar();
        $this->controller->handle( $adminBar );

        $this->assertEmpty( $adminBar->get_node( 'smth_activator' ) );
    }

    /**
     * @covers AdminBarHandler::handle()
     */
    public function testIsNotDisplayingForRegularUsers(): void
    {
        $this->login( 'editor' );

        $adminBar = new AdminBar();
        $this->controller->handle( $adminBar );

        $this->assertEmpty( $adminBar->get_node( 'smth_activator' ) );
    }
}
