<?php
/**
 * Template Name: Menu Page
 *
 * @package Mexican_Poutine
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
            <h1>Breakfast</h1>
<?php $breakfast_query = new WP_Query('post_type=dish&meal=breakfast&posts_per_page=-1'); // show all breakfast dishes
while($breakfast_query->have_posts()) : $breakfast_query->the_post(); ?>
       <?php the_post_thumbnail('medium'); ?>
        <h3><?php the_title() ?></h3>
        <?php the_content() ?>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); // reset the query ?>
           
        <h1>Lunch</h1>
<?php $lunch_query = new WP_Query('post_type=dish&meal=lunch&posts_per_page=-1'); // show all breakfast dishes
while($lunch_query->have_posts()) : $lunch_query->the_post(); ?>
       <?php the_post_thumbnail('medium'); ?>
        <h3><?php the_title() ?></h3>
        <?php the_content() ?>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); // reset the query ?>
      
       <h1>Dinner</h1>
<?php $dinner_query = new WP_Query('post_type=dish&meal=dinner&posts_per_page=-1'); // show all breakfast dishes
while($dinner_query->have_posts()) : $dinner_query->the_post(); ?>
       <?php the_post_thumbnail('medium'); ?>
        <h3><?php the_title() ?></h3>
        <?php the_content() ?>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); // reset the query ?>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_sidebar();
get_footer();