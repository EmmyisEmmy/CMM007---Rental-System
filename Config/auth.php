<?php
session_start();
include("../config/db.php");

if (isset($_POST['register_button'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    if ($password != $confirm_password) {
        $_SESSION['register_error'] = "Passwords do not match!";
        header("Location: ../user/register.php");
        exit();
    }

    $checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

    if (mysqli_num_rows($checkEmail) > 0) {

        $_SESSION['register_error'] = "The Email already exists!";
        header("Location: ../user/register.php");
        exit();

    } else {

        $query = "INSERT INTO users (name, email, password, role)
                  VALUES ('$name','$email','$password','$role')";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['register_success'] = "Registration successful!";
            header("Location: ../login/login.php");
            exit();
        } else {
            $_SESSION['register_error'] = "Registration failed!";
            header("Location: ../user/register.php");
            exit();
        }


    }
}




if (isset($_POST['register_button'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
}

// As an admin, I want to upload items for users to see what is available


if (isset($_POST['register_button'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
}

if (isset($_POST["login_button"])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $outcome = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND role ='$role'");
    $active = mysqli_fetch_assoc($outcome);

    if (mysqli_num_rows($outcome) == 1 ) {
        // $_SESSION['password'] = $active['password'];
        if ($password == $active['password']) {
            $_SESSION['valid_details'] = "Login Successful";
            $_SESSION['user_id'] = $active['id'];
            $_SESSION['user_name'] = $active['name'];
            $_SESSION['user_role'] = $active['role'];

            if ($active['role'] == 'user') {
                $_SESSION['success_login'] = "Log in Successful";
                header("Location: ../user/dashboardu.php");
                exit();
            } else {
            
                header("Location: ../admin/dashboard.php");
                exit();

            }

        } else {
            $_SESSION['wrong_pass'] = "Wrong password";        
            header("Location: ../login/login.php");
            exit();
        }


    } else {

        $_SESSION['error_login'] = "Invalid email or role";
        header("Location: ../login/login.php");
        exit();
    }

 }


 if (isset($_POST["cart_add"])) {
    
   
    $user_id = $_SESSION['user_id'];
    $item_id = $_POST['item_id'];

    $outcome = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$item_id'");
    $item = mysqli_fetch_assoc($outcome);
    $price= $item['price'];
    $image= $item['image'];
    $title = $item['title'];

    $query = "INSERT INTO cart (user_id, item_id, price, image, item_name)
                VALUES ('$user_id','$item_id','$price', '$image', '$title')";
          
    $query_table = mysqli_query($conn, $query);

    if ($query_table) {
        $_SESSION['cart_success'] = "Item added to cart!";
        header("Location: ../user/cart.php");
        exit();

    } else {
        $_SESSION['post_failure'] = "Publishing failed";
        header("Location: ../user/cart.php");
        exit();
    }
 }



if (isset($_POST["item_publish"])) {

    $title = $_POST['title'];
    $item_condition = $_POST['item_condition'];
    $item_qty = $_POST['item_qty'];
    $created_at = $_POST['created_at'];
    $description = $_POST['description'];
    $specification = $_POST['specification'];
    $category= $_POST['category'];
    $price= $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "../assets/image/" . $image);

    $query = "INSERT INTO rentals (title, description, specification, category, price, image, item_condition, item_qty, created_at)
            VALUES ('$title','$description','$specification','$category', '$price', '$image', '$item_condition', '$item_qty','$created_at')";

    $run_query = mysqli_query($conn, $query);

    if ($run_query) {
        $_SESSION['post_success'] = "Successfully Published!";
        header("Location: ../admin/ud.php");
        exit();

    } else {
        $_SESSION['post_failure'] = "Publishing failed";
        header("Location: ../admin/post.php");
        exit();
    }
}

if (isset($_POST["item_delete"])) {

    $id_item = $_POST['id_item'];
    $query = "UPDATE rentals SET status = 'deleted' WHERE id = '$id_item'";
    $query_table = mysqli_query($conn, $query);
    
    if ($run_query) {
        $_SESSION['delete_success'] = "item deleted";
        header("Location: ../admin/ud.php");
        exit();

    } else {
        $_SESSION['deleteitem_failure'] = "deletingfailed";
        header("Location: ../admin/ud.php");
        exit();
    }



}

if (isset($_POST["item_return"])) {
   
    $id_item = $_POST['id_item'];
    $order = mysqli_query($conn, "SELECT * FROM active_orders WHERE id = '$id_item'");
    $order_item = mysqli_fetch_assoc($order);
    $item_id = $order_item['item_id'];
    $quantity = $order_item['quantity'];
    $query = "UPDATE active_orders SET status = 'returned' WHERE id = '$id_item'";
    $query_table = mysqli_query($conn, $query);
    $qty_return = mysqli_query($conn, "UPDATE rentals SET item_qty = item_qty + $quantity WHERE id = '$item_id'");
    
    if ($query_table) {
        $_SESSION['return_success'] = "item successfully returned";
        header("Location:../user/rentals.php");
        exit();

    } else {
        $_SESSION['deleteitem_failure'] = "deletingfailed";
        header("Location: ../user/rentals.php");
        exit();
    }



}

if (isset($_POST["order_placed"])) {

    // var_dump($_POST);
    // exit(); 

    $item_id = $_POST['item_id'];
    $user_id = $_POST['user_id'];
    $quantity = $_POST['qty'];
    $days = $_POST['days'];

    $outcome = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$item_id'");
    $active = mysqli_fetch_assoc($outcome);
    $price= $active['price'];
    $total = $quantity * $days * $price;
    $due_on = date('Y-m-d', strtotime("+$days days"));

    // $title_outcome = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$item_id'");
    // $active_title = mysqli_fetch_assoc($title_outcome);
    $title = $active['title'];

    $stock_qty = $active['item_qty'];

    if ($stock_qty<= 20) {
        $max_qty = 1;

    } elseif ($stock_qty <= 40) {
        $max_qty = 2;

    } else {
        $max_qty = 3;

    }

    
    $query = "INSERT INTO active_orders (user_id, item_id, days, quantity, total, title, status, due_on)
                VALUES ('$user_id','$item_id','$quantity','$days', $total, '$title','active', '$due_on')";
            $qty_update = mysqli_query($conn, "UPDATE rentals SET item_qty = item_qty - $quantity WHERE id = '$item_id'");
    $query_table = mysqli_query($conn, $query);
    
    if ($query_table) {
        
        $_SESSION['order_success'] = "Good News! You placed an order";
        header("Location: ../user/successful.php");
        exit();

    } else {
        $_SESSION['item_failure'] = "order_failed";
        header("Location: ../user/order.php");
        exit();
    }


}

if (isset($_POST["item_add"])) {

    $id_item = $_POST['id_item'];
    $query = "UPDATE rentals SET status = 'available' WHERE id = '$id_item'";
    $query_table = mysqli_query($conn, $query);
    
    if ($query_table) {
        $_SESSION['add_success'] = "item added";
        header("Location: ../admin/ud.php");
        exit();

    } else {
        $_SESSION['deleteitem_failure'] = "deletingfailed";
        header("Location: ../admin/ud.php");
        exit();
    }



}

if (isset($_POST["item_update"])) {
    
    $title = $_POST['title'];
    $item_condition = $_POST['item_condition'];
    $item_qty = $_POST['item_qty'];
    $description = $_POST['description'];
    $specification = $_POST['specification'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    $id_item = $_POST['id_item'];
    $query = "UPDATE rentals SET title= '$title', item_condition='$item_condition', item_qty='$item_qty', description='$description', specification='$specification', category='$category', price='$price', image='$image' WHERE id = '$id_item'";
    $query_table = mysqli_query($conn, $query);
    
    if ($query_table) {
        $_SESSION['edit_success'] = "Updated";
        header("Location: ../admin/ud.php");
        exit();

    } else {
        $_SESSION['updating_failure'] = "updatingfailed";
        header("Location: ../admin/ud.php");
        exit();
    }



}

if (isset($_GET['logout'])) {

    session_destroy();
    header("Location: ../login/login.php");
    exit();
}

?>






