<?php get_header(); ?>

<div class="x-container max width offset">
  <div class="<?php x_main_content_class(); ?>" role="main">
    <div class="x-container max width offset">
      <div class="entry-wrap">
        <div class="entry-content content">
        <div class="featuredbuilder">
          <div class="builderheader">
            <h1 class="featuretitle">Featured Builders</h1>
          <div class="droplink"><a href="#allbuilders">View All Builders A-Z</a></div>
          </div>
            <?php
                $args = array(
                    'post_type'      => 'builders',
                    'orderby'        => 'rand',
                    'posts_per_page' => 9,
                    'meta_query'     => array(
                        array(
                            'key'     => 'featured_builder',
                            'value'   => 'Yes',
                            'compare' => 'LIKE'
                        )
                    ),
                );
                $loop = new WP_Query($args);

                $args2 = array(
                    'post_type' => 'builders',
                    'orderby'     => 'title',
                    'order'         => 'ASC',
                    'posts_per_page' => -1,
                );
                $loop2 = new WP_Query($args2);
            ?>
        <div class="archivelist">
       <ul class=" x-block-grid three-up">
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <li class="x-block-grid-item">
            <div class="profilepre featured">
                <a href="<?php the_permalink(); ?>">
                  <p><?php the_title(); ?></p>
                  <?php if(get_field('profile_image')) { ?>
                     <img src="<?php the_field('profile_image'); ?>" alt="<?php $titlesummary = the_title(); echo wp_trim_words($titlesummary, 10); ?>">
                    <?php } else { ?>
                      <img src="<?php the_field('featured_image'); ?>" alt="<?php $titlesummary = the_title(); echo wp_trim_words($titlesummary, 10); ?>">
                    <?php } ?>
              </a>
              </div>
          </li>
          <?php endwhile; ?>
          </ul>
        </div>
        <h2 class="featuretitle">Builders A-Z</h2>
        <div class="archivelist"  id="allbuilders">
       <ul class=" x-block-grid four-up">
          <?php while ( $loop2->have_posts() ) : $loop2->the_post(); ?>
          <li class="x-block-grid-item">
            <div class="profilepre">
                <a href="<?php the_permalink(); ?>">
                 <p><?php the_title(); ?></p>
                  <img src="<?php the_field('featured_image'); ?>" alt="<?php $titlesummary = the_title(); echo wp_trim_words($titlesummary, 10); ?>">
              </a>
              </div>
          </li>
          <?php endwhile; ?>
          </ul>
        </div> 
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
