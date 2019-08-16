<?php // You can start editing here. ?>
<div class="comment_wrap">
	<?php if ( have_comments() ): ?>
		<h3 id="comments-title">
			<?php
			comments_number( __( '<span>No</span> Comments' ), __( '<span>One</span> Comment' ), __( '<span>%</span> Comments' ) );
			//echo "<pre>";
			//var_dump(wp_count_comments(get_the_ID()));
			?>
		</h3>
		<section class="commentlist">
			<?php
			wp_list_comments( array(
				'style'             => 'div',
				'short_ping'        => true,
				'avatar_size'       => 40,
				'type'              => 'all',
				'page'              => '',
				'per_page'          => '',
				'reverse_top_level' => null,
				'reverse_children'  => '',
			) );
			?>
		</section>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
			<nav class="navigation comment-navigation" role="navigation">
				<div class="comment-nav-prev btn "><?php previous_comments_link( __( 'Previous Comments' ) ); ?></div>
				<div class="comment-nav-next btn "><?php next_comments_link( __( 'More Comments' ) ); ?></div>
			</nav>
		<?php endif; ?>
		<?php if ( ! comments_open() ): ?>
			<p class="no-comments">
				<?php _e( 'Comments are closed.', 'bonestheme' ); ?>
			</p>
		<?php endif; ?>
	<?php endif; ?>
	<?php
	$title = is_user_logged_in() ? '<h2>Submit a Comment</h2><p>Your email address will not be published.</p>' : '<h2>Submit a Comment</h2><p>Your email address will not be published. Required fields are marked *</p>';
	$commenter = wp_get_current_commenter();
	$args = array(
		'fields'               =>
			array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
							'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
				'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
							'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
				'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
							'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
			),
		'comment_field'        => '<div class="comment-form-comment">' .
		                          '<textarea id="comment" name="comment" placeholder="Comment" cols="45" rows="8" aria-required="true"></textarea>' .
		                          '</div>',
		'comment_notes_after'  => '',
		'comment_notes_before' => '',
		'title_reply'          => $title,
		'class_submit'						 => 'button'
	);
	comment_form( $args, $post_id );
	?>
</div> <!-- End comment_wrap -->
