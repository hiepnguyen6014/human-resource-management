const API = {

    //Admin
    'ADD_OFFICE': '/api/admin/add-office.php',
    'ADD_STAFF': '/api/admin/add-staff.php',
    'CHANGE_CAPTAIN': '/api/admin/change-captain.php',
    'CHECK_USERNAME': '/api/admin/check-username.php',
    'DELETE_OFFICE': '/api/admin/delete-office.php',
    'GET_OFFICES_LIST': '/api/admin/get-offices-list.php',
    'GET_OFFICES': '/api/admin/get-offices.php',
    'GET_STAFF_DETAIL': '/api/admin/get-staff-detail.php',
    'GET_STAFFS': '/api/admin/get-staffs.php',
    'RESET_PASSWORD': '/api/admin/reset-password.php',
    'SEARCH_OFFICE': '/api/admin/search-office.php',
    'UPDATE_OFFICE': '/api/admin/update-office.php',
    'VIEW_OFFICE': '/api/admin/view-office.php',
    'GET_STAFFS_OFFICE': '/api/admin/get-staffs-office.php',
    'CHANGE_SALARY': '/api/admin/change-salary.php',
    'DELETE_STAFF': '/api/admin/delete-staff.php',
    'VIEW_VACATION': '/api/admin/view-vacation.php',

    //Manager
    'ACCEPT_TASK': '/api/manager/accept-task.php',
    'CANCEL_TASK': '/api/manager/cancel-task-manager.php',
    'CREATE_TASK': '/api/manager/create-task.php',
    'FILTER_TASKS_MANAGER': '/api/manager/filter-tasks-manager.php',
    'FILTER_VACATIONS_MANAGER': '/api/manager/filter-vacations-manager.php',
    'GET_STAFF_DETAIL_MANAGER': '/api/manager/get-staff-detail-manager.php',
    'GET_STAFFS_MANAGER': '/api/manager/get-staffs-manager.php',
    'GET_TASKS_MANAGER': '/api/manager/get-tasks-manager.php',
    'GET_VACATIONS_MANAGER': '/api/manager/get-vacations-manager.php',
    'REJECT_TASK': '/api/manager/reject-task.php',
    'SEARCH_STAFFS_MANAGER': '/api/manager/search-staffs-manager.php',
    'SEARCH_TASK_MANAGER': '/api/manager/search-task-manager.php',
    'SEARCH_VACATION_MANAGER': '/api/manager/search-vacation-manager.php',
    'VIEW_DETAIL_TASK_MANAGER': '/api/manager/view-detail-task-manager.php',
    'VIEW_VACATION_MANAGER': '/api/manager/view-vacation-manager.php',
    'CHECK_BEFORE_VACATION': '/api/manager/check-before-vacation.php',
    'ADD_VACATION': '/api/manager/add-vacation.php',

    //Staff
    'FILTER_TASKS_STAFF': '/api/staff/filter-tasks-staff.php',
    'GET_TASKS_STAFF': '/api/staff/get-tasks-staff.php',
    'SEARCH_TASKS_STAFF': '/api/staff/search-tasks-staff.php',
    'START_TASK': '/api/staff/start-task.php',
    'SUBMIT_TASK': '/api/staff/submit-task.php',
    'VIEW_DETAIL_TASK_STAFF': '/api/staff/view-detail-task-staff.php',
    'VIEW_TASK_STAFF': '/api/staff/view-task-staff.php',
    'TURN_IN_TASK': '/api/staff/turn-in-task.php',

    //Other
    'AGREE_VACATION_ALL': '/api/agree-vacation.php',

    'DISAGREE_VACATION_ALL': '/api/disagree-vacation.php',
    'FILTER_VACATIONS_SEND_ALL': '/api/filter-vacations-send.php',
    'GET_STAFFS_MANAGER_ALL': '/api/get-staffs-manager.php',
    'GET_TASKS_STAFF_ALL': '/api/get-tasks-staff.php',
    'GET_VACATIONS_SEND_ALL': '/api/get-vacations-send.php',
    'GET_VACATIONS_ALL': '/api/get-vacations.php',
    'SEARCH_VACATIONS_SEND_ALL': '/api/search-vacations-send.php',
    'SEARCH_VACATION_ALL': '/api/search-vacation.php',
    'SEEN_VACATION_ALL': '/api/seen-vacation.php',
    'UPDATE_PROFILE_ALL': '/api/update-profile.php',
    'VIEW_DETAIL_TASK_MANAGER_ALL': '/api/view-detail-task-manager.php',
    'VIEW_PROFILE_ALL': '/api/view-profile.php',
    'VIEW_VACATION_SEND_ALL': '/api/view-vacation-send.php',
    'CHANGE_AVATAR_ALL': '/api/change-avatar.php',
    'GET_AVATAR_ALL': '/api/get-avatar.php',
    'CHANGE_PASSWORD_ALL': '/api/change-password.php',
}

window.onload = () => {
    switchPage('task-manager');

    //easy way to live pageS
    /* setInterval(() => {
        const mains = document.getElementsByTagName('main');
        Array.from(mains).forEach(main => {
            if (!main.classList.contains('d-none')) {
                switchPage(main.id);
                console.log('refresh');
            }
        });
    }, 1000); */
};

//check current href
var currentHref = window.location.href;
const numberEachPage = 15;
let dataPagination = [];

function switchPage(page) {
    Array.from(document.querySelectorAll('main')).forEach(e => {
        if (e.id == page) {
            loadData(e.id);
            document.getElementById(e.id).classList.remove('d-none');
        } else {
            e.classList.add('d-none');
        }
    })
}

function deleteStaff(event) {
    event.preventDefault();

    const id = document.getElementById('user-id').value;

    const verify = confirm(`Bạn có chắc chắn muốn xóa nhân viên ${id}?`);
    if (verify) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API.DELETE_STAFF, true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.status === 'success') {
                    showSuccessMessage(data.message);
                    switchPage('staff');

                    // close modal
                    document.getElementById('delete-staff-btn').click();
                } else {
                    showErrorMessage(data.message);
                }
            } else {
                showErrorMessage(data.message);
            }
        }
        xhr.send(new FormData(document.getElementById('delete-staff')));
    }
}

function createPaginationStaff(paginationElement, numberEachPage, number, list) {
    const pagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag('${paginationElement}', '${list}')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadDataForStaffTable(${i}, '${paginationElement}', '${list}')">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag('${paginationElement}', '${list}')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    pagination.innerHTML = html;
}

function createPaginationVacation(paginationElement, numberEachPage, number, list) {
    const pagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag('${paginationElement}', '${list}')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadDataForVacationTable(${i}, '${paginationElement}', '${list}')">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag('${paginationElement}', '${list}')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    pagination.innerHTML = html;
}

function createPaginationOffice(paginationElement, numberEachPage, number, list) {
    const pagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag('${paginationElement}', '${list}')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadDataForOfficeTable(${i}, '${paginationElement}', '${list}')">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag('${paginationElement}', '${list}')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    pagination.innerHTML = html;
}

function createPaginationStaffManager(paginationElement, numberEachPage, number, list) {
    const pagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag('${paginationElement}', '${list}')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadDataForStaffTableManager(${i}, '${paginationElement}', '${list}')">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag('${paginationElement}', '${list}')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    pagination.innerHTML = html;
}

function createPaginationVacationManager(paginationElement, numberEachPage, number, list) {
    const pagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag('${paginationElement}', '${list}')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadDataForVacationTableManager(${i}, '${paginationElement}', '${list}')">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag('${paginationElement}', '${list}')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    pagination.innerHTML = html;
}

function createPaginationVacationSend(paginationElement, numberEachPage, number, list) {
    const pagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag('${paginationElement}', '${list}')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadDataForVacationTableSend(${i}, '${paginationElement}', '${list}')">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag('${paginationElement}', '${list}')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    pagination.innerHTML = html;
}

function createPaginationTaskStaff(paginationElement, numberEachPage, number, list) {
    const pagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag('${paginationElement}', '${list}')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadDataForTaskTableStaff(${i}, '${paginationElement}', '${list}')">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag('${paginationElement}', '${list}')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    pagination.innerHTML = html;
}

function createPaginationTaskManager(paginationElement, numberEachPage, number, list) {
    const pagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag('${paginationElement}', '${list}')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadDataForTaskTableManager(${i}, '${paginationElement}', '${list}')">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag('${paginationElement}', '${list}')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    pagination.innerHTML = html;
}

function dataForPagination(data) {
    let result = [];
    let line = []
    data.forEach(e => {
        if (line.length < numberEachPage) {
            line.push(e);
        } else {
            result.push(line);
            line = []
            line.push(e);
        }
    })
    if (line.length != 0) {
        result.push(line);
    }
    return result;
}

function paginationColor(pagination, page) {
    Array.from(document.querySelectorAll('#' + pagination + ' li')).forEach(e => {
        e.classList.remove('active');
    })
    document.querySelector(`#${pagination} li:nth-child(${page + 1})`).classList.add('active');
}

