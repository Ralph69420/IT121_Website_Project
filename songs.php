<?php include('connection.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>Songs</title>
        <link rel="shortcut icon" type="x-icon" href="img/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>
      <?php require('navbar.php');?>

      <!-- DROPDOWN BUTTON FOR SONGS -->
      <div class="dropdown">
        <button onclick="dropdown()" class="dropbtn">&#9776; Track List</button>
        <div id="myDropdown" class="dropdown-content">
          <input type="text" id="mySearch" class="searchBar" onkeyup="searchBar()" placeholder="Search a title.." size="50">
          <?php 
          $sql = "SELECT * FROM songs";
          $result = mysqli_query($conn, $sql);
            if($result) {
              while($row = mysqli_fetch_assoc($result)) {?>
                <li><a href="songs.php?track=<?php echo $row['id']?>"><?php echo $row['title']?></a></li>
          <?php }
            }else {
              echo '<script>alert("No Record Found");</script>';
            }?>
        </div>
      </div>
      
      <!-- THIS WILL SET THE ID OF THE CURRENT PAGE -->
      <?php
      if(ISSET($_GET['track'])) {
        $track = $_GET['track'];
      }else {
        $track=null;
      }
      $sql = "SELECT * FROM songs WHERE id='$track'";
      $result = mysqli_query($conn, $sql);
        if($result) {
          while($row = mysqli_fetch_assoc($result)) { ?>


          <!-- DELETE BUTTON FUNCTION WILL SHOW UP AFTER SELECTING SONG -->
          <button class="Button" onclick="document.getElementById('id01').style.display='block'" style="float:right">
            Delete
          </button>
          <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
            <form class="modal-content" action="delete.php" method="POST">
              <div class="containermodal">
                <h1>Deleting Song...</h1>
                <h2>Are you sure you want to delete this song?</h2>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="Button">Cancel</button>
                <input type="hidden" name="deleteId" value="<?php echo $track;?>">
                <input type="submit" name="deleteData" value="Delete" class="Buttonconfirm">
              </div>
            </form>
          </div>

          

          
          <!-- BODY SECTION -->
          <div class="container">
            <div class="row">

              <!-- EDIT BUTTON THAT WILL SEND CURRENT PAGE ID FOR UPDATING DETAILS -->
              <form action="edit.php" method="POST">
                <input type="hidden" name="editId" value="<?php echo $track;?>">
                <input type="submit" name="editThis" value="&#9776; Edit" class="Button">
              </form>

              <div class="column side">
                <b>Romaji</b><br><br><?php echo $row['lyrics'];?>
              </div>

              <div class="column side">
                <b>English</b><br><br><?php echo $row['english'];?>
              </div>

              <div class="column middle">
                <p><b>Title:</b>     <?php echo $row['title'];?> </p>
                <p><b>Artist:</b>    <?php echo $row['artist'];?> </p>
                <p><b>Album:</b>     <?php echo $row['album'];?> </p>
                <div class="video"><?php echo $row['link'];?></div>

                <div class="row">
                  <div class="column">
                  
                  </div>
                </div>
              </div>
            
            </div>

          </div>

          <?php }
        }else {
            echo '<script>alert("No Record Found");</script>';
        }?>
      
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
      <script src="script.js"></script>
    </body>

    <div class="footer">
      <i>© 2022 BOCCHI THE ROCK! ANIME</i>
    </div>
</html>