<?php
	
	session_start();
	if(isset($_SESSION["ccode"])){
  	   $ccode=$_SESSION["ccode"];
       
	}
    if(isset($_SESSION["fid"])){
        $fid=$_SESSION["fid"];
   }
	$ccode = '';
	if(isset($_GET['err'])){
		$ccode = $_GET['err'];
        $_SESSION['ccode']=$ccode;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Form</title>
	<style>
		.container {
			width: 50%;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}

		input[type="text"], select {
			display: block;
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
			font-size: 16px;
			box-sizing: border-box;
		}

		button[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}

		button[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="last.php" method="post">
            <?php $ccode=$_SESSION["ccode"];$fid=$_SESSION["fid"];echo "<input type='hidden' value=$ccode name='ccode'><input type='hidden' value=$fid name='fid'>";?>
			<label for="year">Year:</label>
			<select id="year" name="year" required>
				<option value="">--Select Year--</option>
                <option value="2020">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
			</select>

			<button type="submit">Submit</button>
		</form>
	</div>
</body>
</html>
