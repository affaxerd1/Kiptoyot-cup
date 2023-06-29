<?php
include_once "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo.PNG">
  <link rel="icon" type="image/png" href="../assets/img/logo.PNG">
  <title> Admin Dashboard- Ainamoi</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="admintyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
  <link id="" href="../assets/css/style.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary " href="../admin/admin-dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1"> Admin Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../client/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Client Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../admin/add-task.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Add Task</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../admin/manage-task.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Manage Task</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../admin/search-user.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Search User</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="../admin/notify-users.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notify Users</span>
          </a>
        </li>
        
        <
        <li class="nav-item">
          <a class="nav-link text-white " href="../admin/mails.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">mails</i>
            </div>
            <span class="nav-link-text ms-1">Mails</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../admin/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="../admin/sign-out.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

        
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="text-center pt-1">
                <p class="text-sm mb-0 text-capitalize">TOTAL TEAMS</p>
                <?php
                        $sql="SELECT COUNT(*) as total FROM teams where constituency='Ainamoi'";
                        $result=mysqli_query($conn, $sql);


                        if($result==false){
                            die("Query failed: ".mysqli_error($conn));
                        }

                        $row=mysqli_fetch_assoc($result);
                        $rowcount=$row['total'];
                    ?>
                <span class="mb-0"><?php echo $rowcount?></span>
              </div>
            </div>  
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              
              <div class="text-center pt-1">
                <p class="text-sm mb-0 text-capitalize">Ainamoi</p>
                <?php
                        $sql="SELECT COUNT(*) as total FROM teams WHERE ward='Ainamoi'";
                        $result=mysqli_query($conn, $sql);


                        if($result==false){
                            die("Query failed: ".mysqli_error($conn));
                        }

                        $row=mysqli_fetch_assoc($result);
                        $rowcount=$row['total'];
                    ?>
                <span class="mb-0"><?php echo $rowcount?></span>
              </div>
            </div>

          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              
              <div class="text-center pt-1">
                <p class="text-sm mb-0 text-capitalize">Kapsoit</p>

                <?php
                        $sql="SELECT COUNT(*) as total FROM teams WHERE ward='Kapsoit'";
                        $result=mysqli_query($conn, $sql);


                        if($result==false){
                            die("Query failed: ".mysqli_error($conn));
                        }

                        $row=mysqli_fetch_assoc($result);
                        $rowcount=$row['total'];
                    ?>
                <span class="mb-0"><?php echo $rowcount?></span>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              
              <div class="text-center pt-1">
                <p class="text-sm mb-0 text-capitalize">Kapchebor</p>
               
                <?php
                        $sql="SELECT COUNT(*) as total FROM teams WHERE ward='Kapchebor'";
                        $result=mysqli_query($conn, $sql);


                        if($result==false){
                            die("Query failed: ".mysqli_error($conn));
                        }

                        $row=mysqli_fetch_assoc($result);
                        $rowcount=$row['total'];
                    ?>
                <span class="mb-0"><?php echo $rowcount?></span>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-4">
          <div class="card h-100">
            <div class="card-header p-3 pt-2">
              
              <div class="text-center pt-1">
                <p class="text-sm mb-0 text-capitalize">Kapkugerwet</p>
                
                <?php
                        $sql="SELECT COUNT(*) as total FROM teams WHERE ward='Kapkugerwet'";
                        $result=mysqli_query($conn, $sql);


                        if($result==false){
                            die("Query failed: ".mysqli_error($conn));
                        }

                        $row=mysqli_fetch_assoc($result);
                        $rowcount=$row['total'];
                    ?>
                <span class="mb-0"><?php echo $rowcount?></span>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-4">
          <div class="card h-100">
            <div class="card-header p-3 pt-2">
              
              <div class="text-center pt-1">
                <p class="text-sm mb-0 text-capitalize">Kipchimchim</p>
               
                <?php
                        $sql="SELECT COUNT(*) as total FROM teams WHERE ward='Kipchimchim'";
                        $result=mysqli_query($conn, $sql);


                        if($result==false){
                            die("Query failed: ".mysqli_error($conn));
                        }

                        $row=mysqli_fetch_assoc($result);
                        $rowcount=$row['total'];
                    ?>
                <span class="mb-0"><?php echo $rowcount?></span>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-4">
          <div class="card h-100">
            <div class="card-header p-3 pt-2">
              
              <div class="text-center pt-1">
                <p class="text-sm mb-0 text-capitalize">Kapsaos</p>
               
                <?php
                        $sql="SELECT COUNT(*) as total FROM teams WHERE ward='Kapsaos'";
                        $result=mysqli_query($conn, $sql);


                        if($result==false){
                            die("Query failed: ".mysqli_error($conn));
                        }

                        $row=mysqli_fetch_assoc($result);
                        $rowcount=$row['total'];
                    ?>
                <span class="mb-0"><?php echo $rowcount?></span>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
          <!--table starts here-->
      
        <div class="container-fluid py-4 table-container">
          <div class="row">
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">TEAMS - AINAMOI</h6>
                  </div>
                </div>
                <table class="table">
                  <thead>
                  
                    <tr>
                    
                      <th>Team Name</th>
                      <th>Constituency</th>
                      <th>ward</th>
                      <th>Coach</th>
                      <th>Eliminate</th>
                      <th>Disqualify</th>
                    </tr>
                  </thead>
                  <tbody id="tableBody">
                  <?php
                  $sql="SELECT * from teams WHERE constituency='Ainamoi'";
                  $query=mysqli_query($conn, $sql);
              
                  foreach($query as $q)
                  {
                  ?>
                    <tr>
                      
                      <td><?php echo $q['name']?> </td>
                      <td><?php echo $q['constituency']?></td>
                      <td><?php echo $q['ward']?></td>
                      <td><img class="img" src="https://img.chelseafc.com/image/upload/f_auto,h_860,q_50/editorial/people/first-team/2022-23/Reece_James_profile_avatar_final_22-23.png" alt="<?php  echo $q['name'] ?>"></td>
                      <td><button class="btn btn-warning">Eliminate</button></td>
                      <td><div id="delete">
                                    <form action="delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $q['id']?>">
                                        <input type="submit" name="cancel" id="bt2" class="btn btn-danger"  value="DISQUALIFY"></input>
                                    </form>
        
                            </div></td>

                      <?php }?>
                    
                    </tr>
                  
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      <!--table ends here-->  
    </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                <div class="copyright">
                  &copy; Copyright <script>document.write(new Date().getFullYear())</script> <strong>Smartechwriters</strong>. All Rights Reserved
                </div>
              </div>
            </div>

          </div>
        </div>
      </footer>
    </div>
  </main>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  
   <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example admin etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>