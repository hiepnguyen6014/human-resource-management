const API = {
    //admin
    'GET_STAFFS': '/api/admin/get-staffs.php',
    'get-offices': '/api/get-offices.php',
    'add-staff': '/api/add-staff.php',
    'check-username': '/api/check-username.php',
    'get-staff-detail': '/api/get-staff-detail.php',
    'reset-password': '/api/reset-password.php',
    'get-offices-list': '/api/get-offices-list.php',
    'search-office': '/api/search-office.php',
    'view-office': '/api/view-office.php',
    'change-captain': '/api/change-captain.php',
    'delete-office': '/api/delete-office.php',
    'update-office': '/api/update-office.php',
    'get-vacations': '/api/get-vacations.php',
    'view-vacation': '/api/view-vacation.php',

    //staff
    'disagree-vacation': '/api/disagree-vacation.php',
    'agree-vacation': '/api/agree-vacation.php',
    'seen-vacation': '/api/seen-vacation.php',
    'search-vacation': '/api/search-vacation.php',
    'get-staffs-manager': '/api/get-staffs-manager.php',
    'search-staffs-manager': '/api/search-staffs-manager.php',
    'get-staff-detail-manager': '/api/get-staff-detail-manager.php',
    'get-vacations-manager': '/api/get-vacations-manager.php',
    'view-vacation-manager': '/api/view-vacation-manager.php',
    'search-vacation-manager': '/api/search-vacation-manager.php',
    'get-vacations-send': '/api/get-vacations-send.php',
    'view-vacation-send': '/api/view-vacation-send.php',

    //manager
    'search-vacation-send': '/api/search-vacation-send.php',
    'filter-vacations-send': '/api/filter-vacations-send.php',
    'filter-vacations-manager': '/api/filter-vacations-manager.php',
    'CHECK_BEFORE_VACATION': '/api/check-before-vacation.php',
    'VIEW_PROFILE': '/api/view-profile.php',
    'UPDATE_PROFILE': '/api/update-profile.php',
    'CHANGE_PASSWORD': '/api/change-password.php',
}

window.onload = () => {
    switchPage('task-manager');
};

//check current href
var currentHref = window.location.href;
const numberEachPage = 15;
let dataPagination = [];

(function logout() {
    var logout = document.getElementById('logout');
    logout.addEventListener('click', function() {
        //redirect to login page
        window.location.href = '/logout.php';
    })
})()

