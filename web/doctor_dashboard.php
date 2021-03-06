<?php
session_start();
require_once('conf.php');

if(!isset($_SESSION['user_id'])){
    header('Location:/login.php');
}

$doctor_id = $_SESSION['user_id'];
$sql = "SELECT  firstname,lastname FROM DoctorsProfile WHERE doctor_id=?";
$stmt = $conn->prepare($sql);
// $stmt->bindParam(1, $p_id, PDO::PARAM_STR, 12);

$stmt->execute([$doctor_id]);

while($row =  $stmt->fetch()) {
    $name = $row["firstname"] ." ". $row{"lastname"};
}   
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/5903f016d8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheets/doctor.css">
    <link rel="stylesheet" href="stylesheets/profile.css">
   

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <script src="scripts/jquery.js"></script>
        <script type="text/javascript" src="scripts/dashboard.js"></script>
      
       
            
        

    
    <title>Document</title>
    <style>
		iframe {
			width: 80%;
            height: 650px;
            margin-left: 20%;
        }
	</style>
</head>

<body>
    <div class="dashboard-content">
    <section class="sideMenu">
        <nav>
            <div class="logo">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="images/logo.png" >
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <strong>Health Plus </strong>
                    </span>

                </div>
            </div>

           
            
            <a href="doctor_home.php"  id="dashboard_tab" onclick="changeTab('dashboard')" target="myFrame"><i class="fas fa-home"></i>Dashboard</a>
            <a href="appointment_requests.php"  id="appointments_tab" onclick="changeTab('appointments')" target="myFrame"><i class="fas fa-calendar-plus"></i>Appointments </a>
            <a href="patients_list.php" id="patientlist_tab" onclick="changeTab('patientlist')" target="myFrame"><i class="fas fa-hospital-user"></i>Patients</a>
            <a href="about_us.xml" ><i class="fas fa-info-circle"></i></i>About Us</a>

        </nav>

    </section>

    <header>
        <div class="top-bar">
            <form class="search-container" autocomplete="off">
                <div class="autocomplete">
                <input type="text" id="myInput" placeholder="Search">
            </div>
                
<a href="#"><img class="search-icon"
                        src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
                     
                       
            </form>
            <div class="profile-container" > 
                <div class="half" >
                  <label for="profile2" class="profile-dropdown " >
                    <input type="checkbox" id="profile2">
                    <!-- <img src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_hipster_guy-512.png"> -->
                    <img   src="images/profile_image.png" alt="" class="image--cover" style="color: white;
                    " />
                    <span style="font-size: medium; margin-right: -5px; "><?php echo $name?></span>
                    <label for="profile2"><i class="fas fa-bars" style="scale: 0.7;"></i></i></label>
                    <ul>
                        <li><a href="doctor_registration.php" target="myFrame"><i class="far fa-user-circle"></i></i>Profile</a></li>
                        
                        <li><a href="authenticate.php?logout=true"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
                    </ul>
                  </label>
                </div>
              </div>
              
           
        </div>
        <script type="text/javascript" src="scripts/search.js"></script>
      
    </header>
  
    


    <iframe name="myFrame" src="doctor_home.php" id="frm" onload="iframeLoaded();"></iframe>
    
   
</div>
 
        <script>
            var currentTab = 'dashboard';
            document.getElementById('dashboard_tab').classList.add('active');

            var iFrameID = document.getElementById('frm');

            function iframeLoaded() {
                iFrameID = document.getElementById('frm');
                if (iFrameID) {
                    iFrameID.height = "";
                    iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
                }
            }

            function changeTab(newTab) {
                if(newTab !== currentTab){
                    document.getElementById(newTab + '_tab').classList.add('active');
                    document.getElementById(currentTab + '_tab').classList.remove('active');
                    currentTab = newTab;
                }
            }

            iframeLoaded();
        </script>


</body>

</html>