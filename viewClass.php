<?php
   include 'databaseConnect.php';
   session_start();
   if(isset($_SESSION["fid"])){
   	 
   }else{
   		header("Location:login.php");
   }
   $id = 0;
   if(isset($_GET['id'])){
   	  $id = $_GET['id'];
   }
   if($id==0){
   	  header("Location:login.php");
   }

   $sen = "SELECT * from classes where cid=$id";
   $sp2 = mysqli_prepare($conn,$sen);
   mysqli_stmt_execute($sp2);
    $ans = mysqli_stmt_get_result($sp2);
    $sub = null;
    while($ab = $ans->fetch_assoc()){
      $sub = $ab['cname'];
      $ffid = $ab['fid'];
    }

    if($_SESSION["fid"]!=$ffid){
      header("Location:login.php");
    }
    $temp = $id;

   //echo $id;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Virtual Classroom</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

.jumbotron{
	background-image: url("classroom.jpg");
	height: 370px;
}
.board{
	font-size: 30px;
	font-style: italic;
}

/*Modal */
.modal{
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal3 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal4 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.close1 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.close2 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.close3 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close3:hover,
.close3:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.close4:hover,
.close4:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}




.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}



</style>
<body>
  
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="facultyDashboard.php"><i class="fa fa-home"></i> Home</a>
  
  <a href="logout.php">Logout</a>
</div>
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
  <div class="container" style="padding-top:50px;">
<div class="jumbotron">
       <label class = "board" style="margin-left: 245px; color: yellow;">Welcome  <?php echo $sub;?> </label>         
</div>  
          <button style="" class="btn btn-primary" id = "myBtn2">Change Panchayath head</button><button style="margin-left: 350px;" class="btn btn-primary" ><a href="index.php?clid=<?php echo $id;?>" style="color: white;">View Members</a></button>
          <!--<button style="margin-left: 300px;" class="btn btn-primary" ><a href="exam/dash.php?cid=<?php echo $id;?>&q=0" style="color: white;">Exam Panel</a></button>-->
          <br />
          <br />
          <!-- <nav class="navbar navbar-expand-sm bg-light ">

  
          <ul class="navbar-nav">
    <li class="nav-item" style="margin-right:80px; margin-left: 30px; background-color: green;">
      <a class="nav-link" href="#">View Studymaterials</a>
    </li>
    <li class="nav-item" style="margin-right:200px; margin-left: 200px;">
      <a class="nav-link" href="#">Class Announcements</a>
    </li>
    <li class="nav-item" style="margin-right:30px;margin-left: 110px;">
      <a class="nav-link" href="viewAssignmentsFaculty.php?id=<?php  $id; ?>">View Assignments</a>
    </li>
  </ul>

      </nav> -->

      <div class="tab">
        <!--<button class="tablinks" onclick="openCity(event, 'stm')">StudyMaterials</button> -->
        <button class="tablinks" onclick="openCity(event, 'anc')">Announcements</button>
        <button class="tablinks" onclick="openCity(event, 'ass')">Problems Occurred</button>
      </div>
    <div id="stm" class="tabcontent">
    <button class="btn btn-primary" id = "myBtn" style="margin-left: 900px;margin-bottom: 10px;">Upload Study Material</button>
    <div class="panel-group">
      <?php 

        $q = "SELECT * from studymaterials where cid = $id ";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        while($rows = $result->fetch_assoc()){
          echo '<div class="panel panel-default">';
          echo '<div class="panel-heading">'.$rows["name"].'  <label class="pull-right"> Uploaded on : '.$rows["date"].'</label></div>';
          echo '<div class="panel-body">'.$rows["description"].'<button class="btn btn-primary pull-right"><a href="'.$rows["path"].'" style="color:white;">Download</a></button></div>';
          echo '</div>';
        }
      ?>
      </div>
      </div>
      <div id="anc" class="tabcontent">
          <button class="btn btn-primary"  style="margin-left: 900px;margin-bottom: 10px;" id = "myBtn3">Create Announcement</button>

         

          <div class="panel-group">
        <?php 

        $q = "SELECT * from announcements where cid = $id order by id desc";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        while($rows = $result->fetch_assoc()){
          $uid = $rows['uid'];
          $name = "";
          $q1 = "SELECT * from users where id = $uid";
          $sp1 = mysqli_prepare($conn,$q1);
          mysqli_stmt_execute($sp1);
          $result1 = mysqli_stmt_get_result($sp1);
          while($rows1 = $result1->fetch_assoc()){
            $name = $rows1['email'];
          }


          echo '<div class="panel panel-default">';
          echo '<div class="panel-heading"><label style="color:red;">'.$rows["title"].'</label><label class="pull-right" style="margin-bottom:20px;">  by '.$name.'</label></div>';
          
          echo '<div class="panel-body"><p>'.$rows["des"].'</p></div>';
          echo '</div>';
        }
      ?>
      </div>
          
      </div>

<div id="ass" class="tabcontent">
  <button style="margin-left: 900px;margin-bottom: 10px;" class="btn btn-primary" id = "myBtn1">Upload A Problem</button>
  <div class="panel-group">
      <?php 

        $q = "SELECT * from assignments where cid = $id ";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        while($rows = $result->fetch_assoc()){
          $aid = $rows['id'];
          echo '<div class="panel panel-default">';
          echo '<div class="panel-heading">'.$rows["name"].'  <label class="pull-right"> Due Date : '.$rows["date"].'</label></div>';
          echo '<div class="panel-body">'.$rows["description"].'<button class="btn btn-primary pull-right"><a href="viewSubmissions.php?cid='.$id.'&aid='.$aid.'" style="color:white;">View Submissions</a></button></div>';
          echo '<div class="panel-body"><button class="btn btn-primary" id = "myBtn5" onclick = "show('.$aid.')" value="'.$aid.'">Modify Problem</button></div>';  
            echo '</div>';
          }
      ?>
      </div>
