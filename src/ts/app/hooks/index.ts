import { hooks, hooksToggle } from './selectors';
import toggleHookDetails from './toggleHookDetails';
import toggleVisibility from './toggleVisibility';

hooks.forEach( hook =>
    hook.querySelector( '.smth-activator' ).addEventListener( 'click', toggleHookDetails )
);

hooksToggle.addEventListener( 'click', toggleVisibility );
