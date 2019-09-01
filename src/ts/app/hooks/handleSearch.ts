import { hooks } from './selectors';
import ElementEvent from '../types/ElementEvent';

export default ( event: ElementEvent<HTMLInputElement> ): void =>
{
    const { currentTarget } = event;

    filterHooks( currentTarget.value );
}

export const filterHooks = ( filter: string ): void =>
{
    const event = new CustomEvent( 'smth.hooks.filtered' );

    if ( !filter ) {
        hooks.forEach( hook => hook.classList.remove( 'smth-filtered' ) );

        document.dispatchEvent( event );

        return;
    }

    const filterLower = filter.toLowerCase();

    hooks.forEach( hook =>
    {
        const tagEl = hook.querySelector( '.smth-tag' );

        if ( !tagEl.textContent.toLowerCase().includes( filterLower ) ) {
            hook.classList.add( 'smth-filtered' );
        } else {
            hook.classList.remove( 'smth-filtered' );
        }
    } );

    document.dispatchEvent( event );
};
