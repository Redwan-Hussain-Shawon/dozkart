<?php
define('MYSITE', true);
include_once('../vendor/autoload.php');
include_once('../connect/base_url.php');
include_once('../connect/conn.php');
include_once('../include/helper.php');
protected_area();
// Import Dompdf namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_GET['id']) && !empty($_GET['id'])) {

  $options = new Options();
  $options->set('isRemoteEnabled', true);

  // Create an instance of Dompdf
  $dompdf = new Dompdf($options);

  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $user_id = getId();

  $sql = "SELECT 
         o.address_id,
         o.product_slug,
         o.product_color_id,
         o.product_qunty,
         o.date,
         o.amount,
         o.original_amount,
         o.tran_id,
         o.bank_tran_id,
         a.name,
         a.country,
         a.district,
         a.thana_upazilla,
         a.address,
         a.phone,
         p.product_title,
         pc.color_name
         FROM orders o
        JOIN 
         address a ON o.address_id=a.id 
        JOIN
         products p ON o.product_slug=p.product_slug
        LEFT JOIN product_color pc ON o.product_color_id = pc.color_id
        WHERE o.id=$id AND o.user_id=$user_id";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    $color_name = empty($data['color_name']) ? '-' : $data['color_name'];
    $imagePath = base_url1("assets/img/dozkart.svg");

    // $sql = ""
    $html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link rel="icon" href="'. base_url1('assets/img/dozkart.png').'">
  <link href="' . base_url1('assets/css/fixt.css') . '" rel="stylesheet">
  <style>
    body, html {
      font-family: sans-serif;
      font-size: 15px;
      color: #333;
      margin: 0px !important;
    }
    .container {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
      padding: 50px;
    }
    .invoice-header-table {
      width: 100%;
      margin-bottom: 20px;
    }
    .invoice-header-table td {
      vertical-align: top;
      padding: 5px;
    }
    .company-details img {
      width: 90px;
      margin-bottom:10px
    }
      p{
    margin-bottom:5px;
    font-size:14px
      }
         .invoice-header-table {
                    width: 100%;
                    margin-bottom: 20px;
                }
                .invoice-header-table img {
                    max-width: 150px;
                }
                .product-table, .total-section {
                    width: 100%;
                    margin-top: 20px;
                    border-collapse: collapse;
                }
                .product-table th, .product-table td, .total-section td {
                    border: 1px solid #ccc;
                    padding: 10px;
                    text-align: left;
                }
  </style>
</head>
<body>

  <div class="container">

    <!-- Header -->
    <table class="invoice-header-table">
      <tr>
        <td  class="company-details">
          <img src="' . $imagePath . '" alt="Logo">
          <p>Dozkart</p>
          <p>Address, City, Country</p>
          <p>Email: info@company.com</p>
        </td>
        <td class="invoice-details text-end">
          <h2>Invoice</h2>
          <p><b>Invoice ID:</b> ' . $data['bank_tran_id'] . '</p>
          <p><b>Date:</b> ' . date('F j, Y', strtotime($data['date'])) . '</p>
        </td>
      </tr>
    </table>

    <!-- Billing Information -->
    <h5 class="text-decoration-underline">Billing Address</h5>
  <p> <b>Name:</b> ' . $data['name'] . '</p>
    <p><b>Phone:</b> ' . $data['phone'] . '</p>
  <p><b>Country:</b> ' . $data['country'] . '</p>
  <p><b>District:</b> ' . $data['district'] . '</p>
  <p><b>Thana/Upazilla</b>: ' . $data['thana_upazilla'] . '</p>
  <p><b>Address:</b> ' . $data['address'] . '</p>


    <!-- Product Table -->
    <table class="product-table">
      <thead>
        <tr>
          <th >Title</th>
          <th class="text-center">Qty</th>
          <th>Color Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width:60%">' . $data['product_title'] . '</td>
          <td class="text-center">' . $data['product_qunty'] . '</td>
         <td class="text-center">' . $color_name . '</td>

        </tr>
      </tbody>
    </table>

    <!-- Total Section -->
   <table class="total-section">
                    <tr>
    <td class="label">Subtotal:</td>
    <td class="amount">BDT ' . $data['original_amount'] . '</td>
</tr>
<tr>
    <td class="label">Advance Payment:</td>
    <td class="amount">BDT ' . $data['amount'] . '</td>
</tr>
<tr>
    <td class="label">Cash On Payment:</td>
    <td class="amount"><strong>BDT ' . number_format($data['original_amount'] - $data['amount'], 2) . '</strong></td>
</tr>

                </table>
    <div class="mt-5">
    <p>Thank you for purchasing our product! We truly appreciate your support. If you have any questions or need assistance, please dont hesitate to reach out to us at company@example.com.</p>
    <p>The Dozkart Team</p>
  </div>

  </div>

</body>
</html>
';

    // Load the HTML content
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the PDF
    $dompdf->render();

    // Output the PDF
    $dompdf->stream('dozkart_invoice.pdf', ['Attachment' => 0]); // Set Attachment to 1 for download
  } else {
    header('Location:' . base_url1('404'));
  }
}
