<?php include('connection.php');?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Song</title>
    <link rel="shortcut icon" type="x-icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php require('navbar.php');?>
<?php
    if(ISSET($_POST['addData'])) {
        $title = $_POST['title'];
        $artist = $_POST['artist'];
        $album = $_POST['album'];
        $link = $_POST['link'];
        $lyrics = $_POST['lyrics'];
        $english = $_POST['english'];

        $sql = "INSERT INTO songs(title, artist, album, link, lyrics, english)
                VALUES ('$title', '$artist', '$album', '$link', '$lyrics', '$english')";
        $result = mysqli_query($conn, $sql);

        if($result) {
             echo '<script>alert("New song added!");</script>';
             header('Location:songs.php');

        }
        else {
            echo '<script>alert("Not added :^C");</script>';
        }
    }
?>
<div class="container">
    <div class="row">
        <div class="column about">
            <h2 class="h2 center">Adding a New Song...
                <div style="float:left"><a class="Button " href="songs.php">Cancel</a></div>
            <h2>
            <form method="POST" action="" class="add">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" size="50" placeholder="Title (required)" required><br>

                <label for="artist">Artist:</label>
                <input type="text" name="artist" id="artist" size="50" placeholder="Artist (required)" required><br>

                <label for="album">Album:</label>
                <input type="text" name="album" size="50" placeholder="Album Name"><br>

                <label for="link">Embed Video:</label>
                <textarea name="link" id="link" placeholder="Embed a Youtube video here.." maxlength="1000" rows="10" cols="40"></textarea><br>

                <label for="lyrics">Romaji Lyrics:</label>
                <textarea name="lyrics" id="lyrics" placeholder="Romaji lyrics here.." maxlength="2000" rows="10" cols="40"></textarea><br>

                <label for="english">English Lyrics:</label>
                <textarea name="english" id="english" placeholder="English lyrics here.." maxlength="2000" rows="10" cols="40"></textarea><br>

                <input type="submit" name="addData" value="Confirm" class="Buttonconfirm" style="float:right">
                
            </form>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>