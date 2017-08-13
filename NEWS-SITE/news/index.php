<?php

include("config.php");
include("header.php");
include("carousel.php");

/*
 * Users_sort_by_comments_number,  from MAX
 */
$resUsers_com = mysqli_query($mySqlRes, "SELECT * FROM `users` ORDER by `comments_count` DESC");
$users_comArray = [];
while ($row = mysqli_fetch_assoc($resUsers_com)) {
    $users_comArray[$row['id']] = [  "id" => $row['id'],  "name" => $row['name'],
        "email" => $row['email'], "password"=> $row['password'], "comments_count"=> $row['comments_count']];
}


/*
 * 3 TOP NEWS by numbers of comments 24 hour
 */
$todayDate = date("Y-m-d");
$resTopNews = mysqli_query($mySqlRes, "SELECT COUNT(id), news_id
FROM `comments`
WHERE `date`='2017-08-12' 
GROUP by news_id
ORDER by COUNT(id) DESC
LIMIT 3");    // Today day $todayDate
$topNewsArray = [];
while ($row = mysqli_fetch_assoc($resTopNews)) {
    $topNewsArray[$row['news_id']] = ["news_id" => $row['news_id']];
}
//SELECT COUNT(id) FROM `comments` WHERE `date`='2017-08-12' AND id=4



?>
<div style=" background: #fafafa;  padding: 30px; margin-bottom: 20px; margin-top: -60px">
<h2 style="color: black">Top commentators:</h2>
<ul>

    <?php foreach ($users_comArray as $value) { ?>

        <li style="display: inline-block"><a style="color: #9c9c9c; font-size: 25px; margin-right: 20px" href="users_comments_list.php?id=<?=$value['id'] ?>&page=1"><?= $value['name'] ?></a>  </li>
    <?php } ?>
</ul>
</div>


<div class="row featurette" style="padding: 30px; ">
    <h2 style="margin-left: 20px; color: black">Актуальні новини:</h2>
    <?php foreach ($resTopNews as $value) {
      $news_id = $value['news_id'];

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


        $content = $newsArray[$news_id]['content'];
        if ($newsArray[$news_id]['analitics'] == 1 && (!isset( $_SESSION['user_email']))) {
            $arr = explode('</div>', $newsArray[$news_id]['content']);
            $output = array_slice($arr, 0, 2);
            $output[0] .= '</div> ';
            $output[1] .= '</div> ';
            array_unshift($output, '<h2 style="color: #0000bf"> Аналітика</h2>');
            $content = implode($output);
        }
      ?>

    <div class="col-md-7">

        <h3 ><a href="article-<?=$section?>.php?id=<?=$news_id?>"><?= $newsArray[$news_id]['name'] ?></a> </h3>
        <p class="lead"><?= $content?></p>
        <h4>Теги: <a href="economy.php"><?= $newsArray[$news_id]['section'] ?></a></h4>
    </div>
    <div class="col-md-5 " style="margin-top: 20px;">
        <img class="featurette-image img-responsive" src="../images/<?= $newsArray[$news_id]['image'] ?>">
    </div>
    <?php } ?>

</div>

<?php
include("footer.php");
?>

