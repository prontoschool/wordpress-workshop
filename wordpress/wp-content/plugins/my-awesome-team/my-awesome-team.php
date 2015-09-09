<?php
/*
 * Plugin Name: My Awesome Team
 * Description: A plugin to list my awesome team
 * Author: Kan Ouivirach
 */

function teammate_setup_post_type() {
    $labels = array(
        'name'          => __( 'Teammates' ),
        'singular_name' => __( 'Teammate' ),
        'add_new'       => __( 'Add New' ),
        'add_new_item'  => __( 'Add New Teammate' ),
        'edit_item'     => __( 'Edit Teammate' ),
        'new_item'      => __( 'New Teammate' ),
        'all_items'     => __( 'All Teammate' ),
        'view_item'     => __( 'View Teammate' ),
        'search_items'  => __( 'Search Teammate' ),
        'not_found'     => __( 'No Teammate Found' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Teammate involved in attempting to achieve a common goal.',
        'public'             => true,
        'publicly_queryable' => true,
        'has_archive'        => true,
        'capability_type'    => 'page',
        'show_ui'            => true,
        'hierarchical'       => false,
        'query_var'          => true,
        'supports'           => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'show_in_nav_menus'  => false,
    );
    register_post_type( 'teammate', $args );
}

add_action( 'init', 'teammate_setup_post_type', 10 );

function teammate_shortcode( $atts ) {
    $defined_atts = array(
        'limit' => -1
    );
    extract( shortcode_atts( $defined_atts, $atts ) );
    if ( $limit ) {
        $posts_per_page = $limit;
    }
    $args = array(
        'posts_per_page' => $posts_per_page,
        'post_type'      => 'teammate',
        'order'          => 'ASC'
    );

    $html = '';

    $posts = get_posts( $args );
    foreach ( $posts as $post ) {
        $html .= '<h4><a href="#" onClick=\'teammate_toggle("teammate_';
        $html .= $post->ID;
        $html .= '")\'>';
        $html .= $post->post_title;
        $html .= '</a></h4>';
        $html .= '<p id="teammate_';
        $html .= $post->ID;
        $html .= '" style="display: none;">';
        $html .= $post->post_content;
        $html .= '</p>';
    }

    $html .= '<script type="text/javascript">';
    $html .= 'function teammate_toggle(id) {';
    $html .= 'var element = document.getElementById(id);';
    $html .= 'element.style.display = ((element.style.display != "none") ? "none" : "block");';
    $html .= '}';
    $html .= '</script>';

    return $html;
}

add_shortcode( 'teammate', 'teammate_shortcode' );
