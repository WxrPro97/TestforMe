<?php include ('testprojectssettings.php') ?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
        integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous">
    </script>

    <!-- Specifying type of font (Monserrat)-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dstyle.css">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<body>
    <!--Start of NavBar-->
    <!-- collpase navbar if the screensize is less than medium-->
    <nav class="navbar navbar-expand-md navbar-light">
        <!-- Navbar collapse used by javascript id is mynumber-->
        <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse"
            data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span> <!-- Toggles menu icon-->
        </button>
        <!-- Wrapping Collapsed elements-->
        <div class="collapse navbar-collapse" id="myNavbar">
            <!-- Wrapping content in container-->
            <div class="container-fluid">
                <div class="row">
                    <!--Sidebar Column-->
                    <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
                        <!-- Fixed top fixes the extra padding-->
                        <a href="#" class="navbar-brand text-white d-block 
                            mx-auto text-center py-4 mb-4 
                            bottom-border">
                            <!-- gives a link in navbar becomes a block to take full width mx-auto and center centers the text-->

                            TestForMe
                        </a>

                        <div class="bottom-border pb-3 mx-auto text-center">

                            <a href="" class="text-white"> <strong><?php echo $_SESSION['username']; ?></strong>
                                </<strong></a>
                        </div>
                        <li class="nav-item"><a href="adminanalytics.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                                    class="fas fa-home text-light fa-lg mr-3"></i>Analytics</a></li>
                        <li class="nav-item"><a href="testprojects.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                                    class="fas fa-file-alt text-light fa-lg mr-3"></i>Test Jobs</a></li>
                        <li class="nav-item" name="logout"><a href="logout.php"
                                class="nav-link text-white p-3 mb-2 sidebar-link"><i
                                    class="fas fa-sign-out-alt text-light fa-lg mr-3"></i>LogOut</a></li>








                        <!-- End of Sidebar-->
                    </div>
                    <!--Top nav Column-->
                    <div class="col-xl-10 col-lg-9 col-md-8  ml-auto bg-dark fixed-top py-2 top-navbar">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="text-light text-uppercase mb-0">Review</h4>
                            </div>
                            <div class="col-md-5">
                                <form>
                                    <div class=></div>
                                </form>
                            </div>
                            <div class="col-md-3">



                            </div>
                        </div>
                    </div>
                    <!-- end of top nav-->

                </div>
            </div>


        </div>
        <!-- ml-auto mb-2 bg-light places button to left of page when shrunck margin buttom of toggle-->
    </nav>
    <!--Ending of Navbar-->
    


</body>

</html>