</div>
</div>

<div id="myModal" class="modal">
<div class="modal-content">
    <div class="modal-header">
      <h1>Add Material</h1>	
      <span class="close">&times;</span>
      
    </div>
    <div class="modal-body">
      <br>
      <br>
      <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                
                <div class="card-body" style="background-color: black">
                    <h2 class="title">Enter following Details</h2>
                    <form method="POST" action="addFileToDatabase.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Material Name" name="name1" required="required">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Select Date" name="date" required="required">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Material Description" name="description" required="required">
                        </div>
                        <div class="input-group">
                           <input type="file" name="fileToUpload" >
                        </div>
                        
                          <input type="hidden" name="id" value = "<?php echo $id ?>">
                        
                        <div class="p-t-10">
                            <input class="btn btn--pill btn--green" type="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
      <h1></h1>
    </div>
  </div>
</div>
<div id="myModal1" class="modal1">
<div class="modal-content">
    <div class="modal-header">
      	
      <span class="close1" style="margin-left: 1170px;">&times;</span>
      
    </div>
    <div class="modal-body">
      <br>
      <br>
      <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                
                <div class="card-body" style="background-color: black">
                    <h2 class="title">Enter following Details</h2>
                    <form method="POST" action="addAssignmentToDatabase.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Assignment Name" name="name1" required="required">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Due Date" name="date" required="required">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Assignment Description" name="description" required="required">
                        </div>
                        <div class="input-group">
                           <input type="file" name="fileToUpload" >
                        </div>
                        
                          <input type="hidden" name="id" value = "<?php echo $id ?>">
                        
                        <div class="p-t-10">
                            <input class="btn btn--pill btn--green" type="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
      <h1></h1>
    </div>
  </div>
</div>

<div id="myModal2" class="modal2">
<div class="modal-content">
    <div class="modal-header">
        
      <span class="close2" style="margin-left: 1170px;">&times;</span>
      
    </div>
    <div class="modal-body">
      <br>
      <br>
      <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                
                <div class="card-body" style="background-color: black">
                    <h2 class="title">Change Faculty</h2>
                    <form method="POST" action="facultyChange.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Enter Email" name="email" required="required">
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $temp ?>">
                        <div class="p-t-10">
                            <input class="btn btn--pill btn--green" type="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
      <h1></h1>
    </div>
  </div>
</div>

<div id="myModal3" class="modal3">
<div class="modal-content">
    <div class="modal-header">
        
      <span class="close3" style="margin-left: 1170px;">&times;</span>
      
    </div>
    <div class="modal-body">
      <br>
      <br>
      <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                
                <div class="card-body" style="background-color: black">
                    <h2 class="title">Add Announcement</h2>
                    <form method="POST" action="addAnncFac.php" enctype="multipart/form-data">
                      <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Title" name="title" required="required">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Announcement Description" name="ades" required="required">
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $temp ?>">
                        <input type="hidden" name="uid" value="<?php echo $ffid ?>">
                        <div class="p-t-10">
                            <input class="btn btn--pill btn--green" type="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
      <h1></h1>
    </div>
  </div>
</div>

<div id="myModal4" class="modal4">
<div class="modal-content">
    <div class="modal-header">
        
      <span class="close4" style="margin-left: 1170px;">&times;</span>
      
    </div>
    <div class="modal-body">
      <br>
      <br>
      <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                
                <div class="card-body" style="background-color: black">
                    <h1 class="title">Modify Assignment</h1>
                     <form method="POST" action="updateAssignmentFaculty.php" enctype="multipart/form-data">
                      <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Assignment Name" name="name1" required="required">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Due Date" name="date" required="required">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Assignment Description" name="description" required="required">
                        </div>
                        <div class="input-group">
                           <input type="file" name="fileToUpload" >
                        </div>
                        
                          <input type="hidden" name="id" value = "<?php echo $id ?>">
                          <input type="hidden" id="assid" name="aid" value="">
                        <div class="p-t-10">
                            <input class=" btn--pill btn--green" type="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
      <h1></h1>
    </div>
  </div>
</div>

  </div>
</body>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}


var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];
btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}

var modal3 = document.getElementById("myModal3");

// Get the button that opens the modal
var btn3 = document.getElementById("myBtn3");

// Get the <span> element that closes the modal
var span3 = document.getElementsByClassName("close3")[0];
btn3.onclick = function() {
  modal3.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span3.onclick = function() {
  modal3.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal3) {
    modal3.style.display = "none";
  }
}


var modal4 = document.getElementById("myModal4");

// Get the button that opens the modal


// Get the <span> element that closes the modal
var span4 = document.getElementsByClassName("close4")[0];
function show(par) {
  modal4.style.display = "block";
  var id = par;
  console.log(id);
  var asid = document.getElementById("assid");
  asid.value = id;
}

// When the user clicks on <span> (x), close the modal
span4.onclick = function() {
  modal4.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal4) {
    modal4.style.display = "none";
  }
}




function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</html>