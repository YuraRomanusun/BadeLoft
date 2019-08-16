<?php get_header();
$queryname = __('Sorry, posts not found');
$allsearch = new WP_Query("s=$s&showposts=-1");
$queryname = 'We found ' . $allsearch->post_count . ' results for the search "' . esc_html($s, 1) .'"';
wp_reset_query();
?>

<div class="content inner-page search-page">
	<div class="container">
		<h2>Search Results</h2>
		<div class="rel-prod four-prods">
			<?php if($queryname) echo '<h3>'. $queryname. '</h3>'; ?>
			<div class="search_posts flex">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="searchpost">
						<a class="thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog');?></a>
						<div class="info_wrap">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p>
								<?php echo wp_trim_words(get_the_content(), 23, ''); ?>
								<span class="rm">
                  					<a href="<?php the_permalink(); ?>">Read More >></a>
              					</span>
							</p>
						</div>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<div class="pag-alc">
			<?php if(function_exists('wp_pagenavi')){
				wp_pagenavi();
			} ?>
		</div>

	</div>
</div>
<?php get_footer(); ?>
