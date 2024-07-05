import { makeToastNotification } from './helper.js';



document.addEventListener('DOMContentLoaded', function() {
  const createGoalObjectiveToggle = document.getElementById('create-new-goal-objective-button');
  const newGoalObjectiveForm = document.getElementById('new-goal-object-form');

  createGoalObjectiveToggle.onclick = () => newGoalObjectiveForm.classList.toggle('active');

  newGoalObjectiveForm.onsubmit = event => {
    event.preventDefault();

    const formValues = {
      college_id: document.getElementById('college_id').value,
      department_id: document.getElementById('department_id').value,
      text: document.getElementById('text').value,
    };

    const formData = new FormData();

    formData.append("text", formValues['text']);
    formData.append("college_id", formValues['college_id']);
    formData.append("department_id", formValues['department_id']);




    fetch("views/goal_and_objective/create.php", {
      method: "POST",
      body: formData,
  })
    .then(response => response.json())
    .then(data => {
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
});




