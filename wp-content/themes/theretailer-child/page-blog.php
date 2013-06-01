<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div class="container_12">

    <div class="grid_8">

		<div id="primary" class="content-area page-blog">
			<div id="content" class="site-content" role="main">

				<?php
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				//$wp_query->query('posts_per_page=1'.'&paged='.$paged);
				$wp_query->query('posts_per_page='.get_option('posts_per_page').'&paged='.$paged);				
				while ($wp_query->have_posts()) : $wp_query->the_post();
				?>

					<?php //get_template_part( 'content', get_post_format() ); ?>
                    
                    <article class="container_8 "id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    
                        <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
                          <div class="grid_4 alpha thumb-container">
                            <div class="entry-thumbnail">
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'theretailer' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
                            </div>
                          </div>
                          <div class="grid_4 omega content-container">
                        <?php } else { ?>
                          <div class="grid_8 content-container">
                        <?php } ?>
                        
                        <header class="entry-header">
                            <h1 class="entry-title gbtr_post_title_listing"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'theretailer' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                        </header><!-- .entry-header -->
                        
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-content -->
                      </div>
                        
                        <footer class="entry-meta">
                            <?php theretailer_posted_on(); ?>
                            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                            <span class="sep"> | </span>
                                    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                                    <?php
                                        /* translators: used between list items, there is a space after the comma */
                                        $categories_list = get_the_category_list( __( ',', 'theretailer' ) );
                                        if ( $categories_list ) :
                                    ?>
                                    <span class="cat-links">
                                        <?php printf( __( '%1$s', 'theretailer' ), $categories_list ); ?>
                                    </span>
                                    <?php endif; // End if categories ?>
                                <?php endif; // End if 'post' == get_post_type() ?>
                            <?php endif; ?>
                    
                            <?php edit_post_link( __( 'Edit', 'theretailer' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
                        </footer><!-- .entry-meta -->                 

                    </article><!-- #post-<?php the_ID(); ?> -->					
				
				<?php endwhile; // end of the loop. ?>
            
				<?php 
				if (function_exists("emm_paginate")) {
                    emm_paginate();
                }				
				?>
                
                <?php $wp_query = null; $wp_query = $temp;?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
        
        
        
	</div>

	<div class="grid_4">
    
		<div class="gbtr_aside_column">
			<?php 
			get_sidebar();
			?>
        </div>
        
    </div>

</div>

<?php get_template_part("light_footer"); ?>

<?php get_template_part("dark_footer"); ?>

<?php get_footer(); ?>