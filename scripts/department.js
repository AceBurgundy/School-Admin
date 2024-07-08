import { createTable } from './generate-table.js';
import { makeToastNotification } from './helper.js';
import { fetchData } from './views-fetcher.js';

const createStudentToggle = document.getElementById('create-new-departmentBtn');
const newStudentForm = document.getElementById('new-department-form');

createStudentToggle.onclick = () => newStudentForm.classList.toggle('active');

newStudentForm.onsubmit = (event) => {
  event.preventDefault();

  const formData = {
    name: document.getElementById('name').value,
    logo_file_path: document.getElementById('logoFilePath').value,
    banner_file_path: document.getElementById('bannerFilePath').value,
    mission: document.getElementById('Mission').value,
    vission: document.getElementById('Vission').value,
    program_educational_objectives: document.getElementById(
      'programEducationalObjectives'
    ).value,
    college_id: document.getElementById('collegeId').value,
  };

  console.log(formData);

  formData.append('name', formValues['name']);
  formData.append('logo_file_path', formValues['logo_file_path']);
  formData.append('banner_file_path', formValues['banner_file_path']);
  formData.append('mission', formValues['mission']);
  formData.append('vission', formValues['vission']);
  formData.append('program_educational_objectives', formValues['program_educational_objectives']);
  formData.append('college_id', formValues['college_id']);

  fetch('views/department.php/create', {
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
  await fetchData('views/table_headers.php?table=department'),
  await fetchData('views/department.php/departments')
);
