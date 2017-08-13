
<?php  session_start();  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../dist/css/carousel.css" rel="stylesheet">
    <style>
      body{
          overflow-x: hidden;
      }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f9f9f9
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
        #support{
            position: fixed;
            width: 380px;
            height: 360px;
            border: 1px solid gray;
            border-radius: 40px 0 0 0;
            z-index: 2000;
            bottom: 0;
            right: 0;
            background: white;
            visibility: hidden;

        }


        .top{
            height: 50px;
            background: #152f41;
            border-radius: 40px 0 0 0;
        }
        .support-text{
            padding: 10px 50px;
            display: block;
            font-size: 1.2em;
            color: white;

        }
        .close{
            color: white !important;
            opacity: 1;
        }

        #support input{
            width: 300px;
            margin-bottom: 10px;
        }
        #support form{
            padding: 20px;
        }
        </style>
</head>
<!-- NAVBAR
================================================== -->
<body>


<div id="support">
    <button type="button" class="close support-close" onclick="parentNode.style.visibility = 'hidden'" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="top">

        <span class="support-text">
             <span class="glyphicon glyphicon-envelope"> </span>
              Подписаться на e-mail рассылку
         </span>
    </div>


    <form  action= "post.php" method= "POST">

        <p>Оставьте свои данные в этой форме</p>
        <input name="name" type="text" required="" placeholder="Ваше имя *"></input>
        <input name="email" type="email"  placeholder="Ваш E-mail"></input>


        <input type="submit">
    </form>

</div>

<script type="text/javascript">
    setTimeout(myFunction, 15000);
    function myFunction(){
        document.getElementById("support").style.visibility = "visible ";
    }
</script>


<div class="navbar-wrapper">
    <div class="container">

        <div id="header" class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="color: white">Euro NEWS</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="articles.php" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Економіка <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php foreach ($economyArray as $value) { ?>
                                    <li>
                                        <a href="article-economy.php?id=<?= $value["id"] ?> "> <?= $value["name"] ?> </a>
                                    </li>
                                <?php } ?>
                                <li><a href="economy.php"><b>Перейти до розділу</b></a></li>
                                <li id="dropdown" > <a  href="#"><b>Dropdown</b><span class="caret"></span></a>
                                    <ul style="display: none" id="dropdown_list">
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                    </ul>

                                </li>
                            </ul>

                        </li>

                        <li class="dropdown"><a href="#about" class="dropdown-toggle" data-toggle="dropdown"
                                                role="button" aria-haspopup="true" aria-expanded="false">Події <span
                                        class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <?php foreach ($eventArray as $value) { ?>
                                    <li><a href="article-event.php?id=<?= $value["id"] ?> "> <?= $value["name"] ?> </a>
                                    </li>
                                <?php } ?>
                                <li><a href="event.php"><b>Перейти до розділу</b></a></li>
                            </ul>
                        </li class="dropdown">
                        <li><a href="#contact" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Людина <span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <?php foreach ($humanArray as $value) { ?>

                                    <li><a href="article-human.php?id=<?= $value["id"] ?> "> <?= $value["name"] ?> </a>
                                    </li>
                                <?php } ?>
                                <li><a href="human.php"><b>Перейти до розділу</b></a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#categ" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Світ <span class="caret"></span></a>

                            <ul class="dropdown-menu"><?php foreach ($globalArray as $value) { ?>
                                    <li><a href="article-global.php?id=<?= $value["id"] ?> "> <?= $value["name"] ?> </a>
                                    </li>
                                <?php } ?>
                                <li><a href="global.php"><b>Перейти до розділу</b></a></li>
                            </ul>


                        </li>
                        <li class="dropdown">
                            <a href="#categ" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Аналітика<span class="caret"></span></a>

                            <ul class="dropdown-menu"><?php foreach ($analiticsArray as $value) { ?>
                                    <li><a href="article-analitics.php?id=<?= $value["id"] ?> "> <?= $value["name"] ?> </a>
                                    </li>
                                <?php } ?>
                                <li><a href="analitics.php"><b>Перейти до розділу</b></a></li>
                            </ul>


                        </li>

                        <li>
                            <form action="#search.php" method="post"
                                  style="width: 200px; margin-top: 8px; margin-left: 40px">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Пошук" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i
                                                    class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul> <ul class="nav navbar-nav navbar-right" style="margin-right: 35px">
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

                        <li>
                            <?php

                            if (! isset( $_SESSION['user_id'])) {
                                echo "  <a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a> ";
                            }  else {
                                echo "  <a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a> ";
                            }

                            ?>


                        </li>
                    </ul>
                </div>



            </div>
        </div>

    </div>
</div>


<script>
    document.getElementById('dropdown').addEventListener('mouseover', function (e) {
        var list = document.getElementById('dropdown_list');
        list.style.display= 'block';

    })
    document.getElementById('dropdown').addEventListener('mouseout', function (e) {
        var list = document.getElementById('dropdown_list');
        list.style.display= 'none';

    })


    var background =  localStorage.getItem('bg');
    document.body.style.background = background;


    var header =  localStorage.getItem('header');
    document.getElementById('header').style.background = header;

</script>