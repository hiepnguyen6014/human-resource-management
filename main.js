const LOGIN_API = '/admin/loginAPI.php'
const CHANGE_API = '/admin/changeAPI.php';
ADMIN_EMPLOYEE_API = '/admin/employeeAPI.php';

// change section
(function changeSection() {
    const section = document.querySelectorAll('.section')
    const nav = document.querySelectorAll('.navigation__item a')
    const views = document.querySelectorAll('.view')

    Array.from(nav).forEach((e, i) => {
        e.onclick = () => {
            switchSection(i)
            Array.from(views).forEach(view => {
                view.style.display = 'none'
            })
        }
    })

    function switchSection(currentSection) {
        Array.from(section).forEach((e, i) => {
            if (i === currentSection) {
                e.classList.add('show')
            } else {
                e.classList.remove('show')
            }
        })

        Array.from(nav).forEach((e, i) => {
            if (i === currentSection) {
                e.classList.add('active')
            } else {
                e.classList.remove('active')
            }
        })
    }
})();

//view profile
(function viewProfile() {
    const btnView = document.querySelector('#profile-view')
    const view = document.querySelector('.profile-view')
    const space = document.querySelector('.profile-view__space')
    const btnEsc = document.querySelector('#cancel-profile')

    btnView.addEventListener('click', function() {
        showView(view);
    })

    closeViewByButton(btnEsc, view)
    closeView(view)
    clearViewClick(space)
})();

function clearViewClick(viewSpace) {
    viewSpace.addEventListener('click', function(e) {
        e.stopPropagation()
    })
}

function showView(view) {
    view.style.display = 'block'
}

function closeView(view) {
    view.addEventListener('click', function() {
        view.style.display = 'none'
    })
}

function closeViewByButton(button, view) {
    button.addEventListener('click', function() {
        view.style.display = 'none'
    })
}


// login.php
const login = document.querySelector('.login');
if (login) {
    (function() {
        const loginInput = document.querySelectorAll('.input__container__text')
        const submitButton = document.querySelector('.login__container__button')
        const loginFailed = document.querySelector('.login__container__failed')

        Array.from(loginInput).forEach(function(e) {
            e.addEventListener('focus', function() {
                loginFailed.style.display = 'none'
            })
        })

        submitButton.addEventListener('click', e => {
            e.preventDefault()
            const formData = new FormData(document.querySelector('.login__container__form'))

            const xhr = new XMLHttpRequest()
            xhr.open('POST', LOGIN_API)
            xhr.onload = function() {
                if (xhr.status === 200) {
                    loginFailed.style.display = 'none';
                    // const data = JSON.parse(xhr.responseText)
                    console.log(xhr.responseText)
                } else {
                    loginFailed.style.display = 'block';
                }
            }
            xhr.send(formData)
        })
    })();
}

//change.php
const change = document.querySelector('.change');
if (change) {
    (function() {
        const newPassword = document.querySelector('#new-password');
        const confirmPassword = document.querySelector('#confirm-password');
        const doneIcons = document.querySelectorAll('.done-icon');
        const changeButton = document.querySelector('#change-password__button');

        newPassword.addEventListener('keyup', showCorrectPassword);
        confirmPassword.addEventListener('keyup', showCorrectPassword);

        function showCorrectPassword() {
            if (newPassword.value === confirmPassword.value && newPassword.value !== '') {
                doneIcons[0].classList.remove('disable');
                doneIcons[1].classList.remove('disable');
            } else {
                doneIcons[0].classList.add('disable');
                doneIcons[1].classList.add('disable');
            }
        }

        changeButton.addEventListener('click', e => {
            e.preventDefault();
            const formData = new FormData(document.querySelector('.change-password__container__form'));

            const xhr = new XMLHttpRequest();
            xhr.open('POST', CHANGE_API);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    if (data.status === 'success') {
                        //success
                    } else {
                        //failed
                    }
                }
            }
            xhr.send(formData);
        })
    })();
}

