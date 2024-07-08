import { createTable } from './generate-table.js';
import { makeToastNotification } from './helper.js';
import { fetchData } from './views-fetcher.js';

const createNewsAuthorButton = document.getElementById('create-new-newsauthor-button');
const newNewsAuthorForm = document.getElementById('new-newsauthor-form');

createNewsAuthorButton.onclick = () =>
  {
    newNewsAuthorForm.classList.toggle('active')
  };

newNewsAuthorForm.onsubmit = event => {
  event.preventDefault();


  //#region FOR INSERT DATA
  const formValues = {
    input_text: document.getElementById('text').value,
    course_id: document.getElementById('course-id').value
  };

  const formData = new FormData();

  formData.append("input_text", formValues['input_text']);
  formData.append("course_id", formValues['course_id']);

  fetch("views/coursecurriculum.php/create", {
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
  //#endregion
createTable(
  await fetchData("views/table_headers.php?table=newsauthor"),
  await fetchData("views/newsauthor.php/newsauthor")
);