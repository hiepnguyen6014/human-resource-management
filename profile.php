<div class="modal fade mt-5" id="view-profile">
    <div class="modal-dialog modal-lg mt-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quản lý thông tin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <div class="row">
                    <div class="col-lg-4 col-12 border-end">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div style="position: relative;">
                                <img class="rounded-circle border" width="160px" height="160px" src="/"
                                    id="view-profile-modal-image">
                                <canvas id="canvas" class="d-none" width="300px" height="300px"></canvas>
                                <div class="change-avatar">
                                    <form method="post" enctype="multipart/form-data" id="change-avt-form">
                                        <label for="change-avatar" class="change-avatar-button"
                                            id="button-change-avatar">
                                            <i class="fas fa-camera"></i>
                                        </label>
                                        <input type="file" id="change-avatar" name="avatar" class="d-none"
                                            accept=".png, .jpg, .webp">
                                    </form>
                                </div>
                            </div>
                            <h5 class="font-weight-bold mt-4" id="view-profile-modal-fullname"></h5>
                            <span class="text-black-50" id="view-profile-modal-username"></span>
                        </div>

                    </div>
                    <div class="col-lg-8 col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-details"
                                    type="button" role="tab" aria-controls="profile-details" aria-selected="true">Thông
                                    tin tài
                                    khoản</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#change-password"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Đổi mật
                                    khẩu</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile-details" role="tabpanel"
                                aria-labelledby="profile-details">
                                <form id="update-profile" class="row" onsubmit="return updateProfile(event)">
                                    <div class="col-lg-6">
                                        <div class="pt-3">
                                            <label>Họ</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    id="view-profile-modal-firstname" disabled>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <label>Ngày sinh</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="view-profile-modal-birthday"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="view-profile-modal-email"
                                                    name="email">
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <label>Lương</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-dollar-sign" style="font-size: 18px;"></i>
                                                </span>
                                                <input type="text" class="form-control" id="view-profile-modal-salary"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="pt-3">
                                            <label>Tên</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="view-profile-modal-lastname"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <label>Ngày tham gia</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="view-profile-modal-join"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <label>Số điện thoại</label>
                                            <div class="input-group">
                                                <input type="tel" id="view-profile-modal-phone" class="form-control"
                                                    name="phone" placeholder="0123456789" pattern="[0][0-9]{9}">
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <label>Chức vụ</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="view-profile-modal-position"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col pb-3">
                                        <div class="pt-3">
                                            <label>Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="view-profile-modal-address"
                                                    name="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-secondary w-90"
                                            data-bs-dismiss="modal">Thoát</button>
                                        <button form="update-profile" class="float-end btn btn-outline-primary ms-2">Cập
                                            nhập</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="change-password" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <form onsubmit="return changePassword(event)" class="row" id="form-change-password">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6 py-5">
                                        <div class="pt-3">
                                            <label>Mật khẩu cũ</label>
                                            <div class="input-group">
                                                <input type="password" id="view-profile-modal-old-password" class="form-control" name="old-password" minlength="6" required>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <label>Mật khẩu mới</label>
                                            <div class="input-group">
                                                <input type="password"
                                                    class="form-control view-profile-modal-new-password"
                                                    id="view-profile-modal-new-password1" name="new-password" minlength="6" required>
                                                <span class="input-group-text icon-password-check">
                                                    <i class="far fa-check-circle d-none text-success fz-24"></i>
                                                    <i class="far fa-times-circle text-danger fz-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <label>Nhập lại mật khẩu</label>
                                            <div class="input-group">
                                                <input type="password"
                                                    class="form-control view-profile-modal-new-password"
                                                    id="view-profile-modal-new-password2" minlength="6" required>
                                                <span class="input-group-text icon-password-check">
                                                    <i class="far fa-check-circle d-none text-success fz-24"></i>
                                                    <i class="far fa-times-circle text-danger fz-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                    <div class="pb-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-secondary w-90"
                                            data-bs-dismiss="modal">Thoát</button>
                                        <button form="form-change-password" class="float-end btn btn-outline-primary ms-2"
                                            id="btn-change-password">Cập nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="alert d-flex align-items-center p-3 mb-0 text-white bg-gradient bg-info d-none" role="alert"
    id="alert-full">
    <div id="alert-icon">
        <i class="far fa-check-circle d-none text-white fz-24"></i>
        <i class="far fa-times-circle text-white fz-24"></i>
    </div>
    <div id="alert-content" class="text-center" style="margin-left: 0.7rem; font-weight: 600;">
        Đã thêm sinh viên thành công
    </div>
</div>