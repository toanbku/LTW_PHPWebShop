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
<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: 100px auto;">
    <h2 class="cl5 txt-center">
        Enter the email of your account
	</h2>

    <?php
        echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; 
    ?>

    <div class="container">
        <div class="regisFrm">
            <form action="userAccount.php" method="POST">
                <div class="bor8 m-b-20 how-pos4-parent">
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Type email here...">
                </div>
                <input type="submit" name="forgotSubmit" value="CONTINUE" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">

            </form>
        </div>
    </div>

</div>

<?php
include "layout_foot.php";
?>