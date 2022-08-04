<?php 

include 'dbhandler.php';

$id = $_GET['id'];

$sqlAvg = "SELECT AVG(rating) AS AVGRATE FROM reviews WHERE item_id='$id' ORDER BY rev_date DESC";
$sqlCount = "SELECT count(rating) AS Total from reviews WHERE item_id='$id'";
$query = mysqli_query($conn, $sqlAvg);
$row = mysqli_fetch_array($query);

$query2 = mysqli_query($conn, $sqlCount);
$row2 = mysqli_fetch_array($query2);

$avg = round($row['AVGRATE'],1);

echo '
<div class="container" style= "text-align:center">
    <h1>'.$avg.' / 10</h1>
    <p>Number of Ratings: '.round($row2['Total'],1).'</p>
</div>
';

