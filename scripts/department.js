const createStudentToggle = document.getElementById('create-new-departmentBtn');
const newStudentForm = document.getElementById('new-department-form');

createStudentToggle.onclick = () => newStudentForm.classList.toggle('active');

newStudentForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    name: document.getElementById('name').value,
    logo_file_path: document.getElementById('logoFilePath').value,
    banner_file_path: document.getElementById('bannerFilePath').value,
    mission: document.getElementById('Mission').value,
    vission: document.getElementById('Vission').value,
    program_educational_objectives: document.getElementById('programEducationalObjectives').value,
    college_id: document.getElementById('collegeId').value
  };

  console.log(formData);
}