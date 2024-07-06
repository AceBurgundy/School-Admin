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
              ${headerList.map((key) => `<td>${data[key] !== undefined ? data[key] : ''}</td>`).join("")}
            </tr>
          `
          )
          .join("")}
      </tbody>
    </table>
  `;
};
