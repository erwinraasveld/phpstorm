<?php

if ( is_admin() )
{
    add_action( 'admin_menu', 'add_settings_menu' );
}

function add_settings_menu ()
{
	add_menu_page('Website options', 'Website opties', 'administrator', 'website-options', 'theme_settings');

    add_submenu_page('website-options', 'Contactgegevens', 'Contactgegevens', 'administrator', 'contact-settings', 'contact_settings');
	add_submenu_page('website-options', 'Bedrijfsgegevens', 'Bedrijfsgegevens', 'administrator', 'company-settings', 'company_settings');
	add_submenu_page('website-options', 'Socialmedia', 'Socialmedia', 'administrator', 'social-settings', 'social_settings');

	add_action( 'admin_init', 'register_theme_settings' );

}

function register_theme_settings ()
{
	// Website opties
    register_setting( 'theme_settings', 'page_contact');
	register_setting( 'theme_settings', 'website_set_image');

    // Contactgegevens
    register_setting( 'contact_settings', 'contact_companyname');
	register_setting( 'contact_settings', 'contact_street');
	register_setting( 'contact_settings', 'contact_streetnumber');
	register_setting( 'contact_settings', 'contact_city');
    register_setting( 'contact_settings', 'contact_zipcode');
    register_setting( 'contact_settings', 'contact_phone');
	register_setting( 'contact_settings', 'contact_mobile');
	register_setting( 'contact_settings', 'contact_fax');
	register_setting( 'contact_settings', 'contact_email');

    // Bedrijfsgegevens
	register_setting( 'company_settings', 'contact_kvk');
	register_setting( 'company_settings', 'contact_btw');
	register_setting( 'company_settings', 'contact_bank');
	register_setting( 'company_settings', 'contact_iban');
	register_setting( 'company_settings', 'contact_bic');

    // Socialmedia
	register_setting( 'social_settings', 'contact_facebook');
	register_setting( 'social_settings', 'contact_linkedin');
	register_setting( 'social_settings', 'contact_twitter');
	register_setting( 'social_settings', 'contact_google');
	register_setting( 'social_settings', 'contact_instagram');

}





/* ---------------------------------------- *\
 * Website options
/* ---------------------------------------- */

function theme_settings ()
{

    $args = array
    (
        'post_type'     => 'page',
        'posts_per_page'=> -1,
    );
    $pages_posts = get_posts( $args );
    $pages = array();

    foreach ( $pages_posts as $page )
    {
        $pages[$page->ID] = $page->post_title;
    }

    ?>

    <div class="wrap">

    <h2><?php _e('Website opties','ylt-dev'); ?></h2>

    <?php if (isset($_GET['settings-updated'])): ?>

        <div id="setting-error-settings_updated" class="updated settings-error">
        <p><strong>Instellingen opgeslagen.</strong></p></div>

    <?php endif; ?>

    <form method="post" action="options.php">
    <?php settings_fields( 'theme_settings' ); ?>
    <?php do_settings_sections( 'theme_settings' ); ?>

    <h3 class="title">Pagina's</h3>
    <table class="form-table">
    <tr>
        <th scope="row"><label>Contact</label></th>
        <td>
            <select name="page_contact">
                <?php foreach ( $pages as $id => $page ): ?>

                    <?php
                    $selected = '';
                    if ( $id == get_option('page_contact') )
                    {
                        $selected = 'selected="selected"';
                    }
                    ?>

                    <option value="<?php echo $id; ?>" <?php echo $selected; ?>>
                        <?php echo $page; ?>
                    </option>

                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    </table>

    <hr />

    <h3 class="title">Afbeelding instellingen</h3>
    <table class="form-table">
        <tr>
            <th scope="row"><label>Standaard afbeelding</label></th>
            <td><input type="text" placeholder="Plaats hier de URL van de afbeelding." name="website_set_image" value="<?php echo get_option('website_set_image'); ?>" class="regular-text"/></td>
        </tr>
    </table>

    <hr />

    <?php submit_button(__('Instellingen opslaan','ylt-dev')); ?>

    </form>
    </div>

    <?php

}





/* ---------------------------------------- *\
 * Contact settings
/* ---------------------------------------- */

