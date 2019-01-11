<?php
/*
Plugin Name: azurecurve Allow PHP
Plugin URI: http://development.azurecurve.co.uk/plugins/allow-php

Description: Small, lightweight, plugin which allows PHP to be used on pages and posts; combine with azurecurve Shortcodes In Widgets to use PHP in widgets.
Version: 1.0.0

Author: azurecurve
Author URI: http://development.azurecurve.co.uk

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

The full copy of the GNU General Public License is available here: http://www.gnu.org/licenses/gpl.txt

*/


function azc_php_executephp($atts, $content = null) {
	$content =(htmlspecialchars($content,ENT_QUOTES));
	$content = str_replace("&amp;#8217;","'",$content);
	$content = str_replace("&amp;#8216;","'",$content);
	$content = str_replace("&amp;#8242;","'",$content);
	$content = str_replace("&amp;#8220;","\"",$content);
	$content = str_replace("&amp;#8221;","\"",$content);
	$content = str_replace("&amp;#8243;","\"",$content);
	$content = str_replace("&amp;#039;","'",$content);
	$content = str_replace("&#039;","'",$content);
	$content = str_replace("&amp;#038;","&",$content);
	$content = str_replace("&amp;lt;br /&amp;gt;"," ", $content);
	$content = htmlspecialchars_decode($content);
	$content = str_replace("<br />"," ",$content);
	$content = str_replace("<br/>"," ",$content);
	$content = str_replace("<p>"," ",$content);
	$content = str_replace("</p>"," ",$content);
	$content = str_replace("\\[","&#91;",$content);
	$content = str_replace("\\]","&#93;",$content);
	$content = str_replace("[","<",$content);
	$content = str_replace("]",">",$content);
	$content = str_replace("&#91;",'[',$content);
	$content = str_replace("&#93;",']',$content);
	$content = str_replace("&gt;",'>',$content);
	$content = str_replace("&lt;",'<',$content);
	ob_start();
	eval($content);
	$text = ob_get_contents();
	ob_end_clean();
	return wpautop($text);
}
add_shortcode( 'php', 'azc_php_executephp' );
add_shortcode( 'PHP', 'azc_php_executephp' );

?>