import { showHooks, toggleHooks } from './utils/visibility';
import { hooksToggle } from './selectors';

const localStorageState = localStorage.getItem( 'smth_hooks_state' );
const defaultState = {
    hooksHidden: true
};

export const state = localStorageState ? JSON.parse( localStorageState ) : { ...defaultState };

export default ( event: Event ) =>
{
    const btn = event.currentTarget as HTMLButtonElement;

    toggleHooks();

    state.hooksHidden = !state.hooksHidden;

    changeLabel( btn );
    handleLocalStorage();
}

const handleLocalStorage = (): void =>
{
    localStorage.setItem( 'smth_hooks_state', JSON.stringify( state ) );
};

const changeLabel = ( button: HTMLButtonElement ): void =>
{
    const text = button.querySelector( '.smth-button-text' );

    state.hooksHidden ?
        text.textContent = 'Show hooks' :
        text.textContent = 'Hide hooks'
};


if ( !state.hooksHidden ) {
    showHooks();
    changeLabel( hooksToggle );
}
