<?php

if(isset($_POST['login']))
{
    include 'databaseConnect.php';
    $error1 = $error2 =$error3=$error4='';
    $un = $_POST['email'];
    $pw = $_POST['password'];
    
    
    
        $q = "SELECT * from users where email =?";

        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'s',$un);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $id = null;
        $username= null;
        $password = null;
        $role = null;
        while($rows = $result->fetch_assoc()){
            $id = $rows['id'];
            $username = $rows['email'];
            $password = $rows['password'];
            $role = $rows['Role'];
        }
        if($username!=$un){
        	$error3 = "wrongusername";
        	header("Location:login.php?err3=$error3&err4=$error4");
        }

        else if(($username=="testing@gmail.com" || $username=="satya@gmail.com"||$username=="sarath@gmail.com")&&(!password_verify($pw, $password))){
            
                $error4 = "wrongpassword";
                header("Location:login.php?err3=$error3&err4=$error4");

            
            //echo "Hii";
        }
        else if($password!=$pw&&!(($username=="testing@gmail.com" || $username=="satya@gmail.com"||$username=="sarath@gmail.com"))){
        	$error4 = "wrongpassword";
        	header("Location:login.php?err3=$error3&err4=$error4");
        }
        else{
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
        $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$id."')
        ";
        $statement = $conn->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $conn->insert_id;
            if($role == "student"){
                session_start();
                $_SESSION["uid"] = $id;
                header("Location:studentDashboard.php?sfgd=xyz");
                exit();    
            }else{
                session_start();
                $_SESSION["fid"] = $id;
                header("Location:facultyDashboard.php?sfgd=xyz");
                exit();
            }
            
        }
// echo mysqli_num_rows($result);
        
    


 

    }
    else
    {
    
        header("Location:login.php?sfgd=xyz");
        exit();
    }

?>
