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
                <div class="avatar-space">
                    <img src="/images/default.webp" alt="avt" class="avatar">
                </div>
                <ul class="navbar-nav">
                    <li class="mb-2">
                        <hr class="dropdown-divider" />
                    </li>
                    <li class="mb-2 py-2">
                        <a class="text-white fw-bold text-uppercase px-3 mb-3 text-decoration-none"
                            data-bs-toggle="collapse" href="#dashboard" role="button" aria-expanded="false"
                            aria-controls="dashboard">
                            Dashboard
                        </a>
                    </li>
                    <div class="collapse" id="dashboard">
                        <li>
                            <a href="#" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="icon fas fa-tasks"></i></span>
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

                    <li class="mb-2">
                        <hr class="dropdown-divider" />
                    </li>
                    <li class="mb-2 py-2">
                        <a class="text-white fw-bold text-uppercase px-3 mb-3 text-decoration-none"
                            data-bs-toggle="collapse" href="#feature" role="button" aria-expanded="false"
                            aria-controls="feature">
                            Management
                        </a>
                    </li>
                    <div class="collapse" id="feature">
                        <li>
                            <a onclick="switchPage('staff')" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="fas fa-user-cog"></i></span>
                                <span>Staff</span>
                            </a>
                        </li>
                        <li>
                            <a onclick="switchPage('office')" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="icon fas fa-building"></i></i></span>
                                <span>Office</span>
                            </a>
                        </li>
                        <li>
                            <a onclick="switchPage('vacation')" class="nav-link nav-link-custom p-3 text-white">
                                <span class="me-2"><i class="icon fas fa-exclamation-triangle"></i></span>

                                <span>Vacation</span>
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