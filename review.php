<?php 
require 'includes/dbhandler.php';
require 'includes/header.php'; 
require 'includes/review-helper.php';
?>

<main>
<link rel="stylesheet" href="css/reviews.css">
<div class = "overlay">
    <div class ="container" align="center" style="max-width: 800px">
        <div class ="my-auto">
            <form id="review-form" action="includes/review-helper.php" method="post">
             <div class="form-group" style ="margin-top: 15px;">
                <h1>Rating</h1>
                <div class="slidecontainer">
                    <input type="range" min="1" max="10" value="1" class="slider" id="rating" name="rating">
                </div>
                <h1>Review</h1>
                <textarea class ="form-control" id="review-text" name ="review" cols="50" rows="3" placeholder="enter a comment...."></textarea>
                <input type = "hidden" name="item_id" value="<?php echo $_GET['id'];?>">
             </div>
                <div class="form-group">
                    <button class="btn btn-outline-danger" id="review-submit" name="review-submit" type="submit" style="width: 100%;">Review</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>
<script type="text/javascript">

var rateIndex = -1;
var id = <?php echo $_GET['id'];?>;
$(document).ready(function() {
    reset_star();

    if (localStorage.getItem('rating') != null) {
        setStars(parseInt(localStorage.getItem('rating')));
    }
    $('.star-rev').on('click', function() {
        rateIndex = parseInt($(this).data('index'));
        localStorage.setItem('rating', rateIndex);
    });
    $('.star-rev').mouseover(function() {
        reset_star();
        var currIndex = parseInt($(this).data('index'));
        setStars(currIndex);

    });
    $('.star-rev').mouseleave(function() {
        reset_star();

        if (rateIndex != -1) {
            setStars(rateIndex);
        }
    });


    function reset_star() {
        $('.star-rev').css('color', 'grey');
    }


    function setStars(max){
        for(var i=0; i < max; i++){
            $('.star-rev:eq('+i+')').css('color', 'goldenrod');
        }
        document.getElementById('rating').value = parseInt(localStorage.getItem('rating'));
        console.log(id);
    }

});
</script>
