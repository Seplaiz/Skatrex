<?php
  include ("./connection.php");
  $link="index.php";
  $erro=0;
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    /* se for um registo */
    if($_POST['form']=="register"){
      
      /* verifica se jรก existe o user */
      $sql = "SELECT email, password, phone_number, first_name, last_name FROM user WHERE email='".mysqli_real_escape_string($db,$_POST['email'])."'";
    
      //echo $sql;
    
      if($result = mysqli_query($db,$sql) && isset($result['email'])){
        
        //todo user já existe
      }
      else{ 
      
        /* contra o sql injection */
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
        $phone_number = mysqli_real_escape_string($db,$_POST['phone_number']);
		    $first_name= mysqli_real_escape_string($db,$_POST['first_name']);
        $last_name= mysqli_real_escape_string($db,$_POST['last_name']);

        /*Encriptar a password*/
        $hashpassword = password_hash($password, PASSWORD_BCRYPT);
        
            
        $sql="INSERT INTO user(email, password, phone_number, first_name, last_name) VALUES('".$email."','".$hashpassword."', '".$phone_number."','".$first_name."', '".$last_name."')";
        
       // echo $sql;
		//exit();
        
        $result=mysqli_query($db,$sql);
        
        /* se houver erro no insert */
        if(!$result){
          $erro=1;
          //echo $result;
          //exit();
        }
        else{
          
          session_start();
          $_SESSION['email'] = $email;
        }
      }
    }
    
    /* se for login */
    if($_POST['form']=="login"){
      
      $error_message="";
      
        $password = mysqli_real_escape_string($db,$_POST['password']);
      //  $crypt_pass = password_hash($password, PASSWORD_BCRYPT);  // cifra a password do form
        $found = false;
        $phone_number = '';
        $email = '';
        $at = '@';

        $aux = mysqli_real_escape_string($db,$_POST['email']);

        //testar se é o email ou telemóvel
  
         if(strpos($aux,$at)==true){
          $email=$aux;
        }
        else{
          $phone_number=$aux;
        }


       /* verifica a existencia do user e obtem a password para poder comparar com a password dada */
       $sql = "SELECT email, password, phone_number, first_name, last_name FROM user WHERE (email='$email' OR phone_number='$phone_number')";

       //echo $sql;
     
      $result = mysqli_query($db,$sql);

      if ($data = mysqli_fetch_array($result)){
       
        /* se as passwords forem iguais ?  então existe o utilizador 
       echo $crypt_pass."------>". $data['password'];
		    exit();*/
        
        if (password_verify($password, $data['password'])){
          $found = true;
          $phone_number = $data['phone_number'];
          $email=$data['email'];
     
        }
        else{
          $erro=2;
        }	
      }
      else{
        $erro=3;
      }		
    
    
      if($found != false) // não existe user redirect para registo
      {
        session_start();
        $_SESSION['phone_number'] = $phone_number;
        $_SESSION['email'] = $email;
    
		
        $rememberme = isset($_POST['rememberme']) ? true : false;
        if ($rememberme){
        setcookie('phone_number',$fullname, time() + 3600*24*30);
        
        }  
      }
      
      $email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
      $password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
   
    }
    
  }
    

  else{
    session_start();
  }
  
?>


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
        background-image: url('img/skatesbanner.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      .carousel-item:nth-child(3) {
        background-image: url('img/roupasbanner.jpg');
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
      </ol>

      <!-- Inner -->
      <div class="carousel-inner">
        <!-- Single item -->
        <div class="carousel-item active">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1 class="mb-3">Learn Bootstrap 5 with MDB</h1>
                <h5 class="mb-4">Best & free guide of responsive web design</h5>
                <a class="btn btn-outline-light btn-lg m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A"
                  role="button" rel="nofollow" target="_blank">Start tutorial</a>
                <a class="btn btn-outline-light btn-lg m-2" href="https://mdbootstrap.com/docs/standard/"
                  target="_blank" role="button">Download MDB UI KIT</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h2>You can place here any content</h2>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask"  style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h2>And cover it with any mask</h2>
                <a class="btn btn-outline-light btn-lg m-2"
                  href="https://mdbootstrap.com/docs/standard/content-styles/masks/" target="_blank" role="button">Learn
                  about masks</a>
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

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Produtos</strong></h4>

        <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php

            $cat="";
            if(isset($_GET['cat'])){
              $cat=$_GET['cat'];
            }

            /* verifica a existencia do user e obtem a password para poder comparar com a password dada */
            $sql = "SELECT prod_id,category_id,prod_name,prod_price,img,stock,create_date FROM product";
            if($cat!="") $sql.=" WHERE category_id=$cat";

            //echo $sql;

            $result = mysqli_query($db,$sql);

            while ($data = mysqli_fetch_array($result)){ ?>
            <div class="col"> 
              <div class="card h-100">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img src="img\<?php echo $data['img']; ?>" width="50%" height="50%" class="img-fluid" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $data['prod_name']; ?></h5>
                  <p class="card-text"><?php echo $data['prod_price']; ?>€</p>
                  </p>
                  <a href="#!" class="btn btn-primary">Comprar</a>
                </div>
              </div>
            </div>
        
            <?php }?>

            </div>
       






      </section>
      <!--Section: Content-->

      <hr class="my-5" />

      <!--Section: Content-->
    </div>
  </main>
  <!-- Main layout -->


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
      © 2022 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>