import { hooks } from '../../hooks/selectors';

export default (): void =>
{
    const hooksGroups: HTMLUListElement[] = [];

    const event = new CustomEvent<HTMLUListElement[]>( 'smth.hooksGroups.created', {
        detail: hooksGroups
    } );

    hooks.forEach( hook =>
    {
        const { parentElement } = hook;

        const childHooks = parentElement.querySelectorAll<HTMLDivElement>( '> .smth-hook' );

        // If parent contains only one hook don't group it
        if ( childHooks.length < 2 ) {
            return;
        }

        const hooksGroup = groupHooksInParent(
            Array.from( childHooks ),
            parentElement
        );

        hooksGroups.push( hooksGroup );
    } );

    document.dispatchEvent( event );
}

const groupHooksInParent = ( hooks: HTMLDivElement[], parent: HTMLElement ): HTMLUListElement =>
{
    const hooksGroupEl = createHooksGroupEl();
    const event = new CustomEvent<HTMLUListElement>( 'smth.hooksGroup.created', {
        detail: hooksGroupEl
    } );

    hooks.forEach( hook =>
    {
        const listItem = createHookListElement();

        listItem.appendChild( hook );
        hooksGroupEl.appendChild( listItem );
    } );

    parent.appendChild( hooksGroupEl );
    document.dispatchEvent( event );

    return hooksGroupEl;
};

const createHooksGroupEl = (): HTMLUListElement =>
{
    const hooksGroupEl = document.createElement( 'ul' );
    hooksGroupEl.classList.add( 'smth-hooks-group' );

    return hooksGroupEl;
};

const createHookListElement = (): HTMLLIElement =>
{
    const listItem = document.createElement( 'li' );
    listItem.classList.add( 'smth-hooks-group__item' );

    return listItem;
};
