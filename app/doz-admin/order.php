<?php
include_once('include/header.php');
?>

<div class="content-wrapper">

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <?php

        $query = "
SELECT 
    s.status_id, 
    COALESCE(COUNT(o.status), 0) AS order_count
FROM 
    (SELECT 1 AS status_id UNION ALL 
     SELECT 2 UNION ALL 
     SELECT 3 UNION ALL 
     SELECT 4 UNION ALL 
     SELECT 5 UNION ALL 
     SELECT 6 UNION ALL 
     SELECT 7) s
LEFT JOIN 
    orders o ON s.status_id = o.status
GROUP BY 
    s.status_id
ORDER BY 
    s.status_id DESC;
";

        $result = $conn->query($query);

        $statusCounts = [];
        while ($row = $result->fetch_assoc()) {
            $statusCounts[$row['status_id']] = $row['order_count'];
        }



        ?>
        <div class="card mb-6">
            <div class="card-widget-separator-wrapper">
                <div class="card-body card-widget-separator">
                    <div class="row gy-4 gy-sm-1">
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
                                <div>
                                    <h4 class="mb-0"><?= isset($statusCounts[1]) ? $statusCounts[1] : 0 ?></h4>
                                    <p class="mb-0">Order Processing</p>
                                </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-6">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                <div>
                                    <h4 class="mb-0"><?= isset($statusCounts[2]) ? $statusCounts[2] : 0 ?></h4>
                                    <p class="mb-0">Ready to Export</p>
                                </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3">
                                <div>
                                    <h4 class="mb-0"><?= isset($statusCounts[3]) ? $statusCounts[3] : 0 ?></h4>
                                    <p class="mb-0">Custom</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                <div>
                                    <h4 class="mb-0"><?= isset($statusCounts[4]) ? $statusCounts[4] : 0 ?></h4>
                                    <p class="mb-0">Warehouse</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                <div>
                                    <h4 class="mb-0"><?= isset($statusCounts[5]) ? $statusCounts[5] : 0 ?></h4>
                                    <p class="mb-0">Deliver</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                <div>
                                    <h4 class="mb-0"><?= isset($statusCounts[6]) ? $statusCounts[6] : 0 ?></h4>
                                    <p class="mb-0">Complete</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                <div>
                                    <h4 class="mb-0"><?= isset($statusCounts[7]) ? $statusCounts[7] : 0 ?></h4>
                                    <p class="mb-0">Order Cancel</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <?php
        // Assuming you have your database connection established as $conn

        // Get the current page number from the query string, defaulting to 1 if not set
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 20; // Number of records per page
        $offset = ($page - 1) * $limit; // Calculate offset for SQL query

        // Get the total number of records
        $totalQuery = "SELECT COUNT(*) as total FROM orders WHERE status != 8";
        $totalResult = $conn->query($totalQuery);
        $totalRow = $totalResult->fetch_assoc();
        $totalRecords = $totalRow['total'];
        $totalPages = ceil($totalRecords / $limit); // Calculate total pages

        // Get the orders for the current page
        $status = null;
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $status = trim($_GET['status']);
        }
        $query = "SELECT 
        orders.*, 
        user.name, 
        user.email 
      FROM 
        orders 
      LEFT JOIN 
        user ON orders.user_id = user.id 
      WHERE 
        status != 8";

if ($status !== null) {
$query .= " AND status = " . intval($status);
}

// Continue with the rest of the query
$query .= " ORDER BY 
          orders.date DESC 
      LIMIT $limit OFFSET $offset";
        $result = $conn->query($query);
        ?>

     
            <div class="card">
            <div class="d-flex justify-content-end p-3">

<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle btn-label-secondary py-2" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <span><i class="bx bx-export me-2 bx-xs"></i>Filter Status</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="exportDropdown">
        <li><a class="dropdown-item" href="<?php echo base_url('admin-doz/order') ?>">All</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url('admin-doz/order?status=1') ?>">Order Processing</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url('admin-doz/order?status=2') ?>">Ready to Export</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url('admin-doz/order?status=3') ?>">Custom</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url('admin-doz/order?status=4') ?>">Warehouse</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url('admin-doz/order?status=5') ?>">Deliver</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url('admin-doz/order?status=6') ?>">Complete</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url('admin-doz/order?status=7') ?>">Order Cancel</a></li>
    </ul>

</div>

</div>
<?php if ($result->num_rows > 0) { ?>
                <div class="card-datatable " style="overflow-x: scroll;">
                    
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer" style="min-width: 992px;">
                       
                        <table class="datatables-order table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr>
                                    <th class="sorting" tabindex="0">Order</th>
                                    <th class="sorting" tabindex="0">Date</th>
                                    <th class="sorting">Customers</th>
                                    <th class="sorting">Payment</th>
                                    <th class="sorting">Status</th>
                                    <th class="sorting_disabled">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><a href="app-ecommerce-order-details.html"><span>#<?= $data['id'] ?></span></a></td>
                                        <td class="sorting_1"><span class="text-nowrap"><?= date('F d, Y, h:i A', strtotime($data['date'])) ?></span></td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <h6 class="m-0"><?= $data['name'] ?></h6><small><?= $data['email'] ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 align-items-center d-flex w-px-100 text-warning">BDT <?= $data['amount'] ?></h6>
                                        </td>
                                        <td><span class="badge px-2 bg-label-info"><?= getOrderStatus($data['status']) ?></span></td>
                                        <td>
                                            <div class="d-flex justify-content-sm-start align-items-sm-center">
                                            <a href='<?php base_url('admin-doz/vieworder?id='.$data['id']) ?>'><button class="btn btn-icon"><i class="bx bx-edit bx-md"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-12 justify-content-center">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination justify-content-center mt-4">
                                        <li class="paginate_button page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                            <a href="?page=<?= $page - 1 ?>" class="page-link"><i class="bx bx-chevron-left bx-18px"></i></a>
                                        </li>
                                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                            <li class="paginate_button page-item <?= $page == $i ? 'active' : '' ?>">
                                                <a href="?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                                            </li>
                                        <?php } ?>
                                        <li class="paginate_button page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                                            <a href="?page=<?= $page + 1 ?>" class="page-link"><i class="bx bx-chevron-right bx-18px"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div style="width: 1%;"></div>
                    </div>
                </div>
                <?php } else {
    echo '<div class="alert alert-warning alert-dismissible fade show text-center mx-3" role="alert">
             <strong>Warning!</strong> Data not found.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
 ?>
            </div>
    



    </div>
    <!-- / Content -->




    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">

    </footer>
    <!-- / Footer -->


    <div class="content-backdrop fade"></div>
</div>
<?php
include_once('include/footer.php');

?>