//admin.php
const admin = document.querySelector('.admin');
if (admin) {
    //load data

    const employeeBody = document.querySelector('#employee-body')
    const xhr = new XMLHttpRequest()
    xhr.open('GET', ADMIN_EMPLOYEE_API)
    xhr.onload = function() {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText)
            data.forEach((e, i) => {
                const div = document.createElement('div')
                div.setAttribute('class', 'row-tbody')
                div.setAttribute('data-id', e.id)
                div.setAttribute('onclick', 'viewEmployee(this)')
                div.innerHTML = `
                <div class="employee-table__tbody0">
                    <span>${i}</span>
                </div>
                <div class="employee-table__tbody1">
                    <span>${e.id}</span>
                </div>
                <div class="employee-table__tbody2">
                    <span>${e.name}</span>
                </div>
                <div class="employee-table__tbody3">
                    <span>${e.position}</span>
                </div>
                <div class="employee-table__tbody4">
                    <span>${e.rank}</span>
                </div>
                <div class="employee-table__tbody5">
                    <span>${e.username}</span>
                </div>
                `
                employeeBody.appendChild(div)
            })
        }
    }
    xhr.send()

    (function addEmployee() {
        const btnAdd = document.querySelector('#add-employee')
        const view = document.querySelector('.employee-new')
        const space = document.querySelector('.employee-new__space')
        const btnEsc = document.querySelector('#cancel-new-employee')

        btnAdd.addEventListener('click', function() {
            showView(view);
        })

        closeViewByButton(btnEsc, view)
        closeView(view)
        clearViewClick(space)
    })();

    function viewEmployee(e) {
        const view = document.querySelector(".employee-view")
        const space = document.querySelector(".employee-view__space")
        const btnEsc = document.querySelector("#cancel-employee")
        clearViewClick(space)
        showView(view)
        closeView(view)
        closeViewByButton(btnEsc, view)
            //set attribute of employee view
        console.log(e.getAttribute('data-id'))
    }


    (function addOffice() {
        const btnAdd = document.querySelector('#add-office')
        const view = document.querySelector('.office-new')
        const space = document.querySelector('.office-new__space')
        const btnEsc = document.querySelector('#cancel-office')

        btnAdd.addEventListener('click', function() {
            showView(view);
        })

        closeViewByButton(btnEsc, view)
        closeView(view)
        clearViewClick(space)
    })();

    function viewOffice(e) {
        const view = document.querySelector(".office-view")
        const space = document.querySelector(".office-view__space")
        const btnEsc = document.querySelector("#cancel-office")
        clearViewClick(space)
        showView(view)
        closeView(view)
        closeViewByButton(btnEsc, view)
            //data-id = id of office
        console.log(e.getAttribute('data-id'))
    }

    function viewRequest(e) {
        const view = document.querySelector(".request-view")
        const space = document.querySelector(".request-view__space")
        const btnEsc = document.querySelector("#cancel-request")
        clearViewClick(space)
        showView(view)
        closeView(view)
        closeViewByButton(btnEsc, view)
            //data-id = id of request
        console.log(e.getAttribute('data-id'))
    }
}

//manager.php
const manager = document.querySelector('.manager');
if (manager) {

    (function addTask() {
        const btnAdd = document.querySelector('#add-task')
        const view = document.querySelector('.task-new')
        const space = document.querySelector('.task-new__space')
        const btnEsc = document.querySelector('#cancel-task')

        btnAdd.addEventListener('click', function() {
            showView(view);
        })

        closeViewByButton(btnEsc, view)
        closeView(view)
        clearViewClick(space)
    })();

    (function addOff() {
        const btnAdd = document.querySelector('#add-off')
        const view = document.querySelector('.off-new')
        const space = document.querySelector('.off-new__space')
        const btnEsc = document.querySelector('#cancel-off')

        btnAdd.addEventListener('click', function() {
            showView(view);
        })

        closeViewByButton(btnEsc, view)
        closeView(view)
        clearViewClick(space)
    })();

    function viewTask(e) {
        const view = document.querySelector(".task-view")
        const space = document.querySelector(".task-view__space")
        const btnEsc = document.querySelector("#cancel-task")
        clearViewClick(space)
        showView(view)
        closeView(view)
        closeViewByButton(btnEsc, view)
            //data-id = id of task
        console.log(e.getAttribute('data-id'))
    }

    function viewRequest(e) {
        const view = document.querySelector(".request-view")
        const space = document.querySelector(".request-view__space")
        const btnEsc = document.querySelector("#cancel-request")
        clearViewClick(space)
        showView(view)
        closeView(view)
        closeViewByButton(btnEsc, view)
            //data-id = id of request
        console.log(e.getAttribute('data-id'))
    }

    function viewOff(e) {
        const view = document.querySelector(".off-view")
        const space = document.querySelector(".off-view__space")
        const btnEsc = document.querySelector("#cancel-off")
        clearViewClick(space)
        showView(view)
        closeView(view)
        closeViewByButton(btnEsc, view)
            //data-id = id of off
        console.log(e.getAttribute('data-id'))
    }
}

//employee.php
const employee = document.querySelector('.employee');
if (employee) {
    (function addOff() {
        const btnAdd = document.querySelector('#add-off')
        const view = document.querySelector('.off-new')
        const space = document.querySelector('.off-new__space')
        const btnEsc = document.querySelector('#cancel-off')

        btnAdd.addEventListener('click', function() {
            showView(view);
        })

        closeViewByButton(btnEsc, view)
        closeView(view)
        clearViewClick(space)
    })();

    function viewOff(e) {
        const view = document.querySelector(".off-view")
        const space = document.querySelector(".off-view__space")
        const btnEsc = document.querySelector("#cancel-off")
        clearViewClick(space)
        showView(view)
        closeView(view)
        closeViewByButton(btnEsc, view)
            //data-id = id of off
        console.log(e.getAttribute('data-id'))
    }

    function viewTask(e) {
        const view = document.querySelector(".task-view")
        const space = document.querySelector(".task-view__space")
        const btnEsc = document.querySelector("#cancel-task")
        clearViewClick(space)
        showView(view)
        closeView(view)
        closeViewByButton(btnEsc, view)
            //data-id = id of task
        console.log(e.getAttribute('data-id'))
    }
}