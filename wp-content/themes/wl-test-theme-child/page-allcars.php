<?php 
/*
 * Template name: All cars
 */
get_header('home');

$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$params = array(
	'posts_per_page' => 10, // количество постов на странице
	'post_type'       => 'create_posttype', // тип постов
	'paged'           => $current_page // текущая страница
);
query_posts($params);

$wp_query->is_archive = true;
$wp_query->is_home = false;

while(have_posts()): the_post(); ?>

	<h2><?php the_title() ?></h2>
	<p><?php the_content() ?></p>

<?php
endwhile;

get_footer('home'); ?>