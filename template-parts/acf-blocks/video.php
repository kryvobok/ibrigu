<?php
/**
 * Block Name: Video Block
 *
 */


$style  = get_sub_field('style');
//video
$videoType = get_sub_field('video_type');
//video html
$videoFile = get_sub_field('video_file');
$videoPreview = get_sub_field('video_poster');
//video oembed
$videoOembed = get_sub_field('video_link');
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
// create id attribute for specific styling
$id = get_sub_field('block_id');
?>
<section id="<?php echo $id; ?>" class="videoBlock pt-<?php echo $paddingTop ?> pb-<?php echo $paddingBottom ?>">
    <div class="section">
        <?php if($style == 'full'): ?>
            <?php if($videoType == 'html' && $videoFile): ?>
                <div class="videoBlock__video">
                    <video class="video video--html5" controls="false" <?php if($videoPreview): ?>data-poster="<?php echo $videoPreview['url']; ?>" <?php endif; ?>>
                        <source src="<?php echo $videoFile['url']; ?>" type="video/mp4" />
                    </video>
                </div>
            <?php else: ?>
                <div class="videoBlock__video">
                    <div class="video video--oembed">
                        <?php echo $videoOembed; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="container">
					<?php if($videoType == 'html' && $videoFile): ?>
						<div class="videoBlock__video">
							<video class="video video--html5" controls="false" <?php if($videoPreview): ?>data-poster="<?php echo $videoPreview['url']; ?>" <?php endif; ?>>
								<source src="<?php echo $videoFile['url']; ?>" type="video/mp4" />
							</video>
						</div>
					<?php else: ?>
						<div class="videoBlock__video">
							<div class="video video--oembed">
								<?php echo $videoOembed; ?>
							</div>
						</div>
					<?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>