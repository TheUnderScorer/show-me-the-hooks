<?php

namespace WPK\Modules\HooksDisplay\Hooks\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Str;
use UnderScorer\Core\Hooks\Controllers\Controller;
use UnderScorer\Core\Utility\Arr;
use WPK\Modules\HooksDisplay\Data\IgnoredHooks;
use WPK\Modules\HooksDisplay\Utils\HookAnalyzer;

/**
 * Class RenderHooksHandler
 * @package WPK\Modules\HooksDisplay\Hooks\Controllers
 */
class RenderHooksHandler extends Controller
{

    protected $settings = [];

    /**
     * @return void
     */
    public function handle(): void
    {
        if ( ! $this->request->query->has( 'smth' ) ||
             ! current_user_can( 'administrator' )
        ) {
            return;
        }

        $this->settings = Arr::make( $this->app->getSetting( 'settings' ) );

        add_action( 'all', [ $this, 'handleHook' ] );
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
