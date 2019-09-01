const onPageLoad = (): void =>
{
    const promises = [
        import('./app/hooks'),
        import('./app/components/button-with-menu'),
    ];

    Promise.all( promises ).then( () =>
    {
        console.log( 'SMTH Loaded!' );
    } )
};

window.addEventListener( 'DOMContentLoaded', onPageLoad );
