<?php
include_once('include/header.php');
?>

<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
  <h5 class="card-header">Product List</h5>
  <div class="table-responsive text-nowrap">

    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Category Name</th>
          <th>Category Slug</th>
          <th>Advance Payment</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
            <tbody class="table-border-bottom-0">
                <tr>
          <td>1</td>
          <td>Mixer Grinder</td>
          <td>mixer-grinder</td>
          <td>40%</td>
          <td>            <span class="badge bg-label-primary me-1">Active</span>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=1&amp;id=1">Active </a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=2&amp;id=1"> Inactive</a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/update-product-category?id=1"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              </div>
            </div>
          </td>
        </tr>
                <tr>
          <td>13</td>
          <td>T Shirts</td>
          <td>t-shirt</td>
          <td>70%</td>
          <td>            <span class="badge bg-label-primary me-1">Active</span>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=1&amp;id=13">Active </a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=2&amp;id=13"> Inactive</a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/update-product-category?id=13"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              </div>
            </div>
          </td>
        </tr>
                <tr>
          <td>16</td>
          <td>T Shirts</td>
          <td>t-shirts</td>
          <td>70%</td>
          <td>            <span class="badge bg-label-primary me-1">Active</span>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=1&amp;id=16">Active </a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=2&amp;id=16"> Inactive</a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/update-product-category?id=16"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              </div>
            </div>
          </td>
        </tr>
                <tr>
          <td>17</td>
          <td>T Shirts</td>
          <td>serwer</td>
          <td>70%</td>
          <td>          <span class="badge bg-label-danger me-1">Inactive</span>
            </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=1&amp;id=17">Active </a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=2&amp;id=17"> Inactive</a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/update-product-category?id=17"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              </div>
            </div>
          </td>
        </tr>
                <tr>
          <td>20</td>
          <td>T Shirts</td>
          <td>werwerwer</td>
          <td>10%</td>
          <td>          <span class="badge bg-label-danger me-1">Inactive</span>
            </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=1&amp;id=20">Active </a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/product-category?status=2&amp;id=20"> Inactive</a>
                <a class="dropdown-item" href="http://localhost/dozkart/admin-doz/update-product-category?id=20"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              </div>
            </div>
          </td>
        </tr>
               
      </tbody>
    </table>
  </div>
</div>

    </div>

</div>


<script src="<?php base_url('app/doz-admin/assets/js/ivis_edtor.js') ?>"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#product_description'))
        .catch(error => {
            console.error('There was a problem initializing the editor:', error);
        });
</script>
<?php
include_once('include/footer.php');

?>