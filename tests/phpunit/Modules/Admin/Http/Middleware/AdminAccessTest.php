<?php

namespace SMTH\Tests\Modules\Admin\Http\Middleware;

use SMTH\Modules\Admin\Http\Middleware\AdminAccess;
use UnderScorer\Core\Tests\Mock\Http\MockResponse;
use UnderScorer\Core\Tests\TestCase;

final class AdminAccessTest extends TestCase
{

    public function testHandle()
    {
        $middleware = self::$app->make( AdminAccess::class );
        $response   = new MockResponse();
    }
}
