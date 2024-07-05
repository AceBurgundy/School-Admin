const createSchoolToggle = document.getElementById('create-new-school-button');
const newSchoolForm = document.getElementById('new-school-form');

createSchoolToggle.onclick = () => newSchoolForm.classList.toggle('active');

newSchoolForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    name: document.getElementById('name').value,
    address: document.getElementById('address').value,
  };

  console.log(formData);
}