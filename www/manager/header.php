<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
    </div>
</nav>
<!-- top navigation bar -->
<!-- offcanvas -->
<div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark custom-navbar">
            <div class="avatar-space" onclick="viewProfile()">
                <img src="/images/default.webp" alt="avt" class="avatar" id="avatar">
            </div>
            <ul class="navbar-nav">
                <div class="d-none">
                    <hr class="dropdown-divider" />
                </div>
                <li class="p-3 position-relative accordion-button d-none" data-bs-toggle="collapse" href="#dashboard" role="button"
                    aria-expanded="false" aria-controls="dashboard">
                    <a class="text-white fw-bold text-uppercase px-3 text-decoration-none">
                        Dashboard
                    </a>
                </li>
                <div class="collapse" id="dashboard">
                    <li>
                        <a href="#" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2"><i class="icon fas fa-clipboard-list"></i></span>
                            <span>To Do</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2"><i class="icon fas fa-spinner"></i></span>
                            <span>In Progress</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2"><i class="icon fas fa-clipboard-check"></i></span>
                            <span>Done</span>
                        </a>
                    </li>
                </div>

                <div>
                    <hr class="dropdown-divider" />
                </div>
                <li class="p-3 position-relative accordion-button" data-bs-toggle="collapse" href="#feature" role="button"
                    aria-expanded="false" aria-controls="feature">
                    <a class="text-white fw-bold text-uppercase px-3 text-decoration-none">
                        Chức năng
                    </a>
                </li>
                <div class="collapse show" id="feature">
                    <li style="position: relative;">
                        <a onclick="switchPage('task-manager')" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2">
                                <i class="icon fas fa-tasks"></i>
                            </span>
                            <span>Nhiệm vụ</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="switchPage('staff-manager')" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2"><i class="fas fa-user-cog"></i></span>
                            <span>Thành viên</span>
                        </a>
                    </li>
                    <li style="position: relative;">
                        <a onclick="switchPage('vacation-request')" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2">
                                <i class="icon fas fa-business-time"></i>
                            </span>
                            <span>Duyệt nghỉ</span>
                            <span class="number-icon" id="vacation-number">5</span>
                        </a>
                    </li>
                    <li style="position: relative;">
                        <a onclick="switchPage('vacation-send')" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2">
                                <i class="icon fas fa-calendar-times"></i>
                            </span>
                            <span>Nghỉ phép</span>
                            <span class="number-icon d-none" id="vacation-send-number">5</span>
                        </a>

                    </li>
                </div>

                <div>
                    <hr class="dropdown-divider" />
                </div>
            </ul>
            <div id="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="p-1 d-inline-block text-white">Đăng xuất</span>
            </div>
        </nav>
    </div>
</div>