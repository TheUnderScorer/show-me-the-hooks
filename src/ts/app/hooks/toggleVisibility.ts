import { showHooks, toggleHooks } from './utils/visibility';
import { hooksToggle } from './selectors';
import HooksState from '../types/HooksState';
import ElementEvent from '../types/ElementEvent';
import { getVisibleHooksCount } from './count';

const localStorageState = localStorage.getItem( 'smth_hooks_state' );
const defaultState: HooksState = {
    hooksHidden: true
};

export const state: HooksState = localStorageState ? JSON.parse( localStorageState ) : { ...defaultState };

export default ( event: ElementEvent<HTMLButtonElement> ) =>
{
    const btn = event.currentTarget;

    toggleHooks();

    state.hooksHidden = !state.hooksHidden;

    changeLabel( btn );
    handleLocalStorage();
}

const handleLocalStorage = (): void =>
{
    localStorage.setItem( 'smth_hooks_state', JSON.stringify( state ) );
};

export const changeLabel = ( button: HTMLButtonElement ): void =>
{
    const text = button.querySelector( '.smth-button-text' );

    let label: string;

    state.hooksHidden ?
        label = 'Show hooks' :
        label = 'Hide hooks';

    text.textContent = `${ label } (${ getVisibleHooksCount() })`;
};


const init = (): void =>
{
    if ( !state.hooksHidden ) {
        showHooks();
    }

    changeLabel( hooksToggle );

    document.addEventListener( 'smth.hooks.filtered', () => changeLabel( hooksToggle ) );
};
init();
