let url = "http://localhost/dozkart/";
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

window.onscroll = () => {
  if (window.scrollY >= 100) {
    $("header").addClass("shadow-lg");
    $("header").removeClass("border-bottom");
  } else {
    $("header").removeClass("shadow-lg");
    $("header").addClass("border-bottom");
  }
};

$(window).on("load", function () {
  $(".loader-main").hide();
  let skeletons = $(".skeleton");
  for (let i = 0; i < skeletons.length; i++) {
    skeletons.eq(i).removeClass("skeleton");
  }
});

const toastRemoveS = () => {
  $(".toast.ses").slideUp(800);
};

setTimeout(() => {
  toastRemoveS();
}, 7000);

const thumbChange = (e) => {
  document.querySelector(".view-zoom-img").src = e.src;
};

const searchBar = (value) => {
  $(".loader-main").show();
  const searchValue = $.trim($(value).val());

  $.ajax({
    url: url + "api/search-bar.php",
    method: "POST",
    data: { searchValue: searchValue },
    success: function (response) {
      if (response.status === "success") {
        $(".loader-main").hide();
        $("main").html(response.data);
      } else {
        $(".loader-main").hide();
        if (response.message == "redirect") {
          window.location.href = url + "login";
        }
        if (response.message == "Product Not Available") {
          alertFunction("danger", "Product Not Available");
        }
      }
    },
    error: function (xhr, status, error) {
      console.error(status, error);
    },
  });
};

const alertFunction = (type, message) => {
  $(".toast.js").removeClass("hide");
  $(".toast.js").addClass("show");
  $(".toast.js").removeClass("danger");
  $(".toast.js").removeClass("success");
  $(".toast.js").addClass(type);
  $(".toast.js .toast-body").html(message);
};

const categoriesSearch = (value) => {
  $(".loader-main").show();
  const searchValue = $.trim($(value).text());
  console.log(searchValue);

  $.ajax({
    url: url + "api/search-bar.php",
    method: "POST",
    data: { searchValue: searchValue },
    success: function (response) {
      if (response.status === "success") {
        $(".loader-main").hide();
        $("main").html(response.data);
      } else {
        $(".loader-main").hide();
        if (response.message == "redirect") {
          window.location.href = url + "login";
        }
      }
    },
    error: function (xhr, status, error) {
      console.error(status, error);
    },
  });
};

function loadCartItems() {
  $.ajax({
      url: url+'api/get_cart.php',
      type: 'GET',
      success: function(response) {
          const cartItemsContainer = document.getElementById('cartItemsContainer');
          cartItemsContainer.innerHTML = ''; 
         
          if (Array.isArray(response)) {
              if (response.length > 0) {
                  response.forEach(item => {
                      const totalPrice = (parseInt(item.product_price)  * parseInt(item.quantity));
                      cartItemsContainer.innerHTML += `
                          <div class="cart-item d-flex mb-3 border p-3 shadow-sm bg-white rounded" id="main-${item.product_slug}">
                              <div class="cart-item-image me-3">
                                  <img src="${url+'assets/upload/'+item.image_url}" alt="Product Image" class='border' style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                              </div>
                              <div class="cart-item-info flex-grow-1">
                                  <h6 class="mb-1 overflow-hidden" style='font-size:14px;line-height:22px;display: -webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;'>${item.product_title}</h6>
                                  <span class="d-block text-primary fw-bold"  id='price'>BDT ${totalPrice}</span>
                                  <div class="cart-item-actions d-flex align-items-center mt-1 border" style="width: fit-content;border-radius: 2px;">
                                      <button class="btn btn-outline-secondary btn-sm me-2" onclick="addToCarUpDown('${item.product_slug}',-1,${(parseInt(item.product_price) )},this)">-</button>
                                      <span id="itemQuantity" class="mx-2">${item.quantity}</span>
                                      <button class="btn btn-outline-secondary btn-sm ms-2" onclick="addToCarUpDown('${item.product_slug}',1,${(parseInt(item.product_price))},this)">+</button>
                                  </div>
                              </div>
                              <div class="ms-3 text-end flex-column d-flex align-items-end" style='min-width:80px'>
                                  <button class="btn btn-danger btn-sm d-flex" onclick="addToCartRemove('${item.product_slug}')" style='padding:4px 5px'>
                                      <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z" fill="#FFFFFF"/>
                                      </svg>
                                  </button>
                                  <a href="${url}checkout/${item.product_slug}" class="btn btn-primary btn-sm mt-2" style="color:white !important" >Buy Now</a>
                              </div>
                          </div>
                      `;
                  });
              } else {
                  cartItemsContainer.innerHTML = `
                      <img src="${url+'assets/img/empty-cart.png'}" class='mx-auto d-flex' style='width:70%;' />
                      <span class="text-center mt-3 d-block">Your Cart is Empty</span>
                      <a href="${url+'categories'}" class="btn btn-primary d-block mt-2" style='color:white !important;'>Start Shopping</a>
                  `;
              }
          } else if (response.error === 'not_logged_in') {
              cartItemsContainer.innerHTML = `
                  <img src="${url+'assets/img/empty-cart.png'}" class='mx-auto d-flex' style='width:70%;' />
                  <span class="text-center mt-3 d-block">You are not logged in. Please log in to continue.</span>
                  <a href="login" class="btn btn-primary d-block mt-2" style='color:white !important;'>Login</a>
              `;
          }else{
            console.log('okl')
          }
      },
      error: function(err) {
          console.error(err);
      }
  });
}
loadCartItems();

