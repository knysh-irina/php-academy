<?php include("config.php");
include ("header.php");  ?>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing" style="margin-top: 150px">
    <!-- START THE FEATURETTES -->



    <?php foreach ($globalArray as $value) { ?>
        <div class="row articles">
            <div class="col-md-12">
                <p class="lead"><a href="article-global.php?id=<?=$value["id"]?> "> <?= $value["name"] ?></a> </p>
            </div>

        </div>

    <?php } ?>

    <ul class="pagination">
        <li class="active"><a href="#">1</a></li>

        <li id="show"><a href="#">...</a></li>
        <li class="hiden" style="display: none"><a href="#">2</a></li>
        <li class="hiden" style="display: none"><a href="#">3</a></li>
        <li class="hiden" style="display: none"><a href="#">4</a></li>

        <li><a href="#">5</a></li>
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

