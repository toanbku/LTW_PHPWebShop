<?php
    include 'config/database.php';

    //include objects
    include_once "objects/product.php";
    include_once "objects/product_image.php";
    include_once "objects/category.php";

    //get database connection
    $database = new Database();
    $db = $database->getConnection();

    $product = new Product($db);
    $product_image = new ProductImage($db);
    
    $category = new Category($db);
    
    // page header html
    include 'layout_head.php';
    include 'navigation.php';

?>


<?php
// set page title
$page_title="Products";
 
// contents will be here 
//to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

//for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; //page is current page, if there's nothing set, default is 1
$records_per_page = 6; //set records or row of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; //calculate for the query LIMIT clause


//read all products in the database
$stmt = $product->read($from_record_num, $records_per_page);

//count number of retrieved products
$num = $stmt->rowCount();

if ($action == "exists"){
	echo '<div class="alert alert-danger">';
	echo '<strong>Warning!</strong> This product has exist ...';
	echo '</div>';
}

if ($action == "added"){
	echo '<div class="alert alert-success">';
	echo '<strong>Successful!</strong> Done ...';
	echo '</div>';
}


//if products retrieved more than zero
if ($num > 0){
    //needed for paging
    $page_url = "products.php?";
    $total_rows = $product->count();
    //show products
    include_once "read_products_template.php";

}
//tell user if there's no products in the database
else {
    echo "<div class='col-md-12";
        echo "<div class='alert alert-danger'>No products found. </div>";
    echo "</div>";
    
}

 
// layout footer code
include 'layout_foot.php';
?>