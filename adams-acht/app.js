/* ADAMS ACHT — Fan-Shop Mockup | Passwort-Gate + Shop-Interaktionen */
(function () {
  'use strict';

  var PASSWORT = 'adamsacht';          // <- hier ändern
  var KEY = 'aa_mockup_auth';
  var KINOSTART = '2026-09-17T00:00:00';   // <- Kinostart lt. majestic.de

  /* ---------- Sprache (de/en über <html lang>) ---------- */
  var LANG = document.documentElement.lang === 'en' ? 'en' : 'de';
  var T = {
    de: {
      cartTitle: 'Warenkorb',
      cartEmpty: 'Dein Warenkorb ist leer',
      subtotal: 'Zwischensumme',
      checkout: 'Zur Kasse <span class="arr">→</span>',
      checkoutDemo: '✓ Demo-Ansicht — Checkout folgt',
      cartNote: 'Kostenloser Versand ab 50 € Bestellwert.',
      gateError: 'Falsches Passwort — bitte erneut versuchen.',
      newsletterOk: '✓ ANGEMELDET — BIS ZUM KINOSTART!',
      close: 'Schließen', less: 'Weniger', more: 'Mehr'
    },
    en: {
      cartTitle: 'Your Basket',
      cartEmpty: 'Your basket is empty',
      subtotal: 'Subtotal',
      checkout: 'Checkout <span class="arr">→</span>',
      checkoutDemo: '✓ Demo preview — checkout coming soon',
      cartNote: 'Free shipping on orders over €50.',
      gateError: 'Wrong password — please try again.',
      newsletterOk: '✓ SUBSCRIBED — SEE YOU AT THE MOVIES!',
      close: 'Close', less: 'Less', more: 'More'
    }
  }[LANG];

  /* ---------- Passwort-Gate ---------- */
  var gate = document.getElementById('gate');
  var body = document.body;

  function unlock(instant) {
    body.classList.add('authed');
    if (gate) {
      if (instant) { gate.style.display = 'none'; }
      else { gate.classList.add('gate-open'); }
    }
  }

  if (sessionStorage.getItem(KEY) === '1') {
    unlock(true);
  } else if (gate) {
    var form = document.getElementById('gate-form');
    var input = document.getElementById('gate-input');
    var error = document.getElementById('gate-error');
    var box = gate.querySelector('.gate-box');

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (input.value.trim().toLowerCase() === PASSWORT) {
        sessionStorage.setItem(KEY, '1');
        unlock(false);
      } else {
        error.textContent = T.gateError;
        box.classList.remove('shake');
        void box.offsetWidth;
        box.classList.add('shake');
        input.select();
      }
    });
    input.focus();
  }

  /* ---------- Mobile Navigation ---------- */
  var burger = document.querySelector('.nav-burger');
  var links = document.querySelector('.nav-links');
  if (burger && links) {
    burger.addEventListener('click', function () {
      links.classList.toggle('open');
    });
  }

  /* ---------- Scroll-Reveal ---------- */
  var revealObs = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        revealObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(function (el) { revealObs.observe(el); });

  /* ---------- Zähler-Animation ---------- */
  function animateCount(el) {
    var target = parseInt(el.dataset.count, 10);
    var suffix = el.dataset.suffix || '';
    var start = null;
    var dur = 1600;
    function tick(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / dur, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      el.firstChild.textContent = Math.round(target * eased);
      if (p < 1) requestAnimationFrame(tick);
    }
    el.innerHTML = '0<i>' + suffix + '</i>';
    requestAnimationFrame(tick);
  }
  var countObs = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        animateCount(entry.target);
        countObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });
  document.querySelectorAll('[data-count]').forEach(function (el) { countObs.observe(el); });

  /* ---------- Kinostart-Countdown ---------- */
  var cd = document.getElementById('countdown');
  if (cd) {
    var units = {
      d: cd.querySelector('[data-u="d"]'),
      h: cd.querySelector('[data-u="h"]'),
      m: cd.querySelector('[data-u="m"]'),
      s: cd.querySelector('[data-u="s"]')
    };
    var pad = function (n) { return String(n).padStart(2, '0'); };
    var tickCd = function () {
      var diff = new Date(KINOSTART).getTime() - Date.now();
      if (diff < 0) diff = 0;
      units.d.textContent = pad(Math.floor(diff / 86400000));
      units.h.textContent = pad(Math.floor(diff / 3600000) % 24);
      units.m.textContent = pad(Math.floor(diff / 60000) % 60);
      units.s.textContent = pad(Math.floor(diff / 1000) % 60);
    };
    tickCd();
    setInterval(tickCd, 1000);
  }

  /* ---------- FAQ-Akkordeon ---------- */
  document.querySelectorAll('.faq-item').forEach(function (item) {
    var q = item.querySelector('.faq-q');
    var a = item.querySelector('.faq-a');
    q.addEventListener('click', function () {
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(function (other) {
        other.classList.remove('open');
        other.querySelector('.faq-a').style.maxHeight = null;
      });
      if (!isOpen) {
        item.classList.add('open');
        a.style.maxHeight = a.scrollHeight + 'px';
      }
    });
  });

  /* ---------- Produkt-Filter ---------- */
  var chips = document.querySelectorAll('.filter-chip');
  if (chips.length) {
    chips.forEach(function (chip) {
      chip.addEventListener('click', function () {
        chips.forEach(function (c) { c.classList.remove('active'); });
        chip.classList.add('active');
        var f = chip.dataset.filter;
        document.querySelectorAll('.product-card[data-cat]').forEach(function (card) {
          card.classList.toggle('hide', f !== 'alle' && card.dataset.cat !== f);
        });
      });
    });
  }

  /* ---------- Warenkorb (Platzhalter, localStorage) ---------- */
  var CART_KEY = 'aa_cart';

  function getCart() {
    try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; }
    catch (e) { return []; }
  }
  function saveCart(cart) { localStorage.setItem(CART_KEY, JSON.stringify(cart)); }
  function euro(n) { return n.toFixed(2).replace('.', ',') + ' €'; }

  /* Drawer-Markup einmalig injizieren */
  var drawerHtml =
    '<div class="cart-overlay" id="cart-overlay"></div>' +
    '<aside class="cart-drawer" id="cart-drawer" aria-label="' + T.cartTitle + '">' +
    '  <div class="cart-head"><h3>' + T.cartTitle + '</h3><button class="cart-close" id="cart-close" aria-label="' + T.close + '">×</button></div>' +
    '  <div class="cart-items" id="cart-items"></div>' +
    '  <div class="cart-foot">' +
    '    <div class="cart-total"><span>' + T.subtotal + '</span><span class="sum" id="cart-sum">0,00 €</span></div>' +
    '    <button class="btn btn-primary" style="width:100%;justify-content:center" id="cart-checkout">' + T.checkout + '</button>' +
    '    <p class="cart-note">' + T.cartNote + '</p>' +
    '  </div>' +
    '</aside>';
  document.body.insertAdjacentHTML('beforeend', drawerHtml);

  var overlay = document.getElementById('cart-overlay');
  var drawer = document.getElementById('cart-drawer');
  var itemsEl = document.getElementById('cart-items');
  var sumEl = document.getElementById('cart-sum');
  var countEl = document.querySelector('.cart-count');

  function renderCart() {
    var cart = getCart();
    var count = cart.reduce(function (n, it) { return n + it.qty; }, 0);
    var sum = cart.reduce(function (n, it) { return n + it.qty * it.price; }, 0);

    if (countEl) {
      countEl.textContent = count;
      countEl.classList.toggle('show', count > 0);
    }
    sumEl.textContent = euro(sum);

    if (!cart.length) {
      itemsEl.innerHTML = '<div class="cart-empty">' + T.cartEmpty + '</div>';
      return;
    }
    itemsEl.innerHTML = cart.map(function (it, i) {
      return '<div class="cart-item">' +
        '<div class="ci-thumb">' + it.thumb + '</div>' +
        '<div class="ci-info"><div class="ci-name">' + it.name + '</div><div class="ci-price">' + euro(it.price) + '</div></div>' +
        '<div class="ci-qty">' +
        '<button data-cart-dec="' + i + '" aria-label="Weniger">−</button>' +
        '<span>' + it.qty + '</span>' +
        '<button data-cart-inc="' + i + '" aria-label="Mehr">+</button>' +
        '</div></div>';
    }).join('');
  }

  function openCart() { overlay.classList.add('open'); drawer.classList.add('open'); }
  function closeCart() { overlay.classList.remove('open'); drawer.classList.remove('open'); }

  document.querySelectorAll('.cart-btn').forEach(function (btn) {
    btn.addEventListener('click', openCart);
  });
  overlay.addEventListener('click', closeCart);
  document.getElementById('cart-close').addEventListener('click', closeCart);
  document.getElementById('cart-checkout').addEventListener('click', function () {
    this.textContent = T.checkoutDemo;
    var self = this;
    setTimeout(function () { self.innerHTML = T.checkout; }, 2200);
  });

  /* +/− im Drawer (Event-Delegation) */
  itemsEl.addEventListener('click', function (e) {
    var cart = getCart();
    var inc = e.target.getAttribute('data-cart-inc');
    var dec = e.target.getAttribute('data-cart-dec');
    if (inc !== null) cart[+inc].qty++;
    if (dec !== null) {
      cart[+dec].qty--;
      if (cart[+dec].qty <= 0) cart.splice(+dec, 1);
    }
    if (inc !== null || dec !== null) { saveCart(cart); renderCart(); }
  });

  /* In-den-Warenkorb-Buttons */
  document.querySelectorAll('.add-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var cart = getCart();
      var id = btn.dataset.id;
      var found = cart.find(function (it) { return it.id === id; });
      if (found) { found.qty++; }
      else {
        cart.push({
          id: id,
          name: btn.dataset.name,
          price: parseFloat(btn.dataset.price),
          thumb: btn.dataset.thumb || 'VIII',
          qty: 1
        });
      }
      saveCart(cart);
      renderCart();
      btn.classList.add('added');
      btn.textContent = '✓';
      setTimeout(function () { btn.classList.remove('added'); btn.textContent = '+'; }, 900);
      openCart();
    });
  });

  renderCart();

  /* ---------- Kontakt-Formular (Platzhalter) ---------- */
  var contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      contactForm.reset();
      var ok = document.getElementById('form-success');
      ok.style.display = 'block';
      ok.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });
  }

  /* ---------- Newsletter (Platzhalter) ---------- */
  var nlForm = document.getElementById('newsletter-form');
  if (nlForm) {
    nlForm.addEventListener('submit', function (e) {
      e.preventDefault();
      nlForm.innerHTML = '<p style="font-family:var(--font-mono);font-size:0.8rem;letter-spacing:0.15em;color:var(--gold)">' + T.newsletterOk + '</p>';
    });
  }
})();
