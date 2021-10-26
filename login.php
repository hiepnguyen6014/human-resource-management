<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- font-link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600&display=swap" rel="stylesheet">

    <!-- css  -->
    <link rel="stylesheet" href="style.css">
    </head>

<body>
    <div class="login-app">

        <div class="login">

            <div class="login__container">
                <form action="/" class="login__form">
                    <img class="login__image" src="images/logo.png" alt="logo">

                    <div class="login__inputs">
                        <div class="login__input">
                            <input class="input__text" type="text" required name="username" id="username"
                                placeholder="Username">
                        </div>
                        <div class="login__input">

                            <input class="input__text input__password" type="password" required name="password"
                                id="password" placeholder="Password">
                            <img src="svgs/visibility.svg" alt="visibility" class="login__visibility">
                        </div>
                    </div>

                    <button class="login__button" type="submit">CONTINUE</button>
                </form>
            </div>

        </div>
    </div>
    <!-- javascript -->
    <script src="main.js"></script>
</body>
</html>