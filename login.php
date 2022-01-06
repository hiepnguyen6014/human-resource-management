<?php
    session_start();
    //check logged in
    if(isset($_SESSION['username'])){
        $type = $_SESSION['type'];
        $active = $_SESSION['active'];
        if ($active == 1) {
            if ($type == 0){
                header("Location: /admin/");
            } else if ($type == 1){
                header("Location: /manager/");
            } else {
                header("Location: /staff/");
            }
        }
        else {
            header("Location: /change.php");
        }
    }

    $error = "";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        //check login

        function checkLogin($username, $password) {
            require 'conn.php';
            $conn = get_connection();

            $sql = "SELECT username FROM accounts WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result = $stmt->get_result(); 
            
            global $error;
            if ($result->num_rows == 1) {
                //check password
                $sql = "SELECT password, active, account_type FROM accounts WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                
                $result = $stmt->get_result();
                $account = $result->fetch_assoc();
                if (password_verify($password, $account['password'])) {
                    $error = "";
                    $_SESSION['username'] = $username;
                    $_SESSION['type'] = $account['account_type'];
                    $_SESSION['active'] = $account['active'];
                    if ($account['active'] == 1) {
                        header("Location: /");
                    }
                    else {
                        header("Location: /change.php");
                    }
                }
                else {
                    $error = "Tài khoản không chính xác";
                }
            }
            else {
                $error = "Tài khoản không chính xác";
                //show error
            }
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        checkLogin($username, $password);
    }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="/favi.ico" type="image/x-icon">

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
            <form class="login__container__form" method="POST" action="/login.php">
                <img class="login__container__image" src="images/white_logo.webp" alt="logo">
                <div class="login__container__inputs">
                    <div class="login__container__input">
                        <input class="input__container__text" type="text" required name="username" id="username"
                            placeholder="Tên đăng nhập">
                    </div>
                    <div class="login__container__input">
                        <input class="input__container__text" type="password" required name="password" id="password"
                            placeholder="Mật khẩu">
                    </div>
                </div>
                <p class="login__container__failed"><?= $error ?>
                </p>
                <button class="login__container__button">ĐĂNG NHẬP</button>
            </form>
        </div>
    </div>
    <!-- javascript -->
    <script src="/main.js"></script>
</body>

</html>