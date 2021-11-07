<?php
    session_start();
    if(!isset($_SESSION['username']) || !isset($_SESSION['type'])){
        header("Location: login.php");
    }

    $type = $_SESSION['type'];
    if($type != 3){
        header("Location: login.php");
    }
  
    $username = $_SESSION['username'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/style.css">

    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">
</head>

<body>
    <div class="employee">
        <nav class="employee__navigation navigation">
            <div class="navigation__logo">
                <a href="/">
                    <img class="navigation__logo-image" src="images/white_logo.png" alt="logo">
                </a>
            </div>

            <ul class="navigation__items">
                <li class="navigation__item">
                    <a href="#" class="active">
                        <i class="task-icon icon"></i>
                        <span class="navigation__item__text">Nhiệm vụ</span>
                    </a>
                </li>
                <li class="navigation__item">
                    <a href="#">
                        <i class="support-icon icon"></i>
                        <span class="navigation__item__text">Xin nghỉ</span>
                    </a>
                </li>
            </ul>
            <div class="navigation__logout" id="logout">
                <i class="logout-icon"></i>
                <span>Đăng xuất</span>
            </div>
        </nav>
        <div class="container">
            <header class="container__header">
                <div class="container__header__search">
                    <i class="search-icon"></i>
                    <input type="text" class="container__header__search-input" placeholder="Tìm kiếm">
                </div>
                <div class="container__header__profile">
                    <div class="container__header__profile-image">
                        <img id="profile-view" src="images/background_login.webp" alt="profile">
                    </div>
                    <div class="container__header__profile-name">
                        <span>Roberto Carlos</span>
                    </div>
                    <div class="container__header__profile-notify">
                        <span class="notify-number active">1</span>
                        <i class="notify-icon icon"></i>

                        <ul class="notify__items">
                            <li class="notify__item">
                                <a href="#">
                                    <div class="notify__item-image">
                                        <img src="images/background_login.jpg" alt="profile">
                                    </div>
                                    <div class="notify__item-name">
                                        <span class="notify__item-content"><b class="notify__item-sender">Nguyễn Văn
                                                A</b> orem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                                            cumque odit quis itaque, provident consectetur illum modi obcaecati
                                            recusandae, alias doloribus sed minima sint, eum explicabo. Magni pariatur
                                            sit nam?</span>
                                        <p class="notify__item-time">10:00 31/10</p>
                                    </div>
                                </a>
                            </li>
                            <li class="notify__item">
                                <a href="#">
                                    <div class="notify__item-image">
                                        <img src="images/background_login.jpg" alt="profile">
                                    </div>
                                    <div class="notify__item-name">
                                        <span class="notify__item-content"><b class="notify__item-sender">Nguyễn Văn
                                                A</b> orem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                                            cumque odit quis itaque, provident consectetur illum modi obcaecati
                                            recusandae, alias doloribus sed minima sint, eum explicabo. Magni pariatur
                                            sit nam?</span>
                                        <p class="notify__item-time">10:00 31/10</p>
                                    </div>
                                </a>
                            </li>
                            <li class="notify__item">
                                <a href="#">
                                    <div class="notify__item-image">
                                        <img src="images/background_login.jpg" alt="profile">
                                    </div>
                                    <div class="notify__item-name">
                                        <span class="notify__item-content"><b class="notify__item-sender">Nguyễn Văn
                                                A</b> orem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                                            cumque odit quis itaque, provident consectetur illum modi obcaecati
                                            recusandae, alias doloribus sed minima sint, eum explicabo. Magni pariatur
                                            sit nam?</span>
                                        <p class="notify__item-time">10:00 31/10</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <div class="employee__body body">
                <div class="section task-space show">
                    <div class="section-header space__header">
                        <span class="space__header-title">Nhiệm vụ</span>
                    </div>
                    <div class="space__body">
                        <div class="space__body-table">
                            <div class="table__thead">
                                <div class="task-table__thead task-table__thead0">
                                    <span>STT</span>
                                </div>
                                <div class="task-table__thead task-table__thead1">
                                    <span>Ngày giao</span>
                                </div>
                                <div class="task-table__thead task-table__thead2">
                                    <span>Hạn chót</span>
                                </div>
                                <div class="task-table__thead task-table__thead3">
                                    <span>Tiêu đề</span>
                                </div>
                                <div class="task-table__thead task-table__thead4">
                                    <span>Trạng thái</span>
                                </div>
                            </div>
                            <div class="table__tbody" id="task-tbody">
                                <!-- <div data-id="id" onclick="viewTask(this)" class="row-tbody task">
                                     <div class="task-table__tbody0">
                                        <span>1</span>
                                    </div>
                                    <div class="task-table__tbody1">
                                        <span>12/2/2021</span>
                                    </div>
                                    <div class="task-table__tbody2">
                                        <span>15/2/2021</span>
                                    </div>
                                    <div class="task-table__tbody3">
                                        <span>nhan dien khuan mat</span>
                                    </div>
                                    <div class="task-table__tbody4">
                                        <span>waiting</span>
                                    </div>
                                </div> -->
                                <!-- <?php
                                    /* require 'api/connection.php';

                                    $sql = "SELECT `id`, `title`, `startDate`, `endDate`, `status` FROM `task`";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while($row = $result->fetch_assoc()) {
                                            $id = $row["id"];
                                            $start_day = $row["startDate"];
                                            $row["endDate"];
                                            $row["title"];
                                            $row["status"];
                                            $html = '<div data-id="$id" onclick="viewTask($id)" class="row-tbody task">';
                                            echo $html;
                                                <div class="task-table__tbody0">
                                                    <span>$i</span>
                                                </div>
                                                <div class="task-table__tbody1">
                                                    <span>$start_day</span>
                                                </div>
                                                <div class="task-table__tbody2">
                                                    <span></span>
                                                </div>
                                                <div class="task-table__tbody3">
                                                    <span></span>
                                                </div>
                                                <div class="task-table__tbody4">
                                                    <span></span>
                                                </div>
                                            </div>`;
                                            $i++;
                                        }
                                    }
                                    $conn->close(); */

                                ?> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section off-space">
                    <div class="section-header space__header">
                        <span class="space__header-title">Xin nghỉ</span>
                        <i class="add-icon" id="add-off"></i>
                    </div>
                    <div class="space__body">
                        <div class="space__body-table">
                            <div class="table__thead">
                                <div class="off-table__thead off-table__thead0">
                                    <span>STT</span>
                                </div>
                                <div class="off-table__thead off-table__thead1">
                                    <span>Thời gian</span>
                                </div>
                                <div class="off-table__thead off-table__thead2">
                                    <span>Ly do</span>
                                </div>
                                <div class="off-table__thead off-table__thead3">
                                    <span>Phản hồi</span>
                                </div>
                                <div class="off-table__thead off-table__thead4">
                                    <span>Tình trạng</span>
                                </div>
                            </div>
                            <div class="table__tbody" id="off-tbody">
                                <div data-id="id" onclick="viewOff(this)" class="row-tbody off">
                                    <div class="off-table__tbody0">
                                        <span>1</span>
                                    </div>
                                    <div class="off-table__tbody1">
                                        <span>12/12/2012</span>
                                    </div>
                                    <div class="off-table__tbody2">
                                        <span>cty nhieu deadline</span>
                                    </div>
                                    <div class="off-table__tbody3">
                                        <span>cty nhieu deadline</span>
                                    </div>
                                    <div class="off-table__tbody4">
                                        <span>Không đồng ý</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="profile-view view">
        <div class="profile-view__space view-space">
            <div class="view__body">
                <div class="profile-view__img">
                    <span>ID:</span>
                    <span>51900743</span>
                </div>
                <div class="profile-view__id">
                    <span>ID:</span>
                    <span>51900743</span>
                </div>
                <div class="profile-view__office">
                    <span>Phòng ban:</span>
                    <span>Kế toán</span>
                </div>
                <div class="profile-view__position">
                    <span>Vị trí:</span>
                    <span>Nhân viên</span>
                </div>
            </div>
            <div class="view__action">
                <button id="save-profile">Luu</button>
                <button id="cancel-profile" class="btn btn-primary">Thoat</button>
            </div>
        </div>
    </div>

    <div class="task-view view">
        <div class="task-view__space view-task-space">
            <div class="view__body">
                <div class="task-view__image">
                    <img src="/"></img>
                </div>
                <div class="task-view__id">
                    <span>MSPB:</span>
                    <span>1321231</span>
                </div>
                <div class="task-view__name">
                    <span>Phong ban:</span>
                    <span>ke toan</span>
                </div>
                <div class="task-view__task">
                    <span>truong phong:</span>
                    <span>Kế toán</span>
                    <button class="change-captain">Doi</button>
                </div>
                <div class="task-view__position">
                    <span>so nhan vien:</span>
                    <span>Nhân viên</span>
                </div>
                <div class="task-view__account">
                    <span>mieu:</span>
                    <span>nguyenthilan</span>
                </div>
                <div class="task-view__room">
                    <span>Số phòng:</span>
                    <span>123123</span>
                </div>
            </div>
            <div class="view__action">
                <button id="save-task" class="btn btn-primary">Luu</button>
                <button id="cancel-task" class="btn btn-primary">Thoat</button>
            </div>
        </div>
    </div>

    <div class="off-view view">
        <div class="off-view__space view-space">
            <div class="view__body">
                <div class="off-view__image">
                    <img src="/"></img>
                </div>
                <div class="off-view__id">
                    <span>MSPB:</span>
                    <span>1321231</span>
                </div>
                <div class="off-view__name">
                    <span>Phong ban:</span>
                    <span>ke toan</span>
                </div>
                <div class="off-view__off">
                    <span>truong phong:</span>
                    <span>Kế toán</span>
                </div>
                <div class="off-view__position">
                    <span>so nhan vien:</span>
                    <span>Nhân viên</span>
                </div>
                <div class="off-view__account">
                    <span>mieu:</span>
                    <span>nguyenthilan</span>
                </div>
                <div class="off-view__room">
                    <span>Số phòng:</span>
                    <span>123123</span>
                </div>
                <div class="view__action">
                    <button id="save-off" class="btn btn-primary">Luu</button>
                    <button id="cancel-off" class="btn btn-primary">Thoat</button>
                </div>
            </div>
        </div>
    </div>

    <div class="off-new view">
        <div class="off-new__space view-space">
            <div class="view__body">
                <div class="off-new__image">
                    <img src="/"></img>
                </div>
                <div class="off-new__id">
                    <span>MSNV:</span>
                    <span>1321231</span>
                </div>
                <div class="off-new__name">
                    <span>Tên:</span>
                    <span> Thi Lan</span>
                </div>
                <div class="off-new__off">
                    <span>Phòng ban:</span>
                    <span>Kế toán</span>
                </div>
                <div class="off-new__position">
                    <span>Chức vụ:</span>
                    <span>Nhân viên</span>
                </div>
                <div class="off-new__account">
                    <span>Tài khoản:</span>
                    <span>nguyenthilan</span>
                </div>
                <div class="off-new__room">
                    <span>Số phòng:</span>
                    <span>123123</span>
                </div>
                <div class="off-new__reset">
                    <span>Password:</span>
                    <button>Reset</button>
                </div>
            </div>
            <div class="view__action">
                <button id="save-new-off" class="btn btn-primary">Luu</button>
                <button id="cancel-new-off" class="btn btn-primary">Thoat</button>
            </div>
        </div>
    </div>

    <script src="/main.js"></script>
</body>