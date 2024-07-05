const createStudentToggle = document.getElementById('create-new-dateTaken-button');
const newStudentForm = document.getElementById('new-datetaken-form');

createStudentToggle.onclick = () => newStudentForm.classList.toggle('active');

newStudentForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    date_taken: document.getElementById('dateTaken').value,
  
  };

  console.log(formData);
}