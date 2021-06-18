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

<!-- Blog --> 
<div class="container">


<h1 class="sec-title">Tips from our blog</h1>

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
        $category = get_the_category();
        ?>
        
        
        <div class="col-lg-4">
            
        <div class="card">
  <?php echo the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) ); ?>
  <div class="card-body">
      <p class="card-cat"><?php echo $category[0]->cat_name; ?></p>
    <h5 class="card-title"><?php the_title(); ?></h5>
    <p class="card-date"><i class="far fa-clock"></i> <?php the_date() ?></p>
    <?php  echo '<p class="card-text">' . get_the_excerpt() . '</p>' ?>
    <a href="<?php the_permalink(); ?>" class="post-link">READ MORE <i class="fas fa-long-arrow-alt-right"></i></a> 
  </div>
</div>
        </div>
        
        <?php
    endwhile;
endif;

?>
</div>
</div>

<!-- Contact Form--> 
<div class="container lgray">




</div>
<?php 
get_footer();
