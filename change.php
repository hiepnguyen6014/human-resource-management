<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div class="change-password">
        <div class="change-password__container">
            <img src="/images/black_logo.webp" alt="logo" width="200px">
            <form action="" method="post" class="change-password__container__form">
                <p class="change-password__container__title">Change Password</p>
                <div class="change-password__container__inputs">
                    <label for="old-password">Old Password</label>
                    <input type="password" name="old-password" id="old-password" placeholder="Old Password" required>
                </div>
                <div class="change-password__container__inputs">
                    <img src="/svgs/done_black.svg" alt="done" class="done-icon disable">
                    <label for="new-password">New password</label>
                    <input type="password" name="new-password" id="new-password" placeholder="New password" required>
                </div>
                <div class="change-password__container__inputs">
                    <img src="/svgs/done_black.svg" alt="done" class="done-icon disable">
                    <label for="confirm-password">Confirm password</label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password"
                        required>
                </div>
                <button type="submit" id="change-password__button" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="/main.js"></script>
</body>