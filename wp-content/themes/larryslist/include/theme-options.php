<?php
/*
 * @larryslist
 *
 * Admin Options for larryslist
 * File Name: theme-options.php
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
exit; } ?>
<?php
// set variables for theme options
$larryslist_theme_options = array(
    'larryslist_cppp'         => '20',
    'larryslist_excerpt_size' => '50',
    'larryslist_newtitle'     => '',
    'larryslist_email'        => '',
    'larryslist_facebookurl'  => '',
    'larryslist_twitterurl'   => '',
    'larryslist_googleurl'    => '',
    'larryslist_links'        => '#0000ee',
    'larryslist_credits'      => '',
    'larryslist_new_text'     => ''
    );

add_action( 'admin_menu', 'larryslist_options_add_page' );
function larryslist_options_add_page() {
    add_theme_page( 'Larryslist Options', 'Larryslist Options', 'edit_theme_options', 'larryslist-options', 'larryslist_options_page' );
}

    // connect stylesheet to options page
    function larryslist_add_init() {
    wp_enqueue_style( 'larryslist-admin-style', get_template_directory_uri() . '/include/larryslist-admin-style.css', false, '1.1' );
    }
    add_action( 'admin_enqueue_scripts', 'larryslist_add_init' );
    // register settings
    function larryslist_register_settings() {
        register_setting( 'larryslist-options', 'larryslist_theme_options', '');
    }
    add_action( 'admin_init', 'larryslist_register_settings' );

    /*
     * color picker add on
     */
    add_action( 'admin_enqueue_scripts', 'larryslist_add_color_picker' );
    function larryslist_add_color_picker() {
        // Add the color picker css file
        wp_enqueue_style( 'wp-color-picker' );
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'wp-color-picker-script', get_template_directory_uri() . '/js/custom-script.js', array( 'wp-color-picker' ), false, true );
    }

    function larryslist_options_page() {
        global $larryslist_theme_options;
?>
<div class="options-container">
    <figure> <h1><?php esc_html_e( 'Options Page', 'larryslist' ); ?> </h1>  </figure>
	<h2><?php esc_html_e( 'Larryslist Theme Settings', 'larryslist' ); ?></h2>
            <hr>
            <h2><?php esc_html_e( 'How to make a "Listings" page', 'larryslist' ); ?></h2>

	    <div class="bgh">
                <ul>
<li><?php esc_html_e( 'Please install the plugin or re-activate if you have switched themes.', 'larryslist' ); ?></li>
<li><a href="" title="<?php esc_attr_e( 'Listings will not display in Standard WP Blog page.', 'larryslist' ); ?>"><?php esc_html_e( 'To make listings viewable', 'larryslist' ); ?></a> <?php esc_html_e( 'create a page using the template, <b>"View Listings"</b> then add that page to your menu or make it the Static home page.', 'larryslist' ); ?></li>
<li><?php esc_html_e( 'Registered members will have their own Dashboard and editor access.', 'larryslist' ); ?></li>
<li><?php esc_html_e( 'For more on How To Select Templates see', 'larryslist' ); ?><br>
<?php  $url = "http://en.support.wordpress.com/pages/page-attributes/"; ?>
<a href="http://en.support.wordpress.com/pages/page-attributes/" target="_blank" title="<?php esc_attr_e( 'opens in new window', 'larryslist'); ?>">
<?php echo esc_url($url); ?></a></li>
                </ul>
            </div>
            <form action="options.php" method="POST">
            <?php settings_fields( 'larryslist-options' ); ?>
            <?php //do_settings_sections( 'larryslist-options' );
            $options = get_option( 'larryslist_theme_options', $larryslist_theme_options );
            ?>
            <hr>
            <h3><?php esc_html_e( 'Set number of listings on View page', 'larryslist' ); ?></h3>
            <?php if( empty( $options['larryslist_cppp']) ) {
            $default_size = 20; }
            else { $default_size = $options['larryslist_cppp'];
            } ?>
            <table class="options-table">
            <tr><td><label><b><?php esc_html_e( 'Number of Listings displayed on View Listings page.', 'larryslist' ); ?></b></label> </td><td>
            <input type="number" name="larryslist_theme_options[larryslist_cppp]" value="<?php echo esc_attr( $default_size ); ?>" min="1" max="150" /></td></tr>
            <tr><td><?php esc_html_e( 'Default is 20', 'larryslist' ); ?></td></tr></table>

            <hr>
            <h3><?php esc_html_e( 'Set length of excerpts for listings', 'larryslist' ); ?></h3>
            <?php if( empty( $options['larryslist_excerpt_size']) ) {
            $default_size = 50; }
            else { $default_size = $options['larryslist_excerpt_size'];
            } ?>
            <table class="options-table">
            <tr><td><label><b><?php esc_html_e( 'Number of words in excerpt displayed on page.', 'larryslist' ); ?></b></label> </td><td>
<input type="number" name="larryslist_theme_options[larryslist_excerpt_size]" value="<?php echo esc_attr( $default_size ); ?>" min="1" max="150" /></td></tr>
            <tr><td><?php esc_html_e( 'WordPress default is 55 words. Larryslist default is 50. Allowed: 1 - 150', 'larryslist' ); ?></td></tr></table>
            <hr>

                <h3><?php esc_html_e( 'Add Alternate Title plus your social media links here', 'larryslist' ); ?></h3>

                    <table class="options-table">
        <tr><td><label><b><?php esc_html_e( 'New Title on Main Page', 'larryslist' ); ?></b></label> </td><td>
<input type="text" name="larryslist_theme_options[larryslist_newtitle]" size="40" value="<?php echo esc_attr( $options['larryslist_newtitle'] ); ?>" /></td></tr>

        <tr><td><label><?php esc_html_e( 'Email Address', 'larryslist' ); ?></label> </td><td>
<input type="text" name="larryslist_theme_options[larryslist_email]" size="40" value="<?php echo esc_url( $options['larryslist_email'] ); ?>" /></td></tr>

       <tr><td><label>Facebook</label> </td><td>
<input type="text" name="larryslist_theme_options[larryslist_facebookurl]" size="40" value="<?php echo esc_url( $options['larryslist_facebookurl'] ); ?>" /></td></tr>

                <tr><td><label>Twitter</label> </td><td>
<input type="text" name="larryslist_theme_options[larryslist_twitterurl]" size="40" value="<?php echo esc_url( $options['larryslist_twitterurl'] ); ?>" /></td></tr>

                <tr><td><label>Google</label> </td><td>
<input type="text" name="larryslist_theme_options[larryslist_googleurl]" size="40" value="<?php echo esc_url( $options['larryslist_googleurl'] ); ?>" /></td></tr>

       <tr><td></td><td><small><?php esc_html_e( 'Include the full address to your links', 'larryslist' ); ?></small></td></tr></table>
                        <hr>
                            <h3><?php esc_html_e( 'Color for Widget Links, Content Links and Alternate Title', 'larryslist' ); ?></h3>
                            <table class="options-table">
                            <tr><td><label><?php esc_html_e( 'Change Link Color', 'larryslist' ); ?> </label> </td>
<td> <input type="text" name="larryslist_theme_options[larryslist_links]" value="<?php echo esc_attr( $options['larryslist_links'] ); ?>" class="larryslist-color-field" /></td></tr>
                            </table>
                                <hr>

                                    <h3><?php esc_html_e( 'Check box to remove credits from theme footer section.', 'larryslist' ); ?></h3>
                                        <?php  if ( !empty( $options['larryslist_credits'] )) {
                                        $checked = $options['larryslist_credits'];
                                        $current = "checked = checked"; } else { $current = ""; }
                                        ?>
                <table><tr><td><input name="larryslist_theme_options[larryslist_credits]" id="larryslist_credits" type="checkbox"
                value="1" <?php echo esc_attr($current); ?> />
                <small><?php esc_html_e( 'You do not have to leave footer credits but it would be nice.', 'larryslist' ); ?></small></td></tr>
                <tr><td><p><?php esc_html_e( 'Replace the footer credit with your own text here', 'larryslist' ); ?></p>
                <input id="larryslist_new_text" name="larryslist_theme_options[larryslist_new_text]" size="40" type="text"
value="<?php if (!empty($options['larryslist_new_text'])) echo esc_attr( $options['larryslist_new_text'] ); ?>" /></td></tr>
                </table>
    <?php submit_button(); ?>
                </form>
<p><?php _e( 'For custom configuration of LarrysList please email Larry @ <a href="mailto:larry@tradesouthwest.com">larry@tradesouthwest.com</a><br><small>Plugin only works on this theme. Custom plugins for other themes available.</small>', 'larryslist' ); ?></p>
</div>

<?php
}

