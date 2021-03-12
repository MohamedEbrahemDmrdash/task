
fetch("jstable.json").then(response=>response.json()).then(data=>{
  var docDefinition = {
    content: [
      {
        layout: 'lightHorizontalLines', // optional
        table: {
          // headers are automatically repeated if the table spans over multiple pages
          // you can declare how many rows should be treated as headers
          headerRows: 1,
          widths: [ 200, 200 ],

          body: [
            [ 'User_name', 'Number of tests'],
                [data[1], data[0]],
            [ { text: 'Bold value', bold: true }, 'Val 2']
          ]
        }
      }
    ]
  };  
  // console.log(data);
  pdfMake.createPdf(docDefinition).download();
});

// var externalDataRetrievedFromServer = [
//     { name: 'Bartek', age: 34 },
//     { name: 'John', age: 27 },
//     { name: 'Elizabeth', age: 30 },
// ];

  // function buildTableBody(data, columns) {
  //     var body = [];

  //     body.push(columns);

  //     data.forEach(function(row) {
  //         var dataRow = [];

  //         columns.forEach(function(column) {
  //             dataRow.push(row[column].toString());
  //         })

  //         body.push(dataRow);
  //     });

  //     return body;
  // }

  // function table(data, columns) {
  //     return {
  //         table: {
  //             headerRows: 1,
  //             body: buildTableBody(data, columns)
  //         }
  //     };
  // }

  // var dd = {
  //     content: [
  //         { text: 'Dynamic parts', style: 'header' },
  //         table(jsonresponse, [0, 0])
  //     ]
  // }

