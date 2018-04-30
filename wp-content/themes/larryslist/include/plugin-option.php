<?php

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */

require_once  get_template_directory() . '/include/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'larryslist_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function larryslist_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

// This includes required plugin pre-packaged with theme.
    array(
        'name'               => 'TSW Custom Listings Plugin', // The plugin name.
        'slug'               => 'tsw-custom-listing', // The plugin slug (typically the folder name).
        'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        )
    );
    tgmpa( $plugins );

}
?>