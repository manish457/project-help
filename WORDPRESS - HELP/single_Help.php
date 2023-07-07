<?php


/**


 * The template for displaying all single posts


 *


 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post


 *


 * @package WordPress


 * @subpackage Twenty_Twenty_One


 * @since Twenty Twenty-One 1.0


 */





get_header(); ?>


<!-- ================ BLOG SINGLE PAGE ============== -->
<section class="loyality-banner common-background-style" style="background-image:url(/wp-content/uploads/2022/05/Group-59.png)">
	<div class="container text-center">
		<h1><?php the_title();?></h1>
		
	</div>
</section>
<div class="single-page-breadcrumb">
	<div class="site-breadcrumb default-page-breadcamb text-center">
		<?php
if (function_exists('simple_breadcrumb')) {
	simple_breadcrumb();
} ?>
	</div>
</div>
<section class="single-page-area">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-4">
					<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			 if($featured_img_url != ''): ?>
				<div class="single-image-holder">
					<img src="<?=$featured_img_url?>" class="w-100">
				</div>
				<?php endif;?>
				<?php $terms = get_terms( array(
					'taxonomy' => $taxonomy_slug,
					'hide_empty' => false,
				) );?>
				<?php if($terms):?>
				<select class="select-style form-control" onchange="if(this.value!='') window.location.href=this.value;">
						<option selected="true" disabled="disabled"><?=__('Choose Category','twentychild')?></option>
						<?php foreach($terms as $terms_post): ?>
						<option value="<?=get_term_link($terms_post)?>"><?=$terms_post->name?></option>
						<?php endforeach; ?>
				</select>
				<?php endif;?>
			</div>
			<div class="col-lg-8">
				<div class="single-page-content">
					<?php the_content();?>
					
								
				</div>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>
<style type="text/css">
	.blog-page-banner{
		height:700px;
	}
.blog-page-banner .banner-content-position {
    top: 39%;
    right: 0;
}
 .select-style {
    max-width: 620px;
    margin: 25px auto 20px;
    margin-bottom: 100px;
    font-family: 'Cormorant', serif;
	text-transform: uppercase;
	font-weight: 600;
    font-size: 20px;
    line-height: 30px;
    color: #000000;
    appearance: none;
    height: auto;
    padding: 13px 15px;
    width: 100%;
    background: url(/wp-content/uploads/2021/10/Icon-ionic-ios-arrow-down.png) transparent no-repeat 98% center;
	border:0;
	border-bottom: 2px solid #8A7C69;
	border-radius:0;
}
	.blog-area{
		background:#fff;
		padding:60px 0;
	    margin-top: -314px;
	}
	.blog-area .col-lg-4{
		margin-bottom:90px;
	}
	.blog-each-part{
		background:#FAF8F4;
/* 		height:100%;	 */
        box-shadow: 0px 0px 34px -8px rgb(0 0 0 / 45%);
		margin: 0 5px;
	}
	.blog-each-image-holder img{
		height:247px;
	}
	.blog-content{
		padding:24px 15px;
	}
	.blog-each-part h2{
		font-size:30px;
	}
	.blog-each-part p{
		padding:15px 0;
	}
	.blog-each-part a{
		font-family: 'Kepler Std light';
		color:#49C8F2;
		font-size:20px;
	}
	.blog-each-part a i{
		font-size:14px;
		margin-left: 8px;
	}
/*==== BLOG SINGLE PAGE	==== */
	.single-page-breadcrumb{
		background:#E3DECF;
		padding:8px 0;
	}
	.single-page-area{
		padding: 40px 0 100px;
        background-color: #FAF8F4;
	}
	.single-page-area .single-image-holder{
		width:300px;
		height:300px;
		border-radius:50%;
		overflow:hidden;
		margin:0 auto;
	}
	.single-page-area .single-image-holder img{
		object-fit:cover;
		height: 100%;
	}
	.single-page-area .select-style{
		margin:80px auto 20px;
		max-width: 300px;
	}
	.single-page-content h2{
		margin-bottom:20px;
	}
	.single-page-content p{
		margin-bottom:15px;
	}
	@media(max-width:767px){
		.blog-area {
		padding: 0 0 30px;
		margin-top: -279px;
	}
		.blog-area .col-lg-4 {
		margin-bottom: 70px;
	}
	.single-page-area .select-style {
		margin: 24px auto 20px;
	}
	.single-page-area {
		padding: 40px 0 ;
     }	
	.single-page-content p {
		margin-bottom: 0;
	}
	.single-page-content h2 {
		margin-bottom: 10px;
	}	
	}
</style>







