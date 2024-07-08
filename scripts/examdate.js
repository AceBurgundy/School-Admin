import { createTable } from './generate-table.js';
import { makeToastNotification } from './helper.js';
import { fetchData } from './views-fetcher.js';

const createStudentToggle = document.getElementById(
  'create-new-dateTaken-button'
);
const newStudentForm = document.getElementById('new-datetaken-form');

createStudentToggle.onclick = () => newStudentForm.classList.toggle('active');

newStudentForm.onsubmit = (event) => {
  event.preventDefault();

  const formData = {
    date_taken: document.getElementById('dateTaken').value,
  };

  console.log(formData);

  formData.append('date_taken', formValues['date_taken']);

  fetch('views/examdate.php/create', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === 'error') {
        makeToastNotification(data.message);
      }

      if (data.status === 'success') {
        makeToastNotification(data.message);
        // leave empty
      }
    })
    .catch((error) => console.error('Error:', error));
};

createTable(
  await fetchData('views/table_headers.php?table=examdate'),
  await fetchData('views/examdate.php/examdates')
);
