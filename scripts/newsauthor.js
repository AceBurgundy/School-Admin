const createNewsAuthorButton = document.getElementById('create-new-newsauthor-button');
const newNewsAuthorForm = document.getElementById('new-newsauthor-form');

createNewsAuthorButton.onclick = () => newNewsAuthorForm.classList.toggle('active');

newNewsAuthorForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    newsauthor: document.getElementById('newsauthor').value,
  };

  console.log(formData);
}