<?php
include_once('helper-blog.php');

function the_ori_post_index(&$post)
{
	the_post();
	$readmore = __( 'Read the rest of this entry &rarr;', 'buddypress' );
	do_action( 'bp_before_blog_post' ); 
?>
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<?php the_ori_calendar_icon(); ?>
		<?php the_ori_title(); ?>
		<?php the_ori_author(); ?>
		
		<div class="entry">
			<?php the_content( $readmore ); ?>
		</div>				
		<?php the_ori_postmetadata(); ?>
	</div>
<?php 
	do_action( 'bp_after_blog_post' ); 
}

function the_ori_post_archive()
{
	the_post();
	do_action( 'bp_before_blog_post' ); 
?>
	<div <?php post_class('post-bg-'.the_time('m')) ?>>
		<?php the_ori_avatar(); ?>
		<div class="pane">
			<?php the_ori_title(); ?>
			<small><?php the_time('l, F jS, Y') ?></small>
		</div>
		
		<div class="entry">
			<?php the_content() ?>
		</div>
		<?php the_ori_postmetadata(); ?>
	</div>
<?php 
	do_action( 'bp_after_blog_post' ); 
}

function the_ori_post_single()
{
	do_action( 'bp_before_blog_post' );
?>
	<div <?php post_class('post-bg-'.the_time('m')) ?> id="post-<?php the_ID(); ?>">
		<div class="pane">
			<?php the_ori_calendar_icon(); ?>
			<?php the_ori_avatar(); ?>
			<?php the_ori_title(); ?>
			<?php the_ori_author(); ?>
		</div>	
		
		<div class="entry">
			<?php the_content(); ?>
			<?php wp_link_pages(array(
				'before' => __( '<p><strong>Pages:</strong> ', 'buddypress' ), 
				'after' => '</p>', 
				'next_or_number' => 'number')); ?>
		</div>
		
		<?php if (function_exists('wp_related_posts')): ?>
			<h3><?php _e('Related Articles...', 'oc'); ?></h3>
		<?php	
			wp_related_posts(); 
		endif; ?>			
	</div>
<?php
	do_action( 'bp_after_blog_post' );
}

function the_ori_post_search()
{
	the_post();
	do_action( 'bp_before_blog_post' ); 
?>
	<div <?php post_class('post-bg-'.the_time('m')) ?>>
		<?php the_ori_title(); ?>
		<?php the_ori_author(); /* bonus */ ?>
		<small><?php the_time('l, F jS, Y') ?></small>

		<?php the_ori_postmetadata(); ?>

		<?php do_action( 'bp_blog_post' ) ?>

	</div>
<?php 
	do_action( 'bp_after_blog_post' ); 
}

function the_ori_post_page()
{
	the_post(); 
	$readmore = __( 'Read the rest of this entry &rarr;', 'buddypress' );
?>
	<h2 class="pagetitle"><?php the_ori_alt_title(); ?></h2>
	<div <?php post_class('post-bg-00') ?> id="post-<?php the_ID(); ?>">		
		<div class="entry">
			<?php the_content( $readmore ); ?>
			<?php wp_link_pages( array( 
				'before' => __( '<p><strong>Pages:</strong> ', 'buddypress' ), 
				'after' => '</p>', 'next_or_number' => 'number')); ?>
			<?php edit_post_link( 
				__( 'Edit this entry.', 'buddypress' ), '<p>', '</p>'); ?>
		</div>
	</div>	
<?php 
}
