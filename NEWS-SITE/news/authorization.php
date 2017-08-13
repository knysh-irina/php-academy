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
foreach ($usersArray as $value) {
    $bool = $value['email'].$value['password'] === $hash;
    $validate = $bool || $validate;
}




/*
 * insert new user to db
 */
if ($validate) {
    $req = "select id from users where `email`='$email'";
    $res = mysqli_query($mySqlRes,  $req);
    $user_id = mysqli_fetch_assoc($res);

    $_SESSION['user_email'] = $email;
    $_SESSION['user_id'] = $user_id['id'];
    echo $_SESSION['user_id'];
    echo $_SESSION['user_email'];
    header('Location: index.php');
} else {
    echo "Невірний пасторь або пароль !";
}

?>
<a href="index.php"> Перейти на головну</a>