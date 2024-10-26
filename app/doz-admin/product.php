<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
include_once ('../../connect/base_url.php');
include_once ('../../connect/conn.php');
include_once ('include/helper.php');

// Define default values for pagination
$items_per_page = isset($_GET['items']) ? intval($_GET['items']) : 30; // Default to 1 for testing
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($current_page - 1) * $items_per_page;

// Update product status
if (isset($_GET['status']) && !empty($_GET['status'])) {
    $status = mysqli_real_escape_string($conn, trim($_GET['status']));
    $id = mysqli_real_escape_string($conn, trim($_GET['id']));
    $sql = "UPDATE products SET status=$status WHERE product_id=$id";
    if ($conn->query($sql)) {
        alert('success', "Product has been updated successfully.");
        redirect('admin-doz/show-product');
    }
}

// Delete product
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, trim($_GET['id']));
    $sql = "DELETE FROM products WHERE product_id=$id";
    if ($conn->query($sql)) {
        alert('success', "Product has been deleted successfully.");
        redirect('admin-doz/show-product');
    }
}

// Fetch products with pagination
$sql = "SELECT products.product_id, products.product_title, products.product_price, products.status, product_category.category_name, product_image.image_url
        FROM products
        JOIN product_category ON products.product_category = product_category.category_slug
        JOIN product_image ON products.product_slug = product_image.product_slug
        GROUP BY products.product_slug
        ORDER BY products.product_id DESC
        LIMIT $offset, $items_per_page";

$result = $conn->query($sql);

// Fetch total number of products for pagination
$total_sql = "SELECT COUNT(*) as total FROM products";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_items = $total_row['total'];
$total_pages = ceil($total_items / $items_per_page);

// Reset current page if it exceeds total pages after changing items per page
if (isset($_GET['items']) && $current_page > $total_pages) {
    $current_page = $total_pages; // Reset to last page
}

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
                            <th>Product Title</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $i = $offset + 1; // Start index for items on this page
                        if ($result->num_rows > 0) {
                            while ($data = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= shortenText($data['product_title'], 60) ?></td>
                                    <td><?= $data['category_name'] ?></td>
                                    <td><?= $data['product_price'] ?></td>
                                    <td><img src="<?= base_url('assets/upload/' . $data['image_url']) ?>" class="rounded-1" style='width:60px;height:60px;' /></td>
                                    <td>
                                        <?php if ($data['status'] == 1) { ?>
                                            <span class="badge bg-label-primary me-1">Active</span>
                                        <?php } else { ?>
                                            <span class="badge bg-label-danger me-1">Inactive</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to active this product?')" href="<?= base_url('admin-doz/show-product?status=1&id=' . $data['product_id']) ?>">Active</a>
                                                <a onclick="return confirm('Are you sure you want to deactivate this product?')" class="dropdown-item" href="<?= base_url('admin-doz/show-product?status=2&id=' . $data['product_id']) ?>">Inactive</a>
                                                <a onclick="return confirm('Are you sure you want to delete this product?')" class="dropdown-item" href="<?= base_url('admin-doz/show-product?delete=2&id=' . $data['product_id']) ?>">Delete</a>
                                                <a class="dropdown-item" href="<?= base_url('admin-doz/view-product?id=' . $data['product_id']) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center text-danger'>No Products found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination controls -->
            <?php if ($total_items > 0): ?>
                <?php
                $max_display_pages = 4; 
                $start_page = max(1, $current_page - 1); // Start from the current page - 1
                $end_page = min($total_pages, $start_page + $max_display_pages - 1); 
                
                if ($end_page - $start_page < $max_display_pages - 1) {
                    $start_page = max(1, $end_page - $max_display_pages + 1);
                }
                ?>
                <nav aria-label="Page navigation " class="mt-4">
                    <ul class="pagination justify-content-center">
                        <?php if ($current_page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?items=<?= $items_per_page ?>&page=<?= $current_page - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Page number links -->
                        <?php for ($page = $start_page; $page <= min($start_page + $max_display_pages - 1, $total_pages); $page++): ?>
                            <li class="page-item <?= $page == $current_page ? 'active' : '' ?>">
                                <a class="page-link" href="?items=<?= $items_per_page ?>&page=<?= $page ?>">
                                    <?= $page ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($current_page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?items=<?= $items_per_page ?>&page=<?= $current_page + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="<?= base_url('app/doz-admin/assets/js/ivis_editor.js') ?>"></script>
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
