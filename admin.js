(function changeSection() {
    const section = document.querySelectorAll('.section')
    const nav = document.querySelectorAll('.navigation__task-item a')

    Array.from(nav).forEach((e, i) => {
        e.onclick = () => {
            switchSection(i)
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

(function render() {

    let employeeBody = document.querySelector('#employee-tbody');
    let officeBody = document.querySelector('#office-tbody');
    //call API
    for (let i = 0; i < 100; i++) {
        let divEmployee = document.createElement('div')
        divEmployee.setAttribute('data-id', 'asdgakshdgasjdg')
        divEmployee.setAttribute('onclick', 'viewEmployee(this)')
        divEmployee.classList.add('row-tbody')
        divEmployee.classList.add('employee')
        divEmployee.innerHTML = `
        <div class="employee-table__tbody0">
            <span>${i}</span>
        </div>
        <div class="employee-table__tbody1">
            <span>MSNV</span>
        </div>
        <div class="employee-table__tbody2">
            <span>Họ và tên</span>
        </div>
        <div class="employee-table__tbody3">
            <span>Phòng ban</span>
        </div>
        <div class="employee-table__tbody4">
            <span>Chức vụ</span>
        </div>
        <div class="employee-table__tbody5">
            <span>Tài khoản</span>
        </div>
        <div class="employee-table__tbody6">
            <button onclick="deleteEmployee(asdgakshdgasjdg)">Xoá</button>
        </div>
        `
        employeeBody.appendChild(divEmployee)

        let divOffice = document.createElement('div')
        divOffice.setAttribute('data-id', 'asdgakshdgasjdg')
        divOffice.setAttribute('onclick', 'viewOffice(this)')
        divOffice.classList.add('row-tbody')
        divOffice.classList.add('office')
        divOffice.innerHTML = `
        <div class="office-table__tbody0">
            <span>SST</span>
        </div>
        <div class="office-table__tbody1">
            <span>MSPB</span>
        </div>
        <div class="office-table__tbody2">
            <span>Phòng ban</span>
        </div>
        <div class="office-table__tbody3">
            <span>Trường phòng</span>
        </div>
        <div class="office-table__tbody4">
            <span>${i}</span>
        </div>
        <div class="office-table__tbody5">
            <button onclick="deleteOffice(MSNV)">Xoá</button>
        </div>
        `
        officeBody.appendChild(divOffice)
    }
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


(function addOffice() {
    const btnAdd = document.querySelector('#add-office')
    const view = document.querySelector('.office-new')
    const space = document.querySelector('.office-new__space')
    const btnEsc = document.querySelector('#cancel-new-office')

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
        //set attribute of office view
    console.log(e.getAttribute('data-id'))
}