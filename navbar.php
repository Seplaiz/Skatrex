<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

?>
 
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" href="index.php">
          <strong>Skatrex</strong>
        </a> 
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="index.php?cat=3">Skates</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?cat=2"> Acessórios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?cat=4">Roupas</a>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="index.php?cat=1">Calçados</a>
            </li>
          </ul>

          <ul class="navbar-nav list-inline">
            <!-- Icons -->
            <!-- Icon dropdown -->
          <?php

            if(isset($_SESSION['email'])){ ?>

            <li class="nav-item">
				      <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            </li>

          <?php  } else { ?>

            <li class="nav-item me-3 me-lg-0 dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fas fa-user"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="" data-mdb-toggle="modal" data-mdb-target="#loginModal">Log In</a>
                  </li>
                <li>
                <a class="dropdown-item" href="" data-mdb-toggle="modal" data-mdb-target="#registerModal" >Sign Up</a>
              </li>
              </ul>


          <?php } ?>
			  <!-- Badge -->
			  <li class="nav-item">
				<a class="nav-link" href="#">
				  <span class="badge badge-pill bg-danger"></span>
				  <span><i class="fas fa-shopping-cart"></i></span>
				</a>
			  </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->


    <!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- Login Form -->
          <form action="index.php" method="POST">
        <input type="hidden" name="form" value="login" />
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" />
                <label class="form-label" for="form2Example1">Email address or Phone number</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                    <label class="form-check-label" for="form2Example34"> Remember me </label>
                </div>
                </div>

                <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="" data-mdb-dismiss="modal" data-mdb-toggle="modal" data-mdb-target="#registerModal">Register</a></p>
            </div>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Register Form -->
        <form action="index.php" method="POST">
        <input type="hidden" name="form" value="register" />
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
               <div class="form-outline">
                  <!--- First Name input --->
                 <input type="text" name="first_name" id="form3Example1" class="form-control" />
                 <label class="form-label" for="form3Example1">First Name</label>
               </div>
             </div>
             <div class="col">
               <div class="form-outline">
                  <!--- Last Name input --->
                <input type="text" name="last_name" id="form3Example2" class="form-control" />
                <label class="form-label" for="form3Example2">Last Name</label>
               </div>
             </div>
           </div>

             <!-- Phone Number input -->
           <div class="form-outline mb-4">
            <input type="number" name="phone_number" id="form3Example3" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" required />
            <label class="form-label" for="form3Example3">Phone Number</label>
           </div>

            <!-- Email input -->
           <div class="form-outline mb-4">
             <input type="email" name="email" id="form3Example3" class="form-control" />
             <label class="form-label" for="form3Example3">Email Address</label>
           </div>

            <!-- Password input -->
           <div class="form-outline mb-4">
             <input type="password" name="password" id="form3Example4" class="form-control" />
             <label class="form-label" for="form3Example4">Password</label>
           </div>

            <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</div>