<?php 
    $heading = get_sub_field('heading');
    $image1 = get_sub_field('image1');
    $image2 = get_sub_field('image2');
    $image3 = get_sub_field('image3');
    $blockLayout = get_sub_field('block_layout');
    $padding = get_sub_field('padding');

    $imageClasses = '';
    $ThirdColImageClasses = '';
    $LeftColumnClasses = '';
    $RightColumnClasses = '';
    if($blockLayout=='2colsLRB'):
        $contentClasses.= 'image-tiles—right';
        $ThirdColImageClasses.= 'display: none;';
        $LeftColumnClasses.= 'col-md-4 d-flex align-items-center justify-content-center';
        $RightColumnClasses.= 'col-md-6';
    elseif($blockLayout=='2colsLRS'):
        $contentClasses.= 'image-tiles—left';
        $ThirdColImageClasses.= 'display: none;';
        $LeftColumnClasses.= 'col-md-6';
        $RightColumnClasses.= 'col-md-4 d-flex align-items-center justify-content-center';
    elseif($blockLayout=='3colsLU'):
        $contentClasses.= '';
        $ThirdColImageClasses.= 'display: flex; align-self: flex-start;';
        $LeftColumnClasses.= 'col-md-3 align-self-end';
        $RightColumnClasses.= 'col-md-6 ';
    elseif($blockLayout=='3colsLD'):
        $contentClasses.= '';
        $ThirdColImageClasses.= 'display: flex; align-self: flex-end;';
        $LeftColumnClasses.= 'col-md-3';
        $RightColumnClasses.= 'col-md-6';
    elseif($blockLayout=='3colsRC'):
        $contentClasses.= '';
        $ThirdColImageClasses.= 'display: flex; align-self: center;';
        $LeftColumnClasses.= 'col-md-3';
        $RightColumnClasses.= 'col-md-6';
    endif; 
?>
<section class="section image-tiles py-<?php echo $padding ?>">
    <div class="container">
        <?php if($heading) : ?>
            <div class="row">
                <div class="col-lg-6 offset-lg-3 image-tiles__heading"><?php echo $heading ?></div>
            </div>
        <?php endif; ?>
        <ul class="row image-tiles__list <?php echo $contentClasses ?>">
            <li class="image-tiles__item image-tiles__item—1 <?php echo $LeftColumnClasses ?>">
                <img class="image-tiles__item__image" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
            </li>
            <li class="image-tiles__item image-tiles__item—2 <?php echo $RightColumnClasses ?>">
                <img class="image-tiles__item__image" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
            </li>
            <li class="image-tiles__item image-tiles__item—3 col-md-3" style="<?php echo $ThirdColImageClasses?>">
                <img class="image-tiles__item__image" src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" />
            </li>
        </ul>
    </div>
</section>

            