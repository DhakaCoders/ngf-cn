<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('woocommerce_before_main_content', 'get_custom_wc_output_content_wrapper', 11);
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 9);
add_filter( 'woocommerce_show_page_title', '__return_false' );
function get_custom_wc_output_content_wrapper(){
    if(is_shop() OR is_product_category()){ 
        get_template_part('templates/shop/wrap', 'start');
    }


}

function get_custom_wc_output_content_wrapper_end(){
  if(is_shop() OR is_product_category()){
    get_template_part('templates/shop/wrap', 'end');
  }

}

function get_array( $string ){
    if( !empty( $string ) ){ 
        $str_arr = preg_split ("/\,/", $string);   
        return $str_arr;
    }
    return false;
}
/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 4; // 3 products per row
  }
}
/*Loop Hooks*/


/**
 * Add loop inner details are below
 */

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
    function add_shorttext_below_title_loop() {
        get_template_part('templates/shop/loop');  
    }
}
function loop_qty_input(){

    global $product;
    $qty_input = woocommerce_quantity_input( array(
        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', product_min_qty(), $product ),
        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', product_max_qty(), $product ),
        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : product_min_qty(), // WPCS: CSRF ok, input var ok.
    ) );
    return $qty_input;
}

function wc_stock_manage(){
    global $product;
    $StockQ = $product->get_stock_quantity();
    if ( ! $product->managing_stock() && ! $product->is_in_stock() ){
        echo '<span class="out-of-stock">Out of Stock</span>';
        
    } elseif( $StockQ < 1 ) {
        if ($product->backorders_allowed()){
            echo '<span class="backorders">Available on Backorder</span>';
        } elseif ( !$product->backorders_allowed() && $StockQ == 0 && ! $product->is_in_stock()){
            echo '<span class="out-of-stock">Out of Stock</span>';
        } elseif ( $product->is_on_backorder() ){
            echo '<span class="backorders">Available on Backorder</span>';
        }
    } 
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 6;
  return $cols;
}


add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
$args['posts_per_page'] = 9; // 4 related products
return $args;
}



// change a number of the breadcrumb defaults.
add_filter( 'woocommerce_breadcrumb_defaults', 'cbv_woocommerce_breadcrumbs' );
if( !function_exists('cbv_woocommerce_breadcrumbs')):
function cbv_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ul class="reset-list">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;

