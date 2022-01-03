<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: /");
    }
    else {
        $type = $_SESSION['type'];
        $active = $_SESSION['active'];

        if ($active != 1) {
            header("Location: /change.php");
        }
        if ($type != 0) {
            header("Location: /");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/style.css" />
    <title>Trang chủ</title>
    <link rel="shortcut icon" href="/favi.ico" type="image/x-icon">
</head>

<body>
    <?php
        require_once "header.php";
    ?>
    <main class="vh-100 d-none" id="staff">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Tìm kiếm..."
                                    id="search-staff-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search" id="search-staff">
                                    <i class="fas fa-search"></i>
                                </button>
                                <!-- <div class="btn-group">
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#add-staff">
                                        <i class="fas fa-plus"></i>
                                        <span></span>
                                    </button>
                                </div> -->
                            </div>
                            <div>
                                <div class="input-group w-300">
                                    <select class="form-select" name="vacation" id="office-staff">
                                        <!-- <option value="">Select Office</option>
                                    <option value="1">Office 1</option>
                                    <option value="2">Office 2</option>
                                    <option value="3">Office 3</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#add-staff">
                                    <i class="fas fa-plus"></i>
                                    <span>Thêm</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="staff-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Họ & tên</th>
                                    <th>Phòng ban</th>
                                    <th>Vị trí</th>
                                    <th>Tên đăng nhập</th>
                                </tr>
                            </thead>
                            <tbody id="staff-list" class="align-middle">

                                <!-- <tr data-toggle="modal" data-id="1" data-target="#view-staff">
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                    
                                    </tr> -->
                            </tbody>
                        </table>
                    </div>

                    <div class="card-header d-flex justify-content-center pagination-ind">
                        <ul class="pagination" id="staff-pagination">
                            <!-- <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- staff -->
    <div class="modal fade mt-5" id="add-staff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return addStaff(event)" method="POST" id="add-staff-form">
                        <div class="mt-3 row">
                            <div class="col-lg-6">
                                <label for="firstname-add-staff" class="form-label">Tên</label>
                                <div class="input-group">
                                    <input type="text" name="firstname" id="firstname-add-staff" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="lastname-add-staff" class="form-label">Họ</label>
                                <div class="input-group">
                                    <input type="text" name="lastname" id="lastname-add-staff" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="username-add-staff" class="form-label">Tên đăng nhập</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="username" id="username-add-staff"
                                    placeholder="username" required>
                                <span class="input-group-text" id="icon-check-username">
                                    <i class="far fa-check-circle text-success fz-24"></i>
                                    <i class="far fa-times-circle d-none text-danger fz-24"></i>
                                </span>
                            </div>
                            <div id="username-error-add-staff">

                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="office-add-staff" class="form-label">Phòng ban</label>
                            <div class="input-group">
                                <select class="form-select" name="office" id="office-add-staff">
                                    <!-- <option value="">Select Office</option>
                                    <option value="1">Office 1</option>
                                    <option value="2">Office 2</option>
                                    <option value="3">Office 3</option> -->
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button form="add-staff-form" class="btn btn-outline-primary px-3">Thêm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade mt-5" id="view-staff">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin nhân viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="col-lg-4 col-12 border-end">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle border" width="160px" src="/" id="view-staff-modal-image">
                                <span class="font-weight-bold fz-24" id="view-staff-modal-fullname"></span>
                                <span class="text-black-50" id="view-staff-modal-email"></span>
                            </div>

                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="pt-3">
                                        <label>Tên</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-firstname"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Ngày sinh</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-birthday"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Phòng ban</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-office"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Lương</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-dollar-sign" style="font-size: 18px;"></i>
                                            </span>
                                            <input type="text" class="form-control" id="view-staff-modal-salary"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Tên đăng nhập</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-username"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="pt-3">
                                        <label>Họ và tên đệm</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-lastname"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Ngày tham gia</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-join" disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Số điện thoại</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-phone"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Chức vụ</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-position"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Mật khẩu</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" value="password" disabled>
                                            <button class="btn btn-outline-danger" id="reset-password">Reset</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col pb-3">
                                    <div class="pt-3">
                                        <label>Địa chỉ</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-address"
                                                disabled>
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

    <main class="vh-100 d-none" id="office">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Tìm kiếm..."
                                    id="search-office-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-office">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#add-office">
                                    <i class="fas fa-plus"></i>
                                    <span>Thêm</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="office-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Mã phòng</th>
                                    <th>Tên phòng</th>
                                    <th>Số phòng</th>
                                    <th>Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody id="office-list" class="align-middle">

                                <!--  <tr data-toggle="modal" data-id="1" data-target="#view-office">
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                    
                                    </tr> -->
                            </tbody>
                        </table>
                    </div>

                    <div class="card-header d-flex justify-content-center pagination-ind">
                        <ul class="pagination" id="office-pagination">
                            <!-- <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- modal office -->
    <div class="modal fade mt-5" id="add-office">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm phòng ban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return addOffice(event)" method="POST" id="add-office-form">
                        <div class="mt-3 row">
                            <div class="col-lg-6">
                                <label for="name-add-office" class="form-label">Tên phòng ban</label>
                                <div class="input-group">
                                    <input type="text" name="name" id="name-add-office" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="code-add-office" class="form-label">Mã phòng ban</label>
                                <div class="input-group">
                                    <input type="text" name="code" id="code-add-office" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3 row">
                            <div class="col-lg-6">
                                <label for="room-add-office" class="form-label">Số phòng</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="room" id="room-add-office" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone-add-office" class="form-label">Số điện thoại</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" id="phone-add-office" required>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <label for="office-add-office" class="form-label">Mô tả</label>
                            <div class="input-group">
                                <textarea class="form-control" name="description" id="description-office"
                                    rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" form="add-office-form" class="btn btn-outline-primary px-3">Thêm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade mt-5" id="view-office">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin phòng ban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form onsubmit="return false" method="post" id="view-office-form" class="w-100">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="name-view-office" class="form-label">Tên phòng ban</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name-view-office" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-2 col">
                                        <label for="room-view-office" class="form-label">Số phòng</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="room" id="room-view-office"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mt-2 col">
                                        <label for="phone-view-office" class="form-label">Số điện thoại</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="phone" id="phone-view-office"
                                                required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <input type="hidden" id="id-office" value="1">
                                <div class="mt-2">
                                    <label for="create-view-office" class="form-label">Ngày tạo</label>
                                    <div class="input-group">
                                        <input type="text" id="create-view-office" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="captain-view-office" class="form-label">Trưởng phòng</label>
                                    <div class="input-group">
                                        <select id="captain-view-office" class="form-control">

                                        </select>
                                        <span onclick="changeCaptain()" class="input-group-text" id="icon-swap-captain">
                                            <i class="fas fa-sync-alt text-success fz-24"></i>
                                        </span>
                                    </div>
                                    <input type="hidden" id="change-captain-id">
                                </div>
                            </div>
                            <div class="my-2 col">
                                <label for="description-view-office" class="form-label">Mô tả</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="description" id="description-view-office"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="change-office-id">
                        <input type="hidden" id="change-room-id">
                        <input type="hidden" id="change-phone-id">
                        <input type="hidden" id="change-description-id">
                        <input type="hidden" id="change-name-id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button onclick="deleteOffice()" class="btn btn-outline-secondary w-90">Xoá</button>
                    <button type="button" class="btn btn-outline-secondary w-90" data-bs-dismiss="modal">Thoát</button>
                    <button onclick="updateOffice()" class="btn btn-outline-secondary w-90">Mới</button>
                </div>
            </div>
        </div>
    </div>

    <main class="vh-100 d-none" id="vacation">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Tìm kiếm..."
                                    id="search-vacation-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-vacation">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="vacation-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Thời gian gửi</th>
                                    <th>Tài khoản</th>
                                    <th>Phòng ban</th>
                                    <th>Ngày nghỉ</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody id="vacation-list" class="align-middle">
                                <!-- <tr class="fw-bold" data-toggle="modal" data-id="1" data-target="#view-vacation">
                                    <td>2021/12/12 12:12</td>
                                    <td>Tran trung quan</td>
                                    <td>Marketing</td>
                                    <td>Ngay nghi</td>
                                    <td>Ngay nghi</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>

                    <div class="card-header d-flex justify-content-center pagination-ind">
                        <ul class="pagination" id="vacation-pagination">
                            <!-- <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div class="modal fade mt-5" id="view-vacation">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin nghỉ phép (<span id="seen-at-view-vacation"></span>)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="name-view-vacation" class="form-label">Tài khoản</label>
                                <div class="input-group">
                                    <input type="text" id="name-view-vacation" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label for="date-view-vacation" class="form-label">Ngày bắt đầu</label>
                                <div class="input-group">
                                    <input type="text" id="date-view-vacation" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="office-view-vacation" class="form-label">Phòng văn</label>
                                <div class="input-group">
                                    <input type="text" id="office-view-vacation" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label for="number-view-vacation" class="form-label">Số ngày nghỉ</label>
                                <div class="input-group">
                                    <input type="text" id="number-view-vacation" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="reason-view-vacation" class="form-label">Lý do</label>
                            <div class="input-group">
                                <textarea id="reason-view-vacation" class="form-control" rows="3" disabled></textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="file-view-vacation" class="form-label">Tệp đính kèm</label>
                            <div class="input-group">
                                <a href="/" target="_blank" class="btn btn-outline-primary"
                                    id="file-view-vacation">Xem</a>
                            </div>
                        </div>
                        <input type="hidden" id="id-view-vacation">
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="disagreeVacation()" class="btn btn-outline-secondary w-90">Từ chối</button>
                    <button onclick="agreeVacation()" class="btn btn-outline-secondary w-90">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    

    <?php
        require '../profile.php';
    ?>
</body>
<script src="/main.js"></script>

</html>