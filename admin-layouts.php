<?php
/**
	Plugin Name: Admin Layouts
	Plugin URI: http://weblumia.com/admin-layouts/
	Description: To make your admin layout more attractive and colorful.
	Version: 1.4.2
	Author: Jinesh.P.V
	Author URI: http://weblumia.com/admin-layouts/
	License: GPLv2 or later
 */
/**
	Copyright 2013 Jinesh.P.V (email: jinuvijay5@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */


add_action( 'admin_menu', 'wp_admin_layouts_add_menu' );
add_action( 'admin_init', 'wp_blog_layouts_reg_function' );
add_action( 'admin_init', 'wp_admin_layouts_admin_stylesheet' );
add_action( 'admin_init', 'wp_admin_layouts_scripts' );

register_activation_hook( __FILE__, 'wp_admin_layouts_activate' );

function wp_admin_layouts_add_menu() {
	add_menu_page( 'Admin Layouts', 'Admin Layouts', 'administrator', 'layouts_settings', 'wp_admin_layouts_menu_function' );
}


function wp_admin_layouts_activate() {
	
}

function wp_blog_layouts_reg_function() {
	
	$settings						=	get_option( "wp_admin_layouts_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
							'template_bgcolor'	 		=>      '#474747',
							'template_hbgcolor'			=>		'#000000',
							'template_ftcolor'	 		=>      '#18b0c4',
							'template_fthcolor'	 		=>      '#ffef42'
						);
						
		add_option( "wp_admin_layouts_settings", $settings, '', 'yes' );
	}
}

if( $_REQUEST['action'] === 'save' && $_REQUEST['updated'] === 'true' ){
	$settings						=	$_POST;
	$settings						=	is_array( $settings ) ? $settings : unserialize( $settings );
	$updated						=	update_option( "wp_admin_layouts_settings", $settings );
}

function wp_admin_layouts_admin_stylesheet() {
	
	$adminstylesheetURL 			= 	plugins_url( 'css/main.css', __FILE__ );
	$adminstylesheet 				= 	dirname( __FILE__ )  . '/css/main.css';
	
	$fontstylesheetURL 				= 	plugins_url( 'css/fonts.css', __FILE__ );
	$fontstylesheet 				= 	dirname( __FILE__ )  . '/css/fonts.css';
	
	$customstylesheetURL 			= 	plugins_url( 'css/custom.php', __FILE__ );
	$customstylesheet 				= 	dirname( __FILE__ )  . '/css/custom.php';
	
	$colorpickerstylesheetURL 		= 	plugins_url( 'css/colorpicker.css', __FILE__ );
	$colorpickerstylesheet 			= 	dirname( __FILE__ )  . '/css/colorpicker.css';
	
	if ( file_exists( $adminstylesheet ) ) {
		
		wp_register_style( 'wp-admin-stylesheets', $adminstylesheetURL );
		wp_enqueue_style( 'wp-admin-stylesheets' );
	}
	
	if ( file_exists( $fontstylesheet ) ) {
		
		wp_register_style( 'wp-fonts-stylesheets', $fontstylesheetURL );
		wp_enqueue_style( 'wp-fonts-stylesheets' );
	}
	
	if ( file_exists( $customstylesheet ) ) {
		
		wp_register_style( 'wp-custom-stylesheets', $customstylesheetURL );
		wp_enqueue_style( 'wp-custom-stylesheets' );
	}
	
	if ( file_exists( $colorpickerstylesheet ) ) {
		
		wp_register_style( 'wp-colorpicker-stylesheets', $colorpickerstylesheetURL );
		wp_enqueue_style( 'wp-colorpicker-stylesheets' );
	}
}

function wp_admin_layouts_scripts() {
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cpicker', plugins_url( '/js/cpicker.js', __FILE__ ), '1.2' );
	wp_enqueue_script( 'eye', plugins_url( '/js/eye.js', __FILE__ ), '2.0' );
	wp_enqueue_script( 'bound', plugins_url( '/js/bound.js', __FILE__ ), '1.8.5' );
	wp_enqueue_script( 'layout', plugins_url( '/js/layout.js', __FILE__ ), '1.0.2' );
}

function wp_admin_layouts_menu_function() {
?>

<div class="wrap">
    <h2><?php _e( 'Admin Layouts Settings', 'wp-admin_layouts' ) ?></h2>
    <?php if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Layout Settings updated.</p></div>';?>
    <?php $settings			=	get_option( "wp_admin_layouts_settings" );?>
    <form method="post" action="?page=layouts_settings&action=save&updated=true">
        <div class="wl-pages" >
            <div class="wl-page wl-settings active">
                <div class="wl-box wl-settings">
                    <h3 class="header"><?php _e( 'General Settings', 'wp-admin_layouts' ) ?></h3>
                    <table>
                        <tbody>
                            <tr>
                                <td><?php _e( 'Choose a background color for admin layout', 'wp-admin_layouts' ) ?></td>
                                <td>
                                    <input type="text" name="template_bgcolor" id="template_bgcolor" value="<?php echo $settings["template_bgcolor"];?>"/>
                                 </td>
                            </tr>
                            <tr>
                                <td><?php _e( 'Choose a menu background color for admin layout', 'wp-admin_layouts' ) ?></td>
                                <td>
                                    <input type="text" name="template_hbgcolor" id="template_hbgcolor" value="<?php echo $settings["template_hbgcolor"];?>"/>
                                 </td>
                            </tr>
                            <tr>
                                <td><?php _e( 'Choose a font color for admin layout', 'wp-admin_layouts' ) ?></td>
                                <td>
                                    <input type="text" name="template_ftcolor" id="template_ftcolor" value="<?php echo $settings["template_ftcolor"];?>"/>
                                 </td>
                            </tr>
                            <tr>
                                <td><?php _e( 'Choose a font hover color for admin layout', 'wp-admin_layouts' ) ?></td>
                                <td>
                                    <input type="text" name="template_fthcolor" id="template_fthcolor" value="<?php echo $settings["template_fthcolor"];?>"/>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="wl-box wl-publish">
            <h3 class="header"><?php _e('Publish', 'wp-blog_layouts') ?></h3>
            <div class="inner">
                <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'wp-blog_layouts' ); ?>" />
                <p class="wl-saving-warning"></p>
                <div class="clear"></div>
            </div>
        </div>
    </form>
</div>

<?php }
?>