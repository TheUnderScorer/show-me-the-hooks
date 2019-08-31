<?php
/**
 * @var WPK\Modules\HooksDisplay\Utils\HookDetails $hook
 */
?>
<div class="smth-hook smth-hidden {{ $hook->getType() }}">
    <span class="smth-tag">
        {{ $tag }}
    </span>
    <button class="button button-secondary smth-activator">
        <span>
            ⯈
        </span>
    </button>
    <ul class="smth-hook-details smth-hidden">
        <li class="smth-args">
            <strong>
                Args:
            </strong>
            <span>
                @json($hook->getArgs())
            </span>
        </li>
        <li class="smth-location">
            <strong>
                Location:
            </strong>
            <span>
                {{ $hook->getLocation() }}
            </span>
        </li>
    </ul>
</div>
