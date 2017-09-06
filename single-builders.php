<?php acf_form_head(); ?>
<?php get_header(); ?>

<div class="x-container max width offset">
  <div class="<?php x_main_content_class(); ?>" role="main">
    <div class="x-container max width">
      <div class="entry-wrap">
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="x-container max width">
            <!-- <div class="x-column x-sm x-1-1">
              <?php if( get_field('featured_builder') ): ?>
                <p>THIS IS A FEATURED BUILDER</p>
              <?php endif; ?>
            </div> -->
              <h1 class="maintitle"><?php the_title(); ?></h1>
              <div class="x-column x-1-1 whitebg builderinfo">
                  <div class="x-column x-1-4">
                      <img src="<?php the_field('logo'); ?>" alt="<?php $titlesummary = the_title(); ?>">
                  </div>
                  <div class="x-column x-1-4">
                      <p><?php the_field('address'); ?><br>
                          <?php the_field('city'); ?>, <?php the_field('state'); ?> <?php the_field('zip_code'); ?><br>
                          <?php the_field('phone_number'); ?><br>
                          <a href="<?php the_field('website_url'); ?>" target="_blank">Visit Our Website</a><br>
                          <b class="morebio">Read Full Bio</b>
                  </div>
                  <div class="x-column x-1-4"></div>
                  <div class="x-column x-1-4"></div>
              </div>
          </div>
          <div class="x-container max width whitebg fullbio">
           <?php the_field('description'); ?>
              <b class="morebio">Close Full Bio</b>
          </div>
            <div class="x-gap"></div>
            <h1 class="maintitle">Gallery</h1>
          <div class="x-container max width whitebg galleryimg">
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
                    echo do_shortcode("[custom-facebook-feed id=$fb num=20 layout=thumb photosource=photospage showfacebooklink=false masonry=true layout=fullwidth lightboxcomments=false type=photos,videos]");
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
                    echo do_shortcode("[instashow source=\"@$ig\" info=\"none\" popup_info=\"none\" auto_hover_pause\"true\" rows=\"2\" gutter=\"5\"  auto=\"4000\"]");
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

    <script>
        jQuery(document).ready(function() {
           jQuery(".morebio").click(function() {
               jQuery(".fullbio").stop().slideToggle();
           }) ;
        });
    </script>

<?php get_footer(); ?>