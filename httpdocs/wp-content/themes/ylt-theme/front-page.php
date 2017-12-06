<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="the-content">
        <div class="container">
            <div>
				<?php the_content(); ?>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
