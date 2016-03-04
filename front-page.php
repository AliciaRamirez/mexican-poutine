<?php
/**
 * Template for the Home page
 *
 * @package Mexican_Poutine
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        
        <div>
            <h2>Latest Blog Posts</h2>
<?php
$latest_blog = new WP_Query("posts_per_page=1");
            
if ($latest_blog->have_posts()):
    while($latest_blog->have_posts()):
        $latest_blog->the_post();
?>
            <h3><a href="<?php the_permalink();?>">
            <?php the_title();?>
            </a></h3>
            <?php the_content();?>
            <p><a href="<?php echo home_url('blog');?>">Visit our Blog</a></p>
       
<?php endwhile;endif;?>       
       
            </div>
            
            <div>
            <h2>Today's Special</h2>
<?php
                
$args = array(
    'post_type'         => 'dish',
    'posts_per_page'    => 1,
    'orderby'          => 'rand',    'meta_key'          => 'special',
    'meta_value'        => 1
);
$special = new WP_Query($args);
            
if ($special->have_posts()):
    while($special->have_posts()):
        $special->the_post();
?>        
           <?php the_post_thumbnail("medium");?>
            <h3><?php the_title();?></h3>
            <?php the_content();?>
            <p><?php the_field('price');?></p>
            <p><a href="<?php echo home_url('menu');?>">Visit our Menu</a></p>
       
<?php endwhile;endif;?>       
       
            </div>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php

get_footer();