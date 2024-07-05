const createNewsAuthorButton = document.getElementById('create-new-scholarship-button');
const newNewsAuthorForm = document.getElementById('new-scholarship-form');

createNewsAuthorButton.onclick = () => newNewsAuthorForm.classList.toggle('active');

newNewsAuthorForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    scholarship: document.getElementById('scholarship').value,
  };

  console.log(formData);
}