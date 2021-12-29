import $  from 'jquery';

import { lazy } from './lazy';
import { lottie } from './lottie';

import { header } from './template-parts/header/header';

//animations
import { scrollToAnchor,scrollToHash, requestQuoteLink } from './animations/scroll-to-anchor';
import { appearence } from './animations/appearence';

//blocks
import { videoBlock } from './template-parts/blocks/video';
import { videoBanner } from './template-parts/blocks/video-banner';
import { testimonialsSlider } from './template-parts/blocks/testimonials-slider';





header();
lazy();
lottie();

//animations
appearence();

//blocks
videoBlock();
testimonialsSlider();