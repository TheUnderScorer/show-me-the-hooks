<?php

namespace SMTH\Tests\Modules\HooksDisplay\Hooks\Controllers;

use SMTH\Modules\HooksDisplay\Hooks\Controllers\RenderHooksHandler;
use UnderScorer\Core\Http\Request;
use UnderScorer\Core\Tests\TestCase;

/**
 * Class RenderHooksHandlerTest
 * @package SMTH\Tests\Modules\HooksDisplay\Hooks\Controllers
 */
class RenderHooksHandlerTest extends TestCase
{

    /**
     * @covers RenderHooksHandler::handle()
     */
    public function testHandle(): void
    {
        $this->login('administrator');

        $controller = self::$app->make( RenderHooksHandler::class );
        $request    = new Request();
        $request->query->set( 'smth', true );

        $controller->setRequest( $request );

        do_action( 'wp' );

        ob_start();
        do_action( 'my_hook' );

        $output = ob_get_clean();

        $this->assertContains('my_hook', $output);
    }

    /**
     * @covers RenderHooksHandler::handle()
     */
    public function testIsNotDisplayingHooksForRegularUsers(): void
    {
        $this->login( 'editor' );

        $controller = self::$app->make( RenderHooksHandler::class );
        $request    = new Request();
        $request->query->set( 'smth', true );

        $controller->setRequest( $request );

        do_action( 'wp' );

        ob_start();
        do_action( 'my_hook' );

        $output = ob_get_clean();

        $this->assertNotContains( 'my_hook', $output );
    }
}
