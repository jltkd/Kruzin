<?php get_header(); ?>

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
        'post_type'      => 'builders',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => 30,
        'meta_query'     => array(

        )
    );
    $loop2 = new WP_Query($args2);

?>

<div class="x-container max width offset pushdown">
    <div class="x-column x-2-3">
        <h1 class="maintitle">Featured Builders</h1>
    </div>
    <div class="x-column x-1-3">
        <h1 class="maintitle">Builders A-Z</h1>
    </div>
</div>

<div class="x-container max width offset pushup">
    <div class="<?php x_main_content_class(); ?>" role="main">
        <div class="x-column x-2-3">
            <div class="archivelist whitebg">
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
            <div class="whitebg probuilder">
                <h1>Professional Builder?</h1>
                <p>Wanna run with the big dogs with a (FREE) Builders Showroom Click Here</p>
            </div>
        </div>
        <div class="x-column x-1-3 whitebg builderlist">
            <h2>A-H</h2>
            <ul>
                <?php while ( $loop2->have_posts() ) : $loop2->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="alphalinks">
                <a href="http://184.175.101.117/~kruzinusa/athruh/">A-H</a>
                <a href="http://184.175.101.117/~kruzinusa/ithruo/">I-O</a>
                <a href="http://184.175.101.117/~kruzinusa/pthruu/">P-U</a>
                <a href="http://184.175.101.117/~kruzinusa/vthruz/">V-Z</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
