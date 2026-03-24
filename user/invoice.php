<?php session_start();
include("../config/db.php"); 
$id = $_GET['id'];
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id='{$_SESSION['user_id']}'");
$user = mysqli_fetch_assoc($user_query);
$table_query = mysqli_query($conn, "SELECT * FROM active_orders WHERE id='$id'");
$activeorder = mysqli_fetch_assoc($table_query);
$pricing_query = mysqli_query($conn, "SELECT * FROM rentals WHERE id='{$activeorder['item_id']}'");
$item = mysqli_fetch_assoc($pricing_query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link rel="stylesheet" href="../assets/css/invoice.css">
</head>
<body>

<div class="invoice">

    <div class="top">
        <div class="logo_company">
          <img src="../assets/image/logo_new.png" width="40" height="40">
          <div>
              <div class="oriental-name">Orientals</div>
              <div class="oriental-tag">Simply Excellence!</div>
          </div>
        </div>

        <div class="title">
            <h1>INVOICE</h1>
            <p>DATE: <?php echo date ('m.d.Y'); ?></p>

        </div>
    </div>

    <div class="Funds-bill">
        <div class="Funds-block">
            <div class="Funds-label">Invoice To</div>
            <div class="invoice-owner"><?php echo $user['name']; ?></div>
            <div class="address">
                <?php echo $user['address']; ?><br>
                <?php echo $user['city']; ?>, <?php echo $user['postcode']; ?><br>
                <?php echo $user['phone_number']; ?>
            </div>
        </div>

        <div class="Funds-block">
            <div class="Funds-label">Ship To</div>
            <div class="invoice-owner">Delivery Address</div>
            <div class="address">
                <?php echo $user['address']; ?><br>
                <?php echo $user['city']; ?>, <?php echo $user['postcode']; ?><br>
                <?php echo $user['phone_number']; ?>
            </div>
        </div>
    </div>

    <div class="invoice-box">
        <div>DATE: <span><?php echo date ('m.d.Y'); ?></span></div>
        <div>Tracking ID: OR -<span><?php echo $activeorder['tracking_id']; ?></span></div>     
    </div>

    <table>

        <thead>
              <tr>
                
                <th class="no-of-item">Item No</th>
                <th>Item Description</th>
                <th>Days</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
        </thead>

      <tbody>

          <tr>
              <td class="no-of-item">1.</td>
              <td>
                  <div class="description_item"><?php echo $activeorder['title']; ?></div>
                  <!-- <div class="description_sub">Category</div> -->
              </td>
              <td><?php echo $activeorder['days']; ?></td>
              <td>£<?php echo $item['price']; ?></td>
              <td><?php echo $activeorder['quantity']; ?></td>
              <td>£<?php echo $activeorder['total']; ?></td>
          </tr>

      </tbody>

    </table>

    <div class="total-items-section">
        <div>
          <div class="total-item">Total</div>
          <div class="amount">£<?php echo $activeorder['total']; ?></div>
        </div>
        <div class="breakdown">
          <div class="row-total"><span>Subtotal:  </span><span>£<?php echo $activeorder['total']; ?></span></div>
          <div class="row-total"><span>Tax:  </span><span>0</span></div>
          <div class="row-total-overall"><span>Total:  </span><span>£<?php echo $activeorder['total']; ?></span></div>
        </div>
    </div>

    <div class="footer">
        <div class="block-footer">
            <div class="label-footer">Payment Info</div>
            <div class="text-footer">
                Account: Orientals<br>
                Account Details: Orientals Bank
            </div>
        </div>


        <div class="footer">
            <div class="label-footer">Terms & Conditions</div>
            <div class="text-footer">
                All Items should be returned in the same condition as rented.<br>
                Any Late returns will cost an additional $30 charges plus VAT.
            </div>
        </div>

        <div class="sign">

            <div class="label-sign">Account Manager</div>
            <div class="label-sign-name">Orientals</div>
            <div class="signature">Orientals Inc.</div>
        </div>
      </div>

      <div class="FAQ">

          <p>Do you have questions?</p>
          <span>Email us at info@orientals.com or call 222-222-222</span>
      </div>


  </div>
 
      
    <button onclick="window.print()" class="print">print Invoice</button>
    
  
</body>
</html>