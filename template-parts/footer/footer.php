<a class="back_to_top text--center py-2 py-md-5 d-flex align-items-center justify-content-center" title="">
	<svg xmlns="http://www.w3.org/2000/svg" width="26.006" height="24.764" viewBox="0 0 26.006 24.764">
  <g id="Icon_feather-arrow-up" data-name="Icon feather-arrow-up" transform="translate(-5.379 -6)">
    <path id="Контур_8" data-name="Контур 8" d="M18,29.264V7.5" transform="translate(0.382 0)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
    <path id="Контур_9" data-name="Контур 9" d="M7.5,18.382,18.382,7.5,29.264,18.382" transform="translate(0 0)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
  </g>
</svg>
</a>

<footer id="footer" class="footer">

	<div class="footer__main bg--white">

			<div class="container">
				<div class="row">

					<div class="col-12 col-lg-2 col-md-4 col-sm-6 footer__main__col footer__main__col-1">
						<nav class="footer__main__nav font-weight-600">
							<?php wp_nav_menu( array('menu_id'=>'footer-nav','container_class' => 'footer-nav','theme_location' => 'footer-menu-1') ); ?>
						</nav>
					</div>
					
					<div class="col-12 col-lg-2 col-md-4 col-sm-6 footer__main__col footer__main__col-2">
						<nav class="footer__main__nav font-weight-600">
							<?php wp_nav_menu( array('menu_id'=>'footer-nav','container_class' => 'footer-nav','theme_location' => 'footer-menu-2') ); ?>
						</nav>
					</div>

					<div class="col-12 col-lg-2 col-md-4 footer__main__col footer__main__col-3">
						<?php 
						$footerSocial = get_field('social_media_icons','option');
						$socialTitle = get_field('socialTitle','option');
						if($footerSocial):
						?>
							<div class="footer__main__social">
							
								<ul class="footer__main__social__list">
									<li class="footer__menu__title"><?php echo $socialTitle ?></li>
									<?php foreach($footerSocial as $item): 
										$link = $item['link'];
										if($link):
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											<li>
												<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>">
													<?php echo esc_html( $link_title ); ?>
												</a>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>

							</div>
						<?php endif; ?>
					</div>

					<div class="col-12 col-lg-4 offset-lg-2 footer__main__col footer__main__col-4">
						
						<?php 
						$enableFooterNewsletter = get_field('enable_footer_newsletter','option');
						$footereNewsletter = get_field('footer_newsletter_form','option');
						$footereNewsletterTitle = get_field('footer_newsletter_title','option');
						if($enableFooterNewsletter && $footereNewsletter):
						?>
							<div class="form form--newsletter footer__main__newsletter">
								<?php if($footereNewsletterTitle): ?>
									<?php echo $footereNewsletterTitle; ?>
								<?php endif; ?>
								<?php echo do_shortcode($footereNewsletter); ?>
							</div>
						<?php endif; ?>
						
						

					</div>

				</div>	
			</div>
		</div>

		<div class="footer__bottom bg--white--light">
			<div class="container footer__bottom__inner">
					
					<?php 
					$footerCopyright = get_field('footer_copyright', 'option');
					if($footerCopyright):
					?>
						<div class="text--opacity footer__bottom__copyright"><?php echo $footerCopyright; ?></div>
					<?php endif;?>

					<div class="footer__bottom__nav">
						<?php
						$menu = wp_nav_menu(
							array (
								'menu_id'=>'footer-nav',
								'container_class' => 'footer-nav',
								'theme_location' => 'footer-bottom-menu',
								'echo' => FALSE,
								'fallback_cb' => '__return_false'
							)
						);

						if ( ! empty ( $menu ) )
						{
							echo $menu;
						}?>
					</div>

			</div>
		</div>

</footer>	
	