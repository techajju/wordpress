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

//show populer post 

$arg = array(
	'post_type' =>'post',
	'posts_per_page' => 3,
	'meta_key' =>'post_views_count',
	'orderby' =>'meta_value_num',
	'order' =>'desc',
 

);


$query = new WP_Query($arg);

foreach ($query->posts as $key => $value) {
	$post_id = $value->ID;
	$count = get_post_meta( $post_id, 'post_views_count' ); 
	echo $value->post_title. " Views ". $count[0];
	echo "<br>";


}



