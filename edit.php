<?php
include "connect.php";
$id= $_GET['ID'];

$sql= "SELECT * FROM `crud` WHERE ID='$id' ";

$result=mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Students Data</title>
</head>
<body>

    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #A533FF";>
    UPDATE FORUM
    </nav>
    <h2 align="center"> Update student data</h2><br>
    <div class ="container d-flex justify-content-center" style="color:blue;">
    <form action="" method="post" style="width:50vw; min-width:300px;" onsubmit="valid(event)">
    <div class="row">
    <div class="col">
        <label class="form-label">Name:</label><br>
        <input type="text" class="form-control" value=" <?php echo $row['Name']?>" name="Name"  required size="30">
    </div>

    <div class="col">
        <label class="form-label">Roll No:</label><br>
        <input type="text" class="form-control" value="<?php echo $row['Roll_No']?>" name="Roll_No"  required size="30"><br>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Email:</label><br>
        <input type="text" class="form-control" value="<?php echo $row['Email']?>" name="Email" id="e" required size="84">
    </div>

    <div class="mb-3">
        <label class="form-label">Password:</label><br>
        <input type="password" class="form-control" name="Password" placeholder="Enter Password" size="84" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Mobile No:</label><br>
        <input type="text" class="form-control" name="Mobile_No" value="<?php echo $row['Mobile_No']?>" id="n" requiredsize="84">
    </div>

    <div class="form-group mb-3">
      <label> Grade:</label>&nbsp;
      <input type="radio" class="form-check-input" name="Grade" id="11" required value="11">
      <label for="11" class= "form-check-label">11</label>
      &nbsp;
      <input type="radio" class="form-check-input" name="Grade" id="12" value="12">
      <label for="12" class= "form-check-label">12</label>
     </div>

     <div>
        <button type="submit" class="btn btn-dark" name="submit">Update</button>
        <a href="index.php" class="btn btn-danger" name="cancel">Cancel</a>
</form>


<script type="text/javascript">

function valid(event) {
    let email = document.getElementById("e").value;
    let num = document.getElementById("n").value;

    let rege = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let regn = /^[9][87][0-9]{8}$/;

    if (rege.test(email)) {
        if (regn.test(num)) {
            return confirm("Confirm submission");
        } else {
            alert("Invalid mobile number");
        }
    } else {
        alert("Invalid email address");
    }

    event.preventDefault(); // Prevent the default form submission
    return false; // Prevent form submission if validation fails
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
    

</html>
<?php


if(isset($_POST['submit'])){
    $n=$_POST['Name'];
    $r=$_POST['Roll_No'];
    $e=$_POST['Email'];
    $p=$_POST['Password'];
    $m=$_POST['Mobile_No'];
    // Check if the 'Grade' key exists in $_POST
    $l = isset($_POST['Grade']) ? $_POST['Grade'] : null;

    // Your SQL update query
    $sql=" UPDATE `crud` SET `Name`='$n',`Roll_No`='$r',`Grade`='$l',`Email`='$e',`Password`='$p',`Mobile_No`='$m' WHERE ID='$id'";   

    $result=mysqli_query($conn,$sql);

    if($result){
        // Redirect to index.php on successful update
        header("Location: index.php");
        exit();
    } else {
        echo "Update failed";
    }
}
?>