function switchPage(page) {
    Array.from(document.querySelectorAll('main')).forEach(e => {
        if (e.id == page) {
            /* console.log(e.id); */
            loadData(e.id);
            document.getElementById(e.id).classList.remove('d-none');
        } else {
            e.classList.add('d-none');
        }
    })
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
        /* console.log(`#${pagination} li:nth-child(${page + 1})`); */
    document.querySelector(`#${pagination} li:nth-child(${page + 1})`).classList.add('active');
    /* console.log(currentPage); */
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
                <td>${(e.position == 1) ? 'Captain' : 'Employee'}</td>
                <td>${e.username}</td>
                `;
        table.appendChild(tr);
    });
}


function prePag(pagination, list) {
    console.log(typeof pagination);
    let currentPage;
    const paginationList = document.querySelectorAll('#' + pagination + ' li');
    Array.from(paginationList).forEach((value, index) => {
        if (value.classList.contains('active')) {
            currentPage = index;
        }
    })

    if (currentPage == 1) {
        console.log(pagination);
        if (pagination.includes('vacation-send')) {
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
        if (pagination.includes('vacation-send')) {
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
    console.log(pagination);
    const paginationList = document.querySelectorAll('#' + pagination + ' li');
    Array.from(paginationList).forEach((value, index) => {
        if (value.classList.contains('active')) {
            currentPage = index;
        }
    })

    if (currentPage == paginationList.length - 2) {
        if (pagination.includes('vacation-send')) {
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
        if (pagination.includes('vacation-send')) {
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
    xhr.open('GET', API["get-offices"], false);
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
    const comfirm = confirm('Are you sure to reset password?');
    if (comfirm) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API["reset-password"], false);
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
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
    xhr.open('GET', API["get-staff-detail"] + '?username=' + username, false);
    xhr.onload = function() {
        if (this.status == 200) {
            const staff = JSON.parse(this.responseText);
            if (staff.status === 'success') {
                document.getElementById('view-staff-modal-image').src = '/images/' + staff.data.image;
                document.getElementById('view-staff-modal-fullname').innerText = staff.data.first_name + ' ' + staff.data.last_name;
                document.getElementById('view-staff-modal-email').innerText = staff.data.email;
                document.getElementById('view-staff-modal-firstname').value = staff.data.first_name;
                document.getElementById('view-staff-modal-lastname').value = staff.data.last_name;
                document.getElementById('view-staff-modal-office').value = staff.data.office;
                document.getElementById('view-staff-modal-position').value = (staff.data.position == 1) ? 'Captain' : 'Employee';
                document.getElementById('view-staff-modal-username').value = staff.data.username;
                document.getElementById('view-staff-modal-salary').value = staff.data.salary;
                document.getElementById('view-staff-modal-phone').value = staff.data.phone;
                document.getElementById('view-staff-modal-address').value = staff.data.address;
                document.getElementById('view-staff-modal-birthday').value = staff.data.birthday;
                document.getElementById('view-staff-modal-join').value = staff.data.join;
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
    xhr.open('GET', API["get-staff-detail-manager"] + '?username=' + username, false);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.status === 'success') {
                document.getElementById('view-staff-manager-modal-image').src = '/images/' + response.data.image;
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
        tr.setAttribute('onclick', `showDetailOffice('${e.id}')`);
        tr.dataset.id = e.id;
        tr.innerHTML = `
                <td>${e.name}</td>
                <td>${e.room}</td>
                <td>${e.captain}</td>
                <td>${e.phone}</td>
        `;
        table.appendChild(tr);
    });
}

function showDetailOffice(id) {
    // open modal by js
    const detailModal = document.getElementById('view-office');
    const modal = new bootstrap.Modal(detailModal)

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API["view-office"] + '?id=' + id, false);
    xhr.onload = function() {
        if (this.status == 200) {
            const office = JSON.parse(this.responseText);
            if (office.status === 'success') {
                document.getElementById('name-view-office').value = office.data.name;
                document.getElementById('room-view-office').value = office.data.room;
                document.getElementById('captain-view-office').value = 1;
                document.getElementById('phone-view-office').value = office.data.phone;
                document.getElementById('create-view-office').value = office.data.created_at;
                document.getElementById('description-view-office').value = office.data.description;
                document.getElementById('change-office-id').value = office.data.id;
                document.getElementById('change-phone-id').value = office.data.phone;
                document.getElementById('change-name-id').value = office.data.name;
                document.getElementById('change-description-id').value = office.data.description;
                document.getElementById('change-room-id').value = office.data.room;
                modal.show()
            }
        }
    }
    xhr.send();
}

function changeCaptain() {
    const officeId = document.getElementById('change-office-id').value;
    const captainId = document.getElementById('captain-view-office').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', API["change-captain"], false);
    xhr.onload = function() {
        if (this.status == 200) {
            document.getElementById('captain-view-office').value = captainId;
            console.log(this.responseText);
        }
    }
    const formData = new FormData();
    formData.append('office', officeId);
    formData.append('new', captainId);
    xhr.send(formData);
}

function deleteOffice() {
    const room = document.getElementById('change-captain-id').value;
    const comfirm = confirm('Are you sure to delete this office?');
    if (comfirm) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', API["delete-office"], false);
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
            }
        }
        const formData = new FormData();
        formData.append('room', room);
        xhr.send(formData);
    }
}

function updateOffice() {
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
        xhr.open('POST', API["update-office"], false);
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
            }
        }
        const formData = new FormData();
        formData.append('id', officeId);
        formData.append('phone', newPhone);
        formData.append('name', newName);
        formData.append('description', newDescription);
        formData.append('room', newRoom);
        xhr.send(formData);
    } else {
        console.log('No change');
    }
}

function loadDataForVacationTable(page, paginationId, tableList) {
    const table = document.getElementById(tableList);
    paginationColor(paginationId, page);
    table.innerHTML = '';
    let count = 0;
    dataPagination[page - 1].forEach(e => {

        const tr = document.createElement('tr');
        tr.setAttribute('onclick', `showDetailVacation('${e.id}')`);
        if (e.seen) {
            tr.className = 'non-seen';
        }
        tr.dataset.id = e.id;
        tr.innerHTML = `
                <td>${e.send_at}</td> 
                <td>${e.username}</td> 
                <td>${e.office}</td>
                <td>${e.date_off}</td>
                <td>${e.status}</td>
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
        if (e.seen) {
            tr.className = 'non-seen';
        }
        tr.dataset.id = e.id;
        tr.innerHTML = `
                <td>${e.send_at}</td> 
                <td>${e.date_off}</td> 
                <td>${e.number_off}</td>
                <td>${e.status}</td>
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
        tr.setAttribute('onclick', `showDetailStaffManager('${e.username}')`);
        tr.dataset.id = e.id;
        tr.innerHTML = `
                <td>${e.name}</td> 
                <td>${e.username}</td> 
                <td>${e.phone}</td>
                <td>${e.email}</td>
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
        tr.setAttribute('onclick', `showDetailVacationManager('${e.id}')`);
        if (e.seen) {
            tr.className = 'non-seen';
        }
        tr.dataset.id = e.id;
        tr.innerHTML = `
                <td>${e.send_at}</td> 
                <td>${e.username}</td> 
                <td>${e.date_off}</td>
                <td>${e.status}</td>
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
    xml.open('POST', API["seen-vacation"], false);
    xml.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText, 'see this vacation');
        }
    }
    const formData = new FormData();
    formData.append('id', id);
    xml.send(formData);

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API["view-vacation"] + '?id=' + id, false);
    xhr.onload = function() {
        if (this.status == 200) {
            const vacation = JSON.parse(this.responseText);
            if (vacation.status === 'success') {
                /* console.log(vacation.data); */
                document.getElementById('seen-at-view-vacation').innerHTML = vacation.data.send_at;
                document.getElementById('name-view-vacation').value = vacation.data.username;
                document.getElementById('office-view-vacation').value = vacation.data.office;
                document.getElementById('date-view-vacation').value = vacation.data.date_off;
                document.getElementById('number-view-vacation').value = vacation.data.number_off;
                document.getElementById('reason-view-vacation').value = vacation.data.description;
                document.getElementById('id-view-vacation').value = vacation.data.id;
                document.getElementById('file-view-vacation').href = '/files/' + vacation.data.id + '/' + vacation.data.file;
                modal.show()
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
    xml.open('POST', API["seen-vacation"], false);
    xml.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText, 'see this vacation-manager');
        }
    }
    const formData = new FormData();
    formData.append('id', id);
    xml.send(formData);

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API["view-vacation-manager"] + '?id=' + id, false);
    xhr.onload = function() {
        if (this.status == 200) {
            const vacation = JSON.parse(this.responseText);
            if (vacation.status === 'success') {
                /* console.log(vacation.data); */
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
        xhr.open('POST', API["disagree-vacation"], false);
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
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
    xhr.open('POST', API["agree-vacation"], false);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
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
        xhr.open('POST', API["disagree-vacation"], false);
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
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
    xhr.open('POST', API["agree-vacation"], false);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
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
    xml.open('POST', API["seen-vacation"], false);
    xml.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText, 'see this vacation-send');
        }
    }
    const formData = new FormData();
    formData.append('id', id);
    xml.send(formData);

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API["view-vacation-send"] + '?id=' + id, false);
    xhr.onload = function() {
        if (this.status == 200) {
            const vacation = JSON.parse(this.responseText);
            if (vacation.status === 'success') {
                /* console.log(vacation.data); */
                document.getElementById('send-view-vacation-send').innerHTML = vacation.data.send_at;
                document.getElementById('date-view-vacation-send').value = vacation.data.date_off;
                document.getElementById('number-view-vacation-send').value = vacation.data.number_off;
                document.getElementById('reason-view-vacation-send').value = vacation.data.description;
                document.getElementById('feedback-view-vacation-send').value = vacation.data.feedback;
                document.getElementById('id-view-vacation-send').value = vacation.data.id;
                document.getElementById('file-view-vacation-send').href = '/files/' + vacation.data.id + '/' + vacation.data.file;
                modal.show()
            }
        }
    }
    xhr.send();
}

function offRequest() {
    const modal = new bootstrap.Modal(document.getElementById('add-vacation-send'));

    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.CHECK_BEFORE_VACATION, false);
    xhr.onload = function() {
        if (this.status == 200) {
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

                    console.log(days1, days2);
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
}

function viewProfile() {
    const modal = new bootstrap.Modal(document.getElementById('view-profile'));
    const xhr = new XMLHttpRequest();
    xhr.open('GET', API.VIEW_PROFILE, false);
    xhr.onload = function() {
        if (this.status == 200) {
            const profile = JSON.parse(this.responseText);
            if (profile.status === 'success') {
                document.getElementById('view-profile-modal-image').src = '/images/' + profile.data.image;
                document.getElementById('view-profile-modal-fullname').innerText = profile.data.first_name + ' ' + profile.data.last_name;
                document.getElementById('view-profile-modal-username').innerText = profile.data.username;
                document.getElementById('view-profile-modal-email').value = profile.data.email;
                document.getElementById('view-profile-modal-firstname').value = profile.data.first_name;
                document.getElementById('view-profile-modal-lastname').value = profile.data.last_name;
                document.getElementById('view-profile-modal-position').value = (profile.data.position == 1) ? 'Captain' : 'Employee';
                document.getElementById('view-profile-modal-salary').value = profile.data.salary;
                document.getElementById('view-profile-modal-phone').value = profile.data.phone;
                document.getElementById('view-profile-modal-address').value = profile.data.address;
                document.getElementById('view-profile-modal-birthday').value = profile.data.birthday;
                document.getElementById('view-profile-modal-join').value = profile.data.join;
                // document.getElementById('reset-password').setAttribute('onclick', `resetPassword('${profile.data.username}')`);
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

function updateProfile() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.UPDATE_PROFILE, false);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
        }
    }
    xhr.send(new FormData(document.getElementById('update-profile')));
}

function changePassword() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', API.CHANGE_PASSWORD, false);
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
        }
    }

    xhr.send(new FormData(document.getElementById('form-change-password')));
}

// js admin
if (currentHref.includes('admin/')) {
    // STAFF

    //load staffs
    function loadData(page) {
        if (page === 'staff') {
            const staffPaginationId = 'staff-pagination';
            const staffList = 'staff-list';
            const select = 'office-staff';

            officeSelect(select);

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API["get-staffs"] + '?office=1', false);
            xhr.onload = function() {
                if (this.status == 200) {

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
                            table.innerHTML = `<tr><td colspan="4">No data</td></tr>`;
                        }

                    }
                }
            }
            xhr.send();

            const selectInput = document.getElementById(select);
            selectInput.addEventListener('change', function() {
                const number = this.value;
                const xhr = new XMLHttpRequest();
                xhr.open('GET', API["get-staffs"] + '?office=' + number, false);
                xhr.onload = function() {
                    if (this.status == 200) {

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
                                table.innerHTML = `<tr><td colspan="4">No data</td></tr>`;
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
                xhr.open('GET', API["get-staffs"] + '?search=' + search.value + '&office=' + selectInput.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

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
            const officePaginationId = 'office-pagination';
            const officeList = 'office-list';
            const select = 'office-office';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API["get-offices-list"], false);
            xhr.onload = function() {
                if (this.status == 200) {

                    const offices = JSON.parse(this.responseText);
                    if (offices.status === 'success') {

                        console.log(offices.data.length);
                        if (offices.data.length > 0) {
                            // cerate pagination
                            createPaginationOffice(officePaginationId, numberEachPage, offices.data.length, officeList);

                            //create offices array
                            dataPagination = dataForPagination(offices.data);

                            //load offices to table
                            loadDataForOfficeTable(1, officePaginationId, officeList);
                        } else {
                            const table = document.getElementById(officeList);
                            table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-office-input');
            const btnSearch = document.getElementById('search-office');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API["search-office"] + '?search=' + search.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const offices = JSON.parse(this.responseText);
                        if (offices.status === 'success') {

                            console.log(offices.data.length);
                            if (offices.data.length > 0) {
                                // cerate pagination
                                createPaginationOffice(officePaginationId, numberEachPage, offices.data.length, officeList);

                                //create offices array
                                dataPagination = dataForPagination(offices.data);

                                //load offices to table
                                loadDataForOfficeTable(1, officePaginationId, officeList);
                            } else {
                                const table = document.getElementById(officeList);
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
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
            const vacationPaginationId = 'vacation-pagination';
            const vacationList = 'vacation-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API["get-vacations"], false);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        console.log(vacations.data.length);
                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacation(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTable(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-input');
            const btnSearch = document.getElementById('search-vacation');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API["search-vacation"] + '?search=' + search.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            console.log(vacations.data.length);
                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacation(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTable(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
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
                    xhr.open('GET', `${API["check-username"]}?username=${username.value}`, false);
                    xhr.onload = function() {
                        if (this.status == 200) {
                            const response = JSON.parse(this.responseText);
                            const icon = document.getElementById('icon-check-username');
                            const message = document.getElementById('username-error-add-staff');
                            if (response.status === 'success') {
                                //get first child of icon
                                icon.children[0].classList.remove('d-none');
                                icon.children[1].classList.add('d-none');

                                message.innerHTML = `<small class="text-success">${response.data}</small>`;
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
    // staff
    function loadData(page) {
        console.log(page);
        if (page === 'staff-manager') {
            const staffPaginationId = 'staff-manager-pagination';
            const staffList = 'staff-manager-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API["get-staffs-manager"], false);
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
                            table.innerHTML = `<tr><td colspan="4">No data</td></tr>`;
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-staff-manager-input');
            const btnSearch = document.getElementById('search-staff-manager');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API["search-staffs-manager"] + '?search=' + search.value, false);
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
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
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
        } else if (page === 'vacation-request') {
            const vacationPaginationId = 'vacation-manager-pagination';
            const vacationList = 'vacation-manager-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API["get-vacations-manager"], false);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        console.log(vacations.data.length);
                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacationManager(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTableManager(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-manager-input');
            const btnSearch = document.getElementById('search-vacation-manager');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API["search-vacation-manager"] + '?search=' + search.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            console.log(vacations.data.length);
                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationManager(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableManager(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
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
                xhr.open('GET', API["filter-vacations-manager"] + '?type=' + selectInput.value, false);
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
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

        } else if (page === 'vacation-send') {
            const vacationPaginationId = 'vacation-send-pagination';
            const vacationList = 'vacation-send-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API["get-vacations-send"], false);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        console.log(vacations.data.length);
                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-send-input');
            const btnSearch = document.getElementById('search-vacation-send');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API["search-vacation-send"] + '?search=' + search.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            console.log(vacations.data.length);
                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
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
                xhr.open('GET', API["filter-vacations-send"] + '?type=' + selectInput.value, false);
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
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

        } else if (page === 'task-manager') {
            const vacationPaginationId = 'task-manager-pagination';
            const vacationList = 'task-manager-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API["get-vacations-send"], false);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        console.log(vacations.data.length);
                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-send-input');
            const btnSearch = document.getElementById('search-vacation-send');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API["search-vacation-send"] + '?search=' + search.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            console.log(vacations.data.length);
                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
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
                xhr.open('GET', API["filter-vacations-send"] + '?type=' + selectInput.value, false);
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
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })

        }
    }
} else if (currentHref.includes('staff/')) {
    function loadData(page) {
        if (page === 'task-staff') {
            document.title = 'Nhiệm vụ';
        } else if (page === 'vacation-staff') {
            document.title = 'Nghỉ phép';
            const vacationPaginationId = 'vacation-send-pagination';
            const vacationList = 'vacation-send-list';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', API["get-vacations-send"], false);
            xhr.onload = function() {
                if (this.status == 200) {

                    const vacations = JSON.parse(this.responseText);
                    if (vacations.status === 'success') {

                        console.log(vacations.data.length);
                        if (vacations.data.length > 0) {
                            // cerate pagination
                            createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                            //create vacations array
                            dataPagination = dataForPagination(vacations.data);

                            //load vacations to table
                            loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                        } else {
                            const table = document.getElementById(vacationList);
                            table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                        }

                    }
                }
            }
            xhr.send();

            let search = document.getElementById('search-vacation-send-input');
            const btnSearch = document.getElementById('search-vacation-send');
            btnSearch.addEventListener('click', function() {

                const xhr = new XMLHttpRequest();
                xhr.open('GET', API["search-vacation-send"] + '?search=' + search.value, false);
                xhr.onload = function() {
                    if (this.status == 200) {

                        const vacations = JSON.parse(this.responseText);
                        if (vacations.status === 'success') {

                            console.log(vacations.data.length);
                            if (vacations.data.length > 0) {
                                // cerate pagination
                                createPaginationVacationSend(vacationPaginationId, numberEachPage, vacations.data.length, vacationList);

                                //create vacations array
                                dataPagination = dataForPagination(vacations.data);

                                //load vacations to table
                                loadDataForVacationTableSend(1, vacationPaginationId, vacationList);
                            } else {
                                const table = document.getElementById(vacationList);
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
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
                xhr.open('GET', API["filter-vacations-send"] + '?type=' + selectInput.value, false);
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
                                table.innerHTML = '<tr><td colspan="4">No data</td></tr>';
                            }

                        }
                    }
                }
                xhr.send();
            })
        }
    }
}