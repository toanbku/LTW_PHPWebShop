<?php
    include 'config/database.php';
    include_once "objects/user.php";

    include "layout_head.php";

    if (!isset($_SESSION["userName"])){
        echo "<script>alert('Please login before using this feature'); window.location = 'login.php'</script>";
    }
    

    $database = new Database();
    $db = $database->getConnection();

    include_once "navigation.php";

    $userInfo = new User($db);
    $stmt = $userInfo->getInfo($_SESSION["id"]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $userInfo->userName = $userName;
        $userInfo->firstName = $firstName;
        $userInfo->lastName = $lastName;
        $userInfo->email = $email;
    }
    $check = false;
    if (isset($_POST["firstname"]) && isset($_POST["lastname"])){
        $check = true;
        if ($_POST["firstname"] == $firstName && $_POST["lastname"] == $lastName){
            $statusMsgType = 'alert alert-danger';
            $statusMsg = 'Nothing was changed';  
        }
        else{
            $conditions = array(
                'id' => $_SESSION["id"]
            );
            $data = array(
                'firstName' => $_POST['firstname'],
                'lastName' => $_POST['lastname']
            );
            $update = $userInfo->update($data, $conditions);
            if ($update){
                // echo "<script>window.location = 'profile.php'</script>";
                $statusMsgType = 'alert alert-success';
                $statusMsg = 'Update infomation successful';  
            }
            else{
                $statusMsgType = 'alert alert-danger';
                $statusMsg = 'Something went wrong!'; 
            }
        }
    }

    if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['cur_pass'])){
        $check = true;
        $cur_pass = $_POST['cur_pass'];
        //password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $statusMsgPassType = 'alert alert-danger';
            $statusMsgPass = 'Confirm password must match with the password.';
        }else{
            $prevCon['where'] = array('password' => MD5($_POST['cur_pass']), 'id' => $_SESSION['id']);
            $prevCon['return_type'] = 'single';
            $prevUser = $userInfo->getRows($prevCon);
            $count = 0;
            while ($row = $prevUser->fetch(PDO::FETCH_ASSOC)){
                $count = 1;
            }
            if ($count == 0){
                $statusMsgPassType = 'alert alert-danger';
                $statusMsgPass = 'Your current password is incorrect, please try again.'; 
            }
            else{
                if($_POST['password'] == $_POST['cur_pass']){
                    $statusMsgPassType = 'alert alert-danger';
                    $statusMsgPass = 'Nothing was changed'; 
                }
                else{
                    $conditions = array(
                        'password' => MD5($cur_pass), 
                        'id' => $_SESSION['id']
                    );
                    $data = array(
                        'password' => md5($_POST['password'])
                    );
                    $update = $userInfo->update($data, $conditions);
                    if($update){
                        $statusMsgPassType = 'alert alert-success';
                        $statusMsgPass = 'Successful! You need to login again to apply the change.';
                    }else{
                        $statusMsgPassType = 'alert alert-danger';
                        $statusMsgPass = 'Some problem occurred, please try again.';
                    }
                }
            }
        }
    }
    if ($check == true){
        $redirectURL = 'profile.php';
        echo "<script>window.location.replace = '".$redirectURL."'</script>";
    }
    error_reporting(E_ERROR | E_PARSE);
 

?>


<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Profile
    </h2>
</section>


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <?php 
                        echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; 
                    ?>
					<form action="profile.php" method="POST">
						<h3 class="mtext-105 cl2 txt-center p-b-30 cl11">
                            Account Information
						</h3>

                        <div class="m-b-20 how-pos4-parent" style="margin-top:20px;margin-bottom:5px;">
                            <label>User Name</label>
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" name="name" value="<?php echo $userInfo->userName; ?>" disabled>
						</div>

						<div class="m-b-20 how-pos4-parent" style="margin-top:20px;margin-bottom:5px;">
                            <label>Email</label>
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="email" name="email" value="<?php echo $userInfo->email;?>" disabled>
						</div>

                        <div class="m-b-20 how-pos4-parent" style="margin-top:20px;margin-bottom:5px;">
                            <label>First Name</label>
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" name="firstname" value="<?php echo $userInfo->firstName;?>">
						</div>

                        <div class="m-b-20 how-pos4-parent" style="margin-top:20px;margin-bottom:5px;">
                            <label>Last Name</label>
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" name="lastname" value="<?php echo $userInfo->lastName;?>">
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Update
						</button>
					</form>

				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <form action="profile.php" method="POST">
							
                <h3 class="mtext-105 cl2 txt-center p-b-30 cl11">
                    Change Password
                </h3>
                <?php 
                    echo !empty($statusMsgPass)?'<p class="'.$statusMsgPassType.'">'.$statusMsgPass.'</p>':''; 
                ?>
                <div class="m-b-20 how-pos4-parent" style="margin-top:20px;margin-bottom:5px;">
                    <label>Password</label>
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                    <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="cur_pass" placeholder="Enter Current Password">
                </div>


                <div class="bor8 m-b-20 how-pos4-parent">
                    <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="password" placeholder="Enter New Password">
                </div>


                <div class="bor8 m-b-20 how-pos4-parent">
                    <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="confirm_password" placeholder="Re-type New Password">
                </div>


                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Change Password
                </button>
            </form>
					
				</div>
			</div>
		</div>
	</section>	

<?php
    
    include "layout_foot.php";

?>