




<?php get_header(); ?>





<?php while ( have_posts() ): the_post(); ?>

    <div class="container">
	    <?php the_content(); ?>

        <div class="row">
            <div class="col-xs-12">
            </div>
            <div class="col-xs-12">

            </div>
        </div>
    </div>


<?php endwhile; ?>





<?php get_footer(); ?>
