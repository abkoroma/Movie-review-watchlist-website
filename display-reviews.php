<?php

$servename = "localhost";
$DBuname = "root";
$DBPass = "mysql123";
$DBname = "cs230project";

$conn = mysqli_connect($servename, $DBuname, $DBPass, $DBname);

if (!$conn) {
    die("Connection failed...".mysqli_connect_error());
    # code...
}
    $item_id = $_GET['id'];
    $sql = "SELECT * FROM reviews WHERE item_id='$item_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $uname = $row['uname'];

            echo '
            <div class="card mx-auto" style="width: 100%; padding: 10px; margin-top: 30px;";
                <div class="media">
                    <div class = "media-body">
                        <h4 class="mt-0">'.$row['uname'].'</h4>
                        <h5 class="mt-0">'.$row['rating'].'   /   10</h5> 
                        <p>'.$row['rev_date'].'</p>
                        <p>'.$row['review_text'].'</p>
                </div>    
            </div>
            ';
        }
    }

else{
    echo '<h5 style="text-align:center">No reviews, yet! Be the first! </h5>';
}
