const studentLink = document.querySelector('.switch-active');
const teacherLink = document.querySelector('.switch-inactive');
const indicator = document.querySelector('.switch-indicator');
const studentForm = document.getElementById('students');
const teacherForm = document.getElementById('teacher');
const userTypeInput = document.getElementById('user_type_input');

indicator.style.transform = 'translateX(0)';

studentLink.addEventListener('click', function () {
    studentForm.style.display = 'block';
    teacherForm.style.display = 'none';

    studentLink.classList.remove('switch-inactive');
    studentLink.classList.add('switch-active');
    teacherLink.classList.remove('switch-active');
    teacherLink.classList.add('switch-inactive');
    
    userTypeInput.value = 'murid';
    userTypeInput.setAttribute('data-type', 'murid');

    indicator.style.transform = 'translateX(0)';
});

teacherLink.addEventListener('click', function () {
    studentForm.style.display = 'none';
    teacherForm.style.display = 'block';

    teacherLink.classList.remove('switch-inactive');
    teacherLink.classList.add('switch-active');
    studentLink.classList.remove('switch-active');
    studentLink.classList.add('switch-inactive');
    
    userTypeInput.value = 'walas';
    userTypeInput.setAttribute('data-type', 'walas');

    indicator.style.transform = 'translateX(90%)';
});
