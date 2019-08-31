<?php

namespace SMTH\Modules\HooksDisplay\Hooks\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Str;
use SMTH\Modules\HooksDisplay\Data\IgnoredHooks;
use SMTH\Modules\HooksDisplay\Utils\HookAnalyzer;
use UnderScorer\Core\Hooks\Controllers\Controller;
use UnderScorer\Core\Utility\Arr;

/**
 * Class RenderHooksHandler
 * @package SMTH\Modules\HooksDisplay\Hooks\Controllers
 */
class RenderHooksHandler extends Controller
{

    /**
     * @var array
     */
    protected $settings = [];

    /**
     * @return void
     */
    public function handle(): void
    {
        if ( ! current_user_can( 'administrator' ) ) {
            return;
        }

        $this->settings = Arr::make( $this->app->getSetting( 'settings' ) );

        add_action( 'all', [ $this, 'handleHook' ] );
        add_action( 'wp_footer', [ $this, 'renderToggle' ] );
    }

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function renderToggle(): void
    {
        echo $this->render( 'hook-toggle' );
    }

    /**
     * @param string $tag
     *
     * @throws BindingResolutionException
     */
    public function handleHook( string $tag ): void
    {
        if ( Str::contains( $tag, [ 'smth', 'wpk' ] ) ||
             ( empty( $this->settings[ 'use_wp_hooks' ] ) && IgnoredHooks::isIgnored( $tag ) )
        ) {
            return;
        }

        /**
         * @var HookAnalyzer $renderer
         */
        $renderer = $this->app->make( HookAnalyzer::class, [
            'tag' => $tag,
        ] );

        $attributes = $renderer->getTagAttributes();

        echo $this->render( 'hook', [
            'tag'  => $tag,
            'hook' => $attributes,
        ] );
    }

    /**
     * Performs controller setup
     *
     * @return void
     */
    protected function setup(): void
    {
        add_action( 'wp', [ $this, 'handle' ] );
    }
}
