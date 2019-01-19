<?php
$iid=$_POST["employee_id"];
$con = mysqli_connect("localhost","root","","fame");
$sql = "select * from details WHERE sid='$iid'";
$q = mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($q)) {
        $name = $row["fname"];
        $age = $row["age"];
        $add = $row["address"];
    }
        ?>
<form method="post" action="fame3.php">
<label for="email"><b>Name</b></label>
      <input type="text"  name="name" value="<?= $name;?>">

      <label for="psw"><b>Age</b></label>
      <input type="text" name="age" required value="<?= $age;?>">

      <label for="psw-repeat"><b>Address</b></label>
      <input type="text" name="add" value="<?= $add;?>">
    <input type="hidden" value="<?php echo $_POST["employee_id"];?>" name="id">
    <br>
    <input type="submit" name="Update">
</form>