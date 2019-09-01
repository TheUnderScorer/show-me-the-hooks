<?php

namespace SMTH\Tests\Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use SMTH\Modules\Admin\Http\Controllers\SaveSettingsController;
use UnderScorer\Core\Http\Request;
use UnderScorer\Core\Tests\Mock\Http\MockResponse;
use UnderScorer\Core\Tests\TestCase;

/**
 * Class SaveSettingsControllerTest
 * @package SMTH\Tests\Modules\Admin\Http\Controllers
 */
final class SaveSettingsControllerTest extends TestCase
{

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->login( 'administrator' );
    }

    /**
     * @throws BindingResolutionException
     * @covers SaveSettingsController::handle()
     */
    public function testHandle(): void
    {
        $request    = new Request();
        $response   = new MockResponse();
        $controller = self::$app->make( SaveSettingsController::class );

        $request->request->set( 'tr', [
            'smthSettings' => [
                'use_wp_hooks' => '1',
            ],
        ] );
        $controller->setRequest( $request )->setResponse( $response )->handle();

        $setting = self::$app->getSetting( 'settings' );

        $this->assertEquals( $setting[ 'use_wp_hooks' ], '1' );
    }

}