function loadDataForStaffTable(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        tr.setAttribute('onclick', `showDetailStaff('${e.username}')`);
        if (e.position == 1) {
            tr.classList.add('bg-info');
            tr.classList.add('bg-gradient');
        }
        tr.dataset.id = e.id;
        tr.innerHTML = `
                <td>${e.name}</td>
                <td>${e.office}</td>
                <td>${(e.position == 1) ? 'Trưởng phòng' : 'Nhân viên'}</td>
                <td>${e.username}</td>
                `;
        table.appendChild(tr);
    });
}

function convertDateTime(date) {
    // convert to HH:mm DD/MM/YYYY
    const d = new Date(date);
    //add 0 if < 10
    const day = d.getDate() < 10 ? '0' + d.getDate() : d.getDate();
    //add 0 if < 10
    const month = d.getMonth() + 1 < 10 ? '0' + (d.getMonth() + 1) : d.getMonth() + 1;
    //add 0 if hour < 10
    const hours = d.getHours() < 10 ? '0' + d.getHours() : d.getHours();
    //add 0 if minutes < 10
    const minutes = d.getMinutes() < 10 ? '0' + d.getMinutes() : d.getMinutes();
    return time = `${hours}:${minutes} ${day}-${month}`;
}

function convertDateT(date) {
    // convert to DD/MM/YYYY
    const d = new Date(date);
    //add 0 if day < 10
    const day = d.getDate() < 10 ? '0' + d.getDate() : d.getDate();
    //add 0 if month < 10
    const month = d.getMonth() + 1 < 10 ? '0' + (d.getMonth() + 1) : d.getMonth() + 1;
    return time = `${day}-${month}`;
}

function loadDataForTaskTableManager(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        if (e.status != 7) {
            tr.setAttribute('onclick', `showDetailTaskManager(event, '${e.id}')`);
        }
        if (e.status == 7) {
            tr.style.cursor = 'default';
        }
        if (e.position == 1) {
            tr.classList.add('bg-info');
            tr.classList.add('bg-gradient');
        }
        tr.dataset.id = e.id;

        tr.innerHTML = `
                <td>${e.task_name}</td>
                <td>${e.username}</td>
                <td>${convertDateTime(e.date_begin)}</td>
                <td>${convertDateTime(e.deadline)}</td>
                <td>${convertStatusTask(e.status)}</td>
                `;
        table.appendChild(tr);
    });
}

function convertStatusTask(number) {
    if (number == 0) {
        return 'Mới tạo';
    } else if (number == 1) {
        return 'Đang làm';
    } else if (number == 2) {
        return 'Chờ duyệt';
    } else if (number == 3) {
        return 'Trung bình';
    } else if (number == 4) {
        return 'Khá';
    } else if (number == 5) {
        return 'Tốt';
    } else if (number == 7) {
        return 'Đã huỷ';
    }
}

function loadDataForTaskTableStaff(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        tr.setAttribute('onclick', `showDetailTaskStaff('${e.id}')`);

        if (e.status == 0) {
            tr.className = 'non-seen';
        }
        tr.dataset.id = e.id;
        tr.innerHTML = `
                <td>${convertDateTime(e.start_date)}</td>
                <td>${e.task_name}</td>
                <td>${convertDateTime(e.deadline)}</td>
                <td>${convertStatusTask(e.status)}</td>
                `;
        table.appendChild(tr);
    });
}

function downloadFiles(files, id) {
    const iconDownload = '<i class="fas fa-download btn-action"></i>';

    let html = '';
    // split files
    const filesSplit = files.split(',');
    filesSplit.forEach(e => {
        const buttonDownload = document.createElement('a');
        buttonDownload.className = 'mx-1';
        buttonDownload.title = e;
        buttonDownload.href = '/tasks/' + id + '/' + e;
        buttonDownload.target = '_blank';
        buttonDownload.innerHTML = iconDownload;
        html += buttonDownload.outerHTML;
    });

    // convert to text
    return html;
}

function rejectTask(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.REJECT_TASK);
    xhr.onload = function() {
        const data = JSON.parse(xhr.responseText);
        if (data.status == 'success') {
            showSuccessMessage(data.data.message);

            // reload page
            switchPage('task-manager');

            e.target.reset();

            const id = 'message-task-manager'
            createTaskDirectMessage1(data.data.task, id);

            scrollBottom(id);

            //show footer modal
            showFooterModalTask(1);

        } else {
            showErrorMessage(data.message);
        }
    };
    const data = new FormData(e.target);
    data.append('id', document.getElementById('task-id-manager').value);
    xhr.send(data);

}

function acceptTask(e) {
    const modal = new bootstrap.Modal(document.getElementById('rate-task'));
    modal.show();


    (function() {
        // select input have name "emotion"
        const emotion = document.querySelectorAll('input[name="emotion"]');
        // check if emotion is checked
        emotion.forEach(e => {
            e.addEventListener('change', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', API.ACCEPT_TASK);
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText);
                        const data = JSON.parse(xhr.responseText);
                        modal.hide();
                        if (data.status == 'success') {
                            showSuccessMessage(data.message);

                            showFooterModalTask(3);
                        } else {
                            showErrorMessage(data.message);
                        }
                    }
                }
                const data = new FormData();
                data.append('id', document.getElementById('task-id-manager').value);
                data.append('rate', e.id);
                xhr.send(data);
            });
        });
    })();
}

function startTask(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.START_TASK);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
            const response = JSON.parse(this.responseText);
            if (response.status == 'success') {
                showSuccessMessage(response.message);
                switchPage('task-staff');
                showFooterModalTask(1);
            }
        }
    }

    xhr.send(new FormData(e.target));
}

function turnInTask(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.TURN_IN_TASK);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);

            if (response.status == 'success') {
                showSuccessMessage(response.data.message);

                //reload page
                switchPage('task-staff');

                const id = 'task-dm-staff'
                createTaskDirectMessage1(response.data.task, id);

                scrollBottom(id);

                //reset form
                e.target.reset();

                //show footer modal
                showFooterModalTask(2);
            } else {
                showErrorMessage(response.message);
            }

        }
    }
    const data = new FormData(e.target)

    data.append('id', document.getElementById('task_id-start-task').value);
    xhr.send(data);
}

function scrollBottom(id) {
    setTimeout(() => {
        const element = document.getElementById(id);
        element.scrollTop = element.scrollHeight;
    }, 200);
}

function prePag(pagination, list) {
    let currentPage;
    const paginationList = document.querySelectorAll('#' + pagination + ' li');
    Array.from(paginationList).forEach((value, index) => {
        if (value.classList.contains('active')) {
            currentPage = index;
        }
    })

    if (currentPage == 1) {
        if (pagination.includes('task-staff-pagination')) {
            loadDataForTaskTableStaff(paginationList.length - 2, pagination, list);
        } else if (pagination.includes('task-manager-pagination')) {
            loadDataForTaskTableManager(paginationList.length - 2, pagination, list);
        } else if (pagination.includes('vacation-send')) {
            loadDataForVacationTableSend(paginationList.length - 2, pagination, list);
        } else if (pagination.includes('vacation-manager')) {
            loadDataForVacationTableManager(paginationList.length - 2, pagination, list);
        } else if (pagination.includes('staff-manager')) {
            loadDataForStaffTableManager(paginationList.length - 2, pagination, list);
        } else if (pagination.includes('staff')) {
            loadDataForStaffTable(paginationList.length - 2, pagination, list);
        } else if (pagination.includes('office')) {
            loadDataForOfficeTable(paginationList.length - 2, pagination, list);
        } else if (pagination.includes('vacation')) {
            loadDataForVacationTable(paginationList.length - 2, pagination, list);
        }
    } else {
        if (pagination.includes('task-staff-pagination')) {
            loadDataForTaskTableStaff(currentPage - 1, pagination, list);
        } else if (pagination.includes('task-manager-pagination')) {
            loadDataForTaskTableManager(currentPage - 1, pagination, list);
        } else if (pagination.includes('vacation-send')) {
            loadDataForVacationTableSend(currentPage - 1, pagination, list);
        } else if (pagination.includes('vacation-manager')) {
            loadDataForVacationTableManager(currentPage - 1, pagination, list);
        } else if (pagination.includes('staff-manager')) {
            loadDataForStaffTableManager(currentPage - 1, pagination, list);
        } else if (pagination.includes('staff')) {
            loadDataForStaffTable(currentPage - 1, pagination, list);
        } else if (pagination.includes('office')) {
            loadDataForOfficeTable(currentPage - 1, pagination, list);
        } else if (pagination.includes('vacation')) {
            loadDataForVacationTable(currentPage - 1, pagination, list);
        }
    }
}

