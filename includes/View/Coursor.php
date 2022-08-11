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
$cursor_enabel = ecc_get_option('custom/_cursor_control');
$ecc_cursor_style = ecc_get_option('ecc_cursor_style');

?>

<?php if( 'yes' === $cursor_enabel): ?>

    <?php if(!is_admin()): ?>
        <style>
            * {
                cursor: none;
            }
        </style>
    <?php endif; ?>

    <?php if('style-one' == $ecc_cursor_style): ?>
            <div class="ecc">
                <div class="dl-cursor"></div>
                <div class="dl-fill"></div>
            </div>
        <?php elseif('style-two' == $ecc_cursor_style): ?>
            <div class='cursor-style-two'></div>
            <div class='cursor-style-two'></div>
        <?php elseif('style-three' == $ecc_cursor_style): ?>
            <div class='cursor-style-three'></div>
       <?php endif;  ?>
<?php endif; 

?>


