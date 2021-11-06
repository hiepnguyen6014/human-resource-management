<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">

    <!-- font-link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600&display=swap" rel="stylesheet">

    <!-- css  -->
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div class="login">
        <div class="login__container">
            <form class="login__container__form" method="POST">
                <img class="login__container__image" src="images/white_logo.webp" alt="logo">
                <div class="login__container__inputs">
                    <div class="login__container__input">
                        <input class="input__container__text" type="text" required name="username" id="username"
                            placeholder="Username">
                    </div>
                    <div class="login__container__input">
                        <input class="input__container__text" type="password" required name="password" id="password"
                            placeholder="Password">
                    </div>
                </div>
                <p class="login__container__failed">Wrong password</p>
                <button class="login__container__button">CONTINUE</button>
            </form>
        </div>
    </div>
    <!-- javascript -->
    <script src="/main.js"></script>
</body>

</html>