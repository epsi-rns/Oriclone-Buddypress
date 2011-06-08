<?php
/*
Template Name: My Home
*/
global $oc_template, $oc_options;
$oc_template = 'my-home';

$base = get_bloginfo('home');
include('tmpl/helper-loop-post.php');
get_header(); 
?>

	<div id="content">
		<?php if(!empty($oc_options['guest-message'])): ?>
		<?php if ( !is_user_logged_in() ) : ?>
		<dl id="system-message">
			<dt class="okay">Okay</dt>
			<dd class="okay message">
			<ul><li>
			<?php echo $oc_options['guest-message']; ?>
			</li></ul></dd>
		</dl>
		<?php endif; ?>
		<?php endif; ?>
		
		<div class="page" id="blog-page">
			<?php if (have_posts()) : while (have_posts()): ?>
			<?php the_ori_post_page(); ?>
			<?php endwhile; endif; ?>
		</div>
		
		<div id="feats">
		<?php do_action( 'oc_before_features' ) ?>		
		
		<?php /* 3 Site Feature */ ?>
			<?php if(!empty($oc_options['home-find-member'])): ?>
			<div class="feat">
				<div class="img_feat_member"></div>
				<h3><?php _e('Find Member', 'oc'); ?></h3>						
				<?php echo $oc_options['home-find-member']; ?>
				<div class="home_button">
					<a href="<?php echo $base.'/'.BP_MEMBERS_SLUG; ?>/" class="more-link">
					<?php _e('Find Member', 'oc'); ?> &rarr;</a>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if(!empty($oc_options['home-find-group'])): ?>
			<div class="feat">
				<div class="img_feat_group"></div>
				<h3><?php _e('Find Group', 'oc'); ?></h3>
				<?php echo $oc_options['home-find-group']; ?>
				<div class="home_button">
					<a href="<?php echo $base.'/'.BP_GROUPS_SLUG; ?>/" class="more-link">
					<?php _e('Find Group', 'oc'); ?> &rarr;</a>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if(!empty($oc_options['home-find-blog'])): ?>
			<div class="feat">
				<div class="img_feat_blog"></div>
				<h3><?php _e('Find Blog', 'oc'); ?></h3>
				<?php echo $oc_options['home-find-blog']; ?>
				<div class="home_button">
					<a href="<?php echo $base.'/'.BP_BLOGS_SLUG; ?>/" class="more-link">
					<?php _e('Find Blog', 'oc'); ?> &rarr;</a>
				</div>	
			</div>
			<?php endif; ?>
			
			<?php if(!empty($oc_options['home-read-news'])
					&& !empty($oc_options['home-news-url']) ): ?>
			<div class="feat">
				<div class="img_feat_news"></div>
				<h3><?php _e('Read News', 'oc'); ?></h3>
				<?php echo $oc_options['home-read-news']; ?>
				<div class="home_button">
					<a href="<?php echo $oc_options['home-news-url']; ?>" class="more-link">
					<?php _e('Read News', 'oc'); ?> &rarr;</a>
				</div>	
			</div>
			<?php endif; ?>	
			
			<?php do_action( 'oc_after_features' ) ?>		
			
			<div class="clr"></div>
		</div><?php /* Feats ID */ ?>
	</div>

<?php 
get_footer();
