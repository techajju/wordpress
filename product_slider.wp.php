 add_shortcode('upsell_cross_sell', 'upsell_cross_sell_callback');

  function upsell_cross_sell_callback(){ 
 $code = '';
    $page_id = get_the_ID();
    
    $data = '';

    if ( function_exists( 'is_product' ) && is_product() ) {

    $data = get_field('selling_tretments' , $page_id);
    $calss = "p_tretments";
    
}else{
     $calss = "p_products";
    $data = get_field('selling_products' , $page_id);
}

  if($data == ""){
    return $code;
  }

    $code .='

    <!-- Latest compiled and minified CSS -->
    <!-- https://xstore.8theme.com/demos/hosting/-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
     
<div class="cookies"> 
<button class="cookiesbutton">
 x
</button>
<p class="cookiestext">
  
   
    <!-- Item slider-->
    <div class="container-fluid">
    
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="carousel carousel-showmanymoveone slide" id="itemslider">
            <div class="carousel-inner '.$calss.'">';
                $i  = 0;
            foreach ($data as $key => $value) {
              $i++;
              if ( function_exists( 'is_product' ) && is_product() ) {
              // for Product single pages check tretmets
                $p_id = $value->ID;
                $p_title = $value->post_title;
                $p_link = get_permalink( $p_id );
                $formatted_price = "£".get_post_meta($p_id, '_sln_service_price', true);
                 $duration = get_post_meta($p_id, '_sln_service_duration', true); 
                 if($duration >= "01:00"){
                  $duration_type = "hr";
                }else{
                  $duration_type = "min";
                }
                $image_url =  get_the_post_thumbnail_url($p_id);

              }else{
                // for pages check products
                $p_id = $value->ID;
                $p_title = $value->post_title;
                $p_link = get_permalink( $p_id );
                $p_images = get_the_post_thumbnail($p_id, 'thumbnail');     
                $product = wc_get_product($p_id);
                $price =  $product->get_price();
                $formatted_price = wc_price($price);
                $image_id = $product->get_image_id();
                $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                $duration ='';
              }
                
          if($i == 1){
            $active = "active";
        }else{
            $active = "";
        }
        
        // Get the image URL
             $code .= '<div class="item '.$active.'">
                <div class="col-xs-12 col-sm-6 col-md-2 custom_box">
                  <a href="#">
                  <img src="'.$image_url.'" class="img-responsive center-block">
                  </a>
                  <h4 class="text-center">'.$p_title.'</h4>
                  <div class="d-flex">
                  <h5 class="text-center">'.$formatted_price.'</h5>
                  <h5 class="text-center">'.$duration.' '.$duration_type.'</h5>
                  </div>
                </div>
              </div>'; 
             
            }
              $code .= '</div>
            <div id="slider-control">
               </div>
          </div>
        </div>
      </div>
    </div>
    </p>
</div>
    <!-- Item slider end--> 
    
            <style>
            .d-flex {
                display: flex;
            }
            img.img-responsive.center-block {
                height: 65px;
            }
            .cookies {
                background: #fff;
                bottom: 0px;
                position: fixed;
                width: 100%;
                border-top: 2px solid white;
                left: 0;
                height: 190px;
            }
            #slider-text{
                padding-top: 40px;
                display: block;
              }
              #slider-text .col-md-6{
                overflow: hidden;
              }
              
              #slider-text h2 {
                font-family: "Josefin Sans", sans-serif;
                font-weight: 400;
                font-size: 30px;
                letter-spacing: 3px;
                margin: 30px auto;
                padding-left: 40px;
              }
              #slider-text h2::after{
                border-top: 2px solid #c7c7c7;
                content: "";
                position: absolute;
                bottom: 35px;
                width: 100%;
                }
              
              #itemslider h4{
                font-family: "Josefin Sans", sans-serif;
                font-weight: 400;
                font-size: 12px;
                margin: 10px auto 3px;
              }
              #itemslider h5{
                font-family: "Josefin Sans", sans-serif;
                font-weight: bold;
                font-size: 12px;
               }
              .p_products #itemslider h5{
                margin: 3px auto 2px; 
              }
              .p_products .d-flex {
                 text-align: center;
                justify-content: center;
             }
              .p_tretments .d-flex {
                display: flex;
                justify-content: space-evenly;
            }
              #itemslider h6{
                font-family: "Josefin Sans", sans-serif;
                font-weight: 300;;
                font-size: 10px;
                margin: 2px auto 5px;
              }
              .badge {
                background: #b20c0c;
                position: absolute;
                height: 40px;
                width: 40px;
                border-radius: 50%;
                line-height: 31px;
                font-family: "Josefin Sans", sans-serif;
                font-weight: 300;
                font-size: 14px;
                border: 2px solid #FFF;
                box-shadow: 0 0 0 1px #b20c0c;
                top: 5px;
                right: 25%;
              }
              #slider-control img{
                padding-top: 60%;
                margin: 0 auto;
              }
              @media screen and (max-width: 992px){
              #slider-control img {
                padding-top: 70px;
                margin: 0 auto;
              }
              }
              
              .carousel-showmanymoveone .carousel-control {
                width: 4%;
                background-image: none;
              }
              .carousel-showmanymoveone .carousel-control.left {
                margin-left: 5px;
              }
              .carousel-showmanymoveone .carousel-control.right {
                margin-right: 5px;
              }
              .carousel-showmanymoveone .cloneditem-1,
              .carousel-showmanymoveone .cloneditem-2,
              .carousel-showmanymoveone .cloneditem-3,
              .carousel-showmanymoveone .cloneditem-4,
              .carousel-showmanymoveone .cloneditem-5 {
                display: none;
              }
              @media all and (min-width: 768px) {
                .carousel-showmanymoveone .carousel-inner > .active.left,
                .carousel-showmanymoveone .carousel-inner > .prev {
                  left: -50%;
                }
                .carousel-showmanymoveone .carousel-inner > .active.right,
                .carousel-showmanymoveone .carousel-inner > .next {
                  left: 50%;
                }
                .carousel-showmanymoveone .carousel-inner > .left,
                .carousel-showmanymoveone .carousel-inner > .prev.right,
                .carousel-showmanymoveone .carousel-inner > .active {
                  left: 0;
                }
                .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
                  display: block;
                }
              }
              @media all and (min-width: 768px) and (transform-3d), all and (min-width: 768px) and (-webkit-transform-3d) {
                .carousel-showmanymoveone .carousel-inner > .item.active.right,
                .carousel-showmanymoveone .carousel-inner > .item.next {
                  -webkit-transform: translate3d(50%, 0, 0);
                  transform: translate3d(50%, 0, 0);
                  left: 0;
                }
                .carousel-showmanymoveone .carousel-inner > .item.active.left,
                .carousel-showmanymoveone .carousel-inner > .item.prev {
                  -webkit-transform: translate3d(-50%, 0, 0);
                  transform: translate3d(-50%, 0, 0);
                  left: 0;
                }
                .carousel-showmanymoveone .carousel-inner > .item.left,
                .carousel-showmanymoveone .carousel-inner > .item.prev.right,
                .carousel-showmanymoveone .carousel-inner > .item.active {
                  -webkit-transform: translate3d(0, 0, 0);
                  transform: translate3d(0, 0, 0);
                  left: 0;
                }
              }
              @media all and (min-width: 992px) {
                .carousel-showmanymoveone .carousel-inner > .active.left,
                .carousel-showmanymoveone .carousel-inner > .prev {
                  left: -16.666%;
                }
                .carousel-showmanymoveone .carousel-inner > .active.right,
                .carousel-showmanymoveone .carousel-inner > .next {
                  left: 16.666%;
                }
                .carousel-showmanymoveone .carousel-inner > .left,
                .carousel-showmanymoveone .carousel-inner > .prev.right,
                .carousel-showmanymoveone .carousel-inner > .active {
                  left: 0;
                }
                .carousel-showmanymoveone .carousel-inner .cloneditem-2,
                .carousel-showmanymoveone .carousel-inner .cloneditem-3,
                .carousel-showmanymoveone .carousel-inner .cloneditem-4,
                .carousel-showmanymoveone .carousel-inner .cloneditem-5,
                .carousel-showmanymoveone .carousel-inner .cloneditem-6  {
                  display: block;
                }
              }
              @media all and (min-width: 992px) and (transform-3d), all and (min-width: 992px) and (-webkit-transform-3d) {
                .carousel-showmanymoveone .carousel-inner > .item.active.right,
                .carousel-showmanymoveone .carousel-inner > .item.next {
                  -webkit-transform: translate3d(16.666%, 0, 0);
                  transform: translate3d(16.666%, 0, 0);
                  left: 0;
                }
                .carousel-showmanymoveone .carousel-inner > .item.active.left,
                .carousel-showmanymoveone .carousel-inner > .item.prev {
                  -webkit-transform: translate3d(-16.666%, 0, 0);
                  transform: translate3d(-16.666%, 0, 0);
                  left: 0;
                }
                .carousel-showmanymoveone .carousel-inner > .item.left,
                .carousel-showmanymoveone .carousel-inner > .item.prev.right,
                .carousel-showmanymoveone .carousel-inner > .item.active {
                  -webkit-transform: translate3d(0, 0, 0);
                  transform: translate3d(0, 0, 0);
                  left: 0;
                }
              } 
              .cookiestext {color:white;padding-left:10px;padding-right:10px;text-align:right;}
              .cookiesbutton {float:left;margin:15px;padding:0px 5px;background:#ffd700 ;color:#111;}
              .cookiesbutton:hover {background:#C8102E;color:#fff;}
              
              

              
              
            </style> 
            <script>
            jQuery(document).ready(function(){

                jQuery("#itemslider").carousel({ interval: 3000 });
                
                jQuery(".carousel-showmanymoveone .item").each(function(){
                var itemToClone = jQuery(this);
                
                for (var i=1;i<6;i++) {
                itemToClone = itemToClone.next();
                
                if (!itemToClone.length) {
                itemToClone = jQuery(this).siblings(":first");
                }
                
                itemToClone.children(":first-child").clone()
                .addClass("cloneditem-"+(i))
                .appendTo(jQuery(this));
                }
                });
                }); 

                jQuery(".cookiesbutton").click(function(){
                    jQuery(".cookies").fadeOut(500);
                 }); 

            </script>
            ';
            return $code;
  }

// ACf fields Json



[
    {
        "key": "group_6491602f66675",
        "title": "Cross sell and up sell Product for page",
        "fields": [
            {
                "key": "field_649160309a8a6",
                "label": "Products",
                "name": "selling_products",
                "aria-label": "",
                "type": "post_object",
                "instructions": "",
                "required": 0,
                "conditional_logic": 0,
                "wrapper": {
                    "width": "",
                    "class": "",
                    "id": ""
                },
                "post_type": [
                    "product"
                ],
                "taxonomy": "",
                "return_format": "object",
                "multiple": 1,
                "allow_null": 0,
                "ui": 1
            }
        ],
        "location": [
            [
                {
                    "param": "page_template",
                    "operator": "==",
                    "value": "default"
                }
            ]
        ],
        "menu_order": 0,
        "position": "normal",
        "style": "default",
        "label_placement": "top",
        "instruction_placement": "label",
        "hide_on_screen": "",
        "active": true,
        "description": "",
        "show_in_rest": 0
    },
    {
        "key": "group_6496db94ab547",
        "title": "Cross sell and up sell tretments",
        "fields": [
            {
                "key": "field_6496db94eea4d",
                "label": "Tretments",
                "name": "selling_tretments",
                "aria-label": "",
                "type": "post_object",
                "instructions": "",
                "required": 0,
                "conditional_logic": 0,
                "wrapper": {
                    "width": "",
                    "class": "",
                    "id": ""
                },
                "post_type": [
                    "sln_service"
                ],
                "taxonomy": "",
                "return_format": "object",
                "multiple": 1,
                "allow_null": 0,
                "ui": 1
            }
        ],
        "location": [
            [
                {
                    "param": "post_type",
                    "operator": "==",
                    "value": "product"
                }
            ]
        ],
        "menu_order": 0,
        "position": "normal",
        "style": "default",
        "label_placement": "top",
        "instruction_placement": "label",
        "hide_on_screen": "",
        "active": true,
        "description": "",
        "show_in_rest": 0
    }
]



