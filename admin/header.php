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
                    <img alt="avt" class="avatar" id="avatar">
                </div>
                <ul class="navbar-nav">
                    <div class="d-none">
                         <hr class="dropdown-divider" />
                    </div>
                   
                    <li class="p-3 accordion-button d-none" data-bs-toggle="collapse" href="#dashboard" role="button"
                        aria-expanded="false" aria-controls="dashboard">
                        <a class="text-white fw-bold text-uppercase px-3 text-decoration-none">
                            Tổng quan
                        </a>
                    </li>
                    <div class="collapse" id="dashboard">
                        <li>
                            <a href="/" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="icon fas fa-clipboard-list"></i></span>
                                <span>Cần làm</span>
                            </a>
                        </li>
                        <li>
                            <a href="/" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="icon fas fa-spinner"></i></span>
                                <span>Đang thực hiện</span>
                            </a>
                        </li>
                        <li>
                            <a href="/" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="icon fas fa-clipboard-check"></i></span>
                                <span>Hoàn thành</span>
                            </a>
                        </li>
                    </div>

            
                        <hr class="dropdown-divider" />
     
                    <li class="mp-3 accordion-button" data-bs-toggle="collapse" href="#feature" role="button"
                        aria-expanded="false" aria-controls="feature">
                        <a class="text-white fw-bold text-uppercase px-3 text-decoration-none">
                            Quản lý
                        </a>
                    </li>
                    <div class="collapse show" id="feature">
                        <li>
                            <a onclick="switchPage('staff')" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="fas fa-user-cog"></i></span>
                                <span>Nhân viên</span>
                            </a>
                        </li>
                        <li>
                            <a onclick="switchPage('office')" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="icon fas fa-building"></i></i></span>
                                <span>Phòng ban</span>
                            </a>
                        </li>
                        <li style="position: relative;">
                            <a onclick="switchPage('vacation')" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2">
                                    <i class="icon fas fa-business-time"></i>
                                </span>
                                <span>Nghỉ phép</span>
                            </a>
                            <span class="number-icon" id="vacation-number">5</span>
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