<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TestMeOut</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

  <!-- Start NavBar Section  -->
  <div id="home">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.html">
        <img class="logo" src="img/logo_v2.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#course">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#team">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- End Navbar Section -->

  <!-- Start Image Slider -->
  <!-- "data-interval" is duration of each slide. 1000 = 1s -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="img/background.png" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Welcome to TestForMe</h1>
          <h3>Test New Software Now!</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/background2.png" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Cutting Edge Software</h1>
          <h3>Test Unreleased Cutting Edge Software!</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/background3.png" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Get Rewarded</h1>
          <h3>Developers Rewards!</h3>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- End Image slider -->


  <!-- Start Course Section  -->
  <div id="course" class="offset">
    <div class="col-12 narrow text-center">
      <h1>We want you</h1>
      <p class="lead">Duis mollis, est non commodo luctus,
        nisi erat porttitor ligula, eget lacinia odio sem nec elit!</p>
      <a class="btn btn-success btn-md" href="register.php" target="_blank">Sign up!</a>
    </div>
  </div>

  <br>

  <!-- End Course Section -->


  <!-- Start Portfolio Section  -->
  <div id="port">
    <div class="col-12 text-center">
      <br>
      <h3 class="heading">Portfolio</h3>
      <div class="heading-underling"></div>
    </div>
    <div class="row padding">
      <div class="col-md-3">
        <div class=" card text-center">
          <br>
          <img src="img/shield.png" class="card-img-top port_img mx-auto" alt="shield">
          <div class="card-body">
            <h4>Dummy Text</h4>
            <p>"erat porttitor ligula, eget lacinia odio sem nec elit?""</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class=" card text-center">
          <br>
          <img src="img/users.jpg" class="card-img-top port_img mx-auto" alt="users">
          <div class="card-body">
            <h4>Dummy Text</h4>
            <p>"erat porttitor ligula, eget lacinia odio sem nec elit?""</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class=" card text-center">
          <br>
          <img src="img/software.jpg" class="card-img-top port_img mx-auto" alt="software">
          <div class="card-body">
            <h4>Dummy Text</h4>
            <p>"erat porttitor ligula, eget lacinia odio sem nec elit?""</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class=" card text-center">
          <br>
          <img src="img/company.png" class="card-img-top port_img mx-auto" alt="company">
          <div class="card-body">
            <h4>Dummy Text</h4>
            <p>"erat porttitor ligula, eget lacinia odio sem nec elit?""</p>
          </div>
        </div>
      </div>
    </div> <!-- End of row -->
  </div><!-- End of jumbotron  -->
  <!-- End Portfolio Section -->

  <!-- Start Email Us -->
  <div class="narrow text-center">
    <div class="col-md-12">
      <p class="lead">erat porttitor ligula, eget lacinia odio sem nec elit?</p>
      <a class="btn btn-secondary btn-md" href="#">Email Us</a>
    </div>
  </div>
  <!-- End Email Us -->

  <br>

  <!-- Start Team Section  -->
  <div id="team" class="offset">

    <div class="col-12 text-center">
      <h3 class="heading">Team</h3>
      <div class="heading-underling"></div>
    </div>
    <div class="row padding">

      <div class="col-md-4">
        <div class=" card text-center">
          <img class="card-img-top" src="img/team1.png">
          <div class="card-body">
            <h4>Jegan Francis Mendy</h4>
            <p>"erat porttitor ligula, eget lacinia odio sem nec elit?""</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class=" card text-center">
          <img class="card-img-top" src="img/team2.png">
          <div class="card-body">
            <h4>Christopher Angbalu</h4>
            <p>"erat porttitor ligula, eget lacinia odio sem nec elit?""</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class=" card text-center">
          <img class="card-img-top" src="img/team2.png">
          <div class="card-body">
            <h4>Sandupa Mohottige</h4>
            <p>"erat porttitor ligula, eget lacinia odio sem nec elit?""</p>
          </div>
        </div>
      </div>

    </div><!-- End Team Section -->

  </div>
  <!-- End Team Section -->


  <!-- Start Contact Section  -->
  <div id="contact" class="offset">
    <footer>
      <div class="row justify-content-center">

        <div class="col-md-5 text-center">
          <img src="img/logo_v2.png">
          <p>Duis mollis, est non commodo luctus,
            nisi erat porttitor ligula, eget lacinia odio sem nec elit!</p>
          <strong>Contact Info</strong>
          <p>(888) 888-8888 <br>email@Email.com </p>

          <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
          <a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
          <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>

        <hr class="socket">
        &copy; TestMeOut.

      </div> <!-- End of Row     -->
    </footer>
  </div>
  <!-- End Contact Section -->
</body>

</html>