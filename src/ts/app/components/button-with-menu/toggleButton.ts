import ElementEvent from '../../types/ElementEvent';

export default ( event: ElementEvent<HTMLButtonElement> ): void =>
{
    const button = event.currentTarget;
    const parent = button.parentElement.parentElement;

    parent.classList.toggle( 'smth-active' );
}
