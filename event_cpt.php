<?php



class TNS_EVENTS {

	public function __construct()

	{ 
		add_shortcode( 'events', array($this,'tnsEvents' ));  
	}
 
  
	function tnsEvents( $atts ) {

		extract( shortcode_atts( array( 
			'number' => '12', 
			'orderby' => 'none', 
			'type' => 'future',  
		), $atts ) ); 
		return $this->getEvents( $number, $orderby, $type); 
	}
	//[events number=8]

	function getEvents($posts_per_page, $orderby, $type){ 
		$timezone = new DateTimeZone( 'Pacific/Honolulu' ); 
		$today = wp_date("Y-m-d H:i:s", null, $timezone );	 
		if($type == 'past'){
			$compare = '<';
			$order = 'ASC';
		}else{
			$compare = '>=';
			$order = 'DESC';
		} 
		//$today = date("Y-m-d", strtotime("-1 day") );
		
		$data = '';
		$byDate = array(
						'key' => 'event_date',
						'value' => $today,
						'type' => 'DATETIME',
						'compare' => '>',
					);

		if($posts_per_page == 1){

		}

		($_GET['e'] == 'all') ? $posts_per_page = -1 : $posts_per_page = $posts_per_page;
	

		$args = array( 
				'post_type' => 'event', 
				'posts_per_page' => $posts_per_page, 
				'meta_key' => 'event_date', 
				'orderby' => 'meta_value', 
				'order' => 'ASC', 

		);


		$loop = new WP_Query( $args );	 
		$count = 0; 
		$data .= '<div class=" tnsEvents  Events-'.$posts_per_page.'">';

		//echo '<pre>'; print_r($loop->posts); echo '</pre>';

		foreach($loop->posts as $val){ 

			$postid = $val->ID;
			$title = $val->post_title; 
			$content = $val->post_content;
			$event_link = get_permalink($postid); 
			$event_location = get_field( "event_location", $postid ); 
			$category = get_field( "category_name", $postid );  
			(get_field( "event_url", $postid ))? $event_url = get_field( "event_url", $postid ) : $event_url='#'; 

			$event_date =  date("M d, Y", strtotime(get_field( "event_date", $postid )));

			$event_month =  date("M", strtotime($event_date));

			$event_day =  date("D", strtotime($event_date));

			$event_date =  date("d", strtotime($event_date));

			$eventStartTime = date("g:i", strtotime(get_field( "event_date", $postid )));;//get_field( "event_time", $postid );

			$eventEndTime = get_field( "event_end_time", $postid );
 
			//$post_link = ( current_user_can( 'manage_options' ) ) ? get_edit_post_link($postid) : 'javascript:void(0)';
			$post_link = '';
			if($event_url !== ''){ 
				$post_link .= $event_url;
			}else{
				$post_link .= ( current_user_can( 'manage_options' ) ) ? get_edit_post_link($postid) : 'javascript:void(0)';
			}


			$data .= "

					<div class='senior-benefits-container'> 
						<a href='".$post_link."'>

							<div class='col-md-8'> 
								<p class='locate event-date'><span class='event_month'>".$event_month."</span><span class='event_date'>".$event_date."</span></p> 
								<h3>".$title."<br></h3>
								<div class='short_content'>
								".substr($content, 0, 100)."
								</div>
								<div class='bottom-event-section'> 
									<p class='locate event-time'>".$eventStartTime."-".$eventEndTime."</p>  
									 <p class='locate'>".$event_location."</p> 
								</div>

							</div>
  
						</a>	

					</div>";

					$count++;
			}

			if($count == 0){

				if($posts_per_page == 1){	

					$data .= "
							<div class='senior-benefits-container noEvent'>
								<h3>Check back regularly to see our upcoming events</h3>
							</div>";
				}else{

					$data .= '<div class="noEvent">Check back regularly to see our upcoming events</div>';

				}

			}

			 

		$data .= '</div>';
 
		if($count >= 12 && $posts_per_page != -1){
			$data .='<div class="elementor-button-wrapper loadMoreButton">
						<a href="?e=all" class="elementor-button-link elementor-button elementor-size-sm" role="button">
							<span class="elementor-button-content-wrapper">
								<span class="elementor-button-icon elementor-align-icon-right"><i aria-hidden="true" class="fas fa-angle-right"></i></span>
								<span class="elementor-button-text">Full Events Calender</span> 
							</span> 
						</a> 
					</div>'; 
		}

		



		wp_reset_query(); 

		return $data;
 

	}

}
 

new TNS_EVENTS();



 

 
 
