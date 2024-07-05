const createCourseCurriculumToggle = document.getElementById('create-new-course-curriculum-button');
const newCourseCurriculumForm = document.getElementById('new-course-curriculum-form');

createCourseCurriculumToggle.onclick = () => newCourseCurriculumForm.classList.toggle('active');

newCourseCurriculumForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    input_text: document.getElementById('text').value,
    course_id: document.getElementById('course-id').value
  };

  console.log(formData);
}