const addToCart = (buynow='') => {
  // $(".loader-main").show();
  let productColor=''
  if ($('input[name="selectedImage"]').length > 0) {
     productColor = $('input[name="selectedImage"]:checked').val();
     if(!productColor){
      $('#color-error').html('Please select a color')
      $('#color-error').removeClass('d-none');
      return;
     }

  }
  let productSlug = $.trim($("#productSlug").val());
  let productSize = $.trim($("#size").val());
  let productQuantity = $.trim($("#quantity").val());
  let productColorId = $.trim($("#product_color_id").val());
  $.ajax({
    url: url + "api/add-to-cart.php",
    method: "POST",
    data: {
      productSlug: productSlug,
      productColor: productColor,
      productSize: productSize,
      productQuantity: productQuantity,
      productColorId: productColorId,
    },
    success: function (response) {
      if (response.status === "success") {
        $(".loader-main").hide();
        if(response.quantity){
          var currentCount = parseInt($("#addtoCartCount").text());
          $("#addtoCartCount").html(response.quantity);
          console.log(response.quantity)
        }else{
          console.log('ok')
        }
        alertFunction("success", "The product has been added to your cart");
       
        $('#color-error').hide();
        if(buynow!==''){
          window.location.href = url + "checkout/"+productSlug;
        }else{
          loadCartItems();
          var cartOffcanvas = new bootstrap.Offcanvas(document.getElementById('cartOffcanvas'));
          cartOffcanvas.show();
        }

      } else {
        $(".loader-main").hide();
        if (response.message == "redirect") {
          window.location.href = url + "login";
        }
        if (response.message == "alrady add") {
          $(".loader-main").hide();
          alertFunction(
            "danger",
            "This product is already added to your cart."
          );
          if(buynow!==''){
            window.location.href = url + "checkout/"+productSlug;
          }
        }
      }
    },
    error: function (xhr, status, error) {
      console.error(status, error);
    },
  });
};

const addToCartRemove = (productSlug) => {
  $(".loader-main").show();
  $.ajax({
    url: url + "api/add-to-cart-remove.php",
    method: "POST",
    data: {
      productSlug: productSlug,
    },
    success: function (response) {
      if (response.status === "success") {
        loadCartItems();
        $(".loader-main").hide();
        var currentCount = parseInt($("#addtoCartCount").text());
        $("#addtoCartCount").text(currentCount - 1);
        alertFunction("success", "Your product has been remove to your cart");
        $("#main-" + productSlug).removeClass('d-flex');
        $("#main-" + productSlug).hide(100);
      } else {
        $(".loader-main").hide();
        console.log(response);
      }
    },
    error: function (xhr, status, error) {
      console.error(status, error);
    },
  });
};

