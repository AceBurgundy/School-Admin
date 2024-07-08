// const createInstructorToggle = document.getElementById('create-new-instructor-button');
// const newInstructorForm = document.getElementById('new-instructor-form');

// createInstructorToggle.onclick = () => newInstructorForm.classList.toggle('active');

// newInstructorForm.onsubmit = event => {
//   event.preventDefault();

//   const formData = {
//     first_name: document.getElementById('firstName').value,
//     middle_initial: document.getElementById('middleInitial').value,
//     last_name: document.getElementById('lastName').value,
//     extension: document.getElementById('extension').value,
//     facebook_link_id: document.getElementById('facebookLinkId').value,
//     twitter_link_id: document.getElementById('twitterLinkId').value,
//     linkedin_link_id: document.getElementById('linkedinLinkId').value,
//     instagran_link_id: document.getElementById('instagramLinkId').value
//   };

//   console.log(formData);
// }
import { createTable } from './generate-table.js';
import { makeToastNotification } from './helper.js';
import { fetchData } from './views-fetcher.js';



const createInstructorToggle = document.getElementById('create-new-instructor-button');
const newInstructorForm = document.getElementById('new-instructor-form');

createInstructorToggle.onclick = () => newInstructorForm.classList.toggle('active');

newInstructorForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    first_name: document.getElementById('firstName').value,
    middle_initial: document.getElementById('middleInitial').value,
    last_name: document.getElementById('lastName').value,
    extension: document.getElementById('extension').value,
    facebook_link: document.getElementById('facebookLink').value,
    twitter_link: document.getElementById('twitterLink').value,
    linkedin_link: document.getElementById('linkedinLink').value,
    instagram_link: document.getElementById('instagramLink').value
  };

  const formData = new FormData();

  formData.append("first_name", formValues['first_name']);
  formData.append("middle_initial", formValues['middle_initial']);
  formData.append("last_name", formValues['last_name']);
  formData.append("extension", formValues['extension']);
  formData.append("facebook_link", formValues['facebook_link']);
  formData.append("twitter_link", formValues['twitter_link']);
  formData.append("linkedin_link", formValues['linkedin_link']);
  formData.append("instagram_link", formValues['instagram_link']);


  fetch("views/instructor.php/create", {
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

createTable(
  await fetchData("views/table_headers.php?table=instructor"),
  await fetchData("views/instructor.php/instructors")
);