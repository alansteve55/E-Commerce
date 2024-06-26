<?php
    include('includes/connect.php');
    include('Functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Ecommerce website</title>
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font awasome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS link-->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_image{
            width: 80px;
            height: 80px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <!--nav bar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <img src="./images/logo.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <sup>
                                    <?php
                                    cart_item(); 
                                    ?>
                                </sup>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--calling cart function-->
        <?php 
            cart();
        ?>
        <!--Second child-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>  
                <?php  
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='.user_login.php'>Login</a>
                        </li>";
                    }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='.user_logout.php'>Logout</a>
                    </li>";
                    }
                ?>
            </ul>
        </nav>

        <!--Third child-->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>  
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!--fourth child-->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                    <tbody>
                        <!--php code for dynamic data-->
                        <?php
                            $ip = getIPAddress(); 
                            $total=0;
                            $cart_query="Select * from `cart_deatils` where ip_address='$ip'";
                            $result=mysqli_query($con,$cart_query);
                            $result_count=mysqli_num_rows($result);
                            if($result_count>0){
                                echo "<thead>
                                <tr>
                                    <th>Product title</th>
                                    <th>Product image</th>
                                    <th>Quantity</th>
                                    <th>Total price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                            </thead>";
                            while($row=mysqli_fetch_array($result)){
                                $product_id=$row['product_id'];
                                $select_products="Select * from `products` where product_id='$product_id'";
                                $result_products=mysqli_query($con,$select_products);
                                while($row_product_price=mysqli_fetch_array($result_products)){
                                    $product_price=array($row_product_price['product_price']);
                                    $price_table=$row_product_price['product_price'];
                                    $product_title=$row_product_price['product_title'];
                                    $product_image1=$row_product_price['product_image1'];
                                    $product_values=array_sum($product_price);
                                    $total+=$product_values;
                                 
                        ?>
                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img src="./Admin_Area/Product_images/<?php echo $product_image1 ?>" alt="" class="cart_image"></td>
                            <td><input type="text" name="quantity" class="form-input w-50"></td>
                            <?php 
                            $ip = getIPAddress(); 
                            if(isset($_POST['update_cart'])){
                                $quantities=$_POST['quantity'];
                                $update_cart="update `cart_deatils` set quantity=$quantities where ip_address='$ip'";
                                $result_products_quantity=mysqli_query($con,$update_cart);
                                $total=$total*$quantities;
                            }
                            ?>
                            <td><?php echo $price_table ?></td>
                            <td><input type="checkbox" name="removeitem[]" 
                                value="<?php
                                    echo $product_id;
                                ?>">
                            </td>
                            <td>
                                <input type="submit" value="Update cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                                <input type="submit" value="Remove cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                            </td>
                        </tr>
                        <?php
                                }
                            } 
                        }else{
                            echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                        }
                        ?>
                    </tbody>
                </table>

                <!--subtotal-->
                <div class="d-flex mb-5">
                    <?php 
                        $ip = getIPAddress(); 
                        $cart_query="Select * from `cart_deatils` where ip_address='$ip'";
                        $result=mysqli_query($con,$cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                            echo "<h4 class='px-3'>Subtotal : <strong class='text-info'>$total.00</strong></h4>
                            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='Continue_shopping'>
                            <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                        }else{
                            echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='Continue_shopping'>";
                        }
                    if(isset($_POST['Continue_shopping'])){
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    ?>
                    
                </div>
            </div>
        </div>
        </form>

        <!--function to remove item from cart-->
        <?php 
            function removedata(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id){
                        echo $remove_id;
                        $delete_query="Delete from `cart_deatils` where product_id=$remove_id";
                        $run_delete=mysqli_query($con,$delete_query);
                        if($run_delete){
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo $remove_item=removedata();
        ?>

        <!--Last child-->
        <div class="bg-primary p-1 text-center mt-2">
            <p>Allrights reserved @ Designed by Alan.pvt</p>
        </div>   
    </div>

    <!--bootstrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>