<?php get_header(); /* Template Name: Video */ ?>
<div class="content inner-page">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="video-box flex separator">
            <a class="big-vid" data-fancybox href="<?php the_field('main_video'); ?>"><img src="<?php $mvc = get_field('main_video_cover'); echo $mvc['url']; ?>" alt="<?php echo $mvc['alt']; ?>"></a>
            <?php if ($side_videos = get_field('side_videos')) { ?>
                <div class="videos-scroll default-skin">
                    <?php foreach ($side_videos as $side_vids) { ?>
                      <?php
                      $vid = $side_vids['video_link'];
                      $vid_ex = explode("v=",$vid);
                      $imgurl = 'http://img.youtube.com/vi/'.$vid_ex[1].'/0.jpg';
                      $imgurl = (@file_get_contents($imgurl))?$imgurl:'http://img.youtube.com/vi/'.$vid_ex[1].'/maxresdefault.jpg';
                      ?>
                      <?php echo $side_vids['video_cover']; ?>
                        <a data-fancybox href="<?php echo $side_vids['video_link']; ?>"><img src="<?php echo $side_vids['video_cover'] != null ? $side_vids['video_cover']['url'] : $imgurl ;?>" alt="<?php echo $side_vids['video_cover']['alt'] ?>"><div class="v-title"><?php echo $side_vids['video_title']; ?></div></a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php if ($tables_download = get_field('tables_download')) { ?>
            <div class="v-downloads">
                <?php foreach ($tables_download as $tab_down) { ?>
                    <h3><?php echo $tab_down['table_block_title']; ?></h3>
                    <div class="table-box">
                        <table>
                            <tr>
                                <th><?php echo $tab_down['table_product_type_title']; ?></th>
                                <th><?php echo $tab_down['table_download_title']; ?></th>
                                <th><?php echo $tab_down['table_product_type_title']; ?></th>
                                <th><?php echo $tab_down['table_download_title']; ?></th>
                                <th rowspan="8"><img src="<?php echo $tab_down['table_image']['url']; ?>" alt="<?php echo $tab_down['table_image']['alt']; ?>"></th>
                            </tr>

                            <?php if ($table_row = $tab_down['table_content']) { ?>
                                <?php foreach ($table_row as $tabr) { ?>
                                    <tr>
                                        <?php if ($tabr['first_product_title_table']) { ?><td><?php echo $tabr['first_product_title_table']; ?></td><?php } ?>
                                        <?php if ($tabr['first_download_column_table']) { ?><td><a class="alt-download-doc alt-pdf" href="<?php echo $tabr['first_download_column_table']; ?>" target="_blank">Download </a></td><?php } ?>
                                        <?php if ($tabr['second_product_title_table']) { ?><td><?php echo $tabr['second_product_title_table']; ?></td><?php } ?>
                                        <?php if ($tabr['second_download_column_table']) { ?><td><a class="alt-download-doc alt-pdf" href="<?php echo $tabr['second_download_column_table']; ?>" target="_blank">Download </a></td><?php } ?>
                                    </tr>
                                <?php } ?>
                            <?php } ?>


                        </table>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>
