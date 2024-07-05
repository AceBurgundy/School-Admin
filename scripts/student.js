// OLD
// const createNewsAuthorButton = document.getElementById('create-new-student-button');
// const newScholarshipForm = document.getElementById('new-student-form');

import { makeToastNotification } from './helper.js';

// createNewsAuthorButton.onclick = () => newScholarshipForm.classList.toggle('active');

// newScholarshipForm.onsubmit = event => {
//   event.preventDefault();

//   const formData = {
//     first_name: document.getElementById('firstName').value,
//     middle_initial: document.getElementById('middleInitial').value,
//     last_name: document.getElementById('lastName').value,
//     extension: document.getElementById('extension').value,
//     exam_date_id: document.getElementById('examDateId').value,
//     school_id: document.getElementById('schoolId').value,
//     scholarship_id: document.getElementById('scholarshipId').value
//   };

//   console.log(formData);
// }

// NEW
const createNewsAuthorButton = document.getElementById('create-new-student-button');
const newScholarshipForm = document.getElementById('new-student-form');

createNewsAuthorButton.onclick = () => newScholarshipForm.classList.toggle('active');

newScholarshipForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    first_name: document.getElementById('firstName').value,
    middle_initial: document.getElementById('middleInitial').value,
    last_name: document.getElementById('lastName').value,
    extension: document.getElementById('extension').value,
    exam_date_id: document.getElementById('examDateId').value,
    school_id: document.getElementById('schoolId').value,
    scholarship_id: document.getElementById('scholarshipId').value
  };

  const formData = new FormData();

  formData.append("first_name", formValues['first_name']);
  formData.append("middle_initial", formValues['middle_initial']);
  formData.append("last_name", formValues['last_name']);
  formData.append("extension", formValues['extension']);
  formData.append("exam_date_id", formValues['exam_date_id']);
  formData.append("school_id", formValues['school_id']);
  formData.append("scholarship_id", formValues['scholarship_id']);

  fetch("views/Create.php", {
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