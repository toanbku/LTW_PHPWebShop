<?php
include "layout_head.php";
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: 0 auto;">
    <h2>Reset Your Account Password</h2>
    <?php echo !empty($statusMsg)?'<div class="'.$statusMsgType.'">'.$statusMsg.'</div>':''; ?>
    <div class="container">
        <div class="regisFrm">
            <form action="userAccount.php" method="post">
                <input type="password" name="password" placeholder="PASSWORD" required="">
                <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required="">
                <div class="send-button">
                    <input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
                    <input type="submit" name="resetSubmit" value="RESET PASSWORD">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "layout_foot.php";
?>

