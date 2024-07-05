export const createTable = dataList => {
  let tableHeader = [];

  if (dataList.length > 0) {
    tableHeader = Object.keys(dataList[0]);
  }

  const section = document.body.querySelector('section');

  section.innerHTML += /* html */`
    <table class="table table-dark">
      <thead>
        <tr>
          ${tableHeader.map(title => `<td>${title}</td>`).join('')}
        </tr>
      </thead>
      <tbody>
        ${
          dataList.map(data => /* html */`
            <tr>
              ${tableHeader.map(key => `<td>${data[key]}</td>`).join('')}
            </tr>
          `).join('')
        }
      </tbody>
    </table>
  `;
}
