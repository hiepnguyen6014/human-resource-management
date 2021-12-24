//check current href
var currentHref = window.location.href;
const numberEachPage = 14;

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
            loadData(e.id)
            document.getElementById(e.id).classList.remove('d-none');
        } else {
            e.classList.add('d-none');
        }
    })
}

function createPagination(paginationElement, numberEachPage, number) {
    const staffPagination = document.getElementById(paginationElement);
    const pageNumber = Math.ceil(number / numberEachPage);
    let html = `
    <li class="page-item">
        <a class="page-link" onclick="prePag()" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>`;

    for (let i = 1; i <= pageNumber; i++) {
        html += `
        <li class="page-item">
            <a class="page-link" onclick="loadStaffs(${i})">${i}</a>
        </li>
        `;
    }
    html += `
    <li class="page-item">
        <a class="page-link" onclick="nextPag()" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    `;
    staffPagination.innerHTML = html;
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

// js admin
if (currentHref.includes('admin/')) {

    const staffList = document.getElementById('staff-list');
    // STAFF
    let staffsArray = [];
    let currentPage = 0;
    //load staffs
    function loadData(page) {
        if (page === 'staff') {

            const xhr = new XMLHttpRequest();
            xhr.open('GET', '/api/get-staffs.php', false);
            xhr.onload = function() {
                if (this.status == 200) {

                    const staffs = JSON.parse(this.responseText);
                    if (staffs.status === 'success') {

                        // cerate pagination
                        createPagination('staff-pagination', numberEachPage, staffs.data.length);

                        //create staffs array

                        staffsArray = dataForPagination(staffs.data);

                    }
                }
            }
            xhr.send();
            loadStaffs(0);
            /* console.log(staffsArray); */
        }
    }

    function loadStaffs(page) {
        currentPage = page;
        paginationColor();
        staffList.innerHTML = '';
        staffsArray[page].forEach(staff => {

            const tr = document.createElement('tr');
            tr.dataset.id = staff.id;
            tr.innerHTML = `
                    <td>${staff.name}</td>
                    <td>${staff.office}</td>
                    <td>${staff.type}</td>
                    <td>${staff.username}</td>
                    `;
            staffList.appendChild(tr);
        });
    }

    function paginationColor() {
        Array.from(document.querySelectorAll('#staff-pagination li')).forEach(e => {
            e.classList.remove('active');
        })
        document.querySelector(`#staff-pagination li:nth-child(${currentPage + 2})`).classList.add('active');
        /* console.log(currentPage); */
    }

    function prePag() {
        if (currentPage == 0) {
            loadStaffs(staffsArray.length - 1);
        } else
        if (currentPage > 0) {
            loadStaffs(currentPage - 1);
        }
    }

    function nextPag() {
        if (currentPage == staffsArray.length - 1) {
            loadStaffs(0);
        } else if (currentPage < staffsArray.length - 1) {
            loadStaffs(currentPage + 1);
        }
    }

    //staff modal
    (function() {

        //load office
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/api/get-offices.php', false);
        xhr.onload = function() {
            if (this.status == 200) {
                const offices = JSON.parse(this.responseText);
                if (offices.status === 'success') {
                    const select = document.getElementById('office-add-staff');
                    /*                     console.log(offices.data); */
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

        //check username
        const username = document.getElementById('username-add-staff');
        username.addEventListener('keyup', function() {
            if (username.value.length == 0) {
                document.getElementById('username-error-add-staff').innerText = '';
            } else {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `/api/check-username.php?username=${username.value}`, false);
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