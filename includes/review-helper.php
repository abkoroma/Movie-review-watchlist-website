<?php 
require_once 'dbhandler.php';
date_default_timezone_set('UTC');

if(isset($_POST['review-submit'])){
    session_start();
    $uname = $_SESSION['username'];
    $rating = $_POST['rating'];
    $date = date('Y-m-d H:i:s');
    $review = $_POST['review'];
    $item_id = $_POST['item_id'];


    $sql = "INSERT INTO reviews (item_id, uname, rating, review_text, rev_date,  status) VALUES ('$item_id','$uname','$rating','$review','$date',1);";
    $stmt = mysqli_stmt_init($conn);
    $result = $conn->query($sql);
    header("Location: ../reviews.php?id=$item_id");
}
