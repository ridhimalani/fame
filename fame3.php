<?php
$id=$_POST["id"];
$n=$_POST["name"];
$age=$_POST["age"];
$add=$_POST["add"];
$con = mysqli_connect("localhost","root","","fame");
$sql = "update details set fname = '$n', age ='$age',address ='$add' where sid='$id' ; ";
$q= mysqli_query($con,$sql);
if($q) {
    header('Location: fame1.php?msg=1');
}
else {
    header('Location: fame1.php?msg=2');
}