
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo.PNG">
  <link rel="icon" type="image/png" href="../assets/img/logo.PNG">
  <title>Dashboard</title>
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
  <link id="clienttyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
  <link id="" href="../assets/css/style.css" rel="stylesheet" />

  <?php
  error_reporting(0);
// Initialize error variables
$team_name_error = $selectedconstituencyerror= $selectedwarderror = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted values
    $team_name = $_POST['team_name'];
    $selectedconstituency = $_POST['constituency'];
    $selectedward = $_POST['ward'];

    // Validate if the values are empty
    if (empty($team_name)) {
        $team_name_error = "Please enter a name";
    } else {
        // Establish a database connection (replace 'hostname', 'username', 'password', and 'database' with your actual database credentials)
        $conn = new mysqli('localhost', 'root', '', 'kiptoyot');

        // Check for any connection errors
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Prepare and execute an SQL SELECT statement to check if the team name already exists
        $stmt = $conn->prepare("SELECT * FROM teams WHERE name = ?");
        $stmt->bind_param("s", $team_name);
        $stmt->execute();
        $result = $stmt->get_result();

        // If the team name already exists, display an error message
        if ($result->num_rows > 0) {
            $team_name_error = "Team name already exists";
            $errorMessage="Team already exists. Log in and confirm your squad ";
        } else {
            // Validate the other fields
            if (empty($selectedconstituency)) {
                $selectedconstituencyerror = "Please select one";
            }

            if (empty($selectedward)) {
                $selectedwarderror = "Please select one";
            }
            // If there are no errors, proceed with database insertion
            if (empty($team_name_error) && empty($selectedconstituencyerror) && empty($selectedwarderror)) {
                // Prepare and execute an SQL INSERT statement
                $stmt = $conn->prepare("INSERT INTO teams (name, constituency, ward) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $team_name, $selectedconstituency, $selectedward);
                $stmt->execute();

                // Check if the insert was successful
                if ($stmt->affected_rows > 0) {
                    $successMessage = "Team registered successfully. Good luck!";
                } else {
                    $errorMessage = "Error inserting values: " . $stmt->error;
                }
            }
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    }
}

?>
</head>




<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/client/dashboard " target="_blank">
        <span class="ms-1 font-weight-bold text-white">Dashboard</span>
      </a>
    </div>
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../client/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../client/your_team.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Your team</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../client/add_team_members.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Add team members</span>
          </a>
        </li>
        
        
        
        <li class="nav-item">
          <a class="nav-link text-white " href="../client/profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../client/sign-in.php">
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
      
    <div id="notification" style="display: none;">Values inserted successfully</div>
      <div class="crow mt-4 ">
          <div class="card h-100">
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">person</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Full Name</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">collins otieno </p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">code</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Team Name</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0" data-color="red">Inactive</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">diamond</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Location</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Seretut</p>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="crow mt-4 ">
        <div class="card h-100">
          <div class="card-body p-3">
            <div class="timeline timeline-one-side">
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="material-icons text-success text-gradient">telegram</i>
                </span>
                <div>
                  <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">Register your team</h6>
                  <br>
                  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                  <label class="home-label"> Team Name:</label>
                  <input type="text" class="input" name="team_name" >
                  <span class="error"><?php echo $team_name_error; ?></span>
                  <br>
            
                  <script>
                    function selectOption() {
                        var constituencySelect = document.getElementById("constituency");
                        var wardSelect = document.getElementById("ward-options");
            
                        // Clear previous options
                        wardSelect.innerHTML = "";
            
                        // Get the selected option value
                        var selectedOption = constituencySelect.value;
            
                        // Create the specific options based on the selected option
                        if (selectedOption === "Ainamoi") {
                            addOption(wardSelect, "Ainamoi", "Ainamoi");
                                addOption(wardSelect, "Kapsoit", "Kapsoit");
                                addOption(wardSelect, "Kapchebor", "Kapchebor");
                                addOption(wardSelect, "Kapkugerwet", "Kapkugerwet");
                                addOption(wardSelect, "Kipchimchim", "Kipchimchim");
                                addOption(wardSelect, "Kapsaos", "Kapsaos");
                        }
                                else if (selectedOption === "Kipkelion-East") {
                            addOption(wardSelect, "Kedowa/Kimugul", "Kedowa/Kimugul");
                            addOption(wardSelect, "Chepseon", "Chepseon");
                            addOption(wardSelect, "Londiani", "Londiani");
                            addOption(wardSelect, "Tendeno/Sorget", "Tendeno/Sorget") 
                        } 
                        else if (selectedOption === "Belgut") {
                            addOption(wardSelect, "Chaik", "Chaik");
                            addOption(wardSelect, "Chemamul", "Chemamul");
                            addOption(wardSelect, "Kabianga", "Kabianga");
                            addOption(wardSelect, "Kaplelatet", "Kaplelatet");
                            addOption(wardSelect, "Kebeneti", "Kebeneti");
                            addOption(wardSelect, "Kapkoiyan", "Kapkoiyan");
                            addOption(wardSelect, "Kiptere", "Kiptere");
                            addOption(wardSelect, "Seretut/Cheptororiet", "seretut/Cheptororiet");
                            addOption(wardSelect, "Waldai", "Waldai");
                        } 
                        else if (selectedOption === "Bureti") {
                            addOption(wardSelect, "Cheborge", "cheborge");
                            addOption(wardSelect, "Cheplanget", "cheplanget");
                            addOption(wardSelect, "chemosot", "chomosot");
                            addOption(wardSelect, "kapkatet", "kapkatet");
                            addOption(wardSelect, "Kusumek", "kusumek");
                            addOption(wardSelect, "Litein", "litein");
                            addOption(wardSelect, "Kibugat", "kibugat");
                            addOption(wardSelect, "Kisiara", "kisiara");
                            addOption(wardSelect, "Tebesonik", "tebesonik");
                        } 
                       
                        else if (selectedOption === "Kipkelion-West") {
                            addOption(wardSelect, "Kipkelion", "kipkelion");
                            addOption(wardSelect, "kunyak", "kunyak");
                            addOption(wardSelect, "Kimasian", "kimasian");
                            addOption(wardSelect, "Chilchila", "chilchila");
                  
                        } else {
                            addOption(wardSelect, "Sigowet", "sigowet");
                                addOption(wardSelect, "Soliat", "soliat");
                                addOption(wardSelect, "Soin", "soin");
                  
                        }
                    }
            
                    function addOption(selectElement, optionText, optionValue) {
                        var option = document.createElement("option");
                        option.text = optionText;
                        option.value = optionValue;
                        selectElement.add(option);
                    }
                </script>            
                <label class="home-label" for="Constituency">Constituency:</label>
                <select class="select-field" id="constituency" name="constituency" onchange="selectOption()">
                    <option selected disabled class="disabled" value="">constituency</option>
                    <option class="option" value="Ainamoi">Ainamoi</option>
                    <option class="option" value="Kipkelion-East">Kipkelion-East</option>
                    <option class="option" value="Belgut">Belgut</option>
                    <option class="option" value="Bureti">Bureti</option>
                    
                    <option class="option" value="Kipkelion-West">Kipkelion-West</option>
                    <option class="option" value="Soin-Sigowet">Soin-Sigowet</option>
                </select>
                <span class="error"><?php echo $selectedconstituencyerror; ?> <br></span> 
            
                <label for="ward" class="home-label">Ward:</label>
                <select id="ward-options" class="select-field" name="ward"></select>
                <span class="error"><?php echo $selectedwarderror; ?></span>
                    
                  <div>
                  <button class="btn btn-primary reg" type="submit">Register</button>
                </div>
                

            </form>
                    
                </div>

              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="crow mt-4 ">
        <div class="card h-100">
          <div class="card-body p-3">
            <div class="timeline timeline-one-side">
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="material-icons text-success text-gradient">email</i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">Announcements</h6>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Welcome to the Kiptoyot Cup. May the best team win!</p>
                </div>
              </div>
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="material-icons text-danger text-gradient">email</i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">Updates</h6>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0" data-color="red"></p>
                </div>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                <div class="copyright">
                  &copy; Copyright <script>document.write(new Date().getFullYear())</script> <strong>Kiptoyot Cup</strong>. All Rights Reserved
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
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example client etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
      const notificationElement = document.getElementById('notification');

      <?php if (isset($successMessage)) : ?>
        showNotification('<?php echo $successMessage; ?>', 'success');
      <?php endif; ?>

      <?php if (isset($errorMessage)) : ?>
        showNotification('<?php echo $errorMessage; ?>', 'error');
      <?php endif; ?>

      function showNotification(message, type) {
        notificationElement.textContent = message;
        notificationElement.classList.add(type);
        notificationElement.style.display = 'block';

        setTimeout(() => {
          hideNotification();
        }, 3000);
      }

      function hideNotification() {
        notificationElement.style.display = 'none';
        notificationElement.classList.remove('success', 'error');
        notificationElement.textContent = '';
      }
    });
  </script>