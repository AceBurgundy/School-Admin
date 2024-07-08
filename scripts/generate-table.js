export const createTable = (headerList, dataList) => {
  const container = document.getElementById("table-container");

  const headers = headerList && headerList.length > 0
    ? [...headerList.map(title => `<td>${title}</td>`), /* html */`<td>Options</td>`].join("")
    : "";

  const generateUpdateButton = data => {
    return /* html */`
      <td>
        <form id='form-update' data-id="${data.id ?? ''}">
          ${
            headerList.map(key => /* html */`
              ${
                data[key] !== undefined
                  ? /* html */`<input type='hidden' value="${data[key]}" class="${key}-data-holder">`
                  : ''
              }
            `).join("")
          }
          <button class='form-update__submit hidden'>Update</button>
        </form>
      </td>`;
  }

  container.innerHTML = /* html */ `
    <table class="table table-dark">
      <thead>
        <tr>
          ${headers}
        </tr>
      </thead>
      <tbody>
        ${dataList
          .map(
            (data) => /* html */ `
              <tr>
                ${headerList.map(key => /* html */`
                  <td class="${key}-data-display data-holder">
                    ${data[key] !== undefined
                      ? data[key]
                      : ''
                    }
                  </td>
                `).join("")}
                ${generateUpdateButton(data)}
              </tr>
            `
          )
          .join("")}
      </tbody>
    </table>
  `;
};

function detectType(data) {
  let inputType;

  if (!isNaN(Date.parse(data)) && data.match(/^\d{4}-\d{2}-\d{2}$/)) {
    inputType = 'date';
  } else if (data.match(/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/)) {
    inputType = 'datetime-local';
  } else if (data.match(/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/)) {
    inputType = 'datetime-local';
  } else if (data.match(/^\d{2}:\d{2}(:\d{2})?$/)) {
    inputType = 'time';
  } else if (!isNaN(data) && data.trim() !== '') {
    inputType = 'number';
  } else if (typeof data === 'string') {
    inputType = 'text';
  } else {
    inputType = 'text';
  }

  return inputType;
}

let currentlyEditing = false;

window.onclick = event => {
  const clickedTableData = event.target.classList.contains("data-holder");

  if (clickedTableData) {
    if (event.target.children.length <= 0) {
      const data = event.target.textContent.trim();
      event.target.innerHTML = /* html */`<input type="${detectType(data)}" class="data-holder-editable" value="${data}">`;
      currentlyEditing = true;
      return;
    }
  }

  const clickedEditableData = event.target.classList.contains('data-holder-editable');

  if (!clickedEditableData && currentlyEditing) {
    const editableInput = document.querySelector('.data-holder-editable');
    const editableInputParent = editableInput.parentElement;

    const newData = editableInput.value;

    const editableInputHolderElementClassName = editableInput.parentElement.classList[0].replace('display', 'holder');
    const editableInputHolderElement = document.querySelector(`.${editableInputHolderElementClassName}`);

    editableInputHolderElement.value = newData;
    const editableInputHolderElementFormSubmitButton = editableInputHolderElement.parentElement.lastElementChild;

    // editableInputHolderElementFormSubmitButton.click();
    editableInputParent.innerHTML = newData;
  }
}