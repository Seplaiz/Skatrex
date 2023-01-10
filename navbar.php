 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" href="http://servidor-202/skatrex/">
          <strong>Skatrex</strong>
        </a> 
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="#intro">Skates</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" target="_blank">Acessórios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" target="_blank">Roupas</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="" target="_blank">Calçados</a>
            </li>
          </ul>

          <ul class="navbar-nav list-inline">
            <!-- Icons -->
            <!-- Icon dropdown -->
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
				  <a class="dropdown-item" href="" data-mdb-toggle="modal" data-mdb-target="#registoModal" >Sign Up</a>
				</li>
			  </ul>
			  <!-- Badge -->
			  <li class="nav-item">
				<a class="nav-link" href="#">
				  <span class="badge badge-pill bg-danger"></span>
				  <span><i class="fas fa-shopping-cart"></i></span>
				</a>
			  </li>
			  <li class="nav-item">
                <a class="nav-link" href="https://twitter.com/MDBootstrap" rel="nofollow" target="_blank">
                  <i class="fab fa-twitter"></i>
                </a>
			  </li>
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/mdbootstrap/mdb-ui-kit" rel="nofollow" target="_blank">
                <i class="fab fa-github"></i>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- Login Form -->
            <form>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" class="form-control" />
                <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" />
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
                <p>Not a member? <a href="#!">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-github"></i>
                </button>
            </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




