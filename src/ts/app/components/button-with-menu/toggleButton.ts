export default ( event: Event ): void =>
{
    const button = event.currentTarget as HTMLButtonElement;
    const parent = button.parentElement.parentElement;

    parent.classList.toggle( 'smth-active' );
}
