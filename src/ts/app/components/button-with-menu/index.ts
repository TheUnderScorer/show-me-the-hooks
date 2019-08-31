import { toggleButtons } from './selectors';
import toggleButton from './toggleButton';

toggleButtons.forEach( button => button.addEventListener( 'click', toggleButton ) );