function nextPag(pagination, list) {
    let currentPage;

    const paginationList = document.querySelectorAll('#' + pagination + ' li');
    Array.from(paginationList).forEach((value, index) => {
        if (value.classList.contains('active')) {
            currentPage = index;
        }
    })

    if (currentPage == paginationList.length - 2) {
        if (pagination.includes('task-staff-pagination')) {
            loadDataForTaskTableStaff(1, pagination, list);
        } else if (pagination.includes('task-manager-pagination')) {
            loadDataForTaskTableManager(1, pagination, list);
        } else if (pagination.includes('vacation-send')) {
            loadDataForVacationTableSend(1, pagination, list);
        } else if (pagination.includes('vacation-manager')) {
            loadDataForVacationTableManager(1, pagination, list);
        } else if (pagination.includes('staff-manager')) {
            loadDataForStaffTableManager(1, pagination, list);
        } else if (pagination.includes('office')) {
            loadDataForOfficeTable(1, pagination, list);
        } else if (pagination.includes('vacation')) {
            loadDataForVacationTable(1, pagination, list);
        } else if (pagination.includes('staff')) {
            loadDataForStaffTable(1, pagination, list);
        }
    } else {

        if (pagination.includes('task-staff-pagination')) {
            loadDataForTaskTableStaff(currentPage + 1, pagination, list);
        } else if (pagination.includes('task-manager-pagination')) {
            loadDataForTaskTableManager(currentPage + 1, pagination, list);
        } else if (pagination.includes('vacation-send')) {
            loadDataForVacationTableSend(currentPage + 1, pagination, list);
        } else if (pagination.includes('vacation-manager')) {
            loadDataForVacationTableManager(currentPage + 1, pagination, list);
        } else if (pagination.includes('staff-manager')) {
            loadDataForStaffTableManager(currentPage + 1, pagination, list);
        } else if (pagination.includes('office')) {
            loadDataForOfficeTable(currentPage + 1, pagination, list);
        } else if (pagination.includes('vacation')) {
            loadDataForVacationTable(currentPage + 1, pagination, list);
        } else if (pagination.includes('staff')) {
            loadDataForStaffTable(currentPage + 1, pagination, list);
        }
    }
}

function officeSelect(id) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.GET_OFFICES);
    xhr.onload = function() {
        if (this.status == 200) {
            const offices = JSON.parse(this.responseText);
            if (offices.status === 'success') {
                const select = document.getElementById(id);
                select.innerHTML = '';
                offices.data.forEach(office => {
                    const option = document.createElement('option');
                    option.value = office.id;
                    option.innerText = office.name;
                    select.appendChild(option);
                });
            }
        }
    }
    xhr.send();
}

function resetPassword(username) {
    // comfirm
    const comfirm = confirm(`Khởi tạo lại mật khẩu cho tài khoản ${username}?`);
    if (comfirm) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API.RESET_PASSWORD);
        xhr.onload = function() {
            if (this.status == 200) {
                const response = JSON.parse(this.responseText);
                if (response.status === 'success') {
                    showSuccessMessage(response.message);
                } else {
                    showErrorMessage(response.message);
                }
            }
        }
        const formData = new FormData();
        formData.append('username', username);
        xhr.send(formData);
    }
}

function showDetailStaff(username) {
    // open modal by js
    const detailModal = document.getElementById('view-staff');
    const modal = new bootstrap.Modal(detailModal)

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.GET_STAFF_DETAIL + '?username=' + username);
    xhr.onload = function() {
        if (this.status == 200) {
            const staff = JSON.parse(this.responseText);
            if (staff.status === 'success') {
                document.getElementById('view-staff-modal-image').src = '/images/avatars/' + staff.data.image;
                document.getElementById('view-staff-modal-fullname').innerText = staff.data.first_name + ' ' + staff.data.last_name;
                document.getElementById('view-staff-modal-email').innerText = staff.data.email;
                document.getElementById('view-staff-modal-firstname').value = staff.data.first_name;
                document.getElementById('view-staff-modal-lastname').value = staff.data.last_name;
                document.getElementById('view-staff-modal-office').value = staff.data.office;
                document.getElementById('view-staff-modal-position').value = (staff.data.position == 1) ? 'Trưởng phòng' : 'Nhân viên';
                document.getElementById('view-staff-modal-username').value = staff.data.username;
                document.getElementById('view-staff-modal-salary').value = staff.data.salary;
                document.getElementById('view-staff-modal-phone').value = staff.data.phone;
                document.getElementById('view-staff-modal-address').value = staff.data.address;
                document.getElementById('view-staff-modal-birthday').value = staff.data.birthday;
                document.getElementById('view-staff-modal-join').value = staff.data.join;
                document.getElementById('user-id').value = staff.data.username;
                document.getElementById('reset-password').setAttribute('onclick', `resetPassword('${staff.data.username}')`);
                modal.show()
            }
        }
    }
    xhr.send();
}

function showDetailStaffManager(username) {
    const detailModal = document.getElementById('view-staff-manager');
    const modal = new bootstrap.Modal(detailModal)

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.GET_STAFF_DETAIL_MANAGER + '?username=' + username);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.status === 'success') {
                document.getElementById('view-staff-manager-modal-image').src = '/images/avatars/' + response.data.image;
                document.getElementById('view-staff-manager-modal-fullname').innerText = response.data.first_name + ' ' + response.data.last_name;
                document.getElementById('view-staff-manager-modal-email').innerText = response.data.email;
                document.getElementById('view-staff-manager-modal-username').value = response.data.username;
                document.getElementById('view-staff-manager-modal-phone').value = response.data.phone;
                document.getElementById('view-staff-manager-modal-address').value = response.data.address;
                document.getElementById('view-staff-manager-modal-birthday').value = response.data.birthday;
                document.getElementById('view-staff-manager-modal-join').value = response.data.join;
                modal.show()
            }
        }
    }
    xhr.send();
}

function loadDataForOfficeTable(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        tr.setAttribute('onclick', `showDetailOffice('${e.code}')`);
        tr.dataset.id = e.id;
        tr.innerHTML = `
            <td> ${e.code} </td>
            <td> ${e.name} </td>
            <td> ${e.room} </td>
            <td> ${e.phone} </td>
        `;
        table.appendChild(tr);
    });
}

function showDetailOffice(id) {
    // open modal by js
    const detailModal = document.getElementById('view-office');
    const modal = new bootstrap.Modal(detailModal)
    let selectIndex = 0;

    const btnDelete = document.getElementById('btn-delete-office');
    btnDelete.setAttribute('onclick', `deleteOffice('${id}')`);

    const xml = new XMLHttpRequest();
    xml.open('GET', API.GET_STAFFS_OFFICE + '?id=' + id);
    xml.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.status === 'success') {
                const select = document.getElementById('captain-view-office');
                select.innerHTML = '';

                if (response.data.length > 0) {
                    select.disabled = false;
                    response.data.forEach((e, i) => {
                        const option = document.createElement('option');
                        option.value = e.username;
                        option.innerText = e.username;
                        if (e.position == 1) {
                            selectIndex = i;
                        }

                        select.appendChild(option);
                    });
                } else {
                    //disable select
                    select.disabled = true;
                }

                select.onchange = () => {
                    const changeBtn = document.getElementById('icon-swap-captain');
                    changeBtn.setAttribute('onclick', `changeCaptain('${select.value}')`);
                }


            }
        }
    }
    xml.send();

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.VIEW_OFFICE + '?id=' + id);
    xhr.onload = function() {
        if (this.status == 200) {
            const office = JSON.parse(this.responseText);

            if (office.status === 'success') {
                document.getElementById('name-view-office').value = office.data.name;
                document.getElementById('room-view-office').value = office.data.room_number;
                document.getElementById('captain-view-office').value = 1;
                document.getElementById('phone-view-office').value = office.data.phone;
                document.getElementById('create-view-office').value = office.data.date_begin;
                document.getElementById('description-view-office').value = office.data.description;
                document.getElementById('change-office-id').value = office.data.code;
                document.getElementById('change-phone-id').value = office.data.phone;
                document.getElementById('change-name-id').value = office.data.name;
                document.getElementById('change-description-id').value = office.data.description;
                document.getElementById('change-room-id').value = office.data.room_number;
                modal.show()
                const select = document.getElementById('captain-view-office');
                select.selectedIndex = selectIndex;
                const changeBtn = document.getElementById('icon-swap-captain');
                changeBtn.setAttribute('onclick', `changeCaptain('${select.value}')`);
            }
        }
    }
    xhr.send();
}

function changeCaptain(name) {
    if (name === '') {
        return
    }
    const modal = confirm(`Bạn có chắc chắn muốn chọn "${name}" làm trường phòng?`);
    if (modal) {
        const officeId = document.getElementById('change-office-id').value;
        const captainId = document.getElementById('captain-view-office').value;
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API.CHANGE_CAPTAIN);
        xhr.onload = function() {
            if (this.status == 200) {
                document.getElementById('captain-view-office').value = captainId;

                const data = JSON.parse(this.responseText);
                if (data.status === 'success') {
                    showSuccessMessage(data.message);
                } else {
                    showErrorMessage(data.message);
                }
            }
        }
        const formData = new FormData();
        formData.append('office', officeId);
        formData.append('new', captainId);
        xhr.send(formData);
    }
}

function deleteOffice(name) {
    const room = document.getElementById('change-office-id').value;
    const comfirm = confirm(`Bạn có chắn chắn xoá phòng ${name}?`);
    if (comfirm) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API.DELETE_OFFICE);
        xhr.onload = function() {
            if (this.status == 200) {
                const data = JSON.parse(this.responseText);
                if (data.status === 'success') {
                    showSuccessMessage(data.message);
                    switchPage('office');
                    //close modal in bootstrap 5 by js
                    const btn = document.getElementById('view-office-close');
                    btn.click();

                } else {
                    showErrorMessage(data.message);
                }
            }
        }
        const formData = new FormData();
        formData.append('room', room);
        xhr.send(formData);
    }
}

