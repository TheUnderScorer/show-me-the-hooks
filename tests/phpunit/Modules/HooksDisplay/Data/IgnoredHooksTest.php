<?php

namespace SMTH\Tests\Modules\HooksDisplay\Data;

use SMTH\Modules\HooksDisplay\Data\IgnoredHooks;
use UnderScorer\Core\Tests\TestCase;

/**
 * Class IgnoredHooksTest
 * @package SMTH\Tests\Modules\HooksDisplay\Data
 */
final class IgnoredHooksTest extends TestCase
{

    /**
     * @return void
     */
    public function testIsIgnored()
    {
        $ignoredHook         = 'wp_title';
        $ignoredVariableHook = 'smth_image_link';

        $availableHook = 'my_hook';

        $this->assertTrue(
            IgnoredHooks::isIgnored( $ignoredHook )
        );

        $this->assertTrue(
            IgnoredHooks::isIgnored( $ignoredVariableHook )
        );

        $this->assertFalse(
            IgnoredHooks::isIgnored( $availableHook )
        );
    }
}
