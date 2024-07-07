const createContactNumberToggle = document.getElementById('create-contactnumber-button');
const newContactNumberForm = document.getElementById('new-contactnumber-form');

createContactNumberToggle.onclick = () => newContactNumberForm.classList.toggle('active');

newContactNumberForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    college_id: document.getElementById('collegelId').value,
    department_id: document.getElementById('departmentId').value
  };

  console.log(formData);
}