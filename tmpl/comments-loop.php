
<?php if ( have_comments() ) : ?>

	<div id="comments">
		<?php
		$numTrackBacks = 0; $numComments = 0;
		foreach ( (array)$comments as $comment ) 
			if ( get_comment_type() != "comment") 
				$numTrackBacks++; 
			else $numComments++;
		?>

		<span class="title">&#8220;<?php the_title() ?>&#8221;</span>
		<h3 id="comments"><?php comments_number( 'No Comments', 'One Comment', $numComments . ' Comments' );?></h3>
		<?php do_action( 'bp_before_blog_comment_list' ) ?>

		<ol class="commentlist">
			<?php wp_list_comments(); ?>
		</ol><!-- .comment-list -->

		<?php do_action( 'bp_after_blog_comment_list' ) ?>

		<?php if ( get_option( 'page_comments' ) ) : ?>
			<div class="comment-navigation paged-navigation">
				<?php paginate_comments_links(); ?>
			</div>

		<?php endif; ?>

	</div><!-- #comments -->

<?php else : ?>

	<?php if ( pings_open() && !comments_open() && is_single() ) : ?>
		<p class="comments-closed pings-open">
			<?php printf( __('Comments are closed, but <a href="%1$s" '
				.'title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', 
				'buddypress'), trackback_url( '0' ) ); ?>
		</p>

	<?php elseif ( !comments_open() && is_single() ) : ?>
		<p class="comments-closed">
			<?php _e('Comments are closed.', 'buddypress'); ?>
		</p>

	<?php endif; ?>

<?php endif; ?>
