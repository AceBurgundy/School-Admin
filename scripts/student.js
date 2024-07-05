const createScholarshipButton = document.getElementById('create-new-student-button');
const newScholarshipForm = document.getElementById('new-student-form');

createScholarshipButton.onclick = () => newScholarshipForm.classList.toggle('active');

newScholarshipForm.onsubmit = event => {
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