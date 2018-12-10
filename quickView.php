<?php
if (isset($_POST['quick_view_id'])){
//include classes

include_once "config/database.php";
include_once "objects/product.php";
include_once "objects/product_image.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);

 
// get ID of the product to be edited
$id = isset($_POST['quick_view_id']) ? $_POST["quick_view_id"] : die("ERROR");
// $action = isset($_GET['action']) ? $_GET['action'] : "";


// // set the id as product id property
$product->id = $id;

// // to read single record product
$product->readOne();

// // set page title
$page_title = $product->name;

// set product id
$product_image->product_id=$id;
									 
// read all related product image
$stmt_product_image = $product_image->readByProductId();
 
// count all relate product image
$num_product_image = $stmt_product_image->rowCount();
                                

// list css
echo '<style>';
echo '.quick_view {';
echo 'display: -ms-flexbox;';
echo 'display: flex;';
echo '-ms-flex-wrap: wrap;';
echo 'flex-wrap: wrap;';
echo 'margin-right: -15px;';
echo 'margin-left: -15px;';
echo '}';
echo '</style>';
echo '<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">';


echo '<div class="col-md-6 col-lg-7 p-b-30">';
echo '<div class="p-l-25 p-r-30 p-lr-0-lg">';
echo '<div class="wrap-slick3 flex-sb flex-w">';
echo '<div class="wrap-slick3-dots"></div>';
echo '<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>';
echo '';
echo '<div class="slick3 gallery-lb">';

if($num_product_image > 0){
    // loop through all product images
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
    
            // image name and source url
            $product_image_name = $row['name'];
            $source="images/{$product_image_name}";
            
            echo '<div class="item-slick3" data-thumb="'.$source.'">';
            echo '<div class="wrap-pic-w pos-relative">';
            echo '<img src="'.$source.'" alt="IMG-PRODUCT">';
            echo '';
            echo '<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="'.$source.'">';
            echo '<i class="fa fa-expand"></i>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '';
            //echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
        }
   

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '';
echo '<div class="col-md-6 col-lg-5 p-b-30">';
echo '<div class="p-r-50 p-t-5 p-lr-0-lg">';
echo '<h4 class="mtext-105 cl2 js-name-detail p-b-14">';
echo $product->name;
echo '</h4>';
echo '';
echo '<span class="mtext-106 cl2">';
echo $product->price;
echo '</span>';
echo '';
echo '<p class="stext-102 cl3 p-t-23">';
echo  html_entity_decode($product->description);
echo '</p>';
echo '';


}
else{ 
    echo "No images."; 
}





// $output = '
// <div class="col-md-6 col-lg-7 p-b-30">
// <div class="p-l-25 p-r-30 p-lr-0-lg">
//     <div class="wrap-slick3 flex-sb flex-w">
//         <div class="wrap-slick3-dots"></div>
//         <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
//         <div class="slick3 gallery-lb">';

//         if($num_product_image > 0){
//             // loop through all product images
//                 while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
            
//                     // image name and source url
//                     $product_image_name = $row['name'];
//                     $source="images/{$product_image_name}";
                    
//                     $output .= '<div class="item-slick3" data-thumb="'.$source.'">';
//                     $output .= '<div class="wrap-pic-w pos-relative">';
//                     $output .= '<img src="'.$source.'" alt="IMG-PRODUCT">';
//                     $output .= '';
//                     $output .= '<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="'.$source.'">';
//                     $output .= '<i class="fa fa-expand"></i>';
//                     $output .= '</a>';
//                     $output .= '</div>';
//                     $output .= '</div>';
//                     //echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
//                 }
//             }
//             else{ 
//                 echo "No images."; 
//             }

// $output .= '
//         </div>
//     </div>
// </div>
// </div>

// <div class="col-md-6 col-lg-5 p-b-30">
// <div class="p-r-50 p-t-5 p-lr-0-lg">
//     <h4 class="mtext-105 cl2 js-name-detail p-b-14">';

//     $output .= $product->name;

// $output .= '
//     </h4>
//     <span class="mtext-106 cl2">';

//     $output .= $product->price;

// $output .= '
//     </span>

//     <p class="stext-102 cl3 p-t-23">';

//     $output .= $product->description;

// $output .='
//     </p>
    
//     <div class="p-t-33">
//         <div class="flex-w flex-r-m p-b-10">
//             <div class="size-203 flex-c-m respon6">
//                 Size
//             </div>

//             <div class="size-204 respon6-next">
//                 <div class="rs1-select2 bor8 bg0">
//                     <select class="js-select2" name="time">
//                         <option>Choose an option</option>
//                         <option>S</option>
//                         <option>M</option>
//                         <option>L</option>
//                         <option>XL</option>
//                     </select>
//                     <div class="dropDownSelect2"></div>
//                 </div>
//             </div>
//         </div>

//         <div class="flex-w flex-r-m p-b-10">
//             <div class="size-203 flex-c-m respon6">
//                 Color
//             </div>

//             <div class="size-204 respon6-next">
//                 <div class="rs1-select2 bor8 bg0">
//                     <select class="js-select2" name="time">
//                         <option>Choose an option</option>
//                         <option>Blue</option>
//                         <option>White</option>
//                         <option>Grey</option>
//                         <option>Silver</option>
//                         <option>Red</option>
//                         <option>Yellow</option>
//                     </select>
//                     <div class="dropDownSelect2"></div>
//                 </div>
//             </div>
//         </div>

//         <div class="flex-w flex-r-m p-b-10">
//             <div class="size-203 flex-c-m respon6">
//                 Color
//             </div>

//             <div class="size-204 flex-w flex-m respon6-next">
//                 <div class="wrap-num-product flex-w m-r-20 m-tb-10">
//                     <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
//                         <i class="fs-16 zmdi zmdi-minus"></i>
//                     </div>

//                     <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

//                     <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
//                         <i class="fs-16 zmdi zmdi-plus"></i>
//                     </div>
//                 </div>

//                 <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
//                     Add to cart
//                 </button>
//             </div>
//         </div>	
//     </div>

//     <div class="flex-w flex-m p-l-100 p-t-40 respon7">
//         <div class="flex-m bor9 p-r-10 m-r-11">
//             <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
//                 <i class="zmdi zmdi-favorite"></i>
//             </a>
//         </div>

//         <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
//             <i class="fa fa-facebook"></i>
//         </a>

//         <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
//             <i class="fa fa-twitter"></i>
//         </a>

//         <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
//             <i class="fa fa-google-plus"></i>
//         </a>
//     </div>
// </div>
// </div>';



// echo $output;


}
?>