function larryslist_validate_options( $input ) {

        // We strip all tags from the text field, to avoid vulnerablilties like XSS
        $input['larryslist_excerpt_size'] = esc_attr( $input['larryslist_excerpt_size'] );
        $input['larryslist_newtitle']     = esc_attr( $input['larryslist_newtitle'] );
        $input['larryslist_email']        = sanitize_email( $input['larryslist_email'] );
        $input['larryslist_facebookurl']  = esc_url( $input['larryslist_facebookurl'] );
        $input['larryslist_twitterurl']   = esc_url( $input['larryslist_twitterurl'] );
        $input['larryslist_googleurl']    = esc_url( $input['larryslist_googleurl'] );
        $input['larryslist_links']        = esc_url( $input['larryslist_links'] );
        $input['larryslist_credits']      = esc_attr( $input['larryslist_credits'] );
        $input['larryslist_new_text']     = sanitize_text_field( $input['larryslist_new_text'] );
           return $input;
    }

// create custom background style for sidebar
function larryslist_styles_method() {
    wp_enqueue_style(
    'custom-style',
    get_template_directory_uri() . '/include/custom.css'
    );
        $options = get_option( 'larryslist_theme_options' );

        $custom_css = "
             .entry a, .entry-title a, .widget-container a, .default-widget a, #listings-view .listing a, #listings-view .listing a:visited, .othersby a, .alt-title {
             color: {$options['larryslist_links'] };
        }";
    wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'larryslist_styles_method' );

// change default size of excerpt
function larryslist_excerpt_length($length) {

    $options = get_option( 'larryslist_theme_options' );
    if (isset ( $options['larryslist_excerpt_size'] ) ) { $default_length = $options['larryslist_excerpt_size']; }
    else { $default_length = 50;
    }
        return $default_length;

}
add_action( 'excerpt_length', 'larryslist_excerpt_length', 150 );

?>
