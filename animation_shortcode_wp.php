add_shortcode('AnimationSection',  function(){
	?>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
.holderCircle {
	width: 500px;
	height: 500px;
	border-radius: 100%;
	margin: 60px auto;
	position: relative;
}


.dotCircle {
	width: 100%;
	height: 100%;
	position: absolute;
	margin: auto;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	border-radius: 100%;
	z-index: 20;
}

.dotCircle .itemDot {
	display: block;
	width: 80px;
	height: 80px;
	position: absolute;
	background: #ffffff;
	color: #E5A024;
	border-radius: 20px;
	text-align: center;
	line-height: 80px;
	font-size: 30px;
	z-index: 3;
	cursor: pointer;
	border: 2px solid #e6e6e6;
}

.dotCircle .itemDot .forActive {
	width: 56px;
	height: 56px;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	display: none;
}

.dotCircle .itemDot .forActive::after {
	content: '';
	width: 5px;
	height: 5px;
	border: 3px solid #E5A024;
	bottom: -31px;
	left: -14px;
	filter: blur(1px);
	position: absolute;
	border-radius: 100%;
}

.dotCircle .itemDot .forActive::before {
	content: '';
	width: 6px;
	height: 6px;
	filter: blur(5px);
	top: -15px;
	position: absolute;
	transform: rotate(-45deg);
	border: 6px solid #E5A024;
	right: -39px;
}

.dotCircle .itemDot.active .forActive {
	display: block;
}

.round {
	position: absolute;
	left: 40px;
	top: 45px;
	width: 410px;
	height: 410px;
	border: 2px dotted #E5A024;
	border-radius: 100%;
	-webkit-animation: rotation 100s infinite linear;
}

.dotCircle .itemDot:hover,
.dotCircle .itemDot.active {
	color: #ffffff;
	transition: 0.5s;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#E5A024+0,a733bb+100 */
	background: #E5A024;
	/* Old browsers */
	background: -moz-linear-gradient(left, #E5A024 0%, #E5A024 100%);
	/* FF3.6-15 */
	background: -webkit-linear-gradient(left, #E5A024 0%, #E5A024 100%);
	/* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to right, #E5A024 0%, #E5A024 100%);
	/* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#E5A024', endColorstr='#E5A024', GradientType=1);
	/* IE6-9 */
	border: 2px solid #ffffff;
	-webkit-box-shadow: 0 30px 30px 0 rgba(0, 0, 0, .13);
	-moz-box-shadow: 0 30px 30px 0 rgba(0, 0, 0, .13);
	box-shadow: 0 30px 30px 0 rgba(0, 0, 0, .13);
}

.dotCircle .itemDot {
	font-size: 40px;
}

 .contentCircle {
    width: 634px;
    border-radius: 100%;
    color: #222222;
    position: relative;
    top: 120px;
    right: -170%; 
    transform: translate(-50%, -50%);
}

.contentCircle .CirItem {
	border-radius: 100%;
	color: #222222;
	position: absolute; 
	bottom: 0;
	left: 0;
	opacity: 0;
	transform: scale(0);
	transition: 0.5s;
	font-size: 15px;
	width: 100%;
	height: 100%;
	top: 0;
	right: 0;
	margin: auto;
	line-height: 250px;
}

.CirItem.active {
	z-index: 1;
	opacity: 1;
	transform: scale(1);
	transition: 0.5s;
}

.contentCircle .CirItem i {
	font-size: 180px;
	position: absolute;
	top: 0;
	left: 50%;
	margin-left: -90px;
	color: #000000;
	opacity: 0.1;
}

@media only screen and (min-width:300px) and (max-width:599px) {
	.holderCircle {
		/* width: 300px; height: 300px;*/
		margin: 110px auto;
	}

	.holderCircle::after {
		width: 100%;
		height: 100%;
	}

	.dotCircle {
		width: 100%;
		height: 100%;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		margin: auto;
	}
}

 

.title-box .title {
	font-weight: 600;
	letter-spacing: 2px;
	position: relative;
	z-index: -1;
}

.title-box span { 
	font-weight: 600;
    font-size: 16px;
    font-family: Radikal;
	color: #E5A024;
}

.title-box p {
    font-size: 15px;
    line-height: 2em;
    font-family: Radikal;
    width: 516px;
}
    </style>



<!------ Include the above in your HEAD tag ---------->
<section class="iq-features">
    <div class="container__">
        <div class="row__ align-items-center">
            <div class="col-lg-3 col-md-12"></div>
            <div class="col-lg-6 col-md-12">
                <div class="holderCircle">
                    <div class="round"></div>
                    <div class="dotCircle">
                        <span class="itemDot active itemDot1" data-tab="1">
                        <p>01</p>
                        <span class="forActive"></span>
                        </span>
                        <span class="itemDot itemDot2" data-tab="2">
                        <p>02</p>
                        <span class="forActive"></span>
                        </span>
                        <span class="itemDot itemDot3" data-tab="3">
                        <p>03</p>
                        <span class="forActive"></span>
                        </span>
                        <span class="itemDot itemDot4" data-tab="4">
                        <p>04</p>
                        <span class="forActive"></span>
                        </span>
                        <span class="itemDot itemDot5" data-tab="5">
                        <p>05</p>
                        <span class="forActive"></span>
                        </span>
                        <span class="itemDot itemDot6" data-tab="6">
                        <p>06</p>
                        <span class="forActive"></span>
                        </span>
                    </div>
                    <div class="contentCircle">
                        <div class="CirItem title-box active CirItem1">
                            <h2 class="title"><span>FORMATION OF A SOCIETY REDEVELOPMENT COMMITTEE</span></h2>
                            <p>A core committee of the housing society is formed which includes eligible members of the housing society. A Special General Body Meeting or SGM is held by the committee responsible for overseeing the redevelopment process.
                                The committee designs a roadmap for the redevelopment process with strict adherence to the by-laws. </p>

                        </div>
                        <div class="CirItem title-box CirItem2">
                            <h2 class="title"><span>APPOINTMENT OF PROJECT MANAGEMENT CONSULTANT (PMC) </span></h2>
                            <p>The committee usually appoints a PMC who is partners with the committee as an advisor and guides the committee throughout the redevelopment process. The PMC helps the committee in preparing all required documents, obtaining
                                quotes from various contractors, getting required permissions etc.</p>

                        </div>
                        <div class="CirItem title-box CirItem3">
                            <h2 class="title"><span>CONDUCTING A FEASIBILITY STUDY</span></h2>
                            <p>To ascertain the viability of the project to be redeveloped, a feasibility study is conducted. The procedure includes analysis, assessment and scrutiny of the existing structure, financial aspects and evaluation of benefits
                                to the beneficiaries. </p>

                        </div>
                        <div class="CirItem title-box CirItem4">
                            <h2 class="title"><span>CONSENT FROM SOCIETY MEMBERS</span></h2>
                            <p>Before proceeding with the redevelopment process, it’s imperative to obtain consent of at least 75% of the members. This is a very crucial aspect that needs to be addressed, to ensure smooth and undisputed progression of the
                                process. Initiating the process may not be possible without this consent.</p>

                        </div>
                        <div class="CirItem title-box CirItem5">
                            <h2 class="title"><span>SUBMISSION OF THE REDEVELOPMENT PROPOSAL</span></h2>
                            <p>Post obtaining the consent of the members the committee members or the PMC needs to submit the said proposal to the concerned authorities for further processing. The authorities in this context means the Commissioner of Co-operation
                                and Registrar or the Divisional Joint-Registrar.</p>

                        </div>
                        <div class="CirItem title-box CirItem6">
                            <h2 class="title"><span>EXECUTION OF THE REDEVELOPMENT PROJECT</span></h2>
                            <p>Once the relevant approvals are received, the committee can begin the process of executing the redevelopment. For this the committee has to invite appropriate tenders, select a developer chosen unanimously and implement the
                                rules for the redevelopment process. </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12"></div>
        </div>
    </div>
</section>


<script>
            
	let i=2;

	
jQuery(document).ready(function($){
    var radius = 200;
    var fields = $('.itemDot');
    var container = $('.dotCircle');
    var width = container.width();
radius = width/2.5;

     var height = container.height();
    var angle = 0, step = (2*Math.PI) / fields.length;
    fields.each(function() {
        var x = Math.round(width/2 + radius * Math.cos(angle) - $(this).width()/2);
        var y = Math.round(height/2 + radius * Math.sin(angle) - $(this).height()/2);
        if(window.console) {
            console.log($(this).text(), x, y);
        }
        
        $(this).css({
            left: x + 'px',
            top: y + 'px'
        });
        angle += step;
    });
    
    
    $('.itemDot').click(function(){
        
        var dataTab= $(this).data("tab");
        $('.itemDot').removeClass('active');
        $(this).addClass('active');
        $('.CirItem').removeClass('active');
        $( '.CirItem'+ dataTab).addClass('active');
        i=dataTab;
        
        $('.dotCircle').css({
            "transform":"rotate("+(360-(i-1)*36)+"deg)",
            "transition":"2s"
        });
        $('.itemDot').css({
            "transform":"rotate("+((i-1)*36)+"deg)",
            "transition":"1s"
        });
        
        
    });
    
    setInterval(function(){
        var dataTab= $('.itemDot.active').data("tab");
        if(dataTab>6||i>6){
        dataTab=1;
        i=1;
        }
        $('.itemDot').removeClass('active');
        $('[data-tab="'+i+'"]').addClass('active');
        $('.CirItem').removeClass('active');
        $( '.CirItem'+i).addClass('active');
        i++;
        
        
        $('.dotCircle').css({
            "transform":"rotate("+(360-(i-2)*36)+"deg)",
            "transition":"2s"
        });
        $('.itemDot').css({
            "transform":"rotate("+((i-2)*36)+"deg)",
            "transition":"1s"
        });
        
        }, 5000);
    
});

        </script>
		

	<?php
});

