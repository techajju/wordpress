add_action( 'woocommerce_review_order_before_order_total', 'custom_cart_total' ); // this hook will update final totel
function custom_cart_total() {

    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
            return;
	//WC()->cart->total += 8; 
   
    //var_dump( WC()->cart->total);
}

add_filter( 'woocommerce_checkout_fields' , 'checkout_address_details_fields' );
function checkout_address_details_fields( $fields ) {
	
    $fields['billing']['next_day_delivery'] = array(
        'type'  => 'checkbox',
		'label'       => __('Next Day Delivery at $7.25', 'woocommerce'),  
        'class'       => array('form-row-wide'),
        'clear'       => true,
        'priority'    => 55,  
    );

	?>
	<script>   
		var checkbox_next_day = jQuery('#next_day_delivery').prop('checked', true);
		if(checkbox_next_day == true){
		alert(checkbox_next_day);
		}
		if(checkbox_next_day){
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

			/* jQuery.ajax({   
                url:ajaxurl,  
                method:"POST",  
                data:{checkbox_next_day:checkbox_next_day},  
                success:function(data){  
                     alert(data)
                }  
		});  */
	} 
 	</script>

	<?php

 WC()->cart->total += 7.25;//this one update totle
    return $fields;
}
