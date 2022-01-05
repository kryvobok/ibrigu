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
						if($footerSocial):
						?>
							<div class="footer__main__social">
							
								<ul class="footer__main__social__list">
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
	