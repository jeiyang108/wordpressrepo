<?php
/**
 * Register widget with WordPress.
 */
class Larryslist_Widget extends WP_Widget {

function larryslist_load_textdomain() {
  load_plugin_textdomain( 'larryslist', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

function __construct() {
parent::__construct(
// Base ID of widget
'Larryslist_Widget',

// Widget name will appear in UI
__( 'Listing Sidebar', 'larryslist' ), // Name
			array( 'description' => __( 'Login or Register Widget', 'larryslist' ), ) // Args
);
}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
			if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

	// This is where you run the code and display the output
	?>

<section id="right-sidebar">
    <div class="default-widget">
        <p><?php get_search_form(); ?></p>
        <h3 class="widgettitle"><?php bloginfo('name'); ?></h3>
            <ul>
                <?php wp_list_categories( 'orderby=name&order=ASC&style=list&show_count=1&hide_empty=0&taxonomy=tsw-taxonomy' ); ?>
            </ul>
                <h3 class="widgettitle"><?php esc_html_e( 'Member Access', 'larryslist' ); ?></h3>
<?php if ( is_user_logged_in() ) : ?>
                <?php global $user_ID, $user_identity, $user_level ?>
                <?php if ( $user_ID ) : ?>
                    <ul>
                        <li><?php esc_html_e( 'Identified as ', 'larryslist' ); ?><em><?php echo esc_attr($user_identity); ?></em>
                    </ul>
                <?php endif; ?>
                        <ul>
<li><a href="wp-admin/"><?php esc_html_e( 'Dashboard', 'larryslist' ); ?></a></li>

<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/wp-login.php?action=logout&amp;redirect_to=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>">
Exit</a></li>
                       </ul>

                <?php elseif ( !is_user_logged_in() ) : ?>
                  <h2><?php esc_html_e( 'Log In or Register', 'larryslist' ); ?></h2>
                <ul>
                    <li>
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>/wp-login.php" method="post">
                <p><label for="log"><input type="text" name="log" id="log" size="22" /> <?php esc_html_e( 'User', 'larryslist' ); ?></label><br />
                <label for="pwd"><input type="password" name="pwd" id="pwd" size="22" /> <?php esc_html_e( 'Password', 'larryslist' ); ?></label><br />
                <input type="submit" name="submit" value="<?php esc_attr_e( 'Send', 'larryslist' ); ?>" class="button" />
                <label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> <?php esc_html_e( 'Remember me', 'larryslist' ); ?></label><br />
                </p>
                <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ); ?>" />
                </form>
                </li>
                <li><a href="<?php echo wp_registration_url(); ?>" title="<?php esc_attr_e( 'Register', 'larryslist' ); ?>"><?php esc_html_e( 'Register', 'larryslist' ); ?></a></li>
                <li><a href="<?php echo wp_lostpassword_url(); ?>" title="<?php esc_attr_e( 'Lost Password', 'larryslist' ); ?>"><?php esc_html_e( 'Recover password', 'larryslist' ); ?></a></li>
                </ul>
<?php endif; ?>
    </div>
</section>

<?php
	// return after widget parts
echo $args['after_widget'];
}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'larryslist' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'larryslist' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
} // class Larryslist_Widget

// Register and load the widget
	function larryslist_load_widget() {
		register_widget( 'larryslist_widget' );
}

add_action( 'widgets_init', 'larryslist_load_widget' );
?>