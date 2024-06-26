<?php
include('../includes/connect.php');
if(isset($_POST['Insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //Accessing the images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //Accessing image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //Checking empty fields
    if($product_title=='' or $product_description=='' or $product_keywords=='' or
    $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1==''
    or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill required fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./Product_images/$product_image1");
        move_uploaded_file($temp_image2,"./Product_images/$product_image2");
        move_uploaded_file($temp_image3,"./Product_images/$product_image3");
    }

    // insert query
    $insert_products="insert into `products` (product_title, product_descrption, product_keyword, category_id, brand_id
    , product_image1, product_image2, product_image3, product_price, date, status) 
    values ('$product_title', '$product_description', '$product_keywords', '$product_category',
    '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
        echo "<script>alert('Sucessfully inserted the new Product')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
     <!--Bootstrap link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font awasome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
     <!-- CSS link-->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" 
                placeholder="Enter Product Title" autocomplete="off" required="required"> 
            </div>
             <!--description-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" 
                placeholder="Enter Product Description" autocomplete="off" required="required"> 
            </div>
             <!--Product Keywords-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" 
                placeholder="Enter Product Keywords" autocomplete="off" required="required"> 
            </div>
             <!--Categories-->
             <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select the Category</option>
                    <?php
                      $select_category="Select * from categories";
                      $result_category=mysqli_query($con,$select_category);
                      while($row=mysqli_fetch_assoc($result_category)){
                        $category_title=$row['Category_title'];
                        $category_id=$row['Category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
              <!--Brandss-->
              <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select the Brand</option>
                    <?php
                      $select_brand="Select * from brands";
                      $result_brand=mysqli_query($con,$select_brand);
                      while($row=mysqli_fetch_assoc($result_brand)){
                        $brand_title=$row['Brands_title'];
                        $brand_id=$row['Brands_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!--Image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" 
                autocomplete="off" required="required"> 
            </div>
            <!--Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" 
                autocomplete="off" required="required"> 
            </div>
            <!--Image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" 
                autocomplete="off" required="required"> 
            </div>
             <!--Price-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" 
                placeholder="Enter Product Price" autocomplete="off" required="required"> 
            </div>
              <!--Button-->
              <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="Insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
</body>
</html>