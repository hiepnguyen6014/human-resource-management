//view password in login.php
(function() {
    const visibility = document.querySelector('.login__visibility')
    const password = document.querySelector('.input__password')


    visibility.addEventListener('mouseenter', () => {
        visibility.setAttribute('src', 'svgs/non-visibility.svg')
        password.setAttribute('type', 'text')
    })

    visibility.addEventListener('mouseleave', () => {
        visibility.setAttribute('src', 'svgs/visibility.svg')
        password.setAttribute('type', 'password')
    })
})();