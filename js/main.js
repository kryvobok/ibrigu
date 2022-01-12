import $  from 'jquery';

//import { lazy } from './lazy';
import { lottie } from './lottie';

import { header } from './template-parts/header/header';

//animations
import { scrollToAnchor,scrollToHash, requestQuoteLink } from './animations/scroll-to-anchor';
import { appearence } from './animations/appearence';

//blocks
import { videoBlock } from './template-parts/blocks/video';
import { heroSlider } from './template-parts/blocks/hero-slider';


(function() {
    'use strict';
  
    function trackScroll() {
      var scrolled = window.pageYOffset;
      var coords = document.documentElement.clientHeight;
  
      if (scrolled > coords) {
        goTopBtn.classList.add('back_to_top-show');
      }
      if (scrolled < coords) {
        goTopBtn.classList.remove('back_to_top-show');
      }
    }
  
    function backToTop() {
      if (window.pageYOffset > 0) {
        window.scrollBy(0, -80);
        setTimeout(backToTop, 0);
      }
    }
  
    var goTopBtn = document.querySelector('.back_to_top');
  
    window.addEventListener('scroll', trackScroll);
    goTopBtn.addEventListener('click', backToTop);
  })();

header();
//lazy();
lottie();

//animations
appearence();

//blocks
videoBlock();
heroSlider();