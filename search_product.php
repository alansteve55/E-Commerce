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
                        <li class="nav-item">
                             <a class="nav-link" href="#">Total price :<?php total_price();?></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!--Second child-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto"> 
                <?php  
                      if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                    }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                    </li>";
                    }

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

        <!--Fourth child-->
        <div class="row px-1">
             <!--Products-->
            <div class="col-md-10">
                <div class="row">
                    <!--fetching product-->
                    <?php
                        search_product();
                        getuniquecate();
                        getuniquebrand();
                    ?>
                </div>
            </div>

             <!--Sidenav-->
            <div class="col-md-2 bg-secondary p-0 ">
                 <!--Brands to be display-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-primary">
                        <a href="#" class="nav-link"><h5>Delivery Brands</h5></a>
                    </li>
                    
                    <!-- Calling query brands-->
                    <?php
                        getbrand();
                    ?>
                </ul>

                <!--Categories to be display-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-primary">
                        <a href="#" class="nav-link"><h5>Products Catogories</h5></a>
                    </li>

                    <!-- Calling query categories-->
                    <?php
                        getcat();
                    ?>
                </ul>
            </div>
        </div>

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