function updateOffice(e) {
    e.preventDefault();
    //old data
    const officeId = document.getElementById('change-office-id').value;
    const phone = document.getElementById('change-phone-id').value;
    const name = document.getElementById('change-name-id').value;
    const description = document.getElementById('change-description-id').value;
    const room = document.getElementById('change-room-id').value;

    // new data
    const newPhone = document.getElementById('phone-view-office').value;
    const newName = document.getElementById('name-view-office').value;
    const newDescription = document.getElementById('description-view-office').value;
    const newRoom = document.getElementById('room-view-office').value;

    // compare old and new data
    if (phone != newPhone || name != newName || description != newDescription || room != newRoom) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API.UPDATE_OFFICE);
        xhr.onload = function() {
            if (this.status == 200) {
                const response = JSON.parse(this.responseText);
                if (response.status === 'success') {
                    showSuccessMessage(response.message);
                    switchPage('office')
                } else {
                    showErrorMessage(response.message);
                }
            }
        }
        const formData = new FormData(document.getElementById('view-office-form'));
        const id = document.getElementById('change-office-id').value;
        formData.append('id', id);
        xhr.send(formData);
    } else {
        showErrorMessage('Không có thay đổi nào');
    }
}

function showErrorMessage(content) {
    const alert = document.getElementById('alert-full');
    // show alert 3s
    alert.classList.remove('d-none');
    document.getElementById('alert-content').innerText = content;
    setTimeout(function() {
        alert.classList.add('d-none');
    }, 2000);

    const alertIcon = document.getElementById('alert-icon');
    alertIcon.children[1].classList.remove('d-none');
    alertIcon.children[0].classList.add('d-none');
}

function showSuccessMessage(content) {

    const alert = document.getElementById('alert-full');
    // show alert 3s
    alert.classList.remove('d-none');
    document.getElementById('alert-content').innerText = content;
    setTimeout(function() {
        alert.classList.add('d-none');
    }, 2000);

    const alertIcon = document.getElementById('alert-icon');
    alertIcon.children[0].classList.remove('d-none');
    alertIcon.children[1].classList.add('d-none');
}

function convertStatusVacation(status) {
    if (status == '0') {
        return 'Chờ duyệt';
    } else if (status == '2') {
        return 'Đông ý';
    } else {
        return 'Từ chối';
    }
}

function loadDataForVacationTable(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    let count = 0;
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        tr.setAttribute('onclick', `
            showDetailVacation('${e.id}')
            `);
        if (e.seen == 1 && e.status == 0) {
            tr.className = 'non-seen';
        }
        tr.dataset.id = e.id;
        tr.innerHTML = ` 
        <td> ${ e.send_at } </td>  
        <td> ${ e.username } </td>  
        <td> ${ e.office } </td> 
        <td> ${ e.date_off } </td> 
        <td> ${ convertStatusVacation(e.status) } </td>
            `;
        table.appendChild(tr);
    });
    for (let i = 0; i < dataPagination.length; i++) {
        for (let j = 0; j < dataPagination[i].length; j++) {
            if (dataPagination[i][j].seen) {
                count++;
            }
        }
    }
    document.getElementById('vacation-number').innerHTML = count;
}


function loadDataForVacationTableSend(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    let count = 0;
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        tr.setAttribute('onclick', `showDetailVacationSend('${e.id}')`);
        if (e.status != 0 && e.seen == 1) {
            tr.className = 'non-seen';
        }
        tr.dataset.id = e.id;
        tr.innerHTML = ` 
        <td> ${ e.send_at } </td>  
        <td> ${ e.date_off } </td>  
        <td> ${ e.number_off } </td> 
        <td> ${convertStatusVacation( e.status) } </td>
            `;
        table.appendChild(tr);
    });
    for (let i = 0; i < dataPagination.length; i++) {
        for (let j = 0; j < dataPagination[i].length; j++) {
            if (dataPagination[i][j].seen) {
                count++;
            }
        }
    }
    document.getElementById('vacation-send-number').innerHTML = count;
}

function loadDataForStaffTableManager(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        tr.setAttribute('onclick', `
            showDetailStaffManager('${e.username}')
            `);
        tr.dataset.id = e.id;
        tr.innerHTML = ` 
        <td> ${ e.name } </td>  
        <td> ${ e.username } </td>  
        <td> ${ e.phone } </td> 
        <td> ${ e.email } </td>
            `;
        table.appendChild(tr);
    });

}

function loadDataForVacationTableManager(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    let count = 0;
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        tr.setAttribute('onclick', `
            showDetailVacationManager('${e.id}')
            `);
        if (e.seen) {
            tr.className = 'non-seen';
        }
        tr.dataset.id = e.id;
        tr.innerHTML = `
        <td> ${e.send_at} </td>
        <td> ${e.username} </td>
        <td> ${e.date_off} </td>
        <td> ${convertStatusVacation(e.status)} </td>
        `;
        table.appendChild(tr);
    });
    for (let i = 0; i < dataPagination.length; i++) {
        for (let j = 0; j < dataPagination[i].length; j++) {
            if (dataPagination[i][j].seen) {
                count++;
            }
        }
    }
    document.getElementById('vacation-number').innerHTML = count;
}

function showDetailVacation(id) {
    // open modal by js
    const detailModal = document.getElementById('view-vacation');
    const modal = new bootstrap.Modal(detailModal)

    // seen vacation
    const xml = new XMLHttpRequest();
    xml.open('POST', API.SEEN_VACATION_ALL);
    xml.onload = function() {
        if (this.status == 200) {
            switchPage('vacation');
        }
    }
    const formData = new FormData();
    formData.append('id', id);
    xml.send(formData);

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.VIEW_VACATION + '?id=' + id);
    xhr.onload = function() {
        if (this.status == 200) {
            const vacation = JSON.parse(this.responseText);
            if (vacation.status === 'success') {
                document.getElementById('seen-at-view-vacation').innerHTML = vacation.data.send_at;
                document.getElementById('name-view-vacation').value = vacation.data.username;
                document.getElementById('office-view-vacation').value = vacation.data.office;
                document.getElementById('date-view-vacation').value = vacation.data.date_off;
                document.getElementById('number-view-vacation').value = vacation.data.number_off;
                document.getElementById('reason-view-vacation').value = vacation.data.description;
                document.getElementById('id-view-vacation').value = vacation.data.id;
                if (vacation.data.file != null) {
                    document.getElementById('file-view-vacation').href = '/vacations/' + vacation.data.file;
                    document.getElementById('file-view-vacation1').style.display = 'inline-block';
                } else {
                    document.getElementById('file-view-vacation1').style.display = 'none'
                }
                modal.show()
                showFooterModalTask(vacation.data.status);
            }
        }
    }
    xhr.send();
}

function showDetailVacationManager(id) {
    // open modal by js
    const detailModal = document.getElementById('view-vacation-manager');
    const modal = new bootstrap.Modal(detailModal)

    // seen vacation-manager
    const xml = new XMLHttpRequest();
    xml.open('POST', API.SEEN_VACATION_ALL);
    xml.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText, 'see this vacation-manager');
            switchPage('vacation-request');
        }
    }
    const formData = new FormData();
    formData.append('id', id);
    xml.send(formData);

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.VIEW_VACATION_MANAGER + '?id=' + id);
    xhr.onload = function() {
        if (this.status == 200) {
            const vacation = JSON.parse(this.responseText);
            if (vacation.status === 'success') {
                document.getElementById('seen-at-view-vacation-manager').innerHTML = vacation.data.send_at;
                document.getElementById('name-view-vacation-manager').value = vacation.data.username;
                document.getElementById('date-view-vacation-manager').value = vacation.data.date_off;
                document.getElementById('number-view-vacation-manager').value = vacation.data.number_off;
                document.getElementById('reason-view-vacation-manager').value = vacation.data.description;
                document.getElementById('id-view-vacation-manager').value = vacation.data.id;
                document.getElementById('file-view-vacation-manager').href = '/files/' + vacation.data.id + '/' + vacation.data.file;
                modal.show()
            }
        }
    }
    xhr.send();
}

function disagreeVacation() {
    const reason = prompt('Nhập lý do từ chối', 'Lý do không chính đáng');
    if (reason.length > 0) {
        const id = document.getElementById('id-view-vacation').value;
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API.DISAGREE_VACATION_ALL);
        xhr.onload = function() {
            if (this.status == 200) {
                const vacation = JSON.parse(this.responseText);
                if (vacation.status === 'success') {
                    switchPage('vacation');
                    showFooterModalTask(3);

                    showSuccessMessage(vacation.message);
                } else {
                    showErrorMessage(vacation.message);
                }
            }
        }
        const formData = new FormData();
        formData.append('id', id);
        formData.append('reason', reason);
        xhr.send(formData);
    }
}