/*Remove Single page Woocommerce Hooks & Filters are below*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_action('woocommerce_single_product_summary', 'add_custom_box_product_summary', 5);
if (!function_exists('add_custom_box_product_summary')) {
    function add_custom_box_product_summary() {
        get_template_part('templates/product-single/summary');

    }
}

//add_action('woocommerce_before_add_to_cart_quantity', 'cbv_start_div_single_price', 99);
function cbv_start_div_single_price(){
    echo '<div class="cartbtn-wrap clearfix"><strong>Aantal</strong><div class="cart-btn-qty">';
    echo '<div class="quantity qty"><span class="minus">-</span>';
}
//add_action('woocommerce_after_add_to_cart_quantity', 'cbv_get_single_price');
function cbv_get_single_price(){
    global $product;
    echo '<span class="plus">+</span></div>';
    echo '</div></div>';
    echo '<div class="qty-price-wrap">';
    echo '<div class="price-pre-title">Totaal prijs (incl. btw) </div>';
    echo '<span class="single-price-total">';
    echo $product->get_price_html();
    echo '</span>';
    echo '</div>';
    echo '<div class="cart-top-text"><p>Wij contacteren jou binnen 24 uur</p></div>';
}


// Change 'add to cart' text on single product page (only for product ID 386)
add_filter( 'woocommerce_product_single_add_to_cart_text', 'bryce_id_add_to_cart_text' );
function bryce_id_add_to_cart_text( $default ) {
    global $product;
    switch ( $product->get_type() ) {
      case "pw-gift-card" :
          $label  = __('Reserveer uw vlucht', 'woocommerce');
      break;
      default :
          $label  = __('BUY NOW', 'woocommerce');
      break;
      }
    return __( $label, THEME_NAME );
}
add_action( 'cbv_related_product', 'woocommerce_output_related_products');
add_action( 'cbv_product_review', 'get_review_form');
function get_review_form( $default ) {
    //wc_get_template_part('single-product/review');
    get_template_part('templates/customer', 'review');
}
add_action( 'woocommerce_product_options_inventory_product_data', 'misha_adv_product_options');
function misha_adv_product_options(){
 
    echo '<div class="options_group">';
 
    woocommerce_wp_text_input( array(
        'id'      => 'product_min_qty',
        'value'   => get_post_meta( get_the_ID(), 'product_min_qty', true ),
        'label'   => __('Product Min Quantity', 'woocommerce'),
        'type' => 'number',
        'custom_attributes' => array(
        'step' => 'any',
        'min' => '0'
        )
    ));
     woocommerce_wp_text_input( array(
        'id'      => 'product_max_qty',
        'value'   => get_post_meta( get_the_ID(), 'product_max_qty', true ),
        'label'   => __('Product Max Quantity', 'woocommerce'),
        'type' => 'number',
        'custom_attributes' => array(
        'step' => 'any',
        )
    ));
    echo '</div>';
    $style = 'display:none';
    if( isset($_GET['post']) && isset($_GET['action']) && $_GET['action'] == 'edit' ){
        $v_product = get_product( $_GET['post'] );
        if($v_product->is_type( 'pw-gift-card' )){
          $style = 'display:block';  
        }
    }

    echo '<div class="options_group" id="giftcard-manage" style="'.$style.'">';
 
    // Radio Buttons field
    woocommerce_wp_radio( array(
        'id'            => '_package_type',
        'value'   => get_post_meta( get_the_ID(), '_package_type', true ),
        'label'         => __('Gift Package Type'),
        'options'       => array(
            'single_pack'       => __('Single Pack'),
            'duo_pack'       => __('Duo Pack'),
            'family_fack'       => __('Family Pack'),
        )
    ) );
    echo '</div>';
 
}

add_action( 'woocommerce_process_product_meta', 'misha_save_fields', 10, 2 );
function misha_save_fields( $id, $post ){
 
    //if( !empty( $_POST['super_product'] ) ) {
        update_post_meta( $id, 'product_min_qty', $_POST['product_min_qty'] );
        update_post_meta( $id, 'product_max_qty', $_POST['product_max_qty'] );
        update_post_meta( $id, '_package_type', $_POST['_package_type'] );
    //} else {
    //  delete_post_meta( $id, 'super_product' );
    //}
 
}


function product_min_qty($product_id = '', $_product = array()){
    global $product;
    if( !empty($product_id) ){
        $get_id = $product_id;
    }
    else{
        $get_id = $product->get_id();
    }
    if( !empty($_product) && $_product ){
        $product = $_product;
    }

    $minQty = get_post_meta( $get_id, 'product_min_qty', true );
    if( !empty($minQty) && $minQty > 0 ){
        $get_min_purchase_qty = $minQty;
    }else{
        $get_min_purchase_qty = $product->get_min_purchase_quantity();
    }
    return $get_min_purchase_qty;
}
function product_max_qty($product_id = '', $_product = array()){
    global $product;
    if( !empty($product_id) ){
        $get_id = $product_id;
    }
    else{
        $get_id = $product->get_id();
    }

    if( !empty($_product) && $_product ){
        $product = $_product;
    }
    
    $maxQty = get_post_meta( $get_id, 'product_max_qty', true );
    if( !empty($maxQty) && $maxQty > 0 ){
        $get_max_purchase_qty = $maxQty;
    }else{
        $get_max_purchase_qty = $product->get_max_purchase_quantity();
    }
    return $get_max_purchase_qty;
}

add_filter('woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args');

function custom_woocommerce_get_catalog_ordering_args( $args ) {
    $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    if ( 'title' == $orderby_value ) {
        $args['orderby'] = 'title';
        $args['order'] = 'asc';
    }elseif('title-desc' == $orderby_value){
        $args['orderby'] = 'title';
        $args['order'] = 'desc';
    }
    return $args;
}
//add_filter( 'woocommerce_default_catalog_orderby_options', 'wc_customize_product_sorting' );
//add_filter( 'woocommerce_catalog_orderby', 'wc_customize_product_sorting' );

function wc_customize_product_sorting($sorting_options){
    $sorting_options = array(
        'title'      => __( 'A-Z', 'woocommerce' ),
        'title-desc' => __( 'Z-A', 'woocommerce' ),
        'popularity' => __( 'popularity', 'woocommerce' ),
        'rating'     => __( 'average rating', 'woocommerce' ),
        'date'       => __( 'newness', 'woocommerce' ),
        'price'      => __( 'low price', 'woocommerce' ),
        'price-desc' => __( 'high price', 'woocommerce' ),
    );

    return $sorting_options;
}
// custom cbv_catalog hook
add_action('cbv_catalog', 'cbv_catalog_ordering');

function cbv_catalog_ordering() {
    global $wp_query;

    /*if ( 0 == $wp_query->found_posts || ! woocommerce_products_will_display() ) {
        return;
    }*/

    $orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    $catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
        'title' => __( 'A-Z', 'woocommerce' ),
        'title-desc' => __( 'Z-A', 'woocommerce' ),
        'popularity' => __( 'popularity', 'woocommerce' ),
        'rating'     => __( 'average rating', 'woocommerce' ),
        'date'       => __( 'newness', 'woocommerce' ),
        'price'      => __( 'price: low to high', 'woocommerce' ),
        'price-desc' => __( 'price: high to low', 'woocommerce' )
    ) );

    if ( ! $show_default_orderby ) {
        unset( $catalog_orderby_options['menu_order'] );
    }

    if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
        unset( $catalog_orderby_options['rating'] );
    }

    if( get_option('woocommerce_enable_review_rating') == 'no' && get_option('woocommerce_default_catalog_orderby') == 'rating') {
        update_option('woocommerce_default_catalog_orderby', 'date');
    }

    wc_get_template( 'loop/orderby.php', array( 'catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby, 'show_default_orderby' => $show_default_orderby ) );
}
function projectnamespace_woocommerce_text( $translated, $text, $domain ) {
    if ( $domain === 'woocommerce' ) {
        $translated = str_replace(
            array( 
                'Proceed to checkout', 
                'Return to shop', 
                'Billing details', 
                'Your order', 
                'Place order',
                'Additional information',
                'Subtotal',
                'Total',
                'Set an amount',
                'Apply coupon',
                'Coupon code',
                'Waardebon toepassen',
                'Couponcode'
            ),
            array( 
                'Order now', 
                'PRODUCTEN', 
                'Persoonlijke gegevens', 
                'Overzicht', 
                'Afrekenen',
                'Extra Info',
                'Subtotaal',
                'Totaal',
                'Bedrag',
                'ApPly',
                'Have a discount code?',
                'ApPly',
                'Have a discount code?'
            ),
            $translated
        );
    }

    return $translated;
}

add_filter( 'gettext', 'projectnamespace_woocommerce_text', 30, 3 );

// display general product attributes
function cbv_display_some_product_attributes(){
    global $product;
    $formatted_attributes = array();
    $attributes = $product->get_attributes();
    if($attributes):
        foreach($attributes as $attr => $attr_deets){
            // skip variations
            if ( $attr_deets->get_variation() ) {
                continue;
            }
            $attribute_label = wc_attribute_label($attr);

            if ( isset( $attributes[ $attr ] ) || isset( $attributes[ 'pa_' . $attr ] ) ) {

                $attribute = isset( $attributes[ $attr ] ) ? $attributes[ $attr ] : $attributes[ 'pa_' . $attr ];

                if ( $attribute['is_taxonomy'] ) {
                    echo '<li><span class="pro-attribute">';
                        echo '<strong>'.$attribute_label.': </strong>';
                        echo implode( ', ', wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'names' ) ) );
                    echo '</span></li>';

                } else {
                    echo '<li><span class="pro-attribute">';
                        echo '<strong>'.$attribute_label.': </strong>';
                    echo $attribute['value'];
                    echo '</span></li>';
                }

            }
        }
    endif;
}

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message');
add_action( 'woocommerce_cart_is_empty', 'woo_if_cart_empty' );
function woo_if_cart_empty(){
    echo '<div class="cart-is-emtpy">';
        echo '<div class="cie-icon"><img src="'.THEME_URI.'/assets/images/bag-icon.svg"/></div>';
        echo '<strong>'.__('your <br> Shopping cart is empty', 'ballonvaren').'</strong>';
        echo '<p>'.__('Je hebt geen artikelen in je winkelwagen.', 'ballonvaren').'</p>';
    echo '</div>';
}

