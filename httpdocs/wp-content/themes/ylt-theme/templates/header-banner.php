<?php
$titelmeta = get_post_meta(get_the_ID(),'ylt_header_titel',1);
$titel = (isset($titelmeta) && $titelmeta != '' ? sprintf('<h1>%s</h1>',$titelmeta) : sprintf('<h1>%s</h1>',get_the_title()));

$ondertitelMeta = get_post_meta(get_the_ID(),'ylt_header_oTitel',1);
$ondertitel = (isset($ondertitelMeta) && $ondertitelMeta != '' ? sprintf('<p class="ondertitel">%s</p>',$ondertitelMeta) : '');

$headerClass = 'header-banner';
$headerStyle = '';



$afbeeldingMeta = get_post_meta(get_the_ID(),'ylt_header_afbeelding_checkbox',1);
if(isset($afbeeldingMeta) && $afbeeldingMeta == 'on') {
	$headerClass = 'header-banner afbeelding';
	$afbeeldingen = get_post_meta(get_the_ID(),'ylt_header_afbeelding',1);

	$afbeeldingID = get_image_id_from_url($afbeeldingen[array_rand($afbeeldingen)]);
	$afbeelding = wp_get_attachment_image_url($afbeeldingID,'header-banner');


	$headerStyle = sprintf("style='background-image:url(%s);'",$afbeelding);
}

$knop = '';
$knopMeta = get_post_meta(get_the_ID(),'ylt_header_knop_checkbox',1);
if(isset($knopMeta) && $knopMeta == 'on'){
	$link = get_post_meta(get_the_ID(),'ylt_header_knop_link',1);
	$tekst = get_post_meta(get_the_ID(),'ylt_header_knop_tekst',1);
	$knop = sprintf('<a class="knop groot oranje" href="%s">%s</a>',$link,$tekst);
}
?>

<section class="<?php echo $headerClass ?>" <?php echo $headerStyle ?>>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<?php echo $titel ?>
				<?php echo $ondertitel ?>
				<?php echo $knop ?>

			</div>
		</div>
	</div>
</section>