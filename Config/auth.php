<?php
session_start();
include("../config/db.php");

if (isset($_POST['register_button'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    $usereg_id = rand(100000, 999999);

    if ($password != $confirm_password) {
        $_SESSION['register_error'] = "Passwords do not match!";
        header("Location: ../user/register.php");
        exit();
    }

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

    if (mysqli_num_rows($checkEmail) > 0) {

        $_SESSION['register_error'] = "The Email already exists!";
        header("Location: ../user/register.php");
        exit();

    } else {

        $query = "INSERT INTO users (name, email, password, role, usereg_id)
                  VALUES ('$name','$email','$password_hashed','$role', '$usereg_id')";

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



if (isset($_POST["login_button"])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $outcome = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND role ='$role'");
    $active = mysqli_fetch_assoc($outcome);

    if (mysqli_num_rows($outcome) == 1 ) {
        // $_SESSION['password'] = $active['password'];
        if (password_verify($password, $active['password'])) {

            if ($active['status'] == 'inactive') {
                $_SESSION['error_login'] = "Account Deactivated";
                header("Location: ../login/login.php");
                exit();
            }

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

if (isset($_POST["new_staff"])) {
    
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'admin';

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

    if (mysqli_num_rows($checkEmail) > 0) {

        $_SESSION['register_error'] = "The Email already exists!";
        header("Location: ../admin/usermanagement.php");
        exit();

    } else {


        $query = "INSERT INTO users (name, email, password, role)
                    VALUES ('$name','$email','$password_hashed', '$role')";
            
        $query_table = mysqli_query($conn, $query);

        if ($query_table) {
            $_SESSION['staffcreate_success'] = "New Staff Created!";
            header("Location: ../admin/usermanagment.php");
            exit();

        } else {
            $_SESSION['staffcreate_failure'] = "Failed staff create";
            header("Location: ../admin/usermanagement.php");
            exit();
        }
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

if (isset($_POST["user_delete"])) {

    $id_item = $_POST['id_item'];
    $query = "UPDATE users SET status = 'inactive' WHERE id = '$id_item'";
    $query_table = mysqli_query($conn, $query);
    
    if ($query_table) {
        $_SESSION['delete_success'] = "item deleted";
        header("Location: ../admin/userstats.php");
        exit();

    } else {
        $_SESSION['deleteitem_failure'] = "deletingfailed";
        header("Location: ../admin/userstats.php");
        exit();
    }



}

if (isset($_POST["user_return"])) {

    $id_item = $_POST['id_item'];
    $query = "UPDATE users SET status = 'active' WHERE id = '$id_item'";
    $query_table = mysqli_query($conn, $query);
    
    if ($query_table) {
        $_SESSION['active_success'] = "user activated";
        header("Location: ../admin/userstats.php");
        exit();

    } else {
        $_SESSION['activation_failure'] = "activatingfailed";
        header("Location: ../admin/userstats.php");
        exit();
    }



}

if (isset($_POST["item_return"])) {
   
    $id_item = $_POST['id_item'];
    $user_id = $_SESSION['user_id'];
    $order = mysqli_query($conn, "SELECT * FROM active_orders WHERE id = '$id_item'");
    $order_item = mysqli_fetch_assoc($order);
    $item_id = $order_item['item_id'];
    $quantity = $order_item['quantity'];
    $query = "UPDATE active_orders SET status = 'returned', date_returned=NOW() WHERE id = '$id_item'";
    $query_table = mysqli_query($conn, $query);
    $qty_return = mysqli_query($conn, "UPDATE rentals SET item_qty = item_qty + $quantity WHERE id = '$item_id'");
    
    if ($query_table) {

        $notif = "Thank You! You returned item!";
        mysqli_query($conn, "INSERT INTO notifications (user_id, message) VALUES ('$user_id', '$notif') ");

        $admin_notification =  mysqli_query($conn, "SELECT id FROM users WHERE role='admin'");
        while($admin = mysqli_fetch_assoc($admin_notification)) {
            
            $notif_admin = mysqli_real_escape_string($conn,"User placed an Order! Check it out");
             mysqli_query($conn, "INSERT INTO notifications (user_id, message) VALUES ('{$admin['id']}', '$notif_admin') ");

        }

        $_SESSION['return_success'] = "You have successfully returned your item!";
        header("Location:../user/rentals.php");
        exit();

    } else {
        $_SESSION['deleteitem_failure'] = "deletingfailed";
        header("Location: ../user/rentals.php");
        exit();
    }



}

if (isset($_POST["order_cancel"])) {
   
    $id_item = $_POST['id_item'];
    $user_id = $_SESSION['user_id'];
    $order = mysqli_query($conn, "SELECT * FROM active_orders WHERE id = '$id_item'");
    $order_item = mysqli_fetch_assoc($order);
    $item_id = $order_item['item_id'];
    $quantity = $order_item['quantity'];
    $query = "UPDATE active_orders SET status = 'cancelled', date_returned=NOW() WHERE id = '$id_item'";
    $query_table = mysqli_query($conn, $query);
    $qty_return = mysqli_query($conn, "UPDATE rentals SET item_qty = item_qty + $quantity WHERE id = '$item_id'");
    
    if ($query_table) {

        $notif = "Your order has been cancelled";
        mysqli_query($conn, "INSERT INTO notifications (user_id, message) VALUES ('$user_id', '$notif') ");

        $admin_notification =  mysqli_query($conn, "SELECT id FROM users WHERE role='admin'");
        while($admin = mysqli_fetch_assoc($admin_notification)) {
            
            $notif_admin = mysqli_real_escape_string($conn,"User placed an Order! Check it out");
             mysqli_query($conn, "INSERT INTO notifications (user_id, message) VALUES ('{$admin['id']}', '$notif_admin') ");

        }

        $_SESSION['cancelled_success'] = "Your order has been cancelled";
        header("Location:../user/rentals.php");
        exit();

    } else {
        $_SESSION['cancelled_failure'] = "cancellation failed";
        header("Location: ../user/rentals.php");
        exit();
    }



}

if (isset($_POST["order_placed"])) {

    // var_dump($_POST);
    // exit(); 
    $user_id = $_POST['user_id'];
    // $limit_order_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE user_id='$user_id' AND status='active'");$limit_order_count = mysqli_fetch_row($limit_order_query);

    // if ($limit_order_count[0] >= 2) {

    // $_SESSION['order_limit_error'] = "You have reached your renting budget. Kindly return one or more items to continue";
    // header("Location: ../user/dashboardu.php");
    // exit();
    // }


    $item_id = $_POST['item_id'];
    
    $quantity = $_POST['qty'];
    $days = $_POST['days'];

    $outcome = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$item_id'");
    $active = mysqli_fetch_assoc($outcome);
    if ($active['item_qty'] <= 0) {
        $_SESSION['error availability'] = "This item is out of stock. Check again later";
         header("Location: ../user/dashboardu.php");
        exit();

    }
    $price= $active['price'];
    $total = $quantity * $days * $price;
    $due_on = date('Y-m-d', strtotime("+$days days"));
    $tracking_id = rand(100000, 999999);

    // $title_outcome = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$item_id'");
    // $active_title = mysqli_fetch_assoc($title_outcome);



    $title = $active['title'];

    // $stock_qty = $active['item_qty'];

    if ($quantity > 2) { 
        $_SESSION['limit_order'] = "Only 2 orders maximum is allowed. Return an item";
        header("Location: ../user/order.php?id=$item_id");
        exit();

        


    }

    
    $query = "INSERT INTO active_orders (user_id, item_id, days, quantity, total, title, status, due_on, tracking_id)
                VALUES ('$user_id','$item_id','$days', '$quantity', $total, '$title','active', '$due_on', '$tracking_id')";
    
            $qty_update = mysqli_query($conn, "UPDATE rentals SET item_qty = item_qty - $quantity WHERE id = '$item_id'");
            $query_table = mysqli_query($conn, $query);
            $_SESSION['current_order_id'] = mysqli_insert_id($conn);
    
    if ($query_table) {

        $notif = "Great News! Order is placed succesfully";
        mysqli_query($conn, "INSERT INTO notifications (user_id, message) VALUES ('$user_id', '$notif') ");

        $admin_notification =  mysqli_query($conn, "SELECT id FROM users WHERE role='admin'");
        while($admin = mysqli_fetch_assoc($admin_notification)) {
            
            $notif_admin = mysqli_real_escape_string($conn,"User placed an Order! Check it out");
             mysqli_query($conn, "INSERT INTO notifications (user_id, message) VALUES ('{$admin['id']}', '$notif_admin') ");

        }
        
        $_SESSION['order_success'] = "Good News! You placed an order";
        header("Location: ../user/successful.php");

        exit();

       
           

    } else {
        $_SESSION['item_failure'] = "order_failed";
        header("Location: ../user/order.php");
        exit();
    }


}

if (isset($_POST["rent_item"])) {

    // var_dump($_POST);
    // exit();

    $user_id = $_SESSION['user_id'];
    $item_id = $_POST['item_id'];
    $limit_order_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE user_id='$user_id' AND status='active'");$limit_order_count = mysqli_fetch_row($limit_order_query);



    if ($limit_order_count[0] >= 2) {

    $_SESSION['order_limit_error'] = "You have reached your renting budget. Kindly return one or more items to continue";
    header("Location: ../user/dashboardu.php");
    exit();
    }

    $outcome = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$item_id'");
    $active = mysqli_fetch_assoc($outcome);
    if ((int)$active['item_qty'] <= 0) {
    $_SESSION['error_availability'] = "This item is out of stock. Check again later";
        header("Location: ../user/dashboardu.php");
    exit();

    }

 header("Location: ../user/Order.php?id=$item_id");
    exit();

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

if (isset($_POST["profile_update"])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];


    $query = "UPDATE users SET name='$name', email='$email', phone_number='$phone', address='$address', city='$city', postcode='$postcode' WHERE id = '{$_SESSION['user_id']}'";
    $query_table = mysqli_query($conn, $query);
    
    if ($query_table) {
        $_SESSION['edit_success'] = "Updated";
        header("Location: ../user/profile.php");
        exit();

    } else {
        $_SESSION['updating_failure'] = "updatingfailed";
        header("Location: ../usser/profile.php");
        exit();
    }



}

if (isset($_POST["status_update"])) {

    // var_dump($_POST);
    // exit();
    
    $order_id = $_POST['order_id'];
    $delivery_status = $_POST['delivery_status'];

    $query_table = mysqli_query($conn, "UPDATE active_orders SET delivery_status= '$delivery_status' WHERE id = '$order_id'");
    header("Location: ../admin/activerentals.php");
    exit();
    // echo mysqli_error($conn);
    // exit();
    
 

}

if (isset($_POST["approval_update"])) {

    
    
    $order_id = $_POST['order_id'];
    $approval_status = $_POST['approval_status'];

    $query_table = mysqli_query($conn, "UPDATE active_orders SET approval_status= '$approval_status' WHERE id = '$order_id'");
    header("Location: ../admin/return.php");
    exit();

    
 

}

if (isset($_GET['logout'])) {

    session_destroy();
    header("Location: ../login/login.php");
    exit();
}


if (isset($_POST['cart_order'])) {

    $user_id = $_SESSION['user_id'];
    $selected_items = $_POST['selected_items'];

    if(empty($selected_items)) {
        header("Location: ../user/cart.php");
        exit();
    }

    foreach ($selected_items as $cart_id){

        $cart_new_query = mysqli_query($conn, "SELECT * FROM cart WHERE id='$cart_id'");
        $cart_new_item = mysqli_fetch_assoc($cart_new_query);


        $item_id = $cart_new_item['item_id'];
        $rent_new_query = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$item_id'");
        $rent_new_item = mysqli_fetch_assoc($rent_new_query);
        $price =  $rent_new_item['price'];

        $tracking_id = rand(100000, 999999);

        $days = 1;
        $quantity = 1;
        $title=  $cart_new_item['item_name'];
        $total = $quantity * $days * $price;
        $due_on = date('Y-m-d', strtotime("+$days days"));

        $query = "INSERT INTO active_orders (user_id, item_id, days, quantity, total, title, status, due_on, tracking_id)
                VALUES ('$user_id','$item_id','$quantity','$days', $total, '$title','active', '$due_on', '$tracking_id')";

        $query_table = mysqli_query($conn, $query);
        $rent_new_query = mysqli_query($conn, "UPDATE rentals SET item_qty =item_qty - $quantity WHERE id='$item_id'");
        $delete_item_query = mysqli_query($conn, "DELETE FROM cart WHERE id='$cart_id'");




    }
    header("Location: ../user/successful.php");
    exit();
}

if (isset($_POST["order_extend"])) {

    // var_dump($_POST);
    // exit(); 
    
    $order_id = $_POST['order_id'];
    $user_id = $_SESSION['user_id'];
    $more_days = $_POST['more_days'];
    $extra = $_POST['extra'];

    
    

    $order_query = mysqli_query($conn, "SELECT * FROM active_orders WHERE id='$order_id'");
    $new_order = mysqli_fetch_assoc($order_query);

    $due_on_new = date('Y-m-d', strtotime($new_order['due_on'] . " +$more_days days"));


    
    $query = "UPDATE active_orders SET days = + '$more_days', total = total + '$extra', due_on = '$due_on_new' WHERE id = '$order_id'";
    $query_table = mysqli_query($conn, $query);
                
    
    
    if ($query_table) {

        $notif = "Order has been succesfully extended";
        mysqli_query($conn, "INSERT INTO notifications (user_id, message) VALUES ('$user_id', '$notif') ");
        
        $_SESSION['order_extend'] = "You've extended your order";
        header("Location: ../user/rentals.php");
        exit();

    } else {
        $_SESSION['extension_failure'] = "order extension failed";
        header("Location: ../user/extenddelivery.php");
        exit();
    }


}

if (isset($_POST['cart_delete_order'])) {
    $cart_id = $_POST['cart_id'];
    mysqli_query($conn, "DELETE FROM cart WHERE id='$cart_id'");
    header("Location: ../user/cart.php");
    exit();



}

if (isset($_POST["ticket_submit"])) {

    $reason = $_POST['reason'];
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "../assets/image/" . $image);
    $ticket_ref = rand(100000, 999999);

    $query = "INSERT INTO tickets (reason, user_id, message, image, ticket_ref)
            VALUES ('$reason','$user_id','$message', '$image', '$ticket_ref')";

    $query_table = mysqli_query($conn, $query);


    
    if ($query_table) {

        $_SESSION['ticket_success'] = "You've submitted a ticket";
        header("Location: ../user/tickets.php");
        exit();

    } else {
        $_SESSION['ticket_failure'] = "Ticket submission has failed";
        header("Location: ../user/tickets.php");
        exit();
    }


}

if (isset($_POST['ticket_close'])) {

    $id_ticket = $_POST['id_ticket'];
    mysqli_query($conn, "UPDATE tickets SET status='closed' WHERE id='$id_ticket'");
    header("Location: ../admin/adminticket.php");
    exit();

}

if (isset($_POST['ticket_open'])) {

    $id_ticket = $_POST['id_ticket'];
    mysqli_query($conn, "UPDATE tickets SET status='open' WHERE id='$id_ticket'");
    header("Location: ../admin/adminticket.php");
    exit();

}
?>






