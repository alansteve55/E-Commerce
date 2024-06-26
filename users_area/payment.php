<?php 
    include('../includes/connect.php');
    include('../Functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .img{
        width:100%;
    }
</style>
<body>
    <div class="container">
        <h2 class="text-center text-info">Payment option</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <a href="https://www.paypal.com/lk/home" target="_blank"><img src="../images/upi.png" alt=""></a>
            </div>  
        </div>
    </div>
</body>
</html>