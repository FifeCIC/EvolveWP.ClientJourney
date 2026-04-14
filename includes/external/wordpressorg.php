<?php             
/**
 * EvolveWP ClientJourney - WordPress.org API
 *
 * Interacts with WordPress.org and fetches plugins data. 
 *
 * @author   Ryan Bayne
 * @category External
 * @package  EvolveWP ClientJourney/WordPressAPI
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class EvolveWP_CJ_Wordpressorgapi {  

    /**
    * Query plugin data on WordPress.org
    */
    public function query_plugins( $url = 'http://api.wordpress.org/plugins/info/1.0/', $args = array() ) {
        return wp_remote_post(
            $url,
            array(
                'body' => array(
                    'action' => 'query_plugins',
                    'request' => serialize((object)$args)
                )
            )
        );    
    }

    /**
    * Query plugin data on WordPress.org. 
    */
    public function query_themes( $url = 'http://api.wordpress.org/plugins/info/1.0/', $args = array()) {
        return wp_remote_post(
            $url,
            array(
                'body' => array(
                    'action' => 'query_themes',
                    'request' => serialize((object)$args)
                )
            )
        );    
    }
       
    /**
    * Plugin properties as stored on WordPress.org
    * 
    * @version 1.2
    */
    public function plugin_properties() {              
        return array(
            'slug'              => array( 'description' => __( 'The slug of the plug-in to return the data for.', 'evolvewp-clientjourney' ) ), 
            'author'            => array( 'description' => __( '(When the action is query_plugins). The author\'s WordPress username, to retrieve plugins by a particular author.', 'evolvewp-clientjourney' ) ),  
            'version'           => array( 'description' => __( 'Latest plugin version.', 'evolvewp-clientjourney' ) ),
            'author'            => array( 'description' => __( 'Author name and link to profile.', 'evolvewp-clientjourney' ) ), 
            'requires'          => array( 'description' => __( 'The minimum WordPress version required.', 'evolvewp-clientjourney' ) ), 
            'tested'            => array( 'description' => __( 'The latest WordPress version tested.', 'evolvewp-clientjourney' ) ), 
            'compatibility'     => array( 'description' => __( "An array which contains an array for each version of your plug-in. This array stores the number of votes, the number of 'works' votes and this number as a percentage.", 'evolvewp-clientjourney' ) ), 
            'downloaded'        => array( 'description' => __( 'The number of times the plugin has been downloaded.', 'evolvewp-clientjourney' ) ), 
            'rating'            => array( 'description' => __( 'The plugins rating as percentage.', 'evolvewp-clientjourney' ) ), 
            'num_ratings'       => array( 'description' => __( 'Number of times the plugin has been rated.', 'evolvewp-clientjourney' ) ),
            'sections'          => array( 'description' => __( "An array with the HTML for each section on the WordPress plug-in page as values, keys can include 'description', 'installation', 'screenshots', 'changelog' and 'faq'.", 'evolvewp-clientjourney' ) ),  
            'description'       => array( 'description' => __( 'Plugins full description, default false.', 'evolvewp-clientjourney' ) ),
            'short_description' => array( 'description' => __( 'Plugins short description, default false.', 'evolvewp-clientjourney' ) ), 
            'name'              => array( 'description' => __( 'Name of the plugin.', 'evolvewp-clientjourney' ) ),
            'author_profile'    => array( 'description' => __( 'Unsure, please update. Does it return URL to authors profile or an array of the authors details?', 'evolvewp-clientjourney' ) ), 
            'tags'              => array( 'description' => __( 'Unsure.', 'evolvewp-clientjourney' ) ),
            'homepage'          => array( 'description' => __( 'Unsure.', 'evolvewp-clientjourney' ) ), 
            'contributors'      => array( 'description' => __( 'Array of contributors.', 'evolvewp-clientjourney' ) ), 
            'added'             => array( 'description' => __( 'When the plugin was added to the repository.', 'evolvewp-clientjourney' ) ),
            'last_updated'      => array( 'description' => __( 'Unsure, please update. It may be the author stated update or the last time the repository for this plugin was updated.', 'evolvewp-clientjourney' ) ),
        );
    }

    /**
    * Theme properties as stored on WordPress.org
    * 
    * @version 1.2
    */
    public function theme_properties() {            
        return array(
            'slug'              => array( 'description' => __( 'The slug of the theme to return the data for.', 'evolvewp-clientjourney' ) ), 
            'browse'            => array( 'description' => __( 'Takes the values featured, new or updated.', 'evolvewp-clientjourney' ) ), 
            'author'            => array( 'description' => __( 'The author\'s username, to retrieve themes by a particular author.', 'evolvewp-clientjourney' ) ), 
            'tag'               => array( 'description' => __( 'An array of tags with which to retrieve themes for.', 'evolvewp-clientjourney' ) ),  
            'search'            => array( 'description' => __( 'A search term, with which to search the repository.', 'evolvewp-clientjourney' ) ), 
            'fields'            => array( 'description' => __( 'An array with a true or false value for each key (field). The fields that are included make up the properties of the returned object above.', 'evolvewp-clientjourney' ) ),  
            'version'           => array( 'description' => __( 'Themes latest version.', 'evolvewp-clientjourney' ) ), 
            'author'            => array( 'description' => __( 'Author of the theme.', 'evolvewp-clientjourney' ) ),
            'preview_url'       => array( 'description' => __( 'URL to wp-themes.com hosted preview.', 'evolvewp-clientjourney' ) ), 
            'screenshot_url'    => array( 'description' => __( 'URL to screenshot image.', 'evolvewp-clientjourney' ) ), 
            'screenshot_count'  => array( 'description' => __( 'Number of screenshots the theme has.', 'evolvewp-clientjourney' ) ), 
            'screenshots'       => array( 'description' => __( 'Array of screenshot URLs', 'evolvewp-clientjourney' ) ), 
            'rating'            => array( 'description' => __( 'Themes rating as a percentage.', 'evolvewp-clientjourney' ) ),
            'num_ratings'       => array( 'description' => __( 'Number of times the theme has been rated.', 'evolvewp-clientjourney' ) ), 
            'downloaded'        => array( 'description' => __( 'Number of times the theme has been downloaded.', 'evolvewp-clientjourney' ) ), 
            'sections'          => array( 'description' => __( 'Array of the data from each section on the plugins page.', 'evolvewp-clientjourney' ) ),
            'description'       => array( 'description' => __( 'Description of the theme.', 'evolvewp-clientjourney' ) ),
            'download_link'     => array( 'description' => __( 'Unsure, please update. Is it a HTML link or URL?', 'evolvewp-clientjourney' ) ),
            'name'              => array( 'description' => __( 'Name of the theme.', 'evolvewp-clientjourney' ) ),
            'slug'              => array( 'description' => __( 'The themes slug, may not match themes full name.', 'evolvewp-clientjourney' ) ),
            'tags'              => array( 'description' => __( 'Theme tags as found in readme.txt', 'evolvewp-clientjourney' ) ),
            'homepage'          => array( 'description' => __( 'Themes home page.', 'evolvewp-clientjourney' ) ),
            'contributors'      => array( 'description' => __( 'Array of contributors.', 'evolvewp-clientjourney' ) ),
            'last_updated'      => array( 'description' => __( 'Unsure, please update. Is it the authors stated last update month and year or is it a repository time.', 'evolvewp-clientjourney' ) ),
        );
    }
}