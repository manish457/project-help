<?php

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');


<?php if($featured_img_url != ''): ?>
    <img src="<?php echo $featured_img_url; ?>" alt="">
<?php endif; ?>





?>