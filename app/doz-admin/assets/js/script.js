$(document).ready(function () {
  $("#trigger-upload").click(function () {
    generateImageFile();
  });
});
generateImageFile();
function generateImageFile() {
  const fileInputContainer = $("<div>", {
    class: "file-input-container border",
  });

  const fileInput = $("<input>", {
    type: "file",
    name: "mainImage[]",
    multiple: true,
  });

  const deleteButton = $("<button>", {
    text: "Delete",
    type: "button",
    class: "delete-button btn btn-danger btn-sm",
  }).click(function (event) {
    event.preventDefault();
    fileInputContainer.remove();
  });

  // Append the file input and delete button to the container
  fileInputContainer.append(fileInput).append(deleteButton);

  // Append the container to the inputContainer div
  $("#inputContainer").append(fileInputContainer);
}

function productColorGenerator() {
  const newRow = $('<div class="row  mt-2">').append(
    $('<div class="col-md-4">').append(
      $("<input>", {
        type: "text",
        class: "form-control",
        placeholder: "Color Name",
        name: "color_name[]",
      })
    ),
    $('<div class="col-md-4">').append(
      $("<input>", {
        type: "text",
        class: "form-control",
        placeholder: "Color Price",
        name: "color_price[]",
      })
    ),
    $('<div class="col-md-2">').append(
      $("<input>", {
        type: "file",
        class: "form-control",
        name: "color_image[]",
      })
    ),

    $('<div class="col-md-2 mt-2">').append(
      $("<button>", {
        text: "Delete",
        type: "button",
        class: "btn btn-danger btn-sm delete-button",
      }).click(function () {
        // Remove the row when the delete button is clicked
        newRow.remove();
      })
    )
  );

  $("#product-container").append(newRow);
}

$(document).ready(function () {
  $("#product-color-trigger").click(function () {
    productColorGenerator();
  });
});
productColorGenerator();


function productSizeGenerator() {
  const newRow = $('<div class="row mt-2">');

  // Conditionally add the hidden input field for size_id[]
  if ($('#size_id')) {
      newRow.append(
          $('<input>', {
              type: 'hidden',
              name: 'size_id[]',
              value: 'size_insert'
          })
      );
  }

  newRow.append(
      // Size Name input
      $('<div class="col-md-4">').append(
          $('<input>', {
              type: 'text',
              class: 'form-control',
              placeholder: 'Size Name',
              name: 'size_name[]'
          })
      ),
      // Size View Link input
      $('<div class="col-md-4">').append(
          $('<input>', {
              type: 'text',
              class: 'form-control',
              placeholder: 'Size View Link',
              name: 'size_click_view_url[]'
          })
      ),
      // Delete button
      $('<div class="col-md-4 mt-2">').append(
          $('<button>', {
              text: 'Delete',
              type: 'button',
              class: 'btn btn-danger btn-sm delete-button'
          }).click(function() {
              newRow.remove();  // Remove the row when delete is clicked
          })
      )
  );

  // Append the new row to the product-size container
  $('#product-size').append(newRow);
}


$('#product-size-trigger').click(function() {
    productSizeGenerator();
})
productSizeGenerator();


$('#product-props-trigger').click(function() {
    productPropsGenerator();
});
productPropsGenerator();

    function productPropsGenerator(){
    const newRow = $('<div class="row mb-2">')
    
        .append(
            $('<div class="col-md-5">').append(
                $('<input>', {
                    type: 'text',
                    class: 'form-control',
                    placeholder: 'Property Name',
                    name: 'property_name[]'
                })
            ),
            $('<div class="col-md-5">').append(
                $('<input>', {
                    type: 'text',
                    class: 'form-control',
                    placeholder: 'Property Value',
                    name: 'property_value[]'
                })
            ),
            $('<div class="col-md-2">').append(
                $('<button>', {
                    text: 'Delete',
                    type: 'button',
                    class: 'btn btn-danger btn-sm delete-button'
                }).click(function() {
                    // Remove the row when the delete button is clicked
                    newRow.remove();
                })
            )
            
        );

    $('#product-props').append(newRow);
    }


    $(document).ready(function () {
      $.ajax({
          url: '../api/income-chart.php',
          method: 'GET',
          dataType: 'json',
          success: function (data) {
              // Prepare data for the chart
              const months = data.map(item => item.month); // Extract month names
              const incomeValues = data.map(item => parseFloat(item.total_income)); // Extract income values
  
              // Define chart options
              const options = {
                  chart: {
                      type: 'bar',
                      height: 400
                  },
                  series: [{
                      name: 'Income (BDT)',
                      data: incomeValues
                  }],
                  xaxis: {
                      categories: months,
                      title: {
                          text: 'Months'
                      }
                  },
                  yaxis: {
                      title: {
                          text: 'Income'
                      }
                  },
                  title: {
                      text: 'Monthly Income',
                      align: 'center'
                  },
                  colors: ['#1E90FF'],
                  dataLabels: {
                      enabled: true,
                      formatter: function (val) {
                          return "৳" + val;
                      }
                  },
                  tooltip: {
                      y: {
                          formatter: function (val) {
                              return "৳" + val + " BDT";
                          }
                      }
                  }
              };
  
              // Create and render the chart
              const totalIncomeChart = new ApexCharts(document.querySelector("#totalIncomeChart"), options);
              totalIncomeChart.render();
          },
          error: function (xhr, status, error) {
              console.error('Error fetching data:', error);
          }
      });
  });
  