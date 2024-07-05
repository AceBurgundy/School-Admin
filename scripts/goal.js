document.addEventListener('DOMContentLoaded', function() {
    const createGoalObjectiveToggle = document.getElementById('create-new-goal-objective-button');
    const newGoalObjectiveForm = document.getElementById('new-goal-object-form');
  
    createGoalObjectiveToggle.onclick = () => newGoalObjectiveForm.classList.toggle('active');
  
    newGoalObjectiveForm.onsubmit = event => {
      event.preventDefault();
  
      const formData = {
        college_id: document.getElementById('college-id').value,
        department_id: document.getElementById('department-id').value,
        text: document.getElementById('text').value,
      };
  
      console.log(formData);
    }
  });