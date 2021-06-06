/*** reguister sidebar ***/

<?php 
register_sidebar(
    array(
        'name' => _x('Mail Widget', 'backend', 'cargopress-pt'),
        'id' => 'mail-widgets',
        'description' => _x('Header area for Mail ID.', 'backend', 'cargopress-pt'),
        'before_widget' => '<div class="widget  %2$s">',
        'after_widget' => '</div>',
    )
);
//
register_sidebar(
    array(
        'name' => _x('Social Widget', 'backend', 'cargopress-pt'),
        'id' => 'social-widgets',
        'description' => _x('Header area for Icon Box and Social Icons widgets.', 'backend', 'cargopress-pt'),
        'before_widget' => '<div class="widget  %2$s">',
        'after_widget' => '</div>',
    )
);
  

/*
 sidebar display on front end 
 <?php
    if (is_active_sidebar('mail-widgets')) {
        dynamic_sidebar('mail-widgets');
    }
 ?>
*/

/**** custom ****/
/**** custom ****/
/**** custom ****/
/**** custom ****/

/*!
** registered nav bar 
!*/

function register_my_menu() {
   register_nav_menu('header-menu',__( 'header' ));
   register_nav_menu('footer-menu',__( 'footer' ));
}

add_action( 'init' , 'register_my_menu' );

/*!
** add class in li
!*/

add_filter ( 'nav_menu_css_class', 'add_class_to_menu_list', 10, 4 );

function add_class_to_menu_list ( $classes, $item, $args, $depth ){
    
    if ($args->theme_location == 'header') { /**** according to theme location *****/
        
      $classes[] = 'nav-item';
    //  return $classes;

        if (in_array('menu-item-has-children', $classes) ){
            $classes[] = 'dropdown';
        }
        
    }
    return $classes;

}

/*!
** add class in anchor
!*/

add_filter( 'nav_menu_link_attributes', 'add_class_to_list_anchor', 10, 4 );

function add_class_to_list_anchor($atts, $item, $args, $depth) {
    
    if ($args->theme_location == 'header') { /**** according to theme location *****/
        $atts['class'] = "nav-link";
    }
  return $atts;
    
}

/*!
** override class submenu
!*/

add_filter( 'nav_menu_submenu_css_class', 'override_sub_menu_class', 10, 4);

function override_sub_menu_class($atts, $args, $depth) {
//    if ($args->theme_location == 'header') { /**** according to theme location *****/
        return array('dropdown-menu');
//    }
}

?>