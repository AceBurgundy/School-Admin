import { createTable } from './generate-table.js';
import { makeToastNotification } from './helper.js';
import { fetchData } from './views-fetcher.js';

const createCourseCurriculumToggle = document.getElementById('create-new-course-curriculum-button');
const newCourseCurriculumForm = document.getElementById('new-course-curriculum-form');

createCourseCurriculumToggle.onclick = () => {
  newCourseCurriculumForm.classList.toggle('active')
};

newCourseCurriculumForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    input_text: document.getElementById('text').value,
    course_id: document.getElementById('course-id').value
  };

  const formData = new FormData();

  formData.append("input_text", formValues['input_text']);
  formData.append("course_id", formValues['course_id']);

  fetch("views/coursecurriculum/create.php", {
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
  await fetchData("views/table_headers.php?table=coursecurriculum"),
  await fetchData("views/coursecurriculum.php/coursecurriculums")
);
