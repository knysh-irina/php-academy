
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">



          <?php
         sort( $carouselArray);
          foreach ($carouselArray as $key => $value) {

              if ($key === 0){
                  echo "<div class=\"item active\">";
              } else {
                  echo "<div class=\"item \">";
              }
              ?>



          <img src="../images/<?= $value["image"] ?>" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?= $value["name"] ?></h1>
                <?= $value["content"] ?>
            </div>
          </div>


        </div>
          <?php } ?>





      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
