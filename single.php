<?php 
include('tmpl/helper-loop-post.php');
get_header(); 
?>

	<div id="content">

		<?php do_action( 'bp_before_blog_single_post' ) ?>

		<div class="page" id="blog-single">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_ori_post_navigation(); ?>
				<?php the_ori_post_single(); ?>

			<?php comments_template(); ?>

			<?php endwhile; else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.', 'buddypress' ) ?></p>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_blog_single_post' ) ?>

	</div>

<?php 
get_footer();
