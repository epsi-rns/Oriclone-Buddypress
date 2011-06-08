		<?php if ( $numTrackBacks ) : ?>
			<div id="trackbacks">

				<span class="title"><?php the_title() ?></span>

				<?php if ( 1 == $numTrackBacks ) : ?>
					<h3><?php printf( __( '%d Trackback', 'buddypress' ), $numTrackBacks ) ?></h3>
				<?php else : ?>
					<h3><?php printf( __( '%d Trackbacks', 'buddypress' ), $numTrackBacks ) ?></h3>
				<?php endif; ?>

				<ul id="trackbacklist">
					<?php foreach ( (array)$comments as $comment ) : ?>

						<?php if ( get_comment_type() != 'comment' ) : ?>
							<li><h5><?php comment_author_link() ?></h5><em>on <?php comment_date() ?></em></li>
	  					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
