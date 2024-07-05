import { createTable } from "./generate-table.js";
import { makeToastNotification } from "./helper.js";
import { fetchData } from "./views-fetcher.js";

const createCollegeToggle = document.getElementById('create-new-college-button');
const newCollegeForm = document.getElementById('new-college-form');

createCollegeToggle.onclick = () => newCollegeForm.classList.toggle('active');

newCollegeForm.onsubmit = event => {
  event.preventDefault();

  const formValues = {
    name: document.getElementById('name').value,
    banner_file_path: document.getElementById('bannerFilePath').value,
    logo_file_path: document.getElementById('logoFilePath').value,
    organizational_chart_file_path: document.getElementById('organizationalChartFilePath').value,
    secretary: document.getElementById('secretary').value,
    email: document.getElementById('email').value,
    mission: document.getElementById('mission').value,
    vission: document.getElementById('vission').value,
    program_educational_objectives: document.getElementById('programEducationalObjectives').value,
  };

  const formData = new FormData();
  
  formData.append("name", formValues["name"]);
  formData.append("banner_file_path", formValues["banner_file_path"]);
  formData.append("logo_file_path", formValues["logo_file_path"]);
  formData.append("organizational_chart_file_path", formValues["organizational_chart_file_path"]);
  formData.append("secretary", formValues["secretary"]);
  formData.append("email", formValues["email"]);
  formData.append("mission", formValues["mission"]);
  formData.append("vission", formValues["vission"]);
  formData.append("program_educational_objectives", formValues["program_educational_objectives"]);

  fetch("views/college/create.php", {
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
  await fetchData("views/college/table_headers.php"),
  await fetchData("views/college/college.php")
);