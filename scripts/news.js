import { createTable } from "./generate-table.js";
import { makeToastNotification } from "./helper.js";
import { fetchData } from "./views-fetcher.js";

const createNewsToggle = document.getElementById('create-new-news-button');
const newNewsForm = document.getElementById('new-news-form');

createNewsToggle.onclick = () => newNewsForm.classList.toggle('active');

newNewsForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    title: document.getElementById('title').value,
    image_path: document.getElementById('imagePath').value,
    venue: document.getElementById('venue').value,
    date_time: document.getElementById('dateTime').value,
    start_time: document.getElementById('startTime').value,
    end_time: document.getElementById('endTime').value,
    event_link: document.getElementById('eventLink').value
  };

  const formData = new FormData();

  formData.append("title", formValues["title"]);
  formData.append("image_path", formValues["image_path"]);
  formData.append("venue", formValues["venue"]);
  formData.append("date_time", formValues["date_time"]);
  formData.append("start_time", formValues["start_time"]);
  formData.append("end_time", formValues["end_time"]);
  formData.append("event_link", formValues["event_link"]);


  fetch("views/news.php/create", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "error") {
        makeToastNotification(data.message);
      }

      if (data.status === "success") {
        makeToastNotification(data.message);
        // leave empty
      }
    })
    .catch((error) => console.error("Error:", error));
};
createTable(
  await fetchData("views/news/table_headers.php"),
  await fetchData("views/news.php/news")
);