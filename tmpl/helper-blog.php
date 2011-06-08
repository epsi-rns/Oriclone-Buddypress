<?php

function the_ori_title()
{ ?>
	<h3 class="panetitle"><a href="<?php the_permalink() ?>" rel="bookmark" 
			title="<?php _e( 'Permanent Link to', 'buddypress' ); 
			?> <?php the_title_attribute(); ?>"><?php 
			the_ori_alt_title(); ?></a></h3>
<?php }

function the_ori_alt_title()
{
	// calculated if there is alternative title
	$title = get_post_custom_values('title');
	
	if (!empty($title[0]))
		echo $title[0];
	else	
		echo the_title('','', false);
}

function the_ori_posts_navigation()
{ 
	$prev = '<div class="alignleft">'.
		__( '&laquo; Previous Entries', 'buddypress' ).'</div>'."\n";
	$next = '<div class="alignright">'.
		__( 'Next Entries &raquo;', 'buddypress' ).'</div>'."\n";
	?>

	<div class="navigation">		
		<?php previous_posts_link( $prev ) ?>
		<?php next_posts_link( $next ) ?>
	</div>
<?php }

function the_ori_post_navigation()
{ 
	$prev = '<div class="alignleft">'.
		__( '&laquo; %link', 'buddypress' ).'</div>'."\n";
	$next = '<div class="alignright">'.
		__( '%link &raquo;', 'buddypress' ).'</div>'."\n";
	?>

	<div class="item-options">		
		<?php previous_post_link( $prev ) ?>
		<?php next_post_link( $next ) ?>
	</div>
<?php }

function the_ori_pagination()
{ 
	global $wp_query;
	if (($wp_query->max_num_pages > 1)) {
?>
		<div class="navigation">	
		<?php if (function_exists('get_ori_paginate')): ?>
		<div class="pag-count" id="blog-dir-count">
			<?php echo get_ori_paginate_info(); ?> &nbsp;
			<?php /* <span class="ajax-loader"></span>	*/ ?>
			<div class="pagination-links">
				<?php echo get_ori_paginate(); ?>
			</div>		
		</div>
		
		<?php else: the_ori_posts_navigation(); ?>
		<?php endif; ?>
		</div>
<?php }
}

function get_ori_paginate_info()
{ 
	global $wp_query, $paged;
	
	$pag_page = (int) ($paged ? $paged : 1);	// current
	$pag_num = intval(get_query_var('posts_per_page'));
	$count = $wp_query->found_posts;

	$from_num = intval( ( $pag_page - 1 ) * $pag_num ) + 1;
	$to_num = ( $from_num + ( $pag_num - 1 ) > $count ) ? 
		$count : $from_num + ( $pag_num - 1 ) ;

	$str = '
	<div class="pagination">
	'.__( 'Viewing post %d to %d (%d total posts)', 'buddypress' ).'
	</div>
';
	return sprintf( $str, $from_num, $to_num, $count );
}

// http://wordpress.org/support/topic/298596
function get_ori_paginate()
{ 
	global $wp_rewrite, $wp_query, $paged;
	$base = get_pagenum_link();	
	if (strpos($base, '?') 
		|| ! $wp_rewrite->using_permalinks()) {
		$paginate_base = add_query_arg('page', '%#%');
		$paginate_format = '';		
	} else {
		$base = trailingslashit($base);
		$paginate_base = $base.'%_%';
		$paginate_format = 'page/%#%/';
	}
	
	$args = array(
		'base' => $paginate_base,
		'format' => $paginate_format,
		'total' => $wp_query->max_num_pages,
		'current' => (int) ($paged ? $paged : 1),
		'prev_text' => '&laquo;',
		'next_text' => '&raquo;'
	);

	return paginate_links($args);
}

