<?php get_header(); /* Template Name: Reviews */ ?>
<div class="content inner-page reviews">
    <div class="container">
        <div class="reviews-logo"><img src="<?php echo theme();?>/img/houz.png" alt="houzz"></div>
        <div class="reviews-body">
            <div class="reviews-head">
                <h5>Reviews for <strong> Badeloft</strong></h5>
                <div class="rank flex">
                    <img src="<?php echo theme();?>/img/stars.png" alt="stars"><a href="https://www.houzz.com/browseReviews/tgk2180"
                                                       target="_blank">See all Reviews ></a>
                </div>
            </div>
            <?php foreach ($reviews = get_field('reviews') as $re) {
                echo '<div class="item">' . $re['content_rew'] . '<a href="' . $re['link_rew'] . '" target="_blank">Read more...</a></div>';
            } ?>
            <div class="reviews-bottom flex">
                <div class="left">
                    <img src="<?php echo theme();?>/img/houz1.png" alt="houzz">
                </div>
                <div class="right">
                    <a href="https://www.houzz.com/browseReviews/tgk2180" target="_blank">See All Reviews</a>
                    <a href="https://www.houzz.com/writeReview2/cmd=r/n=tgk2180" target="_blank">Review Me</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pusher"></div>
<?php get_footer(); ?>
