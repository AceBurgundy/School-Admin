import { createTable } from './generate-table.js';
import { makeToastNotification } from './helper.js';
import { fetchData } from './views-fetcher.js';

const createScholarshipButton = document.getElementById('create-new-scholarship-button');
const newScholarshipForm = document.getElementById('new-scholarship-form');

createScholarshipButton.onclick = () => newScholarshipForm.classList.toggle('active');

newScholarshipForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    name: document.getElementById('scholarship').value,
  };


  const formData = new FormData();

  formData.append("name", formValues['name']);

  fetch("views/scholarship.php/create", {
    method: "POST",
    body: formData,

  })
    .then(response => response.json())
    .then(data => {
      console.log(data);
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
  await fetchData("views/table_headers.php?table=scholarship"),
  await fetchData("views/scholarship.php/scholarship")
);