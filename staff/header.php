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
                <img src="/images/default.webp" alt="avt" class="avatar">
            </div>
            <ul class="navbar-nav">
                    <hr class="dropdown-divider" />
                <li class="p-3 position-relative accordion-button" data-bs-toggle="collapse" href="#dashboard" role="button"
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


                    <hr class="dropdown-divider" />
                <li class="p-3 accordion-button" 
                        data-bs-toggle="collapse" href="#feature" role="button" aria-expanded="false"
                        aria-controls="feature">
                    <a class="text-white fw-bold text-uppercase px-3 text-decoration-none">
                        Management
                    </a>
                </li>
                <div class="collapse show" id="feature">
                    <li style="position: relative;">
                        <a onclick="switchPage('task-staff')" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2">
                            <i class="icon fas fa-tasks"></i>
                            </span>
                            <span>Nhiệm vụ</span>
                        </a>
                    </li>
                    <li style="position: relative;">
                        <a onclick="switchPage('vacation-staff')" class="nav-link nav-link-custom p-3 text-white">
                            <span class="me-2">
                                <i class="icon fas fa-calendar-times"></i>
                            </span>
                            <span>Nghỉ phép</span>
                            <span class="number-icon" id="vacation-send-number">5</span>
                        </a>
                        
                    </li>
                </div>

                <li class="mb-2">
                    <hr class="dropdown-divider" />
                </li>
            </ul>
            <div id="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="p-1 d-inline-block text-white">Sign Out</span>
            </div>
        </nav>
    </div>
</div>