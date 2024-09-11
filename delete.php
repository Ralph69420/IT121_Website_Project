<?php
    include('connection.php');

    if(ISSET($_POST['deleteData'])) {
        $id = $_POST['deleteId'];

        $sql = "DELETE FROM songs WHERE id='$id' ";
        $result = mysqli_query($conn, $sql);

        if($result) {
             echo '<script>alert("Data Deleted.");</script>';
             header('Location:songs.php');

        }else {
            echo '<script>alert("Data Not Deleted.");</script>';
        }
        
    }
?>