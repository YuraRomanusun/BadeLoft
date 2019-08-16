<?php get_header(); /* Template Name: Delivery */ ?>
<div class="content inner-page">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="two-columns flex delivery">
            <div class="column left">
                <?php the_field('shipping_cost_del'); ?>
            </div>
            <div class="column right">
                <?php the_field('delivery_times_del'); ?>
            </div>
        </div>
        <div class="two-columns flex delivery-table">
            <div class="column">
                <table>
                    <tr>
                        <th><?php the_field('first_column_title_del_left'); ?></th>
                        <th><?php the_field('second_column_title_del_left'); ?></th>
                        <th>
                            <?php the_field('third_column_title_del_left'); ?>
                        </th>
                    </tr>
                    <?php if ($table_rows_del_left = get_field('table_rows_del_left')) { ?>
                        <?php foreach ($table_rows_del_left as $trdl) { ?>
                            <tr>
                                <td><?php echo $trdl['first_column_del_left']; ?></td>
                                <td>
                                    <?php echo $trdl['second_column_del_left']; ?>
                                </td>
                                <td>
                                    <?php echo $trdl['third_column_del_left']; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
                <?php the_field('shipping_cost_bottom_del'); ?>
            </div>
            <div class="column">
                <table>
                    <tr>
                        <th><?php the_field('first_column_title_del_right'); ?></th>
                        <th><?php the_field('second_column_title_del_right'); ?></th>
                        <th>
                            <?php the_field('third_column_title_del_right'); ?>
                        </th>
                    </tr>
                    <?php if ($table_rows_del_right = get_field('table_rows_del_right')) { ?>
                        <?php foreach ($table_rows_del_right as $trdr) { ?>
                            <tr>
                                <td><?php echo $trdr['first_column_del_right']; ?></td>
                                <td><?php echo $trdr['second_column_del_right']; ?></td>
                                <td><?php echo $trdr['third_column_del_right']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

