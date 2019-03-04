<?php
/*
 * @package tribal, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */
 
 
class Tribal_Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$fontIcon = ! empty( $item->attr_title ) ? ' <i class="fa ' . esc_attr( $item->attr_title ) .'">' : '';
		$attributes = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$fontIcon.'</i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<br /><span class="menu-desc">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}

/*
 * Pagination Function. Implements core paginate_links function.
 */
function tribal_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
	 
}


/*
** Customizer Controls 
*/
if (class_exists('WP_Customize_Control')) {
	class Tribal_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'tribal' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}    
/*
** Function to check if Sidebar is enabled on Current Page 
*/

function tribal_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('tribal_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('tribal_disable_sidebar_home') && is_home() )	:
		$load_sidebar = false;
	// Exceptional Case for Archive Pages. In Pro Version, there should be a different setting.	
	elseif( get_theme_mod('tribal_disable_sidebar_home') && is_archive() )	:
		$load_sidebar = false;	
	elseif( get_theme_mod('tribal_disable_sidebar_front') && is_front_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function tribal_primary_class() {
	$sw = esc_html( get_theme_mod('tribal_sidebar_width',3) );
	$class = "col-md-".(12-$sw)." col-sm-".(12-$sw);
	
	if ( !tribal_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('tribal_primary-width', 'tribal_primary_class');

function tribal_secondary_class() {
	$sw = esc_html( get_theme_mod('tribal_sidebar_width',3) );
	$class = "col-md-".$sw." col-sm-".$sw;
	
	echo $class;
}
add_action('tribal_secondary-width', 'tribal_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function tribal_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function tribal_fade($color, $val) {
	return "rgba(".tribal_hex2rgb($color).",". $val.")";
}


/*
** Function to Get Theme Layout 
*/
function tribal_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('tribal_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('tribal_blog_layout') );
	else :
		get_template_part( $ldir ,'tribal');	
	endif;	
}
add_action('tribal_blog_layout', 'tribal_get_blog_layout');


/*
** Function to Set the Title for Recent Posts
*/
function tribal_get_home_title() {
	/*
if (is_home()) :
		echo "<div id='home-title' class='section-title'>";
		echo "Latest Posts";
		echo "</div>";
	endif;
*/	
}
add_action('tribal_on_primary_start', 'tribal_get_home_title');
/*
** Load Custom Widgets
*/

require get_template_directory() . '/framework/widgets/recent-posts.php';


