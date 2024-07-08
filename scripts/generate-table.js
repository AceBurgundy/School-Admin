export const createTable = (headerList, dataList) => {
  const container = document.getElementById("table-container");

  container.innerHTML = /* html */ `
    <table class="table table-dark">
      <thead>
        <tr>
          ${
            headerList && headerList.length > 0
              ? headerList.map((title) => `<td>${title}</td>`).join("")
              : ""
          }
        </tr>
      </thead>
      <tbody>
        ${dataList
          .map(
            (data) => /* html */ `
              <tr>
                ${headerList.map(key => `<td class="${key}-data-display">${data[key] !== undefined ? data[key] : ''}</td>`).join("")}
                <td>
                  <form id='form-update' data-id="${data.id ?? ''}">
                    ${
                      headerList.map(key => /* html */`
                        <td>
                          ${
                            data[key] !== undefined
                              ? /* html */`<input type='hidden' value="${data[key]}" class="${key}-data-holder">`
                              : ''
                          }
                        </td>
                      `).join("")
                    }
                    <button class='form-update__submit'>Update</button>
                  </form>
                </td>
              </tr>
          `
          )
          .join("")}
      </tbody>
    </table>
  `;
};
