<?php

class SearchAddress
{

    public function __construct()
    {

    add_shortcode('SearchAddress',[$this, 'SearchAddressCallback']);
    add_action( 'wp_footer', [$this, 'ajax_fetch']);
    add_action( 'pre_get_posts', [$this, 'ajmukto_post_type_includeax_fetch']);
 
    // the ajax function
    add_action( 'wp_ajax_data_fetch', [$this, 'data_fetch']);
    add_action( 'wp_ajax_nopriv_data_fetch', [$this, 'data_fetch']);
 
    } 

    public function SearchAddressCallback()
    {

    $html ='';
    $html .='<style>/
    div.search_result {
        display: none;
      }
    </style>';
    $html .='<div class="search_bar">
    <form action="/" method="get" autocomplete="off">
        <input type="text" name="s" placeholder="Search Code..." id="keyword" class="input_search" onkeyup="fetch()">
       
    </form>
    <div class="search_result" id="datafetch">
        <ul>
            <li>Please wait..</li>
        </ul>
    </div>
</div>';
 
    return $html;
    }


    public function ajax_fetch() {
        ?>
        
        <script type="text/javascript">
        function fetch(){
        
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
                success: function(data) {
                    jQuery('#datafetch').html( data );
                }
            });
        
        }
        </script>
        <script>
            $("input#keyword").keyup(function() {
      if ($(this).val().length > 2) {
        $("#datafetch").show();
      } else {
        $("#datafetch").hide();
      }
    });
        </script>


        <?php
        }

      public function data_fetch(){

            $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('property') ) );
            if( $the_query->have_posts() ) :
                echo '<ul>';
                while( $the_query->have_posts() ): $the_query->the_post(); ?>
        
                    <li><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>
        
                <?php endwhile;
               echo '</ul>';
                wp_reset_postdata();  
            endif;
        
            die();
        }

      public  function mukto_post_type_include( $query ) {
            if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
                $query->set( 'post_type', array( 'post', 'page', 'custom_post_type' ) );
            }
        }


}

$obj = new SearchAddress();

 

?>
