<?php get_header(); ?>
<div class="content inner-page">
    <div class="container">
        <div class="breadcrumbs separator">
            <?php
            if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
            <?php /*<a href="#">Home</a> > <a href="#">Freestanding Bathtubs</a> > <span>Freestanding Bathtub BW-01-L</span> */ ?>
        </div>
        <h2>News & Press about our Bathtubs and Sinks</h2>
        <div class="news-press flex">
          <?php loadMoreNewsPress_ajax(); ?>
        </div>
    </div>
</div>
<div class="pusher"></div>
</div>
<?php get_footer(); ?>
