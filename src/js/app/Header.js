'use strict';

class Header {
    constructor() {
        this.body = null;
        this.header = null;

        this.ticking = false;
    }

    // Init before frameworks
    init() {
        this.body = document.querySelector('body');
        this.header = document.querySelector('header');

        this.setEvent_stickyOnScroll();
    }

    // Init after frameworks
    initAfterFrameworks() {}

    // Set event: sticky on scroll
    setEvent_stickyOnScroll() {
        const self = this;

        window.addEventListener('scroll', e => {
            if (!self.ticking) {
                window.requestAnimationFrame(function() {
                    self._applyStickyClass(window.scrollY);
                    self.ticking = false;
                });

                self.ticking = true;
            }
        });

        self._applyStickyClass(window.scrollY);
    }

    // Helper: add or remove sticky class based on scroll position
    _applyStickyClass(scrollPosition) {
        const self = this;
		const isStuck = scrollPosition > 0;

        if (isStuck) {
            self.body.classList.add('hrc-sticky-header');
        } else {
            self.body.classList.remove('hrc-sticky-header');
        }
    }
}
