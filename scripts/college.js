const createStudentToggle = document.getElementById('create-new-college-button');
const newStudentForm = document.getElementById('new-college-form');

createStudentToggle.onclick = () => newStudentForm.classList.toggle('active');

newStudentForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    name: document.getElementById('name').value,
    banner_file_path: document.getElementById('bannerFilePath').value,
    logo_file_path: document.getElementById('logoFilePath').value,
    organizational_chart_file_path: document.getElementById('organizationalChartFilePath').value,
    secretary: document.getElementById('secretary').value,
    email: document.getElementById('email').value,
    mission: document.getElementById('mission').value,
    vission: document.getElementById('vission').value,
    program_educational_objectives: document.getElementById('programEducationalObjectives').value,
  };

  console.log(formData);
}