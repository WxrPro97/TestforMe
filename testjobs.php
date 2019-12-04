<?php include ('server.php') ?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  
  
  $query = mysql_query("SELECT * FROM jobs"); 
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
                        <li class="nav-item"><a href="dashboard.php"
                                class="nav-link text-white p-3 mb-2 sidebar-link"><i
                                    class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                        <li class="nav-item"><a href="testjobs.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i
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
                                <h4 class="text-light text-uppercase mb-0">DashBoard</h4>
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
    <!-- Test Project Table start -->
    <section>
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-xl-10 col-lg-9 col-md-9 ml-auto">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-muted text-center mt-5 mb-3">Projects</h3>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Jobs Info</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap">
                                            <div id="dataTable_length" class="dataTable_length"
                                                aria-controls="dataTable">
                                                <label>
                                                    Show
                                                    <select
                                                        class="form-control form-control-sm custom-select custom-select-sm">
                                                        <option value="10" selected>10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="dataTable_filter" class="text-md-right dataTables_filter">
                                                <label>
                                                    <input class="form-control_form-control-sm" type="search"
                                                        aria-controls="dataTable" placeholder="Search" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dataTable" class="table-responsive table mt-2" role="grid"
                                        aria-describedby="dataTable_info">
                                        <table id="dataTable" class="table dataTable my-0">
                                            <thead>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th>Test Name</th>
                                                    <th>Test Type</th>
                                                    <th>Software Type</th>
                                                    <th>Deadline</th>
                                                    <th>Summary</th>
                                                    <th>Link</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                <?php
                                                 while ($row = mysql_fetch_array($query)) 
                                                        {
                                                    ?>
                                                    <td><?php echo $row[company];?></td>
                                                <td><?php echo $row[product];?></td>
                                                <td><?php echo $row[testtype];?></td>
                                                <td><?php echo $row[softwaretype];?></td>
                                                <td><?php echo $row[deadline];?></td>
                                                <!---<td><a href="https://www.google.com/drive/">Download</a></td> -->
                                                <td><?php echo $row[link];?></td>
                                                </tr>
                                                <?php }?>
                                                
                                                <tr>
                                                    <td>
                                                        <img class="rounded-circle mr-2" width="30" height="30"
                                                            src="img/avatar4.png">
                                                        Team Avatar
                                                    </td>
                                                    <td>grammerChecker</td>
                                                    <td>Bata Test</td>
                                                    <td>Chrome Plug-in</td>
                                                    <td>8/12/2019</td>
                                                    <td>Checks grammer</td>
                                                    <td><a
                                                            href="https://chrome.google.com/webstore/detail/grammarly-spell-checker-g/kbfnbcaeplbcioakkpcpgfkobkghlhen?hl=en">Download</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="rounded-circle mr-2" width="30" height="30"
                                                            src="img/avatar2.png">
                                                        ILoveBooty
                                                    </td>
                                                    <td>Web Studio</td>
                                                    <td>Alpha Test</td>
                                                    <td>Browser demo </td>
                                                    <td>10/12/2019</td>
                                                    <td>Web application development Tool</td>
                                                    <td><a href="https://bootstrapstudio.io/#purchase">Download</a>
                                                    </td>
                                                </tr>
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <strong>Company Name</strong>
                                                    </td>
                                                    <td>
                                                        <strong>Test Name</strong>
                                                    </td>
                                                    <td>
                                                        <strong>Test Type</strong>
                                                    </td>
                                                    <td>
                                                        <strong>Software Type</strong>
                                                    </td>
                                                    <td>
                                                        <strong>Deadline</strong>
                                                    </td>
                                                    <td>
                                                        <strong>Summary</strong>
                                                    </td>
                                                    <td>
                                                        <strong>Link</strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 align-self-center">
                                            <p id="dataTable_info" class="dataTable_info" role="status"
                                                aria-live="polite">Showing 1 to 10 of 27</p>
                                        </div>
                                        <div class="col-md-6">
                                            <nav
                                                class="d-lg-flex justify-content-lg-end dataTable_paginate paging_simple_nambers">
                                                <ul class="pagination">
                                                    <li class="page-item disable">
                                                        <a href="#" class="page-link" aria-label="Previous">
                                                            <span aria-hidden="true">Prev</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link" aria-label="Next">
                                                            <span aria-hidden="true">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Test project Tables End -->


</body>

</html>