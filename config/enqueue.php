<?php

use UnderScorer\Core\Enqueue;

/**
 * @var Enqueue $enqueue
 */

// TODO Enqueue only when hooks are visible

$enqueue->enqueueScript( [
    'slug'     => 'smth-styles',
    'fileName' => 'smth-styles',
] );

$enqueue->enqueueScript( [
    'fileName' => 'smth-app',
    'slug'     => 'smth-main-script',
    'inFooter' => true,
] );
