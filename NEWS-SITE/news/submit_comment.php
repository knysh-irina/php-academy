<?php

include('config.php');
session_start();

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $text = $_POST['text'];
    $news_id = $_POST['news_id'];
    switch ($newsArray[$news_id]['section']) {
        case "Економіка":
            $section = "economy";
            break;
        case "Людина":
            $section = "human";
            break;
        case "Світ":
            $section = "global";
            break;
        case "Події":
            $section = "event";
            break;
    }

    $req = "INSERT INTO `comments`( `user_id`, `news_id`, `text`) VALUES ('$id', '$news_id', '$text')";
    mysqli_query($mySqlRes, $req);
    $com_count = $usersArray[$id]['comments_count'] + 1;
    $req2 = "UPDATE `users` SET `comments_count`= $com_count WHERE id=$id ";
    mysqli_query($mySqlRes, $req2);
    $req3 = "Location: article-$section.php?id=$news_id";
    header($req3);
} else {
    echo "You need login";
}

?>
<a href="index.php"> Перейти на головну</a>