function the_ori_postmetadata()
{ ?>

	<div class="postmetadata<?php if(!is_single()) echo ' fadecomments'; ?>">
		<?php if(!is_single()): ?>
		<div class="icon_comments">
		<?php comments_popup_link(
			__('No Comments &#187;', 'buddypress'), 
			__('1 Comment &#187;', 'buddypress'), 
			__('% Comments &#187;', 'buddypress')
		); ?>	
		</div>
		<?php endif; ?>
	
		<div class="icon_cat">
		<?php _e('Posted in', 'oc'); ?>:
		<?php the_category(', '); ?>
		</div>
		
		<?php if(get_the_tags()): ?>
		<div class="icon_tag">
		<?php the_tags(__('Tags:', 'buddypress').' ', ', ', '<br />'); ?>
		</div>
		<?php endif; ?> 	
		
		<?php	if (  (function_exists('has_post_thumbnail')) 
				&& (has_post_thumbnail())  ) : ?>
		<div class="icon_attachment">
		<?php echo __('With thumbnail', 'oc'); ?>
		</div>
		<?php endif; ?> 	
		
		<div class="clr"></div> 
	</div>	
<?php }

function the_ori_author_default()
{ ?>
	<p class="date">
		<?php the_time('F j, Y') ?> 
		<em><?php _e( 'in', 'buddypress' ) ?> <?php the_category(', ') ?> 
		<?php printf( __( 'by %s', 'buddypress' ), 
			bp_core_get_userlink($post->post_author) ) ?>
	</em></p>
<?php }

function the_ori_author()
{ 
	global $post;
	// the_author()
	?>
	<div class="post_author">
		<div class="icon_author">
		<?php _e('Posted by', 'oc'); ?>		
		<strong><?php echo bp_core_get_userlink($post->post_author); ?></strong> 
		</div>
		<div class="icon_time">
			<?php /* _e('on', 'oc'); 
			<abbr title="<?php echo the_time('Y-m-d\TH:i:sO');?>">		
			<?php the_time(__('F jS, Y', 'oc')); ?></abbr> 
			*/ ?>
			<abbr title="<?php echo the_time(__('F jS, Y', 'oc'))
				.the_time(' \TH:i:sO');?>">		
			<?php the_ori_time_elapsed(); ?></abbr>
		</div>
		
		<?php if (current_user_can('edit_post', $post->ID)): ?> 
			<div class="icon_edit" nowrap="nowrap">
			<?php edit_post_link(__('Edit', 'buddypress'), '', ''); ?>
			</div>
		<?php endif; ?>
		
		<div class="clr"></div> 
	</div>		 
<?php }

function the_ori_calendar_icon()
{ ?>
      <div class="calendar calendar-icon-<?php the_time('m'); ?>">
        <div class="calendar-day"><?php the_time('j'); ?></div>
      </div>
<?php }

function the_ori_date_icon()
{ ?>
	<div class="the_date the_date-<?php the_time('d'); ?>">
	<div class="date_m"><?php the_time('M') ?></div>
	<div class="date_d"><?php the_time('j') ?></div>
</div>
<?php }

function the_ori_avatar()
{ 	
	$id = get_the_author_meta('ID');
	?>
      <div class="avatar">
        <?php echo get_avatar( $id, '42' ); ?>
      </div>
<?php }

// replacement for: // the_time(__('F jS, Y', 'oc'));
// http://www.zachstronaut.com/posts/2009/01/20/php-relative-date-time-string.html
function the_ori_time_elapsed() {	
	printf(__('%s ago', 'oc'), bp_core_time_since(get_the_time('U')) );
}

function the_ori_all_breadcrumb()
{	
		$bpc = bp_current_component();
		$bp_slugs = array( 
			BP_ACTIVITY_SLUG,
			BP_MEMBERS_SLUG,
			BP_GROUPS_SLUG,
			BP_FORUMS_SLUG,
			BP_BLOGS_SLUG
		);
		
		if	( in_array( $bpc, $bp_slugs ) )
			the_ori_bp_breadcrumb();
		else 
			the_ori_wp_breadcrumb();			
}
		
function the_ori_breadcrumb()
{	
	if (class_exists('breadcrumb_navigation_xt'))
	{ 
		// New breadcrumb object
		$mybreadcrumb = new breadcrumb_navigation_xt;
	
		// Options for breadcrumb_navigation_xt
		$mybreadcrumb->opt['title_blog'] = __('Home', 'buddypress');
		$mybreadcrumb->opt['separator'] = ' &raquo; ';
		$mybreadcrumb->opt['singleblogpost_category_display'] = true;
	
		// Display the breadcrumb
?>
		<div id="gloss"><div class="breadcrumbs">
			<?php 
				_e("You're browsing: ", 'oc');
				$mybreadcrumb->display(); 
			?>
		</div></div>
<?php }
}


