<?php
/*
Plugin Name: Remove BuddyPress Admin Bar
Plugin URI: http://www.alessandroraffa.it/en/wordpress-plugins/
Description: This plugin simply removes the BuddyPress Admin Bar. It's ready-to-use: just activate it; no options needed.
Version: 1.4
Author: Alessandro Raffa
Author URI: http://www.alessandroraffa.it/en/
*/
/*  Copyright 2009  Alessandro Raffa  (email: info@alessandroraffa.it)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to 
			Free Software Foundation, Inc.,
			51 Franklin St, Fifth Floor, 
			Boston, MA  02110-1301 USA
		or see <http://www.gnu.org/licenses/gpl.txt>.
*/

/** Functions */
function arit_remove_buddypress_admin_bar_install() { /* @todo: check if WPMU + BudyPress is installed */ }
function arit_remove_buddypress_admin_bar_init() { // Thanks Steve! :-)
	/* @todo: check if WPMU + BudyPress is installed */
	if ( function_exists('bp_core_admin_bar') ) remove_action( 'wp_footer', 'bp_core_admin_bar', 8 );
	if ( function_exists('bp_core_admin_bar') ) remove_action( 'admin_footer', 'bp_core_admin_bar' );
	if ( function_exists('bp_core_admin_bar_css') ) {
		remove_action( 'wp_head', 'bp_core_admin_bar_css', 1 ); // priority 1 for RC2 BuddyPress release
	}
	if ( function_exists('bp_core_add_admin_css') ) remove_action( 'admin_menu', 'bp_core_add_admin_css' ); // for Kelly ;-)
}
function arit_remove_buddypress_admin_bar_uninstall() { /* @todo: maybe nothing to do ;-) */ }

/** Hooks */
register_activation_hook( __FILE__, 'arit_remove_buddypress_admin_bar_install' );
add_action( 'init', 'arit_remove_buddypress_admin_bar_init' );
register_deactivation_hook( __FILE__, 'arit_remove_buddypress_admin_bar_uninstall' );

?>