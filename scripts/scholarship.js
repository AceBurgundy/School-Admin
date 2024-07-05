
import { makeToastNotification } from './helper.js';

const createNewsAuthorButton = document.getElementById('create-new-scholarship-button');
const newNewsAuthorForm = document.getElementById('new-scholarship-form');

createNewsAuthorButton.onclick = () => newNewsAuthorForm.classList.toggle('active');

newNewsAuthorForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    name: document.getElementById('scholarship').value,
  };

  const formData = new FormData();
  
  formData.append("name", formValues['name']);
  
  fetch("views/scholarship/create.php", {
    method: "POST",
    body: formData,
    
  })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      if (data.status === "error") {
        makeToastNotification(data.message);
      }

      if (data.status === "success") {
        makeToastNotification(data.message);
        
        // leave empty
      }
    })
    .catch(error => console.error("Error:", error));
}