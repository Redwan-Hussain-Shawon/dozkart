<?php 
define('MYSITE', true);
include_once('../vendor/autoload.php');
include_once('../include/helper.php');
include_once('../connect/conn.php'); 

header('Content-Type: application/json');

$sql = "SELECT MONTHNAME(tran_date) as month, SUM(original_amount) as total_income
        FROM orders
        GROUP BY MONTH(tran_date)
        ORDER BY MONTH(tran_date)";
$result = $conn->query($sql);

$incomeData = [];
while ($row = $result->fetch_assoc()) {
    $incomeData[] = $row;
}

echo json_encode($incomeData);
?>