/**
 * @snippet       Display Coupon under Proceed to Checkout Button @ WooCommerce Cart
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=81542
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.1
 */
 
add_action( 'woocommerce_proceed_to_checkout', 'bbloomer_display_coupon_form_below_proceed_checkout', 10 );
 
function bbloomer_display_coupon_form_below_proceed_checkout() {
   ?> 
      <form class="woocommerce-coupon-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
         <?php if ( wc_coupons_enabled() ) { ?>
            <div class="coupon under-proceed">
               <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" style="width: 100%" /> 
               <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" style="width: 100%"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
            </div>
         <?php } ?>
      </form>
   <?php
}

add_filter('gettext', 'x_translated_text' );
function x_translated_text($translated) {
$your_translation = 'Insert your translation here';
$translated = str_ireplace("I’ve read and accept", $your_translation, $translated);
return $translated;
}
add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){
 // we will hook "anyuniquetext123" later
    unset( $menu_links['gift-cards'] ); // Addresses
    unset( $menu_links['edit-address'] ); // Addresses
    unset( $menu_links['dashboard'] ); // Remove Dashboard
    unset( $menu_links['payment-methods'] ); // Remove Payment Methods
    unset( $menu_links['orders'] ); // Remove Orders
    unset( $menu_links['downloads'] ); // Disable Downloads
    unset( $menu_links['edit-account'] ); // Remove Account details tab
    unset( $menu_links['customer-logout'] ); // Remove Logout link

    $menu_links['orders'] = 'your orders';
    $menu_links['winkelmandje'] = 'Shopping cart';
    $menu_links['edit-account'] = 'ACCOUNT info';
    $menu_links['customer-logout'] = 'Sign out';
    return $menu_links;
 
}

