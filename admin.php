<?php
    session_start();
    if(!isset($_SESSION['username']) || !isset($_SESSION['type'])){
        header("Location: login.php");
    }

    $type = $_SESSION['type'];
    if($type != 1){
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
    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">

    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div class="admin">
        <nav class="admin__navigation navigation">
            <div class="navigation__logo">
                <a href="/">
                    <img class="navigation__logo-image" src="/images/white_logo.webp" alt="logo">
                </a>
            </div>
            <ul class="navigation__items">
                <li class="navigation__item">
                    <a href="#" class="active">
                        <i class="employee-icon icon"></i>
                        <span class="navigation__item__text">Nhân viên</span>
                    </a>
                </li>
                <li class="navigation__item">
                    <a href="#">
                        <i class="office-icon icon"></i>
                        <span class="navigation__item__text">Phòng ban</span>
                    </a>
                </li>
                <li class="navigation__item">
                    <a href="#">
                        <i class="person-off-icon icon"></i>
                        <span class="navigation__item__text">Nghỉ phép</span>
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
                        <img id="profile-view" src="/images/background_login.webp" alt="profile">
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
                                        <img src="/images/background_login.webp" alt="profile">
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
                                        <img src="/images/background_login.webp" alt="profile">
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
                                        <img src="/images/background_login.webp" alt="profile">
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

            <div class="admin__body body">
                <div class="section employee-space show">
                    <div class="section-header space__header">
                        <span class="space__header-title">Nhân viên</span>
                        <i class="add-employee-icon" id="add-employee"></i>
                    </div>
                    <div class="space__body">
                        <div class="space__body-table">
                            <div class="table__thead">
                                <div class="employee-table__thead employee-table__thead0">
                                    <span>STT</span>
                                </div>
                                <div class="employee-table__thead employee-table__thead1">
                                    <span>MSNV</span>
                                </div>
                                <div class="employee-table__thead employee-table__thead2">
                                    <span>Họ và tên</span>
                                </div>
                                <div class="employee-table__thead employee-table__thead3">
                                    <span>Phòng ban</span>
                                </div>
                                <div class="employee-table__thead employee-table__thead4">
                                    <span>Chức vụ</span>
                                </div>
                                <div class="employee-table__thead employee-table__thead5">
                                    <span>Tài khoản</span>
                                </div>
                            </div>
                            <div class="table__tbody" id="employee-tbody">
                                <div data-id="id" onclick="viewEmployee(this)" class="row-tbody">
                                    <!-- <div class="employee-table__tbody0">
                                        <span>1</span>
                                    </div>
                                    <div class="employee-table__tbody1">
                                        <span>NV1293712983</span>
                                    </div>
                                    <div class="employee-table__tbody2">
                                        <span>Nguyễn Thu Thuỷ</span>
                                    </div>
                                    <div class="employee-table__tbody3">
                                        <span>Marketing</span>
                                    </div>
                                    <div class="employee-table__tbody4">
                                        <span>Nhân viên</span>
                                    </div>
                                    <div class="employee-table__tbody5">
                                        <span>nguyenthuthuy</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section office-space">
                    <div class="section-header space__header">
                        <span class="space__header-title">Phòng ban</span>
                        <i class="add-office-icon" id="add-office"></i>
                    </div>
                    <div class="space__body">
                        <div class="space__body-table">
                            <div class="table__thead">
                                <div class="office-table__thead office-table__thead0">
                                    <span>STT</span>
                                </div>
                                <div class="office-table__thead office-table__thead1">
                                    <span>MSPB</span>
                                </div>
                                <div class="office-table__thead office-table__thead2">
                                    <span>Phòng ban</span>
                                </div>
                                <div class="office-table__thead office-table__thead3">
                                    <span>Trường phòng</span>
                                </div>
                                <div class="office-table__thead office-table__thead4">
                                    <span>Số nhân viên</span>
                                </div>
                            </div>
                            <div class="table__tbody" id="office-tbody">
                                <div data-id="id" onclick="viewOffice(this)" class="row-tbody office">
                                    <div class="office-table__tbody0">
                                        <span>1</span>
                                    </div>
                                    <div class="office-table__tbody1">
                                        <span>QTKD128361</span>
                                    </div>
                                    <div class="office-table__tbody2">
                                        <span>Quản trị kinh doanh</span>
                                    </div>
                                    <div class="office-table__tbody3">
                                        <span>Hồ Văn Ngọc</span>
                                    </div>
                                    <div class="office-table__tbody4">
                                        <span>5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section request-space">
                    <div class="section-header space__header">
                        <span class="space__header-title">Nghỉ phép</span>
                    </div>
                    <div class="space__body">
                        <div class="space__body-table">
                            <div class="table__thead">
                                <div class="request-table__thead request-table__thead0">
                                    <span>STT</span>
                                </div>
                                <div class="request-table__thead request-table__thead1">
                                    <span>MSNV</span>
                                </div>
                                <div class="request-table__thead request-table__thead2">
                                    <span>Họ và tên</span>
                                </div>
                                <div class="request-table__thead request-table__thead3">
                                    <span>Phòng ban</span>
                                </div>
                            </div>
                            <div class="table__tbody" id="request-tbody">
                                <div data-id="id" onclick="viewRequest(this)" class="row-tbody request">
                                    <div class="request-table__tbody0">
                                        <span>1</span>
                                    </div>
                                    <div class="request-table__tbody1">
                                        <span>NV234729837</span>
                                    </div>
                                    <div class="request-table__tbody2">
                                        <span>Trần Ngọc Bích</span>
                                    </div>
                                    <div class="request-table__tbody3">
                                        <span>Công nghệ thông tin </span>
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

    <!-- employee view detail -->
    <div class="employee-view view">
        <div class="employee-view__space view-space">
            <div class="view__body">
                <div class="employee-view__image">
                    <img src="/"></img>
                </div>
                <div class="employee-view__id">
                    <span>MSNV:</span>
                    <span>1321231</span>
                </div>
                <div class="employee-view__name">
                    <span>Tên:</span>
                    <span>Nguyen Thi Lan</span>
                </div>
                <div class="employee-view__office">
                    <span>Phòng ban:</span>
                    <span>Kế toán</span>
                </div>
                <div class="employee-view__position">
                    <span>Chức vụ:</span>
                    <span>Nhân viên</span>
                </div>
                <div class="employee-view__account">
                    <span>Tài khoản:</span>
                    <span>nguyenthilan</span>
                </div>
                <div class="employee-view__room">
                    <span>Số phòng:</span>
                    <span>123123</span>
                </div>
                <div class="employee-view__reset">
                    <span>Password:</span>
                    <button>Reset</button>
                </div>
            </div>
            <div class="view__action">
                <button id="save-employee" class="btn btn-primary">Luu</button>
                <button id="cancel-employee" class="btn btn-primary">Thoat</button>
            </div>
        </div>
    </div>

    <div class="employee-new view">
        <div class="employee-new__space view-space">
            <div class="view__body">
                <div class="employee-new__image">
                    <img src="/"></img>
                </div>
                <div class="employee-new__id">
                    <span>MSNV:</span>
                    <span>1321231</span>
                </div>
                <div class="employee-new__name">
                    <span>Tên:</span>
                    <span>Nguyen Thi Lan</span>
                </div>
                <div class="employee-new__office">
                    <span>Phòng ban:</span>
                    <span>Kế toán</span>
                </div>
                <div class="employee-new__position">
                    <span>Chức vụ:</span>
                    <span>Nhân viên</span>
                </div>
                <div class="employee-new__account">
                    <span>Tài khoản:</span>
                    <span>nguyenthilan</span>
                </div>
                <div class="employee-new__room">
                    <span>Số phòng:</span>
                    <span>123123</span>
                </div>
                <div class="employee-new__reset">
                    <span>Password:</span>
                    <button>Reset</button>
                </div>
            </div>
            <div class="view__action">
                <button id="save-new-employee" class="btn btn-primary">Luu</button>
                <button id="cancel-new-employee" class="btn btn-primary">Thoat</button>
            </div>
        </div>
    </div>

    <!-- office view details -->
    <div class="office-view view">
        <div class="office-view__space view-space">
            <div class="view__body">
                <div class="office-view__image">
                    <img src="/"></img>
                </div>
                <div class="office-view__id">
                    <span>MSPB:</span>
                    <span>1321231</span>
                </div>
                <div class="office-view__name">
                    <span>Phong ban:</span>
                    <span>ke toan</span>
                </div>
                <div class="office-view__office">
                    <span>truong phong:</span>
                    <span>Kế toán</span>
                    <button class="change-captain" onclick="changeCaptainOffice(777)">Doi</button>
                </div>
                <div class="office-view__position">
                    <span>so nhan vien:</span>
                    <span>Nhân viên</span>
                </div>
                <div class="office-view__account">
                    <span>mieu:</span>
                    <span>nguyenthilan</span>
                </div>
                <div class="office-view__room">
                    <span>Số phòng:</span>
                    <span>123123</span>
                </div>
            </div>
            <div class="view__action">
                <button id="save-office" class="btn btn-primary">Luu</button>
                <button id="cancel-office" class="btn btn-primary">Thoat</button>
            </div>
        </div>
    </div>

    <div class="office-new view">
        <div class="office-new__space view-space">
            <div class="view__body">
                <div class="office-new__image">
                    <img src="/"></img>
                </div>
                <div class="office-new__id">
                    <span>MSNV:</span>
                    <span>1321231</span>
                </div>
                <div class="office-new__name">
                    <span>Tên:</span>
                    <span> Thi Lan</span>
                </div>
                <div class="office-new__office">
                    <span>Phòng ban:</span>
                    <span>Kế toán</span>
                </div>
                <div class="office-new__position">
                    <span>Chức vụ:</span>
                    <span>Nhân viên</span>
                </div>
                <div class="office-new__account">
                    <span>Tài khoản:</span>
                    <span>nguyenthilan</span>
                </div>
                <div class="office-new__room">
                    <span>Số phòng:</span>
                    <span>123123</span>
                </div>
                <div class="office-new__reset">
                    <span>Password:</span>
                    <button>Reset</button>
                </div>
            </div>
            <div class="view__action">
                <button id="save-new-office" class="btn btn-primary">Luu</button>
                <button id="cancel-new-office" class="btn btn-primary">Thoat</button>
            </div>
        </div>
    </div>

    <div class="request-view view">
        <div class="request-view__space view-space">
            <div class="view__body">
                <div class="request-view__image">
                    <img src="/"></img>
                </div>
                <div class="request-view__id">
                    <span>MSPB:</span>
                    <span>1321231</span>
                </div>
                <div class="request-view__name">
                    <span>Phong ban:</span>
                    <span>ke toan</span>
                </div>
                <div class="request-view__request">
                    <span>truong phong:</span>
                    <span>Kế toán</span>
                </div>
                <div class="request-view__position">
                    <span>so nhan vien:</span>
                    <span>Nhân viên</span>
                </div>
                <div class="request-view__account">
                    <span>mieu:</span>
                    <span>nguyenthilan</span>
                </div>
                <div class="request-view__room">
                    <span>Số phòng:</span>
                    <span>123123</span>
                </div>
                <div class="view__action">
                    <button id="save-request" class="btn btn-primary">Luu</button>
                    <button id="cancel-request" class="btn btn-primary">Thoat</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/main.js"></script>
</body>