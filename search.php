<?php
  include ("./connection.php");
  
  $value = $_POST['search'];
  $sql = "SELECT * FROM product WHERE prod_name LIKE '%$value%' ";
  $result = $db->query($sql);

  if($result) { ?>
    
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Skatrex Store</title>
    <link rel="icon" href="img\skatrexlogo.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
      <!--Main Navigation-->
  <header>
    <style>
      /* Carousel styling */
      #introCarousel,
      .carousel-inner,
      .carousel-item,
      .carousel-item.active {
        height: 100vh;
      }

      .carousel-item:nth-child(1) {
        background-image: url('img/calcadosbanner.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      .carousel-item:nth-child(2) {
        background-image: url('img/acessoriosbanner.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      .carousel-item:nth-child(3) {
        background-image: url('img/skatesbanner.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }
      .carousel-item:nth-child(4) {
        background-image: url('img/bannerroupas.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #introCarousel {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>
    

      <?php include('navbar.php'); ?>

    <!-- Carousel wrapper -->
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="3"></li>
      </ol>

      <!-- Inner -->
      <div class="carousel-inner">
        <!-- Single item -->
        <div class="carousel-item active">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1 class="mb-3">Calçados</h1>
                <a class="btn btn-outline-light btn-lg m-2" href="index.php?cat=1"
                  role="button" rel="nofollow" target="_blank">Ver Produtos</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask"  style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1 class="mb-3">Acessórios</h1>
                <a class="btn btn-outline-light btn-lg m-2" href="index.php?cat=2"
                  role="button" rel="nofollow" target="_blank">Ver Produtos</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1 class="mb-3">Skates</h1>
                <a class="btn btn-outline-light btn-lg m-2" href="index.php?cat=3"
                  role="button" rel="nofollow" target="_blank">Ver Produtos</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask"  style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1 class="mb-3">Roupas</h1>
                <a class="btn btn-outline-light btn-lg m-2" href="index.php?cat=4"
                  role="button" rel="nofollow" target="_blank">Ver Produtos</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Inner -->

      <!-- Controls -->
      <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Carousel wrapper -->
  </header>
  <!--Main Navigation-->
  
  <!--Main layout-->
  <main class="mt-5">
    <div class="container">
      
      <!--Section: Content-->

      <hr class="my-5" />
      <form action="search.php" method="post">
        <input class="value" name="search" type="text" placeholder="Search..">
      </form>
      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Produtos</strong></h4>

        <div class="row row-cols-1 row-cols-md-3 g-4">

      <?php  while ($row = $result->fetch_assoc()) { ?>
      <div class="col"> 
        <div class="card h-100">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="img\<?php echo $row['img']; ?>" width="50%" height="50%" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['prod_name']; ?></h5>
            <p class="card-text"><?php echo $row['prod_price']; ?>€</p>
            </p>
            <a href="#!" class="btn btn-primary">Comprar</a>
          </div>
        </div>
      </div> 
  <?php  }?>
  <!--Footer-->
  <footer class="bg-light text-lg-start">
    <div class="text-center py-4 align-items-center">
      <p>Follow Skatrex on social media</p>
      <a href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" class="btn btn-primary m-1" role="button"
        rel="nofollow" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://www.facebook.com/mdbootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-github"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    
    <!-- Copyright -->
  </footer>
  <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
  <?php } ?>
</body>
</html>
  