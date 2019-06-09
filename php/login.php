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

            $user = ORM::for_table('users')->where('username', $username)->find_one();

            if ($user == NULL) {
                echo json_encode(['location'=>'http://localhost/project/login.html', 'error'=>'yes']);

            } else {
                if (password_verify($password, $user->password)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $user->password;
                    $result = "SUCCES";

                    setcookie('user', $username,time() + (86400 * 7));

                    header('Content-Type: application/json');
                    echo json_encode(['location'=>'http://localhost/project/index.html']);
                    
                } else {
                    echo json_encode(['location'=>'http://localhost/project/login.html', 'error'=>'yes']);
                    
                }

                exit;

            }

        }
    }
ob_end_flush();
?>