<?php

/**
 * Fired during plugin activation
 *
 * @link       https://ianua.imagewize.com
 * @since      1.0
 *
 * @package    Ianua_Projects
 * @subpackage Ianua_Projects/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ianua_Projects
 * @subpackage Ianua_Projects/includes
 * @author     Your Name <jasper@imagewize.com>
 */
class Ianua_Projects_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		if ( ! function_exists( 'ianua_projects_taxonomy' ) ) {

			// Register Custom Taxonomy
			function ianua_projects_taxonomy() {

				$labels = array(
					'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'ianua-projects' ),
					'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'ianua-projects' ),
					'menu_name'                  => __( 'Project Categories', 'ianua-projects' ),
					'all_items'                  => __( 'All Items', 'ianua-projects' ),
					'parent_item'                => __( 'Parent Item', 'ianua-projects' ),
					'parent_item_colon'          => __( 'Parent Item:', 'ianua-projects' ),
					'new_item_name'              => __( 'New Project Category Name', 'ianua-projects' ),
					'add_new_item'               => __( 'Add New Project Category', 'ianua-projects' ),
					'edit_item'                  => __( 'Edit Project Category', 'ianua-projects' ),
					'update_item'                => __( 'Update Project Category', 'ianua-projects' ),
					'view_item'                  => __( 'View Project Category', 'ianua-projects' ),
					'separate_items_with_commas' => __( 'Separate categories with commas', 'ianua-projects' ),
					'add_or_remove_items'        => __( 'Add or remove categories', 'ianua-projects' ),
					'choose_from_most_used'      => __( 'Choose from the most used', 'ianua-projects' ),
					'popular_items'              => __( 'Popular Categories', 'ianua-projects' ),
					'search_items'               => __( 'Search Categories', 'ianua-projects' ),
					'not_found'                  => __( 'Not Found', 'ianua-projects' ),
					'no_terms'                   => __( 'No categories', 'ianua-projects' ),
					'items_list'                 => __( 'Categories list', 'ianua-projects' ),
					'items_list_navigation'      => __( 'Categories list navigation', 'ianua-projects' ),
				);

				$args = array(
					'labels'                     => $labels,
					'hierarchical'               => true,
					'public'                     => true,
					'show_ui'                    => true,
					'show_admin_column'          => true,
					'show_in_nav_menus'          => true,
					'show_tagcloud'              => true,
					'rewrite'                    => true,
				);
				register_taxonomy( 'project-categories', array( 'project' ), $args );

			}
		
		add_action( 'init', 'ianua_projects_taxonomy', 0 );

}

		if ( ! function_exists('ianua_projects_cpt') ) {

		// Register Custom Post Type
		// 
		function ianua_projects_cpt() {

			$labels = array(
				'name'                  => _x( 'Projects', 'Post Type General Name', 'ianua-projects' ),
				'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'ianua-projects' ),
				'menu_name'             => __( 'Projects', 'ianua-projects' ),
				'name_admin_bar'        => __( 'Project', 'ianua-projects' ),
				'archives'              => __( 'Projects Archives', 'ianua-projects' ),
				'attributes'            => __( 'Projects Attributes', 'ianua-projects' ),
				'parent_item_colon'     => __( 'Parent Project:', 'ianua-projects' ),
				'all_items'             => __( 'All Projects', 'ianua-projects' ),
				'add_new_item'          => __( 'Add New Project', 'ianua-projects' ),
				'add_new'               => __( 'Add New', 'ianua-projects' ),
				'new_item'              => __( 'New Project', 'ianua-projects' ),
				'edit_item'             => __( 'Edit Project', 'ianua-projects' ),
				'update_item'           => __( 'Update Project', 'ianua-projects' ),
				'view_item'             => __( 'View Project', 'ianua-projects' ),
				'view_items'            => __( 'View Projects', 'ianua-projects' ),
				'search_items'          => __( 'Search Project', 'ianua-projects' ),
				'not_found'             => __( 'Not found', 'ianua-projects' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'ianua-projects' ),
				'featured_image'        => __( 'Featured Image', 'ianua-projects' ),
				'set_featured_image'    => __( 'Set featured image', 'ianua-projects' ),
				'remove_featured_image' => __( 'Remove featured image', 'ianua-projects' ),
				'use_featured_image'    => __( 'Use as featured image', 'ianua-projects' ),
				'insert_into_item'      => __( 'Insert into project', 'ianua-projects' ),
				'uploaded_to_this_item' => __( 'Uploaded to this project', 'ianua-projects' ),
				'items_list'            => __( 'Projects list', 'ianua-projects' ),
				'items_list_navigation' => __( 'Projects list navigation', 'ianua-projects' ),
				'filter_items_list'     => __( 'Filter project list', 'ianua-projects' ),
			);
			$rewrite = array(
				'slug'                  => 'project',
				'with_front'            => true,
				'pages'                 => true,
				'feeds'                 => true,
			);
			$args = array(
				'label'                 => __( 'Project', 'ianua-projects' ),
				'description'           => __( 'Portfolio Plugin to show off your latest work', 'ianua-projects' ),
				'labels'                => $labels,
				'supports'              => array( 'title', 'editor', 'thumbnail', ),
				'taxonomies'            => array( 'project-categories' ),
				'hierarchical'          => true,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'menu_icon'             => 'dashicons-portfolio',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,		
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'rewrite'               => $rewrite,
				'capability_type'       => 'page',
				'show_in_rest'          => false,
			);
			register_post_type( 'ianua_projects', $args );

		}
		add_action( 'init', 'ianua_projects_cpt', 0 );

		}
			}


}