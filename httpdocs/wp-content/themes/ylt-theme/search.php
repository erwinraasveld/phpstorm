




<?php get_header(); ?>





<?php if ( have_posts() ) : ?>

    <h1>
        <?php
        printf
        (
            __( 'Zoek resulaten voor: %s', 'ylt-dev' ),
            '<span>' . get_search_query() . '</span>'
        );
        ?>
    </h1>    

    <?php while ( have_posts() ): the_post(); ?>

        <h2>
            <a  href="<?php the_permalink();?>"
                title="<?php the_title();?>"
            >
                <?php echo the_title(); ?>
            </a>	
        </h2>
        <?php the_excerpt(); ?>

    <?php endwhile; ?>

<?php else : ?>

    <h1><?php _e( 'Geen resultaten gevonden', 'ylt-dev' ); ?></h1>
    
    <p><?php _e( 'Sorry, maar niets gevonden die aan uw zoekcriteria voldoet. Probeer het opnieuw met een aantal verschillende zoekwoorden.', 'ylt-dev' ); ?></p>
    
    <?php get_search_form(); ?>
    
<?php endif; ?>					    





<?php get_footer(); ?>
