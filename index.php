<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GUEST BOOK</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">GUESTBOOK</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link font-weight-bold" href="#loginmodal" class="btn" data-target="#loginmodal" data-toggle="modal">Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- LOGIN MODAL & FORM -->
  <div id="loginmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modal-title">Login</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class=" text-center login-message">
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="formlogin">
            <div class="form-group">
              <input type="text" name="login-email" id="login-email" class="email1 form-control form-control-lg" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <input type="password" name="login-password" id="login-password" class="login-password form-control form-control-lg" placeholder="Enter your password">
            </div>
            <div class="form-group">
              <input type="submit" value="Login" class="btn btn-lg login btn-warning loginbtn font-weight-bold text-light" name="login">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- SIGNUP MODAL & FORM -->
  <div id="signupmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modal-title">Sign Up</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="signup-message">
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="formsignup">
            <div class="form-group">
              <input type="text" name="firstname" id="firstname" class="firstname form-control form-control-lg" placeholder="First Name">
            </div>
            <div class="form-group">
              <input type="text" name="lastname" id="lastname" class="lastname form-control form-control-lg" placeholder="Last Name">
            </div>
            <div class="form-group">
              <input type="text" name="signup-email" id="signup-email" class="form-control form-control-lg" placeholder="Email address">
            </div>
            <div class="form-group">
              <input type="number" name="phone" id="phone" class="form-control form-control-lg" placeholder="Phone Number">
            </div>
            <div class="form-group">
              <input type="password" name="signup-password" id="signup-password" class="form-control form-control-lg" placeholder="Enter a password">
            </div>
            <div class="form-check">
              <label class="form-check-label mr-2">
                <input type="radio" class="form-check-input" name="gender" value="Male" checked>
                Male
              </label>
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" value="Female">
                Female
              </label>
            </div>
            <div class="form-group">
              <input type="text" name="purpose" id="purpose" class="form-control form-control-lg" placeholder="Purpose of Visit eg..Therapy">
            </div>
            <div class="form-group">
              <input type="submit" name="signup" value="Submit" class="btn-lg btn signupbtn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <section class="hero container-fluid px-4">
    <h1 class="text-light">GUESTB<span class="text-warning">OO</span>K</h1>
    <p class="text-light">
      Trusted Digital GuessBook Web-App
    </p>
    <button class="btn btn-lg btn-warning">
      <a href="#signupmodal" class="btn text-decoration-none text-light font-weight-bold" data-target="#signupmodal" data-toggle="modal">SIGN UP </a>
    </button>
  </section>
  <section class="about jumbotron-fluid mt-5 px-2">
    <h2 class="display-4 text-center">About</h2>
    <div class="row">
      <div class="container">
        <div class="col-lg-6 col-lg-7 col-sm-12 mx-auto">
          <p class="lead mt-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore sit expedita asperiores explicabo veritatis sint eos iste fuga voluptatibus error velit ab, saepe laborum ratione esse voluptatem libero facilis veniam!
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="footer bg-dark text-light text-center mt-5 px-2">
    <small class="small text-muted">
      &copy; GUESTB<span class="text-warning">OO</span>K 2020
    </small>
  </section>
  <script src="js/bootstrap/jquery.min.js"></script>
  <script src="js/bootstrap/popper.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/auth/signup.js"></script>
  <script src="js/auth/login.js"></script>
</body>

</html>