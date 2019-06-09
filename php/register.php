<?php header('Access-Control-Allow-Origin: *'); 
    ob_start();
    session_start();
    require_once 'idiorm.php';
    ORM::configure('sqlite:./db.sqlite');
   
    $result = "";
    if (isset($_POST["email_register"]) && isset($_POST['password'])) {
        if (($_POST['email_register']=='') || ($_POST['password']=='')) {
            $result = "Username / password invalid";

        } else {
            $username = $_POST['email_register'];
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $user = ORM::for_table('users')->create();
            $user->username = $username;
            $user->password = $hash;
            $user->save();

            echo json_encode(['location'=>'http://localhost/project/login.html']);
            exit;

        }
    }
ob_end_flush();
?>