<?php
 $cid= $_POST['ccode'];
 $fid= $_POST['fid'];
 $year= $_POST['year'];
// Define database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$dbname = "virtualclassroom";

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT cid FROM classes WHERE ccode='$cid'";

// Execute the query and store the result in a variable
$result = $conn->query($sql);

// Check if the query returned any results
if ($result->num_rows > 0) {
  // Output the "cid" value
  $row = $result->fetch_assoc();
  $cid=$row["cid"];
} 

// Define the SQL query
$sql = "SELECT id FROM users WHERE year = $year";

// Execute the query and fetch the results
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
  // Loop through the results and display the IDs
  while($row = $result->fetch_assoc()) {
    $sid=$row["id"];

    $sql=$sql = "INSERT INTO studentclasses (cid, fid, sid) VALUES ('$cid', '$fid', '$sid')";

    $conn->query($sql);
    
  }
} else {
  echo "No users found.";
}
echo "students added successfully";

// Close the database connection
$conn->close();
?>
<html>
  <head>
    <style>
      .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 10px;
}
.button1{
	background-color: green; 
  	color: black;
}
</style>
  </head>
  <body>
  <button class="button button1"><a href="facultyDashboard.php">OK!!</a></button>
</body>
</head>