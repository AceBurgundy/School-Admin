import { createTable } from "./generate-table.js";
import { makeToastNotification } from "./helper.js";
import { fetchData } from "./views-fetcher.js";

const createAdminToggle = document.getElementById("create-new-admin-button");
const newAdminForm = document.getElementById("new-admin-form");

createAdminToggle.onclick = () => newAdminForm.classList.toggle("active");

newAdminForm.onsubmit = (event) => {
  event.preventDefault();

  const formValues = {
    username: document.getElementById("username").value,
    birthdate: document.getElementById("birthdate").value,
    email: document.getElementById("email").value,
    password: document.getElementById("password").value,
  };

  const formData = new FormData();

  formData.append("username", formValues["username"]);
  formData.append("birthdate", formValues["birthdate"]);
  formData.append("email", formValues["email"]);
  formData.append("password", formValues["password"]);

  fetch("views/admin/create.php", {
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
  await fetchData("views/table_headers.php?table=admin"),
  await fetchData("views/admin/admin.php")
);
