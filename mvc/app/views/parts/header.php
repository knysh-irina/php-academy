<head>
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/bootstrap.css ">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/main.css ">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/font-awesome/css/font-awesome.css ">
    <script src="<?= $baseUrl ?>/assets/js/jquery-3.2.1.js"></script>
    <script src="<?= $baseUrl ?>/assets/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $baseUrl ?>item/showAll?page=1">Tasks</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li><a href="<?= $baseUrl ?>item/addTask">Add Task </a></li>

                <?php if (isset($_SESSION['name'])): ?>
                    <li><a href="<?= $baseUrl ?>item/logOut"> Log out </a></li>
                <?php else : ?>
                    <li><a href="<?= $baseUrl ?>item/logIn"> Log in </a></li>
                <?php endif; ?>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
            </ul>
        </div>
    </div>
</nav>