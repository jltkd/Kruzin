<?php get_header(); ?>

<div class="x-container max width offset test">
	<div class="<?php x_main_content_class(); ?>" role="main">
    		<div class="x-container max width offset">
	<div class="entry-wrap">
		 <?php
			$builderargs = array(
		                    'post_type' => 'builders',
		                    'posts_per_page' => 1,
		                     'orderby'         => 'rand',
		                );
		                $loop = new WP_Query($builderargs);

		                $vendorargs = array(
		                    'post_type' => 'vendors',
		                    'posts_per_page' => 1,
		                    'orderby'         => 'rand',
		                );
		                $vendorloop = new WP_Query($vendorargs);
	            ?>
	            <div class="x-column x-1-2">
	            <h1 class="shakin">What's Shakin?</h1>
	            </div>
	            <div class="x-column x-1-2 whitebg">
                    <?php $the_query = new WP_Query('posts_per_page=1'); ?>
          			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
          				<div class="featuredhomepost">
          				<a href="<?php the_permalink(); ?>">
					<img class="ponygirl" src="http://184.175.101.117/~kruzinusa/wp-content/uploads/2017/07/character.gif" alt="">
					<p><b class="homeblogtitle"><?php the_title(); ?></b><?php echo get_excerpt(); ?></p>
					<?php the_post_thumbnail('large'); ?>
					</a>
						<div class="hint"><a class="x-btn left small" href="<?php the_permalink(); ?>">Read More</a></div>
						<a class="x-btn right small" href="http://184.175.101.117/~kruzinusa/blog/">PonyGirl's Blog Index</a>
          				</div>
          			<?php endwhile; wp_reset_postdata(); ?>
	            </div>
		<div class="x-column x-1-2 homefeatured">
			 <div class="x-column x-1-2">
                 <h1 class="noline">Builders Showrooms</h1>
                 <div class="whitebg">
	            		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			             <div class="profilepre featured">
			             	<a href="http://184.175.101.117/~kruzinusa/builders/">
			                  	<img src="<?php the_field('featured_image'); ?>" alt="<?php $titlesummary = the_title(); echo wp_trim_words($titlesummary, 10); ?>">
                                <p>See the latest builds from some of the best around!
                                    Click Here</p>
			              	</a>
			              </div>
		          <?php endwhile; ?>
                 </div>
	            </div>
	            <div class="x-column x-1-2 last">
                    <h1 class="hometitle">Vendors Mall</h1>
                    <div class="whitebg">
		            	<?php while ( $vendorloop->have_posts() ) : $vendorloop->the_post(); ?>
					<div class="profilepre featured">
						<a href="http://184.175.101.117/~kruzinusa/vendors/">
						<img src="<?php the_field('featured_image'); ?>" alt="<?php $titlesummary = the_title(); echo wp_trim_words($titlesummary, 10); ?>">
                            <p>We scour the web for the best videos of wheelies, burnouts, cackle fests, and more!
                                Hold on tight and enjoy the ride!</p>
				             </a>
			            </div>
		            	<?php endwhile; ?>
                    </div>
	            </div>
	            <div class="x-clear"></div>
	            <div class="x-column x-1-2 toppush">
                    <h1 class="hometitle">Galleries</h1>
                    <div class="whitebg">
	            		<div class="profilepre featured">
					<a href="http://184.175.101.117/~kruzinusa/gallery/">
					<img src="http://184.175.101.117/~kruzinusa/wp-content/uploads/2017/08/IMG_2992_0.jpg" alt="car">
			             </a>
		            	</div>
                    </div>
	            </div>
	            <div class="x-column x-1-2 toppush">
                    <h1 class="hometitle">Event Coverage</h1>
                    <div class="whitebg">
	            		<div class="profilepre featured">
					<a href="http://184.175.101.117/~kruzinusa/show/">
					<img src="http://184.175.101.117/~kruzinusa/wp-content/uploads/2017/08/Classic-Car-Studio-1955-Chevy-Nomad-Art-Boze-GONE-MAD-01.jpg" alt="car">
			             </a>
		            	</div>
                    </div>
	            </div>
		</div>
		</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>