function agreeVacation() {
    const id = document.getElementById('id-view-vacation').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.AGREE_VACATION_ALL);
    xhr.onload = function() {
        if (this.status == 200) {
            const vacation = JSON.parse(this.responseText);
            if (vacation.status === 'success') {
                switchPage('vacation');
                showFooterModalTask(2);

                showSuccessMessage(vacation.message);
            } else {
                showErrorMessage(vacation.message);
            }
        }
    }
    const formData = new FormData();
    formData.append('id', id);
    xhr.send(formData);
}

function disagreeVacationManager() {
    const reason = prompt('Nhập lý do từ chối', 'Lý do không chính đáng');
    if (reason.length > 0) {
        const id = document.getElementById('id-view-vacation-manager').value;
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API.DISAGREE_VACATION_ALL);
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
                switchPage('vacation-request');
            }
        }
        const formData = new FormData();
        formData.append('id', id);
        formData.append('reason', reason);
        xhr.send(formData);
    }
}

function agreeVacationManager() {
    const id = document.getElementById('id-view-vacation-manager').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.AGREE_VACATION_ALL);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
            switchPage('vacation-request');
        }
    }
    const formData = new FormData();
    formData.append('id', id);
    xhr.send(formData);
}

function showDetailVacationSend(id) {
    // open modal by js
    const detailModal = document.getElementById('view-vacation-send');
    const modal = new bootstrap.Modal(detailModal)

    // seen vacation-send
    const xml = new XMLHttpRequest();
    xml.open('POST', API.SEEN_VACATION_ALL);
    xml.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText, 'see this vacation-send');
        }
    }
    const formData = new FormData();
    formData.append('id', id);
    xml.send(formData);

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.VIEW_VACATION_SEND_ALL + '?id=' + id);
    xhr.onload = function() {
        if (this.status == 200) {
            const vacation = JSON.parse(this.responseText);
            if (vacation.status === 'success') {
                document.getElementById('send-view-vacation-send').innerHTML = vacation.data.send_at;
                document.getElementById('date-view-vacation-send').value = vacation.data.date_off;
                document.getElementById('number-view-vacation-send').value = vacation.data.number_off;
                document.getElementById('reason-view-vacation-send').value = vacation.data.description;
                document.getElementById('feedback-view-vacation-send').value = vacation.data.feedback;
                document.getElementById('id-view-vacation-send').value = vacation.data.id;
                console.log(vacation.data.file);
                if (vacation.data.file != null) {
                    document.getElementById('file-view-vacation-send').href = '/vacations/' + vacation.data.file;
                    document.getElementById('file-view-vacation-send').style.display = 'inline-block';
                } else {
                    document.getElementById('file-view-vacation-send').style.display = 'none';
                }
                modal.show()
            }
        }
    }
    xhr.send();
}

function addVacationManager() {
    const modal = new bootstrap.Modal(document.getElementById('add-vacation-send'));

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.CHECK_BEFORE_VACATION);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
            const response = JSON.parse(this.responseText);
            if (response.status === 'success') {
                if (localStorage.getItem('status-button') === 0 || localStorage.getItem('status-button') === null) {
                    document.getElementById('btn-send-vacation').disabled = true;
                } else {
                    document.getElementById('btn-send-vacation').disabled = false;
                }

                document.getElementById('lastest-add-vacation-send').value = response.data.latest_date_off;
                document.getElementById('available-add-vacation-send').value = response.data.remain_day;
                modal.show();

                let select = document.getElementById('number-dayoff-vacation-send');
                select.innerHTML = '';
                for (let i = 1; i <= response.data.remain_day; i++) {
                    let option = document.createElement('option');
                    option.value = i;
                    option.innerHTML = i;
                    select.appendChild(option);
                }

                const date = document.getElementById('date-add-vacation-send');
                date.addEventListener('change', function() {
                    //compare date
                    const date_off = new Date(date.value);
                    const lastest_off_date = new Date(response.data.latest_date_off);

                    const diff = date_off.getTime() - lastest_off_date.getTime();
                    console.log(diff);
                    // convert diff to days
                    const days1 = Math.floor(diff / (1000 * 60 * 60 * 24));
                    //get time in Asia/Ho Chi Minh
                    const today = new Date(new Date().toLocaleDateString('vn-VN', { timeZone: 'Asia/Ho_Chi_Minh' }));
                    const diff2 = date_off.getTime() - today.getTime();
                    // convert diff to days
                    const days2 = Math.floor(diff2 / (1000 * 60 * 60 * 24));

                    const icon = document.getElementById('icon-check-date1');

                    if (days1 > 6 && days2 > 1) {

                        //get first child of icon
                        icon.children[0].classList.remove('d-none');
                        icon.children[1].classList.add('d-none');

                        //enable button
                        document.getElementById('btn-send-vacation').disabled = false;

                        //add 1 to localStorage
                        localStorage.setItem('status-button', 1);
                    } else {
                        date.value = '';
                        icon.children[1].classList.remove('d-none');
                        icon.children[0].classList.add('d-none');

                        //disable button
                        document.getElementById('btn-send-vacation').disabled = true;
                        localStorage.setItem('status-button', 0);
                    }
                });
            }
        }
    }

    xhr.send();

}

function createOffRequest(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.ADD_VACATION);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.status === 'success') {
                showSuccessMessage(response.message);
                switchPage('vacation-send');

                // reset form
                document.getElementById('add-vacation-send-form').reset();

            } else {
                showErrorMessage(response.message);
            }
        }
    }
    xhr.send(new FormData(e.target));
}
/* function offRequest() {
    const modal = new bootstrap.Modal(document.getElementById('add-vacation-send'));

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.CHECK_BEFORE_VACATION);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
            const vacation = JSON.parse(this.responseText);
            if (vacation.status === 'success') {
                if (localStorage.getItem('status-button') === 0 || localStorage.getItem('status-button') === null) {
                    document.getElementById('btn-send-vacation').disabled = true;
                } else {
                    document.getElementById('btn-send-vacation').disabled = false;
                }
                document.getElementById('id-add-vacation-send').value = vacation.data.date_off;
                document.getElementById('lastest-add-vacation-send').value = vacation.data.lastest_off_date;
                document.getElementById('available-add-vacation-send').value = vacation.data.available_off_date;

                let select = document.getElementById('number-dayoff-vacation-send');
                modal.show();

                for (let i = 1; i <= vacation.data.available_off_date; i++) {
                    let option = document.createElement('option');
                    option.value = i;
                    option.innerHTML = i;
                    select.appendChild(option);
                }

                const date = document.getElementById('date-add-vacation-send');
                date.addEventListener('change', function() {
                    //compare date
                    const date_off = new Date(date.value);
                    const lastest_off_date = new Date(vacation.data.lastest_off_date);
                    const diff = date_off.getTime() - lastest_off_date.getTime();
                    // convert diff to days
                    const days1 = Math.floor(diff / (1000 * 60 * 60 * 24));

                    //get time in Asia/Ho Chi Minh
                    const today = new Date(new Date().toLocaleDateString('vn-VN', { timeZone: 'Asia/Ho_Chi_Minh' }));
                    const diff2 = date_off.getTime() - today.getTime();
                    // convert diff to days
                    const days2 = Math.floor(diff2 / (1000 * 60 * 60 * 24));

                    const icon = document.getElementById('icon-check-date');

                    if (days1 > 6 && days2 > 1) {
                        //get first child of icon
                        icon.children[0].classList.remove('d-none');
                        icon.children[1].classList.add('d-none');

                        //enable button
                        document.getElementById('btn-send-vacation').disabled = false;

                        //add 1 to localStorage
                        localStorage.setItem('status-button', 1);
                    } else {
                        icon.children[1].classList.remove('d-none');
                        icon.children[0].classList.add('d-none');

                        //disable button
                        document.getElementById('btn-send-vacation').disabled = true;
                        localStorage.setItem('status-button', 0);
                    }
                })
            }
        }
    }
    xhr.send();
} */

