<?php

namespace SMTH\Modules\HooksDisplay\Utils;

/**
 * Class HookRenderer
 * @package SMTH\Modules\HooksDisplay\Utils
 */
class HookAnalyzer
{

    /**
     * @var string
     */
    protected $tag = '';

    /**
     * HookRenderer constructor.
     *
     * @param string $tag
     */
    public function __construct( string $tag )
    {
        $this->tag = $tag;
    }

    /**
     * @return HookDetails
     */
    public function getTagAttributes(): HookDetails
    {
        // :/
        global $wp_actions;

        $attributes = [
            'ID'   => $this->tag,
            'type' => isset( $wp_actions[ $this->tag ] ) ? 'action' : 'filter',
        ];
        $attributes += $this->getHookLocationWithArgs();

        return new HookDetails( $attributes );
    }

    /**
     * @return array
     */
    protected function getHookLocationWithArgs(): array
    {
        $trace = debug_backtrace();

        /*
         * 0 - self::getTagAttributes
         * 1 - Place in which this class was called
         * 2 - ^ hook of from this place
         * 3 - WP Core file
         * 4 - WP Core file
         * 5- File in which hook is placed
         * */
        $hookTrace = $trace[ 5 ];
        $args      = $hookTrace[ 'args' ];

        array_shift( $args );

        $args = array_map( function ( $arg ) {
            return $this->mapArg( $arg );
        }, $args );

        return [
            'location' => sprintf( '%s:%s', $hookTrace[ 'file' ], $hookTrace[ 'line' ] ),
            'args'     => $args,
        ];
    }

    /**
     * Maps hook argument into readable format
     *
     * @param $arg
     *
     * @return false|mixed|string
     */
    protected function mapArg( $arg )
    {
        if ( is_object( $arg ) ) {
            return get_class( $arg );
        }

        $value = is_array( $arg ) ? json_encode( $arg ) : $arg;

        return gettype( $value );
    }

}
