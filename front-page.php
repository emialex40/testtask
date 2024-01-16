<?php

get_header();

$args = [
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'posts_per_page'   => 3,
	'order'            => 'DESC',
	'orderby'          => 'date',
	'category__not_in' => [ 3 ],
];

$query = new WP_Query($args);

$ab_posts   = get_field( 'ab_posts' );
$team_arr   = get_field( 'tm_members' );
$clients    = get_field( 'ts_clients' );
$blog_check = get_field( 'enable_blog' );
?>

<div class="base">
    <section id="home" class="section intro_mod" style="background-image: url(<?php the_field( 'background_image' ); ?>);">
        <h2 class="section_title intro_mod">
            <span class="title1 intro_mod"><?php the_field( 'title_1' ); ?></span>
            <span class="title2 intro_mod"><?php the_field( 'title_2' ); ?></span>
        </h2>
    </section>

    <section id="about" class="section">
        <h2 class="section_title">
            <span class="title1"><?php the_field( 'ab_title_1' ) ?></span>
            <span class="title2"><?php the_field( 'ab_title_2' ) ?></span>
        </h2>
        <div class="section_descr">
            <p><?php the_field( 'ab_descr' ); ?></p>
        </div>

		<?php if ( isset( $ab_posts ) && is_array( $ab_posts ) && ! empty( $ab_posts ) ) : ?>
            <ul class="stories_list">
				<?php foreach ( $ab_posts as $ab_postID ) :
					$ab_post = get_post( $ab_postID );
					$ab_image_url = get_the_post_thumbnail_url( $ab_post->ID, 'full' );
					?>
                    <li class="stories_l_item">
                        <a href="<?php the_permalink( $ab_post->ID ); ?>" class="image_link">
                            <figure class="image_wrap effect1_mod">
								<?php if ( $ab_image_url ) : ?>
                                    <img src="<?php echo $ab_image_url; ?>" class="img" alt="<?php echo $ab_post->post_title; ?>"/>
								<?php endif; ?>
                                <figcaption class="image_caption story_mod"><?php echo $ab_post->post_title; ?></figcaption>
                            </figure>
                        </a>
                    </li>
				<?php endforeach; ?>
            </ul>
		<?php endif; ?>

		<?php if ( have_rows( 'ab_facts' ) ) : ?>
            <ul class="facts_list">
				<?php while ( have_rows( 'ab_facts' ) ) : the_row(); ?>
                    <li class="facts_l_item">
                        <dl class="fact_block">
                            <dt class="fact_text"><?php the_sub_field( 'abf_text' ); ?></dt>
                            <dd class="fact_num"><?php the_sub_field( 'ab_numb' ); ?></dd>
                        </dl>
                    </li>
				<?php endwhile; ?>
            </ul>
		<?php endif; ?>
    </section>
    <section id="service" class="section">
        <h2 class="section_title">
            <span class="title1"><?php the_field( 'sv_title_1' ); ?></span>
            <span class="title2"><?php the_field( 'sv_title_2' ); ?></span>
        </h2>

		<?php if ( have_rows( 'sv_list' ) ) : ?>
            <ul class="services_list">
				<?php while ( have_rows( 'sv_list' ) ) : the_row(); ?>
                    <li class="services_l_item">
                        <div class="service_block <?php the_sub_field( 'sv_class' ); ?>_mod">
                            <h3 class="service_title"><?php the_sub_field( 'svl_title' ); ?></h3>
                            <div class="service_text">
                                <p><?php the_sub_field( 'sv_text' ); ?></p>
                            </div>
                        </div>
                    </li>
				<?php endwhile; ?>
            </ul>
		<?php endif; ?>
    </section>
    <section class="section">
        <h2 class="section_title">
            <span class="title1"><?php the_field( 'wwd_title_1' ); ?></span>
            <span class="title2"><?php the_field( 'wwd_title_2' ); ?></span>
        </h2>

		<?php if ( get_field( 'wwd_descr' ) ) : ?>
            <div class="section_descr">
                <p><?php the_field( 'wwd_descr' ); ?></p>
            </div>
		<?php endif; ?>

        <div class="what">
            <figure class="image_wrap what_mod">
                <img src="<?php the_field( 'wwd_img' ) ?>" class="img" alt="<?php the_field( 'wwd_title_2' ); ?>">
            </figure>

			<?php if ( have_rows( 'accordion' ) ) : ?>
                <ul class="accordion">
					<?php while ( have_rows( 'accordion' ) ) : the_row(); ?>
                        <li class="accordion_item">
                            <h3 class="accordion_title <?php the_sub_field( 'wwd_class' ); ?>_mod"><?php the_sub_field( 'wwda_title' ); ?></h3>
                            <div class="accordion_content" style="display: none;">
                                <p><?php the_sub_field( 'wwda_text' ); ?></p>
                            </div>
                        </li>
					<?php endwhile; ?>
                </ul>
			<?php endif; ?>
        </div>
    </section>
    <section class="section">
        <h2 class="section_title">
            <span class="title1"><?php the_field( 'tm_title_1' ); ?></span>
            <span class="title2"><?php the_field( 'tm_title_2' ); ?></span>
        </h2>
        <div class="section_descr">
            <p><?php the_field( 'tm_descr' ); ?></p>
        </div>

		<?php if ( isset( $team_arr ) && is_array( $team_arr ) && ! empty( $team_arr ) ) : ?>
            <ul class="team_list">
				<?php foreach ( $team_arr as $team_id ) :
					$team_obj = get_post( $team_id );
					$teamID = $team_obj->ID;
					$team_image_url = get_the_post_thumbnail_url( $teamID, 'full' );
					?>
                    <li class="team_l_item">
                        <div class="teammate_block">
                            <figure class="image_wrap effect1_mod">
                                <img src="<?php echo $team_image_url; ?>" alt="<?php echo $team_obj->post_title; ?>" title="<?php echo $team_obj->post_title; ?>" class="img"/>
								<?php if ( have_rows( 't_social', $teamID ) ) : ?>
                                    <figcaption class="image_caption">
                                        <ul class="teammate_socials">
											<?php while ( have_rows( 't_social', $teamID ) ) : the_row();
												$s_class = get_sub_field( 'name_social' );
												$s_class = strtolower( $s_class );
												?>
                                                <li class="teammate_s_item"><a href="<?php the_sub_field( 'social_link' ); ?>" class="teammate_s_link <?php echo $s_class; ?>_mod"></a></li>
											<?php endwhile; ?>
                                        </ul>
                                    </figcaption>
								<?php endif; ?>
                            </figure>
                            <span class="image_c_title"><?php echo $team_obj->post_title; ?></span>
                            <span class="image_c_text"><?php the_field( 't_pos', $teamID ); ?></span>
                        </div>
                    </li>
				<?php endforeach; ?>
            </ul>
		<?php endif; ?>
    </section>

	<?php if ( isset( $clients ) && is_array( $clients ) && ! empty( $clients ) ) : ?>
        <section class="section what_mod" style="background-image: url(<?php the_field( 'ts_bg_img' ); ?>);">
            <h2 class="section_title">
                <span class="title1"><?php the_field( 'ts_title_1' ); ?></span>
                <span class="title2"><?php the_field( 'ts_title_2' ); ?></span>
            </h2>
            <div class="clients">
				<?php foreach ( $clients as $client_id ) :
					$client = get_post( $client_id );
					$clientID = $client->ID;
					$client_image_url = get_the_post_thumbnail_url( $clientID, 'full' );
					?>
                    <div class="client_block">
                        <div class="client_image">
                            <img src="<?php echo $client_image_url; ?>" class="img" alt="<?php echo $client->post_title; ?>"/>
                        </div>
                        <div class="text_wrap">
                            <div class="image_c_title"><?php echo $client->post_title ?></div>
                            <div class="image_c_text"><?php the_field( 'ts_positions', $clientID ); ?></div>
                            <div class="text">
                                <p><?php echo $client->post_content; ?></p>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </section>
	<?php endif; ?>

	<?php if ( $blog_check ) : ?>
		<?php if ( $query->have_posts() ) : ?>
            <section id="blog" class="section">
                <h2 class="section_title">
                    <span class="title1"><?php the_field('b_title_1'); ?></span>
                    <span class="title2"><?php the_field('b_title_2'); ?></span>
                </h2>
                <ul class="recent_list">
                    <?php while ($query->have_posts()) :
                        $query->the_post();

                        $blogID = get_the_ID();
	                    $blog_image_url = get_the_post_thumbnail_url( $blogID, 'full' );
	                    $content = get_the_content();
	                    $trimmed_content = wp_trim_words($content, 23);
                        $month = get_the_date('M');
                        $day = get_the_date('j');
	                    ?>
                    <li class="recent_item">
                        <article class="post">
                            <div class="image_wrap blog_mod">
                                <img src="<?php echo $blog_image_url; ?>" class="img blog_mod" alt="<?php the_title(); ?>" />
                            </div>
                            <h2 class="post_title"><a href="#" class="post_link"><?php the_title(); ?></a></h2>
                            <div class="post_text">
                                <p><?php echo $trimmed_content; ?></p>
                            </div>
                            <a href="#" class="post_date"><span class="post_d_day"><?php echo $day; ?></span><span class="post_d_month"><?php echo $month; ?></span></a>
                            <div class="post_stat_wrap"><a href="#views" class="post_stat views_mod">123</a><a href="#comments" class="post_stat comm_mod">20</a></div>
                        </article>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </section>
		<?php endif;
		wp_reset_postdata(); ?>
	<?php endif; ?>
</div>


<?php get_footer(); ?>  