function viewProfile() {
    const modal = new bootstrap.Modal(document.getElementById('view-profile'));
    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.VIEW_PROFILE_ALL);
    xhr.onload = function() {
        if (this.status == 200) {
            const profile = JSON.parse(this.responseText);

            if (profile.status === 'success') {
                document.getElementById('view-profile-modal-image').src = '/images/avatars/' + profile.data.image;
                document.getElementById('view-profile-modal-fullname').innerText = profile.data.first_name + ' ' + profile.data.last_name;
                document.getElementById('view-profile-modal-username').innerText = profile.data.username;
                document.getElementById('view-profile-modal-email').value = profile.data.email;
                document.getElementById('view-profile-modal-firstname').value = profile.data.first_name;
                document.getElementById('view-profile-modal-lastname').value = profile.data.last_name;
                document.getElementById('view-profile-modal-position').value = (profile.data.position == 1) ? 'Captain' : 'Employee';
                document.getElementById('view-profile-modal-salary').value = profile.data.salary;
                document.getElementById('view-profile-modal-phone').value = profile.data.phone;
                document.getElementById('view-profile-modal-address').value = profile.data.address;
                // convert to yyyy-MM-dd
                const date = new Date(profile.data.join);
                const year = date.getFullYear();
                //add 0 if month < 10
                const month = (date.getMonth() + 1 < 10) ? '0' + (date.getMonth() + 1) : date.getMonth() + 1;
                // add 0 if day < 10
                const day = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate();

                document.getElementById('view-profile-modal-join').value = year + '-' + month + '-' + day;
                document.getElementById('view-profile-modal-birthday').value = profile.data.birthday;
                modal.show()

                const buttonChangePassword = document.getElementById('btn-change-password');

                if (localStorage.getItem('change-password') === 0 || localStorage.getItem('change-password') === null) {
                    buttonChangePassword.disabled = true;
                }

                const passwordInput = document.querySelectorAll('.view-profile-modal-new-password');
                passwordInput.forEach(function(item) {
                    item.addEventListener('keyup', function() {
                        let pass1 = passwordInput[0].value;
                        let pass2 = passwordInput[1].value;
                        const icon = document.querySelectorAll('.icon-password-check')
                        if (pass1 === pass2 && pass1 !== '' && pass2 !== '' && pass1.length >= 6) {
                            icon.forEach(function(item) {
                                item.children[0].classList.remove('d-none');
                                item.children[1].classList.add('d-none');
                                localStorage.setItem('change-password', 1);
                                buttonChangePassword.disabled = false;
                            })
                        } else {
                            icon.forEach(function(item) {
                                item.children[1].classList.remove('d-none');
                                item.children[0].classList.add('d-none');
                                localStorage.setItem('change-password', 0);
                                buttonChangePassword.disabled = true;
                            })

                        }
                    })

                })
            }
        }
    }
    xhr.send();
}

function updateProfile(e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.UPDATE_PROFILE_ALL);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.status === 'success') {
                showSuccessMessage(response.message);
            } else {
                showErrorMessage(response.message);
            }
        }
    }
    xhr.send(new FormData(document.getElementById('update-profile')));
}

function changePassword(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.CHANGE_PASSWORD_ALL);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.status === 'success') {
                showSuccessMessage(response.message);
                document.getElementById('form-change-password').reset();
            } else {
                showErrorMessage(response.message);
                document.getElementById('form-change-password').reset();
            }
        }
    }

    xhr.send(new FormData(document.getElementById('form-change-password')));
}

function createTask(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.CREATE_TASK);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
            const response = JSON.parse(this.responseText);

            if (response.status === 'success') {
                showSuccessMessage(response.message);
                switchPage('task-manager');
                e.target.reset();
                document.getElementById('icon-check-date').children[0].classList.add('d-none');
                document.getElementById('icon-check-date').children[1].classList.remove('d-none');
            } else {
                showErrorMessage(response.message);
            }
        }
    }
    xhr.send(new FormData(e.target));

}

function showFooterModalTask(number) {
    const controller = document.getElementsByClassName('controller-task');

    let i = 0;
    Array.from(controller).forEach(function(item) {
        if (item.id.includes(number)) {
            item.classList.remove('d-none');
            i++;
        } else {
            item.classList.add('d-none');
        }
    })

    if (i === 0) {
        document.getElementById('status-footer').classList.remove('d-none');
    }
}

function createTaskDirectMessage1(data, id) {
    const taskDirectMessage = document.getElementById(id);
    let div = document.createElement('div');
    div.className = 'border-bottom p-2';
    div.innerHTML = '';
    let html =
        `<div class="d-flex flex-column align-items-end mb-1">
            <span class="time-message">${data.time}</span>
            <div class="p-3 border sender-message">
                <span>${data.message}</span>
            </div>
        </div>
        <div class="d-flex justify-content-end">` + downloadFiles(data.file, data.task_id) +
        "</div>";

    div.innerHTML = html;
    taskDirectMessage.appendChild(div);
}

function createTaskDirectMessage2(data, id) {
    const taskDirectMessage = document.getElementById(id);
    let div = document.createElement('div');
    div.className = 'border-bottom p-2';
    div.innerHTML = '';
    let html =
        `<div class="d-flex flex-column align-items-start mb-1">
            <span class="time-message">${data.time}</span>
            <div class="p-3 receiver-message">
                <span>${data.message}</span>
            </div>
        </div>
        <div>` + downloadFiles(data.file, data.task_id) +
        "</div>";
    div.innerHTML = html;
    taskDirectMessage.appendChild(div);
}



function showDetailTaskManager(event, id) {

    const modal = new bootstrap.Modal(document.getElementById('view-task-manager'));


    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.VIEW_DETAIL_TASK_MANAGER + '?id=' + id);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            console.log(response);

            if (response.status == 'success') {
                showFooterModalTask(response.data[0].status);
                modal.show();

                //set data

                document.getElementById('task-id-manager').value = response.data[0].task_id;

                const taskDirectMessage = 'message-task-manager';
                scrollBottom(taskDirectMessage);
                document.getElementById(taskDirectMessage).innerHTML = '';

                response.data.forEach(function(item, index) {
                    if (index % 2 === 0) {
                        createTaskDirectMessage1(item, taskDirectMessage);
                    } else {
                        createTaskDirectMessage2(item, taskDirectMessage);
                    }
                })

            }
        }
    }
    xhr.send();
}

function showDetailTaskStaff(id) {
    const detailModal = document.getElementById('view-task-staff');
    const modal = new bootstrap.Modal(detailModal)


    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.VIEW_TASK_STAFF + '?id=' + id);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            console.log(response);
            if (response.status == 'success') {
                showFooterModalTask(response.data[0].status);
                console.log(response.data[0].status);
                modal.show();

                document.getElementById('task_id-start-task').value = id;

                const taskDirectMessage = 'task-dm-staff';
                document.getElementById(taskDirectMessage).innerHTML = '';

                response.data.forEach(function(item, index) {
                    if (index % 2 === 1) {
                        createTaskDirectMessage1(item, taskDirectMessage);
                    } else {
                        createTaskDirectMessage2(item, taskDirectMessage);
                    }
                })

                scrollBottom(taskDirectMessage);
            }
        }
    }
    xhr.send();
}

function logout() {
    var logout = document.getElementById('logout');
    logout.addEventListener('click', function() {
        //redirect to login page
        window.location.href = '/logout.php';
    })
}

function cancelTask(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.CANCEL_TASK);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);

            if (response.status == 'success') {
                showSuccessMessage(response.message);
                switchPage('task-manager');
            } else {
                showErrorMessage(response.message);
            }
        }
    }
    xhr.send(new FormData(e.target));
}

function addOffice(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.ADD_OFFICE);
    xhr.onload = function() {
        if (this.status == 200) {
            const data = JSON.parse(this.responseText);
            if (data.status === 'success') {
                showSuccessMessage(data.message);

                //reset form
                document.getElementById('add-office-form').reset();

                //reload table
                switchPage('office');
            } else {
                showErrorMessage(data.message);
            }
        }
    }
    xhr.send(new FormData(document.getElementById('add-office-form')));
}

function officeSelect1(id) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.GET_OFFICES);
    xhr.onload = function() {
        if (this.status == 200) {
            const offices = JSON.parse(this.responseText);
            if (offices.status === 'success') {
                const select = document.getElementById(id);
                select.innerHTML = '<option value="ALL">Tất Cả</option>';
                offices.data.forEach(office => {
                    const option = document.createElement('option');
                    option.value = office.id;
                    option.innerText = office.name;
                    select.appendChild(option);
                });
            }
        }
    }
    xhr.send();
}

function addStaff(e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.ADD_STAFF);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
            const data = JSON.parse(this.responseText);
            console.log(data);
            if (data.status === 'success') {
                showSuccessMessage(data.message);

                //reset form
                document.getElementById('add-staff-form').reset();

                //reload table
                switchPage('staff');

                // reload check user
                document.getElementById('username-error-add-staff').innerText = '';
            } else {
                showErrorMessage(data.message);
            }
        }
    }
    xhr.send(new FormData(document.getElementById('add-staff-form')));
}

function changeSalary() {
    const modal = confirm('Bạn có chắc chắn muốn thay đổi lương cho nhân viên này?');
    if (modal) {
        const salary = document.getElementById('view-staff-modal-salary').value;
        const username = document.getElementById('view-staff-modal-username').value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', API.CHANGE_SALARY);
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
                const data = JSON.parse(this.responseText);
                if (data.status === 'success') {
                    showSuccessMessage(data.message);
                } else {
                    showErrorMessage(data.message);
                }
            }
        }
        const data = new FormData();
        data.append('salary', salary);
        data.append('username', username);
        xhr.send(data);
    }
}


