<?php
/**
 * The main template file
 */

get_header();
?>


<!-- body goes here -->

<!-- Gutten block here -->
<div class="container-fluid full-w">
<?php

$block_content = '<!-- wp:assessment/header {"fontColor":"#ffffff","overlayColor":"#000000"} -->
<div class="wp-block-assessment-header" style="background-image:url(' . get_template_directory_uri() . '/build/assets/src/img/how-can-we-help-you.jpg);background-size:cover;background-position:center"><div class="overlay" style="background:#000000"></div><h2 class="content" style="color:#ffffff">How can we help you today?</h2></div>
<!-- /wp:assessment/header -->';

echo do_blocks($block_content);


?>
</div>
<!-- Blog --> 
<div class="container blogqu">


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
<div class="container-fluid lgray">
<div class="container formcont">
<h1 class="sec-title">Contact Form</h1>
<div class="row">
<div class="col-md-8">
<form id="contact-form" method="post" action="<?php echo get_template_directory_uri(); ?>/contact.php" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Your Firstname *</label>
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter your firstname" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Your Lastname *</label>
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Enter your lastname" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_email">Your Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Enter your email" required="required" data-error="A valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Your Message for us *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Enter your message" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Send message">
            </div>
        </div>
    </div>

</form>
</div>

<div class="col-md-4">
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra ipsum id lacinia viverra.
Aliquam sit amet mauris sit amet turpis gravida malesuada eu facilisis ligula. Proin a est quis leo tempus imperdiet.
Nam eget mi non massa condimentum ultrices. Curabitur et consectetur ante. Morbi ante arcu, condimentum egestas sapien in,
sagittis varius nisl. Nunc in consectetur leo, sed hendrerit leo. Nulla eleifend sed felis eu auctor.
</p>
<div class="row">
<div class="col-1"><a href="#"><i class="fab fa-twitter"></i></a></div>
<div class="col-1"><a href="#"><i class="fab fa-facebook-square"></i></a></div>
<div class="col-1"><a href="#"><i class="fab fa-instagram"></i></a></div>
<div class="col-1"><a href="#"><i class="fab fa-pinterest"></i></a></div>
<div class="col-1"><a href="#"><i class="fab fa-vimeo"></i></a></div>
</div>
</div>
</div>
</div>
</div>

<?php 
get_footer();
