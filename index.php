<?php 
include('tmpl/helper-loop-post.php');
get_header(); 
?>

	<div id="content">

		<?php do_action( 'bp_before_blog_home' ) ?>

		<div class="page" id="blog-latest">
			<?php if ( have_posts() ) : ?>

				<?php while (have_posts()) : ?>
				<?php the_ori_post_index($post); ?>
				<?php endwhile; ?>

				<?php the_ori_pagination(); ?>

			<?php else : ?>

				<h2 class="center"><?php _e( 'Not Found', 'buddypress' ) ?></h2>
				<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'buddypress' ) ?></p>

				<?php locate_template( array( 'searchform.php' ), true ) ?>

			<?php endif; ?>
		</div>

		<?php do_action( 'bp_after_blog_home' ) ?>

	</div>

<?php 
get_footer();
