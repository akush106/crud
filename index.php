<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Students Data</title>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete the data?');
        }
    </script>

</head>
<body style="background-image: url('bgimg.jpg');" >

    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #A533FF;">
        Student Data 
    </nav>

  
    <div class="container ">
        <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
          '.$msg.' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
          </div>';
        }
        ?>
          <a href="addnew.php" class="btn btn-dark mb-3"> ADD </a>
        <table class="table table-hover text-center  ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">S No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Roll No</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connect.php";
                $sql="SELECT * FROM `crud`";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td><?php echo $row['ID']?></td>
                    <td><?php echo $row['Name']?></td>
                    <td><?php echo $row['Roll_No']?></td>
                    <td><?php echo $row['Grade']?></td>
                    <td><?php echo $row['Email']?></td>
                    <td><?php echo $row['Mobile_No']?></td>
                    <td>
                    <a href="edit.php?ID=<?php echo $row['ID']  ?>"> <button type="button" class="btn btn-primary"> Edit</button></a>
                   <a href="delete.php?ID=<?php echo $row['ID'] ?>">
    <button type="button" class="btn btn-primary" onclick="return confirmDelete()">Delete</button></a>

                
                    </td>
                </tr>
                
                <?php
                }
                ?>
                
            </tbody>
        </table>
    </div>
        
    

</body>
</html>