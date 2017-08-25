<?php get_header(); ?>

<div class="x-container max width offset">
    <div class="<?php x_main_content_class(); ?>" role="main">
        <div class="x-container max width offset">
            <div class="entry-wrap">
                <div class="entry-content content">
                    <div class="featuredbuilder">
                        <h1 class="featuretitle">Featured Builders</h1>
                        <?php
                        $args = array(
                            'post_type' => 'vendors',
                            'orderby'     => 'title',
                            'order'          => 'rand',
                            'posts_per_page' => 9,
                            'meta_query' => array(
                                array(
                                    'key'           => 'featured_vendor',
                                    'value'       => 'Yes',
                                    'compare' => 'LIKE'
                                )
                            ),
                        );
                        $loop = new WP_Query($args);
                        ?>
                        <div class="archivelist">
                            <ul class=" x-block-grid three-up">
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <li class="x-block-grid-item">
                                        <div class="profilepre featured">
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
                    <h2 class="featuretitle">All Builders</h2>
                    <div class="archivelist">
                        <ul class=" x-block-grid four-up">
                            <?php while ( have_posts() ) : the_post(); ?>
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
</div>

<?php get_footer(); ?>