/**
    Myaccount body class
*/
add_filter( 'body_class', 'cbv_wc_custom_class' );
function cbv_wc_custom_class( $classes ) {
    global $woocommerce;

if( strpos($_SERVER['REQUEST_URI'], "winkelmandje") !== false && is_account_page() && is_user_logged_in()){
        $classes[] = 'loggedin-winkelmandje-crtl';
    }elseif( is_account_page() && !is_user_logged_in() ){
        $classes[] = 'login-register';
    }elseif( is_account_page() && is_user_logged_in() && is_wc_endpoint_url( 'orders' ) ){
        $classes[] = 'woocommerce-orders';
    }elseif( is_account_page() && is_user_logged_in() &&  is_wc_endpoint_url( 'edit-account' )) {
        $classes[] = 'woocommerce-edit-account';
    }elseif( is_account_page() && is_user_logged_in() && !is_wc_endpoint_url()) {
        $classes[] = 'loggedin-deshboard-crtl';
    }

    if( is_cart() && WC()->cart->cart_contents_count == 0){
        $classes[]='empty-cart';
    }
    if( is_account_page() && !is_user_logged_in() && !isset($_GET['action']) ){
        $classes[]='account-login-page';
    }
    if( isset($_GET['action']) && $_GET['action']=='registration'){
        $classes[]='hide-account-title';
    }
     if ( is_product_category() || is_product() || is_shop() || is_cart() || is_checkout()
       || is_woocommerce() || is_product_tag() || is_account_page() || is_wc_endpoint_url()
       || is_ajax()){
        $classes[]='woo-page';
     }
     if ( is_account_page() && is_user_logged_in() ){
        $classes[]='black-bg-cntlr';
     }
     if ( is_product_category() || is_product() || is_shop() ){
        $classes[]='sky-btm-bg-cntlr';
     }
    return $classes;
}

