<?php 
include('tmpl/helper-loop-post.php');
get_header(); 
?>

	<div id="content">

		<?php do_action( 'bp_before_archive' ) ?>

		<div class="page" id="blog-archives">
			<?php if ( have_posts() ) : ?>

				<h3><?php printf( 
					__( 'You are browsing the archive for %1$s.', 'buddypress' ), 
					wp_title( false, false ) ); ?></h3>

				<?php the_ori_posts_navigation(); ?>
				<div class="clear"></div>

				<?php while (have_posts()): ?>
					<?php the_ori_post_archive(); ?>
				<?php endwhile; ?>

				<?php the_ori_pagination(); ?>

			<?php else : ?>

				<h2 class="center"><?php _e( 'Not Found', 'buddypress' ) ?></h2>
				<?php locate_template( array( 'searchform.php' ), true ) ?>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_archive' ) ?>

	</div>

<?php 
get_footer();
