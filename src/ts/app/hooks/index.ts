import { hooks, hooksFilterInput, hooksToggle } from './selectors';
import toggleHookDetails from './toggleHookDetails';
import toggleVisibility from './toggleVisibility';
import handleSearch from './handleSearch';

hooks.forEach( hook =>
    hook.querySelector( '.smth-activator' ).addEventListener( 'click', toggleHookDetails )
);

hooksToggle.addEventListener( 'click', toggleVisibility );
hooksFilterInput.addEventListener( 'keyup', handleSearch );

