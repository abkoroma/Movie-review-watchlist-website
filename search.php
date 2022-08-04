<?php 
require 'includes/dbhandler.php';
require 'includes/header.php'; 
?>

<link rel="stylesheet" type="text/css" href="css/search-style.css">

<div class="media-container">
<?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM movies WHERE title LIKE '%$search%'  
                    OR screenwriter LIKE '%$search%'
                    OR cinematographer LIKE '%$search%'
                    OR lead LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if($queryResult > 0) {
            if($queryResult == 1) {
                echo "<p>There is " .$queryResult. " result.<p>";
            }
            else{
                echo "There are " .$queryResult. " results.";
            }

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
        else {
            echo "No Results Found";
        }
    }
?>
</div>
