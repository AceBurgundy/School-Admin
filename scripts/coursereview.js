const createCourseReviewToggle = document.getElementById('create-new-course-review-button');
const newCourseReviewForm = document.getElementById('new-course-review-form');

createCourseReviewToggle.onclick = () => newCourseReviewForm.classList.toggle('active');

newCourseReviewForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    input_name: document.getElementById('name').value,
    course_review: document.getElementById('review').value,
    course_rating: document.getElementById('rating').value,
    course_id: document.getElementById('course-id').value
  }

  console.log(formData);
}