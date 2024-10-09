<?php

require_once('../vendor/autoload.php');
require_once('../connect/base_url.php');

// Create an instance of the mPDF class
$mpdf = new \Mpdf\Mpdf();

// Ensure base_url() returns a full URL or absolute file path
$imagePath = base_url1("assets/img/dozkart.svg");

// HTML content for the invoice, with the corrected image path
$html = ' 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family:sans-serif;
            margin: 10px;
        }
        h1 {
            text-align: center;
            margin: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
          border: 1px solid rgba(230, 229, 229, 0.5); /* Adjust opacity as needed */

            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
        .logo {
            margin-bottom: 0px !important;
        }
    </style>
</head>
<body>
<div class="logo">
   <img src="' . $imagePath . '" alt="Logo" style="width:80px">
</div>
<h1>Invoice</h1>


<p><strong>Invoice Id:</strong> 12345</p>
<p><strong>Date:</strong> ' . date('Y-m-d') . '</p>

<h2>Bill To:</h2>
<p>
    John Doe<br>
    123 Main Street<br>
    City, State, Zip<br>
    Email: johndoe@example.com
</p>

<h2>Items:</h2>
<table>
    <tr>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total</th>
    </tr>
    <tr>
        <td>Web Design Services</td>
        <td>2</td>
        <td>$500.00</td>
        <td>$1000.00</td>
    </tr>
    <tr>
        <td>SEO Services</td>
        <td>1</td>
        <td>$300.00</td>
        <td>$300.00</td>
    </tr>
    <tr>
        <td>Hosting Fees</td>
        <td>1</td>
        <td>$100.00</td>
        <td>$100.00</td>
    </tr>

    <tr>
        <td colspan="3" class="total">Total</td>
        <td>$1540.00</td>
    </tr>
</table>

</body>
</html>
';
// echo $html;
// Write the HTML to the PDF
$mpdf->WriteHTML($html);

// Output the PDF to the browser for download (ensure nothing has been output previously)
$mpdf->Output();
?>
