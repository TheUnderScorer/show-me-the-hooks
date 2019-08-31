import { hooks } from './selectors';

export default ( event: Event ): void =>
{
    const target = event.currentTarget as HTMLInputElement;

    filterHooks( target.value );
}

export const filterHooks = ( filter: string ): void =>
{
    if ( !filter ) {
        hooks.forEach( hook => hook.classList.remove( 'smth-filtered' ) );
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
};
