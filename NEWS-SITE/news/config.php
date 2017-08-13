<?php


$config = [
    "ip" => "localhost",
    "port" => 3306,
    "login" => "root",
    "password" => "",
    "database" => "news",
];


$mySqlRes = mysqli_connect($config['ip'], $config['login'], $config['password']);

//  .........................news..................

mysqli_select_db($mySqlRes, "news");
mysqli_set_charset($mySqlRes, "utf8");

$res = mysqli_query($mySqlRes, "select * from news");
$newsArray = [];
while ($row = mysqli_fetch_assoc($res)) {
    $newsArray[$row['id']] = [
        "id" => $row['id'], "user_id" => $row['user_id'], "section" => $row['section'], "name" => $row['name'],
        "content" => $row['content'], "date" => $row['date']
        , "image" => $row['image'], "analitics" => $row['analitics']];
}






/*
 * Users
 */
$resUsers = mysqli_query($mySqlRes, "SELECT * FROM `users` ");
$usersArray = [];
while ($row = mysqli_fetch_assoc($resUsers)) {
    $usersArray[$row['id']] = ["id" => $row['id'], "name" => $row['name'],
        "email" => $row['email'], "password" => $row['password'], "comments_count" => $row['comments_count']];
}


/*
 * COMMENTS
 */
$resComments = mysqli_query($mySqlRes, "SELECT * FROM `comments` ");
$commentsArray = [];
while ($row = mysqli_fetch_assoc($resComments)) {
    $commentsArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'],
        "news_id" => $row['news_id'], "text" => $row['text'], "points" => $row['points'], "date" => $row['date']];
}


/*
 * Події
 */
$resEvent = mysqli_query($mySqlRes, "SELECT * FROM `news` where `section` = \"Події\" ORDER BY date DESC LIMIT 5 ;");
$eventArray = [];
while ($row = mysqli_fetch_assoc($resEvent)) {
    $eventArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "section" => $row['section'], "name" => $row['name'],
        "content" => $row['content'], "date" => $row['date']
        , "image" => $row['image'], "analitics" => $row['analitics']];
}

/*
 * Економіка
 */
$resEconomy = mysqli_query($mySqlRes, "SELECT * FROM `news` where `section` = \"Економіка\" ORDER BY date DESC LIMIT 5 ;");
$economyArray = [];
while ($row = mysqli_fetch_assoc($resEconomy)) {
    $economyArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "section" => $row['section'], "name" => $row['name'],
        "content" => $row['content'], "date" => $row['date']
        , "image" => $row['image'], "analitics" => $row['analitics']];
}


/*
 * Людина
 */
$resHuman = mysqli_query($mySqlRes, "SELECT * FROM `news` where `section` = \"Людина\" ORDER BY date DESC LIMIT 5 ;");
$humanArray = [];
while ($row = mysqli_fetch_assoc($resHuman)) {
    $humanArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "section" => $row['section'], "name" => $row['name'],
        "content" => $row['content'], "date" => $row['date']
        , "image" => $row['image'], "analitics" => $row['analitics']];
}


/*
 * Світ
 */
$resGlobal = mysqli_query($mySqlRes, "SELECT * FROM `news` where `section` = \"Світ\" ORDER BY date DESC LIMIT 5 ;");
$globalArray = [];
while ($row = mysqli_fetch_assoc($resGlobal)) {
    $globalArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "section" => $row['section'], "name" => $row['name'],
        "content" => $row['content'], "date" => $row['date']
        , "image" => $row['image'], "analitics" => $row['analitics']];
}


/*
 * CAROUSEL
 */
$resCarousel = mysqli_query($mySqlRes, "SELECT * FROM `news` ORDER BY date DESC LIMIT 3 ");
$carouselArray = [];
while ($row = mysqli_fetch_assoc($resCarousel)) {
    $carouselArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "section" => $row['section'], "name" => $row['name'],
        "content" => $row['content'], "date" => $row['date']
        , "image" => $row['image'], "analitics" => $row['analitics']];
}


/*
 * Аналітика
 */
$resAnalitics = mysqli_query($mySqlRes, "SELECT * FROM `news` where `analitics` = \"1\" ORDER BY date DESC LIMIT 5 ;");
$analiticsArray = [];
while ($row = mysqli_fetch_assoc($resAnalitics)) {
    $analiticsArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "section" => $row['section'], "name" => $row['name'],
        "content" => $row['content'], "date" => $row['date']
        , "image" => $row['image'], "analitics" => $row['analitics']];
}


?>




