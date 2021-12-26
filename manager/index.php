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
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">
</head>

<body>
    <?php
        require_once "header.php";
    ?>
    <main class="vh-100 d-none" id="staff-manager">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Search..."
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
                                    <span>More</span>
                                </button>
                            </div> -->
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="staff-manager-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Phone</th>
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
        </div>
    </main>

    <!-- staff -->
    <div class="modal fade mt-5" id="view-staff-manager">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Staff Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="col-lg-4 col-12 border-end">
                            <div class="d-flex flex-column align-items-center text-center p-2">
                                <img class="rounded-circle border" width="120px" src="/"
                                    id="view-staff-manager-modal-image">
                                <span class="font-weight-bold fz-24" id="view-staff-manager-modal-fullname"></span>
                                <span class="text-black-50" id="view-staff-manager-modal-email"></span>
                            </div>

                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="pt-3">
                                        <label>Birthday</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                id="view-staff-manager-modal-birthday" disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Username</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                id="view-staff-manager-modal-username" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="pt-3">
                                        <label>Date join</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-manager-modal-join"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Phone</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-manager-modal-phone"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col pb-3">
                                    <div class="pt-3">
                                        <label>Address</label>
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
                                <input type="text" class="search-input w-250" placeholder="Search..."
                                    id="search-vacation-manager-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-vacation-manager">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div>
                                <div class="input-group w-300">
                                    <select class="form-select" name="status" id="office-staff">
                                        <option value="0">All</option>
                                        <option value="1">Pending</option>
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
                                <input type="text" class="search-input w-250" placeholder="Search..."
                                    id="search-vacation-send-input">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search"
                                    id="search-vacation-send">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div>
                                <div class="input-group w-300">
                                    <select class="form-select" name="status" id="office-staff">
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
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#add-staff">
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
                                    <th>Number Off</th>
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

    <div class="modal fade mt-5" id="add-staff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/api/add-staff.php" method="POST" id="add-staff-form">
                        <div class="mt-3 row">
                            <div class="col-lg-6">
                                <label for="firstname-add-staff" class="form-label">First Name</label>
                                <div class="input-group">
                                    <input type="text" name="firstname" id="firstname-add-staff" class="form-control"
                                        placeholder="Staff's first name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="lastname-add-staff" class="form-label">Last Name</label>
                                <div class="input-group">
                                    <input type="text" name="lastname" id="lastname-add-staff" class="form-control"
                                        placeholder="Staff's last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="username-add-staff" class="form-label">Username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="username" id="username-add-staff"
                                    placeholder="Staff's username" required>
                                <span class="input-group-text" id="icon-check-username">
                                    <i class="far fa-check-circle text-success fz-24"></i>
                                    <i class="far fa-times-circle d-none text-danger fz-24"></i>
                                </span>
                            </div>
                            <div id="username-error-add-staff">

                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="office-add-staff" class="form-label">Office</label>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="add-staff-form" class="btn btn-primary px-3">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="alert d-flex align-items-center p-3 mb-0 text-white bg-primary d-none" role="alert" id="alert-manager">
        <div id="alert-icon">
            <i class="far fa-check-circle" style="font-size: 30px;"></i>
        </div>
        <div id="alert-content" class="text-center" style="margin-left: 0.7rem; font-weight: 600;">
            Đã thêm sinh viên thành công
        </div>
    </div>
</body>
<script src="/main.js"></script>

</html>