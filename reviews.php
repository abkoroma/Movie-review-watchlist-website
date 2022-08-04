<?php 
require 'includes/dbhandler.php';
require 'includes/header.php'; 
require 'includes/review-helper.php';
?>

<main>
<link rel="stylesheet" href="css/reviews.css">
<div class = "overlay">
    <span id="testAvg"></span>
    <div class = "container" align="center" style="max-width: 800px">
        <div class ="my_auto">
            <h1>Reviews</h1>
        <div class="gallery-container">
            <a href = "review.php?id=<?php echo $_GET['id'];?>"
                <button>Create Review</button>
        </a>
        </div>
    </div>
    <span id="review_list"></span>
</div>
</main>
<script type="text/javascript">

var id = <?php echo $_GET['id'];?>;
$(document).ready(function() {

    // get reviews
    xhr_getter('display-reviews.php?id=', "review_list");

    //avg()
    xhr_getter('includes/get-ratings.php?id=', "testAvg");

   
    //Used to interchangeably send GET requests for review display data. 
    function xhr_getter(prefix, element){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById(element).innerHTML = this.responseText;
            }
        };
        url = prefix+id;
        xhttp.open("GET", url, true);
        xhttp.send();
    }

});
</script>