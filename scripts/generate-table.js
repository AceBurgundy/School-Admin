export const createTable = (headerList, dataList) => {
  const section = document.body.querySelector("section");

  section.innerHTML += /* html */ `
    <div id='table-container'>
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
                ${tableHeader.map((key) => `<td>${data[key]}</td>`).join("")}
              </tr>
            `
            )
            .join("")}
        </tbody>
      </table>
    </div>
  `;
};
