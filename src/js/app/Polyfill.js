'use strict';

class Polyfill {
    constructor() {
        this.supportsNativeSmoothScroll = 'scrollBehavior' in document.documentElement.style;
    }

    // Polyfilled smooth scrolling for IE, Edge & Safari
    smoothScrollTo(to, duration) {
        const element = document.scrollingElement || document.documentElementl;
        const start = element.scrollTop;
        const change = to - start;
        const startDate = +new Date();

        // t = current time
        // b = start value
        // c = change in value
        // d = duration
        const easeInOutQuad = (t, b, c, d) => {
            t /= d/2;
            if (t < 1) return c/2*t*t + b;
            t--;
            return -c/2 * (t*(t-2) - 1) + b;
        };

        const animateScroll = _ => {
            const currentDate = +new Date();
            const currentTime = currentDate - startDate;
            element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));

            if (currentTime < duration) {
                requestAnimationFrame(animateScroll);
            } else {
                element.scrollTop = to;
            }
        };

        animateScroll();
    }
}