if (!currentHref.includes('change') && !currentHref.includes('login')) {
    (function() {

        const xhr = new XMLHttpRequest();
        xhr.open('GET', API.GET_AVATAR_ALL);
        xhr.onload = function() {
            if (this.status == 200) {
                const data = JSON.parse(this.responseText);
                if (data.status === 'success') {
                    const avatar = document.getElementById('avatar');
                    avatar.src = '/images/avatars/' + data.avatar;
                }
            }
        }
        xhr.send();

        const input = document.getElementById('change-avatar');
        input.addEventListener('change', function(evt) {
            const tgt = evt.target;
            const files = tgt.files;

            // check file size and type
            if (files.length > 0) {
                const file = files[0];
                if (file.size > 5000000) {
                    showErrorMessage('Kích thước file lớn hơn 5MB');
                    return;
                }
                if (file.type !== 'image/jpeg' && file.type !== 'image/png' && file.type !== 'image/webp') {
                    showErrorMessage('Chỉ hỗ trợ file ảnh jpg, png, webp');
                    return;
                }
            }

            // FileReader support
            if (FileReader && files && files.length) {
                let fr = new FileReader();
                fr.onload = () => {
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', API.CHANGE_AVATAR_ALL);
                        xhr.onload = function() {
                            if (this.status == 200) {
                                console.log(this.responseText);
                                const response = JSON.parse(this.responseText);
                                if (response.status === 'success') {
                                    showSuccessMessage(response.message);
                                    //reload page
                                    document.getElementById('view-profile-modal-image').src = fr.result;
                                    document.getElementById('avatar').src = fr.result;
                                } else {
                                    showErrorMessage(response.message);
                                }
                            }
                        }
                        xhr.send(new FormData(document.getElementById('change-avt-form')));
                    }
                    // read image obj
                fr.readAsDataURL(files[0]);
            }
        })
    })()
}

if (currentHref.includes('change')) {
    const btn = document.getElementById('change-password__button');

    // disable button
    btn.disabled = true;
    btn.style.backgroundColor = "rgb(104 75 75)";
    btn.style.cursor = "not-allowed";

    const input = document.querySelectorAll('input');
    input.forEach(function(item) {
        item.addEventListener('keyup', function() {
            const input1 = document.getElementById('new-password');
            const input2 = document.getElementById('confirm-password');
            if (input1.value === input2.value && input1.value.length > 7) {
                //show icon
                document.getElementById('check1').style.display = 'block';
                document.getElementById('check2').style.display = 'block';
                btn.disabled = false;
                btn.style.backgroundColor = "rgb(24 21 21)";
                btn.style.cursor = "pointer";
            } else {
                document.getElementById('check1').style.display = 'none';
                document.getElementById('check2').style.display = 'none';
                btn.disabled = true;
                btn.style.backgroundColor = "rgb(104 75 75)";
                btn.style.cursor = "not-allowed";
            }
        })
    })
}

