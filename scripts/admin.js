
import { makeToastNotification } from './helper.js';

const createStudentToggle = document.getElementById('create-new-admin-button');
const newStudentForm = document.getElementById('new-admin-form');

createStudentToggle.onclick = () => newStudentForm.classList.toggle('active');

newStudentForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    username: document.getElementById('username').value,
    birthdate: document.getElementById('birthdate').value,
    email: document.getElementById('email').value,
    password: document.getElementById('password').value,
  };

  const formData = new FormData();

  formData.append("username", formValues['username']);
  formData.append("birthdate", formValues['birthdate']);
  formData.append("email", formValues['email']);
  formData.append("password", formValues['password']);

  fetch("views/admin/create.php", {
      method: "POST",
      body: formData,
  })
    .then(response => response.json())
    .then(data => {
      if (data.status === "error") {
        makeToastNotification(data.message);
      }

      if (data.status === "success") {
        makeToastNotification(data.message);
        // leave empty
      }
    })
    .catch(error => console.error("Error:", error));
  
}