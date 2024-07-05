const createStudentToggle = document.getElementById('create-new-student-button');
const newStudentForm = document.getElementById('new-student-form');

createStudentToggle.onclick = () => newStudentForm.classList.toggle('active');

newStudentForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    first_name: document.getElementById('firstName').value,
    middle_initial: document.getElementById('middleInitial').value,
    last_name: document.getElementById('lastName').value,
    extension: document.getElementById('extension').value,
    exam_date_id: document.getElementById('examDateId').value,
    school_id: document.getElementById('schoolId').value,
    scholarship_id: document.getElementById('scholarshipId').value
  };

  console.log(formData);
}