// js admin
if (currentHref.includes('admin/')) {
    // STAFF
    logout()
        //load staffs
    function loadData(page) {
        if (page === 'staff') {
            document.title = "Quản lý nhân viên";
            const staffPaginationId = 'staff-pagination';
            const staffList = 'staff-list';
            const select = 'office-staff';

            officeSelect1(select);

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_STAFFS + '?office=ALL');
            xhr.onload = function() {
                if (this.status == 200) {
                    console.log(this.responseText);
                    const staffs = JSON.parse(this.responseText);
                    if (staffs.status === 'success') {

                        if (staffs.data.length > 0) {
                            // cerate pagination
                            createPaginationStaff(staffPaginationId, numberEachPage, staffs.data.length, staffList);

                            //create staffs array
                            dataPagination = dataForPagination(staffs.data);

                            //load staffs to table
                            loadDataForStaffTable(1, staffPaginationId, staffList);
                        } else {
                            const table = document.getElementById(staffList);
                            table.innerHTML = `<tr><td colspan="4"> Không có dữ liệu </td></tr>`;
                        }

                    }
                }
            }
            xhr.send();

            const selectInput = document.getElementById(select);
            selectInput.addEventListener('change', function() {
                const number = this.value;
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.GET_STAFFS + '?office=' + number);
                xhr.onload = function() {
                    if (this.status == 200) {
                        console.log(this.responseText);
                        const staffs = JSON.parse(this.responseText);
                        if (staffs.status === 'success') {

                            if (staffs.data.length > 0) {
                                // cerate pagination
                                createPaginationStaff(staffPaginationId, numberEachPage, staffs.data.length, staffList);

                                //create staffs array
                                dataPagination = dataForPagination(staffs.data);

                                //load staffs to table
                                loadDataForStaffTable(1, staffPaginationId, staffList);
                            } else {
                                const table = document.getElementById(staffList);
                                table.innerHTML = `<tr><td colspan="4"> Không có dữ liệu </td></tr>`;
                            }
                        }
                    }
                }
                xhr.send();
            })

            let search = document.getElementById('search-staff-input');
            const btnSearch = document.getElementById('search-staff');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                const searchValue = (search.value) ? search.value : '[[';
                xhr.open('GET', API.GET_STAFFS + '?search=' + searchValue + '&office=' + selectInput.value);
                xhr.onload = function() {
                    if (this.status == 200) {
                        console.log(this.responseText);
                        const staffs = JSON.parse(this.responseText);
                        if (staffs.status === 'success') {

                            // cerate pagination
                            createPaginationStaff(staffPaginationId, numberEachPage, staffs.data.length, staffList);

                            //create staffs array
                            dataPagination = dataForPagination(staffs.data);

                            //load staffs to table
                            loadDataForStaffTable(1, staffPaginationId, staffList);

                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })


        } else if (page === 'office') {
            document.title = "Quản lý phòng ban";
            const officePaginationId = 'office-pagination';
            const officeList = 'office-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_OFFICES_LIST, true);
            xhr.onload = function() {
                if (this.status == 200) {

                    const offices = JSON.parse(this.responseText);

                    if (offices.status === 'success') {

                        if (offices.data.length > 0) {
                            // cerate pagination
                            createPaginationOffice(officePaginationId, numberEachPage, offices.data.length, officeList);

                            //create offices array
                            dataPagination = dataForPagination(offices.data);

                            //load offices to table
                            loadDataForOfficeTable(1, officePaginationId, officeList);
                        } else {
                            const table = document.getElementById(officeList);
                            table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-office-input');
            const btnSearch = document.getElementById('search-office');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.SEARCH_OFFICE + '?search=' + search.value);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const offices = JSON.parse(this.responseText);
                        if (offices.status === 'success') {

                            if (offices.data.length > 0) {
                                // cerate pagination
                                createPaginationOffice(officePaginationId, numberEachPage, offices.data.length, officeList);

                                //create offices array
                                dataPagination = dataForPagination(offices.data);

                                //load offices to table
                                loadDataForOfficeTable(1, officePaginationId, officeList);
                            } else {
                                const table = document.getElementById(officeList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })
        } else if (page === 'vacation') {
            document.title = "Quản lý nghỉ phép";
            const vacationPaginationId = 'vacation-pagination';
            const vacationList = 'vacation-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_VACATIONS_ALL);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacation(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTable(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-input');
            const btnSearch = document.getElementById('search-vacation');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.SEARCH_VACATION_ALL + '?search=' + search.value);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {


                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacation(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTable(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })
        }


        //staff modal
        (function() {

            //load office
            officeSelect('office-add-staff');


            //check username
            const username = document.getElementById('username-add-staff');
            username.addEventListener('keyup', function() {
                if (username.value.length == 0) {
                    document.getElementById('username-error-add-staff').innerText = '';
                } else {
                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', API.CHECK_USERNAME + '?username=' + username.value);
                    xhr.onload = function() {
                        if (this.status == 200) {
                            console.log(this.responseText);
                            const response = JSON.parse(this.responseText);
                            const icon = document.getElementById('icon-check-username');
                            const message = document.getElementById('username-error-add-staff');
                            if (response.status === 'success') {
                                //get first child of icon
                                icon.children[0].classList.remove('d-none');
                                icon.children[1].classList.add('d-none');

                                message.innerHTML = `<small class="text-success"> ${ response.data } </small>`;
                            } else {
                                icon.children[1].classList.remove('d-none');
                                icon.children[0].classList.add('d-none');

                                message.innerHTML = `<small class="text-danger">${response.data}</small>`;
                            }
                        }
                    }
                    xhr.send();
                }

            })
        })()


    }
} else if (currentHref.includes('manager/')) {
    logout();

    (function() {
        const files = document.getElementById('files-create-task');
        files.addEventListener('change', function() {
            // get sum size
            let sumSize = 0;
            Array.from(this.files).forEach(file => {
                sumSize += file.size;
                //check file type not exe
                if (file.type.includes('exe') || file.type.includes('dat')) {
                    this.value = null;
                    showErrorMessage('Chứa tệp tin không hợp lệ');
                    return;
                }
            });

            const MAX_SIZE_FILE = 100000000; // 100MB
            //check size
            if (sumSize > MAX_SIZE_FILE) {
                this.value = null;
                showErrorMessage('Vui lòng chọn gói tệp tin nhỏ hơn 100MB');
                return;
            }
        })
    })();

    (function() {
        const input = document.getElementById('deadline-task-create');
        input.addEventListener('change', function() {
            //compare deadline with today
            const today = new Date();
            const deadline = new Date(this.value);

            const icon = document.getElementById('icon-check-date');

            if (deadline < today) {
                this.value = null;
                showErrorMessage('Ngày hết hạn không hợp lệ');
                icon.children[1].classList.remove('d-none');
                icon.children[0].classList.add('d-none');
                return;
            }

            icon.children[0].classList.remove('d-none');
            icon.children[1].classList.add('d-none');

        })
    })()
    // staff
    function loadData(page) {


        if (page === 'staff-manager') {
            document.title = "Quản lý nhân viên";
            const staffPaginationId = 'staff-manager-pagination';
            const staffList = 'staff-manager-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_STAFFS_MANAGER);
            xhr.onload = function() {
                if (this.status == 200) {

                    const staffs = JSON.parse(this.responseText);
                    if (staffs.status === 'success') {

                        if (staffs.data.length > 0) {
                            // cerate pagination
                            createPaginationStaffManager(staffPaginationId, numberEachPage, staffs.data.length, staffList);

                            //create staffs array
                            dataPagination = dataForPagination(staffs.data);

                            //load staffs to table
                            loadDataForStaffTableManager(1, staffPaginationId, staffList);
                        } else {
                            const table = document.getElementById(staffList);
                            table.innerHTML = `<tr><td colspan="4">Không có dữ liệu</td></tr>`;
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-staff-manager-input');
            const btnSearch = document.getElementById('search-staff-manager');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.SEARCH_STAFFS_MANAGER + '?search=' + search.value);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const staffs = JSON.parse(this.responseText);
                        if (staffs.status === 'success') {

                            if (staffs.data.length > 0) {
                                // cerate pagination
                                createPaginationStaffManager(staffPaginationId, numberEachPage, staffs.data.length, staffList);

                                //create staffs array
                                dataPagination = dataForPagination(staffs.data);

                                //load staffs to table
                                loadDataForStaffTableManager(1, staffPaginationId, staffList);
                            } else {
                                const table = document.getElementById(staffList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        } else {
                            const table = document.getElementById(staffList);
                            table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })
        } else if (page === 'vacation-request') {
            document.title = "Duyệt đơn nghỉ phép";
            const vacationPaginationId = 'vacation-manager-pagination';
            const vacationList = 'vacation-manager-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_VACATIONS_MANAGER);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacationManager(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTableManager(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-manager-input');
            const btnSearch = document.getElementById('search-vacation-manager');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.SEARCH_VACATION_MANAGER + '?search=' + search.value + '&type=' + selectInput.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationManager(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableManager(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })

            const selectInput = document.getElementById('type-vacation-manager');
            selectInput.addEventListener('change', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.FILTER_VACATIONS_MANAGER + '?type=' + selectInput.value + '&search=' + search.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationManager(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableManager(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

        } else if (page === 'vacation-send') {
            document.title = "Nghỉ phép";
            const vacationPaginationId = 'vacation-send-pagination';
            const vacationList = 'vacation-send-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_VACATIONS_SEND_ALL);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-send-input');
            const btnSearch = document.getElementById('search-vacation-send');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.SEARCH_VACATIONS_SEND_ALL + '?search=' + search.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })

            const selectInput = document.getElementById('type-vacation-send');
            selectInput.addEventListener('change', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.FILTER_VACATIONS_SEND_ALL + '?type=' + selectInput.value);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

        } else if (page === 'task-manager') {
            const vacationPaginationId = 'task-manager-pagination';
            const vacationList = 'task-manager-list';

            const select = document.getElementById('staff-task-create');

            const xhr2 = new XMLHttpRequest();
            xhr2.open('GET', API.GET_STAFFS_MANAGER);
            xhr2.onload = function() {
                if (this.status == 200) {
                    const response = JSON.parse(this.responseText);
                    if (response.status === 'success') {
                        if (response.data.length > 0) {
                            select.innerHTML = '';
                            response.data.forEach(element => {
                                select.innerHTML += `<option value="${element.username}">${element.username}</option>`;
                            });

                        }
                    }
                }

            }
            xhr2.send();

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_TASKS_MANAGER);
            xhr.onload = function() {
                if (this.status == 200) {

                    const tasks = JSON.parse(this.responseText);
                    if (tasks.status === 'success') {

                        if (tasks.data.length > 0) {
                            // cerate pagination
                            createPaginationTaskManager(vacationPaginationId, numberEachPage, tasks.data.length, vacationList);

                            //create tasks array
                            dataPagination = dataForPagination(tasks.data);

                            //load tasks to table
                            loadDataForTaskTableManager(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="5">Không có dữ liệu</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            const status = document.getElementById('type-task-manager');
            let search = document.getElementById('search-task-manager-input');
            const btnSearch = document.getElementById('search-task-manager');
            btnSearch.addEventListener('click', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.SEARCH_TASK_MANAGER + '?search=' + search.value + '&status=' + status.value);
                xhr.onload = function() {
                    if (this.status == 200) {
                        console.log(this.responseText);
                        const tasks = JSON.parse(this.responseText);
                        if (tasks.status === 'success') {

                            if (tasks.data.length > 0) {
                                // cerate pagination
                                createPaginationTaskManager(vacationPaginationId, numberEachPage, tasks.data.length, vacationList);

                                //create tasks array
                                dataPagination = dataForPagination(tasks.data);

                                //load tasks to table
                                loadDataForTaskTableManager(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="5">Không có dữ liệu</td></tr>';
                            }
                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })

            const selectInput = document.getElementById('type-task-manager');
            selectInput.addEventListener('change', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.FILTER_TASKS_MANAGER + '?type=' + selectInput.value);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const tasks = JSON.parse(this.responseText);
                        if (tasks.status === 'success') {

                            if (tasks.data.length > 0) {
                                // cerate pagination
                                createPaginationTaskManager(vacationPaginationId, numberEachPage, tasks.data.length, vacationList);

                                //create tasks array
                                dataPagination = dataForPagination(tasks.data);

                                //load tasks to table
                                loadDataForTaskTableManager(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="5">Không có dữ liệu</td></tr>';
                            }
                        }
                    }
                }
                xhr.send();
            })

        }
    }
} else if (currentHref.includes('staff/')) {
    logout()

    function loadData(page) {
        if (page === 'task-staff') {
            document.title = 'Nhiệm vụ';

            const taskPaginationId = 'task-staff-pagination';
            const taskList = 'task-staff-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_TASKS_STAFF);
            xhr.onload = function() {
                if (this.status == 200) {

                    const tasks = JSON.parse(this.responseText);
                    if (tasks.status === 'success') {

                        if (tasks.data.length > 0) {
                            // cerate pagination
                            createPaginationTaskStaff(taskPaginationId, numberEachPage, tasks.data.length, taskList);

                            //create tasks array
                            dataPagination = dataForPagination(tasks.data);

                            //load tasks to table
                            loadDataForTaskTableStaff(1, taskPaginationId, taskList);
                        } else {
                            const table = document.getElementById(taskList);
                            table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                        }

                    }
                }
            }
            xhr.send();


            let search = document.getElementById('search-task-staff-input');
            const status = document.getElementById('type-task-staff');
            const btnSearch = document.getElementById('search-task-staff');
            btnSearch.addEventListener('click', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.SEARCH_TASKS_STAFF + '?search=' + search.value + '&status=' + status.value);
                xhr.onload = function() {
                    if (this.status == 200) {
                        console.log(this.responseText);

                        const tasks = JSON.parse(this.responseText);
                        if (tasks.status === 'success') {

                            if (tasks.data.length > 0) {
                                // cerate pagination
                                createPaginationTaskStaff(taskPaginationId, numberEachPage, tasks.data.length, taskList);

                                //create tasks array
                                dataPagination = dataForPagination(tasks.data);

                                //load tasks to table
                                loadDataForTaskTableStaff(1, taskPaginationId, taskList);
                            } else {
                                const table = document.getElementById(taskList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }
                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })

            const selectInput = document.getElementById('type-task-staff');
            selectInput.addEventListener('change', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.FILTER_TASKS_STAFF + '?type=' + selectInput.value);
                xhr.onload = function() {
                    if (this.status == 200) {
                        console.log(this.responseText);
                        const tasks = JSON.parse(this.responseText);
                        if (tasks.status === 'success') {

                            if (tasks.data.length > 0) {
                                // cerate pagination
                                createPaginationTaskStaff(taskPaginationId, numberEachPage, tasks.data.length, taskList);

                                //create tasks array
                                dataPagination = dataForPagination(tasks.data);

                                //load tasks to table
                                loadDataForTaskTableStaff(1, taskPaginationId, taskList);
                            } else {
                                const table = document.getElementById(taskList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }
                        }
                    }
                }
                xhr.send();
            })


        } else if (page === 'vacation-staff') {
            document.title = 'Nghỉ phép';
            const vacationPaginationId = 'vacation-send-pagination';
            const vacationList = 'vacation-send-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API.GET_VACATIONS_SEND_ALL);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-send-input');
            const btnSearch = document.getElementById('search-vacation-send');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.SEARCH_VACATIONS_SEND_ALL + '?search=' + search.value);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

            //pointer input and press enter
            search.addEventListener('keyup', function(event) {
                if (event.keyCode === 13) {
                    btnSearch.click();
                }
            })

            //active input
            search.addEventListener('focus', function() {
                this.select();
            })

            const selectInput = document.getElementById('type-vacation-send');
            selectInput.addEventListener('change', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API.FILTER_VACATIONS_SEND_ALL + '?type=' + selectInput.value);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })
        }
    }
}