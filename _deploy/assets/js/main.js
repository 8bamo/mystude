/* mystu.de — main.js */
(function () {
    'use strict';

    // Header scroll effect
    const header = document.getElementById('site-header');
    if (header) {
        const onScroll = () => {
            header.classList.toggle('scrolled', window.scrollY > 40);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // Mobile nav toggle
    const toggle = document.getElementById('nav-toggle');
    const nav    = document.getElementById('primary-nav');
    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const open = nav.classList.toggle('open');
            toggle.setAttribute('aria-expanded', open);
            document.body.style.overflow = open ? 'hidden' : '';
        });

        // Close on outside click
        document.addEventListener('click', (e) => {
            if (!header.contains(e.target) && nav.classList.contains('open')) {
                nav.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        });
    }

    // Smooth anchor scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const target = document.querySelector(anchor.getAttribute('href'));
            if (!target) return;
            e.preventDefault();
            const offset = 88;
            const top = target.getBoundingClientRect().top + window.scrollY - offset;
            window.scrollTo({ top, behavior: 'smooth' });
        });
    });

    // Intersection observer — fade-in on scroll
    if ('IntersectionObserver' in window) {
        const style = document.createElement('style');
        style.textContent = `
            .fade-in { --reveal-shift: 20px; opacity: 0; transform: translate3d(0, calc(var(--reveal-shift, 0px) + var(--parallax-shift, 0px)), 0); transition: opacity 0.55s ease, transform 0.55s ease; }
            .fade-in.visible { --reveal-shift: 0px; opacity: 1; }
        `;
        document.head.appendChild(style);

        const targets = document.querySelectorAll(
            '.article-card, .category-card, .collab-panel, .stat-item, .cta-inner'
        );

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), i * 60);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        targets.forEach(el => {
            el.classList.add('fade-in');
            observer.observe(el);
        });
    }

    // Subtle scroll parallax for hero layers and site-wide content blocks
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!prefersReducedMotion) {
        const globalParallaxItems = document.querySelectorAll(
            'main > section > .mx-auto, main > section > .relative, .prose-content, .events-summer-hero, footer > .mx-auto'
        );

        globalParallaxItems.forEach((item, index) => {
            if (!item.hasAttribute('data-parallax')) {
                item.setAttribute('data-parallax', '');
                item.dataset.parallaxSpeed = (index % 2 === 0) ? '0.055' : '-0.045';
            }
        });

        document.querySelectorAll('main > section, footer').forEach((section) => {
            if (!section.hasAttribute('data-parallax-section')) {
                section.setAttribute('data-parallax-section', '');
            }
        });
    }

    const parallaxItems = prefersReducedMotion ? [] : Array.from(document.querySelectorAll('[data-parallax]'));

    if (parallaxItems.length) {
        let ticking = false;

        const updateParallax = () => {
            parallaxItems.forEach((item) => {
                const speed = parseFloat(item.dataset.parallaxSpeed || '0.1');
                const rect = item.getBoundingClientRect();
                const section = item.closest('[data-parallax-section]') || item.parentElement;
                const sectionRect = section ? section.getBoundingClientRect() : rect;
                const viewportCenter = window.innerHeight * 0.5;
                const sectionCenter = sectionRect.top + (sectionRect.height * 0.5);
                const distance = sectionCenter - viewportCenter;
                const shift = distance * speed * -0.18;

                item.style.setProperty('--parallax-shift', `${shift.toFixed(2)}px`);
            });

            ticking = false;
        };

        const requestParallax = () => {
            if (!ticking) {
                window.requestAnimationFrame(updateParallax);
                ticking = true;
            }
        };

        window.addEventListener('scroll', requestParallax, { passive: true });
        window.addEventListener('resize', requestParallax);
        requestParallax();
    }
})();
