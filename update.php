<?php
include_once 'dbConnection.php';
session_start();
$email='sarathchandhra365@gmail.com';



//remove quiz
if(isset($_SESSION['fid'])){
if(@$_GET['q']== 'rmquiz' && isset($_SESSION['fid']) && isset($_SESSION['qcid'])){
$cid = $_SESSION['qcid'];
$eid=@$_GET['eid'];
$result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];
$r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
}
$r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error');

header("location:dash.php?cid=$cid&q=5");
}
}

//add quiz

if(@$_GET['q']== 'addquiz'&&isset($_SESSION["fid"])) {
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$total = $_POST['total'];
$right = $_POST['right'];
$wrong = $_POST['wrong'];
$time = $_POST['time'];
//$tag = $_POST['tag'];
$desc = $_POST['desc'];
$id=uniqid();
$cid = $_SESSION["qcid"];
$q3=mysqli_query($con,"INSERT INTO quiz VALUES  ('$id','$name' , '$right' , '$wrong','$total','$time' ,'$desc', NOW(),'$cid')");

header("location:dash.php?cid=$cid&q=4&step=2&eid=$id&n=$total");
}


//add question

if(@$_GET['q']== 'addqns' && isset($_SESSION["fid"]) ) {
$n=@$_GET['n'];
$eid=@$_GET['eid'];
$ch=@$_GET['ch'];

for($i=1;$i<=$n;$i++)
 {
 $qid=uniqid();
 $qns=$_POST['qns'.$i];
$q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

 }
 $cid = $_SESSION['qcid'];
header("location:dash.php?cid=$cid&q=0");
}


//quiz start
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$cid = 1;
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$ans=$_POST['ans'];
$qid=@$_GET['qid'];
$q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
while($row=mysqli_fetch_array($q) )
{
$ansid=$row['ansid'];
}
if($ans == $ansid)
{
$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
while($row=mysqli_fetch_array($q) )
{
$sahi=$row['correct'];
}
if($sn == 1)
{
$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW(),$cid)")or die('Error');
}
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' ")or die('Error115');

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['correct'];
}
$r++;
$s=$s+$sahi;
$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');

} 
else
{
$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

while($row=mysqli_fetch_array($q) )
{
$wrong=$row['wrong'];
}
if($sn == 1)
{
$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW(),$cid )")or die('Error137');
}
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
}
$w++;
$s=$s-$wrong;
$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');
}
if($sn != $total)
{
$sn++;
header("location:account.php?cid=1&q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
}
else if( $sn>=$total)
{
$q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{

$q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW(),$cid)")or die('Error165');
}
else
{
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$s+$sun;
$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
}
header("location:account.php?cid=1&q=result&eid=$eid");
}
else
{
header("location:account.php?cid=1&q=result&eid=$eid");
}
}

//restart quiz
// if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
// $eid=@$_GET['eid'];
// $n=@$_GET['n'];
// $t=@$_GET['t'];
// $q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
// while($row=mysqli_fetch_array($q) )
// {
// $s=$row['score'];
// }
// $q=mysqli_query($con,"DELETE FROM `history` WHERE eid='$eid' AND email='$email' " )or die('Error184');
// $q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
// while($row=mysqli_fetch_array($q) )
// {
// $sun=$row['score'];
// }
// $sun=$sun-$s;
// $q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
// header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
// }

//header("Location:login.php");

?>



