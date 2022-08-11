<?php

/**
 * Get Option
 *
 * @return value
 */
if ( ! function_exists( 'ecc_get_option' ) ) {
    function ecc_get_option( $option = '', $default = null ) {
        $options = get_option( 'ecc_basics' );
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}


function ecc_scripts(){
   
    wp_enqueue_style( 'ecc-style', ECC_ASSETS_PUBLIC . '/css/style.css', time() );
    wp_enqueue_script( 'ecc-script', ECC_ASSETS_PUBLIC . '/js/main.js', array( 'jquery' ), time(), true  );


    $primary_color       = ecc_get_option( 'primary_color', '#FF6C4B' );
    $secondary_color      = ecc_get_option( 'secondary_color', '#222' );

    $css_data             = '
        .dl-cursor, .cursor-style-two:nth-child(1), .cursor-style-three { background-color: ' . esc_attr( $primary_color ) . '; }
        .dl-fill{ border-color: ' . esc_attr( $secondary_color ) . '; }
        .cursor-style-two:nth-child(2){ background-color: ' . esc_attr( $secondary_color ) . '; }
    ';
    wp_add_inline_style( 'ecc-style', $css_data );


    //localize script php code pase to javascript
    $data = [
        'status'        => esc_attr( ecc_get_option( 'custom/_cursor_control', 'yes' ) ),
        'mobile_status' => esc_attr( ecc_get_option( 'mobile_custom_cursor', 'yes' ) ),
    ];
    wp_localize_script( 'ecc-script', 'ecc_data', $data );


}
add_action('wp_enqueue_scripts', 'ecc_scripts');

