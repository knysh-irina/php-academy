<?php
session_start();

include ('config.php');

$email = $_POST['email'];
$password = $_POST['password'];

$hash = $email.$password;

/*
 * if it exists
 */
$validate = false;
if($usersArray[6]['email'].$usersArray[6]['password'] === $hash) {
    $validate = true;
}




/*
 * insert new user to db
 */
if ($validate) {
    $_SESSION['user_id'] = 6;
    $_SESSION['user_email'] = $email;
    header('Location: admin_punnel.php');


} else {
    echo "Невірний пасторь або пароль !";
}

?>
<a href="admin.php"> Спробувати ще</a>