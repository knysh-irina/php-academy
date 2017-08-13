<?php include("config.php");
include("header.php");
$id = $_GET['id'];

$content = $globalArray[$id]['content'];
if ($globalArray[$id]['analitics'] == 1 && (!isset( $_SESSION['user_email']))) {
    $arr = explode('</div>', $globalArray[$id]['content']);
    $output = array_slice($arr, 0, 2);
    $output[0] .= '</div> ';
    $output[1] .= '</div> ';
    array_unshift($output, '<h2 style="color: #0000bf"> Аналітика</h2>');
    $content = implode($output);
}

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
INNER JOIN comments ON users.id = comments.user_id where news_id=$id AND recomment=0 ORDER by points DESC  ;");
$commentsArray = [];
while ($row = mysqli_fetch_assoc($resComments)) {
    $commentsArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "news_id" => $row['news_id'],
        "text" => $row['text'], "name" => $row['name'], "points" => $row['points'], "recomment" => $row['recomment']];
}

/*
 * RE-COMMENTS OUTPUT
 */

$resReComments = mysqli_query($mySqlRes, "SELECT *
FROM users 
INNER JOIN comments ON users.id = comments.user_id where news_id=$id AND recomment!=0 ORDER by points DESC  ;");
$reCommentsArray = [];
while ($row = mysqli_fetch_assoc($resReComments)) {
    $reCommentsArray[$row['id']] = ["id" => $row['id'], "user_id" => $row['user_id'], "news_id" => $row['news_id'],
        "text" => $row['text'], "name" => $row['name'], "points" => $row['points'] , "recomment" => $row['recomment']];
}



?>


<div class="container marketing">
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading"><?= $globalArray[$id]['name'] ?></h2>
            <p class="lead"><?= $content ?></p>
            <h4>Теги: <a href="global.php"><?= $globalArray[$id]['section'] ?></a></h4>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive" src="../images/<?= $globalArray[$id]['image'] ?>">
        </div>


    </div>
    <div>
        <h5>Читають зараз: <span id="readNow">0 </span></h5>
        <h5>Прочитало: <span id="readTotal">0</span></h5>
    </div>


    <div>
        <h3 style="color: green">Comments</h3>
        <table>
            <tr>
                <th>ФИО</th>
                <th>Коментар</th>
                <th>Оцінка</th>
                <th></th>
                <th></th>

            </tr>
            <?php foreach ($commentsArray as $value) {
                $comm_id = $value['id'] ;  ?>
                <tr>
                    <td> <?= $value['name'] ?> </td>
                    <td> <?= $value['text'] ?></td>
                    <td>
                        <a href="?id=<?= $_GET["id"] ?>&down=1&points=<?= $value['points'] ?>&comment_id=<?= $value['id'] ?>"
                           id="down">-</a>
                        <?= $value['points'] ?>
                        <a href="?id=<?= $_GET["id"] ?>&up=1&points=<?= $value['points'] ?>&comment_id=<?= $value['id'] ?>"
                           id="up">+</a></td>
                    <td><button class="reComment" id="<?= $value['id'] ?>">Відповісти</button> </td>
                    <td></td>
                </tr>
                <?php

                foreach ($reCommentsArray as $value) {
                    $rec = $value['recomment'];
                    if ($comm_id == $rec){
                        ?>
                        <tr style="background: #d7ffcd">
                            <td></td>
                            <td>  <?= $value['name'] ?> </td>
                            <td>    <?= $value['text'] ?></td>
                            <td>
                                <a href="?id=<?= $_GET["id"] ?>&down=1&points=<?= $value['points'] ?>&comment_id=<?= $value['id'] ?>"
                                   id="down">-</a>
                                <?= $value['points'] ?>
                                <a href="?id=<?= $_GET["id"] ?>&up=1&points=<?= $value['points'] ?>&comment_id=<?= $value['id'] ?>"
                                   id="up">+</a></td>
                            <td><button class="reComment" id="<?= $comm_id ?>">Відповісти</button> </td>
                        </tr>

                    <?php }}} ?>
        </table>

        <form class="form-inline" method="post" action="submit_comment.php">
            <h4>Залишити коментар</h4>
            <input name="text" type="text" placeholder="Comment">
            <input name="news_id" value="<?=$id?>" type="hidden" >
            <input  type="submit">
        </form>
    </div>
    <hr class="featurette-divider">
</div>

<script>

    // ....................count of reading people
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    var timerId = setInterval(readPeaple, 3000);

    var readNow, readTotal = 0;

    function readPeaple() {
        readNow = getRandomInt(0, 5);
        readTotal += readNow;
        document.getElementById('readNow').innerHTML = readNow;
        document.getElementById('readTotal').innerHTML = readTotal;
    }

    //.......................reComment on comment
    document.getElementsByTagName('table')[0].addEventListener('click', function (e) {
        if (e.target.tagName ==='BUTTON'){
            var id =   e.target.id;
            var form = document.createElement('form');
            form.action = "submit_recomment.php";
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'text';
            form.appendChild(input);
            var input3 = document.createElement('input');
            input3.type = 'hidden';
            input3.name = 'id';
            input3.value = id;
            form.appendChild(input3);
            var input4 = document.createElement('input');
            input4.type = 'hidden';
            input4.name = 'news_id';
            input4.value = <?= $id ?>;
            form.appendChild(input4);
            var input2 = document.createElement('input');
            input2.type  = 'submit';
            input2.value = 'Відповісти';
            form.appendChild(input2);
            var tr =  document.createElement('tr').appendChild(form);
            var element = e.target;
            e.target.parentNode.parentNode.parentNode.appendChild(tr);
        }



    })



</script>


<?php

include("footer.php");

?>

