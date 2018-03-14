<?php get_header(); ?>
<!-- start column2nd -->
    <div id="column2nd">
	<div id="column2nd-inside">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    	<!-- post -->
        <div class="post listing">
            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <span class="meta"><?php _e('Published'); ?> <?php the_time('F j, Y'); ?> <?php _e('in'); ?> <?php the_category(', ') ?></a></span>
		<?php if ( has_post_thumbnail()) { ?>
                	<div class="thumb"><?php the_post_thumbnail('post-thumb'); ?></div>
		<?php } ?>
                <span class="more"><a href="<?php the_permalink(); ?>" title="<?php _e('Read the post'); ?>"><?php _e('Read the post'); ?></a></span>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <!-- post -->
        <!-- pagination -->
        
            <?php if (function_exists("pagination")) {
			pagination($additional_loop->max_num_pages);
			} ?>
      
        <!-- pagination -->
	</div>
    </div>
    <!-- end column2nd -->
</div>
<!-- end box -->

<?php get_footer(); ?>