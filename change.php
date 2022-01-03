<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $active = $_SESSION['active'];
        if ($active == 1) {
            header("Location: /");
        }
        else {
            if (isset($_POST['new_password'])) {
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];
                
                $username = $_SESSION['username'];
                if ($new_password == $confirm_password && $new_password != $username) {
                    require 'conn.php';
                    $conn = get_connection();
                    $sql = "UPDATE accounts SET password = ? WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $hash = password_hash($new_password, PASSWORD_BCRYPT);
                    $stmt->bind_param("ss", $hash, $username);
                    $stmt->execute();

                    if ($stmt->affected_rows == 1) {
                        $sql = "UPDATE accounts SET active = 1 WHERE username = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $_SESSION['active'] = 1;
                        header("Location: /");
                    }
                    else {
                        header("Location: /change.php");
                    }
                }
            }
        }
    }
    else {
        header("Location: /");
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi mật khẩu mặc định</title>
    <link rel="shortcut icon" href="/favi.ico" type="image/x-icon">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="change-password">
        <a href="/logout.php" class="logout-change-btn">Đăng xuất</a>
        <div class="change-password__container">
            <img src="/images/black_logo.webp" alt="logo" width="200px">
            <form action="/change.php" method="post" class="change-password__container__form">
                <p class="change-password__container__title">Đổi mật khẩu</p>
                <div class="change-password__container__inputs">
                    <i class="fas fa-check icon-password" id="check1" style="display: none;"></i>
                    <label for="new-password">Mật khẩu mới</label>
                    <input type="password" name="new_password" id="new-password" placeholder="Mật khẩu mới" required>
                </div>
                <div class="change-password__container__inputs">
                    <i class="fas fa-check icon-password" id="check2" style="display: none;"></i>
                    <label for="confirm-password">Nhập lại mật khẩu</label>
                    <input type="password" name="confirm_password" id="confirm-password" placeholder="Nhập lại mật khẩu"
                        required>
                </div>
                <button type="submit" id="change-password__button" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="/main.js"></script>
</body>