function contact_settings ()
{
    ?>
    <div class="wrap">

    <h2><?php _e('Website opties','ylt-dev'); ?> - Contactgegevens</h2>

    <?php if (isset($_GET['settings-updated'])): ?>

        <div id="setting-error-settings_updated" class="updated settings-error">
        <p><strong>Instellingen opgeslagen.</strong></p></div>

    <?php endif; ?>

    <form method="post" action="options.php">
    <?php settings_fields( 'contact_settings' ); ?>
    <?php do_settings_sections( 'contact_settings' ); ?>

    <h3 class="title">Contactgegevens</h3>

    <table class="form-table">
        <tr>
            <th scope="row"><label><?php _e('Bedrijfsnaam', 'ylt-dev'); ?></label></th>
            <td><input type="text" name="contact_companyname" value="<?php echo get_option('contact_companyname'); ?>" class="regular-text"/></td>
        </tr>
        <tr>
            <th scope="row"><label><?php _e('Straatnaam en huisnummer', 'ylt-dev'); ?></label></th>
            <td>
                <input style="width:225px" type="text" name="contact_street" value="<?php echo get_option('contact_street'); ?>" class="regular-text"/>
                <input style="width:120px" type="text" placeholder="" name="contact_streetnumber" value="<?php echo get_option('contact_streetnumber'); ?>" class="regular-text"/>
            </td>
        </tr>
        <tr>
            <th scope="row"><label><?php _e('Plaats', 'ylt-dev'); ?></label></th>
            <td><input type="text" name="contact_city" value="<?php echo get_option('contact_city'); ?>" class="regular-text"/></td>
        </tr>
        <tr>
            <th scope="row"><label><?php _e('Postcode', 'ylt-dev'); ?></label></th>
            <td><input type="text" name="contact_zipcode" value="<?php echo get_option('contact_zipcode'); ?>" class="regular-text"/></td>
        </tr>
        <tr>
            <th scope="row"><label><?php _e('Telefoonnummer', 'ylt-dev'); ?></label></th>
            <td><input type="text" name="contact_phone" value="<?php echo get_option('contact_phone'); ?>" class="regular-text"/></td>
        </tr>
        <tr>
            <th scope="row"><label><?php _e('Mobielnummer', 'ylt-dev'); ?></label></th>
            <td><input type="text" name="contact_mobile" value="<?php echo get_option('contact_mobile'); ?>" class="regular-text"/></td>
        </tr>
        <tr>
            <th scope="row"><label><?php _e('Faxnummer', 'ylt-dev'); ?></label></th>
            <td><input type="text" name="contact_fax" value="<?php echo get_option('contact_fax'); ?>" class="regular-text"/></td>
        </tr>
        <tr>
            <th scope="row"><label><?php _e('E-mailadres', 'ylt-dev'); ?></label></th>
            <td><input type="text" name="contact_email" value="<?php echo get_option('contact_email'); ?>" class="regular-text"/></td>
        </tr>
    </table>

    <hr />

    <?php submit_button(__('Instellingen opslaan','ylt-dev')); ?>

    </form>
    </div>

    <?php
}


/* ---------------------------------------- *\
 * Company settings
/* ---------------------------------------- */

function company_settings ()
{
	?>
    <div class="wrap">

        <h2><?php _e('Website opties','ylt-dev'); ?> - Bedrijfsgegevens</h2>

		<?php if (isset($_GET['settings-updated'])): ?>

            <div id="setting-error-settings_updated" class="updated settings-error">
                <p><strong>Instellingen opgeslagen.</strong></p></div>

		<?php endif; ?>

        <form method="post" action="options.php">
			<?php settings_fields( 'company_settings' ); ?>
			<?php do_settings_sections( 'company_settings' ); ?>

            <table class="form-table">
                <tr>
                    <th scope="row"><label><?php _e('KvK', 'ylt-dev'); ?></label></th>
                    <td>
                        <input type="text" name="contact_kvk" value="<?php echo get_option('contact_kvk'); ?>" class="regular-text"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label><?php _e('BTW', 'ylt-dev'); ?></label></th>
                    <td><input type="text" name="contact_btw" value="<?php echo get_option('contact_btw'); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th scope="row"><label><?php _e('Bankrekening', 'ylt-dev'); ?></label></th>
                    <td><input type="text" name="contact_bank" value="<?php echo get_option('contact_bank'); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th scope="row"><label><?php _e('IBAN', 'ylt-dev'); ?></label></th>
                    <td><input type="text" name="contact_iban" value="<?php echo get_option('contact_iban'); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th scope="row"><label><?php _e('BIC', 'ylt-dev'); ?></label></th>
                    <td><input type="text" name="contact_bic" value="<?php echo get_option('contact_bic'); ?>" class="regular-text"/></td>
                </tr>
            </table>

            <hr />

			<?php submit_button(__('Instellingen opslaan','ylt-dev')); ?>

        </form>
    </div>

	<?php
}



/* ---------------------------------------- *\
 * Social settings
/* ---------------------------------------- */

function social_settings ()
{
	?>
    <div class="wrap">

        <h2><?php _e('Website opties','ylt-dev'); ?> - Socialmedia</h2>

		<?php if (isset($_GET['settings-updated'])): ?>

            <div id="setting-error-settings_updated" class="updated settings-error">
                <p><strong>Instellingen opgeslagen.</strong></p></div>

		<?php endif; ?>

        <form method="post" action="options.php">
			<?php settings_fields( 'social_settings' ); ?>
			<?php do_settings_sections( 'social_settings' ); ?>

            <table class="form-table">
                <tr>
                    <th scope="row"><label><?php _e('Facebook', 'ylt-dev'); ?></label></th>
                    <td>
                        <input type="text" name="contact_facebook" value="<?php echo get_option('contact_facebook'); ?>" class="regular-text"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label><?php _e('LinkedIN', 'ylt-dev'); ?></label></th>
                    <td><input type="text" name="contact_linkedin" value="<?php echo get_option('contact_linkedin'); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th scope="row"><label><?php _e('Twitter', 'ylt-dev'); ?></label></th>
                    <td><input type="text" name="contact_twitter" value="<?php echo get_option('contact_twitter'); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th scope="row"><label><?php _e('Google+', 'ylt-dev'); ?></label></th>
                    <td><input type="text" name="contact_google" value="<?php echo get_option('contact_google'); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th scope="row"><label><?php _e('Instagram', 'ylt-dev'); ?></label></th>
                    <td><input type="text" name="contact_instagram" value="<?php echo get_option('contact_instagram'); ?>" class="regular-text"/></td>
                </tr>
            </table>

            <hr />

			<?php submit_button(__('Instellingen opslaan','ylt-dev')); ?>

        </form>
    </div>

	<?php
}