<?php get_header(); ?>

<div class="x-container max width offset pushdown">
    <div class="x-column x-2-3">
        <h1 class="maintitle">Featured Vendors</h1>
    </div>
</div>

<div class="x-container max width offset pushup">
    <div class="<?php x_main_content_class(); ?>" role="main">
        <div class="x-container max width offset pushup">
            <div class="entry-wrap">
                <div class="entry-content content">
                    <div class="featuredbuilder">
                        <div class="builderheader">
                            <div class="droplink"><a href="#allbuilders">View All Vendors A-Z</a></div>
                        </div>
                        <?php
                        $featuredargs = array(
                            'post_type'      => 'vendors',
                            'orderby'        => 'title',
                            'order'          => 'rand',
                            'posts_per_page' => 9,
                            'meta_query'     => array(
                                array(
                                    'key'     => 'featured_vendor',
                                    'value'   => 'Yes',
                                    'compare' => 'LIKE'
                                )
                            ),
                        );
                        $featuredloop = new WP_Query($featuredargs);

                        $vendorargs = array(
                            'post_type' => 'vendors',
                            'orderby'     => 'title',
                            'order'         => 'ASC',
                            'posts_per_page' => -1,
                        );
                        $vendorloop = new WP_Query($vendorargs);
                        ?>
                        <div class="archivelist">
                            <ul class=" x-block-grid three-up">
                                <?php while ( $featuredloop->have_posts() ) : $featuredloop->the_post(); ?>
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
                        <h2 class="featuretitle">Vendors A-Z</h2>
                        <div class="archivelist"  id="allbuilders">
                            <ul class=" x-block-grid four-up">
                                <?php while ( $vendorloop->have_posts() ) : $vendorloop->the_post(); ?>
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
