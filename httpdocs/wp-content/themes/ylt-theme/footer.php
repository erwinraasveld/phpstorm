
<footer>

    <section class="widget">
        <div class="container">
            <div class="row">
<!--                <div class="col-md-6 menus">-->
<!--		            --><?php //dynamic_sidebar('footer-blok-1') ?>
<!--		            --><?php //dynamic_sidebar('footer-blok-2') ?>
<!--		            --><?php //dynamic_sidebar('footer-blok-3') ?>
<!--		            --><?php //dynamic_sidebar('footer-blok-4') ?>
<!--                </div>-->
<!--                <div class="col-md-5 col-md-offset-1 nieuwsbrief">-->
<!--		            --><?php //dynamic_sidebar('footer-blok-5') ?>
<!--                </div>-->
				<div class="col-md-7 menus">
		            <?php dynamic_sidebar('footer-blok-1') ?>
		            <?php dynamic_sidebar('footer-blok-2') ?>
		            <?php dynamic_sidebar('footer-blok-3') ?>
		            <?php dynamic_sidebar('footer-blok-4') ?>
                </div>
            </div>
        </div>

    </section>
    <section class="sep">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="line"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p><?php printf("© %s StipStap. %s.",date('Y'),__('Alle rechten voorbehouden','ylt-dev')) ?></p>
                </div>
            </div>
        </div>
    </section>
</footer>




<?php wp_footer(); ?>

</body>

</html>