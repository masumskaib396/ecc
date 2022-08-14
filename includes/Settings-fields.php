<?php

if ( !class_exists('Ecc_Settings_API_Test' ) ):
class Ecc_Settings_API_Test {

    private $settings_api;

    function __construct() {
        $this->settings_api = new Ecc_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_options_page( 'Ecc Cursor Options', 'Ecc Cursor Options', 'delete_posts', 'settings_api_test', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'ecc_basics',
                'title' => __( 'Style Options', 'ecc' )
            ),
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'ecc_basics' => array(

                array(
                    'name'    => 'custom/_cursor_control',
                    'label'   => __( 'Custom Cursor', 'ecc' ),
                    'desc'    => __( 'You can enable/disable custom cursor using this option.', 'ecc' ),
                    'type'    => 'radio',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Enable',
                        'no'  => 'Disable'
                    )
                ),


                array(
                    'name'    => 'mobile_custom_cursor',
                    'label'   => __( 'Mobile Custom Cursor', 'ecc' ),
                    'desc'    => __( 'Disable/Enable on Mobile', 'ecc' ),
                    'type'    => 'radio',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Enable',
                        'no'  => 'Disable'
                    )
                ),

                array(
                    'name'    => 'ecc_cursor_style',
                    'label'   => __( 'Select Style', 'ecc' ),
                    'desc'    => __( 'Slect your style', 'ecc' ),
                    'type'    => 'select',
                    'default' => 'style-one',
                    'options' => array(
                        'style-one'    => 'Style One',
                        'style-two'    => 'Style Two',
                        'style-three'  => 'Style Three',
                    )
                ),

                array(
                    'name'    => 'primary_color',
                    'label'   => __( 'primary color', 'ecc' ),
                    'desc'    => __( 'Selcet Your Primary color', 'ecc' ),
                    'type'    => 'color',
                    'default' => '#222'
                ),
                array(
                    'name'    => 'secondary_color',
                    'label'   => __( 'Secondary color', 'ecc' ),
                    'desc'    => __( 'Selcet Your Secondary color', 'ecc' ),
                    'type'    => 'color',
                    'default' => '#222'
                ),

               



            ),
        );


        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;
