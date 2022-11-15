<?php
get_header('home'); ?>

<div class="post__wraper">
    <h1><?php the_title();  ?></h1>
    <?php the_post_thumbnail('post') ?>

    <?php
        while( have_posts() ) : the_post();
            if( is_sticky() ) :
                $more = 1;
            else :
                $more = 0;
            endif;
            the_content();
        endwhile;
    ?>
<!-- ************** View Fields from Metabox on Page ******************* -->

    <div class="hcf_fields">
        <div class="hcf_colorView" style="background-color: <?php echo esc_html(get_post_meta(get_the_ID(), 'hcf_color', true)) ?> ;"></div>
        <ul class="hcf_ul">
            <li class="hcf_licolor"><strong>Color:</strong></li>
            <li><strong>Fluel: <?php echo esc_html(get_post_meta(get_the_ID(), 'hcf_fluel', true)) ?></strong></li>
            <li><strong>Power: <?php echo esc_html(get_post_meta(get_the_ID(), 'hcf_strong', true)) ?> kW</strong></li>

<!-- ****************** View Taxonomy on Page **************************-->

            <div class="blcok_taxonomy">
                <?php
                $terms = get_the_terms(get_the_id(), 'brand');

                foreach ($terms as $term): ?>
                    <div>Brand : <?php echo $term->name ?></div>
                <?php endforeach; ?>

                <?php
                $terms = get_the_terms(get_the_id(), 'manufacturer-country');

                foreach ($terms as $term): ?>
                    <div>Manufactur Country : <?php echo $term->name ?></div>
                <?php endforeach; ?>
            </div>
            
            <li><strong>Price: $ <?php echo esc_html(get_post_meta(get_the_ID(), 'hcf_price', true)) ?></strong> </li>
            <li><strong>Published date: <?php echo esc_html(get_post_meta(get_the_ID(), 'hcf_published_date', true)) ?> </strong></li>
        </ul>

        
    </div>
</div>



<?php
    get_footer('home'); ?>

