<?php

namespace SMTH\Modules\HooksDisplay\Utils;

use UnderScorer\Core\Models\SimpleModel;
use UnderScorer\Core\Utility\AttributeBuilder;

/**
 * Class HookDetails
 * @package SMTH\Modules\HooksDisplay\Utils
 */
class HookDetails extends SimpleModel
{

    use AttributeBuilder;

    /**
     * @var string
     */
    protected $tag = '';

    /**
     * @var array
     */
    protected $args = [];

    /**
     * @var string
     */
    protected $type = '';

    /**
     * @var string
     */
    protected $location = '';

    /**
     * HookDetails constructor.
     *
     * @param array $attributes
     */
    public function __construct( array $attributes = [] )
    {
        $this->parseAttributes( $attributes );
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     *
     * @return self
     */
    public function setTag( string $tag ): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return array
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * @param array $args
     *
     * @return self
     */
    public function setArgs( array $args ): self
    {
        $this->args = $args;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType( string $type ): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     *
     * @return self
     */
    public function setLocation( string $location ): self
    {
        $this->location = $location;

        return $this;
    }

}
