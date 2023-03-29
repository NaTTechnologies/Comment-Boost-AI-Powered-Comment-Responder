<?php
// Define plugin settings page
function chatterboost_settings_page() {
    add_menu_page(
        __('ChatterBoost Settings', 'chatterboost'),
        __('ChatterBoost', 'chatterboost'),
        'manage_options',
        'chatterboost-settings',
        'chatterboost_render_settings_page',
        'dashicons-format-chat'
    );
}
add_action('admin_menu', 'chatterboost_settings_page');

function chatterboost_render_settings_page() {
    $openai_api_key = get_option( 'openai_api_key' );
    ?>
    <div class="wrap">
        <h1><?php _e('ChatterBoost Settings', 'chatterboost'); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'chatterboost_settings' ); ?>
            <?php do_settings_sections( 'chatterboost_settings' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php _e('OpenAI API Key', 'chatterboost'); ?></th>
                    <td><input type="password" required name="openai_api_key" class="regular-text" value="<?php echo esc_attr( $openai_api_key ); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function chatterboost_register_settings() {
    register_setting( 'chatterboost_settings', 'openai_api_key' );
}
add_action( 'admin_init', 'chatterboost_register_settings' );
