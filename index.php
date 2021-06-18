<?php
/**
 * The main template file
 */

get_header();
?>


<!-- body goes here -->

<!-- Gutten block here -->
<?php
/*
$block_content = '<!-- wp:latest-posts {"postsToShow":3,"displayPostContent":true,"excerptLength":30,"displayPostDate":true,"postLayout":"grid","displayFeaturedImage":true,"featuredImageSizeSlug":"large","align":"wide","className":"tw-mt-8 tw-img-ratio-3-2 tw-stretched-link is-style-default"} /-->';

echo do_blocks($block_content);
*/
?>
<div class="container">
<div class="row justify-content-center">
<!-- Blog --> 
<h1>Tips from our blog</h1>
</div>
<div class="row justify-content-center">
<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'tips',
    'posts_per_page' => 6,
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
        <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php the_post_thumbnail();?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php the_title(); ?></h5>
    <p class="card-text"><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" class="link">READ MORE</a><i class="far fa-arrow-right"></i>
  </div>
</div>
        </article>
        
        <?php
    endwhile;
endif;

?>
</div>
</div>


<?php 
get_footer();