/**
    Tabel price display
*/
add_filter( 'woocommerce_cart_item_price', 'cbv__change_cart_table_price_display', 30, 3 );
function cbv__change_cart_table_price_display( $price, $values, $cart_item_key ) {
    $slashed_price = $values['data']->get_price_html();
    $is_on_sale = $values['data']->is_on_sale();
    if ( $is_on_sale ) {
        $price = $slashed_price;
    }
    return $price;
}

add_action( 'woocommerce_cart_calculate_fees','add_custom_surcharge', 10, 1 );
function add_custom_surcharge( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    $state = array('BD');
    $surcharge  = 10;

    if ( in_array( WC()->customer->get_shipping_state(), $state ) ) {
       
    }
     $cart->add_fee( 'Extra diensten', $surcharge, true );
}


/**
    Empty cart items
*/
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
    if ( isset( $_GET['clear-cart'] ) && esc_html($_GET['clear-cart']) == 'yes' ) {
        global $woocommerce;
        $woocommerce->cart->empty_cart();
        wp_redirect( esc_url( wc_get_cart_url() ) );
        exit();
    }
}

add_action('woocommerce_checkout_process', 'cw_custom_process_checkbox');
function cw_custom_process_checkbox() {
    global $woocommerce;
    if (!$_POST['accept_condition'])
        wc_add_notice( __( 'Please accept conditions to proceed with your order' ), 'error' );
}


add_action('woocommerce_checkout_update_order_meta', 'cw_checkout_order_meta');
function cw_checkout_order_meta( $order_id ) {
    if ($_POST['accept_condition']) update_post_meta( $order_id, 'Accept Condition', esc_attr($_POST['accept_condition']));
}

add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
    return '';
}

add_action('woocommerce_before_add_to_cart_form', 'selected_variation_price_replace_variable_price_range');
function selected_variation_price_replace_variable_price_range(){
    global $product;

    if( $product->is_type('variable') ):
        echo '<span id="variable_price" style="display:none;">'.$product->get_price_html().'</span>';
    ?><style> .woocommerce-variation-price {display:none;} </style>
    <script>
    jQuery(function($) {
        var p = '.woocommerce-variation-price span.price'
            q = $(p).html();
            defprice = $("#variable_price").html();

        $('form.cart').on('show_variation', function( event, data ) {

            if ( data.price_html ) {
                $(".single-price-total").html(data.price_html);
            }
        }).on('hide_variation', function( event ) {
            $(".single-price-total").html(defprice);
            $(p).html(q);
        });
    });
    </script>
    <?php
    endif;
}
include_once(THEME_DIR .'/inc/wc-manage-fields.php');

/* Custom conditional tag*/

function is_wc_page(){
    return is_checkout() || is_account_page() || is_cart();
}
function is_breadcrumbs(){
    return is_checkout() || is_account_page() || is_cart();
}


function is_wc_page_heading(){
    return is_cart();
}
function is_wc_template(){
    if( is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() ){
        return true;
    }
    return false;
}