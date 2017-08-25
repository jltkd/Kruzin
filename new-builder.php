<?php
/**
 * Template Name: Create New Builder Page
 *
 */
?>

<?php acf_form_head(); ?>
<?php get_header(); ?>

 <div class="x-container max width offset">
   <div class="<?php x_main_content_class(); ?>" role="main">
     <div class="x-container max width offset">
       <div class="entry-wrap">
         <h3>Create Builder Profile</h3>
         <?php
          $user_id = get_current_user_id();
         ?>

         <?php if(count_user_posts($user_id , "builders") < 2): ?>

         <?php while ( have_posts() ) : the_post(); ?>
           <?php acf_form(array(
    					'post_id'	      => 'new_post',
    					'post_title'	  => true,
              'post_content'  => true,
    					'new_post'      => array(
                'post_type'   => 'builders',
                'post_status' => 'draft',
              )
    				)); ?>
         <?php endwhile; ?>
       <?php endif; ?>

       <?php if(count_user_posts($user_id , "builders") >= 1): ?>
         <?php echo 'You already have a Builder Profile'; ?>
       <?php endif; ?>

       </div>
     </div>
   </div>
 </div>

<?php get_footer(); ?>
