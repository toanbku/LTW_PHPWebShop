<?php
//start session
session_start();

//load and initialize user class
include 'objects/user.php';
include 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(isset($_POST['forgotSubmit'])){
    //check whether email is empty
    if(!empty($_POST['email'])){
        $count_forgot = 0;
        //check whether user exists in the database
        $prevCon['where'] = array('email'=>$_POST['email']);
        $prevCon['return_type'] = 'count';
        $stmt = $user->getRows($prevCon);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $count_forgot = 1;
            //generat unique string
            $uniqidStr = md5(uniqid(mt_rand()));
            echo $uniqidStr;
            //update data with forgot pass code
            $conditions = array(
                'email' => $_POST['email']
            );
            $data = array(
                'forgot_pass_identity' => $uniqidStr
            );
            $update = $user->update($data, $conditions);
            
            if($update){
                $resetPassLink = 'http://localhost/assignment2/resetPassword.php?fp_code='.$uniqidStr;
                
                //get user details
                $con['where'] = array('email'=>$_POST['email']);
                $con['return_type'] = 'single';
                $userDetails = $user->getRows($con);
                
                //send reset password email
                while ($row = $userDetails->fetch(PDO::FETCH_ASSOC)){
                    $to = $row['email'];
                    $subject = "Password Update Request";
                    $mailContent = 'Dear '.$row['firstName'].', 
                    <br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
                    <br/>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
                    <br/><br/>Regards,
                    <br/>BKShop';
                    //set content-type header for sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    //additional headers
                    $headers .= 'From: BKShop<toanbku@gmail.com>' . "\r\n";
                    //send email
                    mail($to,$subject,$mailContent,$headers);
                }
                
                $sessData['status']['type'] = 'alert alert-success';
                $sessData['status']['msg'] = 'Please check your e-mail, we have sent a password reset link to your registered email.';
            }else{
                $sessData['status']['type'] = 'alert alert-danger';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
            }
        }
        if ($count_forgot == 0){
            $sessData['status']['type'] = 'alert alert-danger';
            $sessData['status']['msg'] = 'Given email is not associated with any account.'; 
        }
        
    }else{
        $sessData['status']['type'] = 'alert alert-danger';
        $sessData['status']['msg'] = 'Enter email to create a new password for your account.'; 
    }
    //store reset password status into the session
    $_SESSION['sessData'] = $sessData;
    //redirect to the forgot pasword page
    header("Location:forgotPassword.php");
}elseif(isset($_POST['resetSubmit'])){
    $fp_code = '';
    if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fp_code'])){
        $fp_code = $_POST['fp_code'];
        //password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }else{
            //check whether identity code exists in the database
            $prevCon['where'] = array('forgot_pass_identity' => $fp_code);
            $prevCon['return_type'] = 'single';
            $prevUser = $user->getRows($prevCon);
            $count = 0;
            
            while ($row = $prevUser->fetch(PDO::FETCH_ASSOC)){
                $count = 1;
                // update data with new password
                $conditions = array(
                    'forgot_pass_identity' => $fp_code
                );
                $data = array(
                    'password' => md5($_POST['password'])
                );
                $update = $user->update($data, $conditions);
                if($update){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Your account password has been reset successfully. Please login with your new password.';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
            }

            if ($count == 0){
                $sessData['status']['type'] = 'alert alert-danger';
                $sessData['status']['msg'] = 'You does not authorized to reset new password of this account.';
            }

        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
    //store reset password status into the session

    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'index.php':'resetPassword.php?fp_code='.$fp_code;
    //redirect to the login/reset pasword page
    header("Location:".$redirectURL);
}

?>