const createCourseToggle = document.getElementById('create-new-course-button');
const newCourseForm = document.getElementById('new-course-form');

createCourseToggle.onclick = () => newCourseForm.classList.toggle('active');

newCourseForm.onsubmit = event => {
  event.preventDefault();

  const formData = {

    title_used: document.getElementById('title').value,
    image_used: document.getElementById('image').value,
    rating_used: document.getElementById('rating_used').value,
    languaged_used: document.getElementById('languaged_used').value,
    number_of_lessons: document.getElementById('number_of_lessons').value,
    number_of_quizes: document.getElementById('number_of_quizes').value,
    course_level: document.getElementById('course_level').value,
    duration: document.getElementById('duration').value,
    description: document.getElementById('description').value,
    what_will_you_learn: document.getElementById('what will you learn').value,
    instructor_id: document.getElementById('instructorId').value,
    department_id: document.getElementById('departmentId').value
  };

  console.log(formData);
}