<?php
    include "layout_head.php";
    include 'config/database.php';
    include_once "objects/user.php";
    include_once "objects/order.php";
    if (!isset($_SESSION["userName"])){
        echo "<script>alert('Please login before using this feature'); window.location = 'login.php'</script>";
    }
    
    $database = new Database();
    $db = $database->getConnection();

    include_once "navigation.php";


    $orderInfo = new Order($db);

    $count = $orderInfo->count($_SESSION["id"]);
    $stmt = $orderInfo->getInfo($_SESSION["id"]);
?>


<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        History
    </h2>
</section>
	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
                        <?php
                                if ($count == 0){
                                    echo "<div class='col-md-12'>";
                                    echo "<div class='alert alert-danger'>No products are bought.</div>";
                                    echo "</div>";
                                    echo '<table class="table">';
                                    echo "</table>";
                                }
                                else {
                        ?>
                        <table class="table">
                            <thead style="background-color:#b2b2b2;color:#fff;">
                            <tr>
                                <th>#</th>
                                <th>Transaction Id</th>
                                <th>User Id</th>
                                <th>Total cost</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            echo '<tr>';
                            echo '<th scope="row">'.$i.'</th>';
                            echo '<td>'.$transaction_id.'</td>';
                            echo '<td>'.$user_id.'</td>';
                            echo '<td>'.$total_cost.'</td>';
                            echo '<td>'.$status.'</td>';
                            echo '<td>'.$created.'</td>';
                            echo '</tr>';
                            $i ++;
                            }
                            ?>
                            </tbody>
                        </table>
     
                        <?php
                                }
                        ?>
			</div>
		</div>
	</section>	

<?php
                                
    include "layout_foot.php";
?>