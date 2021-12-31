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
    <title>Nhân viên</title>
    <link rel="shortcut icon" href="/favi.ico" type="image/x-icon">
</head>

<body>
    <?php
        require_once "header.php";
    ?>
    <main class="vh-100 d-none" id="task-staff">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Search..."
                                    id="search-task-staff-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-task-staff">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            <div>
                                <div class="input-group w-300">
                                    <select class="form-select" name="status" id="type-task-staff">
                                        <option value="0">Tất cả</option>
                                        <option value="1">Mới</option>
                                        <option value="2">Đang làm</option>
                                        <option value="3">Chờ duyệt</option>
                                        <option value="4">Trả về</option>
                                        <option value="5">Trung Bình</option>
                                        <option value="6">Khá</option>
                                        <option value="7">Tốt</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="staff-staff-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Ngày giao</th>
                                    <th>Tên tác vụ</th>
                                    <th>Hạn chót</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody id="task-staff-list" class="align-middle">

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
                        <ul class="pagination" id="task-staff-pagination">
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

    <div class="modal fade mt-5" id="view-task-staff">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header d-flex justify-center">
                    <h5 class="modal-title">Chi tiết nhiệm vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="title-task-view" class="form-label">Tiêu đề</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="title-task-view" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="title-task-create" class="form-label">Hạn chót</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="title-task-create" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view-task-message my-3">

                        <div>
                            <div class="d-flex flex-row justify-content-start mb-2">
                                <div class="p-3 receiver-message">
                                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, fuga
                                        asperiores? Id, earum nemo dolores nam adipisci, labore, dolor atque vero
                                        numquam a et maxime. Dolor repellendus quo totam iure?</span>
                                    <a href="/"><i class="fas fa-download btn-action"></i></a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="d-flex flex-row justify-content-end mb-2">
                                <div class="p-3 border sender-message">
                                    <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi voluptatem,
                                        similique adipisci natus, nesciunt quasi necessitatibus qui debitis voluptate
                                        beatae saepe. Nulla quia sint vero eum laudantium veritatis velit porro.</span>
                                    <a href="/"><i class="fas fa-download btn-action"></i></a>
                                </div>
                            </div>
                        </div>

                        <form class="p-3 border" style="box-shadow: 0 0 3px black;">
                            <div class="mb-2">
                                <textarea class="form-control" name="message" id="message-view-task"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-1">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Gửi</button>
                                </div>
                                <div class="col-lg-11">
                                    <input type="file" name="files" id="files-view-task" class="form-control">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary w-90" data-bs-dismiss="modal">Thoát</button>
                    <button class="btn btn-outline-secondary w-90" form="form-task-create" id="btn-send-vacation"
                        onclick="reply()">Tạo</button>
                </div>
            </div>
        </div>
    </div>

    <main class="vh-100 d-none" id="vacation-staff">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Search..."
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
                                    <span>More</span>
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