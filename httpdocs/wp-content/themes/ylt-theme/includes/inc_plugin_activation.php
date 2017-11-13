<?php





require_once get_template_directory() . '/includes/vendor/tgm-plugin-activation/class-tgm-plugin-activation.php';

function ylt_register_required_plugins()
{





    /* ---------------------------------------- *\
     * Config
    \* ---------------------------------------- */

    $config = array
    (
		'id'           => 'ylt-dev',
		'default_path' => get_template_directory() . '/includes/vendor/tgm-plugin-activation/plugins/',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => false,
		'dismissable'  => true,
		'is_automatic' => false,
	);





    /* ---------------------------------------- *\
     * Plugins
    \* ---------------------------------------- */

    $plugins = array
    (
        array
        (
            'name'               => 'YLT Preview',
			'slug'               => 'ylt-preview',
			'source'             => 'ylt-preview.zip',
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
		),

        array
        (
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

        array
        (
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
		),

        array
        (
			'name'      => 'TinyMCE Advanced',
			'slug'      => 'tinymce-advanced',
			'required'  => false,
		),

        array
        (
			'name'      => 'Intuitive Custom Post Order',
			'slug'      => 'intuitive-custom-post-order',
			'required'  => false,
		),

        array
        (
			'name'      => 'Redirection',
			'slug'      => 'redirection',
			'required'  => false,
		),

        array
        (
			'name'      => 'Breadcrumb NavXT',
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),

        array
        (
			'name'      => 'Disable Emails',
			'slug'      => 'disable-emails',
			'required'  => false,
		),

        array
        (
			'name'               => 'WPML',
			'slug'               => 'sitepress-multilingual-cms',
			'source'             => 'sitepress-multilingual-cms.3.7.1.zip',
			'required'           => false,
		),

        array
        (
			'name'               => 'WPML String Translation',
			'slug'               => 'wpml-string-translation',
			'source'             => 'wpml-string-translation.2.5.4.zip',
			'required'           => false,
		),

        array
        (
			'name'               => 'Updraft Plus',
			'slug'               => 'updraftplus',
			'source'             => 'updraftplus.2.13.7.zip',
			'required'           => false,
		),
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'ylt_register_required_plugins' );
