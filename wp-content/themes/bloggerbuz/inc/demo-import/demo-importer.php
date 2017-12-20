<?php
add_action( 'wp_ajax_beetech_demo_import', 'my_action_callback' );

function my_action_callback() 
{
    
    global $wpdb; 
    $class_value    = $_POST['ids_value'];
    if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

    // Load Importer API
    require_once ABSPATH . 'wp-admin/includes/import.php';
    $importer_error = false;

    if ( ! class_exists( 'WP_Importer' ) ) {
        $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
        if ( file_exists( $class_wp_importer ) )
        {
            require_once $class_wp_importer;
        }else{
			$importer_error = true;
		}

    }

    if ( ! class_exists( 'WP_Import' ) ) {
        $class_wp_importer = get_template_directory() ."/inc/demo-import/wordpress-importer.php";
        if ( file_exists( $class_wp_importer ) ){
            require_once $class_wp_importer;
        }else{
            $importer_error = true;
        }
    }


        if($class_value == 'demo-1'){
            $import_filepath = get_template_directory() ."/inc/demo-import/file/1.xml" ; // Get the xml file from directory
        }
        elseif($class_value == 'demo-2'){
            $import_filepath = get_template_directory() ."/inc/demo-import/file/2.xml" ; // Get the xml file from directory
        }
        elseif($class_value == 'demo-3'){
            $import_filepath = get_template_directory() ."/inc/demo-import/file/3.xml" ; // Get the xml file from directory
        }
        elseif($class_value == 'demo-4'){
            $import_filepath = get_template_directory() ."/inc/demo-import/file/4.xml" ; // Get the xml file from directory
        }
        elseif($class_value == 'demo-5'){
            $import_filepath = get_template_directory() ."/inc/demo-import/file/5.xml" ; // Get the xml file from directory
        }
        else{
            $import_filepath = get_template_directory() ."/inc/demo-import/file/1.xml" ; // Get the xml file from directory
        }
        
        require get_template_directory() . '/inc/demo-import/bloggerbuz-import.php';

        $wp_import = new ap_import();
        $wp_import->fetch_attachments = true;
        $wp_import->set_theme_mods($class_value);
        $wp_import->import($import_filepath);
        
        $wp_import->set_menu();
        $wp_import->set_widgets($class_value);
        $page = get_page_by_path('home');
        if ($page) {
           $page_id  = $page->ID;
        }
        
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_id );
    //}
    
    die(); // this is required to return a proper result 
}