const addToCarUpDown = (productSlug, value,price,button) => {
  $(button).prop('disabled', true);

  $.ajax({
    url: url + "api/add-to-cart-updown.php",
    method: "POST",
    data: {
      productSlug: productSlug,
      value: value,
    },
    success: function (response) {
      if (response.status === "success") {
        $("#main-"+productSlug+' #itemQuantity').html(response.quantity);
        $("#main-"+productSlug+' #price').html('BDT '+parseInt(price)*parseInt(response.quantity))
        $(button).prop('disabled', false);
          
      } else {
      }
    },
    error: function (xhr, status, error) {
      console.error(status, error);
    },
  });
};

if ($("#district-main-value")) {
  let districtMainValue = $("#district-main-value").val();

  $("#district option").each(function () {
    if ($(this).val() === districtMainValue) {
      $(this).attr("selected", "selected");
    }
  });
}

$(document).ready(function () {
  $("#add-prop-btn").on("click", function () {
    var tableBody = $("#myTable tbody");
    var newRow = $("<tr>");

    var keyCell = $("<td>");
    var keyInput = $("<input>").attr({
      type: "text",
      name: "propskey[]",
      class: "form-control",
      placeholder: "Key",
    });
    keyCell.append(keyInput);

    var valueCell = $("<td class='px-4 py-2 whitespace-nowrap'>");
    var valueInput = $("<input>").attr({
      type: "text",
      name: "propsvalue[]",
      class: "form-control",
      placeholder: "Value",
    });
    valueCell.append(valueInput);

    var deleteCell = $("<td>");
    var deleteBtn = $("<button>")
      .attr({
        type: "button",
        class: "delete-row-btn btn btn-light px-2 py-1",
      })
      .text("Delete");
    deleteCell.append(deleteBtn);

    newRow.append(keyCell, valueCell, deleteCell);
    tableBody.append(newRow);
  });

  $(document).on("click", ".delete-row-btn", function () {
    $(this).closest("tr").remove();
  });
});

document.addEventListener("click", function (event) {
  if (event.target.classList.contains("delete-row-btn")) {
    var row = event.target.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
});

const imageUpload = (input) => {
  if (input.files && input.files[0]) {
    const file = input.files[0];

    const reader = new FileReader();

    reader.onload = function (e) {
      const imgElement = $("<img>");

      imgElement.attr("src", e.target.result);
      imgElement.attr("width", "100%");
      imgElement.attr("height", "100%");
      imgElement.attr("class", "rounded");

      $("#upload-img-add").html(imgElement);
    };

    // Read the selected file as a Data URL
    reader.readAsDataURL(file);
  }
};

const applyAddress = () => {
  var radioButtons = document.getElementsByName("address-check");
  for (var i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
      $("#address-select-show").empty();
      var checkedValue = radioButtons[i].value;
      let parentData = document.querySelector("#address-label" + checkedValue);

      $(parentData)
        .children(":not(input)")
        .each(function () {
          var thisHtml = $(this).html();
          $(thisHtml).html("");
          $('input[name="addressid"]').val(checkedValue);
          $("#address-select-show").html(
            $("#address-select-show").html() + thisHtml
          );
        });
    }
  }
};

const submitCheckout = (e) => {
  if ($('input[name="addressid"]').val() == "") {
    e.preventDefault();
    $("#addressModal").modal("show");
  }
};

$("#checkoutForm").submit(function (e) {
  submitCheckout(e);
});

const quantityChange = (value) => {
  let quantity = $("#quantity").val();
  if (value == -1) {
    if (quantity == 1) {
      // Do nothing
    } else {
      $("#quantity").val(parseInt(quantity) - 1);
    }
  } else {
    $("#quantity").val(parseInt(quantity) + 1);
  }
};

const showHidePassword = (value) => {
  const $passwordInput = $(".password-show-hide");
  if (value == "show") {
    $passwordInput.attr("type", "text");
    $(".show-password").removeClass("d-none");
    $(".hide-password").addClass("d-none");
    console.log("ok");
  } else {
    $passwordInput.attr("type", "password");
    $(".show-password").addClass("d-none");
    $(".hide-password").removeClass("d-none");
  }
};



