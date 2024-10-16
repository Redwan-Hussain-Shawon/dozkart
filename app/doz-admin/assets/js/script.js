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


function productSizeGenerator(){
        const newRow = $('<div class="row mt-2">')
            .append(
                $('<div class="col-md-4">').append(
                    $('<input>', {
                        type: 'text',
                        class: 'form-control',
                        placeholder: 'Size Name',
                        name: 'size_name[]'
                    })
                ),
                $('<div class="col-md-4">').append(
                    $('<input>', {
                        type: 'text',
                        class: 'form-control',
                        placeholder: 'Size View Link',
                        name: 'size_click_view_url[]'
                    })
                ),
                $('<div class="col-md-4 mt-2">').append(
                    $('<button>', {
                        text: 'Delete',
                        type: 'button',
                        class: 'btn btn-danger btn-sm delete-button'
                    }).click(function() {
                        newRow.remove();
                    })
                )
            );

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
