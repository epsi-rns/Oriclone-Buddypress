<?php 
include('tmpl/helper-loop-post.php');
get_header(); 
?>

	<div id="content" class="narrowcolumn">

		<?php do_action( 'bp_before_blog_page' ) ?>

		<div class="page" id="blog-page">
			<?php if (have_posts()) : while (have_posts()): ?>
			<?php the_ori_post_page(); ?>
			<?php endwhile; endif; ?>

		</div>

		<?php do_action( 'bp_after_blog_page' ) ?>

	</div>

<?php 
get_footer();