const searchShow = () => {
  $('#responsive-search').toggleClass('showSearch');
  console.log('ok')
};



$('.selectable-image').on("click",function(){
  $('.selectable-image').removeClass('active');
  $(this).addClass('active');

  $('#priceShow').html('BDT '+ $(this).data('p-price'));
  $('#totalPriceShow').html('BDT '+ $(this).data('p-totalprice'));
  $('#product_color_id').val($(this).data('colorid'));
})



$('.categoryClick').on('click', function() {
  $(this).next().toggleClass('collapse')
})





const filterSubmit = ()=>{
  const form = document.getElementById('filterForm');
  const formData = new FormData(form);
  const filters = {};
  formData.forEach((value, key) => {
      if (!filters[key]) {
          filters[key] = [];
      }
      filters[key].push(value);
  });

  const hasFilters = Object.values(filters).some(values => values.some(val => val.trim() !== ""));

  if (!hasFilters) {
      console.log("No valid filters selected. AJAX request will not be sent.");
      console.log(filters)
      return;
  }


  let jsonData = JSON.stringify(filters);

  

  $.ajax({
    type: "POST",
    url: url + "api/categories.php",
    contentType: 'application/json',
    dataType: "json",
    data: jsonData,
    beforeSend: function() {
      $('#productsContainer').append(`
        <div class='loader-main align-items-center justify-content-center h-100 w-100' style='position: absolute; top: 0; left: 0; z-index: 10001; background: rgba(227, 227, 227, 0.95); height: 100%; display: flex;'>
            <span class="loader"></span>
        </div>
    `);
    },
    
    success: function(response) {
        console.log('Filtered Data:', response);
        $('#productsContainer').empty();

        if (response.status && response.data.length > 0) {
            response.data.forEach(data => {
                $('#productsContainer').append(`
                    <div class="col-lg-3 px-1 px-md-2 col-md-4 col-6 product overflow-hidden position-relative py-1" style='padding:5px'>
                        <a href="${url + 'view-product/' + data.product_slug}">
                            <div class='shadow-sm rounded-1 h-100'>
                                <div class="img overflow-hidden" style='border-radius:2px 2px 0 0; background-image: url("${url + 'assets/img/default-image.png'}"); height: 240px; background-repeat: no-repeat; background-position: center; background-size: 80%;'>
                                    <img src="${url + 'assets/upload/' + data.image}" alt="" class="w-100 object-fit-cover" style='border-radius:2px 2px 0 0; height: 240px;'>
                                </div>
                                <div class="p-2 text-left">
                                    <div class="d-flex align-items-end gap-2">
                                        <span class="fw-semibold text-primary" style='font-size: 14px;'>BDT ${data.product_price}</span>
                                    </div>
                                    <h3 class="mb-1 overflow-hidden" style='font-size: 16px; line-height:24px; display: -webkit-box; -webkit-box-orient:vertical; -webkit-line-clamp:2;'>
                                        ${data.product_title}
                                    </h3>
                                    <div class='d-flex align-items-center gap-1'>
                                        ${Array.from({length: data.product_rating_star}, (_, i) => `
                                            <img style='width:12px;' src="${url + 'assets/img/star.png'}" alt='star' />
                                        `).join('')}
                                        <p class='mb-0' style='margin-left: 5px; font-size:13px'>${data.product_ratting} Rating</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div style='top: 15px;' class="position-absolute d-flex gap-1 flex-column product-triger-main">
                            <div class='bg-white shadow-sm product-triger d-flex align-items-center justify-content-center'>
                                <a href="${url + 'view-product/' + data.product_slug}" class='text-paragraph'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0"></path>
                                            <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                `);
            });
        } else {
            // Handle case when no data is returned
            $('#productsContainer').append(`
               <div class="col-12 text-center">
   <h5 class="text-danger fw-bold text-center fw-normal d-none d-lg-block py-3" style="font-size: 22px;">Product Not Found</h5>
</div>

            `);
        }
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
    },
    complete: function() {
       
          $('#loader-main').remove();
    }
});

}



