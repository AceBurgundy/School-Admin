import { createTable } from './generate-table.js';
import { makeToastNotification } from './helper.js';
import { fetchData } from './views-fetcher.js';

const createStudentToggle = document.getElementById(
  'create-new-dateTaken-button'
);
const newexamdateForm = document.getElementById('new-datetaken-form');

createStudentToggle.onclick = () => newexamdateForm.classList.toggle('active');

newexamdateForm.onsubmit = (event) => {
  event.preventDefault();

  const formValues = {
    date_taken: document.getElementById('dateTaken').value
  };



  const formData = new FormData();

  
  formData.append('date_taken', formValues['date_taken']);
  console.log(formData);

  fetch('views/examdate.php/create', {
    method: 'POST',
    body: formData,
  })
  .then((response) => response.json())
  .then((data) => {
    if (data.status === "error") {
      makeToastNotification(data.message);
    }

    if (data.status === "success") {
      makeToastNotification(data.message);
      // leave empty
    }
  })
  .catch((error) => console.error("Error:", error));
};

createTable(
  await fetchData('views/table_headers.php?table=examdate'),
  await fetchData('views/examdate.php/examdates')
);
