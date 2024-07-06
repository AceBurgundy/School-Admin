import { createTable } from './generate-table.js';
import { makeToastNotification } from './helper.js';
import { fetchData } from './views-fetcher.js';

const createCourseReviewToggle = document.getElementById('create-new-course-review-button');
const newCourseReviewForm = document.getElementById('new-course-review-form');

createCourseReviewToggle.onclick = () => newCourseReviewForm.classList.toggle('active');

newCourseReviewForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    input_name: document.getElementById('name').value,
    course_review: document.getElementById('review').value,
    course_rating: document.getElementById('rating').value,
    course_id: document.getElementById('course-id').value
  }

  const formData = new FormData();

  formData.append("input_name", formValues['name']);
  formData.append("course_review", formValues['review']);
  formData.append("course_rating", formValues['rating']);
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
  await fetchData("views/table_headers.php?table=coursereview"),
  await fetchData("views/coursereview/coursereviews.php")
);