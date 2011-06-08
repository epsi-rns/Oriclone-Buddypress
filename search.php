<?php 
include('tmpl/helper-loop-post.php');
get_header(); 
?>

	<div id="content">

		<?php do_action( 'bp_before_blog_search' ) ?>

		<div class="page" id="blog-search">
			<?php if (have_posts()) : ?>

				<h3 class="pagetitle"><?php _e( 'Search Results', 'buddypress' ) ?></h3>

				<?php the_ori_posts_navigation(); ?>

				<?php while (have_posts()): ?>
					<?php the_ori_post_search(); ?>				
				<?php endwhile; ?>

				<?php /* the_ori_pagination(); */ ?>

			<?php else : ?>

				<h2 class="center"><?php _e( 'No posts found. Try a different search?', 'buddypress' ) ?></h2>
				<?php locate_template( array( '/searchform.php'), true ) ?>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_blog_search' ) ?>

	</div>

<?php 
get_footer();
