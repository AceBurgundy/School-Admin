const createScholarshipButton = document.getElementById('create-new-scholarship-button');
const newScholarshipForm = document.getElementById('new-scholarship-form');

createScholarshipButton.onclick = () => newScholarshipForm.classList.toggle('active');

newScholarshipForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    scholarship: document.getElementById('scholarship').value,
  };

  console.log(formData);
}