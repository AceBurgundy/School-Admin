const createInstructorToggle = document.getElementById('create-new-instructor-button');
const newInstructorForm = document.getElementById('new-instructor-form');

createInstructorToggle.onclick = () => newInstructorForm.classList.toggle('active');

newInstructorForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    first_name: document.getElementById('firstName').value,
    middle_initial: document.getElementById('middleInitial').value,
    last_name: document.getElementById('lastName').value,
    extension: document.getElementById('extension').value,
    facebook_link_id: document.getElementById('facebookLinkId').value,
    twitter_link_id: document.getElementById('twitterLinkId').value,
    linkedin_link_id: document.getElementById('linkedinLinkId').value,
    instagran_link_id: document.getElementById('instagramLinkId').value
  };

  console.log(formData);
}