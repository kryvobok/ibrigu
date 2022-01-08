<?php
$heading = get_sub_field('heading');
$items = get_sub_field('items');
$backgroundColor = get_sub_field('background_color');
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';
if($items):
    ?>
    <div <?php echo $id; ?> class="section section--spacing--lg  pt-<?php echo $paddingTop ?> pb-<?php echo $paddingBottom ?> teamBlock" style="background-color: <?php echo $backgroundColor; ?>">
        <div class="container">
            <?php if($heading): ?>
            <div class="row teamBlock__heading">
                <div class="col-lg-6">
                    <div class="content-block animate fade-up"><?php echo $heading; ?></div>
                </div>
            </div>
            <?php endif; ?>
            <ul class="row teamBlock__list">
                <?php 
                $loopCounter = 1;
                foreach($items as $item): 
                    if($loopCounter==3 || $loopCounter==7){
                        ?>
                            <li class="col-lg-4 col-md-6"></li>
                            <li class="col-lg-4 col-md-6"></li>
                        <?php
                    }
                    $image = $item['image'];
                    $heading = $item['heading'];
                    $subheading = $item['subheading'];
                    $text = $item['text'];
                    ?>
                    <li class="col-lg-4 col-sm-6 teamBlock__item animate fade-up">
                        <div class="teamBlock__item__inner">
                            <div class="img-block teamBlock__item__image">
                                <?php if($image): ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                <?php endif; ?>
                            </div>
                            <?php if($heading): ?>
                                <h4 class="teamBlock__item__title text--uppercase"><?php echo $heading; ?></h4>
                            <?php endif; ?>
                            <?php if($subheading): ?>
                                <p class="teamBlock__item__subtitle text--size--16"><?php echo $subheading; ?></p>
                            <?php endif; ?>
                            <?php if($text): ?>
                                <div class="teamBlock__item__text content-block"><?php echo $text; ?></div>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php 
                    $loopCounter++;
                endforeach; ?>
            </ul>
        </div>
    </div>
    <?php
endif;