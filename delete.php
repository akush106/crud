<?php
include "connect.php";
$id= $_GET['ID'];

$sql = "DELETE FROM `crud` WHERE ID=$id";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: index.php?msg=Record deleted succesfully");
    ?>
    <meta http-equiv="refresh" content="0; url = http://localhost/crud/"/>
    <?php
}
else{
    echo "Records Failed to Delete. Error: " . mysqli_error($conn);
}
?>
