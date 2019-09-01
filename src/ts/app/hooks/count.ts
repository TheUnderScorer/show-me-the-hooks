import { hooks } from './selectors';

export const getVisibleHooksCount = (): number =>
{
    return hooks
        .filter( hook =>
            !hook.classList.contains( 'smth-filtered' )
        )
        .length;
};
