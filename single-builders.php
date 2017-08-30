<?php acf_form_head(); ?>
<?php get_header(); ?>

<div class="x-container max width offset">
  <div class="<?php x_main_content_class(); ?>" role="main">
    <div class="x-container max width">
        <h1 class="maintitle"><?php the_title(); ?></h1>
      <div class="entry-wrap whitebg">
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="x-container max width">
          <hr class="x-gap">
          <hr class="x-gap">
            <!-- <div class="x-column x-sm x-1-1">
              <?php if( get_field('featured_builder') ): ?>
                <p>THIS IS A FEATURED BUILDER</p>
              <?php endif; ?>
            </div> -->
            <div class="x-column x-sm x-1-3">
              <img src="<?php the_field('logo'); ?>" alt="<?php the_title(); ?>">
              <p><?php the_field('address'); ?><br>
              <?php the_field('city'); ?>, <?php the_field('state'); ?> <?php the_field('zip_code'); ?></p>
              <p><?php the_field('phone_number'); ?></p>
              <p><a href="<?php the_field('website_url'); ?>" target="_blank">Visit Our Website</a></p>
              <?php if ( is_user_logged_in() ): ?>
                <a href="<?php echo get_permalink(); ?>/edit-builder?post_id=<?php echo $post->ID ?>">Edit Profile</a>
              <?php endif; ?>
            </div>
            <div class="x-column x-sm x-2-3">
              <?php the_field('description'); ?>
            </div>
          </div>
          <div class="x-container max width">
            <!-- <ul class="firstActive">
              <li>Hello</li>
              <li>Hi </li>
              <li>Heyy!</li>
            </ul> -->
            <ul class="x-nav x-nav-tabs four-up top firstActive" data-x-element="tab_nav" data-x-params="{&quot;orientation&quot;:&quot;horizontal&quot;}">
            <?php if(get_field('gallery')) : ?>
              <li class="x-nav-tabs-item resizez"><a data-cs-tab-toggle="1">Gallery</a></li>
              <?php endif; ?>
              <?php if(get_field('facebook_link')) : ?>
                <li class="x-nav-tabs-item resizez"><a data-cs-tab-toggle="2">Facebook</a></li>
              <?php endif; ?>
              <?php if(get_field('instagram_link')) : ?>
              <li class="x-nav-tabs-item resizez"><a data-cs-tab-toggle="3">Instagram</a></li>
              <?php endif; ?>
              <?php if(get_field('youtube_link')) : ?>
              <li class="x-nav-tabs-item resizez"><a data-cs-tab-toggle="4">YouTube</a></li>
              <?php endif; ?>
            </ul>

            <div class="x-tab-content firstActive">
              <?php if(get_field('gallery')) : ?>
              <div data-cs-tab-index="1" class="x-tab-pane fade in active">
                <?php
                  $images = get_field('gallery');
                  if($images): ?>
                    <ul class="builder-gallery">
                      <?php foreach ($images as $image): ?>
                        <li>
                          <a class="envira-gallery-link" href="<?php echo $image['url']; ?>">
                            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
              </div>
            <?php endif; ?>
            <?php if(get_field('facebook_link')) : ?>
              <div data-cs-tab-index="2" class="x-tab-pane fade in">
                <?php
                  if(get_field('facebook_link'))
                  {
                    $fb = get_field('facebook_link');
                    echo do_shortcode("[custom-facebook-feed id=$fb num=99 type=photos photosource=photospage photocols=4]");
                    echo $fb;
                  } else {
                    echo '<p>We haven\'t added our Facebook Feed yet!</p>';
                  }
                ?>
              </div>
            <?php endif; ?>
            <?php if(get_field('instagram_link')) : ?>
              <div data-cs-tab-index="3" class="x-tab-pane fade in">
                <?php
                  if(get_field('instagram_link'))
                  {
                    $ig = get_field('instagram_link');
                    echo do_shortcode("[instashow source=\"@$ig\" auto_hover_pause\"true\" rows=\"2\" gutter=\"5\"  auto=\"4000\"]");
                    echo $ig;
                  } else {
                    echo '<p>We haven\'t added our Instagram Feed yet!</p>';
                  }
                ?>
              </div>
            <?php endif; ?>
            <?php if(get_field('youtube_link')) : ?>
              <div data-cs-tab-index="4" class="x-tab-pane fade in">
                <?php
                if(get_field('youtube_link'))
                {
                  $yt = get_field('youtube_link');
                  echo do_shortcode("[yottie debug=true content header_visible=false content_gutter=10 popup_info=null video_layout=cinema content_direction=vertical  content_columns=3 content_rows=2 channel=\"https://www.youtube.com/channel/$yt\"]");
                } else {
                  echo '<p>We haven\'t added our YouTube Feed yet!</p>';
                }
                ?>
              </div>
            <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>

[custom-facebook-feed videosource=videospage videocols=4 showvideodesc=false]