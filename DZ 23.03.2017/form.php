<?php
/**
 * @param $text
 * @return mixed
 */

function antiMat($text)
{
    $matArr = ['mat1', 'mat2', 'mat3'];

    foreach ($matArr as $mat) {
        $text = str_replace($mat, '[conderned]', $text);
    }
    return $text;
}

$file = fopen("db.txt", "a+");

while (!feof($file)) {
    $content = fread($file, 1024);
}

if (empty($content)) {
    $content = [];
} else {
    $content = unserialize($content);
}

if ($_POST['action'] == 'add_comment') {
    $data = $_POST;
    $data['comment'] = antiMat($data['comment']);
    $data['header'] = antiMat($data['header']);

    $content[] = $data;
    ftruncate($file, 0);
    fwrite($file, serialize($content));
}
fclose($file);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="https://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">


        <div class="container">
            <div class="wrapper">
                <form action="" method="post" name="Login_Form" class="form-signin">

                    <hr class="colorgraph">
                    <br>
                    <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus=""/>
                    <input type="text" class="form-control" name="header" placeholder="Header" required=""/>
                    <textarea placeholder="Your message" name="comment"></textarea>
                    <input type="hidden" name="action" value="add_comment">
                    <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Login
                    </button>
                </form>

                <?php foreach ($content as $comment)  : ?>
                    <?= $comment['Username'] ?> <br>
                    <?= $comment['header'] ?> <br>
                    <?= $comment['comment'] ?> <br><br><br>
                <?php  endforeach; ?>


            </div>
        </div>

    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>