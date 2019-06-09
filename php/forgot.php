<?php header('Access-Control-Allow-Origin: *'); 
    ob_start();
    session_start();
    require_once 'idiorm.php';
    ORM::configure('sqlite:./db.sqlite');
   
    $result = "";
    if (isset($_POST["email_forgot"])) {
        error_log("email-forgit is set");

        $username = $_POST['email_forgot'];
        $user = ORM::for_table('users')->where('username', $username)->find_one();
        
        if ($user == NULL) {
            echo json_encode(['error'=>'yes']);
        } else {
            
            /*generate random password and store it in db*/
            $random_string = uniqid();
            $hash = password_hash($random_string, PASSWORD_DEFAULT);
            $user->password = $hash;
            $user->save();
            
            /*send email with the new password*/
            $msg = "Your new password is" . $random_string;
            /*there must be a valid SMTP server configured*/
            mail($username, "Password change", $msg);

            echo json_encode(['location'=>'http://localhost/project/login.html']);
        }

        exit;

        
    }
ob_end_flush();
?>