<div class="search-box advance-search-header">
	<div class="banner-form-upper">
		<h2>find <em>your</em> solution</h2>
		<div class="banner-form">
			<img src="/wp-content/uploads/2022/07/close.svg"  alt="" class="search-close">
			<div class="">
				<div class="search-field-area">
					<div class="">
						<form method="get" action="<?php echo get_home_url(); ?>">
							<div class="advance-search-wrapper">
								<div class="form-input">
									<input type="text" name="s" id="advance-search" placeholder="Search your concern..." autocomplete="off">
									<img src="/wp-content/uploads/2022/07/rolling.svg"  alt="" id="advance-search-loading" style="display:none;">
									<img src="/wp-content/uploads/2022/07/close.svg"  alt="" id="advance-search-close" style="display:none;">
								</div>
								<div class="form-button">
									<button>Search<img src="/wp-content/uploads/2022/07/search-interface-symbol-2.png"/></button>
								</div>
							</div>
							<div class="advance-search-display-show" id="advance-search-display"></div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="banner-form search-box">
	<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/Group 200.svg"  alt="" class="search-close">
	<div class="search-field-area">
		<div class="for-search-form">
			<form method="get" action="<?php echo get_home_url(); ?>" class="d-flex align-items-center">
				<div class="advance-search-wrapper">
					<input type="text" class="" placeholder="Search your concern..."/>
					<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/rolling.svg"  alt="" id="advance-search-loading" style="display:none;">
					<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/close.svg"  alt="" id="advance-search-close" style="display:none;">
				</div>
				<div class="form-button">
					<button>Search<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/search.svg"/></button>
				</div>
				<div id="advance-search-display"></div>
			</form>
		</div>
	</div>
</div> -->

<style type="text/css">
	.advance-search-wrapper{
		position:relative;
	}
	#advance-search-loading, #advance-search-close{
		position: absolute;
		right: 70px;
		left: initial;
		width: 40px;
	}
	#advance-search-close{
		cursor:pointer;
	}
	#advance-search-display{
		position:absolute;
		width:100%;
		background:#fff;
		max-height:calc( 50vh - 30px);
		overflow-y:auto;
		margin-top:10px;
		margin-bottom:10px;
	}
	#advance-search-display ul{
		list-style:none;
		margin:0;
		padding:0;
	}
	#advance-search-display h5{
		padding:10px 20px;
		background:#a0004a;
		color:#fff;
		font-size:100%;
		font-weight:700;
	}
	#advance-search-display ul li{
		border-bottom:1px solid #e4e4e4;
		padding:15px 20px;
	}
	#advance-search-display ul li:hover{
		background:#f4f4f4;
	}
	
	/*#advance-search-display ul li:last-of-type{
		border-width:0px;
	}*/
	#advance-search-display ul li h4, #advance-search-display ul li p{
		margin-bottom:0px;
	}
	#advance-search-display ul li p{
		line-height: normal;
	}
	#advance-search-display ul li p a{
		color:inherit;
	}
	.for-search-form input[type='text'], #ajaxsearchlite1 .probox .proinput input, div.asl_w .probox .proinput input {
		background: url('<?php echo get_stylesheet_directory_uri() ?>/assets/images/Icon-map-search.svg')no-repeat 98% center !important;
	}

	.search-box .form-input {
		width: 80%;
		display: inline-block;
	}
	.search-box .form-button {
		display: inline-block;
	}
	.search-box #advance-search-loading,.search-box #advance-search-close {
		position: absolute;
		right: 104px;
		left: initial;
		width: 23px;
		top: 50%;
		transform: translateY(-50%);
	}
	.search-box #advance-search-display {
		margin-top: 0;
		margin-bottom: 10px;
		left: 50%;
		width: 50%;
		transform: translateX(-50%);
	}
</style>
<script>
	function fill(Value) {
	   //Assigning value to "search" div in "search.php" file.
	   $('#advance-search').val(Value);
	   //Hiding "display" div in "search.php" file.
	   $('#advance-search-display').hide();
	}

	jQuery(document).ready(function($) {
	   //On pressing a key on "Search box" in "twentytwenty-child/inc/custom-function.php" file. This function will be called.
	   $("#advance-search").on('keyup focus', function() {
		   //Assigning search box value to javascript variable named as "name".
		   var name = $('#advance-search').val();
		   //Validating, if "name" is empty.
		   if (name == "") {
			   //Assigning empty value to "display" div in "search.php" file.
			   $("#advance-search-display").html("");
		   }
		   //If name is not empty.
		   else {
			   //AJAX is called.
			   $.ajax({
					//AJAX type is "Post".
					type: "POST",
					//Data will be sent to "ajax.php".
					url: '<?=admin_url( "admin-ajax.php" )?>',
					//Data, that will be sent to "ajax.php".
					data: {
					   action : 'advance_search_result',
					   //Assigning value of "name" into "search" variable.
					   search: name
					},
					beforeSend: function() {
						// setting a timeout
						$('#advance-search-loading').show();
						$('#advance-search-close').hide();
					},
					//If result found, this funtion will be called.
					success: function(html) {
					   html = html.slice(0, -1);
					   //Assigning result to "display" div in "search.php" file.
					   $('#advance-search-loading').hide();
					   $('#advance-search-close').show();
					   $("#advance-search-display").html(html).show();

					}

			   });

			}

		});
		$("#advance-search-close").click(function() {
			$('#advance-search-display').hide();
			$('#advance-search-loading').hide();
			$('#advance-search-close').hide();
		})
	});
</script>