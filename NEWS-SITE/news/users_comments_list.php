<?php
$id =  $_GET['id'];
include("config.php");
include ("header.php");


/*
 * COMMENT UP
 */

if (isset($_GET['up'])) {
    $points = intval($_GET['points']) + 1;
    $comment_id = $_GET['comment_id'];
    $req = "
UPDATE comments
SET points =  $points 
WHERE id = $comment_id";
    mysqli_query($mySqlRes, $req);

}

/*
 * COMMENT DOWN
 */

if (isset($_GET['down'])) {
    $points = intval($_GET['points']) - 1;
    $comment_id = $_GET['comment_id'];
    $req = "
UPDATE comments
SET points =  $points 
WHERE id = $comment_id";
    mysqli_query($mySqlRes, $req);

}

/*
 * COMMENTS OUTPUT
 */

$resComments = mysqli_query($mySqlRes, "SELECT *
FROM users
INNER JOIN comments ON users.id = comments.user_id where user_id=$id ;");
$commentsArray = [];
while ($row = mysqli_fetch_assoc($resComments)) {
    $commentsArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "news_id" => $row['news_id'],
        "text" => $row['text'], "name" => $row['name'], "points" => $row['points']];
}
$sum = -5;
sort($commentsArray);
$page = $_GET['page'];
$slice_first_element = $sum + 5 * $page;
$commentsArray_slice = array_slice($commentsArray, $slice_first_element, 5);
?>


<table style="margin-top: 200px;">
    <tr>
        <th>ФИО</th>
        <th>Коментар</th>
        <th>Оцінка</th>

    </tr>
    <?php foreach ($commentsArray_slice as $value) { ?>
        <tr>
            <td> <?= $value['name'] ?> </td>
            <td> <?= $value['text'] ?></td>
            <td>
                <a href="?id=<?= $_GET["id"] ?>&down=1&points=<?= $value['points'] ?>&comment_id=<?= $value['id'] ?>&page=<?= $_GET["page"] ?> "
                   id="down">-</a>
                <?= $value['points'] ?>
                <a href="?id=<?= $_GET["id"] ?>&up=1&points=<?= $value['points'] ?>&comment_id=<?= $value['id'] ?>&page=<?= $_GET["page"] ?>"
                   id="up">+</a></td>
        </tr>
    <?php } ?>
</table>

    <ul class="pagination">
        <li class="active"><a href="users_comments_list.php?id=<?=$_GET['id']?>&page=1">1</a></li>

        <li id="show"><a href="#">...</a></li>
        <li class="hiden" style="display: none"><a href="users_comments_list.php?id=<?=$_GET['id']?>&page=2">2</a></li>
        <li class="hiden" style="display: none"><a href="users_comments_list.php?id=<?=$_GET['id']?>&page=3">3</a></li>
        <li class="hiden" style="display: none"><a href="users_comments_list.php?id=<?=$_GET['id']?>&page=4">4</a></li>
        <li><a href="users_comments_list.php?id=<?=$_GET['id']?>&page=5">5</a></li>
    </ul>



    <script>
        document.getElementById("show").addEventListener("click", function () {
            document.getElementsByClassName('hiden')[0].style.display = "inline";
            document.getElementsByClassName('hiden')[1].style.display = "inline";
            document.getElementsByClassName('hiden')[2].style.display = "inline";
            document.getElementById("show").style.display = "none";

        })

    </script>


    <?php
    include ("footer.php");
    ?>

