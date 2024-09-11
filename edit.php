<?php include('connection.php');?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Song</title>
    <link rel="shortcut icon" type="x-icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php require('navbar.php');?>
<?php
    if(ISSET($_POST['editThis'])) {
        $editId = $_POST['editId'];
      
        $sql = "SELECT * FROM songs WHERE id='$editId'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="container">
                <div class="row">
                    <div class="column about">
                        <h2 class="h2 center">Editing Track Details...
                            <div style="float:left"><a class="Button " href="songs.php?track=<?php echo $editId;?>">Back</a></div>
                        <h2>
                        <form action="" method="POST" id="edit">
                            <label for="title">Title:</label>
                            <textarea form="edit" name="title" id="title" placeholder="Title..." maxlength="100" rows="1" cols="40" required><?php echo $row['title'];?></textarea><br>

                            <label for="artist">Artist:</label>
                            <textarea form="edit" name="artist" id="artist" placeholder="Artist..." maxlength="100" rows="1" cols="40" required><?php echo $row['artist'];?></textarea><br>

                            <label for="album">Album:</label>
                            <textarea form="edit" name="album" id="album" placeholder="Album Name..." maxlength="100" rows="1" cols="40"><?php echo $row['album'];?></textarea><br>

                            <label for="link">Embed Video:</label>
                            <textarea form="edit" name="link" id="link" placeholder="Embed a Youtube video here.." maxlength="1000" rows="10" cols="40"><?php echo $row['link'];?></textarea><br>

                            <label for="lyrics">Romaji Lyrics:</label>
                            <textarea form="edit" name="lyrics" id="lyrics" placeholder="Romaji lyrics here.." maxlength="2000" rows="10" cols="40"><?php echo $row['lyrics'];?></textarea><br>

                            <label for="english">English Lyrics:</label>
                            <textarea form="edit" name="english" id="english" placeholder="English lyrics here.." maxlength="2000" rows="10" cols="40"><?php echo $row['english'];?></textarea><br>

                            <input type="hidden" name="updateId" value="<?php echo $editId;?>">
                            <input type="submit" name="editData" value="UPDATE" class="Buttonconfirm" style="float:right">
                        </form>
                    </div>
                </div>
            </div>

            <?php }
        }
    }
?>
<!-- BELOW IS THE UPDATE SQL -->
<?php
    if(ISSET($_POST['editData'])) {
        $updateid = $_POST['updateId'];
        $title = $_POST['title'];
        $artist = $_POST['artist'];
        $album = $_POST['album'];
        $link = $_POST['link'];
        $lyrics = $_POST['lyrics'];
        $english = $_POST['english'];

        $sql = "UPDATE songs SET title='$title', artist='$artist', album='$album', link='$link', lyrics='$lyrics', english='$english' 
                WHERE id='$updateid'";
        $result = mysqli_query($conn, $sql);

        if($result) {
             echo '<script>alert("Data Updated Successfully.");</script>';
             header('Location:songs.php?track='.$updateid);
        }
        else {
            echo '<script>alert("Data Not Updated.");</script>';
        }
    }
?>

<script src="script.js"></script>
</body>
</html>