<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fame</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
<?php
$con = mysqli_connect("localhost","root","","fame");
$sql = "select * from details ";
$q = mysqli_query($con,$sql);
$n = mysqli_num_rows($q);
$i=0;
while($i<$n){
while($row=mysqli_fetch_assoc($q)) {
$name = $row["fname"];
$age = $row["age"];
$add = $row["address"];
$src = $row["img"];
$id= $row["sid"];
?>

        <div class="col-md-4">
             <div class="card" style="width:400px">
                <img class="card-img-top" src="<?php echo $src; ?>" alt="Card image" style="width:100%">
                     <div class="card-body">
                         <p class="card-title">Name: <?php echo $name; ?></p>
                         <p class="card-title">Age: <?php echo $age; ?></p>
                         <p class="card-title">Address: <?php echo $add; ?></p>
                         <button id="<?php echo $id;?>" class="btn btn-info btn-xs view_data">Open </button>
                     </div>
                </div>
        </div>

    <br>
    <?php $i++;
    }
    }?>
</div>
</div>

</body>
</html>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var employee_id = $(this).attr("id");
            $.ajax({
                url:"fame2.php",
                method:"post",
                data:{employee_id:employee_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    });
</script>

