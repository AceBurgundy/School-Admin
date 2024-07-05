const createNewsToggle = document.getElementById('create-new-news-button');
const newNewsForm = document.getElementById('new-news-form');

createNewsToggle.onclick = () => newNewsForm.classList.toggle('active');

newNewsForm.onsubmit = event => {
  event.preventDefault();

  const formData = {
    title: document.getElementById('title').value,
    image_path: document.getElementById('imagePath').value,
    venue: document.getElementById('venue').value,
    date_time: document.getElementById('dateTime').value,
    start_time: document.getElementById('startTime').value,
    end_time: document.getElementById('endTime').value,
    event_link: document.getElementById('eventLink').value
  };

  console.log(formData);
}