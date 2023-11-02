<?php
$heading = get_sub_field('heading');
$items = get_sub_field('items');
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$paddingTop_mobile = get_sub_field('paddingTop_mobile');
$paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';
if($items):
    ?>
    <div <?php echo $id; ?> class="section section--spacing--lg numbersBlock pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>">
        <div class="container">
            <?php if($heading): ?>
            <div class="row numbersBlock__heading">
                <div class="col-lg-6">
                    <div class="content-block animate fade-up"><?php echo $heading; ?></div>
                </div>
            </div>
            <?php endif; ?>
            
            <ul class="row numbersBlock__list">
            <?php 
            $loopCounter = 1;
            foreach($items as $item): 
                $heading = $item['heading'];
                $text = $item['text'];
                ?>
                <li class="col-md-3 col-12 numbersBlock__item animate fade-up <?php if($loopCounter==1) echo 'activePermanent'; ?>" data-id="<?php echo $loopCounter; ?>">
                    <div class="numbersBlock__item__inner">
                    <span class="numbersBlock__item__number title h2 text--outline"><?php echo $loopCounter; ?></span>
                    <?php if($heading): ?>
                        <h4 class="numbersBlock__item__title text--uppercase"><?php echo $heading; ?></h4>
                    <?php endif; ?>
                    <?php if($text): ?>
                        <div class="numbersBlock__item__text content-block"><?php echo $text; ?></div>
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