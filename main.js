window.post = function(url, data) {
    return fetch(url, { method: "POST", body: JSON.stringify(data) });
};
//view password in login.php
(function() {

    const loginInput = document.querySelectorAll('.input__text')
    const submitButton = document.querySelector('.login__button')
    const loginFailed = document.querySelector('.login__failed')

    Array.from(loginInput).forEach(function(e) {
        e.addEventListener('focus', function() {
            loginFailed.style.display = 'none'
        })
    })

    const API_LOGIN = "http://localhost/api/checkAccount.php"

    //0: admin 1:manager 2: employee -1:not 
    submitButton.addEventListener('click', e => {

        e.preventDefault()

        const username = document.querySelector('#username').value
        const password = document.querySelector('#password').value

        let formData = new FormData();
        formData.append('username', username);
        formData.append('password', password);

        fetch(API_LOGIN, {
            // Adding method type
            method: "POST",
            // Adding body or contents to send
            body: formData,
        })

        // Converting to JSON
        .then(response => response.json())

        // Displaying results to console
        .then(response => {
            if (response.status) {
                //0: admin 1:manager 2: employee -1:not
                const typeAccount = response.type
                if (typeAccount == 0) {
                    location.href = "/admin.php"
                } else if (typeAccount == 1) {
                    location.href = "/manager.php"
                } else if (typeAccount == 2) {
                    location.href = "/employee.php"
                }

            } else {
                loginFailed.style.display = 'block'
            }
        });

    })


})();