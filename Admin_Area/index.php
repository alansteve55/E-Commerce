<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font awasome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
     <!-- CSS link-->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            width: 100px;
            object-fit: contain;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <!--Navbar-->
    <div class="container-fluid p-0">
        <!--First child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        
        <!--Second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!--Third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-2">
                    <a href="#"><img src="../images/logo.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_Products.php" class="nav-link text-light bg-info my-1">Insert Products
                    </a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Products
                    </a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories
                    </a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Categories
                    </a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands         
                    </a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Brands
                    </a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Orders
                    </a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Payments
                    </a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List Users
                    </a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout
                    </a></button>
                </div>
            </div>
        </div>    
    </div> 

    <!--Fourth child-->
    <div class="container my-3">
        <?php
            if(isset($_GET['insert_category'])){
                include('Insert_Categories.php');
            }
            if(isset($_GET['insert_brands'])){
                include('Insert_Brands.php');
            }
        ?>
    </div>

    <!--Last child-->
    <div class="bg-primary p-1 text-center footer">
        <p>Allrights reserved @ Designed by Alan.pvt</p>
    </div> 

    <!--bootstrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>