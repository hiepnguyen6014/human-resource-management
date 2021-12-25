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
    <main class="vh-100 d-none" id="staff">
        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card" style="position: relative;">
                        <div class="card-header d-flex justify-content-between mobile-hide">
                            <div class="d-flex">
                                <input type="text" class="search-input w-250" placeholder="Search..."
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
                                    <select class="form-select" name="office" id="office-staff">
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
                                    <span>More</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="staff-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Office</th>
                                    <th>Position</th>
                                    <th>Username</th>
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

    <div class="modal fade mt-5" id="view-staff">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Staff Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="col-lg-4 col-12 border-end">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle border" width="160px" src="/" id="view-staff-modal-image">
                                <span class="font-weight-bold fz-24" id="view-staff-modal-fullname"></span>
                                <span class="text-black-50" id="view-staff-modal-email">edogaru@mail.com.my</span>
                            </div>

                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="pt-3">
                                        <label>First Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-firstname"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Birthday</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-birthday"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Office</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-office"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Salary</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-dollar-sign" style="font-size: 18px;"></i>
                                            </span>
                                            <input type="text" class="form-control" id="view-staff-modal-salary"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Username</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-username"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="pt-3">
                                        <label>Last Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-lastname"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Date join</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-join" disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Phone</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-phone"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Position</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view-staff-modal-position"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" value="password" disabled>
                                            <button class="btn btn-outline-danger" id="reset-password">Reset</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col pb-3">
                                    <div class="pt-3">
                                        <label>Address</label>
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
                                <input type="text" class="search-input w-250" placeholder="Search..."
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
                                    <span>More</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="office-table" class="table table-hover w-100 mb-0 text-center">
                            <thead class="align-middle bg-secondary text-white font-weight-bold"
                                style="letter-spacing: 1px;">
                                <tr>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th>Captain</th>
                                    <th>Phone</th>
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
        <div class="modal-dialog modal-md mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Office</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/api/add-office.php" method="POST" id="add-office-form">
                        <div class="mt-3">
                            <label for="name-add-office" class="form-label">Name</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name-add-office" class="form-control"
                                    placeholder="Office's name" required>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-lg-6">
                                <label for="room-add-office" class="form-label">Room</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="room" id="room-add-office"
                                        placeholder="Office's room" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone-add-office" class="form-label">Phone</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" id="phone-add-office"
                                        placeholder="Office's phone" required>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <label for="office-add-office" class="form-label">Description</label>
                            <div class="input-group">
                                <textarea class="form-control" name="description" id="description-office" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="add-office-form" class="btn btn-primary px-3">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade mt-5" id="view-office">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Office Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/api/update-office.php" method="post" id="view-office-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label for="name-view-office" class="form-label">Name</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name-view-office" class="form-control"
                                            placeholder="Office's name" required>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="room-view-office" class="form-label">Room</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="room" id="room-view-office"
                                            placeholder="Office's room" required>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="phone-view-office" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" id="phone-view-office"
                                            placeholder="Office's phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label for="description-view-office" class="form-label">Description</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="description" id="description-view-office"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="view-office-form" class="btn btn-primary px-3">Update</button>
                </div>
            </div>
        </div>
    </div>

    <main class="vh-100 d-none" id="vacation">

        <!-- manage product -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-flex">
                                <input type="text" class="search-input" placeholder="Search...">
                                <button type="button" class="btn btn-outline-primary px-3 btn-search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#add-product">
                                    <i class="fas fa-plus"></i>
                                    <span>Add Product</span>
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="example" class="table table-hover w-100">
                                <thead class="align-middle">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng trong kho</th>
                                        <th>Nhà sản xuất</th>
                                        <th>Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tbody id="products" class="align-middle">
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>

                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>

                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>


                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>s</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-header d-flex justify-content-center" style="height: 55px;">
                            <ul class="pagination">
                                <li class="page-item">
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
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="alert d-flex align-items-center p-3 mb-0 text-white bg-primary d-none" role="alert" id="alert">
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