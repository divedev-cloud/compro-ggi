/* ===================================================================
   GGI — Company Profile Website
   Main JavaScript: loader, particles, cursor glow, scroll reveal,
   counters, tabs, marquee, navbar, mobile menu, parallax.
=================================================================== */

(() => {
  'use strict';

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------------------------------------------------------------
     1. LOADING SCREEN
  --------------------------------------------------------------- */
  const loader = document.getElementById('loader');
  const loaderBarFill = document.getElementById('loader-bar-fill');

  function initLoader() {
    let progress = 0;
    const interval = setInterval(() => {
      progress += Math.random() * 18 + 8;
      if (progress >= 100) {
        progress = 100;
        clearInterval(interval);
        setTimeout(() => {
          loader.classList.add('hidden');
          document.body.style.overflow = '';
          startPageAnimations();
        }, 280);
      }
      if (loaderBarFill) loaderBarFill.style.width = progress + '%';
    }, 140);
  }

  document.body.style.overflow = 'hidden';
  window.addEventListener('load', () => {
    setTimeout(initLoader, 300);
  });
  // Fallback in case 'load' is slow
  setTimeout(() => {
    if (!loader.classList.contains('hidden')) initLoader();
  }, 2600);

  /* ---------------------------------------------------------------
     2. PARTICLES CANVAS (hero background)
  --------------------------------------------------------------- */
  function initParticles() {
    const canvas = document.getElementById('particles-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let w, h, particles;
    const COLORS = ['rgba(34,211,238,', 'rgba(124,92,196,', 'rgba(242,184,92,'];

    function resize() {
      w = canvas.width = canvas.offsetWidth * devicePixelRatio;
      h = canvas.height = canvas.offsetHeight * devicePixelRatio;
    }

    function createParticles() {
      const count = window.innerWidth < 768 ? 35 : 70;
      particles = Array.from({ length: count }, () => ({
        x: Math.random() * w,
        y: Math.random() * h,
        r: (Math.random() * 1.8 + 0.6) * devicePixelRatio,
        vx: (Math.random() - 0.5) * 0.25 * devicePixelRatio,
        vy: (Math.random() - 0.5) * 0.25 * devicePixelRatio,
        color: COLORS[Math.floor(Math.random() * COLORS.length)],
        alpha: Math.random() * 0.5 + 0.2,
        pulse: Math.random() * Math.PI * 2,
      }));
    }

    function tick() {
      ctx.clearRect(0, 0, w, h);
      particles.forEach((p) => {
        p.x += p.vx;
        p.y += p.vy;
        p.pulse += 0.02;
        if (p.x < 0) p.x = w;
        if (p.x > w) p.x = 0;
        if (p.y < 0) p.y = h;
        if (p.y > h) p.y = 0;
        const a = p.alpha * (0.6 + 0.4 * Math.sin(p.pulse));
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = p.color + a + ')';
        ctx.fill();
      });

      // connecting lines for nearby particles
      for (let i = 0; i < particles.length; i++) {
        for (let j = i + 1; j < particles.length; j++) {
          const dx = particles[i].x - particles[j].x;
          const dy = particles[i].y - particles[j].y;
          const dist = Math.sqrt(dx * dx + dy * dy);
          const maxDist = 130 * devicePixelRatio;
          if (dist < maxDist) {
            ctx.beginPath();
            ctx.moveTo(particles[i].x, particles[i].y);
            ctx.lineTo(particles[j].x, particles[j].y);
            ctx.strokeStyle = `rgba(34,211,238,${0.08 * (1 - dist / maxDist)})`;
            ctx.lineWidth = 1;
            ctx.stroke();
          }
        }
      }

      if (!reduceMotion) requestAnimationFrame(tick);
    }

    resize();
    createParticles();
    if (!reduceMotion) tick();
    else tick();

    let resizeTimeout;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        resize();
        createParticles();
      }, 200);
    });
  }

  /* ---------------------------------------------------------------
     3. MOUSE-FOLLOW GLOW
  --------------------------------------------------------------- */
  function initCursorGlow() {
    const glow = document.getElementById('cursor-glow');
    if (!glow || reduceMotion || window.matchMedia('(pointer: coarse)').matches) {
      if (glow) glow.style.display = 'none';
      return;
    }
    let mouseX = window.innerWidth / 2;
    let mouseY = window.innerHeight / 2;
    let curX = mouseX;
    let curY = mouseY;

    window.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
    });

    function animate() {
      curX += (mouseX - curX) * 0.08;
      curY += (mouseY - curY) * 0.08;
      glow.style.transform = `translate(${curX}px, ${curY}px)`;
      requestAnimationFrame(animate);
    }
    animate();
  }

  /* ---------------------------------------------------------------
     4. NAVBAR scroll state + active link
  --------------------------------------------------------------- */
  function initNavbar() {
    const nav = document.getElementById('navbar');
    if (!nav) return;
    const onScroll = () => {
      if (window.scrollY > 40) nav.classList.add('scrolled');
      else nav.classList.remove('scrolled');
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ---------------------------------------------------------------
     5. MOBILE MENU
  --------------------------------------------------------------- */
  function initMobileMenu() {
    const btn = document.getElementById('hamburger');
    const menu = document.getElementById('mobile-menu');
    if (!btn || !menu) return;
    const links = menu.querySelectorAll('a');

    function toggle() {
      btn.classList.toggle('open');
      menu.classList.toggle('open');
      document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : '';
    }

    btn.addEventListener('click', toggle);
    links.forEach((l) => l.addEventListener('click', toggle));
  }

  /* ---------------------------------------------------------------
     6. SCROLL REVEAL (IntersectionObserver-based)
  --------------------------------------------------------------- */
  function initScrollReveal() {
    const els = document.querySelectorAll('.reveal, .reveal-scale, .reveal-left, .reveal-right');
    if (!('IntersectionObserver' in window)) {
      els.forEach((el) => el.classList.add('in-view'));
      return;
    }
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const delay = entry.target.dataset.delay || 0;
            setTimeout(() => entry.target.classList.add('in-view'), Number(delay));
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -8% 0px' }
    );
    els.forEach((el) => io.observe(el));
  }

  /* ---------------------------------------------------------------
     7. ANIMATED COUNTERS
  --------------------------------------------------------------- */
  function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');
    if (!counters.length) return;

    const animateCounter = (el) => {
      const target = parseFloat(el.dataset.counter);
      const suffix = el.dataset.suffix || '';
      const decimals = el.dataset.decimals ? Number(el.dataset.decimals) : 0;
      const duration = 1800;
      const startTime = performance.now();

      function update(now) {
        const elapsed = now - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3); // ease-out-cubic
        const value = target * eased;
        el.textContent = decimals ? value.toFixed(decimals) : Math.floor(value);
        if (progress < 1) {
          requestAnimationFrame(update);
        } else {
          el.textContent = (decimals ? target.toFixed(decimals) : target) + suffix;
        }
      }
      requestAnimationFrame(update);
    };

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: '0px 0px -5% 0px' }
    );
    counters.forEach((c) => io.observe(c));
  }

  /* ---------------------------------------------------------------
     8. TABS — Bidang Layanan
  --------------------------------------------------------------- */
  function initTabs() {
    const tabBtns = document.querySelectorAll('[data-tab-target]');
    const panels = document.querySelectorAll('[data-tab-panel]');
    if (!tabBtns.length) return;

    tabBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        const target = btn.dataset.tabTarget;
        tabBtns.forEach((b) => b.classList.remove('active'));
        btn.classList.add('active');
        panels.forEach((p) => {
          if (p.dataset.tabPanel === target) {
            p.classList.remove('hidden');
            requestAnimationFrame(() => {
              p.style.opacity = '0';
              p.style.transform = 'translateY(10px)';
              requestAnimationFrame(() => {
                p.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
                p.style.opacity = '1';
                p.style.transform = 'translateY(0)';
              });
            });
          } else {
            p.classList.add('hidden');
          }
        });
      });
    });
  }

  /* ---------------------------------------------------------------
     9. PARALLAX on scroll (hero shapes, floating blobs)
  --------------------------------------------------------------- */
  function initParallax() {
    if (reduceMotion) return;
    const layers = document.querySelectorAll('[data-parallax-speed]');
    if (!layers.length) return;

    let ticking = false;
    function update() {
      const scrollY = window.scrollY;
      layers.forEach((el) => {
        const speed = parseFloat(el.dataset.parallaxSpeed) || 0.2;
        el.style.transform = `translate3d(0, ${scrollY * speed}px, 0)`;
      });
      ticking = false;
    }
    window.addEventListener(
      'scroll',
      () => {
        if (!ticking) {
          requestAnimationFrame(update);
          ticking = true;
        }
      },
      { passive: true }
    );
    update();
  }

  /* ---------------------------------------------------------------
     10. BACK TO TOP
  --------------------------------------------------------------- */
  function initBackToTop() {
    const btn = document.getElementById('back-to-top');
    if (!btn) return;
    window.addEventListener(
      'scroll',
      () => {
        if (window.scrollY > 600) btn.classList.add('visible');
        else btn.classList.remove('visible');
      },
      { passive: true }
    );
    btn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ---------------------------------------------------------------
     11. SMOOTH SCROLL for nav links
  --------------------------------------------------------------- */
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((link) => {
      link.addEventListener('click', (e) => {
        const href = link.getAttribute('href');
        if (href === '#' || href.length < 2) return;
        const target = document.querySelector(href);
        if (!target) return;
        e.preventDefault();
        const navHeight = document.getElementById('navbar')?.offsetHeight || 0;
        const top = target.getBoundingClientRect().top + window.scrollY - navHeight + 1;
        window.scrollTo({ top, behavior: 'smooth' });
      });
    });
  }

  /* ---------------------------------------------------------------
     12. ACTIVE SECTION HIGHLIGHT in nav
  --------------------------------------------------------------- */
  function initSectionSpy() {
    const sections = document.querySelectorAll('main section[id]');
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    if (!sections.length || !navLinks.length) return;

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          const id = entry.target.id;
          const link = document.querySelector(`.nav-link[href="#${id}"]`);
          if (!link) return;
          if (entry.isIntersecting) {
            navLinks.forEach((l) => l.classList.remove('text-white'));
            link.classList.add('text-white');
          }
        });
      },
      { threshold: 0.3, rootMargin: '-20% 0px -60% 0px' }
    );
    sections.forEach((s) => io.observe(s));
  }

  /* ---------------------------------------------------------------
     13. HERO GALLERY CROSSFADE
  --------------------------------------------------------------- */
  function initHeroGallery() {
    const slides = document.querySelectorAll('.hero-bg-slide');
    if (slides.length < 2) return;
    let idx = 0;
    setInterval(() => {
      slides[idx].style.opacity = '0';
      idx = (idx + 1) % slides.length;
      slides[idx].style.opacity = '1';
    }, 4500);
  }

  /* ---------------------------------------------------------------
     14. TILT EFFECT on cards (subtle 3D on mousemove)
  --------------------------------------------------------------- */
  function initTilt() {
    if (reduceMotion || window.matchMedia('(pointer: coarse)').matches) return;
    const cards = document.querySelectorAll('[data-tilt]');
    cards.forEach((card) => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const cx = rect.width / 2;
        const cy = rect.height / 2;
        const rotateX = ((y - cy) / cy) * -4;
        const rotateY = ((x - cx) / cx) * 4;
        card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-6px)`;
      });
      card.addEventListener('mouseleave', () => {
        card.style.transform = '';
      });
    });
  }

  /* ---------------------------------------------------------------
     15. CONTACT FORM (front-end only, demo)
  --------------------------------------------------------------- */
  function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;
    const successMsg = document.getElementById('form-success');
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = form.querySelector('button[type="submit"]');
      const originalText = btn.innerHTML;
      btn.innerHTML = '<span>Mengirim...</span>';
      btn.disabled = true;
      setTimeout(() => {
        form.reset();
        btn.innerHTML = originalText;
        btn.disabled = false;
        if (successMsg) {
          successMsg.classList.remove('hidden');
          setTimeout(() => successMsg.classList.add('hidden'), 5000);
        }
      }, 1100);
    });
  }

  /* ---------------------------------------------------------------
     INIT — split into "always" and "after loader" groups
  --------------------------------------------------------------- */
  function startPageAnimations() {
    document.querySelectorAll('.hero-reveal').forEach((el, i) => {
      setTimeout(() => el.classList.add('in-view'), i * 120);
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    initParticles();
    initCursorGlow();
    initNavbar();
    initMobileMenu();
    initScrollReveal();
    initCounters();
    initTabs();
    initParallax();
    initBackToTop();
    initSmoothScroll();
    initSectionSpy();
    initHeroGallery();
    initTilt();
    initContactForm();

    // Set current year in footer
    const yearEl = document.getElementById('current-year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();
  });
})();
