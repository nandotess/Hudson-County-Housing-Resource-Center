'use strict';

// Project JS coding rules:
// - Try, as much as possible, use ES6 instead jQuery... it's always good to learn something new! =)
// - jQuery is still imported because there are libraries that require:
// -- Foundation 6

class Base {
    constructor() {
        // All classes instances
        this.header = new Header();
        this.polyfill = new Polyfill();

        // On DOM ready
        this.onDomReady();
    }

    // On DOM ready
    onDomReady() {
        const self = this;

        // On DOM ready
        document.addEventListener('DOMContentLoaded', () => {
            if (document.readyState === 'interactive' || document.readyState === 'complete') {
				self.onDomReadyCallback();
            }
        });
    }

    // On DOM ready (callback)
    onDomReadyCallback() {
        const self = this;

        // Init before frameworks
        self.init();

        // Foundation 6 initialization
        jQuery(document).foundation();

        // Init after frameworks
        self.initAfterFrameworks();
    }

    // Init before frameworks
    init() {
        for (var i in this) {
            if (typeof this[i].init === 'function') {
                this[i].init();
            }
        }
    }

    // Init after frameworks
    initAfterFrameworks() {
        for (var i in this) {
            if (typeof this[i].initAfterFrameworks === 'function') {
                this[i].initAfterFrameworks();
            }
        }
    }
}

const HRC = new Base();
