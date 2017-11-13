




<?php get_header(); ?>





<h1><?php _e('Pagina niet gevonden', 'ylt-dev'); ?></h1>
<p><?php _e('Deze pagina bestaat helaas (niet) meer of is verplaatst', 'ylt-dev'); ?></p>
<p><?php
printf
(
    __('Probeert u het nogmaals vanaf onze %s, of neem contact met ons op.', 'ylt-dev'),
    '<a href="'. HOME_URL .'">'. __('homepage', 'ylt-dev') .'</a>'
);
?></p>





<?php get_footer(); ?>
