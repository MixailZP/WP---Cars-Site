<?php
/**
 * Template Name: Home Page
 */

get_header('home'); ?>

<main>
    <div class="page-home">
        <h1 class="home_carlist">Cars For Sale:</h1>
        <!-- <?php echo do_shortcode('[allcars-code]'); ?> -->

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
                endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
                    </div>
        </main>
<?php
    get_footer('home');