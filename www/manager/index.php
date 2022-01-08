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
        if ($type != 1) {
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
    <!-- <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Accordion Item #1
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                <code>.accordion-flush</code> class. This is the first item's accordion body.
            </div>
        </div>
    </div> -->
    <main class="vh-100 d-none" id="task-manager">
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Tìm kiếm..."
                                    id="search-task-manager-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-task-manager">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div>
                                <div class="input-group w-300">
                                    <select class="form-select" name="status" id="type-task-manager">
                                        <option value="-1">Tất cả</option>
                                        <option value="0">Mới tạo</option>
                                        <option value="1">Đang làm</option>
                                        <option value="2">Chờ duyệt</option>
                                        <option value="3">Trung Bình</option>
                                        <option value="4">Khá</option>
                                        <option value="5">Tốt</option>
                                        <option value="6">Huỷ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#create-task">
                                    <i class="fas fa-plus"></i>
                                    <span>Thêm</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="task-manager-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Tên nhiệm vụ</th>
                                    <th>Người phụ trách</th>
                                    <th>Ngày giao</th>
                                    <th>Hạn chót</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody id="task-manager-list" class="align-middle">

                            </tbody>
                        </table>
                    </div>

                    <div class="card-header d-flex justify-content-center pagination-ind">
                        <ul class="pagination" id="task-manager-pagination">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade mt-5" id="create-task">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tạo nhiệm vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return createTask(event)" method="post" id="form-task-create" class="row"
                        enctype="multipart/form-data">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="title-task-create" class="form-label">Tiêu đề</label>
                                <div class="input-group">
                                    <input type="text" name="title" class="form-control" id="title-task-create"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="deadline-task-create" class="form-label">Hạn chót</label>
                                <div class="input-group">
                                    <input type="datetime-local" id="deadline-task-create" name="deadline"
                                        class="form-control" required>
                                    <span class="input-group-text" id="icon-check-date">
                                        <i class="far fa-check-circle d-none text-success fz-24"></i>
                                        <i class="far fa-times-circle text-danger fz-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="staff-task-create" class="form-label">Giao cho</label>
                                <select name="staff" id="staff-task-create" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="files-vacation-send" class="form-label">File đính kèm</label>
                                <div class="input-group">
                                    <input type="file" name="files[]" id="files-create-task" class="form-control"
                                        multiple required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="description-task-create" class="form-label">Mô tả</label>
                            <div class="input-group">
                                <textarea id="description-task-create" name="description" class="form-control"
                                    required></textarea>
                            </div>
                        </div>
                        <!-- <input type="hidden" id="id-add-vacation-send">
                        <input type="hidden" id="lastest-add-vacation-send">
                        <input type="hidden" id="available-add-vacation-send"> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary w-90" data-bs-dismiss="modal">Thoát</button>
                    <button class="btn btn-outline-secondary w-90" form="form-task-create"
                        id="btn-send-vacation">Tạo</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rate-task">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="flex justify-content-center">
                    <div class="row mt-3">
                        <div class="col text-center">
                            <h5 class="font-weight-bold">Đánh giá</h5>
                        </div>
                    </div>
                    <form>
                        <div class="row justify-content-center">
                            <div class="col-auto example-block text-center">
                                <label class="radio-inline">
                                    <input type="radio" name="emotion" id="rate1" class="input-hidden" />
                                    <img src="https://img.icons8.com/color/100/000000/angry.png" width="84" height="84">
                                </label>
                            </div>
                            <div class="col-auto example-block text-center">
                                <label class="radio-inline">
                                    <input type="radio" name="emotion" id="rate2" class="input-hidden" />
                                    <img src="https://img.icons8.com/color/100/000000/boring.png" width="84"
                                        height="84">
                                </label>
                            </div>
                            <div class="col-auto example-block text-center">
                                <label class="radio-inline">
                                    <input type="radio" name="emotion" id="rate3" class="input-hidden" />
                                    <img src="https://img.icons8.com/color/100/000000/happy.png" width="84" height="84">
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade mt-5" id="view-task-manager">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header d-flex justify-center">
                    <h5 class="modal-title">Chi tiết nhiệm vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0" style="min-height: 400px;">
                    <div class="view-task-message my-3" id="message-task-manager">
                        <!-- Direct -->
                    </div>


                    <form onsubmit="return cancelTask(event)" method="post" id="form-task-0-manager">
                        <input type="hidden" name="task_id" id="task-id-manager">
                    </form>
                </div>
                <div class="modal-footer d-none controller-task" id="status-0-manager">
                    <button type="button" class="btn btn-outline-secondary w-90" data-bs-dismiss="modal">Thoát</button>
                    <button class="btn btn-outline-secondary w-90" form="form-task-0-manager">Huỷ</button>
                </div>
                <div class="modal-footer d-none controller-task" id="status-1-manager">
                    <button type="button" class="btn btn-outline-secondary w-90" data-bs-dismiss="modal">Thoát</button>
                </div>
                <div class="modal-footer d-none controller-task" id="status-2-manager">
                    <div class="row w-100">
                        <form onsubmit="return rejectTask(event)" class="p-1 w-100 border" id="reject-task-manager"
                            enctype="multipart/form-data">
                            <div class="row g-0">
                                <label for="message-reject-task">Tin nhắn</label>
                                <textarea class="form-control" name="message" id="message-reject-task" required>
                                </textarea>
                            </div>
                            <div class="row g-1">
                                <div class="col-lg-5">

                                    <label for="new-deadline-task">Hạn mới</label>
                                    <input type="datetime-local" id="new-deadline-task" name="time"
                                        class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label for="files-reject-task">File đính kèm</label>
                                    <input type="file" name="files[]" id="files-reject-task" class="form-control"
                                        multiple required>
                                </div>
                                <div class="col-lg-1 d-flex justify-content-center">
                                    <button class="btn btn-outline-primary w-100 h-100">Gửi lại</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        <button class="btn btn-success" onclick="return acceptTask()">
                            Hoàn thành
                        </button>
                    </div>
                    
                </div>
                <div class="modal-footer d-none controller-task" id="status-footer">
                        <button type="button" class="btn btn-outline-secondary w-90"
                            data-bs-dismiss="modal">Thoát</button>
                    </div>
            </div>
        </div>
    </div>

    <main class="vh-100 d-none" id="staff-manager">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Tìm kiếm..."
                                    id="search-staff-manager-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-staff-manager">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            <!-- 
                            <div class="btn-group">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#add-staff-manager">
                                    <i class="fas fa-plus"></i>
                                    <span>Thêm</span>
                                </button>
                            </div> -->
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="staff-manager-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody id="staff-manager-list" class="align-middle">

                                <!-- <tr data-toggle="modal" data-id="1" data-target="#view-staff-manager">
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                    
                                    </tr> -->
                            </tbody>
                        </table>
                    </div>

                    <div class="card-header d-flex justify-content-center pagination-ind">
                        <ul class="pagination" id="staff-manager-pagination">
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

    <!-- staff -->
    <div class="modal fade mt-5" id="view-staff-manager">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết nhân viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="col-lg-4 col-12 border-end">
                            <div class="d-flex flex-column align-items-center text-center p-2">
                                <img class="rounded-circle border" width="120px" height="120px" src="/"
                                    id="view-staff-manager-modal-image">
                                <span class="font-weight-bold fz-24" id="view-staff-manager-modal-fullname"></span>
                                <span class="text-black-50" id="view-staff-manager-modal-email"></span>
                            </div>

                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="pt-3">
                                        <label>Ngày sinh</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                id="view-staff-manager-modal-birthday" disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Tên đăng nhập</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                id="view-staff-manager-modal-username" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="pt-3">
                                        <label>Ngày gia nhập</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-manager-modal-join"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Số điện thoại</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-manager-modal-phone"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col pb-3">
                                    <div class="pt-3">
                                        <label>Địa chỉ</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                id="view-staff-manager-modal-address" disabled>
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

    <main class="vh-100 d-none" id="vacation-request">
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Tìm kiếm..."
                                    id="search-vacation-manager-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-vacation-manager">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div>
                                <div class="input-group w-300">
                                    <select class="form-select" name="status" id="type-vacation-manager">
                                        <option value="6">All</option>
                                        <option value="0">Pending</option>
                                        <option value="2">Approve</option>
                                        <option value="3">Refused</option>
                                        <option value="4">Seen</option>
                                        <option value="5">Non Seen</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="vacation-manager-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Send At</th>
                                    <th>Username</th>
                                    <th>Date Off</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="vacation-manager-list" class="align-middle">
                                <!-- <tr class="fw-bold" data-toggle="modal" data-id="1" data-target="#view-vacation-manager">
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
                        <ul class="pagination" id="vacation-manager-pagination">
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

    <div class="modal fade mt-5" id="view-vacation-manager">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vacation Details (<span id="seen-at-view-vacation-manager"></span>)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="mt-2 col-lg-4">
                            <label for="name-view-vacation-manager" class="form-label">Name</label>
                            <div class="input-group">
                                <input type="text" id="name-view-vacation-manager" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="mt-2 col-lg-4">
                            <label for="date-view-vacation-manager" class="form-label">Date Start</label>
                            <div class="input-group">
                                <input type="text" id="date-view-vacation-manager" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="mt-2 col-lg-4">
                            <label for="number-view-vacation-manager" class="form-label">Number day of</label>
                            <div class="input-group">
                                <input type="text" id="number-view-vacation-manager" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="reason-view-vacation-manager" class="form-label">Reason</label>
                            <div class="input-group">
                                <textarea id="reason-view-vacation-manager" class="form-control" disabled></textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="input-group d-inline-block">
                                <a href="/" target="_blank" class="btn btn-outline-info btn-sm"
                                    id="file-view-vacation-manager">View File</a>
                            </div>
                        </div>
                        <input type="hidden" id="id-view-vacation-manager">
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="disagreeVacationManager()" class="btn btn-outline-secondary w-90">Refused</button>
                    <button onclick="agreeVacationManager()" class="btn btn-outline-secondary w-90">Approve</button>
                </div>
            </div>
        </div>
    </div>

    <main class="vh-100 d-none" id="vacation-send">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Tìm kiếm..."
                                    id="search-vacation-send-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-vacation-send">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div>
                                <div class="input-group w-300">
                                    <select class="form-select" name="status" id="type-vacation-send">
                                        <option value="0">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Approve</option>
                                        <option value="3">Refused</option>
                                        <option value="4">Seen</option>
                                        <option value="5">Non Seen</option>
                                    </select>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-outline-primary" onclick="offRequest()">
                                    <i class="fas fa-plus"></i>
                                    <span>Thêm</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="vacation-send-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Send At</th>
                                    <th>Date Off</th>
                                    <th>Number day</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="vacation-send-list" class="align-middle">
                                <!-- <tr class="fw-bold" data-toggle="modal" data-id="1" data-target="#view-vacation-send">
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
                        <ul class="pagination" id="vacation-send-pagination">
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

    <div class="modal fade mt-5" id="view-vacation-send">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Off Request (<span id="send-view-vacation-send"></span>)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="date-view-vacation-send" class="form-label">Date Start</label>
                                <div class="input-group">
                                    <input type="text" id="date-view-vacation-send" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label for="reason-view-vacation-send" class="form-label">Reason</label>
                                <div class="input-group">
                                    <textarea id="reason-view-vacation-send" class="form-control" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="number-view-vacation-send" class="form-label">Number day of</label>
                                <div class="input-group">
                                    <input type="text" id="number-view-vacation-send" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label for="feedback-view-vacation-send" class="form-label">Feedback</label>
                                <div class="input-group">
                                    <textarea id="feedback-view-vacation-send" class="form-control" disabled></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="mt-2">
                            <div class="input-group d-inline-block">
                                <a href="/" target="_blank" class="btn btn-outline-info btn-sm"
                                    id="file-view-vacation-send">View File</a>
                            </div>
                        </div>
                        <input type="hidden" id="id-view-vacation-send">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade mt-5" id="add-vacation-send">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xin nghỉ phép</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mt-2">
                                <label for="date-add-vacation-send" class="form-label">Ngày bắt đầu</label>
                                <div class="input-group">
                                    <input type="date" id="date-add-vacation-send" class="form-control">
                                    <span class="input-group-text" id="icon-check-date">
                                        <i class="far fa-check-circle d-none text-success fz-24"></i>
                                        <i class="far fa-times-circle text-danger fz-24"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="mt-2">
                                <label for="number-dayoff-vacation-send" class="form-label">Số ngày nghỉ</label>
                                <div class="input-group">
                                    <select name="number" id="number-dayoff-vacation-send" class="form-select">

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="mt-2">
                                <label for="file-vacation-send" class="form-label">File đíng kèm</label>
                                <div class="input-group">
                                    <input type="file" name="file" id="file-vacation-send" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="mt-2">
                            <label for="reason-add-vacation-send" class="form-label">Lý do</label>
                            <div class="input-group">
                                <textarea id="reason-add-vacation-send" class="form-control"></textarea>
                            </div>
                        </div>
                        <input type="hidden" id="id-add-vacation-send">
                        <input type="hidden" id="lastest-add-vacation-send">
                        <input type="hidden" id="available-add-vacation-send">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary w-90">Thoát</button>
                    <button class="btn btn-outline-secondary w-90" id="btn-send-vacation">Gửi</button>
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