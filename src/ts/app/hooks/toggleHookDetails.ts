import ElementEvent from '../types/ElementEvent';

export default ( event: ElementEvent<HTMLButtonElement> ) =>
{
    const activatorBtn = event.currentTarget;
    const { parentElement } = activatorBtn;
    const list = parentElement.querySelector( '.smth-hook-details' );

    parentElement.classList.toggle( 'smth-open' );
    list.classList.toggle( 'smth-hidden' );
}
