<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Cart</title>
</head>
<body>

  <?php include("navbaru.php"); ?> 

    <h1>My Cart</h1>

    <div class="content">



        <div class="contents-place">
          <p class="admin-title">All Posted Items</p>

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Price</th>
                  <th>QTY</th>
                  <th>Total</th>

                </tr>
              </thead>
              <tbody>
                
                  <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                      <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                      Nothing to see here.
                    </td>
                  </tr>
                </tbody>
              </tbody>
            </table>
          </div>

        </div>

      </div>



</body>
</html>