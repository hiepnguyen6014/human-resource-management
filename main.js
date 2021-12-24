const API = {
    'get-staffs': '/api/get-staffs.php',
    'get-offices': '/api/get-offices.php',
    'add-staff': '/api/add-staff.php',
    'check-username': '/api/check-username.php',
    'get-staff-detail': '/api/get-staff-detail.php',
    'reset-password': '/api/reset-password.php',
}

window.onload = () => {
    switchPage('staff');
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
            loadData(e.id, 1);
            document.getElementById(e.id).classList.remove('d-none');
        } else {
            e.classList.add('d-none');
        }
    })
}

function createPagination(paginationElement, numberEachPage, number, list) {
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
        tr.setAttribute('onclick', `showDetail('${e.username}')`);
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
    let currentPage;
    const paginationList = document.querySelectorAll('#' + pagination + ' li');
    Array.from(paginationList).forEach((value, index) => {
        if (value.classList.contains('active')) {
            currentPage = index;
        }
    })

    if (currentPage == 1) {
        loadDataForStaffTable(paginationList.length - 2, pagination, list);
    } else {
        loadDataForStaffTable(currentPage - 1, pagination, list);
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
        loadDataForStaffTable(1, pagination, list);
    } else {
        loadDataForStaffTable(currentPage + 1, pagination, list);
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

function showDetail(username) {
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
                document.getElementById('reset-password').setAttribute('onclick', `resetPassword('${staff.data.username}')`);
                modal.show()
            }
        }
    }
    xhr.send();
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

                        // cerate pagination
                        createPagination(staffPaginationId, numberEachPage, staffs.data.length, staffList);

                        //create staffs array
                        dataPagination = dataForPagination(staffs.data);

                        //load staffs to table
                        loadDataForStaffTable(1, staffPaginationId, staffList);

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

                            // cerate pagination
                            createPagination(staffPaginationId, numberEachPage, staffs.data.length, staffList);

                            //create staffs array
                            dataPagination = dataForPagination(staffs.data);

                            //load staffs to table
                            loadDataForStaffTable(1, staffPaginationId, staffList);

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
                            createPagination(staffPaginationId, numberEachPage, staffs.data.length, staffList);

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
}