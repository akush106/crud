<?php
include "connect.php";

if(isset($_POST['submit'])){
    $n=$_POST['Name'];
    $r=$_POST['Roll_No'];
    $g=$_POST['Grade'];
    $e=$_POST['Email'];
    $p=$_POST['Password'];
    $m=$_POST['Mobile_No'];
    
    $sql = "INSERT INTO `crud`(`Name`, `Roll_No`, `Grade`, `Email`,`Password`, `Mobile_No`) 
    VALUES ('$n', '$r', '$g', '$e','$p', '$m')";

    $result=mysqli_query($conn,$sql);

    if($result){
        header("Location: index.php?msg=New record created succesfully");
    }
    else{
        echo "failed:".mysqli_error($conn);
    }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>REGISTRATION FORUM</title>
</head>
<body >

    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #A533FF";>
        Student Data Entry and Login Forum
    </nav>
    <h2 align="center"> Add student data by filling  the form below</h2><br>
    <div class ="container d-flex justify-content-center" style="color:blue;">

    <form action="" method="post" style="width:50vw; min-width:300px;" onsubmit="valid(event)" >

    <div class="row">
    <div class="col">
        <label class="form-label">Name:</label><br>
        <input type="text" class="form-control" name="Name" placeholder="Enter Name" size="30" is="uname" required>
    </div>

    <div class="col">
        <label class="form-label">Roll No:</label><br>
        <input type="text" class="form-control" name="Roll_No" placeholder="Enter Roll No" size="30" required><br>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Email:</label><br>
        <input type="text" class="form-control" name="Email" placeholder="name@gmail.com" size="84" id="e" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password:</label><br>
        <input type="password" class="form-control" name="Password" placeholder="Enter Password" size="84" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Mobile No:</label><br>
        <input type="text" class="form-control" name="Mobile_No" placeholder="contactinfo" id="n" size="84" required>
    </div>

    <div class="form-group mb-3">
      <label> Grade:</label>&nbsp;
      <input type="radio" class="form-check-input" name="Grade" id="11" value="11" required>
      <lable for="11" class= "form-check-label">11</lable>
      &nbsp;
      <input type="radio" class="form-check-input" name="Grade" id="12" value="12"required>
      <lable for="12" class= "form-check-label">12</lable>
     </div>


     <div>
        <button type="submit" class="btn btn-dark" name="submit">ADD</button>
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




    
</body>
</html>