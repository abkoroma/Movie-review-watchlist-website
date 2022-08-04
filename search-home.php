<?php 
require 'includes/dbhandler.php';
require 'includes/header.php'; 
?>

<link rel="stylesheet" type="text/css" href="css/search-style.css">
<body>
<h1>Website Title</h1>

<form class="form-inline justify-content-center" action="search.php" method="POST">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-light my-sm-0" type="submit" name="submit-search">Search</button>
</form>

<div class="media-container">
    <?php
        $sql = "SELECT * FROM movies ORDER BY release_date DESC";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
    
        if($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='media-box'>
                        <div class='card'>
                        <a href='reviews.php?id=".$row['media_id']."'>
                            <h2>".$row['title']."</h2>
                        </a>
                            <p>Director: ".$row['director']."</p>
                            <p>Lead Actor: ".$row['lead']."</p>
                            <p>Release Date: ".$row['release_date']."</p>
                        </div>                        
                    </div>";
            }
        }
    ?>
</div>
</body>
