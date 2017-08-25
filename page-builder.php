<?php
/**
 * Template Name: Builders Edit Page
 *
 */
?>

<?php acf_form_head(); ?>
<?php get_header(); ?>

 <div class="x-container max width offset">
   <div class="<?php x_main_content_class(); ?>" role="main">
     <div class="x-container max width offset">
       <div class="entry-wrap">
         <h3>Edit Profile</h3>
         <?php while ( have_posts() ) : the_post(); ?>
           <?php acf_form(array(
    					'post_id'	      => $_REQUEST['post_id'],
    					'post_title'	  => true,
    					'submit_value'	=> 'Update'
    				)); ?>
         <?php endwhile; ?>
       </div>
     </div>
   </div>
 </div>

<?php get_footer(); ?>
