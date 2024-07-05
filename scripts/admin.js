const createStudentToggle = document.getElementById('create-new-admin-button');
const newStudentForm = document.getElementById('new-admin-form');

createStudentToggle.onclick = () => newStudentForm.classList.toggle('active');

newStudentForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    username: document.getElementById('username').value,
    birthdate: document.getElementById('birthdate').value,
    email: document.getElementById('email').value,
    password: document.getElementById('password').value,
  };

  console.log(formData);
}