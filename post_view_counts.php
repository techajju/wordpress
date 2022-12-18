//check post views count costom code
// show on  single.php
function add_post_views($post_id){ //call this functiob on single.php

	$meta_key = "post_views_count";
	$count = get_post_meta( $post_id, $meta_key, true );

	if($count == ''){
		$count = 0;
		delete_post_meta( $post_id, $meta_key);
		add_post_meta( $post_id, $meta_key, $count);

	}else{
		$count++;
		update_post_meta( $post_id, $meta_key, $count);
	}
   
}
