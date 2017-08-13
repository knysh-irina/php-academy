<?php

include ('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

/*
 * if email already exists
 */
$email_in_users = false;
foreach ($usersArray as $value) {
   $bool = $value['email'] === $email;
   $email_in_users = $bool || $email_in_users;
}

/*
 * insert new user to db
 */
    if (!$email_in_users) {
        $req = "INSERT INTO `users`( `name`, `email`, `password`) VALUES ( '$name' , '$email' , '$password')";
        echo $req;
        mysqli_query($mySqlRes, $req);

        header('Location: index.php');
    } else {
        echo "Такий емейл вже зарєєстрований !";
    }

?>

<a href="index.php"> Перейти на головну</a>

