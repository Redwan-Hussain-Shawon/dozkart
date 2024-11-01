<?php
include_once('include/header.php');

?>

<div class="content-wrapper">

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="row">
                <?php
                $sql = "SELECT COUNT(*) AS order_count FROM orders WHERE status NOT IN (6, 7, 8)";
                $result = $conn->query($sql);
                $order_count = $result->fetch_assoc()['order_count'];
                ?>
                <div class="col-lg-3 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="avatar flex-shrink-0 text-white d-flex align-items-center justify-content-center" style="background-color: #ff6f5e; border-radius: 4px;">
                                    O
                                </div>
                            </div>
                            <p class="mb-1">Order List</p>
                            <h4 class="card-title mb-0"><?php echo htmlspecialchars($order_count); ?></h4>
                        </div>
                    </div>
                </div>
                <?php
                $sql = "SELECT COUNT(*) AS visitor_count FROM visitors";
                $result = $conn->query($sql);
                $visitor_count = $result->fetch_assoc()['visitor_count'];
                ?>
                <div class="col-lg-3 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="avatar flex-shrink-0 text-white d-flex align-items-center justify-content-center" style="background-color: #5e60ff; border-radius: 4px;">
                                    O
                                </div>
                            </div>
                            <p class="mb-1">Visitor List</p>
                            <h4 class="card-title mb-0"><?php echo htmlspecialchars($visitor_count); ?></h4>
                        </div>
                    </div>
                </div>

            </div>
            <!--/ New Visitors & Activity -->

            <!-- Total Income -->
            <div class="col-12 mb-6">
                <div class="card h-100">
                    <div class="row row-bordered g-0">
                        <div class="col-12">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title mb-1">Total Income</h5>
                                    <p class="card-subtitle">Yearly Report Overview</p>
                                </div>
                            </div>
                            <div class="card-body" style="position: relative;">
                                <div id="totalIncomeChart" style="min-height: 305px;">
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 612px; height: 330px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Total Income -->
            </div>
            <!--/ Total Income -->
        </div>


    </div>

    <?php
    include_once('include/footer.php');

    ?>