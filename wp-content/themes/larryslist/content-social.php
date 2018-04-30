<section class="social-box">
    <h4 class="social-header"><?php esc_html_e( 'These are Our Social Links', 'larryslist' ); ?></h4>

        <?php $options = get_option( 'larryslist_theme_options' ); ?>

        <ul class="social-links">

        <li><?php if( !empty( $options['larryslist_email'] ) ) {
                      $emailimg = get_stylesheet_directory_uri(). '/include/images/mail.png'; ?>
        <a href="mailto:<?php echo esc_attr( $options['larryslist_email'] ); ?>" title="<?php echo esc_attr( $options['larryslist_email'] ); ?>"><img class="social-icons" src="<?php echo esc_url( $emailimg ); ?>" alt="<?php esc_attr_e( 'email', 'larryslist' ); ?>" /></a>
        <?php } ?></li>

        <li><?php if( !empty( $options['larryslist_facebookurl'] ) ) {
                      $imgurl = get_stylesheet_directory_uri(). '/include/images/facebook.png'; ?>
        <a href="<?php echo esc_url( $options['larryslist_facebookurl'] ); ?>" title="<?php echo esc_url( $options['larryslist_facebookurl'] ); ?>" target="_blank"><img class="social-icons" src="<?php echo esc_url( $imgurl ); ?>" alt="<?php echo esc_url( $options['larryslist_facebookurl'] ); ?>"></a>
        <?php } ?></li>

        <li><?php if( !empty( $options['larryslist_twitterurl'] ) ) {
                      $imgurl = get_stylesheet_directory_uri(). '/include/images/twitter.png'; ?>
        <a href="<?php echo esc_url( $options['larryslist_twitterurl'] ); ?>" title="<?php echo esc_url( $options['larryslist_twitterurl'] ); ?>" target="_blank"><img class="social-icons" src="<?php echo esc_url( $imgurl ); ?>" alt="<?php echo esc_url( $options['larryslist_twitterurl'] ); ?>"></a>
        <?php } ?></li>

        <li><?php if( !empty( $options['larryslist_googleurl'] ) ) {
                      $imgurl = get_stylesheet_directory_uri().'/include/images/google_plus.png'; ?>
        <a href="<?php echo esc_url( $options['larryslist_googleurl'] ); ?>" title="<?php echo esc_url( $options['larryslist_googleurl'] ); ?>" target="_blank"><img class="social-icons" src="<?php echo esc_url( $imgurl ); ?>" alt="<?php echo esc_url( $options['larryslist_googleurl'] ); ?>"></a>
        <?php } ?></li>

        </ul>
</section>