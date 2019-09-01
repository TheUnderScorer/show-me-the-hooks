import { hooks } from '../selectors';

export const toggleHooks = (): void =>
{
    hooks.forEach( hook => hook.classList.toggle( 'smth-hidden' ) )
};

export const showHooks = (): void =>
{
    hooks.forEach( hook => hook.classList.remove( 'smth-hidden' ) )
};

export const hideHooks = (): void =>
{
    hooks.forEach( hook => hook.classList.add( 'smth-hidden' ) )
};
