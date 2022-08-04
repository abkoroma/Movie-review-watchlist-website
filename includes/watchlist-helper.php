<?php 


if(isset($_POST['watchlist-submit'])){

    require 'header.php';
    
    $title = $_POST['watchlist-name'];
    $item_id = $_POST['watchlist_id'];

    $sql = "SELECT wname FROM watchlists WHERE wname=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../watchlist.php?error=SQLInjection");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt,"s",$wname);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $check = mysqli_stmt_num_rows($stmt);

        if ($check > 0) {
            header("Location: ../watchlist.php?error=WatchlistNameTaken");
            exit();
        }
        else {
            $sql = "INSERT INTO watchlists (item_id, wname) ('$item_id', '$wname')";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../watchlist.php?error=SQLInjection");
                exit();
            }
            else {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                header("Location: ../watchlist.php?watchlist=success");
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

}
else {
    header("Location: ../watchlist.php");
    exit();
}