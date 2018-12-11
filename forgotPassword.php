<?php

include "layout_head.php";

if (isset($_SESSION['id'])){
    echo "<script>alert('You are already logged in'); window.location = 'index.php'</script>";
}
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

?>
<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: 0 auto;">
    <h2>Enter the Email of Your Account to Reset New Password</h2>
    <?php 
        echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; 
    ?>

    <div class="container">
        <div class="regisFrm">
            <form action="userAccount.php" method="post">
                <input type="email" name="email" placeholder="EMAIL" required="">
                <div class="send-button">
                    <input type="submit" name="forgotSubmit" value="CONTINUE">
                </div>
            </form>
        </div>
    </div>

</div>

<?php
include "layout_foot.php";
?>